<?php if ($page == 'ebook') { ?>
    <!-- /////////// Title ////////////////////////////// -->
    <section class="page-title-div">
        <div class="div-in">
            <div class="title-div">
                <div>
                    <div class="icon-div"><i class="bi bi-filetype-pdf"></i></div>
                </div>
                <div class="text-div">
                    <h3>Download E-Books</h3>
                    <p>Access study resources and prepare for your international exams with ease. Stay on top of your
                        applications, schedules, and real-time updates—all in one place.</p>
                </div>

            </div>
            <div class="search-div">
                <input type="text" placeholder="Search E-Books By Exam..." onkeyup="_filtersEbooks(this.value);">
                <i class="bi bi-search"></i>
            </div>

        </div>
    </section>
    <!-- /////////// Title ////////////////////////////// -->

    <div class="fetch-div" id="pageContent">
        <script>
            _fetchAllEbookData();
        </script>

        <div class="content-loading-div">
            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
        </div>
    </div>
<?php } ?>

<?php if ($page == 'proceedEbookForm') { ?>
    <script>
        useProceedEbookDownloadSession = JSON.parse(sessionStorage.getItem("useProceedEbookDownloadSession"));
        $('#userFullName').html(useProceedEbookDownloadSession?.userFullName);
        $('#ebookTitle').html(useProceedEbookDownloadSession?.ebookData?.ebookTitle);
        $('#sellingPrice').html('<s>N</s>' + thousandSeparator(useProceedEbookDownloadSession?.ebookData?.sellingPrice));
    </script>
    <div class="caption-div animated fadeIn">
        <div class="caption-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card-2-back"></i></div>
                <h3>E-BOOK PAYMENT</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>
        <!-- /////////// Title ////////////////////////////// -->
        <div class="caption-notification">
            <p>
                Hi, <strong><span id="userFullName"></span></strong><br/>
                You are about to purchase <strong><span id="ebookTitle"></span></strong> for
                (<strong><span id="sellingPrice"></span></strong>).
                Kindly select a payment method below to proceed.
            </p>

        </div>
        <div class="caption-body">
            <div class="text_field_container" id="paymentMethodId_container">
                <script>
                    selectField({
                        id: 'paymentMethodId',
                        title: 'Select Payment Method'
                    });
                    _getSelectPaymentMethod('paymentMethodId');
                </script>
            </div>
            <div class="btn-div">
                <button class="btn" id="proceedPayBtn" onclick="_proceedToEbookPayment();">PROCEED TO PAYMENT</button>
            </div>
        </div>
    </div>
<?php } ?>