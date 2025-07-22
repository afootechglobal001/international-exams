<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
	$websiteAutoUrl =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$appName='EDUGRADE SERVICES'; 

	//$websiteUrl='https://www.internationalexam.com'; /// For Live Server Url //
	$websiteUrl = 'http://localhost/projects/international-exams'; /// Local Url
	//$websitePath = $_SERVER['DOCUMENT_ROOT'];
	$websitePath = $_SERVER['DOCUMENT_ROOT'].'/projects/international-exams'; //dirname(__FILE__);
	$codeVersion= date('Ymdhis');
?>
<script>
	var websiteUrl = "<?php echo $websiteUrl;?>";
	var apiKey = 'a7c37b6289b9dd879b2c005118d3ef14'; /// For API Key //

	var adminLocalUrl=websiteUrl+'/admin/config/code';
	var adminPortalLocalUrl=websiteUrl+'/admin/dashboard/config/code'; 
	var adminPortalUrl=websiteUrl+'/admin'; /// For Portal Url //
	var adminUrl=websiteUrl+'/admin/login'; /// For Admin Url //
	
	var portalLocalUrl=websiteUrl+'/portal/dashboard/config/code';
</script>