<?php include 'alert.php' ?>
<header class="animated fadeInDown">
    <div class="top-header">
        <div class="top-header-inner">
            <div class="link-div">
                <a href="#" class="hide-time" title="Contact Us">
                    <i class="bi-clock"></i>
                    <span>Mon - Fri (8am - 4pm)</span>
                </a>
                <span class="hide-time"> |</span>

                <!-- <a href="#" class="hide-time" title="Mail Us">
                    <i class="bi-envelope"></i>
                    <span id="smtpUsername">Loading...</span>
                </a>
                <span class="hide-time"> |</span> -->

                <a href="#" class="hide-time" title="Mail Us">
                    <i class="bi-envelope"></i>
                    <div>
                        <span>customer@internationalexam.com</span><br/>
                    </div>
                </a>
                <span class="hide-time"> |</span>
    

                <a href="#" title=" Call Us">
                    <i class="bi-telephone"></i>
                    <span id="phoneNumber">Loading...</span>
                </a>
                <span class="hide-link"> |</span>

                <a href="<?php echo $websiteUrl ?>/video-tutorial" class="hide-link" title="Video Tutorial">
                    <i class="bi-file-earmark-play-fill"></i>
                    <span>Video Tutorial</span>
                </a>
                <span class="hide-link"> |</span>

                <a href="<?php echo $websiteUrl ?>/free-ebook" class="hide-link" title="Free E-Books">
                    <i class="bi-file-pdf"></i>
                    <span> E-Books</span>
                </a>
                <span class="hide-link"> |</span>

                <a href="#" class="hide-link" title="Training">
                    <i class="bi-mortarboard"></i>
                    <span onclick="_getForm({page: 'makeEnquiryForm', url: siteMiddlewareUrl});">Training</span>
                </a>
            </div>

            <div class="social-icon-div">
                <a href="#" title="" href="#"><i class="bi-whatsapp" title="Whatsapp"></i></a>
                <a href="#" title="" href="#"><i class="bi-facebook" title="facebook"></i></a>
                <a href="#" title="" href="#"><i class="bi-twitter" title="twitter/X"></i></a>
                <a href="#" title="" href="#"><i class="bi-instagram" title="instagram"></i></a>
            </div>
        </div>
        <script>
            _fetchHeaderContact();
        </script>
    </div>


    <div class="main-header">
        <div class="main-header-inner">
            <div class="link-div">
                <div class="logo-back-div">
                    <div class="logo-div">
                        <div class="div-in">
                            <a href="<?php echo $websiteUrl ?>" title="Home">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>

                    <div class="country-logo">
                        <img id="countryFlag" src="<?php echo $websiteUrl ?>/uploaded_files/countryFlag/nigeriaFlag.jpg"
                            alt="Flag" />
                        <script>
                            const currentCountry = JSON.parse(localStorage.getItem("websiteCountryId"));
                            let countryFlag = 'nigeriaFlag.jpg';
                            if (currentCountry == 'KE') {
                                countryFlag = 'kenyaFlag.jpg';
                            } else if (currentCountry == 'GH') {
                                countryFlag = 'ghanaFlag.jpg';
                            }
                            $("#countryFlag").prop("src", "<?php echo $websiteUrl; ?>/uploaded_files/countryFlag/" +
                                countryFlag);
                        </script>
                    </div>
                </div>

                <nav>
                    <ul>
                        <a href="<?php echo $websiteUrl ?>/about-us" title="About Us">
                            <li class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/about-us")) { ?> active <?php } ?>">About Us</li>
                        </a>

                        <li id="expand-li" class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/study-abroad")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/study-abroad" title="Study Abroad">
                                Study Abroad <i class="bi-plus"></i></a>

                            <ul class="animated fadeIn" id="fetchHeaderStudyAbroad">
                                <a href="<?php echo $websiteUrl ?>/exam-registration" title="REGISTER FOR EXAMS">
                                    <li>REGISTER FOR EXAMS</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/admission-processing" title="ADMISSION PROCESSING">
                                    <li>ADMISSION PROCESSING</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/free-ebook" title="E-Books">
                                    <li>FREE EBOOKS</li>
                                </a>
                                <script>
                                    _fetchHeaderStudyAbroad();
                                </script>
                            </ul>
                        </li>

                        <li id="expand-li" class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/international-exams")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/international-exams" title="Training">
                                International Exam <i class="bi-plus"></i>
                            </a>

                            <ul class="animated fadeIn" id="fetchHeaderExams">
                                <script>
                                    _fetchHeaderExams();
                                </script>
                            </ul>
                        </li>

                        <li class="hide-nav <?php if (strstr($websiteAutoUrl, "$websiteUrl/payment-pricing")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/payment-pricing" title="Payment plans"> Payment plans </a>
                        </li>

                        <li class="hide-nav <?php if (strstr($websiteAutoUrl, "$websiteUrl/blog/")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/blog" title="Blog"> Blog</a>
                        </li>

                        <li id="expand-li" class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/contact-us")) { ?> active <?php } ?>">
                            ICT Courses <i class="bi-plus"></i>
                            <ul class="animated fadeIn" id="fetchHeaderIctCourses">
                                <script>
                                    _fetchHeaderIctCourses();
                                </script>
                            </ul>
                        </li>

                        <li class="hide-nav <?php if (strstr($websiteAutoUrl, "$websiteUrl/testing-services")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/testing-services" title="Testing Services"> Testing Services </a>
                        </li>

                        <li id="expand-li" class="mini-li">
                            <a href="#" title="Training">
                                Read More <i class="bi-plus"></i></a>
                            <ul class="animated fadeIn">
                                <a href="<?php echo $websiteUrl ?>/faq" title="Frequently Asked Questions">
                                    <li>FAQ</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/free-ebook" title="E-Books">
                                    <li>E-Books</li>
                                </a>
                                <li title="Training" onclick="_getForm({page: 'makeEnquiryForm', url: siteMiddlewareUrl});">Training</li>
                                <a href="<?php echo $websiteUrl ?>/payment-pricing" title="Payment Plans">
                                    <li>Payment Plans</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/blog/" title="Blog">
                                    <li>Blog</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/testing-services" title="Testing Services">
                                    <li>Testing Services</li>
                                </a>
                                <a href="<?php echo $websiteUrl ?>/" title="Video Tutorial">
                                    <li>Video Tutorial</li>
                                </a>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="button-div">
                <a href="<?php echo $websiteUrl ?>/portal" title="Get Started">
                    <button class="btn" title="Get started"> <i class="bi-person"></i> <span>Portal</span></button></a>
                <button class="mobile-btn" onclick="_openMenu()"><i class="bi-text-right"></i></button>
            </div>
        </div>
    </div>
</header>