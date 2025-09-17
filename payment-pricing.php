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
                        <li title="Study Abroad">
                            <a href="<?php echo $websiteUrl ?>/study-abroad">
                                Payment Pricing
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Payment & Pricing</h1>
                        <p>
                            At EDUGRADE SERVICES, we provide transparent and flexible payment options for our consultancy services. 
                            Our pricing is designed to be affordable while covering the full process — from application guidance 
                            to securing admission and visa support. Explore our plans and choose the one that best fits your 
                            study abroad journey.
                        </p>

                        <?php $callclass->_pagesButtons($websiteUrl);?>
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
                        <script>_fetchPaymentPricingData();</script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>
</html>