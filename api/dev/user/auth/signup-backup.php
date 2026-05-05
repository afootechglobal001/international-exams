<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>
<?php
//////////////////declaration of variables//////////////////////////////////////
	$emailAddress=trim($data['emailAddress']);
    $otp =trim($data['otp']);
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($emailAddress, 'EMAIL');
    validateEmptyField($otp, 'OTP');

    $query=mysqli_query($conn,"SELECT * FROM USER_SIGNUP_VERIFIER_TAB WHERE emailAddress='$emailAddress' AND `otp`='$otp'") or die (mysqli_error($conn));
    $countUser=mysqli_num_rows($query);
    if ($countUser==0){ /// start if 2
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "OTP is not correct. Please check and try again.",
        ];
        goto end;
    }
    ////// get all user details from the otp table
    $row=mysqli_fetch_array($query);
    $firstName=$row['firstName'];
    $lastName=$row['lastName'];
    $fullName="$firstName $lastName";
    $emailAddress=$row['emailAddress'];
    $phoneNumber=$row['phoneNumber'];
    $countryId=$row['countryId'];
    $userTypeId=$row['userTypeId'];
    $password=$row['password'];

    //// get country details
    $query=mysqli_query($conn,"SELECT * FROM COUNTRY_TAB WHERE countryId='$countryId'") or die (mysqli_error($conn));
    $row=mysqli_fetch_array($query);
    $countryName=$row['countryName'];

    ///// get user type details
    $query=mysqli_query($conn,"SELECT * FROM SETUP_USER_TYPE_TAB WHERE userTypeId='$userTypeId'") or die (mysqli_error($conn));
    $row=mysqli_fetch_array($query);
    $userTypeName=$row['userTypeName'];
    
    /////check if the email exist in the user table
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
    $accessKey=trim(md5($userId.date("Ymdhis")));
    
    mysqli_query($conn,"INSERT INTO `USERS_TAB`
    (`userId`, `accessKey`, `otp`,  `firstName`, `lastName`, `emailAddress`, `phoneNumber`, `countryId`, `userTypeId`, `password`, `statusId`, `lastLoginDate`, `createdTime`) VALUES  
    ('$userId', '$accessKey', '$otp', '$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$countryId', '$userTypeId', '$password', 1, NOW(), NOW())")or die (mysqli_error($conn));
    
    /// delete the record
    mysqli_query($conn,"DELETE FROM `USER_SIGNUP_VERIFIER_TAB` WHERE emailAddress='$emailAddress'")or die (mysqli_error($conn));
    require_once '../../mail/user/signup-success.php';
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "You have successfully signed up. kindly proceed to your portal.",
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