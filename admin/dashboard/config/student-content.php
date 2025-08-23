<?php if ($page == 'branchCountryStudent') { ?>
    <div class="main-content-div student-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-mortarboard"></i>
                    <p>Students</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                        <thead>
                            <tr class="tb-col">
                                <th>sn</th>
                                <th>User Name</th>
                                <th>Contact</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_getForm({page: 'studentProfile', layer: 2, url: adminPortalLocalUrl});">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Paul Emmanuel" />
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">Paul Emmanuel</div>
                                            <div class="second-class">STUDENT001239485959</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>seunemmanuel107@gmail.com</div>
                                        <div>07050903886</div>
                                    </div>
                                </td>
                                <td>00-00-00 00:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn" title="Click to view staff profile" onclick="_getForm({page: 'studentProfile', url: adminPortalLocalUrl});">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Paul Emmanuel" />
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">Paul Emmanuel</div>
                                            <div class="second-class">STUDENT001239485959</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>seunemmanuel107@gmail.com</div>
                                        <div>07050903886</div>
                                    </div>
                                </td>
                                <td>00-00-00 00:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>3</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Paul Emmanuel" />
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">Paul Emmanuel</div>
                                            <div class="second-class">STUDENT001239485959</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>seunemmanuel107@gmail.com</div>
                                        <div>07050903886</div>
                                    </div>
                                </td>
                                <td>00-00-00 00:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>4</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Paul Emmanuel" />
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">Paul Emmanuel</div>
                                            <div class="second-class">STUDENT001239485959</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>seunemmanuel107@gmail.com</div>
                                        <div>07050903886</div>
                                    </div>
                                </td>
                                <td>00-00-00 00:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>5</td>
                                <td class="clickable-td" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">
                                    <div class="text-back-div">
                                        <div class="image-div">
                                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Paul Emmanuel" />
                                        </div>

                                        <div class="text-div">
                                            <div class="first-class">Paul Emmanuel</div>
                                            <div class="second-class">STUDENT001239485959</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-div">
                                        <div>seunemmanuel107@gmail.com</div>
                                        <div>07050903886</div>
                                    </div>
                                </td>
                                <td>00-00-00 00:00:00</td>
                                <td>
                                    <div class="status-div ACTIVE">ACTIVE</div>
                                </td>
                                <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
<?php } ?>

<?php if ($page == 'studentProfile') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-person-check-fill"></i> USER PROFILE</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <label>
                        <div class="img-div" id="current_user_passport1">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="staff_login_fullname">HON. EMMANUEL PAUL</div>
                                <div class="text">
                                    <div>
                                        <div class="status-btn ACTIVE"><span>ACTIVE</span></div>
                                    </div>
                                    | LAST LOGIN DATE: <strong id="last_login_time">2024-11-18 03:28:41</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div">
                <div class="div-in">
                    <ul>
                        <li class="active" title="Dashboard" id="studentDashboard" onclick="_getActiveStudentPage({divid:'studentDashboard', page: 'studentDashboard', url: adminPortalLocalUrl});"><i class="bi-speedometer2"></i> Dashboard</li>
                        <li title="Payment History" id="paymentHistory" onclick="_getActiveStudentPage({divid:'paymentHistory', page: 'paymentHistory', url: adminPortalLocalUrl});"><i class="bi-clock"></i> Payment History</li>
                        <li title="Wallet History" id="walletHistory" onclick="_getActiveStudentPage({divid:'walletHistory', page: 'walletHistory', url: adminPortalLocalUrl});"><i class="bi-credit-card"></i> Wallet History</li>
                        <li title="Student Profile" id="studentProfileDetails" onclick="_getActiveStudentPage({divid:'studentProfileDetails', page: 'studentProfileDetails', url: adminPortalLocalUrl});"><i class="bi-person-bounding-box"></i> Student Profile</li>
                    </ul>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div" id="getStudentDetails">
                    <script>
                        _getActiveStudentPage({
                            divid: 'studentDashboard',
                            page: 'studentDashboard',
                            url: adminPortalLocalUrl
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- For Student Modal Pages -->
<?php if ($page == 'studentDashboard') { ?>
    <div class="user-dashboard-list-wrapper">
        <div class="dashboard-list-div">
            <div class="inner-div">
                <div class="top-container">
                    <div class="top-title">
                        <h3>WALLET BALANCE</h3>
                    </div>
                    <button class="btn" title="Load Wallet" onclick="_getForm('load_user_wallet');"><i class="bi-credit-card"></i> Load Wallet</button>
                </div>

                <div class="wallet-details-wrapper">
                    <div class="wallet-details">
                        <h3>NGN 640,000.00</h3>
                        <h4>TOTAL AMOUNT RECEIVED</h4>
                    </div>

                    <div class="wallet-details">
                        <h3>NGN 466,484.92</h3>
                        <h4>TOTAL AMOUNT SPENT</h4>
                    </div>

                    <div class="wallet-details border-none">
                        <h3>NGN 173,515.08</h3>
                        <h4>AVAILABLE BALANCE</h4>
                    </div>
                </div>

                <div class="top-container">
                    <div class="top-title">
                        <h3>WALLET ACTIVITIES</h3>
                    </div>
                </div>

                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%" id="fetchAllHosting">
                        <thead>
                            <tr class="tb-col">
                                <th>Sn</th>
                                <th>Date</th>
                                <th>Trans ID</th>
                                <th>Balance Before</th>
                                <th>(₦)Amount Loaded</th>
                                <th>Balance After</th>
                                <th>Trans Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td>2025-02-12 17:03:46</td>
                                <td>TRC23220250213</td>
                                <td><span>NGN 10,000.00</span></td>
                                <td>NGN 5,000.00</td>
                                <td><span>NGN 15,000.00</span></td>
                                <td>CREDIT</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td>2025-02-12 17:03:46</td>
                                <td>TRC23220250233</td>
                                <td><span>NGN 0.00</span></td>
                                <td><span class="CANCELLED">NGN 5,000.00</span></td>
                                <td><span>NGN 0.00</span></td>
                                <td>CREDIT</td>
                                <td>
                                    <div class="status-div CANCELLED">CANCELLED</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="dashboard-list-div">
            <div class="inner-div">
                <div class="top-container">
                    <div class="top-title">
                        <h3>RECENT PAYMENT HISTORY</h3>
                    </div>
                </div>

                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%" id="fetchAllHosting">
                        <thead>
                            <tr class="tb-col">
                                <th>Sn</th>
                                <th>Date</th>
                                <th>Trans ID</th>
                                <th>(₦)Amount</th>
                                <th>References</th>
                                <th>Payment Purpose</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>REF200001000</td>
                                <td>EXAM</td>
                                <td>DEBIT/CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>REF200001000</td>
                                <td>VIDEO SUBSCRIPTION</td>
                                <td>DEBIT/CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                            </tr>

                            <tr class="tb-row">
                                <td>3</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>REF200001000</td>
                                <td>EXAM</td>
                                <td>DEBIT/CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                            </tr>
                            <tr class="tb-row">
                                <td>4</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>REF200001000</td>
                                <td>VIDEO SUBSCRIPTION</td>
                                <td>DEBIT/CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'studentProfileDetails') { ?>
    <div class="user-in">
        <div class="title">STUDENT BASIC INFORMATION</div>

        <div class="profile-segment-div">
            <div class="text_field_container col-1" id="fullName_container">
                <script>
                    textField({
                        id: 'fullName',
                        title: 'First Name'
                    });
                </script>
            </div>


            <div class="text_field_container col-1" id="phoneNumber_container">
                <script>
                    textField({
                        id: 'phoneNumber',
                        title: 'Phone Number',
                        type: 'tel'
                    });
                </script>
            </div>

            <div class="text_field_container col-1" id="address_container">
                <script>
                    selectField({
                        id: 'address',
                        title: 'Select Country',
                        readonly: true,
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="user-in">
        <div class="title">STUDENT ACCOUNT INFORMATION</div>

        <div class="profile-segment-div">
            <div class="text_field_container col-1" id="customerId_container">
                <script>
                    textField({
                        id: 'customerId',
                        title: 'Student ID',
                        readonly: true,
                    });
                </script>
            </div>

            <div class="text_field_container col-1" id="createdTime_container">
                <script>
                    textField({
                        id: 'createdTime',
                        title: 'Date Of Registration',
                        readonly: true,
                    });
                </script>
            </div>

            <div class="text_field_container col-1" id="lastLogin_container">
                <script>
                    textField({
                        id: 'lastLogin',
                        title: 'Last Login Date',
                        readonly: true,
                    });
                </script>
            </div>

            <div class="text_field_container col-1" id="searchStatus_container">
                <script>
                    selectField({
                        id: 'searchStatus',
                        title: 'Select Status'
                    });
                    _getSelectStatus('searchStatus');
                </script>
            </div>
        </div>

        <div class="btn-div">
            <button class="btn" type="button" title="UPDATE PROFILE" id="update_btn" onclick=""> UPDATE PROFILE <i class="bi-check"></i></button>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'paymentHistory') { ?>
    <div class="chart-div-notifications user-details-notf">
        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Order History for </div>

        <div class="text text-right" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>
            <div class="icon-div"><i class="bi-caret-down"></i></div>

            <div class="srch-select alert-srch-select">
                <div id="srch-today" onclick="_getAlertReport('srch-today', 'view_today_search');">Today</div>
                <div id="srch-week" onclick="_getAlertReport('srch-week', 'view_thisweek_search');">This Week</div>
                <div id="srch-7" onclick="_getAlertReport('srch-7', 'view_7days_search');">Last 7 Days</div>
                <div id="srch-month" onclick="_getAlertReport('srch-month', 'view_thismonth_search');">This Month</div>
                <div id="srch-30" onclick="_getAlertReport('srch-30', 'view_30days_search');">Last 30 Days</div>
                <div id="srch-90" onclick="_getAlertReport('srch-90', 'view_90days_search');">Last 90 Days</div>
                <div id="srch-year" onclick="_getAlertReport('srch-year', 'view_thisyear_search');">This Year</div>
                <div id="srch-1year" onclick="_getAlertReport('srch-1year', 'view_1year_search');">Last 1 Year</div>
                <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
        </div>

        <div class="text">
            <div class="custom-srch-div">
                <div class="custom-srch-div-in">
                    <div class="text_field_container dash_field_container">
                        <input class="text_field dash_text_field bar_cust_text_field" type="text" id="datepickers-from" placeholder="" />
                        <div class="placeholder dash_placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From</div>
                    </div>

                    <div class="text_field_container dash_field_container">
                        <input class="text_field dash_text_field bar_cust_text_field" type="text" id="datepickers-to" placeholder="" />
                        <div class="placeholder dash_placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To</div>
                    </div>
                    <button type="button" class="btn">Apply</button>
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

    <div class="table-div pages-table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%" id="fetchAllHosting">
            <thead>
                <tr class="tb-col">
                    <th>Sn</th>
                    <th>Date</th>
                    <th>Trans ID</th>
                    <th>(₦)Amount</th>
                    <th>References</th>
                    <th>Payment Purpose</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                </tr>
            </thead>

            <tbody>
                <tr class="tb-row">
                    <td>1</td>
                    <td>2025-02-14 17:03:46</td>
                    <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                    <td><span>₦60,000.00</span></td>
                    <td>REF200001000</td>
                    <td>EXAM</td>
                    <td>DEBIT/CREDIT CARD</td>
                    <td>
                        <div class="status-div SUCCESS">SUCCESS</div>
                    </td>
                </tr>

                <tr class="tb-row">
                    <td>2</td>
                    <td>2025-02-14 17:03:46</td>
                    <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                    <td><span>₦60,000.00</span></td>
                    <td>REF200001000</td>
                    <td>VIDEO SUBSCRIPTION</td>
                    <td>DEBIT/CREDIT CARD</td>
                    <td>
                        <div class="status-div SUCCESS">SUCCESS</div>
                    </td>
                </tr>

                <tr class="tb-row">
                    <td>3</td>
                    <td>2025-02-14 17:03:46</td>
                    <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                    <td><span>₦60,000.00</span></td>
                    <td>REF200001000</td>
                    <td>EXAM</td>
                    <td>DEBIT/CREDIT CARD</td>
                    <td>
                        <div class="status-div SUCCESS">SUCCESS</div>
                    </td>
                </tr>
                <tr class="tb-row">
                    <td>4</td>
                    <td>2025-02-14 17:03:46</td>
                    <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                    <td><span>₦60,000.00</span></td>
                    <td>REF200001000</td>
                    <td>VIDEO SUBSCRIPTION</td>
                    <td>DEBIT/CREDIT CARD</td>
                    <td>
                        <div class="status-div SUCCESS">SUCCESS</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>

<?php if ($page == 'walletHistory') { ?>
    <div class="chart-div-notifications user-details-notf">
        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Wallet History for </div>

        <div class="text text-right" onclick="select_search()">
            <span id="srch-text">Last 30 Days</span>
            <div class="icon-div"><i class="bi-caret-down"></i></div>

            <div class="srch-select alert-srch-select">
                <div id="srch-today" onclick="_getAlertReport('srch-today', 'view_today_search');">Today</div>
                <div id="srch-week" onclick="_getAlertReport('srch-week', 'view_thisweek_search');">This Week</div>
                <div id="srch-7" onclick="_getAlertReport('srch-7', 'view_7days_search');">Last 7 Days</div>
                <div id="srch-month" onclick="_getAlertReport('srch-month', 'view_thismonth_search');">This Month</div>
                <div id="srch-30" onclick="_getAlertReport('srch-30', 'view_30days_search');">Last 30 Days</div>
                <div id="srch-90" onclick="_getAlertReport('srch-90', 'view_90days_search');">Last 90 Days</div>
                <div id="srch-year" onclick="_getAlertReport('srch-year', 'view_thisyear_search');">This Year</div>
                <div id="srch-1year" onclick="_getAlertReport('srch-1year', 'view_1year_search');">Last 1 Year</div>
                <div onclick="srch_custom('Custom Search')">Custom Search</div>
            </div>
        </div>

        <div class="text">
            <div class="custom-srch-div">
                <div class="custom-srch-div-in">
                    <div class="text_field_container dash_field_container">
                        <input class="text_field dash_text_field bar_cust_text_field" type="text" id="datepickers-from" placeholder="" />
                        <div class="placeholder dash_placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From</div>
                    </div>

                    <div class="text_field_container dash_field_container">
                        <input class="text_field dash_text_field bar_cust_text_field" type="text" id="datepickers-to" placeholder="" />
                        <div class="placeholder dash_placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To</div>
                    </div>
                    <button type="button" class="btn">Apply</button>
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

    <div class="table-div pages-table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%" id="">
            <thead>
                <tr class="tb-col">
                    <th>Date</th>
                    <th>Trans ID</th>
                    <th>Balance Before</th>
                    <th>(₦)Amount Loaded</th>
                    <th>Balance After</th>
                    <th>Trans Type</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr class="tb-row">
                    <td>2025-02-12 17:03:46</td>
                    <td>TRC23220250213</td>
                    <td><span>NGN 10,000.00</span></td>
                    <td>NGN 5,000.00</td>
                    <td><span>NGN 15,000.00</span></td>
                    <td>CREDIT</td>
                    <td>
                        <div class="status-div SUCCESS">SUCCESS</div>
                    </td>
                </tr>

                <tr class="tb-row">
                    <td>2025-02-12 17:03:46</td>
                    <td>TRC23220250233</td>
                    <td><span>NGN 0.00</span></td>
                    <td><span class="CANCELLED">NGN 5,000.00</span></td>
                    <td><span>NGN 0.00</span></td>
                    <td>CREDIT</td>
                    <td>
                        <div class="status-div CANCELLED">CANCELLED</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>