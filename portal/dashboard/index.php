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
                        <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                    </div>
                </div>
                <div class="menu">
                    <a href="#" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    <a href="#"><i class="bi bi-journal-text"></i> Exam</a>
                    <a href="#"><i class="bi bi-list-check"></i> Transactions History</a>
                    <a href="#"><i class="bi bi-list-check"></i> Subscription History</a>
                </div>

            </div>

            <div class="bottom-icons">
                <a href="#"><i class="bi bi-gear"></i> Settings</a>
                <a href="#"><i class="bi bi-power"></i> Log-Out</a>
            </div>
        </div>

        <div class="main-content-div">
            <header class="top-header-div">
                <div class="header-tabs-div">
                    <div class="header-tabs-div-in">
                        <h1>USER PORTAL</h1>
                        <a href="#" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <a href="#"><i class="bi bi-person-square"></i> My Profile</a>
                    </div>

                    <div class="header-right-icon-div">
                        <i class="bi bi-bell"></i>
                        <div class="profile-pic-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="profile picture">
                        </div>

                    </div>
                </div>
            </header>

            <div class="user-box-div">
                <div class="user-info-div">
                    <div class="profile-image">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="profile picture">
                    </div>

                    <div class="user-profile-div">
                        <h4>Mike Afolabi</h4>
                        <p><i class="bi bi-clock"></i> Last Login Date: 2025-07-14 19:07:12</p>
                    </div>
                </div>

                <div class="sub-div">
                    <div class="sub-div-in">
                        <p>Subscription expires in</p>
                        <h4>30 Day(s)</h4>
                    </div>

                    <div class="wallet-div">
                        <h4>₦5,000.00 <i class="bi bi-eye"></i></h4>
                        <button><i class="bi bi-wallet2"></i> Load Wallet</button>
                    </div>
                </div>
            </div>

            <div class="user-subjects-div">
                <h4><i class="bi bi-bar-chart"></i> List of Exams</h4>

                <div class="user-subjects-div-in">
                    <div class="subject-item">
                        <h4>BASIC SCIENCE</h4> <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="subject-item">
                        <h4>BASIC TECHNOLOGY</h4> <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="subject-item">
                        <h4>CIVIC EDUCATION</h4> <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="subject-item">
                        <h4>COMPUTER SCIENCE</h4> <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="subject-item">
                        <h4>MATHEMATICS</h4> <i class="bi bi-chevron-down"></i>
                    </div>
                </div>


            </div>



        </div>

    </section>

</body>

</html>