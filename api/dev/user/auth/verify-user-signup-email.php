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
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "EMAIl VERIFIED!",
    ];

//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>