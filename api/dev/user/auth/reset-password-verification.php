<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	$emailAddress=trim($data['emailAddress']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($emailAddress, 'EMAIL ADDRESS');

    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){ /// start if 1
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
	}

        $query=mysqli_query($conn,"SELECT * FROM USERS_TAB WHERE emailAddress='$emailAddress'") or die (mysqli_error($conn));
        $countUser=mysqli_num_rows($query);
        if ($countUser==0){ /// start if 2
            $response = [
                'response'=> 103,
                'success'=> false,
                'message'=> "INVALID EMAIL ADDRESS! Kindly check the email address and try again.",
            ];
            goto end;
        }

            $fetchQuery=mysqli_fetch_array($query);
            $userId=$fetchQuery['userId'];
            $countryId=$fetchQuery['countryId'];
            $statusId=$fetchQuery['statusId'];
            $firstName=$fetchQuery['firstName'];
            $lastName=$fetchQuery['lastName'];
            $fullName="$firstName $lastName";
            $otp = rand(111111,999999);

            if($statusId==2){ /// start if 3 (check if the user is suspended)
                $response = [
                    'response'=> 104,
                    'success'=> false,
                    'message'=> "ACCOUNT SUSPENDED! Contact the administrator for more info.",
                ];
                goto end;
            }

                if($statusId==1){ /// start if 4 (check if the user is active)
                    ///// update the otp in the database
                    mysqli_query($conn,"UPDATE USERS_TAB SET otp='$otp' WHERE userId='$userId'") or die (mysqli_error($conn));
                    require_once '../../mail/user/reset-password-verification.php';
                    $response = [
                        'response'=> 200,
                        'success'=> true,
                        'message'=> "PROCEED TO RESET PASSWORD!",
                        'data'=> [
                            'userId' => $userId,
                            'emailAddress' => $emailAddress,
                            'fullName' => $fullName
                        ]
                    ];

                    $alertDetail="RESET PASSWORD ALERT: A user whose name $fullName with ID: $userId has initiated the reset password process on international exam application";
                }else {
                    $response = [
                        'response'=> 105,
                        'success'=> false,
                        'message'=> "ACCOUNT UNDER REVIEW! Contact the administrator for more info.",
                    ];
                    $alertDetail="RESET PASSWORD ALERT: A user whose name $fullName with ID: $userId was denied from resetting password for account is under review";
                }
                $callclass->_alertSequenceAndUpdate($conn,$countryId,$userId,$fullName,$alertDetail,$ipAddress,$systemName);
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>