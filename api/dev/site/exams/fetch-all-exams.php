<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId = $_GET['pageCategoryId'];

    $select = "SELECT 
        a.pageCategoryId,
        a.publishId, 
        a.regTitle, 
        a.examAbbr,
        a.regPix,
        a.examLogo, 
        b.pageUrl,
        c.amount,
        c.currency
        FROM PUBLISH_TAB a
        JOIN PAGES_TAB b
            ON a.publishId= b.publishId
        JOIN (
            SELECT publishId, MAX(amount) AS amount, MAX(currency) AS currency
            FROM BRANCH_EXAM_PRICING_TAB
            GROUP BY publishId
        ) c ON a.publishId = c.publishId
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
        $response['data'][]= $fetchQuery;
    }
end:
echo json_encode($response);
?>