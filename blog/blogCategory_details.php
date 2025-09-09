<?php include '../../config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../../meta.php'?>
    <title><?php echo $appName?> - <?php echo $pageTitle?></title>
    <meta name="description" content="<?php echo $seoKeywords?>" />
    <meta name="keywords" content="<?php echo $seoKeywords?>" />

    <meta property="og:title" content="<?php echo $appName?> - <?php echo $pageTitle?>" />
    <meta property="og:image" content="<?php echo $websiteUrl?>/uploaded_files/seoFlyerPix/<?php echo $pageSeoPix?>" />
    <meta property="og:description" content="<?php echo $seoKeywords?>" />

    <meta name="twitter:title" content=" <?php echo $appName?> - <?php echo $pageSeoPix?>" />
    <meta name="twitter:card" content="<?php echo $appName?>" />
    <meta name="twitter:image" content="<?php echo $websiteUrl?>/uploaded_files/<?php echo $pageSeoPix?>" />
    <meta name="twitter:description" content="<?php echo $seoKeywords?>" />
</head>

<body>
    <?php include '../../header.php' ?>

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
                                Blog & Article <i class="bi bi-caret-right-fill"></i>
                            </a>
                        </li>

                        <a id="blogTitleLink" href="#">
                        <li id="regTopTitle" title="Blog Title"> Loading...</li></a>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">
                    <div class="text-content-div">
                        <h1 id="regTitle">Loading...</h1>

                        <div class="meta">
                            <span><i class="bi bi-person"></i> By: <strong id="fullName">Loading...</strong> </span> |
                            <span><i class="bi-calendar3"></i> DATE: <strong id="updatedTime">Loading...</strong></span> |
                            <span><i class="bi-eye"></i> VIEWS: <strong id="blogView">Loading...</strong></span>
                        </div>
                        <p class="intro" id="seoDescription">Loading...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="other-pages-main-section">
        <section class="body-div blog-bg">
            <div class="body-div-in">
                <div class="page-back-div">
                    <div class="left-div">
                        <div class="page-list-back-div">
                            <div class="main-picture-back-div">	
                                <div class="main-picture-div" id="blogPreviewPix">
                                    <img id="blogFetchPix" src="<?php echo $websiteUrl?>/all-images/blog/blog_1.png" alt="Blog"/> 
                                </div>   

                                <div class="bottom-img-div">
                                    <div class="inner-img-container"> 
                                        <div class="inner-img-div" id="fetchPagePictures">
                                            <script>_fetchPagesPictureData('<?php echo $publishId?>','blogPreviewPix');</script>
                                        </div>
                                    </div>
                                    <button class="left-btn"> <i class="bi-chevron-double-left"></i></button>
                                    <button class="right-click-btn"> <i class="bi-chevron-double-right"></i></button>
                                </div>                                   
                            </div>                         
                        
                            <div class="main-pages-content-div" id="pageContentInfo"></div>

                            <div class="comment-back-div">
                                <div id="disqus_thread"></div>
                                <script>
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://1stculturetour-com.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="right-div sticky-div">   
                        <div class="div-in">
                            <h3>RECENT BLOG</h3>
                            
                            <div class="related-post-back-div" id="relatedPageBlogContent">                                                              
                                <script>_fetchPageRelatedBlogData();</script>                   
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
            <script>_fetchEachSiteBlog('<?php echo $publishId?>');</script>
        </section>

        <?php include '../../footer.php' ?>
    </section>

</body>

</html>