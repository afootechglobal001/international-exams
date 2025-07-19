<?php include '../../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>
    <section class="main-container">

        <?php include 'side-bar.php' ?>

        <div class="main-content-div">
            <?php include 'header.php' ?>

            <div class="active-page-div">
                <i class="bi bi-speedometer2" title="Dashboard"></i> Dashboard
            </div>

            <div class="user-box-div">
                <div class="user-box-div-in">

                    <div class="user-info-div">
                        <div class="profile-image" title="Profile Picture">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="User Profile Picture">
                        </div>

                        <div class="user-profile-div">
                            <h4>Mike Afolabi</h4>
                            <p><i class="bi bi-clock" title="Last Login Time"></i> Last Login Date: 2025-07-14 19:07:12</p>
                        </div>
                    </div>

                    <div class="sub-div">
                        <div class="sub-div-in">
                            <p>Subscription expires in</p>
                            <h4>30 Day(s)</h4>
                        </div>

                        <div class="wallet-div">
                            <h4>₦5,000.00 <i class="bi bi-eye" title="View Balance"></i></h4>
                            <button title="Load Wallet"><i class="bi bi-wallet2"></i> Load Wallet</button>
                        </div>
                    </div>

                </div>

            </div>

            <div class="user-subjects-div">
                <div id="page-content">
                    <script>_getActivePage({page:'dashboard', divid:'dashboard'});</script>		
                </div> 
            </div>
        </div>
    </section>
</body>

</html>