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
                        <li title="Registered Exams" id="registeredExams" onclick="_getActiveStudentPage({divid:'registeredExams', page: 'registeredExams', url: adminPortalLocalUrl});"><i class="bi-journal"></i> Registered Exams</li>
                        <li title="Transactions" id="Transactions" onclick="_getActiveStudentPage({divid:'Transactions', page: 'Transactions', url: adminPortalLocalUrl});"><i class="bi-credit-card"></i> Transactions</li>
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

    <div class="main-content-div student-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-journal"></i>
                    <p>Registered Exams</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="exams-back-div" id="">
                    <div class="exam-div country-exam-div">
                        <div class="exam-image">
                            <img src="<?php echo $websiteUrl ?>/uploaded_files/examLogo/EXAM00220250820092008_202509020116_gmat-exam-nigeria.jpg" alt="GMAT Exam" />
                        </div>

                        <div class="top-div">
                            <div class="exam-status ACTIVE">ACTIVE</div>
                        </div>

                        <div class="exam-info">
                            <h3>GMAT</h3>
                            <p>Graduate Management Admission Test</p>
                            <div class="exam-time">
                                <p><i class="bi bi-calendar"></i> <strong>2025-05-05</strong></p>
                            </div>
                        </div>
                        <button class="btn" title="View Details" onclick="">
                            <i class="bi bi-eye"></i> View Details
                        </button>
                    </div>

                    <div class="exam-div country-exam-div">
                        <div class="exam-image">
                            <img src="<?php echo $websiteUrl ?>/uploaded_files/examLogo/EXAM00220250820092008_202509020116_gmat-exam-nigeria.jpg" alt="GMAT Exam" />
                        </div>

                        <div class="top-div">
                            <div class="exam-status ACTIVE">ACTIVE</div>
                        </div>

                        <div class="exam-info">
                            <h3>GMAT</h3>
                            <p>Graduate Management Admission Test</p>
                            <div class="exam-time">
                                <p><i class="bi bi-calendar"></i> <strong>2025-05-05</strong></p>
                            </div>
                        </div>
                        <button class="btn" title="View Details" onclick="">
                            <i class="bi bi-eye"></i> View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'registeredExams') { ?>
    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-journal"></i>
                    <p>Registered Exams</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="exams-back-div" id="">
                    <div class="exam-div country-exam-div">
                        <div class="exam-image">
                            <img src="<?php echo $websiteUrl ?>/uploaded_files/examLogo/EXAM00220250820092008_202509020116_gmat-exam-nigeria.jpg" alt="GMAT Exam" />
                        </div>

                        <div class="top-div">
                            <div class="exam-status ACTIVE">ACTIVE</div>
                        </div>

                        <div class="exam-info">
                            <h3>GMAT</h3>
                            <p>Graduate Management Admission Test</p>
                            <div class="exam-time">
                                <p><i class="bi bi-calendar"></i> <strong>2025-05-05</strong></p>
                            </div>
                        </div>
                        <button class="btn" title="View Details" onclick="">
                            <i class="bi bi-eye"></i> View Details
                        </button>
                    </div>

                    <div class="exam-div country-exam-div">
                        <div class="exam-image">
                            <img src="<?php echo $websiteUrl ?>/uploaded_files/examLogo/EXAM00220250820092008_202509020116_gmat-exam-nigeria.jpg" alt="GMAT Exam" />
                        </div>

                        <div class="top-div">
                            <div class="exam-status ACTIVE">ACTIVE</div>
                        </div>

                        <div class="exam-info">
                            <h3>GMAT</h3>
                            <p>Graduate Management Admission Test</p>
                            <div class="exam-time">
                                <p><i class="bi bi-calendar"></i> <strong>2025-05-05</strong></p>
                            </div>
                        </div>
                        <button class="btn" title="View Details" onclick="">
                            <i class="bi bi-eye"></i> View Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'Transactions') { ?>
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

    <div class="main-content-div student-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-credit-card"></i>
                    <p>Transaction History</p>
                </div>
            </div>

            <div class="inner-table-content">
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
                        <tbody>
                            <tr class="tb-row">
                                <td>1</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>CREDIT</td>
                                <td>CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                                <td><button class="btn view-btn" title="CLICK TO VIEW DETAILS" onclick="">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>2</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>CREDIT</td>
                                <td>CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                                <td><button class="btn view-btn" title="CLICK TO VIEW DETAILS" onclick="">VIEW</button></td>
                            </tr>

                            <tr class="tb-row">
                                <td>3</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>CREDIT</td>
                                <td>CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                                <td><button class="btn view-btn" title="CLICK TO VIEW DETAILS" onclick="">VIEW</button></td>
                            </tr>
                            <tr class="tb-row">
                                <td>4</td>
                                <td>2025-02-14 17:03:46</td>
                                <td><span title="Click to view payment details" onclick="">TANS00964620250203090426</span></td>
                                <td><span>₦60,000.00</span></td>
                                <td>CREDIT</td>
                                <td>CREDIT CARD</td>
                                <td>
                                    <div class="status-div SUCCESS">SUCCESS</div>
                                </td>
                                <td><button class="btn view-btn" title="CLICK TO VIEW DETAILS" onclick="">VIEW</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div id="transactionPaginationControls" class="pagination-div"></div>
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

            <div class="text_field_container col-1" id="lastName_container">
                <script>
                    textField({
                        id: 'lastName',
                        title: 'Last Name'
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

            <div class="text_field_container col-1" id="emailAddress_container">
                <script>
                    textField({
                        id: 'emailAddress',
                        title: 'Email Address',
                        type: 'email'
                    });
                </script>
            </div>

            <div class="text_field_container col-2" id="address_container">
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