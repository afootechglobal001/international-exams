<?php require_once '../config/connection.php';?>
<?php
if (!$checkBasicSecurity){/// start if 1
    goto end;
}

    $select="SELECT * FROM setup_states_tab";
    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));

    $response=[
        'response'=>200,
        'success'=>true,
        'message'=>"STATE FETCH SUCCESFFULY!",
        'data' => array() // Initialize the data array
    ];
    
    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>