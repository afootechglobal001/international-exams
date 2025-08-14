<?php include '../../../config/constants.php';?>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$ids=$_POST['ids'];
		require_once('dashboard-content.php');
		require_once('exam-content.php');
		
	break;

	case 'get_form':
		$page=$_POST['page'];
		$id=$_POST['id'];
		require_once('dashboard-content.php');
		require_once('exam-content.php');
	break;	
}
?>