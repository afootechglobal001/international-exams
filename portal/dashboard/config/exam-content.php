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
                <input type="text" placeholder="Search Exams Here..." onkeyup="_filtersExams(this.value)">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </section>
    <!-- /////////// Title ////////////////////////////// -->

    <sction class="main-content-div">
        <!--  ////////////////////////////////////////////////////////////////////////////////-->
        <section class="content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-journal-text"></i>
                    <p>My International Exams</p>
                </div>
                <div>
                    <button class="btn" title="Apply for Exam" onclick="sessionStorage.removeItem('useEachExamRegistrationSession'); _getForm({page: 'examForm', url: portalOperationMiddlewareUrl});">
                        <i class="bi bi-eye"></i> Apply for Exam
                    </button>
                </div>
            </div>

            <div class="exams-back-div" id="fetchRegisteredExamsContent">
                <script>
                    _fetchRegisteredExams();
                </script>

                <div class="content-loading-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                </div>
            </div>

            <!-- Pagination -->
            <div id="examPaginationControls" class="pagination-div"></div>
        </section>
    </sction>
<?php } ?>




<?php if ($page == 'examForm') { ?>
    <script>
        useEachExamRegistrationSession = JSON.parse(sessionStorage.getItem("useEachExamRegistrationSession"));
        $('#formTitle').html(useEachExamRegistrationSession?.examRegistrationId ? 'UPDATE EXAM REGISTRATION' : 'EXAM REGISTRATION');
    </script>
    <!-- /////////// Title ////////////////////////////// -->
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-journal-text"></i></div>
                <h3 id="formTitle">EXAM REGISTRAION</h3>
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
                                    title: 'Select Exam Type',
                                    fieldValue: useEachExamRegistrationSession?.examData?.examId ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.examData?.examAbbr ?? ''
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

                            <div class="exams-back-div" id="examPreviewDiv"></div>
                        </section>

                        <div class="text_field_container" id="locationId_container">
                            <script>
                                selectField({
                                    id: 'locationId',
                                    title: 'Select Preferred Location',
                                    fieldValue: useEachExamRegistrationSession?.locationData?.locationId ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.locationData?.locationName ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="locationCentreId_container">
                            <script>
                                selectField({
                                    id: 'locationCentreId',
                                    title: 'Select Preferred Centre',
                                    fieldValue: useEachExamRegistrationSession?.centreData?.centreId ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.centreData?.centreName ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="examDate_container">
                            <script>
                                selectField({
                                    id: 'examDate',
                                    title: 'Preferred Exam Date',
                                    fieldValue: useEachExamRegistrationSession?.examDate ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.examDate ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="altDate_container">
                            <script>
                                selectField({
                                    id: 'altDate',
                                    title: 'Alternate Exam Date',
                                    fieldValue: useEachExamRegistrationSession?.altExamDate ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.altExamDate ?? ''
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
                                    value: useEachExamRegistrationSession?.firstName ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="middleName_container">
                            <script>
                                textField({
                                    id: 'middleName',
                                    title: 'Enter Your Middle Name',
                                    value: useEachExamRegistrationSession?.middleName ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="lastName_container">
                            <script>
                                textField({
                                    id: 'lastName',
                                    title: 'Enter Your Last Name',
                                    value: useEachExamRegistrationSession?.lastName ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="dob_container">
                            <script>
                                textField({
                                    id: 'dob',
                                    title: 'Enter Your Date of Birth',
                                    type: 'date',
                                    value: useEachExamRegistrationSession?.dob ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="emailAddress_container">
                            <script>
                                textField({
                                    id: 'emailAddress',
                                    title: 'Enter Your Email Address',
                                    value: useEachExamRegistrationSession?.emailAddress ?? ''
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
                                    value: useEachExamRegistrationSession?.phoneNumber ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="residentialAddress_container">
                            <script>
                                textField({
                                    id: 'residentialAddress',
                                    title: 'Enter Your Residential Address',
                                    value: useEachExamRegistrationSession?.residentialAddress ?? ''
                                });
                            </script>
                        </div>
                        <div class="text_field_container" id="genderId_container">
                            <script>
                                selectField({
                                    id: 'genderId',
                                    title: 'Select Your Gender',
                                    fieldValue: useEachExamRegistrationSession?.genderData?.genderId ?? '',
                                    fieldLabel: useEachExamRegistrationSession?.genderData?.genderName ?? ''
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

                <!-- Profile Picture -->
                <div class="content-div">
                    <div class="content-title">
                        <label for="passportPhotograph" style="cursor:pointer;" title="Click To Upload Passport Photograph">
                            <div class="title">
                                <i class="bi bi-passport"></i>
                                <p>Click To Upload Passport Photograph</p>
                            </div>
                        </label>
                    </div>

                    <div class="form-text">
                        <label for="passportPhotograph">
                            <div class="pix-div" title="Click To Upload Passport Photograph">
                                <img id="passportPhotographPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="passportPhotograph" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="passportPhotographPreview.UpdatePreview(this);" />
                            </div>
                        </label>
                    </div>
                </div>

                <!-- International Passport -->
                <div class="content-div">
                    <div class="content-title">
                        <label for="internationalPassport" style="cursor:pointer;" title="Click To Upload International Passport">
                            <div class="title">
                                <i class="bi bi-passport"></i>
                                <p>Click To Upload International Passport</p>
                            </div>
                        </label>
                    </div>

                    <div class="form-text">
                        <label for="internationalPassport">
                            <div class="pix-div int-pass-pix-div" title="Click To Upload International Passport">
                                <img id="internationalPassportPreview" src="<?php echo $websiteUrl ?>/uploaded_files/internationalPassport/default.jpeg" alt="Default Image">
                                <input type="file" id="internationalPassport" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="internationalPassportPreview.UpdatePreview(this);" />
                            </div>
                        </label>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        const dataInfo = useEachExamRegistrationSession?.statusData;
                        if (dataInfo) {
                            const statusId = dataInfo.statusId;
                            if (statusId === '1') {
                                $("#paymentWrapper").hide();
                            } else {
                                $("#paymentWrapper").show();
                            }
                        }

                        const passportInfo = useEachExamRegistrationSession ?? '';

                        const passportPhotographUrl = passportInfo.passportPhotograph ? passportPhotographPath + "/" + passportInfo.passportPhotograph : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";
                        $("#passportPhotographPreview").attr("src", passportPhotographUrl).attr("alt", useEachExamRegistrationSession?.lastName + " Passport");

                        const internationalPassportUrl = passportInfo.internationalPassport ? internationalPassportPath + "/" + passportInfo.internationalPassport : "<?php echo $websiteUrl ?>/uploaded_files/internationalPassport/default.jpeg";
                        $("#internationalPassportPreview").attr("src", internationalPassportUrl).attr("alt", useEachExamRegistrationSession?.lastName + "International Passport");
                    });
                </script>

                <div id="paymentWrapper">
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
                    <div class="btn-div" id="submitBtn">
                        <button class="btn pay-later" title="PAY LATER" onclick="_registerExam('payLater');"> <i
                                class="bi-credit-card-2-back"></i> PAY LATER </button>

                        <button class="btn" title="PAY NOW" onclick="_registerExam('payNow');"> <i
                                class="bi-credit-card-2-back"></i> PAY NOW </button>
                    </div>
                </div>
            </div>
    </section>
<?php } ?>