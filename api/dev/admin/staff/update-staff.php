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
	$titleId=trim(strtoupper($data['titleId']));
	$firstName=trim(strtoupper($data['firstName']));
    $middleName=trim(strtoupper($data['middleName']));
    $lastName=trim(strtoupper($data['lastName']));
    $emailAddress=trim(strtolower($data['emailAddress']));
    $phoneNumber=trim($data['phoneNumber']);
    $genderId=trim($data['genderId']);
    $dateOfBirth=trim($data['dateOfBirth']);
    $stateId=trim($data['stateId']);
    $lgaId=trim($data['lgaId']);
    $address=trim(strtoupper(str_replace("'", "\'", $data['address'])));
    $roleId=trim($data['roleId']);
    $statusId=trim($data['statusId']);
    //////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($titleId, 'TITLE');
    validateEmptyField($firstName, 'FIRST NAME');
    validateEmptyField($middleName, 'MIDDLE NAME');
    validateEmptyField($lastName, 'LAST NAME');
    validateEmptyField($emailAddress, 'EMAIL ADDRESS');
    validateEmptyField($phoneNumber, 'MOBILE NUMBER');
    validateEmptyField($genderId, 'GENDER');
    validateEmptyField($dateOfBirth, 'DATE OF BIRTH');
    validateEmptyField($stateId, 'STATE');
    validateEmptyField($lgaId, 'LOCAL GOVT AREA');
    validateEmptyField($address, 'ADDRESS');
    validateEmptyField($roleId, 'ROLE');
    validateEmptyField($statusId, 'STATUS');

    if (!$staffId){/// start if 2
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "STAFF ID REQUIRED! Check the fields and try again",
        ]; 
        goto end;
	}

    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){ /// start if 4
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

    if(!preg_match('/^[0-9]{10,15}$/', $phoneNumber)){ /// start if 4
        $response = [
            'response'=> 104,
            'success'=> false,
            'message'=> "INVALID MOBILE NUMBER! Enter a valid mobile number and try again",
        ];
        goto end;
    }

    if (strlen($phoneNumber) != 11) { /// start if 5
        $response = [
            'response' => 105,
            'success' => false,
            'message' => "INVALID PHONE NUMBER! NUMBER MUST BE EXACTLY 11 DIGITS."
        ];
        goto end;
    }

    $staffIdQuery=mysqli_query($conn,"SELECT staffId FROM staff_tab WHERE staffId='$staffId'") or die (mysqli_error($conn));
    $staffIdCheck=mysqli_num_rows($staffIdQuery);

    if ($staffIdCheck==0){ /// start if 6
        $response = [
            'response'=> 106,
            'success'=> false,
            'message' => "This STAFF ID ('$staffId') is not found. Please provide correct STAFF ID."
        ];

        $alertDetail="STAFF UPDATE ATTEMPT FAILED: A staff whose name - $loginStaffFullname (ID: $loginStaffId) attempted to update a staff with a non-existent ID ($staffId).";
        goto end;
    }

    $query=mysqli_query($conn,"SELECT staffId, emailAddress FROM staff_tab WHERE emailAddress='$emailAddress' AND staffId!='$staffId'") or die (mysqli_error($conn));
    $countUser=mysqli_num_rows($query);

    if ($countUser>0){ /// start if 7
        $response = [
            'response'=> 107,
            'success'=> false,
            'message' => "This email ('$emailAddress') is already in use. Please try another Email Address."
        ];

        $alertDetail="STAFF UPDATE ATTEMPT FAILED: A staff whose name - $loginStaffFullname (ID: $loginStaffId) attempted to update a staff with an email address ($emailAddress) that is already in use.";
        goto end;
    }

        mysqli_query($conn,"UPDATE `staff_tab` SET
        `titleId`='$titleId', `firstName`='$firstName', `middleName`='$middleName', `lastName`='$lastName', `emailAddress`='$emailAddress', `phoneNumber`='$phoneNumber', `genderId`='$genderId', 
        `dateOfBirth`='$dateOfBirth', `stateId`='$stateId', `lgaId`='$lgaId', `address`='$address', `statusId`='$statusId', `roleId`='$roleId', `updatedBy`='$loginStaffId', `updatedTime`=NOW() WHERE staffId='$staffId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "STAFF UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail="STAFF UPDATE ATTEMPT SUCCESS: A staff whose name - $loginStaffFullname (ID: $loginStaffId) successfully updated a staff with an email address ($emailAddress) - (ID: $staffId).";

        // Fetch staff details
        $select="SELECT * FROM STAFF_VIEW WHERE roleId < '$loginRoleId'";

        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $createdBy=$fetchQuery['createdBy'];
            $updatedBy=$fetchQuery['updatedBy'];

            /////////////////// for  CreatedBy /////////
            $createdByData=array();
            $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM staff_tab WHERE staffId='$createdBy'");
            while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
                $createdByData[] = $getCreatedByfetch;
            }
            $fetchQuery['createdBy']= $createdByData;

            /////////////////// for  UpdatedBy /////////
            $updatedByData=array();
            $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM staff_tab WHERE staffId='$updatedBy'");
            while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
                $updatedByData[] = $getUpdatedByfetch;
            }
            $fetchQuery['updatedBy']= $updatedByData;

            $response['data'][] = $fetchQuery;
        }

end:
$callclass->_alertSequenceAndUpdate($conn,$loginStaffId,$loginStaffFullname,$loginRoleId,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>