<?php if ($page == 'galleryCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-images"></i> <strong>Gallery</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach gallery..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search gallery...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW GALLERY"
                    onclick="_getForm({page: 'galleryReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW GALLERY
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'galleryCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/exam-writing.webp" alt="Students preparing for international exams like IELTS and SAT" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> GLOBAL READINESS</span></div>
                    <h2>INSIDE THE EXAM HALL: FOCUSED & DETERMINED</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>350</span> VIEWS
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
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/study-group.webp" alt="Students taking an international standardized test" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> PREP SESSIONS</span></div>
                    <h2>COLLABORATIVE LEARNING: DIVERSE STUDY GROUPS</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>410</span> VIEWS
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
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/result-celebration.jpg" alt="EDUGRADE students celebrating international exam success" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> SUCCESS STORIES</span></div>
                    <h2>GLOBAL ACHIEVEMENTS: EXAM SUCCESS CELEBRATED</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>500</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>

<?php if ($page == 'galleryReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW GALLERY</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW GALLERY</span></div>
                </div>

                <div class="text_field_container" id="blogCat_container">
                    <script>
                        textField({
                            id: 'blogCat',
                            title: 'Gallery Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD GALLERY PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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