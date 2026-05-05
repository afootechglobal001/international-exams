<?php include '../config/constants.php'; ?>
<?php include "config/function.php"; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Student Portal | Log-In</title>
</head>

<body>
    <?php include 'alert.php' ?>
    <main>
        <div class="picture-div animated fadeIn"></div>

        <div class="form-div animated fadeIn">
            <div class="form-box">
                <div id="page-content">
                    <?php $page='login';?>
                    <?php include $websitePath.'/portal/config/page-content.php';?>
                </div>
                
                <div class="signup-message">
                    <p>
                        Don’t have an account?
                        <a href="<?php echo $websiteUrl ?>/portal/sign-up" title="Create an account">Sign-Up</a>
                    </p>
                    <p>
                        By logging in to this portal, you agree to our<br />
                        <a href="#" title="View Privacy Policy">Privacy Policy</a> and
                        <a href="#" title="View Terms of Service">Terms of Service</a>.
                    </p>
                </div>

            </div>
        </div>

    </main>
</body>

<?php include 'bottom-scripts.php' ?>

</html>