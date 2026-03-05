<?php include '../config/constants.php'; ?>
<?php include "config/function.php"; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student Portal | OTP Verification</title>
</head>

<body>
    <?php include 'alert.php' ?>
    <main>
        <script>
            $(document).ready(function() {
                let useResetPasswordSession = JSON.parse(localStorage.getItem("useResetPasswordSession"));
                if (!useResetPasswordSession) {
                    window.location.href = portalUrl;
                }

                $("#userFullname").html(useResetPasswordSession?.displayResetData?.fullName);
                $("#email").html(useResetPasswordSession?.displayResetData?.emailAddress);
            });
        </script>

        <div class="picture-div animated fadeIn"></div>

        <div class="form-div animated fadeIn">
            <div class="form-box">
                <div class="form-box-content">
                    <div class="logo-div">
                        <a href="<?php echo $websiteUrl ?>" title="Home">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png"
                                alt="International Exam Logo" /></a>
                    </div>
                    <h1>Complete Reset Password</h1>
                    <div class="alert alert-success form-alert"> <i class="bi-person"></i> Hi, <span
                            id="userFullname">

                        </span>, an <span>OTP</span> has been sent to your email address (<span id="email">

                        </span>). Kindly check your <strong>INBOX</strong> or <strong>SPAM</strong> to
                        confirm.
                    </div>

                    <div class="text_field_container" id="otp_container">
                        <script>
                            textField({
                                id: 'otp',
                                title: 'Enter OTP',
                                type: 'number',
                                onKeyPressFunction: 'isNumberCheck(event);'
                            });
                        </script>
                    </div>

                    <div class="text_field_container" id="newPassword_container">
                        <script>
                            textField({
                                id: 'newPassword',
                                title: 'Create New Password',
                                type: 'password'
                            });
                        </script>
                    </div>

                    <div class="text_field_container" id="cnewPassword_container">
                        <script>
                            textField({
                                id: 'cnewPassword',
                                title: 'Confirm New Password',
                                type: 'password'
                            });
                        </script>
                    </div>

                    <div class="btn-div verify-btn-div">
                        <button class="btn" id="submitBtn" title="Click to log In" onclick="_completeResetPassword();">
                            Reset <i class="bi bi-arrow-right-circle"></i>
                        </button>
                    </div>

                    <div class="bottom-div">
                        <div>
                            <button class="resendOtpBtn" id="resendOtpBtn" onclick="_proceedResetPassword(true);"><strong>Resend OTP</strong></button>
                            <div id="resendCountdown"></div>
                        </div>
                        <button class="back-btn" title="Go back to login" onclick="window.location.href='<?php echo $websiteUrl ?>/portal'"><i class="bi bi-arrow-left-circle"></i> Go Back</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        _counDownOtp(180);
    </script>
</body>

<?php include 'bottom-scripts.php' ?>

</html>