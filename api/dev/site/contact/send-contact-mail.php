<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>
<?php
		//////////////////declaration of variables//////////////////////////////////////
        $countryId =trim($_GET['countryId']);
		$fullName = trim($data['fullName']);
		$email = trim($data['email']);
        $phoneNumber = trim($data['phoneNumber']);
		$subject = trim($data['subject']);
		$message =str_replace("'", "\'", $data['message']);

        validateEmptyField($countryId, 'COUNTRY');
        validateEmptyField($fullName, 'FULLNAME');
        validateEmptyField($email, 'EMAIL ADDRESS');
        validateEmptyField($phoneNumber, 'PHONE NUMBER');
        validateEmptyField($subject, 'SUBJECT');
        validateEmptyField($message, 'MESSAGE');

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response = [
                'response'=> 102,
                'success'=> false,
                'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
            ]; 
            goto end;
        }
                    
			$userCheck=mysqli_query($conn,"SELECT * FROM NEWS_LETTER_TAB WHERE email='$email'");
			$userCount=mysqli_num_rows($userCheck);

			if ($userCount>0){
				mysqli_query($conn,"UPDATE NEWS_LETTER_TAB SET countryId='$countryId', fullName='$fullName', email='$email', phoneNumber='$phoneNumber', subject='$subject', message='$message', updatedTime=NOW() WHERE email='$email'")or die (mysqli_error($conn));  	
			} else {
				/// Insert Into news_letter_tab Tab
				mysqli_query($conn,"INSERT INTO `NEWS_LETTER_TAB`
                (`countryId`, `fullName`, `email`, `phoneNumber`, `subject`, `message`, `createdTime`, `updatedTime`) VALUES
				('$countryId', '$fullName', '$email', '$phoneNumber', '$subject', '$message', NOW(), NOW())")or die (mysqli_error($conn));
			}
				
			    ////// send Message to email
				require_once('../../mail/site/send-contact-mail.php');	

				$response = [
					'response'=> 200,
					'success'=> true,
					'message'=> "Your Message has been sent successfully!"
				]; 
		
end:
echo json_encode($response);
?>
