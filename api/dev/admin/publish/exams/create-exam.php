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
    $regTitle =trim(str_replace("'", "\'", $_POST['regTitle']));
    $examAbbr=trim(strtoupper($_POST['examAbbr']));
    $regPix=$_FILES['regPix']['name'];
    $examLogo=$_FILES['examLogo']['name'];
    $incentives=trim(strtoupper($_POST['incentives']));
    $statusId=trim($_POST['statusId']);
   
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($regTitle, 'EXAM NAME');
    validateEmptyField($examAbbr, 'EXAM ABBREVIATION');
    validateEmptyField($regPix, 'EXAM PICTURE');
    validateEmptyField($examLogo, 'EXAM LOGO');
    validateEmptyField($incentives, 'EXAM INCENTIVES');
    validateEmptyField($statusId, 'STATUS');

    $examNameQuery=mysqli_query($conn,"SELECT regTitle FROM PUBLISH_TAB WHERE regTitle='$regTitle' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $examNameCountQuery=mysqli_num_rows($examNameQuery);

    if ($examNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam with name ('$regTitle') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new exam with a name ($regTitle) that is already in use.";	
        goto end;
    }

    $examAbbrQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE examAbbr='$examAbbr' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $examAbbrCountQuery=mysqli_num_rows($examAbbrQuery);

    if ($examAbbrCountQuery>0){ /// start if 3
        $response = [
            'response'=> 102,
            'success'=> false,
            'message' => "This exam with abbreviation ('$examAbbr') is already in use. Please try another Exam Abbreviation."
        ];

        $alertDetail="EXAM REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new exam with abbreviation ($examAbbr) that is already in use.";	
        goto end;
    }

        ///////////////////////geting sequence//////////////////////////
        $countId='EXAM';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $publishId=$countId.$no.date("Ymdhis");

        ///////////////////////getting image extensions//////////////////////////
        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png", "PNG", "GIF", "webp", "WEBP");

        //// Validate exam picture /////
        $regPixExt = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);
        if (!in_array($regPixExt, $allowedExts)) {
            $response = [
                'response' => 103,
                'success' => false,
                'message' => 'INVALID EXAM PICTURE FORMAT! Check the picture format and try again.'
            ];  
            goto end;
        }

        ///// Validate exam logo ////
        $examLogoExt = pathinfo($_FILES['examLogo']['name'], PATHINFO_EXTENSION);
        if (!in_array($examLogoExt, $allowedExts)) {
            $response = [
                'response' => 104,
                'success' => false,
                'message' => 'INVALID LOGO FORMAT! Check the logo format and try again.'
            ];  
            goto end;
        }

        ///////////////////////rename with unique ID//////////////////////////
        $datetime = date("Ymdhi");

        // Add unique ID for exam picture ////
        $regPix = $publishId . '_' . $datetime . '_' . $regPix;

        // Add unique ID for exam logo ////
        $examLogo = $publishId . '_' . $datetime . '_' . $examLogo;

        mysqli_query($conn,"INSERT INTO `PUBLISH_TAB`
        (`pageCategoryId`, `publishId`, `regTitle`, `examAbbr`, `regPix`, `examLogo`, `statusId`, `createdBy`, `createdTme`, `updatedTime`) VALUES
        ('$pageCategoryId', '$publishId', '$regTitle', '$examAbbr', '$regPix', '$examLogo', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

        // Handle departments (comma-separated)
        $incentiveArray = array_map('trim', explode(',', $incentives));

        foreach ($incentiveArray as $incentiveName) {
            $incentiveName = mysqli_real_escape_string($conn, $incentiveName);

            mysqli_query($conn, "INSERT INTO `EXAM_INCENTIVE_TAB`
            (`publishId`, `examAbbr`, `incentives`, `createdBy`, `createdTime`) VALUES 
            ('$publishId', '$examAbbr', '$incentiveName', '$loginStaffId', NOW())") or die(mysqli_error($conn));
        }

        $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
        $fetchPageCat = json_decode($pageCatArray, true);
        $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

        $response = [
            'response'=> 200,
            'success'=> true,
            'regPix' => $regPix,
            'examLogo' => $examLogo,
            'message'=> "EXAM CREATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "EXAM CREATED SUCCESSFULLY: $pageCategoryName was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | Abbreviation: $examAbbr | ID: $publishId.";

        // Fetch branch details ///
        $select="SELECT a.pageCategoryId, a.publishId, a.regTitle, a.examAbbr, a.regPix, a.examLogo, a.statusId, a.createdBy, a.createdTme, a.updatedTime, b.statusName FROM PUBLISH_TAB a, SETUP_STATUS_TAB b WHERE a.statusId=b.statusId AND a.pageCategoryId='$pageCategoryId'";

        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $createdBy=$fetchQuery['createdBy'];
            $updatedBy=$fetchQuery['updatedBy'];
            $publishId=$fetchQuery['publishId'];

            /////////////////// fetch incentives per exam ////////////
            $incentivesData=array();
            $getIncentivesQuery = mysqli_query($conn, "SELECT * FROM EXAM_INCENTIVE_TAB WHERE publishId='$publishId'");
            while ($getIncentivesfetch = mysqli_fetch_assoc($getIncentivesQuery)) {
                $incentivesData[] = $getIncentivesfetch;
            }
            $fetchQuery['incentivesData']= $incentivesData;

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