<?php include '../config/constants.php'; ?>
<?php include "config/function.php"; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student Portal | Log-In</title>
</head>

<body>
    <?php include 'alert.php' ?>
    <main>
        <div class="picture-div animated fadeIn"></div>

        <div class="form-div animated fadeIn">
            <div class="form-box">
                <div class="form-box-content" id="viewLogin">
                    <div class="logo-div">
                        <a href="<?php echo $websiteUrl ?>" title="Home">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png"
                                alt="International Exam Logo" /></a>
                    </div>
                    <h1>👋 Hi, Welcome Back!</h1>
                    <div class="alert alert-success">
                        Kindly, provide your <span>Email Address</span> and <span>Password</span> to Login.
                    </div>
                    <div class="text_field_container" id="emailAddress_container">
                        <script>
                        textField({
                            id: 'emailAddress',
                            title: 'Enter Your Email Address',
                            type: 'email'
                        });
                        </script>
                    </div>

                    <div class="text_field_container" id="password_container">
                        <script>
                        textField({
                            id: 'password',
                            title: 'Enter Your Password',
                            type: 'password'
                        });
                        </script>
                    </div>
                    <div class="btn-div">
                        <button class="btn" id="submitBtn" title="Click to log In" onclick="_userLogin()">
                            Log In <i class="bi bi-check"></i>
                        </button>
                        <a href="#" title="Recover your password">Forgot Password?</a>
                    </div>
                </div>
                <div class="signup-message">
                    <p>
                        Don’t have an account?
                        <a href="<?php echo $websiteUrl?>/portal/sign-up" title="Create an account">Sign-Up</a>
                    </p>
                    <p>
                        By logging in to this portal, you agree to our<br />
                        <a href="#" title="View Privacy Policy">Privacy Policy</a> and
                        <a href="#" title="View Terms of Service">Terms of Service</a>.
                    </p>
                </div>

            </div>
        </div>

    </main>
</body>

<?php include 'bottom-scripts.php' ?>

</html>