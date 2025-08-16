<?php if ($page == 'blogCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-journals"></i> <strong>Blog And Articles</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach blog..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search blog...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW BLOG"
                    onclick="_getForm({page: 'blogReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW BLOG
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
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

                <div class="title">UPLOAD BLOG PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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