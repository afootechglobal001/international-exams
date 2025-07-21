<?php if ($page == 'editPageForm') { ?>
    <div class="pages-creation-panel">
        <div class="side-bar">
            <div class="div-in">
                <?php include 'page-summary.php' ?>
            </div>
        </div>

        <div class="pages-content-div">
            <div class="title-div">
                <ul>
                    <?php if ($pageCatId == 'internationalExamCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                        <li title="ADD EXAM KEY INFO" id="picturePage" onclick="">ADD EXAM KEY INFO</li>
                        <li title="ADD SCORE RANGE" id="picturePage" onclick="">ADD SCORE RANGE</li>
                        <li title="FAQS" id="picturePage" onclick="">FAQS</li>
                        <li title="PAYMENT & PRICING" id="picturePage" onclick="">PAYMENT & PRICING</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'studyAbroadCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'blogCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'galleryCategory') { ?>
                        <li class="active-li" title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                </ul>
                <button class="close-btn" onclick="_alertClose(<?php echo $modalLayer ?>);" title="Close"><i class="bi-x-lg"></i></button>
            </div>

            <div class="pages-back-div">
                <div id="getPagesDetails">
                    <?php
                    if ($pageCatId == 'galleryCategory') {
                        $page = 'picturePage';
                    } else {
                        $page = 'pageContent';
                    }
                    include 'page-details.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php if ($page == 'staffReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW STAFF</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD A NEW STAFF</span>
                    </div>
                </div>

                <div class="text_field_container" id="titleId_container">
                    <script>
                        selectField({
                            id: 'titleId',
                            title: 'Select Title'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="firstName_container">
                    <script>
                        textField({
                            id: 'firstName',
                            title: 'First Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="middleName_container">
                    <script>
                        textField({
                            id: 'middleName',
                            title: 'Middle Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="lastName_container">
                    <script>
                        textField({
                            id: 'lastName',
                            title: 'Last Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="emailAddress_container">
                    <script>
                        textField({
                            id: 'emailAddress',
                            title: 'Email Address',
                            type: 'email'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="mobileNumber_container">
                    <script>
                        textField({
                            id: 'mobileNumber',
                            title: 'Phone Number',
                            type: 'tel',
                            onKeyPressFunction: 'isNumberCheck(event);'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="genderId_container">
                    <script>
                        selectField({
                            id: 'genderId',
                            title: 'Select Gender'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="dateOfBirth_container">
                    <script>
                        textField({
                            id: 'dateOfBirth',
                            title: 'Date Of Birth',
                            type: 'date'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="address_container">
                    <script>
                        textField({
                            id: 'address',
                            title: 'Home Address'
                        });
                    </script>
                </div>

                <div class="alert alert-success form-alert">
                    <span>ADMINISTRATIVE INFORMATION</span>
                    <div class="text_field_back_container">
                        <div class="text_field_container" id="roleId_container">
                            <script>
                                selectField({
                                    id: 'roleId',
                                    title: 'Select Role'
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
                    </div>
                </div>

                <div>
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i>
                        SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'staffProfile') { ?>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-person-check-fill"></i> STAFF PROFILE</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <label>
                        <div class="img-div" onClick="" id="cam-pix">
                            <img src="<?php echo $websiteUrl ?>/all-images/images/avatar.jpg" alt="Profile Image">
                        </div>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="fullName">Hon. Paul Emmanuel</div>

                                <div class="text">
                                    <div>
                                        <div id="statusBtn" class="status-btn ACTIVE"><span>ACTIVE</span></div>
                                    </div>
                                    | LAST LOGIN DATE:
                                    <strong id="lastLoginTime">00-00-00 00:00:00</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div" id="get_staff_details">
                    <div class="user-in">
                        <div class="title">STAFF BASIC INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateTitleId_container">
                                <script>
                                    selectField({
                                        id: 'updateTitleId',
                                        title: 'Select Title'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateFirstName_container">
                                <script>
                                    textField({
                                        id: 'updateFirstName',
                                        title: 'First Name'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateMiddleName_container">
                                <script>
                                    textField({
                                        id: 'updateMiddleName',
                                        title: 'Middle Name'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateLastName_container">
                                <script>
                                    textField({
                                        id: 'updateLastName',
                                        title: 'Last Name'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateMobileNumber_container">
                                <script>
                                    textField({
                                        id: 'updateMobileNumber',
                                        title: 'Phone Number',
                                        type: 'tel'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateEmailAddress_container">
                                <script>
                                    textField({
                                        id: 'updateEmailAddress',
                                        title: 'Email Address',
                                        type: 'email'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateGenderId_container">
                                <script>
                                    selectField({
                                        id: 'updateGenderId',
                                        title: 'Select Gender'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateDateOfBirth_container">
                                <script>
                                    textField({
                                        id: 'updateDateOfBirth',
                                        title: 'Date Of Birth',
                                        type: 'date',
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">STAFF RESIDENT INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="stateId_container">
                                <script>
                                    selectField({
                                        id: 'stateId',
                                        title: 'Select Branch State'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="lgaId_container">
                                <script>
                                    selectField({
                                        id: 'lgaId',
                                        title: 'Select Branch Local Govt Area'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-2" id="updateAddress_container">
                                <script>
                                    textField({
                                        id: 'updateAddress',
                                        title: 'Home Address'
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">STAFF ACCOUNT INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-3" id="staffId_container">
                                <script>
                                    textField({
                                        id: 'staffId',
                                        title: 'Staff ID',
                                        readonly: true
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-3" id="createdTime_container">
                                <script>
                                    textField({
                                        id: 'createdTime',
                                        title: 'Date Of Registration',
                                        readonly: true
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-3" id="lastLogin_container">
                                <script>
                                    textField({
                                        id: 'lastLogin',
                                        title: 'Last Login Date',
                                        readonly: true
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">ADMINISTRATIVE INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateRoleId_container">
                                <script>
                                    selectField({
                                        id: 'updateRoleId',
                                        title: 'Select Role'
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateStatusId_container">
                                <script>
                                    selectField({
                                        id: 'updateStatusId',
                                        title: 'Select Status'
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="btn-div" id="staffBtn">
                            <button class="btn" title="UPDATE PROFILE" id="updateBtn" onclick="_updateStaff();"> UPDATE PROFILE <i class="bi-check"></i></button>
                        </div>
                    </div>
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
                <div class="close" title="Close" onclick="_alertClose();">X</div>
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

<!-- For Customers Modal Pages -->
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

            <div class="text_field_container col-1" id="email_container">
                <script>
                    textField({
                        id: 'email',
                        title: 'Email Address',
                        type: 'email'
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

<?php if ($page == 'internationalExamReg') { ?>
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

                <div class="text_field_container" id="abbreviation_container">
                    <script>
                        textField({
                            id: 'abbreviation',
                            title: 'Exam Abbreviation',
                        });
                    </script>
                </div>

                <div class="text_field_container" id="examtTitle_container">
                    <script>
                        textField({
                            id: 'examtTitle',
                            title: 'Exam Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD EXAM PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="blog_preview_pix" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="reg_thumbnail" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

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

<?php if ($page == 'studyAbroadReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW STUDY ABROAD</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW STUDY ABROAD</span></div>
                </div>

                <div class="text_field_container" id="examtTitle_container">
                    <script>
                        textField({
                            id: 'examtTitle',
                            title: 'Study Abroad Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD STUDY ABROAD PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="blog_preview_pix" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="reg_thumbnail" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

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

<?php if ($page == 'blogReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW BLOG</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW BLOG</span></div>
                </div>

                <div class="text_field_container" id="blogCat_container">
                    <script>
                        selectField({
                            id: 'blogCat',
                            title: 'Select Blog Category'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="blogTitle_container">
                    <script>
                        textField({
                            id: 'blogTitle',
                            title: 'Blog Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD BLOG PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="blog_preview_pix" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="reg_thumbnail" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

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

<?php if ($page == 'galleryReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW GALLERY</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW GALLERY</span></div>
                </div>

                <div class="text_field_container" id="blogCat_container">
                    <script>
                        textField({
                            id: 'blogCat',
                            title: 'Gallery Title'
                        });
                    </script>
                </div>

                <div class="title">UPLOAD GALLERY PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                <label>
                    <div class="pix-div">
                        <img id="blog_preview_pix" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                        <input type="file" id="reg_thumbnail" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="blogPixPreview.UpdatePreview(this);" />
                    </div>
                </label>

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

<?php if ($page == 'faqReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW FAQ</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD NEW FAQ</span></div>
                </div>

                <div class="text_field_container" id="faqCat_container">
                    <script>
                        selectField({
                            id: 'faqCat',
                            title: 'Slect Faq Category'
                        });
                    </script>
                </div>

                <div class="title">FAQ ANSWER</div>
                <script src="js/TextEditor.js" referrerpolicy="origin"></script>
                <script>
                    tinymce.init({
                        selector: '#faq_answer', // change this value according to your HTML
                        plugins: "link, image, table"
                    });
                </script>
                <div style="margin-bottom: 10px;">
                    <textarea class="text_field" style="width:100%;" rows="5" id="faq_answer" title="TYPE FULL PAGE CONTENT HERE" type="text" maxlength="167" id="" placeholder=""></textarea>
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

<?php if ($page == 'updateTestimony') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> UPDATE TESTIMONY</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> UPDATE TESTIMONY</span></div>
                </div>

                <div class="text_field_container" id="fullName_container">
                    <script>
                        textField({
                            id: 'fullName',
                            title: 'Full Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="emailAddress_container">
                    <script>
                        textField({
                            id: 'emailAddress',
                            title: 'Email Address'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="phoneNumber_container">
                    <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Phone Number'
                        });
                    </script>
                </div>

                <div class="text_area_container" id="testimony_container">
                    <script>
                        textField({
                            id: 'testimony',
                            title: 'Testimony',
                            type: 'textarea'
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

<?php if ($page == 'changePassword') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-shield-lock"></i> CHANGE PASSWORD</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to change your <span>PASSWORD</span></div>
                </div>

                <div class="text_field_container" id="oldPassword_container">
                    <script>
                        textField({
                            id: 'oldPassword',
                            title: 'Enter Your Old Password',
                            type: 'password'
                        });
                    </script>
                </div>

                <div class="pswd_info" style="color:#8c8d8d"><em>At least 8 charaters required including upper & lower cases and special characters and numbers.</em></div>

                <div class="text_field_container" id="newPassword_container">
                    <script>
                        textField({
                            id: 'newPassword',
                            title: 'Create New Password',
                            type: 'password'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="cnewPassword_container">
                    <script>
                        textField({
                            id: 'cnewPassword',
                            title: 'Confirm New Password',
                            type: 'password'
                        });
                    </script>
                </div>

                <div>
                    <button class="btn" title="CHANGE PASSWORD" id="submitBtn" onclick="_changePassword();"> <i class="bi-check"></i> CHANGE PASSWORD </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'accountSettings') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-gear"></i> ACCOUNT INFORMATIONS</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to update your <span>ACCOUNT INFORMATIONS</span></div>
                </div>

                <div class="alert alert-success form-alert">
                    <span>SMTP INFORMATIONS</span>
                    <div class="text_field_back_container">
                        <div class="text_field_container" id="senderName_container">
                            <script>
                                textField({
                                    id: 'senderName',
                                    title: 'SENDER NAME'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpHost_container">
                            <script>
                                textField({
                                    id: 'smtpHost',
                                    title: 'SMTP HOST',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpUserName_container">
                            <script>
                                textField({
                                    id: 'smtpUserName',
                                    title: 'SMTP USERNAME',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpPassword_container">
                            <script>
                                textField({
                                    id: 'smtpPassword',
                                    title: 'SMTP PASSWORD',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="smtpPort_container">
                            <script>
                                textField({
                                    id: 'smtpPort',
                                    title: 'SMTP PORT',
                                    type: 'number'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="supportEmail_container">
                            <script>
                                textField({
                                    id: 'supportEmail',
                                    title: 'SUPPORT EMAIL',
                                    type: 'email'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="payKey_container">
                            <script>
                                textField({
                                    id: 'payKey',
                                    title: 'PAYSTACK PAYMENT KEY'
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick=""> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'alertRead') { ?>
    <div class="slide-form-div animated fadeInRight">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-bell"></i> Notification Details</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div class="alert alert-success form-alert">
                    <div class="alert-list-div">
                        <div class="alert-list">
                            <div>User ID:</div>
                            <div><span id="read_user_id">STF0001</span></div>
                        </div>
                        <div class="alert-list">
                            <div>Action Performed By:</div>
                            <div><span id="user_name">Hon Emmanuel Paul</span></div>
                        </div>
                        <div class="alert-list">
                            <div>IP Address Used:</div>
                            <div><span id="ip_address">::1</span></div>
                        </div>
                        <div class="alert-list">
                            <div>Computer Used:</div>
                            <div><span id="system_name">DESKTOP-GFL284C</span></div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success form-alert">
                    <div class="alert-list-div">
                        <div class="alert-list">
                            <div>Alert ID:</div>
                            <div><span id="alert_id">ALT10520250612070125</span></div>
                        </div>
                        <div class="alert-list">
                            <div>Date:</div>
                            <div><span id="created_time">2025-06-12 13:01:25</span></div>
                        </div>
                    </div>
                </div>

                <div class="title">Alert Details:</div>
                <div class="alert alert-success form-alert">
                    <div class="alert-details" id="alert_detail">PASSWORD UPDATED SUCCESSFULLY: A staff whose name is HON EMMANUEL PAUL with ID: STF0001 have successfully reset his/her password.</div>
                </div>
                <div>
                    <button class="btn" onclick="_alertClose(<?php echo $modalLayer ?>);"> <i class="bi-check"></i> OK </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'logoutConfirmForm') { ?>
    <div class="caption-success-div animated zoomIn">
        <div class="div-in">
            <div class="img"><img src="<?php echo $websiteUrl ?>/all-images/images/warning.gif" /></div>
            <h2>Are you sure to log-out?</h2>
            Please, confirm your log-out action.
            <div class="btn-div">
                <button class="btn" onclick="location.href='<?php echo $websiteUrl ?>/admin'">YES</button>
                <button class="btn no-btn" onclick="_alertClose(<?php echo $modalLayer ?>);">NO</button>
            </div>
        </div>
    </div>
<?php } ?>