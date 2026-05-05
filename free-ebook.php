<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>Free E-books | International Exams – GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, DUOLINGO</title>
    
    <meta name="keywords"
        content="International Exams Free E-books, Free exam prep materials Nigeria, Free GRE E-book, Free TOEFL E-book, Free ACT E-book, Free IELTS E-book, Free GMAT E-book, Free SAT E-book, Free CGFNS E-book, Free PTE E-book, Free LSAT E-book, Free MCAT E-book, Free USMLE E-book, Free DUOLINGO E-book, exam preparation Nigeria, international exam resources" />
    
    <meta name="description"
        content="Download free e-books for GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, and DUOLINGO exams. International Exams provides trusted resources to help you prepare and succeed." />
    <meta property="og:title"
        content="Free E-books | International Exams – GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, DUOLINGO" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description"
        content="Get free exam preparation e-books for GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, and DUOLINGO from International Exams." />
    <meta name="twitter:title"
        content="Free E-books | International Exams – GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, DUOLINGO" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description"
        content="Free e-books for GRE, TOEFL, ACT, IELTS, GMAT, SAT, CGFNS, PTE, LSAT, MCAT, USMLE, and DUOLINGO to support your international exam preparation." />
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
                                Free E-book
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Free E-book</h1>
                        <p>
                            Download our free e-book and discover how EDUGRADE SERVICES, a trusted Educational Consultancy with over 9 years of
                            experience across Nigeria, Ghana, Kenya, Ethiopia, and Uganda, has helped thousands of students secure admission
                            into top foreign universities. This guide shares expert tips and proven strategies to make your study abroad journey easier.
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
                                <h2>FREE E-BOOK</h2>
                            </div>
                            <h3>Get Your Free E-book: Step-by-Step Guide to Studying <span>Abroad</span></h3>
                        </div>
                    </div>


                    <div class="fetch-ebooks" id="pageContent">
                        <script> _fetchAllEbookData();</script>

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