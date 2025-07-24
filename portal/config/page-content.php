<?php if ($page == 'signUp') { ?>


    <div class="form-box sign-up-form-box" id="nextPage1">
        <div class="alert alert-success form-alert">
            Kindly, provide your <span title="Company Information">Company Information</span> to proceed with your registration.
        </div>

        <div class="text_field_container" id="companyName_container">
            <script>
                textField({
                    id: 'companyName',
                    title: 'Company Name'
                });
            </script>
        </div>

        <div class="text_field_container" id="companyAddress_container">
            <script>
                textField({
                    id: 'companyAddress',
                    title: 'Company Address'
                });
            </script>
        </div>

        <div class="text_field_container" id="companyMobile_container">
            <script>
                textField({
                    id: 'companyMobile',
                    title: 'Company Mobile',
                    type: 'tel'
                });
            </script>
        </div>

        <div class="text_field_container" id="companyEmailAddress_container">
            <script>
                textField({
                    id: 'companyEmailAddress',
                    title: 'Company Email Address',
                    type: 'email'
                });
            </script>
        </div>

        <div class="form-button-div sign-up-form-btn">
            <button class="next-btn" onclick="_nextPage('nextPage2');">
                NEXT <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>



    <div class="right-login-div" id="nextPage2" style="display:none">
        <div class="alert alert-success form-alert">
            Kindly, select and upload your <span title="Company Logo">Company Logo</span> to proceed with your registration.
        </div>

        <div class="alert alert-success form-alert company-logo-upload">
            <label class="logo-label">COMPANY LOGO: <em>(JPG, PNG FORMAT ONLY)</em><span style="color: blue;">*</span></label>

            <label class="logo-upload-box" title="Tap to upload picture">
                <img src="images/bg.jpg" alt="Tap to upload picture" id="companyLogoPreview" />
                <input type="file" id="companyLogo" style="display:none;" accept=".jpg,.png" onchange="previewLogo();" />
            </label>
        </div>

        <div class="form-button-div sign-up-form-btn">
            <button class="back-btn" onclick="_prevPage('nextPage1');">
                <i class="bi bi-arrow-left"></i> BACK
            </button>
            <button class="next-btn" onclick="_nextPage('nextPage3');">
                NEXT <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>



    <div class="right-login-div" id="nextPage3" style="display:none">
        <div class="alert alert-success form-alert">
            Kindly, provide your <span title="Company Contact Person Information">Company Contact Person Information</span> to complete your registration.
        </div>

        <div class="text_field_container" id="fullName_container">
            <script>
                textField({
                    id: 'fullName',
                    title: 'Full Name'
                });
            </script>
        </div>

        <div class="text_field_container" id="emailAddress_container">
            <script>
                textField({
                    id: 'emailAddress',
                    title: 'Email Address',
                    type: 'email'
                });
            </script>
        </div>

        <div class="text_field_container" id="mobileNumber_container">
            <script>
                textField({
                    id: 'mobileNumber',
                    title: 'Mobile Number',
                    type: 'tel'
                });
            </script>
        </div>

        <div class="text_field_container" id="selectRole_container">
            <script>
                selectField({
                    id: 'selectRole',
                    title: '--Select Role--'
                });
                _getSelectLoanDuration('selectRole');
            </script>
        </div>

        <div class="form-button-div sign-up-form-btn">
            <button class="back-btn" onclick="_prevPage('nextPage2');">
                <i class="bi bi-arrow-left"></i> BACK
            </button>
            <button class="proceed-btn" onclick="_userSignUpCheck('signUp');">
                PROCEED <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>

<?php } ?>

