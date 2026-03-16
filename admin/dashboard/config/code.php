<?php include '../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/admin/dashboard/js/session_validation.js"></script>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$id=$_POST['id'];
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
		require_once('pages-content.php');
		require_once('page-details.php');
		require_once('ebook-content.php');
		require_once('exam-related-links-content.php');
		require_once('ict-courses-content.php');
		require_once('video-content.php');
		require_once('account-report/account-report-content.php');
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
		require_once('pages-content.php');
		require_once('page-details.php');
		require_once('ebook-content.php');
		require_once('exam-related-links-content.php');
		require_once('ict-courses-content.php');
		require_once('video-content.php');
		require_once('account-report/account-report-content.php');
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
		///// Exam Picture /////
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		$regPixDir = "../../../uploaded_files/examPicture/";

		if (!empty($oldRegPix) && file_exists($regPixDir . $oldRegPix)) {
			unlink($regPixDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $regPixDir . $newRegPix);
		}

		////// Exam Logo ///////
		$oldExamLogo = $_POST['oldExamLogo'] ?? '';
		$newExamLogo = $_POST['newExamLogo'] ?? '';
		$logoDir = "../../../uploaded_files/examLogo/";

		if (!empty($oldExamLogo) && file_exists($logoDir . $oldExamLogo)) {
			unlink($logoDir . $oldExamLogo);
		}

		if (!empty($newExamLogo) && isset($_FILES['examLogo']) && $_FILES['examLogo']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['examLogo']['tmp_name'], $logoDir . $newExamLogo);
		}
    break;

	case 'uploadPagePix':
		$oldSeoFlyer = $_POST['oldSeoFlyer'] ?? '';
		$newSeoFlyer = $_POST['newSeoFlyer'] ?? '';
		
		$uploadDir = "../../../uploaded_files/seoFlyer/";

		if (!empty($newSeoFlyer) && isset($_FILES['seoFlyer']) && $_FILES['seoFlyer']['error'] === UPLOAD_ERR_OK) {
			// Delete old image only if it's not the default
			if (!empty($oldSeoFlyer) && file_exists($uploadDir . $oldSeoFlyer)) {
				unlink($uploadDir . $oldSeoFlyer);
			}

			// Save the new uploaded file
			move_uploaded_file($_FILES['seoFlyer']['tmp_name'], $uploadDir . $newSeoFlyer);
		}
    break;

	case 'uploadStudyAbroadPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/studyAbroad/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadBlogPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/blog/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadRelatedExamPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/examRelatedLink/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadGalleryPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/galleryPictures/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadEbookPixAndMaterial':
		///// Ebook Picture /////
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$regPixDir = "../../../uploaded_files/ebookPicture/";

		// Check if a new file is uploaded
		if (isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			$newRegPix = $_POST['newRegPix'] ?? $_FILES['regPix']['name']; // fallback to uploaded filename

			// Delete old picture if it exists
			if (!empty($oldRegPix) && file_exists($regPixDir . $oldRegPix)) {
				unlink($regPixDir . $oldRegPix);
			}

			// Move uploaded file
			move_uploaded_file($_FILES['regPix']['tmp_name'], $regPixDir . $newRegPix);
		}

		////// Ebook Material ///////
		$oldMaterial = $_POST['oldMaterial'] ?? '';
		$materialDir = "../../../uploaded_files/ebookMaterial/";

		// Check if a new file is uploaded
		if (isset($_FILES['material']) && $_FILES['material']['error'] === UPLOAD_ERR_OK) {
			$newMaterial = $_POST['newMaterial'] ?? $_FILES['material']['name']; // fallback to uploaded filename

			// Delete old material if it exists
			if (!empty($oldMaterial) && file_exists($materialDir . $oldMaterial)) {
				unlink($materialDir . $oldMaterial);
			}

			// Move uploaded file
			move_uploaded_file($_FILES['material']['tmp_name'], $materialDir . $newMaterial);
		}
	break;

	case 'unlinkEbookPixAndMaterial':
		///// Ebook Picture /////
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$oldRegPixDir = "../../../uploaded_files/ebookPicture/";

		if (!empty($oldRegPix) && file_exists($oldRegPixDir . $oldRegPix)) {
			unlink($oldRegPixDir . $oldRegPix);
		}

		////// Ebook Material ///////
		$oldMaterial = $_POST['oldMaterial'] ?? '';
		$oldMaterialDir = "../../../uploaded_files/ebookMaterial/";

		if (!empty($oldMaterial) && file_exists($oldMaterialDir . $oldMaterial)) {
			unlink($oldMaterialDir . $oldMaterial);
		}
    break;

	case 'uploadIctCoursesPix':
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$newRegPix = $_POST['newRegPix'] ?? '';
		
		$uploadDir = "../../../uploaded_files/IctCourses/";

		// Delete old image only if it's not the default
		if (!empty($oldRegPix) && file_exists($uploadDir . $oldRegPix)) {
			unlink($uploadDir . $oldRegPix);
		}

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $uploadDir . $newRegPix);
		}
    break;

	case 'uploadVideoPixAndVideo':
		///// Ebook Picture /////
		$newRegPix = $_POST['newRegPix'] ?? '';
		$regPixDir = "../../../uploaded_files/video-images/";

		if (!empty($newRegPix) && isset($_FILES['regPix']) && $_FILES['regPix']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['regPix']['tmp_name'], $regPixDir . $newRegPix);
		}

		////// Ebook Material ///////
		$newVideo = $_POST['newVideo'] ?? '';
		$videoDir = "../../../uploaded_files/videos/";

		if (!empty($newVideo) && isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
			move_uploaded_file($_FILES['video']['tmp_name'], $videoDir . $newVideo);
		}
    break;

	case 'unlinkVideoPixAndVideo':
		///// Ebook Picture /////
		$oldRegPix = $_POST['oldRegPix'] ?? '';
		$oldRegPixDir = "../../../uploaded_files/video-images/";

		if (!empty($oldRegPix) && file_exists($oldRegPixDir . $oldRegPix)) {
			unlink($oldRegPixDir . $oldRegPix);
		}

		////// Ebook Material ///////
		$oldVideo = $_POST['oldVideo'] ?? '';
		$oldVideoDir = "../../../uploaded_files/videos/";

		if (!empty($oldVideo) && file_exists($oldVideoDir . $oldVideo)) {
			unlink($oldVideoDir . $oldVideo);
		}
    break;

	case 'uploadPagePictures':
		$newPagePictures=$_POST['newPagePictures'];

		if($newPagePictures!=''){
			$myArray = explode(',', $newPagePictures);
				$i=0;
				foreach($myArray as $picture){
					move_uploaded_file($_FILES["pictures"]["tmp_name"][$i], '../../../uploaded_files/pagePictures/' . $picture);
					$i++;
				}
		}
	break;

	case 'deleteOldPagePictures':
		$oldPagePictures=$_POST['oldPagePictures'];

		$uploadDir = "../../../uploaded_files/pagePictures/";

		// Delete old image only if it's not the default
		if (!empty($oldPagePictures) && file_exists($uploadDir . $oldPagePictures)) {
			unlink($uploadDir . $oldPagePictures);
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
		
		// Decide include path automatically based on pageCategoryId
		if ($pageCategoryId == 'blogCategory') {
			$includePath = "../{$pageCategoryId}_details.php";
		} else {
			$includePath = "{$pageCategoryId}_details.php";
		}

		$txt .= "<?php include '$includePath';?>";

		// for new page creation ////
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
				//// delete file with folders ////
				array_map('unlink', glob("../../../blog/$oldPageUrl/*.*"));
				rmdir("../../../blog/$oldPageUrl");

				//// recreate new file with folders ////
				mkdir('../../../blog/'.$pageUrl);
				$myfile = fopen("../../../blog/" . $pageUrl . "/index.php", "w") or die("Unable to open file!");
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