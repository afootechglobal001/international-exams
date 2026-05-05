<?php require_once '../../../config/connection.php';?>
<?php require_once '../../../config/staff-session-check.php';?>

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
    $publishId =trim($_GET['publishId']);
    $regTitle =trim(str_replace("'", "\'", $_POST['regTitle']));
    $examAbbr=trim(strtoupper($_POST['examAbbr']));
    $officialWebsite =trim(str_replace("'", "\'", $_POST['officialWebsite']));
    $conductingBody =trim(str_replace("'", "\'", $_POST['conductingBody']));
    $acceptedBy =trim(str_replace("'", "\'", $_POST['acceptedBy']));
    $mostPopular =trim(str_replace("'", "\'", $_POST['mostPopular']));
    $modeOfExam =trim(str_replace("'", "\'", $_POST['modeOfExam']));
    $regPix=$_FILES['regPix']['name'];
    $examLogo=$_FILES['examLogo']['name'];
    $incentives =trim(str_replace("'", "\'", $_POST['incentives']));
    $scoreRange =trim(str_replace("'", "\'", $_POST['scoreRange']));
    $statusId=trim($_POST['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($publishId, 'PUBLISH ID');
    validateEmptyField($regTitle, 'EXAM NAME');
    validateEmptyField($examAbbr, 'EXAM ABBREVIATION');
    validateEmptyField($incentives, 'EXAM INCENTIVES');
    validateEmptyField($statusId, 'STATUS');

    $examNameQuery=mysqli_query($conn,"SELECT regTitle FROM PUBLISH_TAB WHERE regTitle='$regTitle' AND publishId!='$publishId' AND pageCategoryId='$pageCategoryId' AND (parentPublishId IS NULL OR parentPublishId='')") or die (mysqli_error($conn));
    $examNameCountQuery=mysqli_num_rows($examNameQuery);

    if ($examNameCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam with name ('$regTitle') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update an exam with a name ($regTitle) that is already in use.";	
        goto end;
    }

    $examAbbrQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE examAbbr='$examAbbr' AND publishId!='$publishId' AND pageCategoryId='$pageCategoryId' AND (parentPublishId IS NULL OR parentPublishId='')") or die (mysqli_error($conn));
    $examAbbrCountQuery=mysqli_num_rows($examAbbrQuery);

    if ($examAbbrCountQuery>0){ /// start if 5
        $response = [
            'response'=> 102,
            'success'=> false,
            'message' => "This exam with abbreviation ('$examAbbr') is already in use. Please try another Exam Abbreviation."
        ];

        $alertDetail="EXAM UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to udpate an exam with abbreviation ($examAbbr) that is already in use.";	
        goto end;
    }

        $update ="UPDATE PUBLISH_TAB SET 
            regTitle = '$regTitle',
            examAbbr = '$examAbbr',
            officialWebsite = '$officialWebsite',
            conductingBody = '$conductingBody',
            acceptedBy = '$acceptedBy',
            mostPopular = '$mostPopular',
            modeOfExam = '$modeOfExam',
            incentives = '$incentives',
            scoreRange = '$scoreRange',
            statusId = '$statusId',
            updatedBy = '$loginStaffId',
            updatedTime = NOW()
            WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'";
            mysqli_query($conn, $update) or die(mysqli_error($conn));

            ///////////////////////getting image extensions//////////////////////////
            $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "PNG", "GIF", "webp", "WEBP");

            ///// Fetch current image details from database /////
            $imageArray = $callclass->_getPublishDetails($conn, $publishId, $pageCategoryId);
            $fetchImage = json_decode($imageArray, true);

            //////Handles exam picture extention/////
            if (!empty($_FILES['regPix']['name'])) {
                $regPixExt = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);

                if (in_array($regPixExt, $allowedExts)) {
                    $oldRegPix = $fetchImage[0]['regPix'];

                    $datetime = date("Ymdhi");
                    $regPix = $publishId . '_' . $datetime . '_' . $regPix;

                    mysqli_query($conn, "UPDATE PUBLISH_TAB SET regPix = '$regPix' WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'") or die(mysqli_error($conn));
                }
            }

            ///// Handle exam logo iamge //////
            if (!empty($_FILES['examLogo']['name'])) {
                $examLogoExt = pathinfo($_FILES['examLogo']['name'], PATHINFO_EXTENSION);

                if (in_array($examLogoExt, $allowedExts)) {
                    $oldExamLogo = $fetchImage[0]['examLogo'];

                    $datetime = date("Ymdhi");
                    $examLogo = $publishId . '_' . $datetime . '_' . $examLogo;

                    mysqli_query($conn, "UPDATE PUBLISH_TAB SET examLogo = '$examLogo' WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'") or die(mysqli_error($conn));
                }
            }

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'oldRegPix' => $oldRegPix,
                'examLogo' => $examLogo,
                'oldExamLogo' => $oldExamLogo,
                'message'=> "EXAM UPDATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "EXAM UPDATED SUCCESSFULLY: $pageCategoryName was upadated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | Abbreviation: $examAbbr | ID: $publishId.";

            // Fetch branch details ///
            $select="SELECT a.pageCategoryId, a.publishId, a.regTitle, a.examAbbr, a.officialWebsite, a.conductingBody, a.acceptedBy, a.mostPopular, a.modeOfExam, a.incentives, a.scoreRange, a.regPix, a.examLogo, a.statusId, a.createdBy, a.updatedBy, a.createdTme, a.updatedTime, b.statusName FROM PUBLISH_TAB a, SETUP_STATUS_TAB b WHERE a.statusId=b.statusId AND a.pageCategoryId='$pageCategoryId'";

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