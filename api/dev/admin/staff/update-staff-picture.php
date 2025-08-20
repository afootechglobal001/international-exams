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
	$staffId = $_GET['staffId'];
	$profilePix = $_FILES['profilePix']['name'];

	if(!$staffId){
		$response=[
			'response' => 100,
			'success' => false,
			'message' => "STAFF ID REQUIRED! Provide staff ID to continue"
		];
		goto end;
	}

	if($staffId!==$loginStaffId){ /// login_staff_id is coming from admin-session-check.php ///
		$response=[
			'response' => 101,
			'success' => false,
			'message' => "SECURITY ACCESS DENIED! You are not allowed to execute this command due to a security breach."
		];
		goto end;
	}

	$allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
	$extension = pathinfo($_FILES['profilePix']['name'], PATHINFO_EXTENSION);
	
	if (!in_array(($extension), $allowedExts)) {
		$response = [
			'response' => 102,
			'success' => false,
			'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
		];  
		goto end;
	}
	
		$datetime = date("Ymdhi");
		$profilePix = $staffId . '_' . $datetime . '_' . $profilePix;
	
		$userArray = $callclass->_getStaffDetails($conn, $staffId);
		$userFetchedArray = json_decode($userArray, true);
		$dbPassport = $userFetchedArray[0]['profilePix'];
		$titleId=$userFetchedArray[0]['titleId'];
        $firstName=$userFetchedArray[0]['firstName'];
        $lastName=$userFetchedArray[0]['lastName'];
        $fullName="$titleId $firstName $lastName";
		
		mysqli_query($conn,"UPDATE `STAFF_TAB` SET profilePix='$profilePix' WHERE staffId='$staffId'")or die (mysqli_error($conn));

		$response = [
			'response'=> 200,
			'success'=> true,
			'profilePix' => $profilePix,
			'oldProfilePix' => $dbPassport,
			'message'=> 'SUCCESS! Staff picture updated successfully!',
			'data' => array() // Initialize the data array
		];  

		$alertDetail="STAFF PICTURE UPDATED SUCCESSFUL:A staff whose name - $loginStaffFullname, successfully uploaded his/her profile picture. DETAILS: - Full Name: $fullName, ID: $staffId";	

		// Fetch staff details
        $select="SELECT * FROM STAFF_VIEW WHERE staffId='$staffId'";

        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $createdBy=$fetchQuery['createdBy'];
            $updatedBy=$fetchQuery['updatedBy'];

            /////////////////// for  CreatedBy /////////
            $createdByData=array();
            $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$createdBy'");
            while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
                $createdByData[] = $getCreatedByfetch;
            }
            $fetchQuery['createdBy']= $createdByData;

            /////////////////// for  UpdatedBy /////////
            $updatedByData=array();
            $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
            while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
                $updatedByData[] = $getUpdatedByfetch;
            }
            $fetchQuery['updatedBy']= $updatedByData;

            $response['data'][] = $fetchQuery;
        }

end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginStaffId,$loginStaffFullname,$loginRoleId,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>