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
                let userProceedLoginSession = JSON.parse(localStorage.getItem("userProceedLoginSession"));
                if (!userProceedLoginSession) {
                    window.location.href = portalUrl;
                }

                $("#userFullname").html(userProceedLoginSession?.displayData?.fullName);
                $("#email").html(userProceedLoginSession?.displayData?.email);
            });
        </script>

        <div class="picture-div animated fadeIn"></div>

        <div class="form-div animated fadeIn">
            <div class="form-box">
                <div class="form-box-content" id="viewOtp">
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

                    <div class="text_field_container" id="cNewPassword_container">
                        <script>
                            textField({
                                id: 'cNewPassword',
                                title: 'Confirm New Password',
                                type: 'password'
                            });
                        </script>
                    </div>

                    <div class="btn-div verify-btn-div">
                        <button class="btn" id="submitBtn" title="Click to log In" onclick="_userSignUp();">
                            Reset <i class="bi bi-arrow-right-circle"></i>
                        </button>
                    </div>

                    <div class="bottom-div"></div>
                </div>
            </div>
        </div>
    </main>
</body>

<?php include 'bottom-scripts.php' ?>

</html>