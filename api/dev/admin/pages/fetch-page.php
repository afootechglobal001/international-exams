<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/staff-session-check.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
    if(!$checkSession){
        $response=[
            'response' => 99,
            'success' => false,
            'message' => "SESSION EXPIRED! Please LogIn Again.",
        ];
        goto end;
    }
?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	$publishId=trim(($_GET['publishId']));

	validateEmptyField($publishId, 'PUBLISH ID');

    $response = [
        'response'=> 200,
        'success'=> true,
        'message'=> "PAGE FETCHED SUCCESFFULLY!",
        'data' => array() // Initialize the data array
    ];

    $select="SELECT * FROM PAGES_TAB WHERE publishId='$publishId'";
    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>