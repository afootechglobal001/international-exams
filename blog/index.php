<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $appName ?> Blog | Exam Tips, Study Abroad Guides & Registration Updates</title>
    
    <meta name="keywords" content="<?php echo $appName ?> blog, EduGrade Services blog, exam tips Nigeria, TOEFL blog Nigeria, GRE blog Nigeria, GMAT blog Nigeria, SAT blog Nigeria, ACT blog Nigeria, IELTS blog Nigeria, PTE blog Nigeria, study abroad blog, international exam news, exam preparation tips Nigeria, EduGrade articles, how to pass TOEFL Nigeria, IELTS preparation Nigeria, GMAT tips Nigeria, GRE registration blog, study abroad guides Nigeria, exam updates blog" />
    <meta name="description" content="Read the latest articles, exam tips, preparation guides, and study abroad advice on the <?php echo $appName ?> blog. Stay updated on TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS registration in Nigeria." />

    <meta property="og:title" content="<?php echo $appName ?> Blog | Exam Tips, Study Abroad Guides & Registration Updates" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description" content="Explore exam tips, study abroad advice, and registration updates for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS in Nigeria on the <?php echo $appName ?> blog." />

    <meta name="twitter:title" content="<?php echo $appName ?> Blog | Exam Tips, Study Abroad Guides & Registration Updates" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description" content="Stay informed with <?php echo $appName ?> blog – exam preparation tips, study abroad guides, and updates on international exams in Nigeria." />
</head>


<body>
    <?php include '../header.php' ?>

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
                        <li title="Blog">
                            <a href="<?php echo $websiteUrl ?>/blog">
                                Blog & Article
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Latest Insight</h1>
                        <p>
                            Edugrade Services is a leading international educational consultancy with centers across
                            Nigeria and countries like Ghana, Kenya, Ethiopia, and Uganda. With over 9 years of
                            experience, we have successfully guided thousands of students into top universities abroad.
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
                                <script>
                                    _fetchBlogCat();
                                </script>
                            </ul>
                        </div>
                    </div>

                    <div class="left-div">
                        <div class="page-list-back-div" id="pageContent">
                            <script> _fetchAllPageBlogData();</script>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div">
            <div class="body-div-in">
                <div class="inner-body-div-in">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="left-div">
                            <div class="top-title">
                                <h2>LATEST INSIGHTS</h2>
                            </div>
                            <h3>Related News And <span>Articles</span></h3>
                        </div>
                    </div>

                    <div class="blog-back-div" id="relatedBlogContent">
                        <script> _fetchRelatedBlogData();</script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include '../footer.php' ?>
    </section>

</body>

</html>