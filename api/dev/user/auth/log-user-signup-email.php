<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>
<?php
	//////////////////declaration of variables//////////////////////////////////////
    $firstName=trim($data['firstName']);
    $lastName=trim($data['lastName']);
    $fullName="$firstName $lastName";
    $emailAddress=trim($data['emailAddress']);
    $countryId=trim($data['countryId']);
    $otp = rand(111111,999999);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($emailAddress, 'EMAIL');

    require_once '../../mail/user/email-verification.php';
    mysqli_query($conn,"INSERT INTO `USER_SIGNUP_VERIFIER_TAB`
    (`emailAddress`, `otp`, `createdTime`) VALUES 
    ('$emailAddress', '$otp',  NOW())")or die (mysqli_error($conn));
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "OTP SENT!",
        'data'     => [
            'email' => $emailAddress,
        ]
    ];

//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>