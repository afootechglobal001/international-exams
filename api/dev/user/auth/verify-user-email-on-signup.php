<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>
<?php
//////////////////declaration of variables//////////////////////////////////////
    $firstName=trim($data['firstName']);
    $lastName=trim($data['lastName']);
    $emailAddress=trim($data['emailAddress']);
    $phoneNumber=trim($data['phoneNumber']);
    $countryId=trim($data['countryId']);
    $userTypeId=trim($data['userTypeId']);
    $password=trim($data['password']);
    $cpassword=trim($data['cpassword']);
//////////////////////////////////////////////////////////////////////////////////////////////
    $fullName="$firstName $lastName";
    $otp = rand(111111,999999);

//////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($firstName, 'FIRST NAME');
    validateEmptyField($lastName, 'LAST NAME');
    validateEmptyField($emailAddress, 'EMAIL');
    validateEmptyField($phoneNumber, 'PHONE NUMBER');
    validateEmptyField($countryId, 'COUNTRY');
    validateEmptyField($userTypeId, 'USER TYPE');
    validateEmptyField($password, 'PASSWORD');
    validateEmptyField($cpassword, 'CONFIRM PASSWORD');
    
    
    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
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
   ////////////////////////////////////////////////////////////////////////////////////////////// 
   /////delete previous otp if exist for the email
    mysqli_query($conn,"DELETE FROM `USER_SIGNUP_VERIFIER_TAB` WHERE emailAddress='$emailAddress'") or die (mysqli_error($conn));
    /////////// send otp to email
    require_once '../../mail/user/email-verification.php';
    ///////////// insert otp and details to database
    mysqli_query($conn,"INSERT INTO `USER_SIGNUP_VERIFIER_TAB`
    (`firstName`, `lastName`, `emailAddress`, `phoneNumber`, `countryId`, `userTypeId`, `password`, `otp`, `createdTime`) VALUES 
    ('$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$countryId', '$userTypeId', '$password', '$otp', NOW())") or die (mysqli_error($conn));
    ////// response
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "OTP SENT!",
        'data'     => [
            'fullName' => $fullName,
            'email' => $emailAddress,
        ]
    ];

//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>