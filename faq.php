<?php include 'config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | Frequently Asked Questions (FAQ) - Exam Registration & Study Abroad</title>
    
    <meta name="keywords" content="<?php echo $appName ?> FAQ, Frequently Asked Questions, Exam Registration FAQ Nigeria, Study Abroad FAQ, TOEFL FAQ Nigeria, GRE FAQ Nigeria, GMAT FAQ Nigeria, SAT FAQ Nigeria, ACT FAQ Nigeria, IELTS FAQ Nigeria, PTE FAQ Nigeria, International Exam FAQ, EduGrade Services FAQ, exam registration questions, how to register TOEFL in Nigeria, IELTS registration cost Nigeria, exam payment plans Nigeria, study abroad questions" />
    <meta name="description" content="Find answers to the most common questions about exam registration (TOEFL, GRE, GMAT, SAT, ACT, PTE, IELTS) and study abroad services with <?php echo $appName ?>. Clear guidance for Nigerian students." />

    <meta property="og:title" content="<?php echo $appName ?> | FAQ - Exam Registration & Study Abroad" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description" content="Answers to frequently asked questions about TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exam registration, plus study abroad services in Nigeria." />

    <meta name="twitter:title" content="<?php echo $appName ?> | FAQ - Exam Registration & Study Abroad" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description" content="Get answers to common questions about exam registration and study abroad with <?php echo $appName ?>. TOEFL, GRE, GMAT, SAT, ACT, PTE, IELTS in Nigeria." />
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
                        <li title="About Us">
                            <a href="<?php echo $websiteUrl ?>/about-us">
                                Frequently Asked Questions
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Frequently Asked Questions</h1>
                        <p>
                            Edugrade Services is a trusted international educational consultancy with 9+ years of
                            excellence,
                            helping thousands of students secure admissions and succeed in top global universities.
                        </p>

                        <div class="btn-div">
                            <a href="#" title="Get Started">
                                <button class="btn" title="Get Started">
                                    Get Started <i class="bi bi-chevron-right"></i>
                                </button>
                            </a>
                            <a href="#" title="Contact Us">
                                <button class="btn right-btn" title="Contact Us">
                                    Contact Us <span>+234-703-841-1794</span>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="image-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/about.svg" alt="International Exam">
                    </div>

                </div>
            </div>

        </div>
    </div>

    <section class="other-pages-main-section">
        <section class="body-div blog-bg">
            <div class="body-div-in">
                <div class="page-back-div">
                    <div class="right-div sticky-div">
                        <div class="div-in">
                            <h3>SEARCH</h3>
                            <div class="text_field_container">
                                <input class="text_field" id="searchContent" onkeyup="filters('Content');" type="text" placeholder="" />
                                <div class="placeholder">Type Here To Search</div>
                            </div>
                        </div>

                        <div class="div-in">
                            <h3>TAG LIST</h3>

                            <ul id="catId">
                                <script>_fetchFaqCat(); </script>
                            </ul>
                        </div>
                    </div>

                    <div class="left-div">
                        <div class="general-faq-div" id="pageContent">
                            <script> _fetchFaqPageData();</script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </section>
</body>

</html>