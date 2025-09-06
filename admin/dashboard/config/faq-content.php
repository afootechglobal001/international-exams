<?php if ($page == 'faqCategory') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-patch-question"></i></div>
            </div>
            <div class="text-div">
                <h3>Frequently Asked Questions</h3>
                <p>Upload and manage photos or videos to showcase events, activities, and highlights. Keep your gallery organized and visually engaging for your audience.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search FAQ Here...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW FAQ" onclick="sessionStorage.removeItem('getEachFaqSession'); _getForm({page: 'faqReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW FAQ
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-patch-question"></i>
                    <p>Frequently Asked Questions</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div" id="pageContent">
                    <script>_fetchFaqData();</script>

                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'faqReg') { ?>
    <script> 
        getEachFaqSession = JSON.parse(sessionStorage.getItem("getEachFaqSession"));
        $('#pageTitle').html(getEachFaqSession?.publishId ? 'UPDATE FAQ':'CREATE NEW FAQ');
        $('#subTitle, #subTitle2').html(getEachFaqSession?.publishId ? 'update this faq':'create new faq');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-patch-question"></i></div>
                <h3 id="pageTitle">CREATE NEW FAQ</h3>
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
                            <i class="bi bi-patch-question"></i>
                            <p>Create new faq here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="catId_container">
                            <script>
                                selectField({
                                    id: 'catId',
                                    title: 'Select Faq Category',
                                    fieldValue: getEachFaqSession?.faqCatId ?? '',
                                    fieldLabel: getEachFaqSession?.faqCatName ?? ''
                                });
                                 _getSelectFaqCategory('catId');
                            </script>
                        </div>

                        <div class="text_field_container" id="faqQuestion_container">
                            <script>
                                textField({
                                    id: 'faqQuestion',
                                    title: 'FAQ Question',
                                    value: getEachFaqSession?.faqQuestion ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">FAQ ANSWER</div>
                        <div class="page-content-back-div">
                            <textarea class="text_field" style="width:100%;" rows="8" id="faqAnswer" title="TYPE FAQ ANSWER HERE"></textarea>
                            <div class="issueText" id="issue_faqAnswer"></div>
                        </div>
                        <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                        <script>
                            $(document).ready(function () {
                                tinymce.init({
                                    selector: '#faqAnswer',
                                    plugins: "link image table",
                                    setup: function (editor) {
                                        editor.on('init', function () {
                                            setTimeout(function () {
                                                editor.setContent(getEachFaqSession?.faqAnswer ?? '');
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
                                    fieldValue: getEachFaqSession?.statusId ?? '',
                                    fieldLabel: getEachFaqSession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="createAndUpdatefaq();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>