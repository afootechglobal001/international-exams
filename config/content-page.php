<?php if($page=='testimonialForm'){ ?>
    <div class="slide-form-div">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-chat-quote-fill"></i></div>
                <h3 id="pageTitle">WRITE A REVIEW</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <!-- /////////// Info ////////////////////////////// -->
        <div class="container-back-div">
            <div class="form-notification">
                <p>You are about to <span id="subTitle">share your experience</span>.  
                Please complete the form below with accurate details to successfully  
                <span id="subTitle2">submit your review</span>.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-chat-quote-fill"></i>
                            <p>Write your testimony here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="fullName_container">
                            <script>
                                textField({
                                    id: 'fullName',
                                    title: 'Enter Your Name',
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="emailAddress_container">
                            <script>
                                textField({
                                    id: 'emailAddress',
                                    title: 'Enter Your Email Address',
                                    type: 'email',
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="mobileNumber_container">
                            <script>
                                textField({
                                    id: 'mobileNumber',
                                    title: 'Enter Your Phone Number',
                                    type: 'tel',
                                });
                            </script>
                        </div>

                        <div class="text_area_container" id="testimony_container">
                            <script>
                                textField({
                                    id: 'testimony',
                                    title: 'Write Your Review',
                                    type: 'textarea'
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="Send Testimony" id="submitBtn" onclick="_sendTestimony();">
                        <i class="bi-send-check"></i> Send
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if($page=='makeEnquiryForm'){ ?>
    <div class="slide-form-div">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-chat-quote-fill"></i></div>
                <h3 id="pageTitle">MAKE AN ENQUIRY</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>

        <!-- /////////// Info ////////////////////////////// -->
        <div class="container-back-div">
            <div class="form-notification">
                <p>We are Available Always to Assist you in Registration of Exams and Training: For TOEFL, IELTS, GRE, GMAT, PTE, SAT, ACT, MCAT, LSAT, CGFNS, USMLE, DUOLINGO etc..</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-chat-quote-fill"></i>
                            <p>Kindly fill the from below</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="fullName_container">
                            <script>
                                textField({
                                    id: 'fullName',
                                    title: 'Enter Your Name',
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="emailAddress_container">
                            <script>
                                textField({
                                    id: 'emailAddress',
                                    title: 'Enter Your Email Address',
                                    type: 'email',
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="mobileNumber_container">
                            <script>
                                textField({
                                    id: 'mobileNumber',
                                    title: 'Enter Your Phone Number',
                                    type: 'tel',
                                });
                            </script>
                        </div>

                        <div class="text_area_container" id="testimony_container">
                            <script>
                                textField({
                                    id: 'testimony',
                                    title: 'Please provide details of your enquiry here...',
                                    type: 'textarea'
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="Send Testimony" id="submitBtn" onclick="_diplaySuccess();">
                        <i class="bi-send-check"></i> Send
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>