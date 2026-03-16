<?php
$headers = getallheaders();
$accessKey = isset($headers['Authorization']) ? trim(str_replace('Bearer ', '', $headers['Authorization'])) : null;
///////////auth/////////////////////////////////////////
$fetch = $callclass->_staffAccesskeyValidation($conn, $accessKey);
$array = json_decode($fetch, true);
$checkSession = $array[0]['checkSession'];
$loginStaffId = $array[0]['loginStaffId']; // Correct staff id
$loginStaffFullname = $array[0]['loginFullname']; // Correct key name
$loginRoleId = $array[0]['loginRoleId']; // Correct role id
$loginProfilePix = $array[0]['loginProfilePix']; // Correct profile pix
$loginCountryId = $array[0]['loginCountryId']; // Correct country Id
?>