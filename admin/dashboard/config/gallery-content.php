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
            <button class="btn" title="ADD NEW GALLERY" onclick="sessionStorage.removeItem('getEachGallerySession'); _getForm({page: 'galleryReg', url: adminPortalLocalUrl});">
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
                    <div class="other-pg-back-div" id="pageContent">
                        <script>_fetchGalleryData();</script>

                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </div>
                </div>
            </div>  
        </div>       
    </div>
<?php } ?>

<?php if ($page == 'galleryReg') { ?>
    <script> 
        getEachGallerySession = JSON.parse(sessionStorage.getItem("getEachGallerySession"));
        $('#pageTitle').html(getEachGallerySession?.publishId ? 'UPDATE GALLERY':'CREATE NEW GALLERY');
        $('#subTitle, #subTitle2').html(getEachGallerySession?.publishId ? 'update this gallery':'create new gallery');
    </script>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-images"></i></div>
                <h3 id="pageTitle">CREATE NEW GALLERY</h3>
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
                            <i class="bi bi-images"></i>
                            <p>Create new gallery here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Gallery Title',
                                    value: getEachGallerySession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD GALLERY PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="galleryPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="galleryPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const galleryPix = getEachGallerySession.regPix;
                                    const galleryPixUrl = galleryPix ? galleryPixPath + "/" + galleryPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#galleryPixPreview").attr("src", galleryPixUrl).attr("alt", getEachGallerySession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachGallerySession?.statusId ?? '',
                                    fieldLabel: getEachGallerySession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="createAndUpdateGallery();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>