<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>
    <section class="login-div">

        <div class="page-container">
            <div class="login-card-div">
                <div class="logo-div">
                    <img src="images/logo.png" alt="International Exams Logo" title="International Exams Logo">
                </div>

                <div class="form-section">
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
                        <button class="btn" title="Click to Login">
                            <i class="bi bi-check-all"></i>LOG-IN
                        </button>
                    </div>

                    <div class="alert alert-success form-alert">
                        Forget Password? <span>RESET PASSWORD</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>