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
        $('#subTitle, #subTitle2').html(getEachExamSession?.publishId ? 'update this exam':'create new exam');
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

                        <div class="text_field_container" id="officialWebsite_container">
                            <script>
                                textField({
                                    id: 'officialWebsite',
                                    title: 'Official Website',
                                    value: getEachExamSession?.officialWebsite ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="conductingBody_container">
                            <script>
                                textField({
                                    id: 'conductingBody',
                                    title: 'Conducting Body',
                                    value: getEachExamSession?.conductingBody ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="acceptedBy_container">
                            <script>
                                textField({
                                    id: 'acceptedBy',
                                    title: 'Generally Accepted By',
                                    value: getEachExamSession?.acceptedBy ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="mostPopular_container">
                            <script>
                                textField({
                                    id: 'mostPopular',
                                    title: 'Most Popular',
                                    value: getEachExamSession?.mostPopular ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="modeOfExam_container">
                            <script>
                                textField({
                                    id: 'modeOfExam',
                                    title: 'Mode Of Exam',
                                    value: getEachExamSession?.modeOfExam ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD EXAM PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="examPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const examPix = getEachExamSession.regPix;
                                    const examPixUrl = examPix ? "<?php echo $websiteUrl ?>/uploaded_files/examPicture/" + examPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#examPixPreview").attr("src", examPixUrl).attr("alt", getEachExamSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="form-title">UPLOAD EXAM LOGO: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="examLogoPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="examLogo" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examLogoPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const examLogoPix = getEachExamSession.examLogo;
                                    const examLogoUrl = examLogoPix ? "<?php echo $websiteUrl ?>/uploaded_files/examLogo/" + examLogoPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#examLogoPreview").attr("src", examLogoUrl).attr("alt", getEachExamSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="form-title">EXAM INCENTIVES</div>
                        <div class="page-content-back-div">
                            <textarea class="text_field" style="width:100%;" rows="24" id="incentives" title="TYPE EXAM INCENTIVES HERE"></textarea>
                            <div class="issueText" id="issue_incentives"></div>
                        </div>

                        <div class="form-title">EXAM SCORE RANGE</div>
                        <div class="page-content-back-div">
                            <textarea class="text_field" style="width:100%;" rows="8" id="scoreRange" title="TYPE EXAM SCORE RANGE HERE"></textarea>
                            <div class="issueText" id="issue_scoreRange"></div>
                        </div>

                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            $(document).ready(function () {
                                tinymce.init({
                                    selector: '#incentives, #scoreRange',
                                    plugins: "link image table",
                                    setup: function (editor) {
                                        editor.on('init', function () {
                                            setTimeout(function () {
                                                if (editor.id === "incentives") {
                                                    editor.setContent(getEachExamSession?.incentives ?? '');
                                                }
                                                if (editor.id === "scoreRange") {
                                                    editor.setContent(getEachExamSession?.scoreRange ?? '');
                                                }
                                            }, 300);
                                        });
                                    }
                                });
                            });
                        </script>

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