<?php if ($page == 'blogCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-book-half"></i></div>
            </div>
            <div class="text-div">
                <h3>Blogs & Articles</h3>
                <p>Write, publish, and manage blogs and articles to share updates, insights, and resources. Keep your audience informed with well-organized and regularly updated content.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Blog Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW BLOG" onclick="_getForm({page: 'blogReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW BLOG
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-book-half"></i>
                    <p>Blogs & Articles</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="grid-div">
                        <div class="btn-div">
                            <button class="btn active-btn" onclick="">EDIT</button>
                            <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'blogCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                        </div>

                        <div class="img-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/blogs/blog1.png" alt="HOW INTERNATIONAL EXAMS OPEN DOORS TO GLOBAL EDUCATION" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>

                        <div class="text-div">
                            <div class="top-text blog-top-text"><span> INTERNATIONAL EXAM</span></div>
                            <h2>HOW INTERNATIONAL EXAMS OPEN DOORS TO GLOBAL EDUCATION...</h2>
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
                            <img src="<?php echo $websiteUrl ?>/all-images/blogs/blog2.png" alt="TOP EXAMS YOU NEED TO STUDY ABROAD: IELTS, TOEFL, SAT, GRE & MORE" />
                        </div>
                        <div class="status-div ACTIVE">ACTIVE</div>

                        <div class="text-div">
                            <div class="top-text blog-top-text"><span> INTERNATIONAL EXAM</span></div>
                            <h2>TOP EXAMS YOU NEED TO STUDY ABROAD: IELTS, TOEFL, SAT, GRE...</h2>
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

<?php if ($page == 'blogReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW BLOG</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW BLOG</span></div>
                </div>

                <div class="text_field_container" id="blogCat_container">
                    <script>
                        selectField({
                            id: 'blogCat',
                            title: 'Select Blog Category'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="blogTitle_container">
                    <script>
                        textField({
                            id: 'blogTitle',
                            title: 'Blog Title'
                        });
                    </script>
                </div>

                <div class="form-title">UPLOAD BLOG PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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