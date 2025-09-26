<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>Contact Us | International Exams – TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS in Nigeria</title>
    
    <meta name="keywords"
        content="Contact International Exams, Contact EduGrade Services, exam registration help Nigeria, TOEFL support Nigeria, GRE support Nigeria, GMAT support Nigeria, SAT registration help, ACT exam support, IELTS support Nigeria, PTE registration Nigeria, international exam enquiry, study abroad support Nigeria" />
    <meta name="description"
        content="Get in touch with International Exams today for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS registration support in Nigeria. Contact us for quick assistance, expert guidance, and training services." />
    <meta property="og:title"
        content="Contact Us | International Exams – TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS in Nigeria" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description"
        content="Reach out to International Exams for inquiries and support on international exam registrations in Nigeria." />
    <meta name="twitter:title"
        content="Contact Us | International Exams – TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS in Nigeria" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description"
        content="Contact International Exams – Nigeria’s trusted exam registration and training support platform." />
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
                        <li title="Contact Us">
                            <a href="<?php echo $websiteUrl ?>/contact-us">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="other-pages-back-div">
                <div class="main-content-back-div">

                    <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                        <h1>Contact Us</h1>
                        <p>
                            We’d love to hear from you! Whether you’re seeking guidance on exams, admissions, or
                            international study opportunities, our team is ready to assist you every step of the way.
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
        <section class="contact-hash-bg">
            <div class="bottom-body-div">
                <div class="contact-div animated zoomIn">
                    <div class="div-in inner-contact">
                        <div class="icon img-div"><img src="all-images/images/email.png" alt="<?php echo $thename?> Email Address"/></div>
                        
                        <div class="text">
                            <h2>MAIL US</h2>
                            <p id="ContactSmtpUsername">Loading...</p>
                        </div>                 
                    </div>
                </div>

                <div class="contact-div animated zoomIn">
                    <div class="div-in inner-contact">
                        <div class="icon img-div"><img src="all-images/images/phone.png" alt="<?php echo $thename?> Phone Number"/></div>
                        
                        <div class="text">
                            <h2>CALL US</h2>
                            <p id="ContactPhoneNumber">Loading...</p>
                        </div>                  
                    </div>
                </div>

                <div class="contact-div animated zoomIn">
                    <div class="div-in inner-contact">
                    <div class="icon img-div"><img src="all-images/images/location.png" alt="<?php echo $thename?> Office Address"/></div>

                        <div class="text">
                            <h2>LOCATION</h2> 
                            <p id="contactCountryName">Loading...</p>
                        </div>                  
                    </div>
                </div>
            </div>
            <script>_fetchContactPageInfo();</script>
        </section>

        <section class="map-body-div">
            <div class="map-back-div"> 
                <iframe 
                    class="google-map"
                    allowfullscreen="" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4034940.068370041!2d6.036170923120529!3d9.029865847390298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0baf7da48d0d%3A0x99a8fe4168c50bc8!2sNigeria!5e0!3m2!1sen!2sng!4v1758000308844!5m2!1sen!2sng">
                </iframe>
            </div>
        </section> 

        <section class="body-div">
            <div class="body-div-in">
                <div class="contact-mail-div" data-aos="fade-in" data-aos-duration="800">
                    <div class="inner-div">
                        <div class="div-in">
                            <div class="text_field_container" id="fullName_container">
                                <script>
                                    textField({
                                        id: 'fullName',
                                        title: 'Full Name'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="email_container">
                                <script>
                                    textField({
                                        id: 'email',
                                        title: 'Email Address',
                                        type: 'email'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container" id="subject_container">
                                <script>
                                    textField({
                                        id: 'subject',
                                        title: 'Subject'
                                    });
                                </script>
                            </div>       
                        </div>

                        <div class="div-in right-div-in">
                            <div class="text_area_container" id="message_container">
                                <script>
                                    textField({
                                        id: 'message',
                                        title: 'Message',
                                        type: 'textarea'
                                    });
                                </script>
                            </div>
                
                            <button class="btn" id="submitBtn" onclick="_sendContactEmail();">Send Mail <i class="bi-send-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>

</html>