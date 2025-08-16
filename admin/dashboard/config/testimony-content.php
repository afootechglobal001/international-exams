<?php if ($page == 'testimonyCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-quote"></i> <strong>Testimonies</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search testimony..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search testimony...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="testimony-back-div">
                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Paul Emmanuel</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>seunemmanuel107@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onclick="_getForm({page: 'updateTestimony', url: adminPortalLocalUrl});">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Gideo Smith</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>gideo200@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onclick="">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Solomon James</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>solomon12@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onClick="">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Cynthia Morgan</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>cynthia123@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onClick="">VIEW DETAILS</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'updateTestimony') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> UPDATE TESTIMONY</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> UPDATE TESTIMONY</span></div>
                </div>

                <div class="text_field_container" id="fullName_container">
                    <script>
                        textField({
                            id: 'fullName',
                            title: 'Full Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="emailAddress_container">
                    <script>
                        textField({
                            id: 'emailAddress',
                            title: 'Email Address'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="phoneNumber_container">
                    <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Phone Number'
                        });
                    </script>
                </div>

                <div class="text_area_container" id="testimony_container">
                    <script>
                        textField({
                            id: 'testimony',
                            title: 'Testimony',
                            type: 'textarea'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="statusId_container">
                    <script>
                        selectField({
                            id: 'statusId',
                            title: 'Select Status'
                        });
                    </script>
                </div>

                <div>
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i>SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>