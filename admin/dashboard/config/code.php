<?php include '../../../config/constants.php';?>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$ids=$_POST['ids'];
		require_once('../content/page-content.php');
		require_once('../content/page-details.php');
		require_once('../content/form.php');
	break;

	case 'get_form':
		$page=$_POST['page'];
		$pageCatId=$_POST['pageCatId'];
		$id=$_POST['id'];
		$modalLayer=$_POST['modalLayer'];
		require_once('../content/form.php');
	break;	
}
?>