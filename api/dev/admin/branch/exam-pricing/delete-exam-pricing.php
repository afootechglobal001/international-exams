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
    $countryId =trim($_GET['countryId']);
    $publishId=trim($_GET['publishId']);

    if (empty($countryId)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "COUNTRY ID REQUIRED! Provide valid country ID and try again",
        ]; 
        goto end;
    }
    
        /// delete exam from branch exam pricing
        mysqli_query($conn,"DELETE FROM `BRANCH_EXAM_PRICING_TAB` WHERE publishId='$publishId' AND countryId='$countryId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM DELETED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "EXAM DELETED SUCCESSFULLY:Exam was deleted successfully by $loginStaffFullname (ID: $loginStaffId).";
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$countryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>