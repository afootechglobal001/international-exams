<?php require_once 'constants.php';?>
<?php
$countryId=$_GET['countryId'];
switch ($countryId){
	case 'NG':
		$_SESSION['websiteCountryName']='Nigeria';
	break;
	case 'GH':
		$_SESSION['websiteCountryName']='Ghana';
	break;
	case 'KE':
		$_SESSION['websiteCountryName']='Kenya';
	break;

}?>