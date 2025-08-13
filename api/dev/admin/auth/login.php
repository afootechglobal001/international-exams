<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	$userName=trim($data['userName']);
	$p_password=$data['password'];
	$password=md5($p_password);
	////////////////////////////////////////////////////////////////////////////////

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

        $query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE emailAddress='$userName' AND `password`='$password'") or die (mysqli_error($conn));
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
            $staffId=$fetchQuery['staffId']; 
            $statusId=$fetchQuery['statusId'];
            $roleId=$fetchQuery['roleId'];
            $titleId=$fetchQuery['titleId'];
            $firstName=$fetchQuery['firstName'];
            $lastName=$fetchQuery['lastName'];
            $fullName="$titleId $firstName $lastName";

            if($statusId==2){ /// start if 3 (check if the user is suspended)
                $response = [
                    'response'=> 104,
                    'success'=> false,
                    'message'=> "ACCOUNT SUSPENDED! Contact the administrator for more info.",
                ];

                $alertDetail="LOGIN ALERT: A Staff whose name $fullName with ID: $staffId was denied from logging in for account suspension";
                goto end;
            }

                if($statusId==1){ /// start if 4 (check if the user is active)
                    /// Generate login access key ///
                    $accessKey=trim(md5($staffId.date("Ymdhis")));
                    /// update user on staff_tab
                    mysqli_query($conn,"UPDATE staff_tab SET accessKey='$accessKey', lastLoginTime=NOW() WHERE staffId='$staffId'")or die (mysqli_error($conn));

                    $response = [
                        'response'=> 200,
                        'success'=> true,
                        'message'=> "LOGIN SUCCESSFUL!",
                        'data' => array() // Initialize the data array
                    ];

                    // Fetch staff details
                    $select="SELECT * FROM STAFF_VIEW WHERE staffId = '$staffId'";

                    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
                    while ($fetchQuery = mysqli_fetch_assoc($query)) {
                        $staffId=$fetchQuery['staffId'];
                        $roleId=$fetchQuery['roleId'];
                        $titleId=$fetchQuery['titleId'];
                        $firstName=$fetchQuery['firstName'];
                        $lastName=$fetchQuery['lastName'];
                        $fullName="$titleId $firstName $lastName";
                        $fetchQuery['fullName']=$fullName;
                        $response['data'][] = $fetchQuery;
                    }

                    $alertDetail="LOGIN ALERT: A Staff whose name $fullName with ID: $staffId has successfully logged in to international exam application";
                }else {
                    $response = [
                        'response'=> 105,
                        'success'=> false,
                        'message'=> "ACCOUNT UNDER REVIEW! Contact the administrator for more info.",
                    ];
                    
                    $alertDetail="LOGIN ALERT: A Staff whose name $fullName with ID: $staffId was denied from logging in for account is under review";
                    goto end;
                }
                
//////////////////////////////////////////////////////////////////////////////////////////////
end:
$callclass->_alertSequenceAndUpdate($conn,$staffId,$fullName,$roleId,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>