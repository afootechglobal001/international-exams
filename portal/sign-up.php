<?php include '../config/constants.php'; ?>
<?php include "config/function.php"; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student Portal | Sign-up</title>
</head>

<body>
    <main>
        <div class="picture-div animated fadeIn"></div>

        <div class="form-div animated fadeIn">
            <div class="form-box">
                <div class="form-box-content">
                    <div class="logo-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="International Exam Logo" />
                    </div>
                    <h1>Sign-Up</h1>
                    <div class="alert alert-success">
                        Kindly, provide the required information to sign-up on this platform.
                    </div>
                    <div class="fullName-div">
                        <div class="text_field_container" id="firstName_container">
                            <script>
                            textField({
                                id: 'firstName',
                                title: 'First Name',
                            });
                            </script>
                        </div>
                        <div class="text_field_container" id="lastName_container">
                            <script>
                            textField({
                                id: 'lastName',
                                title: 'Last Name',
                            });
                            </script>
                        </div>

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

                    <div class="text_field_container" id="phoneNumber_container">
                        <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Phone Number',
                        });
                        </script>
                    </div>

                    <div class="text_field_container" id="countryId_container">
                        <script>
                        selectField({
                            id: 'countryId',
                            title: 'Select Your Country'
                        });
                        _getSelectCountry('countryId');
                        </script>
                    </div>
                    <div class="btn-div">
                        <button class="btn" title="Click to log In"
                            onclick="window.location.href='<?php echo $websiteUrl?>/portal/dashboard'">
                            Log In <i class="bi bi-check"></i>
                        </button>
                    </div>
                </div>
                <div class="signup-message">
                    <p>
                        Already have an account?
                        <a href="<?php echo $websiteUrl?>/portal/" title="Create an account">Login Here</a>
                    </p>
                </div>

            </div>
        </div>

    </main>
</body>


</html>