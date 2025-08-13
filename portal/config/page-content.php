<?php if ($page == 'signUp') { ?>


    <div id="nextPage1" class="form-box">
        <div class="alert alert-success form-alert">
            Kindly, provide your <span title="Company Information">Personal Information</span> to proceed with your registration.
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
                    title: 'Email Address'
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


        <div class="text_field_container" id="selectCountry_container">
            <script>
                selectField({
                    id: 'selectCountry',
                    title: '--Select Your Country--'
                });
            </script>
        </div>

        <div class="form-button-div sign-up-form-btn">
            <button class="next-btn" type="button" title="NEXT" onclick="_nextPage('nextPage2');">
                NEXT <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>



    <div id="nextPage2" class="form-box" style="display: none;">
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
            <button class="back-btn" type="button" title="PREVIOUS" onclick="_prevPage('nextPage1');">
                <i class="bi bi-arrow-left"></i> BACK
            </button>
            <button class="next-btn" type="button" title="NEXT" onclick="_nextPage('nextPage3');">
                NEXT <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>



    <div id="nextPage3" class="form-box" style="display: none;">
        <div class="alert alert-success form-alert">
            Kindly, provide your <span title="Company Contact Person Information">Company Contact Person Information</span> to complete your registration.
        </div>

        <div class="text_field_container" id="fullNames_container">
            <script>
                textField({
                    id: 'fullNames',
                    title: 'Full Name'
                });
            </script>
        </div>

        <div class="text_field_container" id="emailAddres_container">
            <script>
                textField({
                    id: 'emailAddres',
                    title: 'Email Address',
                    type: 'email'
                });
            </script>
        </div>

        <div class="text_field_container" id="mobileNumbers_container">
            <script>
                textField({
                    id: 'mobileNumbers',
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
            </script>
        </div>

        <div class="form-button-div sign-up-form-btn">
            <button class="back-btn" type="button" title="PREVIOUS" onclick="_prevPage('nextPage2');">
                <i class="bi bi-arrow-left"></i> BACK
            </button>
            <button class="proceed-btn" type="button" title="PROCEED">
                PROCEED <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>

<?php } ?>

