<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/user-session-check.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
    if(!$checkSession){
        $response=[
            'response' => 99,
            'success' => false,
            'message' => "SESSION EXPIRED! Please LogIn Again.",
        ];
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
	$examId=trim(($data['examId']));
    $ebookId=trim(($data['ebookId']));
    

    //////////////////check for empty fields//////////////////////////////////////
        validateEmptyField($examId, 'EXAM ID');
        validateEmptyField($ebookId, 'EBOOK ID');
    ///////////////////////geting sequence//////////////////////////
        $countId='ER';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $examRegistrationId=$countId.$no.date("Ymdhis");
        
        ///get country paymentKey
        $query=mysqli_query($conn,"SELECT paymentKey FROM COUNTRY_TAB WHERE countryId='$countryId'") or die (mysqli_error($conn));
        $fetchQuery=mysqli_fetch_array($query);
        $paymentKey=$fetchQuery['paymentKey'];


        mysqli_query($conn,"INSERT INTO `STUDENT_EXAMS_REGISTRATION_TAB`
        (`examRegistrationId`, `countryId`, `studentId`, `examId`, `locationId`, `centreId`, `examDate`, `altExamDate`, `firstName`, `middleName`, `lastName`, `dob`, `emailAddress`, `phoneNumber`, `residentialAddress`, `genderId`, `statusId`, `createdTime`) VALUES
        ('$examRegistrationId', '$countryId', '$studentId', '$examId', '$locationId', '$centreId', '$examDate', '$altExamDate', '$firstName', '$middleName', '$lastName', '$dob', '$emailAddress', '$phoneNumber', '$residentialAddress', '$genderId', 3, NOW())")or die (mysqli_error($conn));

        foreach ($schoolsOfInterestSegment as $schoolsOfInterest) {
			$nameOfInstitution = $schoolsOfInterest['nameOfInstitution'];
			$institutionCode = $schoolsOfInterest['institutionCode'];
			$institutionLocation = $schoolsOfInterest['institutionLocation'];
			$programId = $schoolsOfInterest['programId'];
			$courseOfStudy = $schoolsOfInterest['courseOfStudy'];
			/// Insert Into payment_breakdown_tab
			mysqli_query($conn,"INSERT INTO `STUDENT_SCHOOL_OF_INTEREST_TAB` 
            (`examRegistrationId`, `nameOfInstitution`, `institutionCode`, `institutionLocation`, `programId`, `courseOfStudy`) VALUES 
            ('$examRegistrationId', '$nameOfInstitution', '$institutionCode', '$institutionLocation', '$programId', '$courseOfStudy')")or die (mysqli_error($conn));
		}
        ///// get exam fee for payment processing
        $select = "SELECT * FROM BRANCH_EXAM_PRICING_TAB WHERE countryId='$countryId' AND examId='$examId'";
        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        $fetchQuery=mysqli_fetch_array($query);
        $amount=$fetchQuery['amount'];
        $currency=$fetchQuery['currency'];
        $examAbbr=$fetchQuery['examAbbr'];

        $countId='TRANS';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $transactionId=$countId.$no.date("Ymdhis");
        
        $transactionTypeId='PMT'; /// PAYMENT
        $balanceBefore=$loginUserWalletBalance;
        $balanceAfter=$balanceBefore; /// since payment is pending

        if ($paymentMethodId=='CC') {
        ///get country paymentKey
        $query=mysqli_query($conn,"SELECT paymentKey FROM COUNTRY_TAB WHERE countryId='$countryId'") or die (mysqli_error($conn));
        $fetchQuery=mysqli_fetch_array($query);
        $paymentKey=$fetchQuery['paymentKey'];
        $statusId=3; /// PENDING

        mysqli_query($conn,"INSERT INTO `TRANSACTION_TAB`
        (`countryId`, `transactionId`, `userId`, `transactionTypeId`, `paymentMethodId`, `emailAddress`, `currency`, `balanceBefore`, `amount`, `balanceAfter`, `paymentKey`, `statusId`, `createdTime`) VALUES
        ('$countryId', '$transactionId', '$studentId', '$transactionTypeId', '$paymentMethodId', '$emailAddress', '$currency', '$balanceBefore', '$amount', '$balanceAfter', '$paymentKey', '$statusId', NOW())")or die (mysqli_error($conn));
            $alertDetail = "User with ID $studentId and Name $loginUserFullname attempt to register for $examAbbr exam with Registration ID $examRegistrationId. Transaction ID $transactionId generated for payment of $currency $amount.";

        }elseif($paymentMethodId=='BT'){
            $paymentKey='BANK TRANSFER';
            $statusId=3; /// PENDING
            mysqli_query($conn,"INSERT INTO `TRANSACTION_TAB`
            (`countryId`, `transactionId`, `userId`, `transactionTypeId`, `paymentMethodId`, `emailAddress`, `currency`, `balanceBefore`, `amount`, `balanceAfter`, `paymentKey`, `statusId`, `createdTime`) VALUES
            ('$countryId', '$transactionId', '$studentId', '$transactionTypeId', '$paymentMethodId', '$emailAddress', '$currency', $balanceBefore, '$amount', '$balanceAfter', '$paymentKey', '$statusId', NOW())")or die (mysqli_error($conn));
            $alertDetail = "User with ID $studentId and Name $loginUserFullname attempt to register for $examAbbr exam with Registration ID $examRegistrationId. Transaction ID $transactionId generated for payment of $currency $amount.";
        }elseif($paymentMethodId=='WLT'){
            if ($loginUserWalletBalance < $amount) {
                $response = [
                    'response' => 103,
                    'success' => false,
                    'message' => "INSUFFICIENT WALLET BALANCE! You have $currency $loginUserWalletBalance in your wallet. Please fund your wallet and try again.",
                ];
                goto end;
            }
            $paymentKey='WALLET';
            $statusId=1; /// APPROVED
            $balanceAfter=$balanceBefore - $amount; /// since payment is from wallet
            mysqli_query($conn,"INSERT INTO `TRANSACTION_TAB`
            (`countryId`, `transactionId`, `userId`, `transactionTypeId`, `paymentMethodId`, `emailAddress`, `currency`, `balanceBefore`, `amount`, `balanceAfter`, `paymentKey`, `statusId`, `createdTime`) VALUES
            ('$countryId', '$transactionId', '$studentId', '$transactionTypeId', '$paymentMethodId', '$emailAddress', '$currency', '$balanceBefore', '$amount', '$balanceAfter', '$paymentKey', '$statusId', NOW())")or die (mysqli_error($conn));
            /// update user wallet balance
            mysqli_query($conn,"UPDATE USERS_TAB SET walletBalance='$balanceAfter' WHERE userId='$studentId'")or die (mysqli_error($conn));
        $alertDetail = "User with ID $studentId and Name $loginUserFullname successfully paid $currency $amount from wallet for $examAbbr exam with Registration ID $examRegistrationId. Transaction ID $transactionId generated for payment.";

        }else{
            $response = [
                'response' => 104,
                'success' => false,
                'message' => "INVALID PAYMENT METHOD! Please select a valid payment method and try again.",
            ];
            goto end;
        }
        
        $response = [
            'response' => 200,
            'success' => true,
            'message' => "EXAM REGISTRATION LOG SUCCESSFUL.",
            'data' => [
                'examRegistrationId' => $examRegistrationId,
                'transactionId' => $transactionId,
                'fullName'      => $firstName." ".$middleName." ".$lastName,
                'emailAddress'  => $emailAddress,
                'phoneNumber'   => $phoneNumber,
                'amount'        => $amount,
                'currency'      => $currency,
                'paymentKey'    => $paymentKey,
                'paymentMethodId' => $paymentMethodId
            ]
        ];
        $callclass->_alertSequenceAndUpdate($conn,$loginUserCountryId,$loginUserId,$loginUserFullname,$alertDetail,$ipAddress,$systemName);
end:
//////////////////////////////////////////////////////////////////////////////////////////////
echo json_encode($response);
?>