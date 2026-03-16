<?php require_once '../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $countryId = $_GET['countryId'];
    $examId = $_GET['examId'];
    // Securely escape $q
    $select = "SELECT * FROM EXAM_LOCATION_TAB WHERE countryId ='$countryId' AND examId='$examId' ORDER BY locationName ASC";

    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
    $allRecordCount=mysqli_num_rows($query);
    $response=[
        'response' => 200,
        'success' => true,
        'message' => "EXAM LOCATION FETCH SUCCESFFULY!",
        'data' => array() // Initialize the data array
    ];
    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>