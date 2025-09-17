<?php include '../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>
    <?php include 'alert.php' ?>
    <section class="login-div">
        <div class="page-container">
            <div class="login-card-div">
                <div class="logo-div">
                    <a href="<?php echo $websiteUrl ?>" title="Home">
                    <img src="images/logo.png" alt="International Exams Logo" title="International Exams Logo"></a>
                </div>

                <div id="page-content">
                    <?php $page='login';?>
                    <?php include $websitePath.'/admin/config/page-content.php';?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>