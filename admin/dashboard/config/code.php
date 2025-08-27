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
		require_once('exam-content.php');
		require_once('study-abroad-content.php');
		require_once('blog-content.php');
		require_once('gallery-content.php');
		require_once('faq-content.php');
		require_once('testimony-content.php');
		require_once('settings-content.php');
		require_once('system-alert-content.php');
		require_once('pages-content.php');
		require_once('page-details.php');
		require_once('ebook-content.php');
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
		require_once('exam-content.php');
		require_once('study-abroad-content.php');
		require_once('blog-content.php');
		require_once('gallery-content.php');
		require_once('faq-content.php');
		require_once('testimony-content.php');
		require_once('settings-content.php');
		require_once('system-alert-content.php');
		require_once('pages-content.php');
		require_once('page-details.php');
		require_once('ebook-content.php');
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

	case 'uploadExamPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/examLogo/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadPagePix':
		$oldSeoFlyer = $_POST['oldSeoFlyer'] ?? '';
		$newSeoFlyer = $_POST['newSeoFlyer'] ?? '';
		
		$uploadDir = "../../../uploaded_files/seoFlyer/";

		// Delete old image only if it's not the default
		if (!empty($oldSeoFlyer) && file_exists($uploadDir . $oldSeoFlyer)) {
			unlink($uploadDir . $oldSeoFlyer);
		}

		if (!empty($newSeoFlyer) && isset($_FILES['seoFlyer']) && $_FILES['seoFlyer']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['seoFlyer']['tmp_name'], $uploadDir . $newSeoFlyer);
		}
    break;

	case 'createPagesFolder': 	
		$pageCategoryId =(trim($_POST['pageCategoryId']));
		$publishId = trim($_POST['publishId']);
		$pageUrl= trim(strtolower($_POST['pageUrl']));
		$oldPageUrl = trim($_POST['oldPageUrl']);
		$pageTitle = trim($_POST['pageTitle']);
		$seoKeywords = $_POST['seoKeywords']; 
		$seoDescription = $_POST['seoDescription']; 
		$newSeoFlyer = $_POST['newSeoFlyer'];
		$oldSeoFlyer = $_POST['oldSeoFlyer']; 
		$pageContent = $_POST['pageContent']; 

		$pageSeoPix = !empty($newSeoFlyer) ? $newSeoFlyer : $oldSeoFlyer;

		// common text content
		$txt .= "<?php \$publishId='$publishId';?>\n";
		$txt .= "<?php \$pageUrl='$pageUrl';?>\n";
		$txt .= "<?php \$pageTitle='$pageTitle';?>\n";
		$txt .= "<?php \$seoKeywords='$seoKeywords';?>\n";
		$txt .= "<?php \$seoDescription='$seoDescription';?>\n";
		$txt .= "<?php \$pageSeoPix='$pageSeoPix';?>\n";
		$txt .= "<?php include '{$pageCategoryId}_details.php';?>";

		// new page
		if (empty($oldPageUrl)) {
			if ($pageCategoryId == 'blogCategory') {
				mkdir('../../../blog/'.$pageUrl);
				$myfile = fopen("../../../blog/" . $pageUrl . "/index.php", "w") or die("Unable to open file!");
			} else {
				// examCategory and others → single php file
				$myfile = fopen("../../../$pageUrl.php", "w") or die("Unable to open file!");
			}
			fwrite($myfile, $txt);
			fclose($myfile);
		} else {
			if ($pageCategoryId == 'blogCategory') {
				array_map('unlink', glob("../../../blog/$oldPageUrl/*.*"));
				rmdir("../../../blog/$oldPageUrl");
			} else {
				// delete old single file if exists
				if (file_exists("../../../$oldPageUrl.php")) {
					unlink("../../../$oldPageUrl.php");
				}
				$myfile = fopen("../../../$pageUrl.php", "w") or die("Unable to open file!");
			}
			fwrite($myfile, $txt);
			fclose($myfile);
		}
	break;
}
?>