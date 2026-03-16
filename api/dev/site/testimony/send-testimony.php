<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>
<?php
		//////////////////declaration of variables//////////////////////////////////////
		$countryId =trim($_GET['countryId']);
		$fullName=trim(strtoupper($data['fullName']));
    	$emailAddress=trim($data['emailAddress']);
    	$mobileNumber=trim($data['mobileNumber']);
		$testimony =trim(str_replace("'", "\'", $data['testimony']));

		//////////////////check for empty fields//////////////////////////////////////
		validateEmptyField($fullName, 'FULLNAME');
		validateEmptyField($emailAddress, 'EMAIL ADDRESS');
		validateEmptyField($mobileNumber, 'MOBILE NUMBER');
		validateEmptyField($testimony, 'TESTIMONY');

		if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){ /// start if 2
			$response = [
				'response'=> 102,
				'success'=> false,
				'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
			]; 	
			goto end;
		}

		 if (strlen($mobileNumber) != 11) {
			$response = [
				'response' => 103,
				'success' => false,
				'message' => "INVALID PHONE NUMBER! NUMBER MUST BE EXACTLY 11 DIGITS."
			];
			goto end;
		}
			
			$query=mysqli_query($conn,"SELECT emailAddress FROM TESTIMONY_TAB WHERE emailAddress='$emailAddress'") or die (mysqli_error($conn));
			$countUser=mysqli_num_rows($query);

			if ($countUser>0){ /// start if 5
				$response = [
					'response'=> 104,
					'success'=> false,
					'message' => "This email ('$emailAddress') is already in use. Please try another Email Address."
				];
				goto end;
			}
				
				///////////////////////geting sequence//////////////////////////
				$countId='TESTIMONY';
				$sequence=$callclass->_getSequenceCount($conn, $countId);
				$array = json_decode($sequence, true);
				$no= $array[0]['no'];
				$testimonyId=$countId.$no.date("Ymdhis");
				
				/// Insert Into Satff Tab
				mysqli_query($conn,"INSERT INTO `TESTIMONY_TAB`
				(`countryId`, `testimonyId`, `fullName`, `emailAddress`, `mobileNumber`, `testimony`, `statusId`, `createdTime`, `updatedTime`) VALUES
				('$countryId', '$testimonyId', '$fullName', '$emailAddress', '$mobileNumber','$testimony', 3, NOW(), NOW())")or die (mysqli_error($conn));

				////// send Link to email
				require_once('../../mail/site/testimony-mail.php');	

				$response = [
					'response' => 200,
					'success'  => true,
					'fullName'=> $fullName,
					'message'  => "SUCCESS! Your Testimony has been submitted and is under review!"
				]; 
		
end:
echo json_encode($response);
?>
