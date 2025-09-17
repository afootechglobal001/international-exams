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
            <button class="btn" title="ADD NEW STUDY ABROAD" onclick="sessionStorage.removeItem('getEachStudyAbroadSession'); _getForm({page: 'studyAbroadReg', url: adminPortalLocalUrl});">
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
                <div class="other-pg-back-div" id="pageContent">
                    <script>_fetchStudyAbroadData();</script>

                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'studyAbroadReg') { ?>
     <script> 
        getEachStudyAbroadSession = JSON.parse(sessionStorage.getItem("getEachStudyAbroadSession"));
        $('#pageTitle').html(getEachStudyAbroadSession?.publishId ? 'UPDATE STUDY ABROAD':'CREATE NEW STUDY ABROAD');
        $('#subTitle, #subTitle2').html(getEachStudyAbroadSession?.publishId ? 'update this study abroad':'create new study abroad');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3 id="pageTitle">CREATE NEW STUDY ABROAD</h3>
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
                            <i class="bi bi-book-half"></i>
                            <p>Create new study abroad here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Study Abroad Title',
                                    value: getEachStudyAbroadSession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_area_container" id="studyAbroadSummary_container">
                            <script>
                                textField({
                                    id: 'studyAbroadSummary',
                                    title: 'Study Abroad Summary',
                                    type: 'textarea',
                                    value: getEachStudyAbroadSession?.studyAbroadSummary ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD STUDY ABROAD PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="studyAbroadPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="studyAbroadPreview.UpdatePreview(this);" />
                            </div>
                            <script>
                                $(document).ready(function () {
                                    const studyAbroadPix = getEachStudyAbroadSession.regPix;
                                    const  studyAbroadPixUrl = studyAbroadPix ? studyAbroadPixPath + "/" + studyAbroadPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#studyAbroadPreview").attr("src", studyAbroadPixUrl).attr("alt", getEachStudyAbroadSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachStudyAbroadSession?.statusId ?? '',
                                    fieldLabel: getEachStudyAbroadSession?.statusName ?? ''
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