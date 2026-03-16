<?php if ($page == 'blogCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-journals"></i></div>
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
            <button class="btn" title="ADD NEW BLOG" onclick="sessionStorage.removeItem('getEachBlogSession'); _getForm({page: 'blogReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW BLOG
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-journals"></i>
                    <p>Blogs & Articles</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div" id="pageContent">
                    <script>_fetchBlogData();</script>

                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'blogReg') { ?>
    <script> 
        getEachBlogSession = JSON.parse(sessionStorage.getItem("getEachBlogSession"));
        $('#pageTitle').html(getEachBlogSession?.publishId ? 'UPDATE BLOG':'CREATE NEW BLOG');
        $('#subTitle, #subTitle2').html(getEachBlogSession?.publishId ? 'update this blog':'create new blog');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-journals"></i></div>
                <h3 id="pageTitle">CREATE NEW BLOG</h3>
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
                <p>You are about to <span id="subTitle"></span>. Please complete the form below with accurate details to successfully <span id="subTitle2"></span>.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-journals"></i>
                            <p>Create new study abroad here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="catId_container">
                            <script>
                                selectField({
                                    id: 'catId',
                                    title: 'Select Blog Category',
                                    fieldValue: getEachBlogSession?.blogCatId ?? '',
                                    fieldLabel: getEachBlogSession?.blogCatName ?? ''
                                });
                                _getSelectBlogCategory('catId');
                            </script>
                        </div>

                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Blog Title',
                                    value: getEachBlogSession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                       <div class="form-title">UPLOAD BLOG PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="blogPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const blogPix = getEachBlogSession.regPix;
                                    const blogPixUrl = blogPix ? blogPixPath + "/" + blogPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#blogPixPreview").attr("src", blogPixUrl).attr("alt", getEachBlogSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachBlogSession?.statusId ?? '',
                                    fieldLabel: getEachBlogSession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="createAndUpdateBlog();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>