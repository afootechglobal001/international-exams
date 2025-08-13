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

    <?php include 'alert.php'; ?>

    <section class="main-login-container">

        <?php $callclass->_pagesImage(); ?>

        <div class="right-login-div">
            <div class="form-box sign-up-form-box">

                <div class="top-div">
                    <h1 title="Welcome Message">👋 Sign-Up</h1>
                </div>

                <div id="page-content">
                    <?php $page='signUp';?>
                    <?php include $websitePath.'/portal/config/page-content.php';?>
                </div>


                <p class="login-message">
                    Have you already have an account?
                    <a href="<?php echo $websiteUrl ?>/portal/index" title="Click to login">Log-In</a>
                </p>

            </div>
        </div>

    </section>
    <?php include 'bottom-scripts.php'; ?>
</body>


</html>