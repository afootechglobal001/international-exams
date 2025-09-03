<?php include 'config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php'?>
    <title><?php echo $appName?> - <?php echo $pageTitle?></title>
    <meta name="description" content="<?php echo $seoKeywords?>" />
    <meta name="keywords" content="<?php echo $seoKeywords?>" />

    <meta property="og:title" content="<?php echo $appName?> - <?php echo $pageTitle?>" />
    <meta property="og:image" content="<?php echo $websiteUrl?>/uploaded_files/seoFlyer/<?php echo $pageSeoPix?>" />
    <meta property="og:description" content="<?php echo $seoKeywords?>" />

    <meta name="twitter:title" content=" <?php echo $appName?> - <?php echo $pageSeoPix?>" />
    <meta name="twitter:card" content="<?php echo $appName?>" />
    <meta name="twitter:image" content="<?php echo $websiteUrl?>/uploaded_files/seoFlyer/<?php echo $pageSeoPix?>" />
    <meta name="twitter:description" content="<?php echo $seoKeywords?>" />
</head>

<body>
    <?php include 'header.php' ?>

    <div class="other-pages-slide-section other-pages-blog-details animated fadeInDown">
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
                                Blog & Article <i class="bi bi-caret-right-fill"></i>
                            </a>
                        </li>

                        <li title="Blog Title">
                            <a href="<?php echo $websiteUrl ?>/blog">
                                Study Abroad with Interantional Exams
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div blog-details-div" >
                        <h1 id="regTitle">Loading...</h1>

                        <div class="meta">
                            <span><i class="bi bi-person"></i> By: <strong id="fullName">Loading...</strong> </span> |
                            <span><i class="bi-calendar3"></i> DATE: <strong id="updatedTime">Loading...</strong></span> |
                            <span><i class="bi-eye"></i> VIEWS: 200</span>
                        </div>
                        <p class="intro" id="seoDescription">Loading...</p>
                    </div>

                </div>
            </div>
        </div>
        <section class="other-pages-main-section">
            <section class="body-div blog-bg">
                <div class="body-div-in column">
                    <div class="blog-div">
                        <div class="blog-div-inner blog-div-inner-details">
                            <div class="image-div">
                                <img id="examPreviewPix" src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp" alt="">
                            </div>

                            <div class="thumbnails">
                                <button class="thumb-arrow prev"><i class="bi bi-chevron-double-left"></i></button>

                                <div class="thumbnails-img">
                                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp" alt="blog pics">
                                </div>

                                <div class="thumbnails-img">
                                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp" alt="blog pics">
                                </div>

                                <div class="thumbnails-img">
                                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp" alt="blog pics">
                                </div>
                                
                                <button class="thumb-arrow next"><i class="bi bi-chevron-double-right"></i></button>
                            </div>


                            <p class="blog-text">
                                Discover how "Interantional Exams" is revolutionizing school administration for basic
                                and
                                secondary schools in Nigeria. From staff management to academic performance tracking,
                                learn
                                how this innovative platform is simplifying school operations and improving efficiency.
                            </p>

                            <p class="blog-text">
                                Discover how "Interantional Exams" is revolutionizing school administration for basic
                                and
                                secondary schools in Nigeria. From staff management to academic performance tracking,
                                learn
                                how this innovative platform is simplifying school operations and improving efficiency.
                            </p>

                            <div class="comment-back-div">
                                <div id="disqus_thread"></div>
                                <script>
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://arrahmanmontessori.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                            </div>
                        </div>


                        <div class="blog-search sticky-div">
                            <div class="search-inner search-inner-details">
                                <h2>RECENT BLOG</h2>

                                <div class="recent-post">
                                    <div class="recent-post-inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp"
                                            alt="Recent pics">
                                    </div>

                                    <div>
                                        <p> Discover how "Interantional Exams" is revolutionizing school
                                            administration...</p>
                                        <small><i class="bi bi-clock"></i> 25 Nov 2024 <span>|</span> <i
                                                class="bi bi-eye-fill"></i> 200 Views</small>
                                    </div>
                                </div>

                                <div class="recent-post">
                                    <div class="recent-post-inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp"
                                            alt="Recent pics">
                                    </div>

                                    <div>
                                        <p>Master "TOEFL and IELTS" with tips, strategies, and resources that boost
                                            your...</p>
                                        <small><i class="bi bi-clock"></i> 25 Nov 2024 <span>|</span> <i
                                                class="bi bi-eye-fill"></i> 200 Views</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <script>_fetchEachSiteExam('<?php echo $publishId ?>');</script>
            </section>

            <?php include 'footer.php' ?>
        </section>

</body>

</html>