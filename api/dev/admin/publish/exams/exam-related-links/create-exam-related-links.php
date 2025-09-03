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
    $publishId =trim($_GET['publishId']);
    $regTitle =trim(str_replace("'", "\'", $_POST['regTitle']));
    $regPix=$_FILES['regPix']['name'];
    $statusId=trim($_POST['statusId']);
   
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($regTitle, 'RELATED LINK TITLE');
    validateEmptyField($regPix, 'RELATED LINK PICTURE');
    validateEmptyField($statusId, 'STATUS');

    $linkTitleQuery=mysqli_query($conn,"SELECT regTitle FROM PUBLISH_TAB WHERE regTitle='$regTitle' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $linkTitleCountQuery=mysqli_num_rows($linkTitleQuery);

    if ($linkTitleCountQuery>0){
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam link with title ('$regTitle') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM RELATED LINK REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new exam related link with a title ($regTitle) that is already in use.";	
        goto end;
    }

        /////////////////get exam publish Id //////////////////////////////////////
        $publishIdQuery=mysqli_query($conn,"SELECT publishId FROM PUBLISH_TAB WHERE publishId='$publishId' AND pageCategoryId='$pageCategoryId'")or die (mysqli_error($conn));
	    $fetchPublishQuery=mysqli_fetch_array($publishIdQuery);
		$parentPublishId=$fetchPublishQuery['publishId'];

        ///////////////////////geting sequence//////////////////////////
        $countId='EXAMLINK';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $publishId=$countId.$no.date("Ymdhis");

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
	
            $datetime = date("Ymdhi");
            $regPix = $publishId . '_' . $datetime . '_' . $regPix;

            mysqli_query($conn,"INSERT INTO `PUBLISH_TAB`
            (`pageCategoryId`, `parentPublishId`, `publishId`, `regTitle`, `regPix`, `statusId`, `createdBy`, `createdTme`, `updatedTime`) VALUES
            ('$pageCategoryId', '$parentPublishId', '$publishId', '$regTitle', '$regPix', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'regPix' => $regPix,
                'message'=> "EXAM RELATED LINK CREATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "EXAM RELATED LINK CREATED SUCCESSFULLY: $pageCategoryName was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | ID: $publishId.";

            // Fetch exam related links details ///
            $select="SELECT
                a.pageCategoryId,
                a.parentPublishId,
                a.publishId,
                a.regTitle, 
                a.regPix, 
                a.statusId, 
                a.createdBy, 
                a.createdTme, 
                a.updatedTime, 
                b.statusName
                FROM PUBLISH_TAB a
                JOIN SETUP_STATUS_TAB b
                    ON a.statusId = b.statusId
                AND a.pageCategoryId ='$pageCategoryId'
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