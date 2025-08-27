<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	$emailAddress=trim($data['emailAddress']);
	$p_password=$data['password'];
	$password=md5($p_password);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($userName, 'USERNAME');
    validateEmptyField($p_password, 'PASSWORD');

    if(!filter_var($userName, FILTER_VALIDATE_EMAIL)){ /// start if 1
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
	}

        $query=mysqli_query($conn,"SELECT * FROM USERS_TAB WHERE emailAddress='$emailAddress' AND `password`='$password'") or die (mysqli_error($conn));
        $countUser=mysqli_num_rows($query);
        if ($countUser==0){ /// start if 2
            $response = [
                'response'=> 103,
                'success'=> false,
                'message'=> "INVALID USERNAME OR PASSWORD! Kindly check the login parameters and try again.",
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

            if($statusId==2){ /// start if 3 (check if the user is suspended)
                $response = [
                    'response'=> 104,
                    'success'=> false,
                    'message'=> "ACCOUNT SUSPENDED! Contact the administrator for more info.",
                ];
                goto end;
            }

                if($statusId==1){ /// start if 4 (check if the user is active)
                    /// Generate login access key ///
                    $accessKey=trim(md5($userId.date("Ymdhis")));
                    /// update user on USERS_TAB
                    mysqli_query($conn,"UPDATE USERS_TAB SET accessKey='$accessKey', lastLoginDate=NOW() WHERE userId='$userId'")or die (mysqli_error($conn));

                    $response = [
                        'response'=> 200,
                        'success'=> true,
                        'message'=> "LOGIN SUCCESSFUL!",
                        'data' => array() // Initialize the data array
                    ];

                    // Fetch user details
                    $select="SELECT * FROM USER_VIEW WHERE userId = '$userId'";
                    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
                    $fetchQuery = mysqli_fetch_assoc($query);
                    $response['data'] = $fetchQuery;

                    $alertDetail="LOGIN ALERT: A user whose name $fullName with ID: $userId has successfully logged in to international exam application";
                }else {
                    $response = [
                        'response'=> 105,
                        'success'=> false,
                        'message'=> "ACCOUNT UNDER REVIEW! Contact the administrator for more info.",
                    ];
                    $alertDetail="LOGIN ALERT: A user whose name $fullName with ID: $userId was denied from logging in for account is under review";
                }
                $callclass->_alertSequenceAndUpdate($conn,$countryId,$userId,$fullName,$alertDetail,$ipAddress,$systemName);
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>