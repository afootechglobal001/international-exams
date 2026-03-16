<?php require_once '../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
    $select="SELECT * FROM COUNTRY_TAB";
    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));

    $response=[
        'response' => 200,
        'success' => true,
        'message' => 'COUNTRY FETCH SUCCESSFULLY!',
        'data' => array() // Initialize the data array
    ];
    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>