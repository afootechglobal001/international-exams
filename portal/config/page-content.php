<?php if ($page == 'login') { ?>
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
            <div class="span" onclick="_nextUserLoginPage({page: 'forgetPassword'});">Forgot Password?</div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'forgetPassword') { ?>
    <div class="form-box-content">
        <div class="logo-div">
            <a href="<?php echo $websiteUrl ?>" title="Home">
                <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png"
                    alt="International Exam Logo" /></a>
        </div>
        <h1>Reset Password!</h1>
        <div class="alert alert-success">
            Kindly, provide your <span>Email Address</span> to reset your password.
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

        <div class="btn-div">
            <button class="btn" id="proceedBtn" title="Click to Proceed" onclick="_proceedResetPassword();">
                PROCEED<i class="bi-arrow-right"></i>
            </button>
            <div class="span" onclick="_nextUserLoginPage({page: 'login'});">Existing User? <span>LOG-IN</span></div>
        </div>
    </div>
<?php } ?>