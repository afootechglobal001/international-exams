<?php if ($page == 'examCategory') { ?>
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
            <button class="btn" title="ADD NEW INTERNATIONAL EXAM" onclick="sessionStorage.removeItem('getEachExamSession'); _getForm({page: 'examReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW INTERNATIONAL EXAM
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-journal-text"></i>
                    <p>International Exams</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="exams-back-div" id="pageContent">
                        <script>_fetchExamData();</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'examReg') { ?>
    <script> 
        getEachExamSession = JSON.parse(sessionStorage.getItem("getEachExamSession"));
        $('#pageTitle').html(getEachExamSession?.publishId ? 'UPDATE EXAM':'CREATE NEW EXAM');
        $('#subTitle, #subTitle2, #subTitle3').html(getEachExamSession?.publishId ? 'update this exam':'create new exam');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3 id="pageTitle">CRETAE NEW EXAM</h3>
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
                            <p>Exam Registration</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Exam Name',
                                    value: getEachExamSession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="examAbbr_container">
                            <script>
                                textField({
                                    id: 'examAbbr',
                                    title: 'Exam Abbreviation',
                                    value: getEachExamSession?.examAbbr ?? ''
                                });
                            </script>
                        </div>

                       <div class="form-title">UPLOAD EXAM LOGO: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="examPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const examPix = getEachExamSession.regPix;
                                    const examPixUrl = examPix ? "<?php echo $websiteUrl ?>/uploaded_files/examLogo/" + examPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#examPixPreview").attr("src", examPixUrl).attr("alt", getEachExamSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_area_container" id="incentives_container">
                            <script>
                                $(document).ready(function () {
                                    const incentivesList = getEachExamSession?.incentivesData?.map(item => item.incentives) || [];

                                    // Join them with comma and space
                                    const incentivesValue = incentivesList.join(", ");  

                                    textField({
                                        id: 'incentives',
                                        title: 'Incentives',
                                        type: 'textarea',
                                        value: incentivesValue
                                    });
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachExamSession?.statusId ?? '',
                                    fieldLabel: getEachExamSession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createExam();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'examRelatedLinks') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-book-half"></i></div>
            </div>
            <div class="text-div">
                <h3>Related Links</h3>
                <p>Create and manage dedicated pages for international exams. Customize details, organize categories, and keep information up to date for easy access by students and staff.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Exam Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW RELATED LINK" onclick="_getForm({page: 'relatedLinksReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW RELATED LINK
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-book-half"></i>
                    <p>International Exams</p>
                </div>
            </div>

            <div class="inner-table-content">
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

                <div class="form-title">UPLOAD EXAM PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
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