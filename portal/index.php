<?php include '../config/constants.php'; ?>
<?php include "config/function.php"; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>
    <section class="main-login-container">

        <?php $callclass->_pagesImage(); ?>

        <div class="right-login-div">
            <div class="form-box">
                <div class="form-box-content">

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

                    <button class="btn" title="Click to log In"
                        onclick="window.location.href='<?php echo $websiteUrl?>/portal/dashboard'">
                        Log In <i class="bi bi-check"></i>
                    </button>

                    <div class="forgot-password">
                        <a href="#" title="Recover your password">Forgot Password?</a>
                    </div>
                </div>
                <div class="signup-message">
                    <p>
                        Don’t have an account?
                        <a href="<?php echo $websiteUrl?>/portal/sign-up" title="Create an account">Sign-Up</a>
                    </p>
                    <p>
                        By logging in to this portal, you agree to our<br/>   
                        <a href="#" title="View Privacy Policy">Privacy Policy</a> and
                        <a href="#" title="View Terms of Service">Terms of Service</a>.
                    </p>
                </div>

            </div>
        </div>

    </section>
</body>


</html>