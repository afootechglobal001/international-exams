<?php require_once '../config/connection.php';?>
<?php require_once '../config/staff-session-check.php';?>

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
	$q = $_GET['q'];
	$loginRoleId = $_GET['loginRoleId'];
	$roleId=trim(strtoupper($_POST['roleId']));

	$select="SELECT * FROM setup_role_tab WHERE (roleName LIKE '%$q%' AND roleId<='$loginRoleId')";

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
			'message' => "ROLE FETCH SUCCESFFULY!",
			'allRecordCount' => $allRecordCount,
			'data' => array() // Initialize the data array
		];
		while ($fetch_query = mysqli_fetch_assoc($query)) {
			$response['data'][] = $fetch_query;
		}
		
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>