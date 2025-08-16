<?php if ($page == 'studyAbroadCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-book-half"></i> <strong>Study Abroad</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper study-abroad-text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search study abroad..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search study abroad...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW TUDY ABROAD"
                    onclick="_getForm({page: 'studyAbroadReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW STUDY ABROAD
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
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
<?php } ?>

<?php if ($page == 'studyAbroadReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW STUDY ABROAD</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW STUDY ABROAD</span></div>
                </div>

                <div class="text_field_container" id="examtTitle_container">
                    <script>
                        textField({
                            id: 'examtTitle',
                            title: 'Study Abroad Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD STUDY ABROAD PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="blog_preview_pix" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="reg_thumbnail" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

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