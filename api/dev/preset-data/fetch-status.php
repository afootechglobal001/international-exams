<?php require_once '../config/connection.php';?>

<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $q = $_GET['q'];
    $statusIds = $_GET['statusId'];
    if ($statusIds !=''){
        $whareClause= "AND statusId IN ($statusIds)";
    }
    $select="SELECT * FROM SETUP_STATUS_TAB WHERE (statusName LIKE '%$q%' $whareClause)";
    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));

    $allRecordCount=mysqli_num_rows($query);
    if($allRecordCount==0){///start if 1
        $response = [
            'response' => 200,
            'success' => false,
            'message' => "No Record found"
        ];
        goto end;
    }

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "STATUS FETCH SUCCESFFULY!",
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