<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/staff-session-check.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
    if(!$checkSession){
        $response=[
            'response' => 99,
            'success' => false,
            'message' => "SESSION EXPIRED! Please LogIn Again.",
        ];
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $paramsExamId =trim($_GET['examId']);
    $ebookId =trim($_GET['ebookId']);
    $examId =trim($_POST['examId']);
    $ebookTitle =trim(str_replace("'", "\'", $_POST['ebookTitle']));
    $sellingPrice =trim($_POST['sellingPrice']);
    $regPix=$_FILES['regPix']['name'];
    $material=$_FILES['material']['name'];
    $ebookSize=trim($_POST['ebookSize']);
    $ebookPages=trim($_POST['ebookPages']);
    $statusId=trim($_POST['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($examId, 'EXAM');
    validateEmptyField($ebookTitle, 'E-BOOK TITLE');
    validateEmptyField($sellingPrice, 'SELLING PRICE');
    validateEmptyField($ebookSize, 'E-BOOK SIZE');
    validateEmptyField($ebookPages, 'E-BOOK PAGES');
    validateEmptyField($statusId, 'STATUS');

    $titleQuery=mysqli_query($conn,"SELECT ebookTitle FROM EXAM_EBOOK_TAB WHERE ebookTitle='$ebookTitle' AND ebookId!='$ebookId' AND examId='$paramsExamId'") or die (mysqli_error($conn));
    $titleCountQuery=mysqli_num_rows($titleQuery);

    if ($titleCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This E-BOOK with name ('$ebookTitle') is already in use. Please try another Name."
        ];

        $alertDetail="E-BOOK UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update E-BOOK with a name ($ebookTitle) that is already in use.";	
        goto end;
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$examId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        $update ="UPDATE EXAM_EBOOK_TAB SET 
            examId = '$examId',
            examAbbr = '$examAbbr',
            ebookTitle = '$ebookTitle',
            sellingPrice = '$sellingPrice',
            ebookSize = '$ebookSize',
            ebookPages = '$ebookPages',
            statusId = '$statusId',
            updatedBy = '$loginStaffId',
            updatedTime = NOW()
            WHERE ebookId = '$ebookId' AND examId = '$paramsExamId'";
            mysqli_query($conn, $update) or die(mysqli_error($conn));

            $imageArray = $callclass->_getEbookDetails($conn, $ebookId, $paramsExamId);
            $fetchImage = json_decode($imageArray, true);

            $oldRegPix    = $fetchImage[0]['regPix'] ?? null;
            $oldMaterial  = $fetchImage[0]['material'] ?? null;

            ///////////////////////geting image extention//////////////////////////
            $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
            $extension = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);
            
            if (in_array(($extension), $allowedExts)) {
                $datetime = date("Ymdhi");
                $regPix = $ebookId . '_' . $datetime . '_' . $regPix;
                mysqli_query($conn, "UPDATE EXAM_EBOOK_TAB SET regPix = '$regPix' WHERE ebookId = '$ebookId' AND examId = '$paramsExamId'") or die(mysqli_error($conn));
            }

            /////////////////////geting material extention//////////////////////////
            $allowedExts = array("pdf", "PDF");
            $extension = pathinfo($_FILES['material']['name'], PATHINFO_EXTENSION);
            if (in_array(($extension), $allowedExts)) {
                // Add unique ID for material ////
                $datetime = date("Ymdhi");
                $material = $ebookId . '_' . $datetime . '_' . $material;
                mysqli_query($conn, "UPDATE EXAM_EBOOK_TAB SET material = '$material' WHERE ebookId = '$ebookId' AND examId = '$paramsExamId'") or die(mysqli_error($conn));
            }

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'oldRegPix' => $oldRegPix,
                'material' => $material,
                'oldMaterial' => $oldMaterial,
                'message'=> "E-BOOK UPDATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "E-BOOK UPDATED SUCCESSFULLY: E-Book was upadated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $ebookTitle | Exam ID: $paramsExamId | ID: $ebookId.";

            // Fetch ebook details ///
            $select="SELECT 
            a.*,
            b.statusName,
            c.examLogo
            FROM EXAM_EBOOK_TAB a
            JOIN SETUP_STATUS_TAB b
            ON a.statusId=b.statusId
            JOIN PUBLISH_TAB c
            ON a.examId=c.publishId 
            AND a.ebookId='$ebookId' AND a.examId='$paramsExamId'";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $createdBy=$fetchQuery['createdBy'];
                $updatedBy=$fetchQuery['updatedBy'];

                /////////////////// for  CreatedBy /////////
                $createdByData=array();
                $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$createdBy'");
                while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
                    $createdByData[] = $getCreatedByfetch;
                }
                $fetchQuery['createdBy']= $createdByData;

                /////////////////// for  UpdatedBy /////////
                $updatedByData=array();
                $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
                while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
                    $updatedByData[] = $getUpdatedByfetch;
                }
                $fetchQuery['updatedBy']= $updatedByData;

                $response['data'][] = $fetchQuery;
            }
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>