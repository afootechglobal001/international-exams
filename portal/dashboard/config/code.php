<?php include '../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/portal/dashboard/js/session_validation.js"></script>
<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$ids=$_POST['ids'];
		require_once('dashboard-content.php');
		require_once('ebook-content.php');
		require_once('exam-content.php');
		require_once('transaction-content.php');
		require_once('settings-content.php');
	break;

	case 'get_form':
		$page=$_POST['page'];
		$id=$_POST['id'];
		$modalLayer=$_POST['modalLayer'];
		require_once('dashboard-content.php');
		require_once('ebook-content.php');
		require_once('exam-content.php');
		require_once('transaction-content.php');
		require_once('settings-content.php');
	break;	
}
?>