<?php
    session_start();
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
	$websiteAutoUrl =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$appName='EDUGRADE SERVICES'; 

	//$websiteUrl='https://www.internationalexam.com'; /// For Live Server Url //
	$websiteUrl = 'http://localhost/projects/international-exams'; /// Local Url
    //$websiteUrl = 'http://192.168.234.177/projects/international-exams'; /// Local Url
	//$websitePath = $_SERVER['DOCUMENT_ROOT'];
	$websitePath = $_SERVER['DOCUMENT_ROOT'].'/projects/international-exams'; //dirname(__FILE__);
	$codeVersion= date('Ymdhis');
?>

<?php
$userOsBrowser = $_SERVER['HTTP_USER_AGENT'];

/////////////////////////////////////////////////////////////////////////////////
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$userIpAddress =getUserIP();

/////////////////////////////////////////////////////////////////////////////////
function getBrowserId() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';  // Browser and OS info
    $acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';  // Language
    // Combine all data and create a hash
    $browserId = hash('sha256', $userAgent . $acceptLanguage);
    return $browserId;
}
$userDeviceId=getBrowserId();

/////////////////////////////////////////////////////////////////////////////////
$getwebsiteCountryName=$_SESSION['websiteCountryName'] ?? 'Nigeria'; /// Default Currency Name
?>

<script>
var websiteUrl = "<?php echo $websiteUrl;?>";
var apiKey = 'a883a517-bc6c-4d8b-a544-ec743c88354a'; /// For API Key //
var endPoint = 'https://www.internationalexam.com/new/api/dev'; /// Server End Point url
var userOsBrowser = "<?php echo $userOsBrowser;?>"; /// For User OS Browser //
var userIpAddress = "<?php echo $userIpAddress;?>"; /// For User IP Address //
var userDeviceId = "<?php echo $userDeviceId;?>"; /// For User Device Id //

// JavaScript Session Country Name //
var websiteCountryName = "<?php echo $getwebsiteCountryName;?>"; /// For JS  Country Name //

var siteMiddlewareUrl = websiteUrl + '/config/code'; //// For site url
var siteSetSessionUrl = websiteUrl + '/config/set-session'; //// For site url

var adminLocalUrl = websiteUrl + '/admin/config/code';
var adminPortalLocalUrl = websiteUrl + '/admin/dashboard/config/code';
var adminDashboardUrl = websiteUrl + '/admin/dashboard'; /// For Dashboard Url //
var adminPortalUrl = websiteUrl + '/admin'; /// For Portal Url //
var adminUrl = websiteUrl + '/admin/login'; /// For Admin Url //

var portalUrl = websiteUrl + '/portal/'; /// For Admin Url //
var portalDashboardUrl = websiteUrl + '/portal/dashboard'; /// For Admin Url //
var portalAuthMiddlewareUrl = websiteUrl + '/portal/config/code';
var portalOperationMiddlewareUrl = websiteUrl + '/portal/dashboard/config/code';

var examLogoPixPath = websiteUrl + '/uploaded_files/examLogo'; /// For exam Logo Path //
var examPixPath = websiteUrl + '/uploaded_files/examPicture'; /// For exam Pix Path //
var seoFlyerPixPath = websiteUrl + '/uploaded_files/seoFlyer'; /// For seo flyer Pix Path //
var studyAbroadPixPath = websiteUrl + '/uploaded_files/studyAbroad'; /// For Study Abroad Pix Path //
var examRelatedLinkPixPath = websiteUrl + '/uploaded_files/examRelatedLink'; /// For Exam Related Link Pix Path //
var blogPixPath = websiteUrl + '/uploaded_files/blog'; /// For Blog Pix Path //
var galleryPixPath = websiteUrl + '/uploaded_files/galleryPictures'; /// For Gallery Pix Path
var pagePixPath = websiteUrl + '/uploaded_files/pagePictures'; /// For Page Pix Path
var eBookPixPath = websiteUrl + '/uploaded_files/ebookPicture'; /// For E-Book Pix Path
var ebookMaterialPath = websiteUrl + '/uploaded_files/ebookMaterial'; /// For E-Book Material Path
var pagePicturePath = websiteUrl + '/uploaded_files/pagePictures'; /// For Pages Picture Path
var ictCoursePixPath = websiteUrl + '/uploaded_files/IctCourses'; /// For Pages Picture Path
var videoPixPath = websiteUrl + '/uploaded_files/video-images'; /// For video pix Path
var videoPath = websiteUrl + '/uploaded_files/videos'; /// For videos Path
var userOtpVerificationUrl = websiteUrl + '/portal/verify'; /// For User OTP Verification Url //
var userResetPasswordUrl = websiteUrl + '/portal/reset-password'; /// For User Reset Password OTP Verification Url //
var passportPhotographPath = websiteUrl + '/uploaded_files/passportPhotograph'; /// For Passport Photograph Path //
var internationalPassportPath = websiteUrl + '/uploaded_files/internationalPassport'; /// For international Passport Path //

var pageCategory = {
    examCategory: 'examCategory',
    studyAbroadCategory: 'studyAbroadCategory',
    blogCategory: 'blogCategory',
    faqCategory: 'faqCategory',
    galleryCategory: 'galleryCategory',
    ictCourseCategory: 'ictCourseCategory',
}
</script>