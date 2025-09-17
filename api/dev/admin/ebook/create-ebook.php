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
    $examId =trim($_POST['examId']);
    $ebookTitle =trim(str_replace("'", "\'", $_POST['ebookTitle']));
    $regPix=$_FILES['regPix']['name'];
    $material=$_FILES['material']['name'];
    $ebookSize=trim($_POST['ebookSize']);
    $ebookPages=trim($_POST['ebookPages']);
    $statusId=trim($_POST['statusId']);
   
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($examId, 'EXAM');
    validateEmptyField($ebookTitle, 'E-BOOK TITLE');
    validateEmptyField($regPix, 'PICTURE');
    validateEmptyField($material, 'MATERIAL');
    validateEmptyField($ebookSize, 'E-BOOK SIZE');
    validateEmptyField($ebookPages, 'E-BOOK PAGES');
    validateEmptyField($statusId, 'STATUS');

    $titleQuery=mysqli_query($conn,"SELECT ebookTitle FROM EXAM_EBOOK_TAB WHERE ebookTitle='$ebookTitle' AND examId='$examId'") or die (mysqli_error($conn));
    $titleCountQuery=mysqli_num_rows($titleQuery);

    if ($titleCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This ebook with name ('$ebookTitle') is already in use. Please try another Name."
        ];

        $alertDetail="EBOOK REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new ebook with a name ($ebookTitle) that is already in use.";	
        goto end;
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$examId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        ///////////////////////geting sequence//////////////////////////
        $countId='EBOOK';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $ebookId=$countId.$no.date("Ymdhis");

        ///////////////////////getting image extention//////////////////////////
        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
        $extension = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);
        
        if (!in_array(($extension), $allowedExts)) {
            $response = [
                'response' => 103,
                'success' => false,
                'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
            ];  
            goto end;
        }

        ///////////////////////getting material extention//////////////////////////
        $allowedExts = array("PDF", "pdf");
		$extension = pathinfo($_FILES['material']['name'], PATHINFO_EXTENSION);

        if (!in_array(($extension), $allowedExts)) {
            $response = [
                'response' => 103,
                'success' => false,
                'message' => 'INVALID MATERIAL FORMAT! Check the material format and try again.'
            ];  
            goto end;
        }

            $datetime = date("Ymdhi");
              // Add unique ID for ebook picture ////
            $regPix = $ebookId . '_' . $datetime . '_' . $regPix;

            // Add unique ID for material ////
            $material = $ebookId . '_' . $datetime . '_' . $material;

            mysqli_query($conn,"INSERT INTO `EXAM_EBOOK_TAB`
            (`examId`, `examAbbr`, `ebookId`, `ebookTitle`, `regPix`, `material`, `ebookSize`, `ebookPages`, `statusId`, `createdBy`, `createdTime`, `updatedTime`) VALUES
            ('$examId', '$examAbbr', '$ebookId', '$ebookTitle', '$regPix', '$material', '$ebookSize', '$ebookPages', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'material' => $material,
                'message'=> "EBOOK CREATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "EBOOK CREATED SUCCESSFULLY: E-book was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $ebookTitle | Exam: $examAbbr | Exam Id: $examId | ID: $ebookId.";

            // Fetch ebook details ///
            $select="SELECT 
            a.*,
            b.statusName,
            c.examLogo
            FROM EXAM_EBOOK_TAB a
            JOIN SETUP_STATUS_TAB b
            ON a.statusId=b.statusId
            JOIN PUBLISH_TAB c
            ON a.examId=c.publishId";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $createdBy=$fetchQuery['createdBy'];

                /////////////////// for  CreatedBy /////////
                $createdByData=array();
                $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$createdBy'");
                while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
                    $createdByData[] = $getCreatedByfetch;
                }
                $fetchQuery['createdBy']= $createdByData;

                $response['data'][] = $fetchQuery;
            }
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>