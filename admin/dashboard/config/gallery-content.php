<?php if ($page == 'galleryCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-images"></i></div>
            </div>
            <div class="text-div">
                <h3>Gallery</h3>
                <p>Upload and manage photos or videos to showcase events, activities, and highlights. Keep your gallery organized and visually engaging for your audience.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Gallery Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW GALLERY" onclick="_getForm({page: 'galleryReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW GALLERY
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-images"></i>
                    <p>Gallery</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
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
            </div>  
        </div>       
    </div>
<?php } ?>

<?php if ($page == 'galleryReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-images"></i></div>
                <h3>CREATE NEW GALLERY</h3>
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
                <p>You are about to create a new gallery. Please complete the form below with accurate details to successfully create new gallery</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-images"></i>
                            <p>Create new gallery here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="blogCat_container">
                            <script>
                                textField({
                                    id: 'blogCat',
                                    title: 'Gallery Title'
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD GALLERY PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>