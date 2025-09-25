<div id="get-form-more-div">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $websiteUrl ?>/all-images/images/loading.gif" width="20px" alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>

<div id="get-more-div-secondary">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $websiteUrl ?>/all-images/images/loading.gif" width="20px" alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>
<div id="customConfirmModal" class="modal-overlay" style="display:none;"></div>

<div class="sidenavdiv">
    <div class="live-chat-back-div">
        <a href="tel:1-800-658-5679" title="Call Customer Care">
            <div class="chat-div">
                <div class="icon-div" style="background:#008040;"><i class="bi-telephone-outbound"></i></div>
                <div class="text">1-800-658-5679</div>
                <br clear="all" />
            </div>
        </a>
        <a href="https://api.whatsapp.com/" target="_blank" title="Whatsapp">
            <div class="chat-div">
                <div class="icon-div" style="background:#25D366;"><i class="bi-whatsapp"></i></div>
                <div class="text">+234-812-700-0262</div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://www.facebook.com/" target="_blank" title="Facebook">
            <div class="chat-div">
                <div class="icon-div" style="background:#2980b9;"><i class="bi-facebook"></i></div>
                <div class="text">Facebook Page </div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://twitter.com/" target="_blank" title="Twitter">
            <div class="chat-div">
                <div class="icon-div" style="background:#3498db;"><i class="bi-twitter"></i></div>
                <div class="text">Twitter Page</div>
                <br clear="all" />
            </div>
        </a>

        <a href="https://www.instagram.com/" target="_blank" title="Instagram">
            <div class="chat-div">
                <div class="icon-div" style="background-image: linear-gradient(to right,#03F, #F0F);"><i
                        class="bi-instagram"></i></div>
                <div class="text">Instagram Page</div>
                <br clear="all" />
            </div>
        </a>
    </div>




    <div class="index-menu-back-div">
        <div class="top-div">
            <div class="logo-div">
                <a href="<?php echo $websiteUrl ?>"><img src="<?php echo $websiteUrl ?>/all-images/images/logo.png"
                        alt="<?php echo $appName ?> Logo" class="animated zoomIn" /></a>
            </div>
        </div>

        <div class="div-in">
            <div class="div">
                <a href="<?php echo $websiteUrl; ?>" title="Home Page">
                    <li <?php if ($page == 'index.php') { ?> id="active-li" <?php } ?>><i class="bi-house"></i> Home Page
                    </li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/about-us" title="About">
                    <li <?php if ($page == 'About') { ?> id="active-li" <?php } ?>><i class="bi-bookmark-check"></i>
                        About</li>
                </a>
            </div>

            <div class="div">
                <li onclick="_openLi('exams')"><i class="bi-journals"></i> International Exams<i class="bi-plus" id="side-expand"></i></li>
                <div class="sub-li" id="exams-sub-li">
                    <script>_fetchMobileExams();</script>
                </div>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/study-abroad" title="Study Abroad">
                    <li <?php if ($page == 'study-abroad') { ?> id="active-li" <?php } ?>><i class="bi-journals"></i>
                        Study Abroad</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/payment-pricing" title="Payment Plans">
                    <li <?php if ($page == 'payment-pricing') { ?> id="active-li" <?php } ?>><i class="bi-credit-card"></i> Payment Plans
                    </li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/free-ebook" title="Free-Ebook">
                    <li <?php if ($page == 'free-ebook') { ?> id="active-li" <?php } ?>><i class="bi-filetype-pdf"></i> Free-Ebook
                    </li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/blog/" title="Blog">
                    <li <?php if ($page == 'blog') { ?> id="active-li" <?php } ?>><i class="bi-flower2"></i> Blog</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/contact-us" title="Blog">
                    <li <?php if ($page == 'contact-us') { ?> id="active-li" <?php } ?>><i class="bi-headset"></i> Contact
                        Us</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/faq" title="Frequently Asked Questions">
                    <li <?php if ($page == 'faq') { ?> id="active-li" <?php } ?>><i class="bi-patch-question"></i>
                        Frequently Asked Question</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/testing-services" title="Testing Services">
                    <li <?php if ($page == 'testing-services') { ?> id="active-li" <?php } ?>><i class="bi-flower2"></i>
                        Testing Services</li>
                </a>
            </div>

            <div class="div">
                <li onclick="_openLi('courses')"><i class="bi-mortarboard-fill"></i> ICT Courses<i class="bi-plus" id="side-expand"></i></li>
                <div class="sub-li" id="courses-sub-li">
                    <script>_fetchMobileIctCourses();</script>
                </div>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/portal" title="Log-In">
                    <li class="student-li"><i class="bi-person-circle"></i> Log-In</li>
                </a>
            </div>

            <div class="div">
                <a href="<?php echo $websiteUrl; ?>/portal/sign-up" title="Sign-Up">
                    <li class="training-li"><i class="bi-person-circle"></i> Sign-Up</li>
                </a>
            </div>
        </div>
    </div>

    <div class="sidenavdiv-in" onclick="_close_side_nav()"></div>
</div>

<div class="switch-country-overlay" id="switchCountryModal" style="display:none;">
    <div class="switch-modal-div">
        <div class="image-div"></div>
        <div class="content-div">
            <h3>SELECT YOUR COUNTRY</h3>
            <div class="each-content" onclick="_setWebsiteCountryId('NG');">
                <div class="logo-div"><img src="<?php echo $websiteUrl ?>/uploaded_files/countryFlag/nigeriaFlag.jpg"
                        alt="Logo"></div>
                <div class="text-div">
                    <h2>NIGERIA</h2>
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
            </div>

            <div class="each-content" onclick="_setWebsiteCountryId('GH');">
                <div class="logo-div"><img src="<?php echo $websiteUrl ?>/uploaded_files/countryFlag/ghanaFlag.jpg"
                        alt="Logo">
                </div>
                <div class="text-div">
                    <h2>GHANA</h2>
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
            </div>

            <div class="each-content" onclick="_setWebsiteCountryId('KE');">
                <div class="logo-div"><img src="<?php echo $websiteUrl ?>/uploaded_files/countryFlag/kenyaFlag.jpg"
                        alt="Logo">
                </div>
                <div class="text-div">
                    <h2>KENYA</h2>
                    <i class="bi bi-box-arrow-up-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="switch-country-link" onclick="_switchCountry()">
    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/switch.png">
</div>