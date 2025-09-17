<?php include 'config/constants.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $appName ?> | TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS Registration in Nigeria</title>
    <meta name="keywords"
        content="<?php echo $appName ?>, TOEFL registration in Nigeria, GRE exam Nigeria, GMAT test Nigeria, SAT registration, ACT exam Nigeria, PTE Nigeria, IELTS Nigeria, exam registration Nigeria, EduGrade Services, study abroad exam, international exam, international exam in Nigeria, TOEFL Registration in Nigeria, TOEFL Registration in Kano, TOEFL Registration in Kaduna, TOEFL Registration in Lagos, TOEFL Registration in Ibadan, TOEFL Registration in Akure, TOEFL Registration in Abuja, TOEFL Registration in Oyo state, TOEFL Registration in Ondo state, TOEFL Registration in Owerri, TOEFL Registration in Africa, TOEFL Registration in Ilorin, TOEFL Registration in Ikeja, TOEFL Registration in Minna, TOEFL Registration in Abeokuta, TOEFL Registration in Oshogbo, TOEFL Registration in Jos, TOEFL Registration in Port Harcourt, GRE Registration in Nigeria, GRE Registration in Oyo, GRE Registration in Kaduna, GRE Registration in Abuja, GRE Registration in Kano,  GRE Registration in Benin City, GRE Registration in Akure GRE Registration in Enugu, GRE Registration in Owerri, GRE Registration in Kaduna, GRE Registration in Kano, GRE Registration in Ilorin, GRE Registration in Lagos, GRE Registration in Minna, GRE Registration in Abeokuta, GRE Registration in Akure, GRE Registration in Oshogbo, GRE Registration in Ibadan, GRE Registration in Jos, GRE Registration in Port Harcourt, GMAT Registration in Nigeria, GMAT Registration in akure, GMAT Registration in Kaduna, GMAT Registration in Kano, GMAT Registration in Abuja, GMAT Registration in Lagos, GMAT Registration in Ibadan,
IELTS Registration in Abuja, IELTS Registration in ibadan, IELTS Registration in Akure, IELTS Registration in Lagos, IELTS Registration in Kaduna, IELTS Registration in Kano, GRE exam, IELTS exam, TOEFL exam, GMAT exam , SAT exam
MyExamConnect, International Examination Centre In Nigeria, International Examination Training Services, International Exams Registration In Nigeria, BEST INTERNATIONAL EDUCATION CONSULTANT IN NIGERIA, Educational Consultant On International Exams, Admission Placement into Universities, 
Best place to register Toefl exam in Nigeria, Best place to register GRE IN Nigeria, Best place to register GMAT exam in Nigeria, Best place to register SAT exam in Nigeria, where can i take gmat rest,
Best place to register IELTS exam in Nigeria, Best place to register PTE exam in Nigeria, Best place to register OET exam in Nigeria, 
Best place to register DUOLINGO exam in Nigeria, Best place to register MCAT exam in Nigeria, Best place to register NCLEX exam in Nigeria, NCLEX exam in Nigeria,
Best place to register ACT exam in Nigeria, where to register international exams in nigeria, ielts general training, International Examination Payments and Pricing" />
    <meta name="description"
        content="Register for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exams in Nigeria with EduGrade Services. Trusted support, fast processing, and expert guidance for success." />

    <meta property="og:title"
        content="<?php echo $appName ?> | TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS Registration in Nigeria" />
    <meta property="og:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta property="og:description"
        content="Register for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exams in Nigeria with EduGrade Services. Trusted support, fast processing, and expert guidance for success." />

    <meta name="twitter:title"
        content="<?php echo $appName ?> | TOEFL | GRE | GMAT | SAT | ACT | PTE | IELTS Registration in Nigeria" />
    <meta name="twitter:card" content="<?php echo $appName ?>" />
    <meta name="twitter:image" content="<?php echo $websiteUrl ?>/all-images/plugin-pix/edugrade.jpg" />
    <meta name="twitter:description"
        content="Register for TOEFL, GRE, GMAT, SAT, ACT, PTE, and IELTS exams in Nigeria with EduGrade Services. Trusted support, fast processing, and expert guidance for success." />
</head>

<body>
    <?php include 'header.php' ?>

    <div class="slide-section animated fadeInDown">
        <div class="slide-div">
            <div class="slide-inner-div">
                <div class="slide-card">
                    <h1 id="pageTitle"></h1>

                    <div class="text-div">
                        <p>Register for <a href="#" title="TOEFL">TOEFL</a>, <a href="#" title="TOEFL">GRE</a>, <a
                                href="#" title="TOEFL">GMAT</a>, <a href="#" title="TOEFL">SAT</a>, <a href="#"
                                title="TOEFL">ACT</a>, <a href="#" title="TOEFL">PTE</a>, and <a href="#"
                                title="TOEFL">IELTS</a> exams in Nigeria with EduGrade Services. Trusted support, fast
                            processing, and expert guidance for success.</p>
                        <div class="btn-div">
                            <a href="<?php echo $websiteUrl ?>/portal/sign-up" title="Download E-Books">
                                <button class="btn"><span>Register For Exam</span> <i class="bi-chevron-right"></i></button></a>
                            <a href="<?php echo $websiteUrl ?>/free-ebook" title="Download E-Books">
                                <button class="btn no-bg"><span>Download E-Books</span> <span class="span">It's
                                        Free</span></button></a>
                        </div>
                    </div>
                </div>

                <div class="play-div">
                    <div class="play-btn"></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            // List of sentences
            var _CONTENT = ["INTERNATIONAL EXAMINATION CENTERS IN NIGERIA", "15% OFF INTERNATIONAL EXAMS REGISTRATION FEE",
                "LEARNING MADE EASY WITH OUR PHYSICAL AND ONLINE CLASSES",
                "GET ADMISSION INTO UNIVERSITY AND COLLEGE ABROAD"
            ];
            // Current sentence being processed
            var _PART = 0;
            // Character number of the current sentence being processed 
            var _PART_INDEX = 0;
            // Element that holds the text
            var _ELEMENT = document.querySelector("#pageTitle");
            // Implements typing effect
            function Type() {
                var text = _CONTENT[_PART].substring(0, _PART_INDEX + 1);
                _ELEMENT.innerHTML = text;
                _PART_INDEX++;

                // If full sentence has been displayed then start to delete the sentence after some time
                if (text === _CONTENT[_PART]) {
                    clearInterval(_INTERVAL_VAL);
                    setTimeout(function() {
                        _INTERVAL_VAL = setInterval(Delete, 2);
                    }, 5000);
                }
            }
            // Implements deleting effect
            function Delete() {
                var text = _CONTENT[_PART].substring(0, _PART_INDEX - 1);
                _ELEMENT.innerHTML = text;
                _PART_INDEX--;

                // If sentence has been deleted then start to display the next sentence
                if (text === '') {
                    clearInterval(_INTERVAL_VAL);

                    // If last sentence then display the first one, else move to the next
                    if (_PART == (_CONTENT.length - 1))
                        _PART = 0;
                    else
                        _PART++;
                    _PART_INDEX = 0;

                    // Start to display the next sentence after some time
                    setTimeout(function() {
                        _INTERVAL_VAL = setInterval(Type, 50);
                    }, 200);
                }
            }
            // Start the typing effect on load
            _INTERVAL_VAL = setInterval(Type, 50);
        </script>
    </div>

    <section class="main-section">
        <section class="body-div bg-harsh">
            <div class="body-div-in below-height">
                <div class="unique-back-div animated fadeInUp">
                    <div class="unique-div">
                        <div class="icon-div">
                            <i class=" bi-cash-coin"></i>
                        </div>

                        <div class="text-div">
                            <h2>Affordable Test Registration Fee</h2>
                            <p>Get test fee discounts! Promo on TOEFL, IELTS, PTE, SAT, ACT, GMAT & GRE. Register now!</p>
                        </div>
                    </div>

                    <div class="unique-div">
                        <div class="icon-div secondary">
                            <i class=" bi-person-video3"></i>
                        </div>

                        <div class="text-div">
                            <h2>Physical and Online Lectures</h2>
                            <p>Ace TOEFL, GRE, GMAT, PTE & IELTS with expert-led classes—online or onsite. Learn affordably,
                                anywhere!</p>
                        </div>
                    </div>

                    <div class="unique-div">
                        <div class="icon-div nuetral">
                            <i class=" bi-file-pdf"></i>
                        </div>

                        <div class="text-div">
                            <h2>FREE E-books and Study Packs</h2>
                            <p>Register for any exam & get 2020 textbook + free CD! Access 120+ video lessons & practice
                                tests after signup!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="inner-body-div-in">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="left-div">
                            <div class="top-title">
                                <h2>INTERNATIONAL EXAMS</h2>
                            </div>
                            <h3>Take a Look At Our Available <span>#Exams</span></h3>
                        </div>

                        <div class="btn-div">
                            <a href="<?php echo $websiteUrl ?>/portal/sign-up">
                                <button class="btn" title="Register now">Register now <i class="bi-chevron-right"></i></button></a>
                        </div>
                    </div>

                    <div class="our-exam-back-div" id="indexPageContent">
                        <script>
                            _fetchIndexExamData();
                        </script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>

                    <div class="bottom-btn-div">
                        <a href="<?php echo $websiteUrl ?>/international-exams">
                            <button class="btn" title="View All Exams">View All Exams <i class="bi-chevron-right"></i></button></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="about-back-div">
                    <div class="image-div" data-aos="fade-up" data-aos-duration="1400">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/about.jpg" alt="About International Exams" />
                    </div>

                    <div class="content-div" data-aos="flip-right" data-aos-duration="1400">
                        <div class="icon-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/zigzag-line.svg" alt="About Us icon" />
                        </div>

                        <h2>Empower Yourself With The Freedom To Learn From <span class="text">#Anywhere</span></h2>
                        <p>EDUGRADE SERVICES - A special Educational Consultancy Service Agency, which set up centres in almost the states in Nigeria and other countries like GHANA, KENYA, ETHIOPIA, UGANDA and many more. Within the period of 9 years experiences we have successfully placed THOUSANDS of students for admissions into foreign universities.</p>

                        <div class="check-div">
                            <div class="check">
                                <i class="bi-check-lg"></i>
                                <h5>Lowest Test Registration Fee</h5>
                            </div>

                            <div class="check">
                                <i class="bi-check-lg"></i>
                                <h5>Physical and Online Lectures</h5>
                            </div>

                            <div class="check">
                                <i class="bi-check-lg"></i>
                                <h5>FREE E-books</h5>
                            </div>

                            <div class="check">
                                <i class="bi-check-lg"></i>
                                <h5>Free Study Packs</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-bl">
            <div class="body-div-in">
                <div class="inner-body-div-in">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="left-div">
                            <div class="top-title">
                                <h2>OUR SUCCESS</h2>
                            </div>
                            <h3>Stats That Explain Everything About <span>#Our success</span></h3>
                        </div>

                        <div class="btn-div">
                            <a href="#">
                                <button class="btn" title="See how it works">See How It Works <i class="bi-chevron-right"></i></button></a>
                        </div>
                    </div>

                    <div class="success-back-div">
                        <div class="success-div" data-aos="fade-up" data-aos-duration="900">
                            <div class="inner-div">
                                <div class="icon-div">
                                    <div class="inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/placeholder.png" alt="Subjects available" />
                                    </div>
                                </div>

                                <div class="text-div">
                                    <h5>56 +</h5>
                                    <p>Subjects available for verified and topics</p>
                                </div>
                            </div>
                        </div>

                        <div class="success-div" data-aos="fade-up" data-aos-duration="1000">
                            <div class="inner-div">
                                <div class="icon-div">
                                    <div class="inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/placeholder2.png" alt="Total dynamic" />
                                    </div>
                                </div>

                                <div class="text-div">
                                    <h5>1,821 +</h5>
                                    <p>Total dynamic digital classrooms and videos </p>
                                </div>
                            </div>
                        </div>

                        <div class="success-div" data-aos="fade-up" data-aos-duration="1200">
                            <div class="inner-div">
                                <div class="icon-div">
                                    <div class="inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/placeholder4.png" alt="User daily" />
                                    </div>
                                </div>

                                <div class="text-div">
                                    <h5>20+ Hours</h5>
                                    <p>User daily average time spent on the platform</p>
                                </div>
                            </div>
                        </div>

                        <div class="success-div" data-aos="fade-up" data-aos-duration="1400">
                            <div class="inner-div">
                                <div class="icon-div">
                                    <div class="inner">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/placeholder3.png" alt="Active students" />
                                    </div>
                                </div>

                                <div class="text-div">
                                    <h5>112,124</h5>
                                    <p>Active students available on the platform</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tl">
            <div class="body-div-in">
                <div class="about-back-div">
                    <div class="content-div values-content-div" data-aos="fade-up" data-aos-duration="1000">
                        <div><span class="top-title">OUR STATUS VALUES</span></div>
                        <h2>Exploring Our Status <span class="text">#Values</span></h2>
                        <p>Explore our status values to learn about the guiding principles that shape our approach to tech education and community.</p>

                        <div class="progress-back-div">
                            <div class="progress-container">
                                <div class="progress-item">
                                    <span class="title">Case study success</span>
                                    <div class="progress-bar">
                                        <div class="progress-per" data-text="90">90</div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container">
                                <div class="progress-item">
                                    <span class="title">Happy student</span>
                                    <div class="progress-bar">
                                        <div class="progress-per" data-text="75">75</div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container">
                                <div class="progress-item">
                                    <span class="title">Engaging</span>
                                    <div class="progress-bar">
                                        <div class="progress-per" data-text="93">93</div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-container">
                                <div class="progress-item">
                                    <span class="title">Student Community</span>
                                    <div class="progress-bar">
                                        <div class="progress-per" data-text="63">63</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="image-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="moving-object top-moving-object">
                            <div class="div-in">
                                <div class="text-div">
                                    <span>2k+</span>
                                    <h4>Student</h4>
                                </div>
                                <div class="img-back-div">
                                    <div class="img-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/multiple_img.png" alt="Slide Image" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="moving-object bottom-moving-object">
                            <div class="div-in">
                                <div class="text-div">
                                    <span>5.8k</span>
                                    <h4>Success Courses</h4>
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/status_image.png" alt="About Us" />
                    </div>
                </div>
            </div>
            <script>
                _progressBar();
            </script>
        </section>

        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="faq-back-div">
                    <div class="left-image-div" data-aos="fade-in" data-aos-duration="1200">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/faq.webp" alt="<?php echo $appName ?> Frequently Asked Question" />
                    </div>

                    <div class="right-container" data-aos="fade-up" data-aos-duration="1200">
                        <div class="faq-title">
                            <div><span class="top-title">FAQ</span></div>
                            <h2>Frequently Asked <span>#Questions</span></h2>
                        </div>

                        <div class="faq-toggle-back" id="indexFaqContent">
                            <script>
                                _fetchIndexFaqData();
                            </script>

                            <div class="content-loading-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                            </div>
                        </div>

                        <a href="<?php echo $websiteUrl ?>/faq" title="Read More FAQ">
                            <button class="btn" title="Read More FAQ">Read More <i class="bi-chevron-right"></i></button></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="testimonial">
                    <div class="content" data-aos="fade-up" data-aos-duration="1400">
                        <div class="icon-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/zigzag-line.svg" alt="testimonial" />
                        </div>

                        <div class="text-div">
                            <h2>What Our Students Say <span>#About Us</span></h2>
                            <p>Students from Nigeria, across Africa share how EDUGRADE SERVICES has supported their success in international exams through expert guidance, timely assistance, and a seamless registration process.</p>
                        </div>

                        <div>
                            <button class="btn" title="Submit Your Review" onclick="_getForm({page: 'testimonialForm', url: siteMiddlewareUrl});">Submit Your Review<i class="bi-pencil-square"></i></button>
                        </div>
                    </div>

                    <div class="right-back-div">
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_1">
                                <div class="cg-carousel__track js-carousel__track" id="fetchSiteTestimony">
                                    <script>_fetchSiteTestimony();</script>

                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window['carousel_options_1'] = ({
                    items: 4,
                    margin: 30,
                    loop: true,
                    dots: true,
                    autoplayHoverPause: true,
                    smartSpeed: 650,
                    autoplay: true,
                    breakpoints: {
                        700: {
                            slidesPerView: 1,
                        },
                        1100: {
                            slidesPerView: 1,
                        },
                        1300: {
                            slidesPerView: 2,
                        }

                    }
                });
            </script>
        </section>

        <section class="body-div">
            <div class="body-div-in">
                <div class="inner-body-div-in">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="left-div">
                            <div class="top-title">
                                <h2>LATEST INSIGHTS</h2>
                            </div>
                            <h3>Our Latest News And <span>#Articles</span></h3>
                        </div>

                        <div class="btn-div">
                            <a href="<?php echo $websiteUrl ?>/blog" title="Explore All Blogs">
                                <button class="btn" title="Explore All Blogs">Explore All Blogs <i class="bi-chevron-right"></i></button></a>
                        </div>
                    </div>

                    <div class="blog-back-div" id="indexBlogContent">
                        <script>
                            _fetchIndexBlogData();
                        </script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>

</html>