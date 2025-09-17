<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Study Abroad Services - Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai & France</title>
    
    <meta name="keywords" content="<?php echo $appName ?>, Study Abroad in Nigeria, Study in Canada from Nigeria, Study in USA from Nigeria, Study in Australia from Nigeria, Study in UK from Nigeria, Study in China from Nigeria, Study in Ghana from Nigeria, Study in Qatar from Nigeria, Study in Dubai from Nigeria, Study in France from Nigeria, Study Abroad services, International Exam registration Nigeria, GRE registration Nigeria, TOEFL registration Nigeria, IELTS registration Nigeria, GMAT registration Nigeria, SAT registration Nigeria, ACT registration Nigeria, PTE registration Nigeria, EduGrade Services, admission placement abroad, visa support, international education Nigeria, best study abroad consultant in Nigeria" />
    <meta name="description" content="Achieve your study abroad dreams with <?php echo $appName ?>. Study in Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai, and France. We provide exam registration (TOEFL, GRE, IELTS, GMAT, SAT, ACT, PTE), admission placement, and visa application support in Nigeria." />

    <meta property="og:title" content="<?php echo $appName ?> | Study Abroad - Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai & France" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description" content="Study abroad in Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai, and France with <?php echo $appName ?>. Get exam registration, admission placement, and visa support in Nigeria." />

    <meta name="twitter:title" content="<?php echo $appName ?> | Study Abroad Services - Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai & France" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description" content="Achieve your study abroad goals in Canada, USA, Australia, UK, China, Ghana, Qatar, Dubai, and France. Trusted study abroad agency in Nigeria for admission, visa, and exam registration." />
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
                                Study Abroad
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Study Abroad</h1>
                        <p>
                            EDUGRADE SERVICES is a top Educational Consultancy with centers across Nigeria and countries
                            like Ghana, Kenya, Ethiopia, and Uganda. With 9 years of experience, we've successfully
                            placed thousands of students
                            into foreign universities.
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
                                <h2>STUDY ABROAD</h2>
                            </div>
                            <h3>Achieve Your Dreams: Study in Top Universities <span>#Abroad</span></h3>
                        </div>

                        <div class="btn-div">
                            <a href="#"><button class="btn" title="Register now">Apply Now <i class="bi-chevron-right"></i></button></a>
                        </div>
                    </div>

                    <div class="our-exam-back-div" id="pageContent">
                        <script>_fetchAllStudyAbroadData();</script>

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