<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Exam Registration & Payment Plans for TOEFL, GRE, GMAT, SAT, ACT, PTE, IELTS in Nigeria</title>
    <meta name="keywords" content="<?php echo $appName ?>, TOEFL registration in Nigeria, GRE registration Nigeria, GMAT registration Nigeria, SAT registration Nigeria, ACT exam Nigeria, PTE Nigeria, IELTS Nigeria, exam registration Nigeria, EduGrade Services, study abroad exams, international exam registration, international exams Nigeria, affordable exam payment plans, TOEFL payment plan Nigeria, GRE payment plan Nigeria, GMAT payment plan Nigeria, SAT payment plan Nigeria, ACT payment plan Nigeria, IELTS payment plan Nigeria, PTE payment plan Nigeria, flexible exam payments, pay in installments Nigeria, best exam registration center, study abroad consultants, international examination pricing" />
    <meta name="description" content="Register for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exams in Nigeria with flexible payment plans. <?php echo $appName ?> offers trusted support, fast processing, and affordable installment options for your international exam success." />
    <meta property="og:title" content="<?php echo $appName ?> | Exam Registration & Payment Plans for TOEFL, GRE, GMAT, SAT, ACT, PTE, IELTS in Nigeria" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description" content="Secure your exam registration with flexible payment plans for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS in Nigeria. Trusted support, fast processing, and installment options available." />
    <meta name="twitter:title" content="<?php echo $appName ?> | Exam Registration & Payment Plans in Nigeria" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description" content="Register and pay for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exams in Nigeria with <?php echo $appName ?>. Enjoy affordable payment plans and expert guidance." />
</head>


<body>
    <?php include 'header.php' ?>

    <div class="other-pages-slide-section animated fadeInDown">
        <div class="other-pages-slide-div">

            <div class="top-title">
                <nav>
                    <ul>
                        <li title="Home">
                            <a href="<?php echo $websiteUrl ?>/index">
                                Home <i class="bi bi-caret-right-fill"></i>
                            </a>
                        </li>
                        <li title="Exams & Lectures Payment">
                            Exams & Lectures Payment
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Exams & Lectures Payment</h1>
                        <p>
                            At EDUGRADE SERVICES, we provide transparent and flexible payment options for our consultancy services.
                            Our pricing is designed to be affordable while covering the full process — from application guidance
                            to securing admission and visa support. Explore our plans and choose the one that best fits your
                            study abroad journey.
                        </p>

                        <?php $callclass->_pagesButtons($websiteUrl); ?>
                    </div>

                    <div class="image-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/about.svg" alt="International Exam">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="other-pages-main-section">
        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="inner-body-div-in">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="left-div">
                            <div class="top-title">
                                <h2>PAYMENT & PRICING</h2>
                            </div>
                            <h3>Flexible & Transparent Plans for Your <span>#Exams</span></h3>
                        </div>

                        <div class="btn-div">
                            <a href="#"><button class="btn" title="Register now">Register For Exam <i class="bi-chevron-right"></i></button></a>
                        </div>
                    </div>

                    <div class="our-exam-back-div pricing-back-div" id="pageContent">
                        <script>
                            _fetchPaymentPricingData();
                        </script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="page-back-div">
                    <div class="left-div">
                        <div class="page-list-back-div table-page-list-back-div">
                            <div class="main-content-div other-main-content" data-aos="fade-in" data-aos-duration="1500">
                                <div class="tables-content-div">
                                    <div class="content-title">
                                        <div class="title">
                                            <i class="bi bi-journal"></i>
                                            <h3>EXAM PRICE DETAILS</h3>
                                        </div>
                                    </div>

                                    <div class="inner-table-content">
                                        <div class="table-div animated fadeIn">
                                            <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                                                <thead>
                                                    <tr class="tb-col">
                                                        <th>sn</th>
                                                        <th>Exam Type</th>
                                                        <th>Registration Fee</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="fetchTablePaymentPricingData">
                                                    <script>
                                                        _fetchTablePaymentPricingData();
                                                    </script>
                                                    <tr>
                                                        <td colspan="8">
                                                            <div class="content-loading-div">
                                                                <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-div">
                                <a href="<?php echo $websiteUrl ?>/exam-registration" title="CLICK HERE TO MAKE PAYMENT ONLINE">
                                <button class="btn">CLICK HERE TO MAKE PAYMENT ONLINE<i class="bi bi-check-circle"></i></button></a>
                            </div>

                            <div class="main-content-div other-main-content" data-aos="fade-in" data-aos-duration="1500">
                                <div class="tables-content-div">
                                    <div class="content-title">
                                        <div class="title">
                                            <i class="bi bi-journal"></i>
                                            <h3>LECTURES PRICE DETAILS</h3>
                                        </div>
                                    </div>

                                    <div class="inner-table-content">
                                        <div class="table-div animated fadeIn">
                                            <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                                                <thead>
                                                    <tr class="tb-col">
                                                        <th>sn</th>
                                                        <th>Exam Type</th>
                                                        <th>Physical Lecture Fee</th>
                                                        <th>Online Lecture Fee</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="fetchTableLecturePricingData">
                                                    <tr>
                                                        <td colspan="8">
                                                            <div class="content-loading-div">
                                                                <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="right-div sticky-div">
                        <div class="div-in">
                            <h3>COMPANY ACCOUNT DETAILS</h3>

                            <div class="pricing-back-div">
                                <div class="title">
                                    ACCOUNT NUMBER
                                    <div><span id="accountNumber">Loading...</span></div>
                                </div>
                            </div>

                            <div class="pricing-back-div">
                                <div class="title">
                                    BANK NAME
                                    <div><span id="bankName">Loading...</span></div>
                                </div>
                            </div>

                            <div class="pricing-back-div">
                                <div class="title">
                                    ACCOUNT NAME
                                    <div><span id="accountName">Loading...</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="div-in">
                            <h3>INCENTIVES</h3>

                            <div class="related-post-back-div pages-inner-content">
                                <p>- Premium Online Lectures</p>
                                <p>- Free e-books</p>
                                <p>- Textbook (Hard Copy)</p>
                                <p>- Magoosh Premium Account</p>
                                <p>- Past questions</p>
                                <p>- Test Simulations</p>
                            </div>
                        </div>
                    </div>
                    <script>_fetchAccountDetails();</script>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>

</html>