<?php include 'alert.php' ?>
<header class="animated fadeInDown">
    <div class="top-header">
        <div class="top-header-inner">
            <div class="link-div">
                <a href="#" title="Contact Us">
                    <i class="bi-clock"></i>
                    <span>Mon - Fri (8am - 4pm)</span>
                </a>
                <span> |</span>

                <a href="#" title="Mail Us">
                    <i class="bi-envelope"></i>
                    <span>Customer@internationalexam.com</span>
                </a>
                <span> |</span>

                <a href="#" title=" Call Us">
                    <i class="bi-telephone"></i>
                    <span>+234(0)703-841-1794</span>
                </a>
                <span> |</span>

                <a href="<?php echo $websiteUrl ?>/faq" title="FAQ">
                    <i class="bi-question-circle"></i>
                    <span>FAQ</span>
                </a>
                <span> |</span>

                <a href="#" title="Free E-Books">
                    <i class="bi-file-pdf"></i>
                    <span> E-Books</span>
                </a>
                <span> |</span>

                <a href="#" title="Training">
                    <i class="bi-mortarboard"></i>
                    <span>Training</span>
                </a>
            </div>


            <div class="social-icon-div">
                <a href="#" title="" href="#"><i class="bi-whatsapp" title="Whatsapp"></i></a>
                <a href="#" title="" href="#"><i class="bi-facebook" title="facebook"></i></a>
                <a href="#" title="" href="#"><i class="bi-twitter" title="twitter/X"></i></a>
                <a href="#" title="" href="#"><i class="bi-instagram" title="instagram"></i></a>
            </div>
        </div>
    </div>


    <div class="main-header">
        <div class="main-header-inner">
            <div class="link-div">
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

                <nav>
                    <ul>
                        <a href="<?php echo $websiteUrl ?>/about-us" title="About Us">
                            <li
                                class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/about-us")) { ?> active <?php } ?>">
                                About Us</li>
                        </a>
                        <a href="<?php echo $websiteUrl ?>/study-abroad" title="Study Abroad">
                            <li
                                class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/study-abroad")) { ?> active <?php } ?>">
                                Study Abroad <i class="bi-plus"></i></li>
                        </a>

                        <li id="expand-li"
                            class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/international-exams")) { ?> active <?php } ?>">
                            <a href="<?php echo $websiteUrl ?>/international-exams" title="Training">
                                International Exam <i class="bi-plus"></i></a>
                            <ul class="animated fadeIn">
                                <div class="sub-nav-div training-sub-nav">
                                    <div class="info-container">
                                        <div class="pix-div"><img
                                                src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp"
                                                alt="training" /></div>
                                        <h2>International Tests/Examinations to Study Abroad</h2>
                                        <p>These exams are reqiured for admission to universities and colleges in
                                            various countries across the globe. At times, the need may be a combination
                                            of two or more of the tests/examinations specific to that country and its
                                            education system.</p>
                                        <a href="<?php echo $websiteUrl ?>">
                                            <button class="btn" title="Become An Agent">Become An Agent <i
                                                    class="bi-chevron-right"></i></button></a>
                                    </div>

                                    <div class="each-container-back-div">
                                        <div class="each-container">
                                            <a href="<?php echo $websiteUrl ?>" title="Frontend Engineer">
                                                <li>TOFEL</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Backend Engineer">
                                                <li>GRE</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Full Stack Engineer">
                                                <li>IELTS</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>GMAT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>PTE</li>
                                            </a>
                                        </div>

                                        <div class="each-container">
                                            <a href="<?php echo $websiteUrl ?>" title="Data Analysis">
                                                <li>SAT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="UI/UX Training">
                                                <li>ACT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Graphics Design">
                                                <li>OET</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>SELT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>LSAT</li>
                                            </a>
                                        </div>

                                        <div class="each-container">
                                            <a href="<?php echo $websiteUrl ?>" title="Data Analysis">
                                                <li>SAT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="UI/UX Training">
                                                <li>ACT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Graphics Design">
                                                <li>OET</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>SELT</li>
                                            </a>

                                            <a href="<?php echo $websiteUrl ?>" title="Computer Networking">
                                                <li>LSAT</li>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>

                        <a href="<?php echo $websiteUrl ?>/payment-pricing" title="Payment plans">
                            <li
                                class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/payment-pricing")) { ?> active <?php } ?>">
                                Payment plans</li>
                        </a>
                        <a href="<?php echo $websiteUrl ?>/blog" title="Blog">
                            <li class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/blog/")) { ?> active <?php } ?>">
                                Blog</li>
                        </a>
                        <a href="<?php echo $websiteUrl ?>/#" title="Gallery">
                            <li
                                class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/gallery")) { ?> active <?php } ?>">
                                Gallery</li>
                        </a>
                        <a title="Contact Us" href="<?php echo $websiteUrl ?>/contact-us" title="Contact us">
                            <li
                                class="<?php if (strstr($websiteAutoUrl, "$websiteUrl/contact-us")) { ?> active <?php } ?>">
                                Contact us</li>
                        </a>
                    </ul>
                </nav>
            </div>

            <div class="button-div">
                <a href="<?php echo $websiteUrl ?>/portal" title="Get Started">
                    <button class="btn" title="Get started"> <i class="bi-person"></i> <span>Get
                            Started</span></button></a>
            </div>
        </div>
    </div>
</header>