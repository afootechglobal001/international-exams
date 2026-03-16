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
	$transactionId=($_GET['transactionId']);
    $examRegistrationId=($_GET['examRegistrationId']);
    validateEmptyField($transactionId, 'TRANSACTION ID');
    validateEmptyField($examRegistrationId, 'EXAM REGISTRATION ID');
    /// update transaction to cancelled
    $query=mysqli_query($conn,"UPDATE TRANSACTION_TAB SET statusId=5, staffId='$loginStaffId' WHERE transactionId='$transactionId'") or die (mysqli_error($conn));
    /// update STUDENT_EXAMS_REGISTRATION_TAB and save to draft
    $query=mysqli_query($conn,"UPDATE STUDENT_EXAMS_REGISTRATION_TAB SET statusId=7 WHERE examRegistrationId='$examRegistrationId'") or die (mysqli_error($conn));
    $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "Your Exam payment has been cancelled and your registration saved to draft.",
        ];
    /// sent alert
end:
//////////////////////////////////////////////////////////////////////////////////////////////
echo json_encode($response);
?>