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
                <input type="text" id="searchContent" onkeyup="_filterEbooks(this.value);" placeholder="Search E-book Here...">
                <i class="bi bi-filetype-pdf"></i>
            </div>
            <button class="btn" title="ADD NEW E-BOOK" onclick="sessionStorage.removeItem('useEachEbookSession'); _getForm({page: 'eBookReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW E-BOOK
            </button>
        </div>
    </div>

    <div class="fetch-ebooks" id="pageContent">
        <script>
            _fetchEbookData();
        </script>

        <div class="content-loading-div">
            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
        </div>
    </div>
<?php } ?>

<?php if ($page == 'eBookReg') { ?>
    <script>
        useEachEbookSession = JSON.parse(sessionStorage.getItem("useEachEbookSession"));
        $('#pageTitle').html(useEachEbookSession?.ebookData?.[0]?.ebookId ? 'UPDATE E-BOOK' : 'UPLOAD NEW E-BOOK');
        $('#subTitle, #subTitle2').html(useEachEbookSession?.ebookData[0]?.ebookId ? 'update this e-book' : 'upload new e-book');
    </script>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3 id="pageTitle">UPLOAD NEW E-BOOK</h3>
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
                            <p>E-book</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="publishId_container">
                            <script>
                                selectField({
                                    id: 'publishId',
                                    title: 'Select Exam',
                                    fieldValue: useEachEbookSession?.examData?.examId ?? '',
                                    fieldLabel: useEachEbookSession?.examData?.examAbbr ?? ''
                                });
                                _getSelectEbookExam('publishId');
                            </script>
                        </div>

                        <div class="text_field_container" id="ebookTitle_container">
                            <script>
                                textField({
                                    id: 'ebookTitle',
                                    title: 'E-book Title',
                                    value: useEachEbookSession?.ebookData[0]?.ebookTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="sellingPrice_container">
                            <script>
                                textField({
                                    id: 'sellingPrice',
                                    title: 'Selling Price',
                                    value: useEachEbookSession?.ebookData[0]?.sellingPrice ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD E-BOOK PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="ebookPixPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="ebookPixPreview.UpdatePreview(this);" />
                            </div>

                            <script>
                                $(document).ready(function () {
                                    const ebookPix = useEachEbookSession?.ebookData[0]?.regPix;
                                    const ebookPixUrl = ebookPix ? eBookPixPath + "/" + ebookPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#ebookPixPreview").attr("src", ebookPixUrl).attr("alt", useEachEbookSession?.ebookData[0]?.ebookTitle);
                                });
                            </script>
                        </label>

                        <div class="form-title">E-BOOK MATERIAL (PDF): <span>*</span></div>
                        <div class="pdf-back-div">
                            <legend id="pdfLegend" style="cursor:pointer;">Click to Upload PDF <i class="bi-upload"></i></legend>
                            <div class="div-in" id="pdf_upload_area">
                                <label>
                                    <div id="pdfDisplay" class="pdf-container background-display">
                                        <embed id="pdfFile" type="application/pdf" width="100%" height="350px" style="display:none;">
                                        <div id="pdfBackground" class="background-text" style="cursor:pointer;">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/defaults.png" alt="Default Image">
                                        </div>
                                    </div>
                                    <input type="file" id="material" name="pdfFile" accept=".pdf" style="display:none;">
                                </label>
                            </div>
                            <div id="file-list"></div>
                            <!-- Hidden inputs to hold extra data -->
                            <input type="hidden" name="ebookSize" id="ebookSize">
                            <input type="hidden" name="ebookPages" id="ebookPages">
                        </div>

                        <script>
                            $(document).ready(function() {
                                let $pdfDisplay = $('#pdfDisplay');
                                let $pdfInput = $('#material');
                                let $pdfEmbed = $('#pdfFile');
                                let $fileList = $('#file-list');

                                function showPdf(file) {
                                    if (!file) return;

                                    // Show preview
                                    let fileUrl = URL.createObjectURL(file);
                                    $pdfDisplay.removeClass('background-display').addClass('embed-display');
                                    $pdfEmbed.show().attr('src', fileUrl);
                                    $('#pdfBackground').hide();

                                    // File size
                                    let sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                                    $fileList.html('File size: ' + sizeInMB + 'MB');

                                    // ✅ Store in hidden input
                                    $('#ebookSize').val(sizeInMB + 'MB');

                                    // Get number of pages with PDF.js
                                    let reader = new FileReader();
                                    reader.onload = function(e) {
                                        let typedArray = new Uint8Array(e.target.result);

                                        pdfjsLib.getDocument({
                                            data: typedArray
                                        }).promise.then(function(pdf) {
                                            $fileList.append('<br>File Pages: ' + pdf.numPages);

                                            // ✅ Store in hidden input
                                            $('#ebookPages').val(pdf.numPages);
                                        }).catch(function(error) {
                                            console.error("PDF.js error:", error);
                                            $fileList.append('<br>Could not read number of pages.');
                                        });
                                    };
                                    reader.readAsArrayBuffer(file);
                                }

                                // Click legend to open file input
                                $('#pdfLegend').click(function() {
                                    $pdfInput.click();
                                });

                                // On file select
                                $pdfInput.on('change', function() {
                                    showPdf(this.files[0]);
                                });

                                // Drag & Drop
                                $pdfDisplay.on('dragover', function(e) {
                                    e.preventDefault();
                                    $(this).addClass('drag-over');
                                }).on('dragleave', function() {
                                    $(this).removeClass('drag-over');
                                }).on('drop', function(e) {
                                    e.preventDefault();
                                    $(this).removeClass('drag-over');
                                    let file = e.originalEvent.dataTransfer.files[0];
                                    $pdfInput[0].files = e.originalEvent.dataTransfer.files;
                                    showPdf(file);
                                });


                                // If editing existing ebook, show current PDF
                                let ebook = useEachEbookSession?.ebookData[0];
                                const existingPdf = ebook.material;
                                if (existingPdf) {
                                    let existingPdfUrl = ebookMaterialPath + "/" + existingPdf;
                                    $pdfDisplay.removeClass('background-display').addClass('embed-display');
                                    $pdfEmbed.show().attr('src', existingPdfUrl);
                                    $('#pdfBackground').hide();

                                    // Optional info
                                    $('#file-list').html(`
                                        File size: ${ebook.ebookSize}<br>
                                        File Pages: ${ebook.ebookPages}
                                    `);

                                    // Populate hidden fields
                                    $('#ebookSize').val(ebook.ebookSize);
                                    $('#ebookPages').val(ebook.ebookPages);
                                }
                            });
                        </script>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: useEachEbookSession?.ebookData[0]?.statusId ?? '',
                                    fieldLabel: useEachEbookSession?.ebookData[0]?.statusName ?? ''
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
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createEbook();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>