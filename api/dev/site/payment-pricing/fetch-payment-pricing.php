<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId = $_GET['pageCategoryId'];
    $countryId = $_GET['countryId'];

    $select = "SELECT 
        a.pageCategoryId,
        a.publishId, 
        a.regTitle, 
        a.examAbbr,
        a.regPix,
        a.examLogo,
        a.incentives,
        b.countryId,
        b.examId,
        b.amount,
        b.physicalLectureAmount,
        b.onlineLectureAmount,
        b.currency
        FROM PUBLISH_TAB a
        JOIN BRANCH_EXAM_PRICING_TAB b ON a.publishId = b.examId
            AND b.countryId ='$countryId'
            AND a.statusId =1
        AND a.pageCategoryId ='$pageCategoryId'
        AND (a.parentPublishId IS NULL OR a.parentPublishId = '')
    ";

    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
    $allRecordCount=mysqli_num_rows($query);
    if($allRecordCount==0){///start if 1
        $response['response']=200;
        $response['success']=false;
        $response['message']="No Record found";
        goto end;
    }

    $response=[
        'response' => 200,
        'success' => true,
        'message' => "EXAM FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $publishId=$fetchQuery['publishId'];
        $countryId=$fetchQuery['countryId'];

        // Fetch Account Details
        $accountData = array();
        $getAccountQuery = mysqli_query($conn,
            "SELECT countryId, accountName, accountNumber, bankName, dollarAccountName, dollarAccountNumber, dollarAccountBank
            FROM COUNTRY_TAB 
            WHERE countryId = '$countryId'"
        );
        while ($getAccountFetch = mysqli_fetch_assoc($getAccountQuery)) {
            $accountData = $getAccountFetch;
        }
        $fetchQuery['accountData'] = $accountData;

        $response['data'][]= $fetchQuery;
    }
end:
echo json_encode($response);
?>