<?php if ($page == 'testimonyCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-quote"></i></div>
            </div>
            <div class="text-div">
                <h3>Testimonies</h3>
                <p>Share and manage student and parent testimonies to highlight real experiences. Build trust and inspire others through authentic stories and feedback.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Testimony Here...">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-quote"></i>
                    <p>Testimonies</p>
                </div>
            </div>

            <div class="inner-table-content">
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

                <div class="main-content-div form-main-content" data-aos="fade-in" data-aos-duration="1500">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-type"></i>
                                <p>Full Name</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                            <span>Paul Emmanuel</span>
                        </div>
                    </div>
                </div>

                <div class="main-content-div form-main-content" data-aos="fade-in" data-aos-duration="1500">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-envelope"></i>
                                <p>Email Address</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                            <span>seunemmanuel107@gmail.com</span>
                        </div>
                    </div>
                </div>

                <div class="main-content-div form-main-content" data-aos="fade-in" data-aos-duration="1500">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-telephone"></i>
                                <p>Phone Number</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                            <span>07050903886</span>
                        </div>
                    </div>
                </div>

                <div class="main-content-div form-main-content" data-aos="fade-in" data-aos-duration="1500">
                    <div class="tables-content-div form-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-chat-left-quote"></i>
                                <p>Testimony</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                           <span>“From Nigeria to Ghana”, EDUGRADE has been a trusted name among my classmates. Their international support is fast and reliable.</span> 
                        </div>
                    </div>
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