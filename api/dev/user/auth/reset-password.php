<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	//////////////////declaration of variables//////////////////////////////////////
	$userId=($data['userId']);
    $otp=trim($data['otp']);
    $newPassword=($data['newPassword']);
    $cnewPassword=($data['cnewPassword']);
    
	////////////////////////////////////////////////////////////////////////////////
    validateEmptyField($userId, 'USER ID');
    validateEmptyField($otp, 'OTP');
    validateEmptyField($newPassword, 'NEW PASSWORD');
    validateEmptyField($cnewPassword, 'CONFIRM NEW PASSWORD');

    /// check if the otp is correct
    $query=mysqli_query($conn,"SELECT * FROM USERS_TAB WHERE userId='$userId' AND otp='$otp'") or die (mysqli_error($conn));
    $count=mysqli_num_rows($query);
    if ($count==0){ /// start if 4
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID OTP! Check and try again.",
        ];
        goto end;
    }

    $fetchQuery=mysqli_fetch_array($query);
    $countryId=$fetchQuery['countryId'];
    $firstName=$fetchQuery['firstName'];
    $lastName=$fetchQuery['lastName'];
    $fullName="$firstName $lastName";
    
    $newPassword=md5($data['newPassword']);
    $cnewPassword=md5($data['cnewPassword']);

     if ($newPassword!=$cnewPassword){ /// start if 4
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "NEW PASSWORD NOT MATCH! Check and try again.",
        ];
        goto end;
    }
    
    /// Generate login access key
    $accessKey=trim(md5($userId.date("Ymdhis")));
    mysqli_query($conn,"UPDATE USERS_TAB SET accessKey='$accessKey', password='$newPassword'  WHERE userId='$userId'") or die (mysqli_error($conn));

    $alertDetail="RESET PASSWORD SUCCESSFUL: A user whose name $fullName with ID: $userId has successfully reset their password on international exam application";
    $callclass->_alertSequenceAndUpdate($conn,$countryId,$userId,$fullName,$alertDetail,$ipAddress,$systemName);

    $response['response']=200; 
    $response['success']=true;
    $response['message']="PASSWORD CHANGED SUCCESSFULLY!"; 
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>