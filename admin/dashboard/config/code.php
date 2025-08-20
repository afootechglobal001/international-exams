<?php include '../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/admin/dashboard/js/session_validation.js"></script>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$ids=$_POST['ids'];
		require_once('dashboard-content.php');
		require_once('branch-content.php');
		require_once('staff-content.php');
		require_once('student-content.php');
		require_once('international-exam-content.php');
		require_once('study-abroad-content.php');
		require_once('blog-content.php');
		require_once('gallery-content.php');
		require_once('faq-content.php');
		require_once('testimony-content.php');
		require_once('settings-content.php');
		require_once('system-alert-content.php');
		require_once('pages-content.php');
		require_once('page-details.php');
	break;

	case 'get_form':
		$page=$_POST['page'];
		$pageCatId=$_POST['pageCatId'];
		$id=$_POST['id'];
		$modalLayer=$_POST['modalLayer'];
		require_once('dashboard-content.php');
		require_once('branch-content.php');
		require_once('staff-content.php');
		require_once('student-content.php');
		require_once('international-exam-content.php');
		require_once('study-abroad-content.php');
		require_once('blog-content.php');
		require_once('gallery-content.php');
		require_once('faq-content.php');
		require_once('testimony-content.php');
		require_once('settings-content.php');
		require_once('system-alert-content.php');
		require_once('pages-content.php');
		require_once('page-details.php');
	
	break;	

	case 'uploadStaffPix':
		$oldProfilePix = $_POST['oldProfilePix'] ?? '';
		$newProfilePix = $_POST['newProfilePix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/staffPix/";

		// Delete old image only if it's not the default
		if (!empty($oldProfilePix) && $oldProfilePix !== 'default.jpg' && file_exists($uploadDir . $oldProfilePix)) {
			unlink($uploadDir . $oldProfilePix);
		}

		if (!empty($newProfilePix) && isset($_FILES['profilePix']) && $_FILES['profilePix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['profilePix']['tmp_name'], $uploadDir . $newProfilePix);
		}
    break;
}
?>