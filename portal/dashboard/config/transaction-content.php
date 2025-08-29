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