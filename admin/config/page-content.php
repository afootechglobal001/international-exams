<?php if ($page == 'login') { ?>
    <div class="form-section animated fadeIn" id="viewLogin">
        <h1>
            International Exams <br>
            <span>
                <span class="underline">Admin Log</span> in
            </span>
        </h1>

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

        <div class="form-button-div">
            <button class="btn" title="Click to Login" onclick="location.href='<?php echo $websiteUrl ?>/admin/dashboard'">
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

        <div class="text_field_container" id="emailAddress_container">
            <script>
                textField({
                    id: 'emailAddress',
                    title: 'Enter Your Email Address',
                    type: 'email'
                });
            </script>
        </div>

        <div class="form-button-div">
            <button class="btn" title="Click to Proceed" onclick="_nextLoginPage({page: 'sendLinkMail'});">
                PROCEED<i class="bi-arrow-right"></i>
            </button>
        </div>

        <div class="alert alert-success form-alert">
            Existing User? <span onclick="_nextLoginPage({page: 'login'});">LOG-IN HERE</span>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'sendLinkMail') { ?>
    <div class="form-section animated fadeIn">
        <div class="inner-form">
            <div class="top-div">
                <div class="icon-div"><i class="bi-check2-circle"></i></div>
                <h3>Mail sent successfully</h3>
            </div>

            <div class="alert alert-success form-alert link-form-alert"><i class="bi-person"></i> Dear <span><strong id="fullName">
                        HON. PAUL EMMANUEL</strong></span>,
                a link has been sent to your email address <span>(<strong id="email">
                        seunemmanuel107@gmail.com
                    </strong>)</span>
                to reset your password. Kindly check your <strong>INBOX</strong> or <strong>SPAM</strong> to confirm.
            </div>

            <div class="form-button-div link-btn-div">
                <button class="btn" type="button" id="submit_btn" title="Okay" onclick="location.href='<?php echo $websiteUrl ?>/admin/reset-password'">
                    OKAY <i class="bi-check2-all"></i>
                </button>
                <div class="notification"><strong>MAIL</strong> not received? <span><i class="bi-send"></i> <button class="resend-btn" id="resendBtn" onclick="_proceedResetPassword(staffEmailSession.email, 'resendBtn');"><strong title="RESEND MAIL">RESEND MAIL</strong> </button></span></div>
            </div>
        </div>
    </div>
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
            <button class="btn" title="Reset Password" id="completeBtn" onclick="_getForm({page: 'passwordResetSuccessful', url: adminLocalUrl});">
                Reset Password <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </div>
    </div>
<?php } ?>