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

        <div class="sidebar-div">
            <div class="sidebar-div-in">

                <div class="logo-div">
                    <div class="div-in">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="International Exams Logo">
                    </div>
                </div>

                <nav class="menu">
                    <a href="#" class="active" title="Dashboard" id="dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    <a href="#" title="Exam" id="exam" onclick="_getActivePage({page:'exam', divid:'exam'});"><i class="bi bi-journal-text"></i> Exam</a>
                    <a href="#" title="Transactions History"><i class="bi bi-list-check"></i> Transactions History</a>
                    <a href="#" title="Subscription History"><i class="bi bi-list-check"></i> Subscription History</a>
                </nav>
            </div>

            <div class="bottom-icons">
                <a href="#" title="Settings"><i class="bi bi-gear"></i> Settings</a>
                <a href="#" title="Log-Out"><i class="bi bi-power"></i> Log-Out</a>
            </div>
        </div>


        <div class="main-content-div">
            <header class="top-header-div">
                <div class="header-tabs-div">
                    <div class="header-tabs-div-in">
                        <h1>USER PORTAL</h1>
                        <a href="#" class="active" title="Dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <a href="#" title="My Profile"><i class="bi bi-person-square"></i> My Profile</a>
                    </div>

                    <div class="header-right-icon-div">
                        <i class="bi bi-bell" title="Notifications"></i>
                        <div class="profile-pic-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="User Profile Picture">
                        </div>
                    </div>
                </div>
            </header>


            <div class="active-page-div">
                <i class="bi bi-speedometer2" title="Dashboard"></i> Dashboard
            </div>

            <div class="user-box-div">
                <div class="user-box-div-in">

                    <div class="user-info-div">
                        <div class="profile-image">
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