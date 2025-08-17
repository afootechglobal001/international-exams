<?php if ($page == 'settings') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-gear"></i></div>
            </div>
            <div class="text-div">
                <h3>Global Configurations</h3>
                <p>Manage and configure dashboard settings, global settings and manage users</p>
            </div>
        </div>

        <div class="btn-div">
            <button class="btn" title="LEARN MORE">
                <i class="bi-plus-square"></i> LEARN MORE
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-gear"></i>
                    <p>Global Configurations</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="user-managment-back-div" data-aos="fade-in" data-aos-duration="1500">
                        <div class="user-managment-list" title="Account Management" onclick="_getForm({page: 'accountSettings', url: adminPortalLocalUrl});">
                            <div class="inner-div">
                                <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/gear.png" alt="Account Management" /></div>
                                <div class="text-div">
                                    <h3>Account Management</h3>
                                    <p>User can Manage account informations, ensuring secure and efficient access to features.</p>
                                </div>
                            </div>
                        </div>

                        <div class="user-managment-list" title="Change Password" onclick="_getForm({page: 'changePassword', url: adminPortalLocalUrl});">
                            <div class="inner-div">
                                <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/status.png" alt="Change Password" /></div>
                                <div class="text-div">
                                    <h3>Change Password</h3>
                                    <p>Users can change and upadate their password</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'changePassword') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-shield-lock"></i> CHANGE PASSWORD</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to change your <span>PASSWORD</span></div>
                </div>

                <div class="text_field_container" id="oldPassword_container">
                    <script>
                        textField({
                            id: 'oldPassword',
                            title: 'Enter Your Old Password',
                            type: 'password'
                        });
                    </script>
                </div>

                <div class="pswd_info" style="color:#8c8d8d"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>

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

                <div>
                    <button class="btn" title="CHANGE PASSWORD" id="submitBtn" onclick="_changePassword();"> <i class="bi-check"></i> CHANGE PASSWORD </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'accountSettings') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-gear"></i> ACCOUNT INFORMATIONS</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to update your <span>ACCOUNT INFORMATIONS</span></div>
                </div>

                <div class="alert alert-success form-alert">
                    <span>SMTP INFORMATIONS</span>
                    <div class="text_field_back_container">
                        <div class="text_field_container" id="senderName_container">
                            <script>
                                textField({
                                    id: 'senderName',
                                    title: 'SENDER NAME'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpHost_container">
                            <script>
                                textField({
                                    id: 'smtpHost',
                                    title: 'SMTP HOST',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpUserName_container">
                            <script>
                                textField({
                                    id: 'smtpUserName',
                                    title: 'SMTP USERNAME',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpPassword_container">
                            <script>
                                textField({
                                    id: 'smtpPassword',
                                    title: 'SMTP PASSWORD',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpPort_container">
                            <script>
                                textField({
                                    id: 'smtpPort',
                                    title: 'SMTP PORT',
                                    type: 'number'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="supportEmail_container">
                            <script>
                                textField({
                                    id: 'supportEmail',
                                    title: 'SUPPORT EMAIL',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="payKey_container">
                            <script>
                                textField({
                                    id: 'payKey',
                                    title: 'PAYSTACK PAYMENT KEY'
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>