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
    $regPix=$_FILES['regPix']['name'];
    $statusId=trim($_POST['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($regTitle, 'TITLE');
    validateEmptyField($statusId, 'STATUS');

    $titleQuery=mysqli_query($conn,"SELECT regTitle FROM PUBLISH_TAB WHERE regTitle='$regTitle' AND publishId!='$publishId' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $titleCountQuery=mysqli_num_rows($titleQuery);

    if ($titleCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This Gallery with name ('$regTitle') is already in use. Please try another Name."
        ];

        $alertDetail="GALLERY UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update gallery with a name ($regTitle) that is already in use.";	
        goto end;
    }

        $update ="UPDATE PUBLISH_TAB SET 
            regTitle = '$regTitle',
            statusId = '$statusId',
            updatedBy = '$loginStaffId',
            updatedTime = NOW()
            WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'";
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
                mysqli_query($conn, "UPDATE PUBLISH_TAB SET regPix = '$regPix' WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'") or die(mysqli_error($conn));
            }

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'oldRegPix' => $oldRegPix,
                'message'=> "GALLERY UPDATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "GALLERY UPDATED SUCCESSFULLY: $pageCategoryName was upadated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | ID: $publishId.";

            // Fetch branch details ///
            $select="SELECT a.pageCategoryId, a.publishId, a.regTitle, a.regPix, a.statusId, a.createdBy, a.updatedBy, a.createdTme, a.updatedTime, b.statusName FROM PUBLISH_TAB a, SETUP_STATUS_TAB b WHERE a.statusId=b.statusId AND a.pageCategoryId='$pageCategoryId'";

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