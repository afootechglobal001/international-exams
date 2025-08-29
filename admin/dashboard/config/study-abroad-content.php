<?php if ($page == 'studyAbroadCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-flag-fill"></i></div>
            </div>
            <div class="text-div">
                <h3>Study Abroad</h3>
                <p>Build and manage study abroad pages to showcase opportunities, requirements, and guidelines. Keep information organized and up to date to help students plan their journey with confidence.</p> 
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Country Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW STUDY ABROAD" onclick="_getForm({page: 'studyAbroadReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW STUDY ABROAD
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-flag-fill"></i>
                    <p>Study Abroad</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'studyAbroadCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-canada.jpg" alt="STUDY IN CANADA" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN CANADA</h2>
                            <div class="top-text"><span> Canada plays host to more than 180,000 International students in any given... </span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-australia.jpg" alt="STUDY IN AUSTRALIA" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN AUSTRALIA</h2>
                            <div class="top-text"><span> Australia plays host to more than 180,000 International students in any... </span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-usa.png" alt="STUDY IN UNITED STATE" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN UNITED STATE</h2>
                            <div class="top-text"><span>U.S plays host to more than 180,000 International students in any given...</span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-frnace.jpg" alt="STUDY IN FRANCE" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN FRANCE</h2>
                            <div class="top-text"><span> Graduate Management Admission TestStudying abroad in France...</span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-dubai.jpg" alt="STUDY IN DUBAI" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN DUBAI</h2>
                            <div class="top-text"><span> Dubai is one of the seven emirates of the United Arab Emirates...</span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-china.jpg" alt="STUDY IN CHINA" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN CHINA</h2>
                            <div class="top-text"><span> The People's Republic of China has been a center of international attention... </span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-ghana.jpg" alt="STUDY IN GHANA" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN GHANA</h2>
                            <div class="top-text"><span>The People's Republic of China has been a center of international attention...</span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-qatar.jpg" alt="STUDY IN QATAR" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>
                        <div class="text-div">
                            <h2>STUDY IN QATAR</h2>
                            <div class="top-text"><span> Qatar is a small peninsular nation about the size of Connecticut. </span></div>
                            <div class="text-in">
                                <div class="text">
                                    UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>   
<?php } ?>

<?php if ($page == 'studyAbroadReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3>CREATE NEW STUDY ABROAD</h3>
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
                <p>You are about to create a new study abroad. Please complete the form below with accurate details to successfully create new study abroad.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-book-half"></i>
                            <p>Create new study abroad here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Study Abroad Title'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="studyAbroadSummary_container">
                            <script>
                                textField({
                                    id: 'studyAbroadSummary',
                                    title: 'Study Abroad Summary'
                                });
                            </script>
                        </div>

                       <div class="form-title">UPLOAD STUDY ABROAD PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="examPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examPixPreview.UpdatePreview(this);" />
                            </div>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status'
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createAndUpdateStudyAbroad();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>