<?php if ($page == 'faqCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-patch-question"></i> <strong>Frequently Asked Questions</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach faq..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search faq...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW FAQ"
                    onclick="_getForm({page: 'faqReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW FAQ
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">1</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>What is the TOEFL exam used for?</span></button>
                </div>
                <div class="answer-div">The TOEFL (Test of English as a Foreign Language) is widely used to assess the English proficiency of non-native speakers, primarily for academic purposes such as university admissions in English-speaking countries.</div>
            </div>

            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">2</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>How is the IELTS scored?</span></button>
                </div>
                <div class="answer-div">The IELTS (International English Language Testing System) is scored on a band scale from 0 to 9, with each skill (Listening, Reading, Writing, Speaking) rated individually, and an overall band score calculated as an average.</div>
            </div>

            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">3</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>What is the purpose of the PTE?</span></button>
                </div>
                <div class="answer-div">The PTE (Pearson Test of English) is used to measure English language proficiency for academic, professional, or immigration purposes, offering a computer-based test format recognized globally.</div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'faqReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW FAQ</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW FAQ</span></div>
                </div>

                <div class="text_field_container" id="faqCat_container">
                    <script>
                        selectField({
                            id: 'faqCat',
                            title: 'Slect Faq Category'
                        });
                    </script>
                </div>

                <div class="title">FAQ ANSWER</div>
                <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#faq_answer', // change this value according to your HTML
                        plugins: "link, image, table"
                    });
                </script>
                <div style="margin-bottom: 10px;">
                    <textarea class="text_field" style="width:100%;" rows="5" id="faq_answer" title="TYPE FULL PAGE CONTENT HERE" type="text" maxlength="167" id="" placeholder=""></textarea>
                </div>

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