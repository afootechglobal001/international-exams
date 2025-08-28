<?php
$headers = getallheaders();
$accessKey = isset($headers['Authorization']) ? trim(str_replace('Bearer ', '', $headers['Authorization'])) : null;
///////////auth/////////////////////////////////////////
$fetch = $callclass->_userAccesskeyValidation($conn, $accessKey);
$array = json_decode($fetch, true);
$checkSession = $array[0]['checkSession'];
$loginUserId = $array[0]['loginUserId']; // Correct key name
$loginUserFullname = $array[0]['loginFullname'];
$loginUserEmail = $array[0]['loginUserEmail'];
$loginUserPhoneNumber = $array[0]['loginUserPhoneNumber'];
$loginUserWalletBalance = $array[0]['loginUserWalletBalance'];
$loginUserCountryId = $array[0]['loginUserCountryId'];
$loginUserCurrency = $array[0]['loginUserCurrency'];
?>