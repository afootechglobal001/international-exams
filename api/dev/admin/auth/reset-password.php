<?php require_once '../../config/connection.php';?>
<?php if (!$checkBasicSecurity) {goto end;}?>

<?php
	//////////////////declaration of variables//////////////////////////////////////
	$email=trim($data['email']);

	////////////////////////////////////////////////////////////////////////////////
    validateEmptyField($email, 'EMAIL ADDRESS'); 

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
	}

    $query=mysqli_query($conn,"SELECT * FROM STAFF_VIEW WHERE emailAddress='$email'") or die (mysqli_error($conn));
    $countUser=mysqli_num_rows($query);

    if ($countUser==0){ /// start if 4
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "USER DOES NOT EXIST! Kindly check the email and try again.",
        ];
        goto end;
    }

        $fetchQuery=mysqli_fetch_array($query);
        $staffId=$fetchQuery['staffId']; 
        $statusId=$fetchQuery['statusId'];
        $branchId=$fetchQuery['branchId'];
        $titleId=$fetchQuery['titleId'];
        $firstName=$fetchQuery['firstName'];
        $lastName=$fetchQuery['lastName'];
        $fullName="$titleId $firstName $lastName";

        if($statusId!=1){
            $response = [
                'response'=> 102,
                'success'=> false,
                'message'=> "ACCOUNT ERROR! Contact the administrator for more info.",
            ];
            goto end;
        }

        /// Generate login access key
        $accessKey=trim(md5($staffId.date("Ymdhis")));
        /// update user on staff_tab
        mysqli_query($conn,"UPDATE STAFF_TAB SET accessKey='$accessKey', lastLoginTime=NOW() WHERE staffId='$staffId'")or die (mysqli_error($conn));

        /// Send Link to email Address ////
        require_once '../../mail/admin/reset-password.php';

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EMAIL VERIFICATION LINK SENT!",
            'email' => $email,
            'fullName' => $fullName,
        ];
        
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>