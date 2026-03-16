<?php 
require_once '../../config/connection.php';
require_once '../../config/staff-session-check.php';
if (!$checkBasicSecurity){ goto end; }
if(!$checkSession){
    $response = [
        'response'=>99,
        'success'=>false,
        'message'=>"SESSION EXPIRED! Please LogIn Again."
    ];
    goto end;
}

$currency=$_GET['currency'] ?? 'NGN'; // Default to NGN if not provided
$date = date('Y-m-d', strtotime(trim($_GET['date'])));
$dateFormatted = date('F d Y', strtotime($date));
$statusId=trim($_GET['statusId']);
///get sum total amount paid on that date
$totalAmountQuery = mysqli_query($conn, "
    SELECT IFNULL(SUM(amount), 0) AS totalAmount 
    FROM TRANSACTION_TAB 
    WHERE DATE(updatedTime) = '$date'
    AND statusId=4
");
$totalAmount = mysqli_fetch_assoc($totalAmountQuery)['totalAmount'];

$dataQuery = mysqli_query($conn, "
    SELECT transactionId, referenceId, userId, transactionTypeId, reasonForPayment, paymentMethodId, emailAddress, currency, balanceBefore, amount, balanceAfter, statusId, updatedTime AS payDate
    FROM TRANSACTION_TAB 
    WHERE currency='$currency' AND DATE(updatedTime) = '$date'
    AND statusId='$statusId' 
    ORDER BY DATE(updatedTime) DESC
");
 $allRecordCount = mysqli_num_rows($dataQuery);

$response = [
    'response'=> 200,
    'success'=> true,
    'message'=> "REVENUE FETCHED SUCCESSFULLY",
    'allRecordCount'=> $allRecordCount,
    'date' => $dateFormatted,
    'totalAmount' => $totalAmount,
    'currency' => $currency,
    'data'=>  [],
]; 



while ($fetchDataQuery = mysqli_fetch_assoc($dataQuery)) {
    // get referenceId details
    $referenceId = $fetchDataQuery['referenceId'];
    if ($referenceId && ($fetchDataQuery['reasonForPayment'] == 'Ebook')) {
        $referenceQuery = mysqli_query($conn, "SELECT * FROM EXAM_EBOOK_TAB WHERE ebookId='$referenceId'");
        $referenceData = mysqli_fetch_assoc($referenceQuery);
        $fetchDataQuery['referenceData'] = $referenceData;
    }
    if ($referenceId && ($fetchDataQuery['reasonForPayment'] == 'ExamRegistration')) {
        $referenceQuery = mysqli_query($conn, "SELECT * FROM STUDENT_EXAMS_REGISTRATION_TAB WHERE examRegistrationId='$referenceId'");
        $referenceData = mysqli_fetch_assoc($referenceQuery);
        // get examId details
        $examId = $referenceData['examId'];
        $examQuery = mysqli_query($conn, "SELECT examAbbr, regTitle FROM PUBLISH_TAB WHERE publishId='$examId'");
        $examData = mysqli_fetch_assoc($examQuery);
        $referenceData['examData'] = $examData;
        $fetchDataQuery['referenceData'] = $referenceData;
    }
    // get userId details
    $userId = $fetchDataQuery['userId'];
    $userQuery = mysqli_query($conn, "SELECT * FROM USER_VIEW WHERE userId='$userId'");
    $userData = mysqli_fetch_assoc($userQuery);
    $fetchDataQuery['userData'] = $userData;
    //get transactionTypeId details
    $transactionTypeId = $fetchDataQuery['transactionTypeId'];
    $transactionTypeQuery = mysqli_query($conn, "SELECT transactionTypeId, transactionTypeName FROM SETUP_TRANSACTION_TYPE_TAB WHERE transactionTypeId='$transactionTypeId'");
    $transactionTypeData = mysqli_fetch_assoc($transactionTypeQuery);
    $fetchDataQuery['transactionTypeData'] = $transactionTypeData;
    //get paymentMethodId details
    $paymentMethodId = $fetchDataQuery['paymentMethodId'];
    $paymentMethodQuery = mysqli_query($conn, "SELECT paymentMethodId, paymentMethodName FROM SETUP_PAYMENT_METHOD_TAB WHERE paymentMethodId='$paymentMethodId'");
    $paymentMethodData = mysqli_fetch_assoc($paymentMethodQuery);
    $fetchDataQuery['paymentMethodData'] = $paymentMethodData;
    //get statusId details
    $statusId = $fetchDataQuery['statusId'];
    $statusQuery = mysqli_query($conn, "SELECT statusId, statusName FROM SETUP_STATUS_TAB WHERE statusId='$statusId'");
    $statusData = mysqli_fetch_assoc($statusQuery);
    $fetchDataQuery['statusData'] = $statusData;


    $response['data'][] = $fetchDataQuery;
}

end:
echo json_encode($response);
?>