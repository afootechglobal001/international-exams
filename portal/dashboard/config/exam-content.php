<?php if ($page == 'exam') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="page-title-div">
    <div class="div-in">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-journal-text"></i></div>
            </div>
            <div class="text-div">
                <h3>My Registered Exams</h3>
                <p>View and manage all your registered international exams in one place. Track schedules and stay
                    informed
                    with important exam updates.</p>
            </div>

        </div>
        <div class="search-div">
            <input type="text" placeholder="Search Exams Here...">
            <i class="bi bi-search"></i>
        </div>
    </div>
</section>
<!-- /////////// Title ////////////////////////////// -->

<sction class="main-content-div">
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="statistics-back-div">
        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>PENDING EXAM</p>
                    <span>Statistics of unpaid exam registrations</span>
                    <h2>2</h2>

                </div>
                <div class="statistics-icon pending"><i class="bi-credit-card-2-back"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>UPCOMING EXAM</p>
                    <span>Statistics of scheduled exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon upcoming"><i class="bi-calendar3"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>COMPLETED EXAM</p>
                    <span>Statistics of completed exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon completed"><i class="bi-card-checklist"></i></div>
            </div>
        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-journal-text"></i>
                <p>My International Exams</p>
            </div>
            <div>
                <button class="btn" title="Apply for Exam">
                    <i class="bi bi-eye"></i> Apply for Exam
                </button>
            </div>
        </div>

        <div class="exams-back-div">
            <div class="exam-div">
                <div class="exam-image">
                    <img src="<?php echo $websiteUrl?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>
                <div class="exam-status draft">DRAFT</div>
                <div class="exam-info">
                    <h3>IELTS</h3>
                    <p>International English Language Testing System</p>
                    <div class="exam-time">
                        <p><i class="bi bi-calendar"></i> <strong>31-05-2025</strong></p>
                        <p><i class="bi bi-clock"></i> <strong>10:00 AM </strong></p>
                    </div>
                </div>
                <button class="btn" title="View Details">
                    <i class="bi bi-eye"></i> View Details
                </button>
            </div>
        </div>
    </section>
</sction>
<?php } ?>




<?php if ($page == 'examForm') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
    <div class="form-title-div">
        <div class="title-div">
            <div class="icon-div"><i class="bi bi-journal-text"></i></div>
            <h3>EXAM REGISTRAION</h3>
        </div>
        <div class="btn-div">
            <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                <i class="bi bi-x-lg"></i> Close
            </button>
        </div>
    </div>
    <!-- /////////// Title ////////////////////////////// -->
    <div class="container-back-div">
        <div class="form-notification">
            <p><strong>Importance Notice!</strong><br /> Test takers in Nigeria will need a valid international passport
                as an
                identifying
                document on the day of the exam. Kindly use a valid Email address has you will use this for receiving
                your Exam Details that you will input below and get payment details for completing the exam
                registration. Call Test Registration department for any enquiry: <strong id="phoneNumber_">---</strong>
                <script>
                $("#phoneNumber_").html((loginCountryData.phoneNumber));
                </script>
            </p>
        </div>

        <div class="form-container">

            <!-- Exam Information -->
            <div class="content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-mortarboard-fill"></i>
                        <p>Exam Information</p>
                    </div>
                </div>

                <div class="form-text">
                    <div class="text_field_container" id="examId_container">
                        <script>
                        selectField({
                            id: 'examId',
                            title: 'Select Exam Type'
                        });
                        _getCountryExams('examId');
                        </script>
                    </div>

                    <section class="content-div" id="examPreviewContainer" style="display: none;">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-clipboard2"></i>
                                <p>Exam Preview</p>
                            </div>

                        </div>

                        <div class="exams-back-div" id="examPreviewDiv">
                            <!-- <div class="exam-div">
                                <div class="exam-image">
                                    <img src="<?php echo $websiteUrl?>/all-images/exam-logo/ielts-exam-nigeria.jpg"
                                        alt="Exam Image">
                                </div>
                                <div class="exam-status active">ACTIVE</div>
                                <div class="exam-info">
                                    <h3>IELTS</h3>
                                    <p>International English Language Testing System</p>
                                </div>
                                <div class="price">
                                    <p>NGN 293,000.00</p>
                                </div>
                            </div> -->
                        </div>
                    </section>

                    <div class="text_field_container" id="locationId_container">
                        <script>
                        selectField({
                            id: 'locationId',
                            title: 'Select Preferred Location'
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="locationCentreId_container">
                        <script>
                        selectField({
                            id: 'locationCentreId',
                            title: 'Select Preferred Centre'
                        });
                        </script>
                    </div>

                    <div class="text_field_container" id="examDate_container">
                        <script>
                        selectField({
                            id: 'examDate',
                            title: 'Preferred Exam Date'
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="altDate_container">
                        <script>
                        selectField({
                            id: 'altDate',
                            title: 'Alternate Exam Date'
                        });
                        </script>
                    </div>
                </div>
            </div>

            <!-- Bio Data -->
            <div class="content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-person-lines-fill"></i>
                        <p>Bio Data</p>
                    </div>
                </div>

                <div class="form-text">
                    <div class="text_field_container" id="firstName_container">
                        <script>
                        textField({
                            id: 'firstName',
                            title: 'Enter Your First Name',
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="middleName_container">
                        <script>
                        textField({
                            id: 'middleName',
                            title: 'Enter Your Middle Name',
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="lastName_container">
                        <script>
                        textField({
                            id: 'lastName',
                            title: 'Enter Your Last Name',
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="dob_container">
                        <script>
                        textField({
                            id: 'dob',
                            title: 'Enter Your Date of Birth',
                            type: 'date'
                        });
                        </script>
                    </div>

                    <div class="text_field_container" id="emailAddress_container">
                        <script>
                        textField({
                            id: 'emailAddress',
                            title: 'Enter Your Email Address',
                        });
                        </script>
                    </div>
                    <div class="form-note">
                        <p> Make sure you use a correct and valid email address.</p>
                    </div>
                    <div class="text_field_container" id="phoneNumber_container">
                        <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Enter Your Phone Number',
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="residentialAddress_container">
                        <script>
                        textField({
                            id: 'residentialAddress',
                            title: 'Enter Your Residential Address',
                        });
                        </script>
                    </div>
                    <div class="text_field_container" id="genderId_container">
                        <script>
                        selectField({
                            id: 'genderId',
                            title: 'Select Your Gender'
                        });
                        _getSelectGender('genderId');
                        </script>
                    </div>
                </div>
            </div>

            <!-- Academic information -->
            <div id="schoolsOfInterest_div">
                <script>
                schoolCounter = 0;
                _addMoreSchoolsOfInterest();
                </script>
            </div>
            <div class="form-note">
                <p><span onclick="_addMoreSchoolsOfInterest();">CLICK HERE</span> to add more schools of interest</p>
            </div>


            <!-- Payment Information -->
            <div class="content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-credit-card-2-back"></i>
                        <p>Payment Method</p>
                    </div>
                </div>

                <div class="form-text">
                    <div class="text_field_container" id="paymentMethodId_container">
                        <script>
                        selectField({
                            id: 'paymentMethodId',
                            title: 'Select Payment Method'
                        });
                        _getSelectPaymentMethod('paymentMethodId');
                        </script>
                    </div>
                </div>
            </div>
            <div class="btn-div" style="flex-direction: column; gap: 5px;" id="submitBtn">
                <button class="btn" title="PROCEED TO PAYMENT" onclick="_registerExam();"> <i
                        class="bi-credit-card-2-back"></i> PROCEED TO PAYMENT </button>

            </div>
        </div>
</section>
<?php } ?>