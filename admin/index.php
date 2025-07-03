<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>


    <div class="page-container">
        <div class="login-card-div">
            <div class="logo-div">
                <img src="images/logo.png" alt="International Exams Logo">
            </div>

            <div class="form-section">
                <h1>International Exams<span>Admin Log-in</span></h1>

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
                    <button class="btn">Log-in</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>