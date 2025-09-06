<?php require_once '../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $countryId=trim($_GET['countryId']);
    $examId=trim($_GET['examId']);
    if($examId!=""){
        $examIds="AND a.publishId='$examId'";
    }

    $select = "SELECT a.*, b.publishId, b.regTitle, b.examAbbr, b.regPix FROM BRANCH_EXAM_PRICING_TAB a, PUBLISH_TAB b WHERE a.countryId='$countryId' AND a.publishId=b.publishId $examIds";

    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
    $allRecordCount=mysqli_num_rows($query);
    if($allRecordCount==0){///start if 1
        $response['response']=200;
        $response['success']=false;
        $response['message']="No Exam Record found for this country";
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
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>