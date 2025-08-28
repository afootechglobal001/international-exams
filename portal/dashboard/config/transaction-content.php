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
            <input type="text" placeholder="Search Here...">
            <i class="bi bi-search"></i>
        </div>

    </div>
</section>
<!-- /////////// Title ////////////////////////////// -->

<sction class="main-content-div">
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-credit-card-2-back"></i>
                <p>My Transactions</p>
            </div>
        </div>
        <div class="content-inner">
            <div class="table-div">
                <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                    <thead>
                        <tr class="tb-col">
                            <th>sn</th>
                            <th>Date</th>
                            <th>Transaction ID</th>
                            <th>Amount (N)</th>
                            <th>Transaction Type</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="tb-row">
                            <td>1</td>
                            <td>00-00-00 00:00:00</td>
                            <td class="clickable-td"> STUDENT001239485959 </td>
                            <td> 230,000.00 </td>
                            <td>CREDIT</td>
                            <td>ONLINE</td>
                            <td>
                                <div class="status-div ACTIVE">ACTIVE</div>
                            </td>
                            <td>
                                <button class="btn view-btn" title="Click to view staff profile"
                                    onclick="_fetchEachStaff('${staffId}');">VIEW</button>
                            </td>
                        </tr>
                        <tr class="tb-row">
                            <td>2</td>
                            <td>00-00-00 00:00:00</td>
                            <td class="clickable-td"> STUDENT001239485959 </td>
                            <td> 230,000.00 </td>
                            <td>CREDIT</td>
                            <td>BANK TRANSFER</td>
                            <td>
                                <div class="status-div PENDING">PENDING</div>
                            </td>
                            <td>
                                <button class="btn view-btn" title="Click to view staff profile"
                                    onclick="_fetchEachStaff('${staffId}');">VIEW</button>
                            </td>
                        </tr>
                        <tr class="tb-row">
                            <td>3</td>
                            <td>00-00-00 00:00:00</td>
                            <td class="clickable-td"> STUDENT001239485959 </td>
                            <td> 230,000.00 </td>
                            <td>CREDIT</td>
                            <td>BANK TRANSFER</td>
                            <td>
                                <div class="status-div CANCELLED">CANCELLED</div>
                            </td>
                            <td>
                                <button class="btn view-btn" title="Click to view staff profile"
                                    onclick="_fetchEachStaff('${staffId}');">VIEW</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</sction>
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