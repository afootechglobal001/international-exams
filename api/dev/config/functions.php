<?php
class allClass{
    function _get_setup_backend_settings_detail_for_country($conn, $countryId){
	$query=mysqli_query($conn,"SELECT * FROM COUNTRY_TAB WHERE countryId='$countryId'")or die (mysqli_error($conn));
	$fetchQuery=mysqli_fetch_array($query);
         $response = [
            "senderName" => $fetchQuery['senderName'],
            "smtpHost" => $fetchQuery['smtpHost'],
            "smtpUsername" => $fetchQuery['smtpUsername'],
            "smtpPassword" => $fetchQuery['smtpPassword'],
            "smtpPort" => $fetchQuery['smtpPort'],
            "supportEmail" => $fetchQuery['supportEmail'],
        ];
		return json_encode([$response]);
    }
/////////////////////////////////////////
function _staffAccesskeyValidation($conn, $accessKey) {
    $query = mysqli_query($conn, "SELECT * FROM STAFF_VIEW WHERE accessKey='$accessKey' AND statusId=1 AND accessKey!=''") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    $response = ["checkSession" => false];
    if ($count > 0) {
        $fetchQuery = mysqli_fetch_assoc($query);
        $titleId=$fetchQuery['titleId'];
		$firstName=$fetchQuery['firstName'];
		$lastName=$fetchQuery['lastName'];
        $response = [
            "checkSession" => true,
            "loginStaffId" => $fetchQuery['staffId'],
            "loginFullname" => "$titleId $firstName $lastName",
            "loginRoleId" => $fetchQuery['roleId'],
            "loginProfilePix" => $fetchQuery['profilePix'],
            "loginCountryId" => $fetchQuery['countryId']
        ];
    }
    return json_encode([$response]);
}
function _userAccesskeyValidation($conn, $accessKey) {
    $query = mysqli_query($conn, "SELECT * FROM USER_VIEW WHERE accessKey='$accessKey' AND statusId=1 AND accessKey!=''") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    $response = ["checkSession" => false];
    if ($count > 0) {
        $fetchQuery = mysqli_fetch_assoc($query);
		$firstName=$fetchQuery['firstName'];
		$lastName=$fetchQuery['lastName'];
        $response = [
            "checkSession" => true,
            "loginUserId" => $fetchQuery['userId'],
            "loginFullname" => "$firstName $lastName",
            "loginUserEmail" => $fetchQuery['emailAddress'],
            "loginUserPhoneNumber" => $fetchQuery['phoneNumber'],
            "loginUserWalletBalance" => $fetchQuery['walletBalance'],
            "loginUserCountryId" => $fetchQuery['countryId'],
            "loginUserCurrency" => $fetchQuery['currency']
        ];
    }
    return json_encode([$response]);
}
/////////////////////////////////////////
function _getSequenceCount($conn, $counterId){
	$count=mysqli_fetch_array(mysqli_query($conn,"SELECT counterValue FROM SETUP_COUNTER_TAB WHERE counterId = '$counterId' FOR UPDATE"));
	 $num=$count[0]+1;
	 mysqli_query($conn,"UPDATE `SETUP_COUNTER_TAB` SET `counterValue` = '$num' WHERE counterId = '$counterId'")or die (mysqli_error($conn));
	 if ($num<10){$no='00'.$num;}elseif($num>=10 && $num<100){$no='0'.$num;}else{$no=$num;}
	 $response = ["no" => $no];
	 return json_encode([$response]);
}


/////////////////////////////////////////
function _alertSequenceAndUpdate($conn,$countryId,$userId,$userName,$alertDetail,$ipAddress,$systemName){
	$sequence=$this->_getSequenceCount($conn, 'ALT');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	$alertId='ALT'.$no.date("Ymdhis");
	
	mysqli_query($conn,"INSERT INTO `0_ALERT_TAB`
	(`alertId`,`countryId`, `userId`, `userName`, `alertDetail`, `ipAddress`, `systemName`) VALUES
	('$alertId', '$countryId', '$userId', '$userName', '$alertDetail', '$ipAddress', '$systemName')")or die (mysqli_error($conn));
}

function _getSetupPageCategoryDetails($conn,$pageCategoryId){
	$query=mysqli_query($conn,"SELECT * FROM SETUP_PAGE_CATEGORIES_TAB WHERE pageCategoryId='$pageCategoryId'")or die (mysqli_error($conn));
	$fetchQuery=mysqli_fetch_array($query);
        $response = [
            "pageCategoryId" => $fetchQuery['pageCategoryId'],
            "pageCategoryName" => $fetchQuery['pageCategoryName']
        ];
		return json_encode([$response]);
}

function _getPublishDetails($conn,$publishId, $pageCategoryId){
	$query=mysqli_query($conn,"SELECT * FROM PUBLISH_TAB WHERE publishId='$publishId' AND pageCategoryId='$pageCategoryId'")or die (mysqli_error($conn));
	$fetchQuery=mysqli_fetch_array($query);
        $response = [
            "pageCategoryId" => $fetchQuery['pageCategoryId'],
            "publishId" => $fetchQuery['publishId'],
            "regTitle" => $fetchQuery['regTitle'],
            "examAbbr" => $fetchQuery['examAbbr'],
            "regPix" => $fetchQuery['regPix']
        ];
		return json_encode([$response]);
}

}//end of class
$callclass=new allClass();

// Helper function for field validation
function validateEmptyField($field, $fieldName) {
    if (empty($field)) {
        echo json_encode([
            'response' => 100,
            'success' => false,
            'message' => "$fieldName REQUIRED! Check the fields and try again",
        ]);
        exit;
    }
}
?>