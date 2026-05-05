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

$dateFrom = date('Y-m-d', strtotime(trim($_GET['dateFrom'])));
$dateTo = date('Y-m-d', strtotime(trim($_GET['dateTo'])));

$dateFromFormatted = date('F d Y', strtotime($dateFrom));
$dateToFormatted = date('F d Y', strtotime($dateTo));

$response = [
    'response'=> 200,
    'success'=> true,
    'message'=> "DASHBOARD REVENUE FETCHED SUCCESSFULLY",
    'dateFrom' => $dateFromFormatted,
    'dateTo' => $dateToFormatted,
    'incomeData'=>  [],
    'walletData'=>  [],
    'totalIncome' => 0,
    'totalWalletBalance' => 0
]; 

$incomeQuery = mysqli_query($conn, "
    SELECT SUM(amount) AS incomeAmount, DATE(updatedTime) AS payDate 
    FROM TRANSACTION_TAB 
    WHERE DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' 
    AND transactionTypeId='PMT' AND statusId=4 
    GROUP BY DATE(updatedTime) 
    ORDER BY DATE(updatedTime) ASC
");

while ($fetchDataQuery = mysqli_fetch_assoc($incomeQuery)) {
    $response['incomeData'][] = $fetchDataQuery;
    $response['totalIncome'] += $fetchDataQuery['incomeAmount'];
}

$walletQuery = mysqli_query($conn, "
    SELECT SUM(amount) AS walletAmount, DATE(updatedTime) AS payDate 
    FROM TRANSACTION_TAB 
    WHERE DATE(updatedTime) BETWEEN '$dateFrom' AND '$dateTo' 
    AND transactionTypeId='CRD' AND statusId=4 
    GROUP BY DATE(updatedTime) 
    ORDER BY DATE(updatedTime) ASC
");

while ($fetchDataQuery = mysqli_fetch_assoc($walletQuery)) {
    $response['walletData'][] = $fetchDataQuery; 
}

$walletBalanceQuery = mysqli_query($conn, "SELECT SUM(walletBalance) AS totalWalletBalance FROM USERS_TAB WHERE statusId=1");
$fetchWalletBalanceQuery = mysqli_fetch_assoc($walletBalanceQuery);
$response['totalWalletBalance'] = $fetchWalletBalanceQuery['totalWalletBalance'];

end:
echo json_encode($response);
?>