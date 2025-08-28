<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>
<?php
	//////////////////declaration of variables//////////////////////////////////////
    $otp=trim($data['otp']);
	$firstName=trim(strtoupper($data['firstName']));
    $lastName=trim(strtoupper($data['lastName']));
    $fullName="$firstName $lastName";
    $emailAddress=trim($data['emailAddress']);
    $phoneNumber=trim($data['phoneNumber']);
    $countryId=trim($data['countryId']);
    $userTypeId=trim($data['userTypeId']);
    $password=trim($data['password']);
    $cpassword=trim($data['cPassword']);


    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($firstName, 'FIRST NAME');
    validateEmptyField($lastName, 'LAST NAME');
    validateEmptyField($emailAddress, 'EMAIL');
    validateEmptyField($phoneNumber, 'PHONE NUMBER');
    validateEmptyField($countryId, 'COUNTRY');
    validateEmptyField($userTypeId, 'USER TYPE');
    validateEmptyField($password, 'PASSWORD');
    validateEmptyField($cpassword, 'CONFIRM PASSWORD');
    
    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){ /// start if 1
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "Enter a valid email address and try again",
        ]; 
        goto end;
	}

    if($password!=$cpassword){
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "Password not matched. please check and try again.",
        ]; 
        goto end;
    }

    $query=mysqli_query($conn,"SELECT * FROM USERS_TAB WHERE emailAddress='$emailAddress'") or die (mysqli_error($conn));
    $countUser=mysqli_num_rows($query);
    if ($countUser>0){ /// start if 2
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "Account with this email already exist.",
        ];
        goto end;
    }
     ///////////////////////geting sequence//////////////////////////
        $countId='USER';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $userId=$countId.$no.date("Ymdhis");

        $password=md5($password);
        $accessKey=trim(md5($staffId.date("Ymdhis")));
        mysqli_query($conn,"INSERT INTO `USERS_TAB`
        (`userId`, `accessKey`, `otp`,  `firstName`, `lastName`, `emailAddress`, `phoneNumber`, `countryId`, `userTypeId`, `password`, `statusId`, `lastLoginDate`, `createdTime`) VALUES  
        ('$userId', '$accessKey', '$otp', '$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$countryId', '$userTypeId', '$password', 1, NOW(), NOW())")or die (mysqli_error($conn));

        /// delete the record
        mysqli_query($conn,"DELETE FROM `USER_SIGNUP_VERIFIER_TAB` WHERE emailAddress='$emailAddress'")or die (mysqli_error($conn));
        $response = [
            'response' => 200,
            'success'  => true,
            'message'  => "You have successfully signed up. kindly procees to your portal.",
            'data'=> array()
        ];
        $alertDetail="SIGNUP ALERT: A user whose name $fullName with ID: $userId has successfully signed up to international exam application";
        $callclass->_alertSequenceAndUpdate($conn,$countryId,$userId,$fullName,$alertDetail,$ipAddress,$systemName);
        $alertDetail="LOGIN ALERT: A user whose name $fullName with ID: $userId has successfully logged in to international exam application";
        $callclass->_alertSequenceAndUpdate($conn,$countryId,$userId,$fullName,$alertDetail,$ipAddress,$systemName);

        //// get user login details
        $loginUserId = $userId;
        require_once 'loginUserDetails.php';
        $response['data'] = $userData;
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>