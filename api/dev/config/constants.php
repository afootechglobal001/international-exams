<?php
/////// developed by Paul Emmanuel on 07-08-2025//////////////////////
$appName="EDUGRADE SERVICES";
$appDescription="EDUGRADE SERVICES - A special Educational Consultancy Service Agency, which set up centres in almost the states in Nigeria and other countries like GHANA, KENYA, ETHIOPIA, UGANDA and many more. Within the period of 9 years experiences we have successfully placed THOUSANDS of students for admissions into foreign universities.";

////////////////////////////////////////////////////////////////////////
$userOsBrowser = isset($_SERVER['HTTP_USEROSBROWSER']) ? $_SERVER['HTTP_USEROSBROWSER'] : null;
$userIpAddress = isset($_SERVER['HTTP_USERIPADDRESS']) ? $_SERVER['HTTP_USERIPADDRESS'] : null;
$userDeviceId = isset($_SERVER['HTTP_USERDEVICEID']) ? $_SERVER['HTTP_USERDEVICEID'] : null;
$frontEndApiKey = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : null;
$backEndApiKey='a883a517-bc6c-4d8b-a544-ec743c88354a'; //InternationalExamApiKey@2025

$ipAddress=$_SERVER['REMOTE_ADDR']; //ip used
$systemName=gethostname();//computer used
////////////////////////////////////////////////////////////////////////

$checkBasicSecurity=true;
///// check for API security
if ($frontEndApiKey!=$backEndApiKey){/// start if 1
	$response['response']=96; 
	$response['success']=false;
	$response['message']="SECURITY ACCESS DENIED! You are not allowed to execute this command due to security bridge.";
    $checkBasicSecurity=false;
}

///// check for userOsBrowser security
if (empty($userOsBrowser)){/// start if 1
	$response['response']=97; 
	$response['success']=false;
	$response['message']="ACCESS DENIED! The host OS and browser is undefined."; 
    $checkBasicSecurity=false;
}

///// check for userIpAddress security
if (empty($userIpAddress)){/// start if 1
	$response['response']=98; 
	$response['success']=false;
	$response['message']="ACCESS DENIED! The host IpAddress is undefined."; 
    $checkBasicSecurity=false;
}

///// check for userDeviceId security
if (empty($userDeviceId)){/// start if 1
	$response['response']=99; 
	$response['success']=false;
	$response['message']="ACCESS DENIED! User device is undefined."; 
    $checkBasicSecurity=false;
}

// Read the raw JSON input
$json = file_get_contents('php://input');
// Decode the JSON into an associative array
$data = json_decode($json, true);
?>