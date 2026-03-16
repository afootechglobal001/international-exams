<?php if ($page == 'viewVideos') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-play-circle-fill"></i></div>
            </div>
            <div class="text-div">
                <h3>Videos</h3>
                <p>Upload and manage educational videos for seamless access anytime. Engage students and staff with tutorials, lectures, and other visual resources in an organized digital library.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Video Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW VIDEO" onclick="_getForm({page: 'videoReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW VIDEO
            </button>
        </div>
    </div>

    <div class="fetch-ebooks" id="pageContent">
        <script>
            _fetchVideoData();
        </script>

        <div class="content-loading-div">
            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
        </div>
    </div>
<?php } ?>

<?php if ($page == 'videoReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-play-circle-fill"></i></div>
                <h3 id="pageTitle">UPLOAD NEW VIDEO</h3>
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
                <p>You are about to upload video. Please complete the form below with accurate details to successfully upload the video.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-play-circle-fill"></i>
                            <p>VIDEO Registration</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="publishId_container">
                            <script>
                                selectField({
                                    id: 'publishId',
                                    title: 'Select Exam',
                                });
                                _getSelectVideoExam('publishId');
                            </script>
                        </div>

                        <div class="text_field_container" id="videoCatId_container">
                            <script>
                                selectField({
                                    id: 'videoCatId',
                                    title: 'Select Video Category',
                                });
                                _getSelectVideoCategory('videoCatId');
                            </script>
                        </div>

                        <div class="form-title">UPLOAD VIDEO POSTER: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="videoPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="videoPixPreview.UpdatePreview(this);" />
                            </div>
                        </label>

                        <div class="form-title">UPLOAD VIDEO (MP4): <span>*</span></div>
                        <div class="form-video-back-div">
                            <legend id="videoLegend" style="cursor:pointer;">
                                Click to Upload Video <i class="bi-upload"></i>
                            </legend>

                            <div class="div-in" id="video_upload_area">
                                <div id="videoDisplay" class="video-container">
                                    <video id="videoFile" class="video" controls style="display:none;" controlsList="nodownload">
                                        <source src="" type="video/mp4">
                                    </video>

                                    <div id="videoBackground" class="background-text" style="cursor:pointer;">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/defaults.png" alt="Default Image">
                                    </div>
                                </div>

                                <input type="file" id="video" name="videoFile" accept="video/*" style="display:none;">
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $("#video").on("change", function(e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        const fileURL = URL.createObjectURL(file);

                                        $("#videoFile source").attr("src", fileURL);
                                        $("#videoFile").show()[0].load();
                                        $("#videoBackground").hide();
                                    }
                                });

                                $("#videoLegend, #videoBackground, #videoFile").on("click", function() {
                                    $("#video").val(""); // reset to allow reselecting same file
                                    $("#video").trigger("click");
                                });
                            });
                        </script>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success" id="progress-alert">
                    <span>UPLOADING IN PROGRESS...</span><br>
                    Please DO NOT close this panel as the process takes some time.
                    <div class="ajax-progress">0%</div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_uploadVideo();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>