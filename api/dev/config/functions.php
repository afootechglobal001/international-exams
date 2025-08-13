<?php
class allClass{
    function _get_setup_backend_settings_detail_for_branch($conn, $clientId, $branchId){
	$query=mysqli_query($conn,"SELECT * FROM BRANCHES_TAB WHERE clientId='$clientId' AND branchId='$branchId'")or die (mysqli_error($conn));
	$fetchQuery=mysqli_fetch_array($query);
         $response = [
            "senderName" => $fetchQuery['name'],
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
            "loginRoleId" => $fetchQuery['roleId']
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
function _alertSequenceAndUpdate($conn,$userId,$userName,$roleId,$alertDetail,$ipAddress,$systemName){
	$sequence=$this->_getSequenceCount($conn, 'ALT');
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
	$alertId='ALT'.$no.date("Ymdhis");
	
	mysqli_query($conn,"INSERT INTO `0_alert_tab`
	(`alertId`, `userId`, `userName`, `roleId`, `alertDetail`, `seenStatus`, `ipAddress`, `systemName`) VALUES
	('$alertId', '$userId', '$userName', '$roleId', '$alertDetail', 0, '$ipAddress', '$systemName')")or die (mysqli_error($conn));
}

function _getAlertDetails($conn,$alertId){
	$query=mysqli_query($conn,"SELECT * FROM 0_alert_tab WHERE alertId='$alertId'")or die (mysqli_error($conn));
	$fetch_query=mysqli_fetch_array($query);
		$seenStatus=$fetch_query['seenStatus'];
		return '[{"seenStatus":"'.$seenStatus.'"}]';
}


function _getStaffDetails($conn,$staffId){
	$query=mysqli_query($conn,"SELECT * FROM staff_tab WHERE staffId='$staffId'")or die (mysqli_error($conn));
	$fetchQuery=mysqli_fetch_array($query);
        $response = [
            "staffId" => $fetchQuery['staffId'],
            "titleId" => $fetchQuery['titleId'],
            "firstName" => $fetchQuery['firstName'],
            "middleName" => $fetchQuery['middleName'],
            "lastName" => $fetchQuery['lastName'],
            "emailAddress" => $fetchQuery['emailAddress'],
            "profilePix" => $fetchQuery['profilePix'],
            "roleId" => $fetchQuery['roleId']
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