<?php if ($page == 'incomeReport') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-graph-up-arrow"></i></div>
            </div>
            <div class="text-div">
                <h3>Income/Revenue</h3>
                <p>Manage and monitor all income sources efficiently. Track payments, record transactions, and generate financial reports to keep your institution’s revenue well organized.</p>
            </div>
        </div>
    </div>

    <div class="pages-back-div revenue-other-pg-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="nav-content-back-div">
            <div class="nav-container">
                <ul>
                    <li class="active border" title="Filter Revenue By Naira" id="filterByNaira" onclick="_getActiveReportNav({divid:'filterByNaira', page: 'filterByNaira', url: adminPortalLocalUrl});"><i class="bi-hash"></i> Naira Report</li>
                    <li title="Filter Revenue By Dollar" id="filterByDollar" onclick="_getActiveReportNav({divid:'filterByDollar', page: 'filterByDollar', url: adminPortalLocalUrl});"><i class="bi-currency-dollar"></i> Dollar Report</li>
                </ul>
            </div>

            <div id="getNavPage">
                <script>
                    _getActiveReportNav({
                        divid: 'filterByNaira',
                        page: 'filterByNaira',
                        url: adminPortalLocalUrl
                    });
                </script>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Filter By Date Revenue Pages -->
<?php if ($page == 'filterByNaira') { ?>
    <div class="chart-div-notifications report-chart-div">
        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

        <div class="text text-right" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>
            <div class="icon-div"><i class="bi-caret-down"></i></div>

            <div class="srch-select alert-srch-select">
                <div id="srch-today" onclick="_fetchReportRevenueFiltering('srch-today', 'Today', 'NGN');">Today
                </div>
                <div id="srch-week" onclick="_fetchReportRevenueFiltering('srch-week', 'This Week', 'NGN');">This
                    Week</div>
                <div id="srch-7" onclick="_fetchReportRevenueFiltering('srch-7', 'Last 7 Days', 'NGN');">Last 7 Days
                </div>
                <div id="srch-month" onclick="_fetchReportRevenueFiltering('srch-month', 'This Month', 'NGN');">This
                    Month</div>
                <div id="srch-30" onclick="_fetchReportRevenueFiltering('srch-30', 'Last 30 Days', 'NGN');">Last 30 Days
                </div>
                <div id="srch-90" onclick="_fetchReportRevenueFiltering('srch-90', 'Last 90 Days', 'NGN');">Last 90 Days
                </div>
                <div id="srch-year" onclick="_fetchReportRevenueFiltering('srch-year', 'This Year', 'NGN');">This
                    Year</div>
                <div id="srch-1year" onclick="_fetchReportRevenueFiltering('srch-1year', 'Last 1 Year', 'NGN');">Last 1
                    Year</div>
                <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
        </div>

        <div class="text">
            <div class="custom-srch-div">
                <div class="custom-srch-div-in">
                    <div class="text_field_container dash_field_container">
                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-from"
                            placeholder="" />
                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From
                        </div>
                        <div class="issueText" id="issue_from"></div>
                    </div>

                    <div class="text_field_container dash_field_container">
                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-to"
                            placeholder="" />
                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To </div>
                        <div class="issueText" id="issue_to"></div>
                    </div>
                    <button type="button" class="btn" id="applyCustomSearchBtn"
                        onclick="_fetchCustomReportRevenueFiltering('NGN');">Apply</button>
                </div>
            </div>
        </div>


        <script language="javascript">
            $('#datepickers-from').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                formatDate: 'Y-M-d',
            });

            $('#datepickers-to').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                formatDate: 'Y-M-d',
            });
        </script>
    </div>

    <div class="fetch-report-back-div">
        <div class="alert alert-success top-alert-div report-alert">
            <div class="div">
                <i class="bi-info-circle"></i> Revenue report between <span id="dateFrom">Loading...</span> and <span id="dateTo">Loading...</span>
            </div>

            <div class="div">
                Total Revenue: <span class="balance" id="totalRevenue">Loading...</span>
            </div>
        </div>

        <div class="report-dashbaord-wrapper animated fadeIn">
            <div class="modal-dashboard-statistics-wrapper">
                <div class="left-dashbaord-container report-left-dashbaord-container">
                    <div class="statistics-chart-back-div report-statistics-chart-back-div">
                        <div class="statistics-back-div">
                            <div class="statistics-div" id="branch" title="Credit Card">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Credit Card Revenue</p>
                                        <span>Total Amount Paid via Credit Card</span>
                                        <h2 id="sumCreditCardPayments">0</h2>
                                    </div>

                                </div>
                            </div>

                            <div class="statistics-div" title="Bank Transfer">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Bank Transfer Revenue</p>
                                        <span>Total Amount Paid via Bank Transfer</span>
                                        <h2 id="sumBankTransferPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" title="Bank Transfer">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Wallet Payment Revenue</p>
                                        <span>Total Amount Paid via Wallet</span>
                                        <h2 id="sumWalletPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" title="Subjects">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Credit Card Transactions</p>
                                        <span>Number of Card Payments</span>
                                        <h2 id="countCreditCardPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" id="branch_department_class" onclick="" title="Class">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Bank Transfer Transactions</p>
                                        <span>Number of Bank Transfer Payments</span>
                                        <h2 id="countBankTransferPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" id="branch_department_class" onclick="" title="Class">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Wallet Transactions</p>
                                        <span>Number of Wallet Payments</span>
                                        <h2 id="countWalletPayments">0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-div animated fadeIn">
                            <table class="table" cellspacing="0" style="width:100%">
                                <thead>
                                    <tr class="tb-col">
                                        <th>sn</th>
                                        <th>Date</th>
                                        <th>Successful</th>
                                        <th>Pending</th>
                                        <th>Cancelled</th>
                                        <th>View</th>
                                    </tr>
                                </thead>

                                <tbody id="pageContent">
                                    <!-- CONTENT GOES HERE -->
                                    <tr>
                                        <td colspan="20">
                                            <div class="content-loading-div">
                                                <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="right-dashbaord-container">
                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Revenue Matrix</h3>
                            </div>
                            <div id="chartContainer1" style="width:100%; height:200px; margin:auto;"></div>

                            <!-- <script type="text/javascript">
                                var options = {
                                    title: {
                                        text: "" /*My Performance*/
                                    },
                                    data: [{
                                        type: "doughnut",
                                        innerRadius: 30,
                                        showInLegend: "False",
                                        legendText: "{label}",
                                        indexLabel: "{label} ({y})",
                                        yValueFormatString: "#,##0.#" % "",
                                        indexLabelFontSize: 9,
                                        dataPoints: [{
                                                label: "CREDIT CARD",
                                                y: 0
                                            },
                                            {
                                                label: "BANK TRANSFER",
                                                y: 6
                                            },
                                        ]
                                    }]
                                };
                                $("#chartContainer1").CanvasJSChart(options);
                            </script> -->
                        </div>
                    </div>

                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Payment Channel Matrix</h3>
                            </div>
                            <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>

                            <!-- <script type="text/javascript">
                                var options = {
                                    title: {
                                        text: "" /*My Performance*/
                                    },
                                    data: [{
                                        type: "pie",
                                        startAngle: 45,
                                        showInLegend: "False",
                                        legendText: "{label}",
                                        indexLabel: "{label} ({y})",
                                        yValueFormatString: "#,##0.#" % "",
                                        dataPoints: [{
                                                label: "Debit/Credit Card",
                                                y: 0
                                            },
                                            {
                                                label: "Bank Transfer",
                                                y: 0
                                            },
                                            {
                                                label: "Wallet",
                                                y: 0
                                            },
                                        ]
                                    }]
                                };
                                $("#chartContainer2").CanvasJSChart(options);
                            </script> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            _fetchReportRevenueFiltering('srch-30', 'Last 30 Days', 'NGN');
        });
    </script>
<?php } ?>

<!-- Filter By Session Revenue Pages -->
<?php if ($page == 'filterByDollar') { ?>
    <div class="chart-div-notifications report-chart-div">
        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

        <div class="text text-right" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>
            <div class="icon-div"><i class="bi-caret-down"></i></div>

            <div class="srch-select alert-srch-select">
                <div id="srch-today" onclick="_fetchReportRevenueFiltering('srch-today', 'Today', 'USD');">Today
                </div>
                <div id="srch-week" onclick="_fetchReportRevenueFiltering('srch-week', 'This Week', 'USD');">This
                    Week</div>
                <div id="srch-7" onclick="_fetchReportRevenueFiltering('srch-7', 'Last 7 Days', 'USD');">Last 7 Days
                </div>
                <div id="srch-month" onclick="_fetchReportRevenueFiltering('srch-month', 'This Month', 'USD');">This
                    Month</div>
                <div id="srch-30" onclick="_fetchReportRevenueFiltering('srch-30', 'Last 30 Days', 'USD');">Last 30 Days
                </div>
                <div id="srch-90" onclick="_fetchReportRevenueFiltering('srch-90', 'Last 90 Days', 'USD');">Last 90 Days
                </div>
                <div id="srch-year" onclick="_fetchReportRevenueFiltering('srch-year', 'This Year', 'USD');">This
                    Year</div>
                <div id="srch-1year" onclick="_fetchReportRevenueFiltering('srch-1year', 'Last 1 Year', 'USD');">Last 1
                    Year</div>
                <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
        </div>

        <div class="text">
            <div class="custom-srch-div">
                <div class="custom-srch-div-in">
                    <div class="text_field_container dash_field_container">
                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-from"
                            placeholder="" />
                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From
                        </div>
                        <div class="issueText" id="issue_from"></div>
                    </div>

                    <div class="text_field_container dash_field_container">
                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-to"
                            placeholder="" />
                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To </div>
                        <div class="issueText" id="issue_to"></div>
                    </div>
                    <button type="button" class="btn" id="applyCustomSearchBtn"
                        onclick="_fetchCustomReportRevenueFiltering('USD');">Apply</button>
                </div>
            </div>
        </div>


        <script language="javascript">
            $('#datepickers-from').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                formatDate: 'Y-M-d',
            });

            $('#datepickers-to').datetimepicker({
                lang: 'en',
                timepicker: false,
                format: 'Y-m-d',
                formatDate: 'Y-M-d',
            });
        </script>
    </div>

    <div class="fetch-report-back-div">
        <div class="alert alert-success top-alert-div report-alert">
            <div class="div">
                <i class="bi-info-circle"></i> Revenue report between <span id="dateFrom">Loading...</span> and <span id="dateTo">Loading...</span>
            </div>

            <div class="div">
                Total Revenue: <span class="balance" id="totalRevenue">Loading...</span>
            </div>
        </div>

        <div class="report-dashbaord-wrapper animated fadeIn">
            <div class="modal-dashboard-statistics-wrapper">
                <div class="left-dashbaord-container report-left-dashbaord-container">
                    <div class="statistics-chart-back-div report-statistics-chart-back-div">
                        <div class="statistics-back-div">
                            <div class="statistics-div" id="branch" title="Credit Card">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Credit Card Revenue</p>
                                        <span>Total Amount Paid via Credit Card</span>
                                        <h2 id="sumCreditCardPayments">0</h2>
                                    </div>

                                </div>
                            </div>

                            <div class="statistics-div" title="Bank Transfer">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Bank Transfer Revenue</p>
                                        <span>Total Amount Paid via Bank Transfer</span>
                                        <h2 id="sumBankTransferPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" title="Bank Transfer">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Wallet Payment Revenue</p>
                                        <span>Total Amount Paid via Wallet</span>
                                        <h2 id="sumWalletPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" title="Subjects">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Credit Card Transactions</p>
                                        <span>Number of Card Payments</span>
                                        <h2 id="countCreditCardPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" id="branch_department_class" onclick="" title="Class">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Bank Transfer Transactions</p>
                                        <span>Number of Bank Transfer Payments</span>
                                        <h2 id="countBankTransferPayments">0</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-div" id="branch_department_class" onclick="" title="Class">
                                <div class="statistics-inner-div">
                                    <div class="statistics-text report-statistics-text">
                                        <p>Wallet Transactions</p>
                                        <span>Number of Wallet Payments</span>
                                        <h2 id="countWalletPayments">0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-div animated fadeIn">
                            <table class="table" cellspacing="0" style="width:100%">
                                <thead>
                                    <tr class="tb-col">
                                        <th>sn</th>
                                        <th>Date</th>
                                        <th>Successful</th>
                                        <th>Pending</th>
                                        <th>Cancelled</th>
                                        <th>View</th>
                                    </tr>
                                </thead>

                                <tbody id="pageContent">
                                    <!-- CONTENT GOES HERE -->
                                    <tr>
                                        <td colspan="20">
                                            <div class="content-loading-div">
                                                <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="right-dashbaord-container">
                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Revenue Matrix</h3>
                            </div>
                            <div id="chartContainer1" style="width:100%; height:200px; margin:auto;"></div>

                            <!-- <script type="text/javascript">
                                var options = {
                                    title: {
                                        text: "" /*My Performance*/
                                    },
                                    data: [{
                                        type: "doughnut",
                                        innerRadius: 30,
                                        showInLegend: "False",
                                        legendText: "{label}",
                                        indexLabel: "{label} ({y})",
                                        yValueFormatString: "#,##0.#" % "",
                                        indexLabelFontSize: 9,
                                        dataPoints: [{
                                                label: "CREDIT CARD",
                                                y: 0
                                            },
                                            {
                                                label: "BANK TRANSFER",
                                                y: 6
                                            },
                                        ]
                                    }]
                                };
                                $("#chartContainer1").CanvasJSChart(options);
                            </script> -->
                        </div>
                    </div>

                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Payment Channel Matrix</h3>
                            </div>
                            <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>

                            <!-- <script type="text/javascript">
                                var options = {
                                    title: {
                                        text: "" /*My Performance*/
                                    },
                                    data: [{
                                        type: "pie",
                                        startAngle: 45,
                                        showInLegend: "False",
                                        legendText: "{label}",
                                        indexLabel: "{label} ({y})",
                                        yValueFormatString: "#,##0.#" % "",
                                        dataPoints: [{
                                                label: "Debit/Credit Card",
                                                y: 0
                                            },
                                            {
                                                label: "Bank Transfer",
                                                y: 0
                                            },
                                            {
                                                label: "Wallet",
                                                y: 0
                                            },
                                        ]
                                    }]
                                };
                                $("#chartContainer2").CanvasJSChart(options);
                            </script> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            _fetchReportRevenueFiltering('srch-30', 'Last 30 Days', 'USD');
        });
    </script>
<?php } ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php if ($page == 'revenueBreakdown') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-graph-up-arrow"></i> REVENUE BREAKDOWN</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="field-back-div">
                <div class="field-inner-div student-result-field-inner-div">

                    <div class="content-wrapper animated fadeIn">
                        <div class="header-div">
                            <div class="title-nav-back-div">
                                <div class="nav-ul-div">
                                    <ul>
                                        <li class="active-li" title="Successful Status" id="successfulPage" onclick="_getPaymentStatusNav({divid:'successfulPage', page: 'successfulPage', id: '<?php echo $id; ?>', url: adminPortalLocalUrl});"><img src="<?php echo $websiteUrl ?>/all-images/images/tick-mark.png" alt="Successful Icon" /> SUCCESSFUL</li>
                                        <li title="Pending Status" id="pendingPage" onclick="_getPaymentStatusNav({divid:'pendingPage', page: 'pendingPage', id: '<?php echo $id; ?>', url: adminPortalLocalUrl});"><img src="<?php echo $websiteUrl ?>/all-images/images/load.png" alt="Pending Icon" /> PENDING</li>
                                        <li title="Cancel Status" id="cancelledPage" onclick="_getPaymentStatusNav({divid:'cancelledPage', page: 'cancelledPage', id: '<?php echo $id; ?>', url: adminPortalLocalUrl});"><img src="<?php echo $websiteUrl ?>/all-images/images/close.png" alt="Cancelled Icon" /></i> CANCELLED</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="content-container" id="getPaymentNav">
                            <script>
                                _getPaymentStatusNav({
                                    divid: 'successfulPage',
                                    page: 'successfulPage',
                                    id: '<?php echo $id; ?>',
                                    url: adminPortalLocalUrl
                                });
                                sessionStorage.setItem("sessionPayDate", '<?php echo $id; ?>');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ///// Success Page //// -->
<?php if ($page == 'successfulPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Successful Transactions On <span id="date"></span>
            <output style="display:none;">
                -- Total Revenue:
                <span class="balance" id="totalAmount"></span>
            </output>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>User Info</th>
                    <th>Reason For Payment</th>
                    <th>Reference</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="pageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus('4', newpayDate);
                    });
                </script>
                <tr>
                    <td colspan="20">
                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>

<!-- ///// Pending Page //// -->
<?php if ($page == 'pendingPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Pending Transactions On <span id="date"></span>
            <output style="display:none;">
                -- Total Revenue:
                <span class="balance" id="totalAmount"></span>
            </output>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>User Info</th>
                    <th>Reason For Payment</th>
                    <th>Reference</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="pageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus('3', newpayDate);
                    });
                </script>
                <tr>
                    <td colspan="20">
                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>

<!-- ///// Cancel Page //// -->
<?php if ($page == 'cancelledPage') { ?>
    <div id="revenueAlert" class="alert top-alert-div animated fadeIn">
        <div>
            <i class="bi-graph-up-arrow"></i>
            Cancelled Transactions On <span id="date"></span>
            <output style="display:none;">
                -- Total Revenue:
                <span class="balance" id="totalAmount"></span>
            </output>
        </div>

        <div class="btn-container">
            <button class="btn"><i class="bi-printer"></i> PRINT</button>
            <button class="btn"><i class="bi-file-earmark-excel"></i> EXPORT</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%">
            <thead>
                <tr class="tb-col">
                    <th>sn</th>
                    <th>User Info</th>
                    <th>Reason For Payment</th>
                    <th>Reference</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>View</th>
                    <th id="actionHeader" style="display:none;">Action</th>
                </tr>
            </thead>

            <tbody id="pageContent">
                <script>
                    $(document).ready(function() {
                        const newpayDate = "<?php echo $id; ?>";
                        _loadPaymentsByStatus('5', newpayDate);
                    });
                </script>
                <tr>
                    <td colspan="20">
                        <div class="content-loading-div">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>

<!-- ///// Payment BreakDown Form //// -->
<?php if ($page == 'paymentBreakDownForm') { ?>
    <script>
        getRevenueBreakdownSessionData = JSON.parse(sessionStorage.getItem("getRevenueBreakdownSessionData"));
    </script>

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
                <p>This section provides a complete breakdown of user transaction, including payment status, amount paid, and transaction reference.</p>
            </div>

            <!--  ////////////////////////////////////////////////////////////////////////////////-->
            <div class="form-container">
                <div class="main-content-div form-main-content">
                    <div class="tables-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-people"></i>
                                <p>User Details</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                            <div class="alert alert-success top-alert-div">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>User Id:</div>
                                            <div>
                                                <span id="userId">
                                                    <script>
                                                        $('#userId').html(getRevenueBreakdownSessionData?.userId);
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
                                                        $("#fullName").html(
                                                            getRevenueBreakdownSessionData?.userData ?
                                                            `${getRevenueBreakdownSessionData.userData.firstName} ${getRevenueBreakdownSessionData.userData.lastName}` :
                                                            ""
                                                        );
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
                                                        $("#emailAddress").html(getRevenueBreakdownSessionData?.userData?.emailAddress);
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
                                                        $("#phoneNumber").html(getRevenueBreakdownSessionData?.userData?.phoneNumber);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Wallet Balance:</div>
                                            <div>
                                                <span id="walletBalance">
                                                    <script>
                                                        $("#walletBalance").html(getRevenueBreakdownSessionData?.currency + " " +thousandSeperator(getRevenueBreakdownSessionData?.userData?.walletBalance));
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Country:</div>
                                            <div>
                                                <span id="countryName">
                                                    <script>
                                                        $("#countryName").html(getRevenueBreakdownSessionData?.userData?.countryName);
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>User Status:</div>
                                            <div>
                                                <span id="statusName">
                                                    <script>
                                                        $("#statusName").html(getRevenueBreakdownSessionData?.userData?.statusName);
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

                <script>
                    $(document).ready(function () {

                        const reasonForPayment = getRevenueBreakdownSessionData?.reasonForPayment;

                        let content = "";

                        if (reasonForPayment === 'ExamRegistration') {

                            content += `
                            <div class="main-content-div form-main-content">
                                <div class="tables-content-div">

                                    <div class="content-title">
                                        <div class="title">
                                            <i class="bi bi-people"></i>
                                            <p>Reference Details</p>
                                        </div>
                                    </div>

                                    <div class="inner-table-content">
                                        <div class="alert alert-success top-alert-div">
                                            <div class="alert-list-div">

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Registration ID:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.examRegistrationId || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Student ID:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.studentId || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Full Name:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData ?
                                                                `${getRevenueBreakdownSessionData.referenceData.firstName} ${getRevenueBreakdownSessionData.referenceData.middleName} ${getRevenueBreakdownSessionData.referenceData.lastName}` : ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Email Address:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.emailAddress || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Phone Number:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.phoneNumber || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Date of Birth:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.dob || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Exam Name:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.examData?.regTitle || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Exam Abbreviation:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.examData?.examAbbr || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Exam Date:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.examDate || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Residential Address:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.residentialAddress || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            `;

                        } else if (reasonForPayment === 'Ebook') {

                            content += `
                            <div class="main-content-div form-main-content">
                                <div class="tables-content-div">

                                    <div class="content-title">
                                        <div class="title">
                                            <i class="bi bi-people"></i>
                                            <p>Reference Details</p>
                                        </div>
                                    </div>

                                    <div class="inner-table-content">
                                        <div class="alert alert-success top-alert-div">
                                            <div class="alert-list-div">
                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Ebook ID:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.ebookId || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Exam Abbreviation:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData ?
                                                                `${getRevenueBreakdownSessionData?.referenceData?.examAbbr}` : ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Ebook Title:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.ebookTitle || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Selling Price:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.sellingPrice || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Ebook Size:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.ebookSize || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="alert-list-back-div">
                                                    <div class="alert-list">
                                                        <div>Ebook Pages:</div>
                                                        <div>
                                                            <span>
                                                                ${getRevenueBreakdownSessionData?.referenceData?.ebookPages || ""}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            `;
                        }
                        $('#contentData').html(content);
                    });
                </script>

                <div id="contentData"></div>

                <div class="main-content-div form-main-content">
                    <div class="tables-content-div">
                        <div class="content-title">
                            <div class="title">
                                <i class="bi bi-credit-card"></i>
                                <p>Transaction Details</p>
                            </div>
                        </div>

                        <div class="inner-table-content">
                            <div class="alert alert-success form-alert">
                                <div class="alert-list-div">
                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Transaction Id:</div>
                                            <div>
                                                <span id="transactionId">
                                                    <script>
                                                        $('#transactionId').html(getRevenueBreakdownSessionData?.transactionId);
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
                                                        $("#transactionTypeName").html(getRevenueBreakdownSessionData?.transactionTypeData?.transactionTypeName);
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
                                                        $("#paymentMethodName").html(getRevenueBreakdownSessionData?.paymentMethodData?.paymentMethodName);
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
                                                        $("#amount").html(getRevenueBreakdownSessionData?.currency + " " + thousandSeparator(getRevenueBreakdownSessionData?.amount));
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
                                                        $("#balanceBefore").html(getRevenueBreakdownSessionData?.currency + " " + thousandSeparator(getRevenueBreakdownSessionData?.balanceBefore));
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
                                                        $("#balanceAfter").html(getRevenueBreakdownSessionData?.currency + " " + thousandSeparator(getRevenueBreakdownSessionData?.balanceAfter));
                                                    </script>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert-list-back-div">
                                        <div class="alert-list">
                                            <div>Status:</div>
                                            <div>
                                                <span id="transStatusName">
                                                    <script>
                                                        $("#transStatusName").html(getRevenueBreakdownSessionData?.statusData?.statusName);
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
                                                        $("#createdTime").html(getRevenueBreakdownSessionData?.payDate);
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
        </div>
    </section>
<?php } ?>