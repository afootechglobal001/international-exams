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

	case 'uploadExamFiles':
		$oldPassportPhotograph = $_POST['oldPassportPhotograph'] ?? '';
		$oldInternationalPassport = $_POST['oldInternationalPassport'] ?? '';
		$newPassportPhotograph = $_POST['newPassportPhotograph'] ?? '';
		$newInternationalPassport = $_POST['newInternationalPassport'] ?? '';
		
		$uploadPassportPhotographDir = "../../../uploaded_files/passportPhotograph/";

		if (!empty($newPassportPhotograph) && isset($_FILES['passportPhotograph']) && $_FILES['passportPhotograph']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['passportPhotograph']['tmp_name'], $uploadPassportPhotographDir . $newPassportPhotograph);
			unlink($uploadPassportPhotographDir . $oldPassportPhotograph);
		}

		$uploadInternationalPassportDir = "../../../uploaded_files/internationalPassport/";

		if (!empty($newInternationalPassport) && isset($_FILES['internationalPassport']) && $_FILES['internationalPassport']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['internationalPassport']['tmp_name'], $uploadInternationalPassportDir . $newInternationalPassport);
			unlink($uploadInternationalPassportDir . $oldInternationalPassport);
		}
    break;
}
?>