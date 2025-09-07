<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/user-session-check.php';?>

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
	$transactionId=($_GET['transactionId']);
    $examRegistrationId=($_GET['examRegistrationId']);
    /// update transaction to cancelled
    $query=mysqli_query($conn,"UPDATE TRANSACTION_TAB SET statusId=5 WHERE transactionId='$transactionId'") or die (mysqli_error($conn));
    /// update STUDENT_EXAMS_REGISTRATION_TAB and save to draft
    $query=mysqli_query($conn,"UPDATE STUDENT_EXAMS_REGISTRATION_TAB SET statusId=7 WHERE examRegistrationId='$examRegistrationId'") or die (mysqli_error($conn));
    $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "Your Exam payment has been cancelled.",
        ];
    /// sent alert
    $alertDetail = "User with ID $loginUserId and Name $loginUserFullname cancelled their wallet load transaction with Transaction ID $transactionId.";
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginUserCountryId,$loginUserId,$loginUserFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>