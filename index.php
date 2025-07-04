<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php include 'config/constants.php'; ?>

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
                            <button class="btn"><span>Register For Exam</span> <i class="bi-chevron-right"></i></button>
                            <button class="btn no-bg"><span>Download E-Books</span> <span class="span">It's
                                    Free</span></button>
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



    <section class="body-div">
        <div class="body-div-in">
            <div class="unique-back-div">
                <div class="unique-div">
                    <i class=" bi-cash-coin"></i>
                    <div class="text-div">
                        <h2>Affordable Test Registration Fee</h2>
                        <p>Get test fee discounts! Promo on TOEFL, IELTS, PTE, SAT, ACT, GMAT & GRE. Register now!</p>
                    </div>
                </div>

                <div class="unique-div">
                    <i class=" bi-person-video3 secondary"></i>
                    <div class="text-div">
                        <h2>Physical and Online Lectures</h2>
                        <p>Ace TOEFL, GRE, GMAT, PTE & IELTS with expert-led classes—online or onsite. Learn affordably,
                            anywhere!</p>
                    </div>
                </div>

                <div class="unique-div">
                    <i class=" bi-file-pdf nuetral"></i>
                    <div class="text-div">
                        <h2>FREE E-books and Study Packs</h2>
                        <p>Register for any exam & get 2020 textbook + free CD! Access 120+ video lessons & practice
                            tests after signup!</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>

</html>