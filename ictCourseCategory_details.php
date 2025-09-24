<?php include 'config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php'?>
    <title><?php echo $pageTitle?> - <?php echo $appName?></title>
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

    <section class="other-pages-slide-section other-pages-blog-details animated fadeInDown">
        <div class="other-pages-slide-div">
            <div class="top-title">
                <nav>
                    <ul>
                        <a href="<?php echo $websiteUrl ?>">
                        <li title="Home">Home <i class="bi bi-caret-right-fill"></i></li></a>

                        <a id="examTitleLink" href="#">
                        <li id="regTopTitle" title="">Loading...</li></a>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">
                    <div class="text-content-div blog-details-div">
                        <h1 id="regTitle">Loading...</h1>
                        <h2  id="subTitle">Loading...</h2>
                        <p class="intro" id="seoDescription">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="other-pages-main-section">
        <section class="body-div blog-bg">
                <div class="body-div-in">
                    <div class="page-back-div">
                        <div class="left-div">
                            <div class="page-list-back-div">
                                <div class="main-picture-back-div">	
                                    <div class="main-picture-div">
                                        <img id="ictCourseFetchPix" src="<?php echo $websiteUrl?>/uploaded_files/IctCourses/default.jpg" alt="ICT Courses"/> 
                                    </div>   
                                </div>                         
                            
                                <div class="main-pages-content-div" id="pageContent"></div>
                            </div>
                        </div>

                        <div class="right-div sticky-div">   
                            <div class="div-in">
                                <h3>RELATED ICT COURSES</h3>
                                
                                <div class="related-post-back-div" id="relatedPageIctCoursesContent">                                                              
                                    <script>_fetchPageRelatedIctCoursesData();</script>                   
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
                <script>_fetchEachIctCourses('<?php echo $publishId?>')</script>
            </section>

        <?php include 'footer.php' ?>
    </section>

</body>

</html>