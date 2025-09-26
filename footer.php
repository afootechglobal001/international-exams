<footer class="footer-div">
    <div id="footerContactContainer"></div>
    <script>
        _fetchFooterAddress('footerContactContainer');
    </script>
    </div>

    <div class="footer-div-in">
        <div class="segment-back-div">
            <div class="segment-div logo-segment" data-aos="fade-up" data-aos-duration="800">
                <div class="logo-div">
                    <div class="div-in">
                        <a href="<?php echo $websiteUrl ?>"><img src="<?php echo $websiteUrl ?>/all-images/images/logo.png" alt="<?php echo $appName ?> Logo" class="animated zoomIn" /></a>

                    </div>
                </div>

                <p>EDUGRADE SERVICES - A special Educational Consultancy Service Agency, which set up centres in almost the states in <?php echo $getwebsiteCountryName; ?> and other countries like GHANA, KENYA, ETHIOPIA, UGANDA and many more. </p>
                <div class="icon-div">
                    <a href="" title="YouTube">
                        <li><i class="bi-youtube"></i></li>
                    </a>
                    <a href="https://web.facebook.com" target="_blank" title="Facebook">
                        <li><i class="bi-facebook"></i></li>
                    </a>
                    <a href="https://twitter.com" target="_blank" title="Twitter">
                        <li><i class="bi-twitter"></i></li>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" title="Instagram">
                        <li><i class="bi-instagram"></i></li>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=Hello AfooTECH Global&amp;phone=+234 812 700 0262" target="_blank" title="Whatsapp">
                        <li><i class="bi-whatsapp"></i></li>
                    </a>
                </div>
            </div>

            <div class="segment-div" data-aos="fade-up" data-aos-duration="1000">
                <h3>Official Links</h3>
                <ul>
                    <a href="<?php echo $websiteUrl?>/about-us" title="About Us">
                        <li><i class="bi-chevron-right"></i>About Us</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>/faq" title="Frequently Asked Questions">
                        <li><i class="bi-chevron-right"></i>Frequently Asked Questions</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>/study-abroad" title="Study Abroad">
                        <li><i class="bi-chevron-right"></i>Study Abroad</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>/international-exams" title="International Exams">
                        <li><i class="bi-chevron-right"></i>International Exams</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>/payment-pricing" title="Payment Plans">
                        <li><i class="bi-chevron-right"></i>Payment Plans</li>
                    </a>
                    <a href="<?php echo $websiteUrl?>/contact-us" title="Contact Us">
                        <li><i class="bi-chevron-right"></i>Contact Us</li>
                    </a>
                </ul>
            </div>

            <div class="segment-div" data-aos="fade-up" data-aos-duration="1200">
                <h3>Contact Us</h3>
                <div class="input-container">
                    <div class="text_field_container footer_field_container">
                        <input class="text_field footer_text_field" type="text" id="email" placeholder="" />
                        <div class="placeholder footer_placeholder">Your Email Address:</div>
                    </div>

                    <div>
                        <button class="btn" title="Subscribe Now">Subscribe Now <i class="bi-chevron-right"></i></button>
                    </div>
                </div>

                <div class="call-contact-div">
                    <div class="icon-div">
                        <i class="bi-telephone-inbound"></i>
                        <h3>Call Hours:</h3>
                    </div>

                    <div class="text-div">
                        <h4>MON - FRI: 8:00AM - 6:00PM</h4>
                        <h4> SATURDAY 9:00AM - 6:00PM</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-bottom-div main-top-div"></div>
    <div class="main-bottom-div">
        <div class="div-in">
            <div class="text">© 2019 - <?php echo date('Y') ?> <?php echo $appName ?>. All Rights Reserved.</div>
            <div class="text">Developed By: <a href="https://afootech.com" target="_blank"><span>AfooTECH Global IT Solution</span></a></div>
        </div>
    </div>
</footer>
<?php include 'bottom-scripts.php' ?>