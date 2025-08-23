<?php if ($page == 'viewEbook') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-filetype-pdf"></i></div>
            </div>
            <div class="text-div">
                <h3>E-Books</h3>
                <p>Upload and organize e-books for easy access anytime. Provide students and staff with valuable study materials and resources in a well-structured digital library.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search E-book Here...">
                <i class="bi bi-filetype-pdf"></i>
            </div>
            <button class="btn" title="ADD NEW E-BOOK" onclick="_getForm({page: '', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW E-BOOK
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-filetype-pdf"></i>
                    <p>TOELF E-Books</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="book-back-div">
                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/toefl-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>TOEFL</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/act-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>ACT</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/ielts-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>IELTS</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/toefl-2.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>TOEFL</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/gmat-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>GMAT</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-filetype-pdf"></i>
                    <p>TOELF E-Books</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div">
                    <div class="book-back-div">
                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/toefl-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>TOEFL</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/act-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>ACT</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/ielts-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>IELTS</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/toefl-2.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>TOEFL</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>

                        <div class="book-div">
                            <div class="image-div"> <img src="<?php echo $websiteUrl ?>/all-images/e-books/gmat-1.jpg" alt="TOELF"></div>
                            <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg" alt="TOEFL Exam" /> </div>
                            <div class="text-div">
                                <div class="details">
                                    <h3>GMAT</h3>
                                    <p>Test of English as a Foreign Language</p>
                                    <div class="book-sum">
                                        <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                                        <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                                    </div>
                                </div>
                                 <button class="btn" title="Edit"><i class="bi-pencil-square"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'eBookReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW INTERNATIONAL EXAM</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD INTERNATIONAL EXAM</span></div>
                </div>

                <div class="text_field_container" id="name_container">
                    <script>
                        textField({
                            id: 'name',
                            title: 'Exam Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="abbreviation_container">
                    <script>
                        textField({
                            id: 'abbreviation',
                            title: 'Exam Abbreviation',
                        });
                    </script>
                </div>

                <div class="form-title">UPLOAD EXAM LOGO: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="examPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="examPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

                <div class="text_area_container" id="incentives_container">
                    <script>
                        textField({
                            id: 'incentives',
                            title: 'Incentives',
                            type: 'textarea',
                        });
                    </script>
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