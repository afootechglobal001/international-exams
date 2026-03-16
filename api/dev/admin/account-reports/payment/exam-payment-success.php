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
    /// update transaction
    $query=mysqli_query($conn,"UPDATE TRANSACTION_TAB SET statusId=4, staffId='$loginStaffId' WHERE transactionId='$transactionId'") or die (mysqli_error($conn));
    /// update STUDENT_EXAMS_REGISTRATION_TAB
    $query=mysqli_query($conn,"UPDATE STUDENT_EXAMS_REGISTRATION_TAB SET statusId=1 WHERE examRegistrationId='$examRegistrationId'") or die (mysqli_error($conn));
    $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "Your Exam has been successfully registered.",
        ];
    /// sent alert
end:
//////////////////////////////////////////////////////////////////////////////////////////////
echo json_encode($response);
?>