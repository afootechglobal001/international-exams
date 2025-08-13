<?php include '../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/admin/dashboard/js/session_validation.js"></script>

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