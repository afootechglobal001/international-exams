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
	$titleId=trim(strtoupper($data['titleId']));
	$firstName=trim(strtoupper($data['firstName']));
    $middleName=trim(strtoupper($data['middleName']));
    $lastName=trim(strtoupper($data['lastName']));
    $emailAddress=trim(strtolower($data['emailAddress']));
    $phoneNumber=trim($data['phoneNumber']);
    $address =trim(strtoupper(str_replace("'", "\'", $data['address'])));
    $countryId=trim($data['countryId']);
    $branchId=trim($data['branchId']);
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
    validateEmptyField($address, 'ADDRESS');
    validateEmptyField($countryId, 'COUNTRY');
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($roleId, 'ROLE');
    validateEmptyField($statusId, 'STATUS');

    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){ /// start if 2
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

    if(!preg_match('/^[0-9]{10,15}$/', $phoneNumber)){ /// start if 3
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "INVALID MOBILE NUMBER! Enter a valid mobile number and try again",
        ];
        goto end;
    }

    if (strlen($phoneNumber) != 11) {
        $response = [
            'response' => 104,
            'success' => false,
            'message' => "INVALID PHONE NUMBER! NUMBER MUST BE EXACTLY 11 DIGITS."
        ];
        goto end;
    }

    $query=mysqli_query($conn,"SELECT emailAddress FROM STAFF_TAB WHERE emailAddress='$emailAddress'") or die (mysqli_error($conn));
    $countUser=mysqli_num_rows($query);

    if ($countUser>0){ /// start if 5
        $response = [
            'response'=> 105,
            'success'=> false,
            'message' => "This email ('$emailAddress') is already in use. Please try another Email Address."
        ];

        $alertDetail="STAFF REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a staff with an email address ($emailAddress) that is already in use.";	
        goto end;
    }

        ///////////////////////geting sequence//////////////////////////
        $countId='STAFF';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $staffId=$countId.$no.date("Ymdhis");
        $password=md5($staffId);

        mysqli_query($conn,"INSERT INTO `STAFF_TAB`
        (`countryId`, `branchId`, `staffId`, `titleId`, `firstName`, `middleName`, `lastName`, `emailAddress`, `phoneNumber`, `address`, `profilePix`, `statusId`, `roleId`, `password`, `createdBy`, `createdTime`) VALUES
        ('$countryId', '$branchId', '$staffId', '$titleId', '$firstName', '$middleName', '$lastName', '$emailAddress', '$phoneNumber', '$address', 'default.jpg', '$statusId', '$roleId', '$password', '$loginStaffId', NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "STAFF CREATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "STAFF CREATED SUCCESSFULLY: A staff whose name - $loginStaffFullname (ID: $loginStaffId) successfully registered a new staff with the email address ($emailAddress) - (ID: $staffId).";

        // Fetch staff details
        $select="SELECT * FROM STAFF_VIEW WHERE roleId < '$loginRoleId'";

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
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>