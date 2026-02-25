<?php include '../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/portal/dashboard/js/session_validation.js?v=<?php echo $codeVersion?>"></script>
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
		$passportPhotograph = $_POST['passportPhotograph'] ?? '';
		$internationalPassport = $_POST['internationalPassport'] ?? '';

		///// For Passport Photograph ////
		if (!empty($passportPhotograph)) {
    		$passportPhotograph = preg_replace('#^data:image/\w+;base64,#i', '', $passportPhotograph);
			$passportPhotograph = str_replace(' ', '+', $passportPhotograph);
			$passportPhotograph = base64_decode($passportPhotograph);
		}

		$uploadPassportPhotographDir = "../../../uploaded_files/passportPhotograph/";

		if(!empty($newPassportPhotograph)){
			if($newPassportPhotograph!=$oldPassportPhotograph){
				unlink($uploadPassportPhotographDir . $oldPassportPhotograph);
				file_put_contents($uploadPassportPhotographDir . $newPassportPhotograph, $passportPhotograph);
			}
		}

		///// For International Photograph ////
		if (!empty($internationalPassport)) {
			$internationalPassport = preg_replace('#^data:image/\w+;base64,#i', '', $internationalPassport);
			$internationalPassport = str_replace(' ', '+', $internationalPassport);
			$internationalPassport = base64_decode($internationalPassport);
		}

		$uploadInternationalPassportDir = "../../../uploaded_files/internationalPassport/";

		if(!empty($newInternationalPassport)){
			if($newInternationalPassport!=$oldInternationalPassport){
				unlink($uploadInternationalPassportDir . $oldInternationalPassport);
				file_put_contents($uploadInternationalPassportDir . $newInternationalPassport, $internationalPassport);
			}
		}
    break;
}
?>