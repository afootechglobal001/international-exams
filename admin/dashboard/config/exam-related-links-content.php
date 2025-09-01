<?php if ($page == 'examRelatedLinks') { ?>
    <script> 
        getEachExamLinkPageSession = JSON.parse(sessionStorage.getItem("getEachExamLinkPageSession"));
        $('#pageTitle, #pageTitle2').html(getEachExamLinkPageSession?.examAbbr);
    </script>

    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-book-half"></i></div>
            </div>
            <div class="text-div">
                <div class="back-div"><span title="Click to return to International Exams" onclick="_getActivePage({page:'examCategory', divid:'publish'});"><i class="bi-arrow-left"></i> International Exams /</span> <strong id="pageTitle"></strong> Exam Related Links</div>
                <h3>Related Links</h3>
                <p>Create and manage exam-related pages. Keep details updated for easy access by students and staff.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search Exam Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW RELATED LINK" onclick="sessionStorage.removeItem('getEachExamLinkDataSession'); _getForm({page: 'relatedLinksReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW RELATED LINK
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-book-half"></i>
                    <p><span id="pageTitle2"></span> Exam Related Links</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div" id="pageContent">
                    <script>_fetchAllExamLinkData();</script>

                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'relatedLinksReg') { ?>
    <script> 
        getEachExamLinkDataSession = JSON.parse(sessionStorage.getItem("getEachExamLinkDataSession"));
        $('#pageTitle').html(getEachExamLinkDataSession?.publishId ? 'UPDATE EXAM RELATED LINK':'CREATE NEW EXAM RELATED LINK');
        $('#subTitle, #subTitle2').html(getEachExamLinkDataSession?.publishId ? 'update this exam related link':'create new exam related link');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3 id="pageTitle">CREATE NEW EXAM</h3>
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
                <p>You are about to <span id="subTitle"></span> for (<strong id="examAbbr"><script>$('#examAbbr').html(getEachExamLinkPageSession?.examAbbr);</script></strong>). Please complete the form below with accurate details to successfully <span id="subTitle2"></span>.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-book-half"></i>
                            <p>Exam Related Registration</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'Related Link Title',
                                    value: getEachExamLinkDataSession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                       <div class="form-title">UPLOAD RELATED LINK LOGO: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="examLinkPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examLinkPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const examLinkPix = getEachExamLinkDataSession.regPix;
                                    const examLinkPixUrl = examLinkPix ? "<?php echo $websiteUrl ?>/uploaded_files/examRelatedLink/" + examLinkPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#examLinkPixPreview").attr("src", examLinkPixUrl).attr("alt", getEachExamLinkDataSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachExamLinkDataSession?.statusId ?? '',
                                    fieldLabel: getEachExamLinkDataSession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createAndUpdateExamLink();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>