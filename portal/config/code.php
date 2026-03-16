<?php include '../../config/constants.php';?>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$id=$_POST['id'];
		require_once('page-content.php');
	break;

	case 'get_form':
		$page=$_POST['page'];
		$id=$_POST['id'];
		// $modalLayer=$_POST['modalLayer'];
		require_once('page-content.php');
	break;	
}
?>