<?php require_once '../../../../config/connection.php';?>
<?php require_once '../../../../config/staff-session-check.php';?>

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
    $pageCategoryId =trim($_GET['pageCategoryId']);
    $parentPublishId =trim($_GET['parentPublishId']);
    $publishId =trim($_GET['publishId']);
    $regTitle =trim(str_replace("'", "\'", $_POST['regTitle']));
    $regPix=$_FILES['regPix']['name'];
    $statusId=trim($_POST['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($publishId, 'PUBLISH ID');
    validateEmptyField($parentPublishId, 'PUBLISH ID');
    validateEmptyField($regTitle, 'RELATED LINK TITLE');
    validateEmptyField($statusId, 'STATUS');

    $linkTitleQuery=mysqli_query($conn,"SELECT regTitle FROM PUBLISH_TAB WHERE regTitle='$regTitle' AND publishId!='$publishId' AND parentPublishId!='$parentPublishId' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $linkTitleCountQuery=mysqli_num_rows($linkTitleQuery);

    if ($linkTitleCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam link with title ('$regTitle') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM LINK UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update an exam link with a title ($regTitle) that is already in use.";	
        goto end;
    }

        /////////////////get exam publish details //////////////////////////////////////
        $publishIdQuery=mysqli_query($conn,"SELECT publishId, examAbbr FROM PUBLISH_TAB WHERE publishId='$parentPublishId' AND pageCategoryId='$pageCategoryId'")or die (mysqli_error($conn));
	    $fetchPublishQuery=mysqli_fetch_array($publishIdQuery);
		$parentPublishId=$fetchPublishQuery['publishId'];
        $examAbbr=$fetchPublishQuery['examAbbr'];

        $update ="UPDATE PUBLISH_TAB SET 
            regTitle = '$regTitle',
            examAbbr = '$examAbbr',
            statusId = '$statusId',
            updatedBy = '$loginStaffId',
            updatedTime = NOW()
            WHERE publishId = '$publishId' AND parentPublishId = '$parentPublishId' AND pageCategoryId = '$pageCategoryId'";
            mysqli_query($conn, $update) or die(mysqli_error($conn));


            ///////////////////////geting image extention//////////////////////////
            $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
            $extension = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);
            
            if (in_array(($extension), $allowedExts)) {
                $imageArray=$callclass->_getPublishDetails($conn, $publishId, $pageCategoryId);
                $fetchImage = json_decode($imageArray, true);
                $oldRegPix= $fetchImage[0]['regPix'];

                $datetime = date("Ymdhi");
                $regPix = $publishId . '_' . $datetime . '_' . $regPix;
                mysqli_query($conn, "UPDATE PUBLISH_TAB SET regPix = '$regPix' WHERE publishId = '$publishId' AND parentPublishId = '$parentPublishId' AND pageCategoryId = '$pageCategoryId'") or die(mysqli_error($conn));
            }

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'oldRegPix' => $oldRegPix,
                'message'=> "EXAM RELATED LINK UPDATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "EXAM RELATED LINK UPDATED SUCCESSFULLY: $pageCategoryName was upadated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | ID: $publishId.";

             // Fetch exam related links details ///
            $select="SELECT
                a.pageCategoryId,
                a.parentPublishId,
                a.publishId,
                a.regTitle, 
                a.regPix, 
                a.statusId, 
                a.createdBy,
                a.updatedBy, 
                a.createdTme, 
                a.updatedTime,
                b.statusName
                FROM PUBLISH_TAB a
                JOIN SETUP_STATUS_TAB b 
                    ON a.statusId = b.statusId
                AND a.pageCategoryId ='$pageCategoryId'
                    AND a.parentPublishId ='$parentPublishId'
                ORDER BY a.regTitle ASC";
            
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