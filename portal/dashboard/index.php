<?php include '../../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Admin Portal</title>
</head>

<body>
    <?php include 'header.php' ?>
    <?php include 'side-bar.php' ?>


    <section class="main-container">
        <div class="main-content-div">

            <div class="active-page-div">
                <div class="title">
                    <i class="bi bi-speedometer2"></i>
                    <h3>Dashboard</h3>
                </div>
                <div class="btn-div">
                    <button class="btn" title="Refresh Page">
                        <i class="bi bi-filetype-pdf"></i> Download E-books
                    </button>
                    <button class="btn apply-btn" title="Apply for Exam">
                        <i class="bi bi-journal-text"></i>  Apply for Exam
                    </button>
                </div>

            </div>

            <div id="page-content">
                <script>
                _getActivePage({
                    page: 'dashboard',
                    divid: 'dashboard'
                });
                </script>
            </div>

        </div>
    </section>
</body>

</html>