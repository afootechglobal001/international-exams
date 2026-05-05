<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept, apiKey, userOsBrowser, userIpAddress, userDeviceId");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header('Content-Type: application/json; charset=UTF-8');

//////////for live connect  
$_HOST_NAME = "131.153.147.106";  
$_DB_USERNAME ="intern77_afootech";
$_DB_PASSWORD ="Password@12345.";

$conn = mysqli_connect($_HOST_NAME, $_DB_USERNAME, $_DB_PASSWORD)or die("Unable to connect to MySQL1");
mysqli_select_db($conn,"intern77_revamped_db");
mysqli_set_charset($conn, "utf8mb4");

/////////////////////////////////////////////////////////////////
?>

<?php require_once 'functions.php';?>
<?php require_once 'constants.php';?>