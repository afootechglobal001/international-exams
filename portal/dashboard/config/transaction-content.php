<?php if ($page == 'transactions') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="page-title-div">
    <div class="title-div">
        <div>
            <div class="icon-div"><i class="bi bi-credit-card-2-back"></i></div>
        </div>
        <div class="text-div">
            <h3>Transactions History</h3>
            <p>Keep track of all your exam registration payments in one place. View receipts, monitor payment status,
                and transaction records.</p>
        </div>

    </div>
    <div class="btn-div">
        <div class="search-div">
            <input type="text" placeholder="Search Here...">
            <i class="bi bi-search"></i>
        </div>
        <button class="btn" title="Apply for Exam">
            <i class="bi bi-journal-text"></i> Apply for Exam
        </button>
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
            <div>
                <button class="btn" title="View all">
                    <i class="bi bi-eye"></i> View All
                </button>
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