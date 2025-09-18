<?php if ($page == 'login') { ?>
    <div class="form-section animated fadeIn" id="viewLogin">
        <h1>
            International Exams <br>
            <span>
                <span class="underline">Admin Log</span> in
            </span>
        </h1>

        <div class="text_field_container" id="userName_container">
            <script>
                textField({
                    id: 'userName',
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

        <div class="form-button-div">
            <button class="btn" title="Click to Login" id="submitBtn" onclick="_confirmLogin();">
                <i class="bi bi-check-all"></i>LOG-IN
            </button>
        </div>

        <div class="alert alert-success form-alert">
            Forget Password? <span onclick="_nextLoginPage({page: 'forgetPassword'});">RESET PASSWORD</span>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'forgetPassword') { ?>
    <div class="form-section animated fadeIn" id="viewLogin">
        <h1>
            International Exams <br>
            <span>
                <span class="underline">Admin Reset</span> Password
            </span>
        </h1>

        <div class="text_field_container" id="email_container">
            <script>
                textField({
                    id: 'email',
                    title: 'Enter Your Email Address',
                    type: 'email'
                });
            </script>
        </div>

        <div class="form-button-div">
            <button class="btn" id="proceedBtn" title="Click to Proceed" onclick="_proceedResetPassword();">
                PROCEED<i class="bi-arrow-right"></i>
            </button>
        </div>

        <div class="alert alert-success form-alert">
            Existing User? <span onclick="_nextLoginPage({page: 'login'});">LOG-IN HERE</span>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'sendLinkMail') { ?>
    <script>
        staffEmailSession = JSON.parse(sessionStorage.getItem("staffEmailSession"));
    </script>

    <div class="form-section animated fadeIn">
        <div class="inner-form">
            <div class="top-div">
                <div class="icon-div"><i class="bi-check2-circle"></i></div>
                <h3>Mail sent successfully</h3>
            </div>

            <div class="alert alert-success form-alert link-form-alert"><i class="bi-person"></i> Dear <span><strong id="fullName">
                <script>
                    $("#fullName").html(staffEmailSession.fullName);
                </script></strong></span>,
                a link has been sent to your email address <span>(<strong id="email">
                    <script>
                        $("#email").html(staffEmailSession.email);
                    </script>
                    </strong>)</span>
                to reset your password. Kindly check your <strong>INBOX</strong> or <strong>SPAM</strong> to confirm.
            </div>

            <div class="form-button-div link-btn-div">
                <button class="btn" title="Okay" onclick="location.href='<?php echo $websiteUrl ?>/admin'">
                    OKAY <i class="bi-check2-all"></i>
                </button>
                <div class="notification"><strong>MAIL</strong> not received? <span><i class="bi-send"></i> <button class="resend-btn" id="resendBtn" onclick="_proceedResetPassword(staffEmailSession.email, 'resendBtn');"><strong title="RESEND MAIL">RESEND MAIL</strong> </button></span></div>
            </div>
        </div>
    </div>
<script>
    sessionStorage.removeItem("staffEmailSession");
</script>
<?php } ?>


<?php if ($page == 'completeResetPassword') { ?>
    <div class="form-section animated fadeIn">
        <h1>
            International Exams <br>
            <span>
                <span class="underline">Complete Reset</span> Password
            </span>
        </h1>

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

        <div class="pswd_info"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>

        <div class="form-button-div">
            <button class="btn" title="Reset Password" id="completeBtn" onclick="_completeResetPassword();">
                Reset Password <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'verifyRefResponse') { ?>
    <div class="form-section animated fadeIn">
        <div class="inner-form">
            <div class="top-div">
                <div class="icon-div red-icon"><i class="bi-exclamation-octagon"></i></div>
                <h3>Link Expired!</h3>
            </div>

            <div class="alert alert-failed form-alert link-form-alert">Kindly reset your password again or contact your <strong>Administrator</strong> to continue.</div>

            <div class="form-button-div">
                <button class="btn" title="Okay" onclick="location.href='<?php echo $websiteUrl ?>/admin'">
                    OKAY <i class="bi-check2-all"></i>
                </button>
            </div>
        </div>
    </div>
<?php } ?>