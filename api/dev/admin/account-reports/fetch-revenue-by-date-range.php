<?php 
require_once '../../config/connection.php';
require_once '../../config/staff-session-check.php';

$response = ['success' => false]; // Initialize

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

$dateFrom = date('Y-m-d', strtotime(trim($_GET['dateFrom'])));
$dateTo = date('Y-m-d', strtotime(trim($_GET['dateTo'])));

$dateFromFormatted = date('F d Y', strtotime($dateFrom));
$dateToFormatted = date('F d Y', strtotime($dateTo));

$statisticsQuery = mysqli_query($conn,"
    SELECT
        IFNULL((SELECT SUM(amount) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='CC'), 0) AS sumCreditCardPayments,
        IFNULL((SELECT SUM(amount) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='BT'), 0) AS sumBankTransferPayments,
        IFNULL((SELECT SUM(amount) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='WLT'), 0) AS sumWalletPayments,
        IFNULL((SELECT COUNT(transactionId) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='CC'), 0) AS countCreditCardPayments,
        IFNULL((SELECT COUNT(transactionId) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='BT'), 0) AS countBankTransferPayments,
        IFNULL((SELECT COUNT(transactionId) FROM TRANSACTION_TAB WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' AND statusId=4 AND paymentMethodId='WLT'), 0) AS countWalletPayments
");


if (!$statisticsQuery) {
    die("Data Query Failed: " . mysqli_error($conn));
}

$response = [
    'response'=> 200,
    'success'=> true,
    'message'=> "DASHBOARD REVENUE FETCHED SUCCESSFULLY",
    'dateFrom' => $dateFromFormatted,
    'dateTo' => $dateToFormatted,
    'currency' => $currency,
    'statistics' => [],
    'data'=>  [],
]; 

while ($statisticsDataQuery = mysqli_fetch_assoc($statisticsQuery)) {
    $response['statistics'][] = $statisticsDataQuery;
}

$dataQuery = mysqli_query($conn, "
    SELECT 
        DATE(updatedTime) AS payDate,
        SUM(CASE WHEN statusId = 4 THEN amount ELSE 0 END) AS totalSuccessfulPayments,
        SUM(CASE WHEN statusId = 3 THEN amount ELSE 0 END) AS totalPendingPayments,
        SUM(CASE WHEN statusId = 5 THEN amount ELSE 0 END) AS totalCancelledPayments
        
    FROM TRANSACTION_TAB
    WHERE currency = '$currency' AND DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo'
    GROUP BY DATE(updatedTime)
    ORDER BY DATE(updatedTime) DESC
");

while ($fetchDataQuery = mysqli_fetch_assoc($dataQuery)) {
    $response['data'][] = $fetchDataQuery;
}

end:
echo json_encode($response);
?>