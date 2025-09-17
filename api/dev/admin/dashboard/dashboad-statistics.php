<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/staff-session-check.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
    if(!$checkSession){
        $response=[
            'response' => 99,
            'success' => false,
            'message' => "SESSION EXPIRED! Please LogIn Again.",
        ];
        goto end;
    }
?>

<?php

	$query=mysqli_query($conn,"SELECT
	(SELECT COUNT(*) FROM STAFF_TAB WHERE statusId=1) AS totalActiveStaffCount,
	(SELECT COUNT(*) FROM PUBLISH_TAB WHERE pageCategoryId='galleryCategory' AND statusId=1) AS totalActiveGalleryCount,
	(SELECT COUNT(*) FROM PUBLISH_TAB WHERE pageCategoryId='examCategory' AND parentPublishId IS NULL OR parentPublishId = '' AND statusId=1) AS totalActiveExamCount,
	(SELECT COUNT(*) FROM PUBLISH_TAB WHERE pageCategoryId='studyAbroadCategory' AND statusId=1) AS totalActiveStudyAbroadCount,
	(SELECT COUNT(*) FROM PUBLISH_TAB WHERE pageCategoryId='blogCategory' AND statusId=1) AS totalActiveBlogCount,
	(SELECT COUNT(*) FROM PUBLISH_TAB WHERE pageCategoryId='faqCategory' AND statusId=1) AS totalActiveFaqCount,
	(SELECT COUNT(*) FROM COUNTRY_TAB WHERE statusId=1) AS totalActiveCountryCount,
	(SELECT COUNT(*) FROM BRANCH_COUNTRY_TAB WHERE statusId=1) AS totalActiveBranchCount,
	(SELECT COUNT(*) FROM TESTIMONY_TAB WHERE statusId=1) AS totalActiveTestimonyCount");

	$response = [
		'response'=> 200,
		'success'=> true,
		'data'=>  array()
	];  

	while ($fetchQuery = mysqli_fetch_assoc($query)) {
		$response['data'][] = $fetchQuery;
	}	
end:
echo json_encode($response);
?>