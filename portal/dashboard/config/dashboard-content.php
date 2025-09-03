<?php if ($page == 'dashboard') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="page-title-div">
    <div class="div-in">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-speedometer2"></i></div>
            </div>
            <div class="text-div">
                <h3>Dashboard</h3>
                <p>Manage your international exam applications in one place. Stay updated with
                    real-time notifications, schedules, and exam insights.</p>
            </div>

        </div>
        <div class="btn-div">
            <button class="btn donwload-btn" title="Refresh Page"
                onclick="_getActivePage({page:'ebook', divid:'ebook'});">
                <i class="bi bi-filetype-pdf"></i> Download E-books
            </button>
            <button class="btn" title="Apply for Exam"
                onclick="_getForm({page: 'examForm', url: portalOperationMiddlewareUrl});">
                <i class="bi bi-journal-text"></i> Apply for Exam
            </button>
        </div>
    </div>
</section>
<!-- /////////// Title ////////////////////////////// -->

<sction class="main-content-div">
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div bg-secondary">
        <div class="greetings-div">
            <div class="title-div">
                <p>August 13, 2025 </p>
                <h1>Welcome Back, <b id="greetingsFirstName">
                        <script>
                        $("#greetingsFirstName").html(capitalizeFirstLetterOfEachWord(userLoginData.firstName));
                        </script>
                    </b>!
                </h1>
                <p><span>Last login date: <strong>31-05-2025 11:03:45</strong></span></p>
            </div>
            <div class="wallet-div">
                <div class="wallet-info">
                    <p>Wallet Balance (<span id="currencySymbol">--</span>)</p>
                    <h2 id="walletBalance">0.00</h2>
                </div>
                <button class="btn" title="Load wallet"
                    onclick="_getForm({page: 'loadWallet', url: portalOperationMiddlewareUrl});">
                    <i class="bi bi-wallet"></i> Load Wallet
                </button>
            </div>
        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="statistics-back-div">
        <div class="statistics-div" id="branch">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>PENDING EXAM</p>
                    <span>Statistics of unpaid exam registrations</span>
                    <h2>2</h2>

                </div>
                <div class="statistics-icon pending"><i class="bi-credit-card-2-back"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>UPCOMING EXAM</p>
                    <span>Statistics of scheduled exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon upcoming"><i class="bi-calendar3"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>COMPLETED EXAM</p>
                    <span>Statistics of completed exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon completed"><i class="bi-card-checklist"></i></div>
            </div>
        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-clipboard2"></i>
                <p>My International Exams</p>
            </div>

            <div>
                <button class="btn" title="Apply for Exam"
                    onclick="_getForm({page: 'examForm', url: portalOperationMiddlewareUrl});">
                    <i class="bi bi-eye"></i> Apply for Exam
                </button>
            </div>
        </div>

        <div class="exams-back-div">
            <div class="exam-div">
                <div class="exam-image">
                    <img src="<?php echo $websiteUrl?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>
                <div class="exam-status draft">DRAFT</div>
                <div class="exam-info">
                    <h3>IELTS</h3>
                    <p>International English Language Testing System</p>
                    <div class="exam-time">
                        <p><i class="bi bi-calendar"></i> <strong>31-05-2025</strong></p>
                        <p><i class="bi bi-clock"></i> <strong>10:00 AM </strong></p>
                    </div>
                </div>
                <button class="btn" title="View Details">
                    <i class="bi bi-eye"></i> View Details
                </button>
            </div>

            <div class="exam-div">
                <div class="exam-image">
                    <img src="<?php echo $websiteUrl?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>
                <div class="exam-status pending">PENDING</div>
                <div class="exam-info">
                    <h3>IELTS</h3>
                    <p>International English Language Testing System</p>
                    <div class="exam-time">
                        <p><i class="bi bi-calendar"></i> <strong>31-05-2025</strong></p>
                        <p><i class="bi bi-clock"></i> <strong>10:00 AM </strong></p>
                    </div>
                </div>
                <button class="btn" title="View Details">
                    <i class="bi bi-eye"></i> View Details
                </button>
            </div>
        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-filetype-pdf"></i>
                <p>Download E-Books - <strong>It's Free</strong></p>
            </div>
            <div>
                <button class="btn" title="View all" onclick="_getActivePage({page:'ebook', divid:'ebook'});">
                    <i class="bi bi-eye"></i> View All
                </button>
            </div>
        </div>
        <div class="book-back-div">

            <div class="book-div">
                <div class="image-div"> <img src="<?php echo $websiteUrl?>/all-images/e-books/toefl-1.jpg" alt="TOELF">
                </div>
                <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg"
                        alt="TOEFL Exam" /> </div>
                <div class="text-div">
                    <div class="details">
                        <h3>TOEFL</h3>
                        <p>Test of English as a Foreign Language</p>
                        <div class="book-sum">
                            <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                            <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                        </div>
                    </div>
                    <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
                </div>
            </div>
            <div class="book-div">
                <div class="image-div"> <img src="<?php echo $websiteUrl?>/all-images/e-books/act-1.jpg" alt="TOELF">
                </div>
                <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg"
                        alt="TOEFL Exam" /> </div>
                <div class="text-div">
                    <div class="details">
                        <h3>ACT</h3>
                        <p>Test of English as a Foreign Language</p>
                        <div class="book-sum">
                            <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                            <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                        </div>
                    </div>
                    <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
                </div>
            </div>
            <div class="book-div">
                <div class="image-div"> <img src="<?php echo $websiteUrl?>/all-images/e-books/ielts-1.jpg" alt="TOELF">
                </div>
                <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg"
                        alt="TOEFL Exam" /> </div>
                <div class="text-div">
                    <div class="details">
                        <h3>IELTS</h3>
                        <p>Test of English as a Foreign Language</p>
                        <div class="book-sum">
                            <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                            <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                        </div>
                    </div>
                    <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
                </div>
            </div>
            <div class="book-div">
                <div class="image-div"> <img src="<?php echo $websiteUrl?>/all-images/e-books/toefl-2.jpg" alt="TOELF">
                </div>
                <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg"
                        alt="TOEFL Exam" /> </div>
                <div class="text-div">
                    <div class="details">
                        <h3>TOEFL</h3>
                        <p>Test of English as a Foreign Language</p>
                        <div class="book-sum">
                            <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                            <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                        </div>
                    </div>
                    <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
                </div>
            </div>
            <div class="book-div">
                <div class="image-div"> <img src="<?php echo $websiteUrl?>/all-images/e-books/gmat-1.jpg" alt="TOELF">
                </div>
                <div class="icon-div"> <img src="<?php echo $websiteUrl ?>/all-images/exam-logo/toefl-exam-nigeria.jpg"
                        alt="TOEFL Exam" /> </div>
                <div class="text-div">
                    <div class="details">
                        <h3>GMAT</h3>
                        <p>Test of English as a Foreign Language</p>
                        <div class="book-sum">
                            <p><i class="bi bi-journal-text"></i> <strong>96 Pages</strong></p>
                            <p><i class="bi bi-floppy"></i> <strong> 5.4MB</strong></p>
                        </div>
                    </div>
                    <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
                </div>
            </div>

        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-credit-card-2-back"></i>
                <p>My Recent Transactions</p>
            </div>
            <div>
                <button class="btn" title="View all"
                    onclick="_getActivePage({page:'transactions', divid:'transactions'});">
                    <i class="bi bi-eye"></i> View All
                </button>
            </div>
        </div>
        <div class="content-inner">
            <div class="table-div">
                <table class="table" cellspacing="0" style="width:100%">
                    <thead>
                        <tr class="tb-col">
                            <th>sn</th>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Transaction Type</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody id="transactionHistoryContent">
                        <script>
                        _fetchTransactionHistory();
                        </script>
                        <tr>
                            <td colspan="8">
                                <div class="content-loading-div">
                                    <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div id="transactionPaginationControls" class="pagination-div pagination-div-hidden"></div>
            </div>
        </div>
    </section>
</sction>
<?php } ?>