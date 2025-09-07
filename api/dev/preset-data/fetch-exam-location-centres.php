<?php require_once '../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $locationId = $_GET['locationId'];

    // Securely escape $q
    $select = "SELECT * FROM EXAM_CENTRE_TAB WHERE locationId='$locationId' ORDER BY centreName ASC";
    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));

    $response=[
        'response' => 200,
        'success' => true,
        'message' => "EXAM CENTER FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>