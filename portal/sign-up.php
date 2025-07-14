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

        <!-- <?php $callclass->_pagesImage(); ?>

        <div class="right-login-div">
            <div class="form-box sign-up-form-box">

                <h1 title="Welcome Message">👋 Sign-Up</h1>

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
                    <button class="next-btn" title="Click to next">
                        NEXT  <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <p class="login-message">
                    Have you already have an account? 
                    <a href="#" title="Click to login">Log-In</a>
                </p>

            </div>
        </div> -->


        <!-- Next Page -->
        <!-- <?php $callclass->_pagesImage(); ?>

        <div class="right-login-div">
            <div class="form-box sign-up-form-box">

                <h1 title="Welcome Message">👋 Sign-Up</h1>

                <div class="alert alert-success form-alert">
                    Kindly, select and upload your <span title="Company Logo">Company Logo</span> to proceed with your registration.
                </div>

                <div class="alert alert-success form-alert company-logo-upload">
                    <label class="logo-label">COMPANY LOGO: <em>(JPG, PNG FORMAT ONLY)</em><span style="color: blue;">*</span></label>

                    <label class="logo-upload-box" title="Tap to upload picture">
                        <img src="images/bg.jpg" alt="Tap to upload picture" id="companyLogoPreview" />
                    </label>

                </div>



                <div class="form-button-div sign-up-form-btn">
                    <button class="back-btn" title="Click to go back">
                        <i class="bi bi-arrow-left"></i> BACK
                    </button>
                    <button class="next-btn" title="Click to next">
                        NEXT <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <p class="login-message">
                    Have you already have an account?
                    <a href="#" title="Click to login">Log-In</a>
                </p>

            </div>
        </div> -->



        <?php $callclass->_pagesImage(); ?>
        <div class="right-login-div">
            <div class="form-box sign-up-form-box">

                <h1 title="Welcome Message">👋 Sign-Up</h1>

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
                    <button class="back-btn" title="Click to go back">
                        <i class="bi bi-arrow-left"></i> BACK
                    </button>
                    <button class="proceed-btn" title="Click to proceed">
                        PROCEED  <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <p class="login-message">
                    Have you already have an account? 
                    <a href="#" title="Click to login">Log-In</a>
                </p>

            </div>
        </div>

    </section>
</body>


</html>