<?php if ($page == 'internationalExamCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-book-half"></i></div>
            </div>
            <div class="text-div">
                <h3>International Exams</h3>
                <p>Create and manage dedicated pages for international exams. Customize details, organize categories, and keep information up to date for easy access by students and staff.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Exam Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW INTERNATIONAL EXAM" onclick="_getForm({page: 'internationalExamReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW INTERNATIONAL EXAM
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">   
        <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
            <div class="other-pg-back-div">
                <div class="grid-div">
                    <div class="btn-div">
                        <button class="btn active-btn" onclick="">EDIT</button>
                        <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'internationalExamCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                        <button class="btn link-btn" onclick="_getActivePage({page:'examRelatedLinks', divid:'publish'});">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>TOEFL</h2>
                        <div class="top-text"><span> Test of English as a Foreign Language </span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GRE.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>GRE</h2>
                        <div class="top-text"><span> Graduate Record Examination </span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/student1.avif" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>IELTS</h2>
                        <div class="top-text"><span>International English Language Testing System</span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>
                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GMAT.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>GMAT</h2>
                        <div class="top-text"><span> Graduate Management Admission Test </span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>PTE</h2>
                        <div class="top-text"><span> Pearson Test of English</span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GRE.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>SAT</h2>
                        <div class="top-text"><span> Scholastic Assessment Test </span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/student1.avif" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>MCAT</h2>
                        <div class="top-text"><span>Medical College Admission Test</span></div>
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
                        <button class="btn link-btn" onclick="">RELATED LINKS</button>
                    </div>

                    <div class="img-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GMAT.jpg" alt="TOEFL" />
                    </div>
                    <div class="status-div ACTIVE">ACTIVE</div>
                    <div class="text-div">
                        <h2>NCLEX</h2>
                        <div class="top-text"><span> National Concil Licensure Examination </span></div>
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
<?php } ?>

<?php if ($page == 'examRelatedLinks') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="back-div"><span title="Click and navigate back to International Exams" onclick="_getActivePage({page:'internationalExamCategory', divid:'publish'});"><i class="bi-arrow-left"></i> International Exams</span> Related Links</div>
            <div class="title"><i class="bi-book-half"></i> <strong>Related Links</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search link..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search link...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW RELATED LINK"
                    onclick="_getForm({page: 'relatedLinksReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW RELATED LINK
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'examRelatedLinks', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>TOEFL ELIGIBILTY IN NIGERIA</h2>
                    <div class="top-text"><span> Test of English as a Foreign Language </span></div>
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

<?php if ($page == 'internationalExamReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW INTERNATIONAL EXAM</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD INTERNATIONAL EXAM</span></div>
                </div>

                <div class="text_field_container" id="abbreviation_container">
                    <script>
                        textField({
                            id: 'abbreviation',
                            title: 'Exam Abbreviation',
                        });
                    </script>
                </div>

                <div class="text_field_container" id="examtTitle_container">
                    <script>
                        textField({
                            id: 'examtTitle',
                            title: 'Exam Title'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="pricing_container">
                    <script>
                        selectField({
                            id: 'pricing',
                            title: 'Select Payment & Pricing'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD EXAM PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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

<?php if ($page == 'relatedLinksReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW RELATED LINK</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW RELATED LINK</span></div>
                </div>

                <div class="text_field_container" id="abbreviation_container">
                    <script>
                        textField({
                            id: 'abbreviation',
                            title: 'Related Link Title',
                        });
                    </script>
                </div>

                <div class="text_field_container" id="examtTitle_container">
                    <script>
                        textField({
                            id: 'examtTitle',
                            title: 'Related Link'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD EXAM PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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