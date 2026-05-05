<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $countryId = $_GET['countryId'];

    $select = "SELECT * FROM BRANCH_VIEW WHERE statusId=1 AND countryId='$countryId' ORDER BY branchName ASC";

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
        'message' => "BRANCH ADDRESS FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>