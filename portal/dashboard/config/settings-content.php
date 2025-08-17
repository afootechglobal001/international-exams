<?php if ($page == 'resetPassword') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
    <div class="form-title-div">
        <div class="title-div">
            <div class="icon-div"><i class="bi bi-shield-shaded"></i></div>
            <h3>RESET PASSWORD</h3>
        </div>
        <div class="btn-div">
            <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                <i class="bi bi-x-lg"></i> Close
            </button>
        </div>
    </div>
    <!-- /////////// Title ////////////////////////////// -->
    <div class="container-back-div">
        <div class="form-notification">
            <p>Secure your account by creating a new password. Follow the steps to update your login details and regain
                access to your exam portal.</p>
        </div>

        <div class="form-container">

            <div class="text_field_container" id="oldPassword_container">
                <script>
                textField({
                    id: 'oldPassword',
                    title: 'Enter Your Old Password',
                    type: 'password'
                });
                </script>
            </div>

            <div class="form-note">
                <p>At least 8 charaters required including upper & lower cases
                    and special characters and numbers.</p>
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


        </div>
        <div class="btn-div">
            <button class="btn" title="CHANGE PASSWORD" id="submitBtn" onclick="_changePassword();"> <i
                    class="bi-check"></i> CHANGE PASSWORD </button>
        </div>
    </div>
</section>
<?php } ?>


<?php if ($page == 'logoutConfirmForm') { ?>


<div class="caption-success-div animated zoomIn">
    <div class="caption-body">
        <div class="logout-caption">
            <div class="img"><img src="<?php echo $websiteUrl ?>/all-images/images/warning.gif" /></div>
            <h2>Are you sure to log-out?</h2>
            <p>Please, confirm your log-out action.</p>
        </div>
        <div class="btn-div">
            <button class="btn false-btn" onclick="_alertClose(<?php echo $modalLayer ?>);">NO</button>
            <button class="btn" onclick="_logOut();">YES</button>
        </div>
    </div>
</div>

<?php } ?>