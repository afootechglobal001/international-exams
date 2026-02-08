<?php if ($page == 'transactions') { ?>
    <!-- /////////// Title ////////////////////////////// -->
    <section class="page-title-div">
        <div class="div-in">
            <div class="title-div">
                <div>
                    <div class="icon-div"><i class="bi bi-credit-card-2-back"></i></div>
                </div>
                <div class="text-div">
                    <h3>Transactions History</h3>
                    <p>Keep track of all your exam registration payments in one place. View receipts, monitor payment
                        status,
                        and transaction records.</p>
                </div>

            </div>
            <div class="search-div">
                <input type="text" placeholder="Search Here..." onkeyup="_filtersTransactionHistory(this.value)">
                <i class="bi bi-search"></i>
            </div>

        </div>
    </section>
    <!-- /////////// Title ////////////////////////////// -->

    <section class="main-content-div">
        <!--  ////////////////////////////////////////////////////////////////////////////////-->
        <section class="statistics-back-div">
            <div class="statistics-div" id="branch">
                <div class="statistics-inner-div completed">
                    <div class="statistics-text">
                        <p>TOTAL WALLET BALANCE</p>
                        <span>Statistics of total wallet balance</span>
                        <h2><b id="currencySymbol">--</b> <b id="walletBalance">0.00</b></h2>
                    </div>
                    <div class="statistics-icon completed"><i class="bi-check-circle"></i></div>
                </div>
            </div>
        </section>
        <!--  ////////////////////////////////////////////////////////////////////////////////-->
        <section class="content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-credit-card-2-back"></i>
                    <p>My Transactions</p>
                </div>
                <div>
                    <button class="btn" title="View all"
                        onclick="_getForm({page: 'loadWallet', url: portalOperationMiddlewareUrl});">
                        <i class="bi bi-wallet"></i> Load Wallet
                    </button>
                </div>
            </div>
            <div class="content-inner">
                <div class="table-div">
                    <table class="table" cellspacing="0" style="width:100%" id="searchTransactionHistory">
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
                    <div id="transactionPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </section>
    </section>
<?php } ?>

<?php if ($page == 'loadWallet') { ?>
    <div class="caption-div animated fadeIn">
        <div class="caption-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card-2-back"></i></div>
                <h3>LOAD WALLET</h3>
            </div>
            <div class="btn-div">
                <button class="btn" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">
                    <i class="bi bi-x-lg"></i> Close
                </button>
            </div>
        </div>
        <!-- /////////// Title ////////////////////////////// -->
        <div class="caption-notification">
            <p>Easily fund your exam wallet to make swift and secure payments for registrations, study materials, and other
                exam-related services.</p>
        </div>
        <div class="caption-body">
            <div class="text_field_container" id="walletAmount_container">
                <script>
                    textField({
                        id: 'walletAmount',
                        title: 'Enter The Amount',
                    });
                </script>
            </div>
            <div class="btn-div">
                <button class="btn" id="loadWalletBtn" onclick="_loadWallet();">LOAD WALLET</button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'transactionHistoryDetails') { ?>
    <script>
        useEachTransactionSession = JSON.parse(sessionStorage.getItem("useEachTransactionSession"));
    </script>

    <!-- /////////// Title ////////////////////////////// -->
    <section class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-credit-card"></i></div>
                <h3>TRANSACTION DETAILS</h3>
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
                <p>This section provides a complete breakdown of your transaction, including payment status, amount paid, and transaction reference.</p>
            </div>

            <!--  ////////////////////////////////////////////////////////////////////////////////-->
            <div class="form-container">
                <div class="content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-card"></i>
                            <p>User Details</p>
                        </div>
                    </div>

                    <div class="form-text">
                        <div class="alert alert-success form-alert">
                            <div class="alert-list-div">
                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>User Id:</div>
                                        <div>
                                            <span id="userId">
                                                <script>
                                                    $('#userId').html(useEachTransactionSession?.userId);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Full Name:</div>
                                        <div>
                                            <span id="fullName">
                                                <script>
                                                    $("#fullName").html(useEachTransactionSession?.firstName + " " + useEachTransactionSession?.lastName);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Email Address:</div>
                                        <div>
                                            <span id="emailAddress">
                                                <script>
                                                    $("#emailAddress").html(useEachTransactionSession?.emailAddress);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Phone Number:</div>
                                        <div>
                                            <span id="phoneNumber">
                                                <script>
                                                    $("#phoneNumber").html(useEachTransactionSession?.phoneNumber);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-card"></i>
                            <p>Transaction Details</p>
                        </div>
                    </div>

                    <div class="form-text">
                        <div class="alert alert-success form-alert">
                            <div class="alert-list-div">
                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Transaction Id:</div>
                                        <div>
                                            <span id="transactionId">
                                                <script>
                                                    $('#transactionId').html(useEachTransactionSession?.transactionId);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Transaction Type:</div>
                                        <div>
                                            <span id="transactionTypeName">
                                                <script>
                                                    $("#transactionTypeName").html(useEachTransactionSession?.transactionTypeName);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Payment Method:</div>
                                        <div>
                                            <span id="paymentMethodName">
                                                <script>
                                                    $("#paymentMethodName").html(useEachTransactionSession?.paymentMethodName);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Amount:</div>
                                        <div>
                                            <span id="amount">
                                                <script>
                                                    $("#amount").html(useEachTransactionSession?.currency + " " + thousandSeparator(useEachTransactionSession?.amount));
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Balance Before:</div>
                                        <div>
                                            <span id="balanceBefore">
                                                <script>
                                                    $("#balanceBefore").html(useEachTransactionSession?.currency + " " + thousandSeparator(useEachTransactionSession?.balanceBefore));
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Balance After:</div>
                                        <div>
                                            <span id="balanceAfter">
                                                <script>
                                                    $("#balanceAfter").html(useEachTransactionSession?.currency + " " + thousandSeparator(useEachTransactionSession?.balanceAfter));
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Status:</div>
                                        <div>
                                            <span id="statusName">
                                                <script>
                                                    $("#statusName").html(useEachTransactionSession?.statusName);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert-list-back-div">
                                    <div class="alert-list">
                                        <div>Date:</div>
                                        <div>
                                            <span id="createdTime">
                                                <script>
                                                    $("#createdTime").html(useEachTransactionSession?.createdTime);
                                                </script>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>