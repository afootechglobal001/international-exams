<?php if ($page == 'viewBranch') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-diagram-3"></i> <strong>BRANCHES</strong></div>
            <div class="bottom-title">
                Active: <span id="active-country">10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search country..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search country...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pages-back-div">
        <div class="table-div animated fadeIn">
            <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                <script>_fetchCountryData();</script>
            </table>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'branchCountry') { ?>
    <script> getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));</script>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-diagram-3"></i> COUNTRY PROFILE</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <div class="img-div">
                        <img id="" src="<?php echo $websiteUrl ?>/all-images/images/icon.png" alt="Profile Image">
                    </div>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name">INTERNATIONAL EXAM (<span id="countryName"></span>)
                                    <script>
                                        $("#countryName").html(getEachCountrySession?.countryName);
                                    </script>
                                </div>


                                <div class="text">
                                    <div>
                                        <div id="statusBtn" class="status-btn"><span id="statusName"></span></div>
                                    </div>
                                    | OFFICIAL EMAIL:
                                    <strong id="officialEmailAddress"><script>
                                        $("#officialEmailAddress").html(getEachCountrySession?.email);
                                    </script></strong>

                                    | OFFICIAL NUMBER:
                                    <strong id="officialPhoneNumber"><script>
                                        $("#officialPhoneNumber").html(getEachCountrySession?.phoneNumber);
                                    </script></strong>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        const statusName = getEachCountrySession.statusName;
                                        $("#statusName").html(statusName);
                                        $("#statusBtn").addClass(statusName);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-div branch-btn-div">
                <div class="div-in">
                    <ul>
                        <li class="active" title="Dashboard" id="countryBranchDashboard" onclick="_getActiveBranchPage({divid: 'countryBranchDashboard', page: 'countryBranchDashboard', url: adminPortalLocalUrl});"><i class="bi-speedometer2"></i> Dashboard</li>
                        <li title="Branches" id="branchesPage" onclick="_getActiveBranchPage({divid: 'branchesPage', page: 'branchesPage', url: adminPortalLocalUrl});"><i class="bi-diagram-3"></i> Branches</li>
                        <li class="hide-li" id="dotted" title="Branch Student"><i class="bi-mortarboard"></i> Student</li>
                    </ul>
                </div>
            </div>

            <div class="field-back-div background-color">
                <div class="field-inner-div branch-field-inner-div" id="getBranchDetails">
                    <script>
                        _getActiveBranchPage({
                            divid: 'countryBranchDashboard',
                            page: 'countryBranchDashboard',
                            url: adminPortalLocalUrl
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- For Branch Modal Pages -->
<?php if ($page == 'countryBranchDashboard') { ?>
    <div class="modal-dashboard-statistics-wrapper">
        <div class="left-dashbaord-container">
            <div class="statistics-chart-back-div box-shadow">
                <div class="modal-statistics-back-div">
                    <div class="statistics-div left-border font-size" title="Branches" onclick="">
                        <h2>5</h2>
                        <span><i class="bi-diagram-3"></i> Branches</span>
                    </div>

                    <div class="statistics-div font-size" title="Student" onclick="">
                        <h2>10</h2>
                        <span><i class="bi-mortarboard font-size"></i> Student </span>
                    </div>

                    <div class="statistics-div left-border border-radius font-size" title="Class" onclick="">
                        <h2>8</h2>
                        <span><i class="bi-people-fill"></i> Class</span>
                    </div>

                    <div class="statistics-div right-border font-size" title="Subject" onclick="">
                        <h2>100</h2>
                        <span><i class="bi-journals"></i> Subject</span>
                    </div>
                </div>

                <div class="chart-back-div">
                    <div class="chart-div-notifications no-border-top">
                        <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for </div>

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
                                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-from" placeholder="" />
                                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> From</div>
                                    </div>

                                    <div class="text_field_container dash_field_container">
                                        <input class="text_field bar_cust_text_field" type="text" id="datepickers-to" placeholder="" />
                                        <div class="placeholder bar_cust_placeholder"><i class="bi-calendar3"></i> To</div>
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

                    <div class="trending-back-div">
                        <div class="revenue-back-div">
                            <div class="top-revenue">Revenue For<span>January 18 2025</span>-<span>February 17 2025</span></div>
                            <div class="fund-back-div">
                                <div class="fund-div">
                                    <h3><span>₦1,343,581.63</span>(SALES)</h3>
                                </div>-<div class="fund-div">
                                    <h3><span>₦256,000.00</span>(WALLET)</h3>
                                </div>
                            </div>
                        </div>

                        <div id="chartContainer" style="width:100%; height:300px; margin:auto;"></div>
                        <script>
                            $(document).ready(function() {
                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    theme: "light1",
                                    title: {
                                        text: ""
                                    },
                                    axisX: {
                                        valueFormatString: "DD MMM",
                                        crosshair: {
                                            enabled: true,
                                            snapToDataPoint: true
                                        }
                                    },
                                    axisY: {
                                        title: "",
                                        includeZero: true,
                                        crosshair: {
                                            enabled: true
                                        }
                                    },
                                    toolTip: {
                                        shared: true
                                    },
                                    legend: {
                                        cursor: "pointer",
                                        verticalAlign: "bottom",
                                        horizontalAlign: "left",
                                        dockInsidePlotArea: true,
                                        itemclick: toogleDataSeries
                                    },
                                    data: [{
                                            type: "line",
                                            showInLegend: true,
                                            name: "Sales",
                                            markerType: "square",
                                            xValueFormatString: "DD MMM, YYYY",
                                            color: "#29BA00",
                                            dataPoints: [{
                                                    x: new Date(2025, 0, 1),
                                                    y: 250000
                                                },
                                                {
                                                    x: new Date(2025, 0, 2),
                                                    y: 180000
                                                },
                                                {
                                                    x: new Date(2025, 0, 3),
                                                    y: 100000
                                                },
                                                {
                                                    x: new Date(2025, 0, 4),
                                                    y: 300000
                                                },
                                                {
                                                    x: new Date(2025, 0, 5),
                                                    y: 120000
                                                },
                                                {
                                                    x: new Date(2025, 0, 6),
                                                    y: 150000
                                                },
                                                {
                                                    x: new Date(2025, 0, 7),
                                                    y: 275000
                                                },
                                                {
                                                    x: new Date(2025, 0, 8),
                                                    y: 160000
                                                },
                                                {
                                                    x: new Date(2025, 0, 9),
                                                    y: 350000
                                                },
                                                {
                                                    x: new Date(2025, 0, 10),
                                                    y: 380000
                                                },
                                                {
                                                    x: new Date(2025, 0, 11),
                                                    y: 0
                                                },
                                                {
                                                    x: new Date(2025, 0, 12),
                                                    y: 100000
                                                },
                                                {
                                                    x: new Date(2025, 0, 13),
                                                    y: 0
                                                },
                                                {
                                                    x: new Date(2025, 0, 14),
                                                    y: 180000
                                                },
                                                {
                                                    x: new Date(2025, 0, 15),
                                                    y: 270000
                                                },
                                            ]
                                        },
                                        {
                                            type: "line",
                                            showInLegend: true,
                                            name: "Wallet",
                                            lineDashType: "dash",
                                            dataPoints: [{
                                                    x: new Date(2025, 0, 1),
                                                    y: 180000
                                                },
                                                {
                                                    x: new Date(2025, 0, 2),
                                                    y: 50000
                                                },
                                                {
                                                    x: new Date(2025, 0, 3),
                                                    y: 80000
                                                },
                                                {
                                                    x: new Date(2025, 0, 4),
                                                    y: 0
                                                },
                                                {
                                                    x: new Date(2025, 0, 5),
                                                    y: 150000
                                                },
                                                {
                                                    x: new Date(2025, 0, 6),
                                                    y: 40000
                                                },
                                                {
                                                    x: new Date(2025, 0, 7),
                                                    y: 300000
                                                },
                                                {
                                                    x: new Date(2025, 0, 8),
                                                    y: 200000
                                                },
                                                {
                                                    x: new Date(2025, 0, 9),
                                                    y: 0
                                                },
                                                {
                                                    x: new Date(2025, 0, 10),
                                                    y: 120000
                                                },
                                                {
                                                    x: new Date(2025, 0, 11),
                                                    y: 90000
                                                },
                                                {
                                                    x: new Date(2025, 0, 12),
                                                    y: 200000
                                                },
                                                {
                                                    x: new Date(2025, 0, 13),
                                                    y: 0
                                                },
                                                {
                                                    x: new Date(2025, 0, 14),
                                                    y: 280000
                                                },
                                                {
                                                    x: new Date(2025, 0, 15),
                                                    y: 50000
                                                },

                                            ]
                                        }
                                    ]

                                });
                                chart.render();

                                function toogleDataSeries(e) {
                                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                        e.dataSeries.visible = false;
                                    } else {
                                        e.dataSeries.visible = true;
                                    }
                                    chart.render();
                                }
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-dashbaord-container">

            <div class="matrix-div">
                <div class="inner-div">
                    <div class="title">
                        <h3>Payment Matrix</h3>
                    </div>
                    <div id="chartContainer2" style="width:100%; height:200px; margin:auto;"></div>

                    <script type="text/javascript">
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
                                        y: 3
                                    },
                                    {
                                        label: "Wallet",
                                        y: 2
                                    },
                                    {
                                        label: "Bank Transfer",
                                        y: 11
                                    },
                                ]
                            }]
                        };
                        $("#chartContainer2").CanvasJSChart(options);
                    </script>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'branchesPage') { ?>
    <div class="alert alert-success top-alert-div animated fadeIn">
        <span><i class="bi-diagram-3"></i> BRANCHES</span>

        <div class="btn-container">
            <button class="btn" title="ADD BRANCH" onclick="_getForm({page: 'branchReg', layer:2, url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW BRANCH</button>
        </div>
    </div>

    <div class="table-div animated fadeIn">
        <table class="table" cellspacing="0" style="width:100%" id="pageContent">
            <script>_fetchCountryBranchData()</script>
        </table>
    </div>
<?php } ?>

<?php if ($page == 'branchReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="title-panel-div">
            <div class="inner-top">
                <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW BRANCH</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="container-back-div">
            <div class="inner-container">
                <div>
                    <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD A NEW BRANCH TO </span><span id="branchCountryName"><script>$("#branchCountryName").html(getEachCountrySession?.countryName);</script></span></div>
                </div>

                <div class="text_field_container" id="branchName_container">
                    <script>
                        textField({
                            id: 'branchName',
                            title: 'Branch Name'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="email_container">
                    <script>
                        textField({
                            id: 'email',
                            title: 'Email Address',
                            type: 'email'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="phoneNumber_container">
                    <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Phone Number',
                            type: 'tel',
                            onKeyPressFunction: 'isNumberCheck(event);'
                        });
                    </script>
                </div>

                <div class="text_field_container" id="address_container">
                    <script>
                        textField({
                            id: 'address',
                            title: 'Branch Address'
                        });
                    </script>
                </div>

                <div class="alert alert-success form-alert">
                    <span>ADMINISTRATIVE INFORMATION</span>
                    <div class="text_field_back_container">
                        <div class="text_field_container" id="staffId_container">
                            <script>
                                selectField({
                                    id: 'staffId',
                                    title: 'Select Branch Manager'
                                });
                                _getSelectBranchManagerId('staffId');
                            </script>
                        </div>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status'
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createCountryBranch();"> <i class="bi-check"></i>
                        SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'branchCountryProfile') { ?>
     <script> getEachBranchSession = JSON.parse(sessionStorage.getItem("getEachBranchSession"));</script>
    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-person-check-fill"></i> BRANCH PROFILE</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <label>
                        <div class="img-div">
                            <img id="staffProfilePix" src="<?php echo $websiteUrl ?>/all-images/images/icon.png" alt="Profile Image">
                            <input type="file" id="profilePix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="staffProfilePixPreview.UpdatePreview(this);" />
                        </div>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="ProbranchName"><script>$("#ProbranchName").html(getEachBranchSession?.branchName);</script></div>

                                <div class="text">
                                    <div>
                                        <div id="branchStatusBtn" class="status-btn"><span id="branchStatusName"></span></div>
                                    </div>
                                    | OFFICIAL EMAIL:
                                    <strong id="ProbranchEmail"><script>$("#ProbranchEmail").html(getEachBranchSession?.email);</script></strong>

                                    | OFFICIAL NUMBER:
                                    <strong id="ProbranchPhoneNumber"><script>$("#ProbranchPhoneNumber").html(getEachBranchSession?.phoneNumber);</script></strong>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        const statusName = getEachBranchSession.statusName;
                                        $("#branchStatusName").html(statusName);
                                        $("#branchStatusBtn").addClass(statusName);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div">
                    <div class="user-in">
                        <div class="title">BRANCH BASIC INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateBranchName_container">
                                <script>
                                    textField({
                                        id: 'updateBranchName',
                                        title: 'Branch Name',
                                        value: getEachBranchSession?.branchName ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateEmail_container">
                                <script>
                                    textField({
                                        id: 'updateEmail',
                                        title: 'Branch Email Address',
                                        value: getEachBranchSession?.email ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateBranchPhoneNumber_container">
                                <script>
                                    textField({
                                        id: 'updateBranchPhoneNumber',
                                        title: 'Phone Number',
                                        type: 'tel',
                                        value: getEachBranchSession?.phoneNumber ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateBranchAddress_container">
                                <script>
                                    textField({
                                        id: 'updateBranchAddress',
                                        title: 'Home Address',
                                        value: getEachBranchSession?.address ?? ''
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">BRANCH ACCOUNT INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="branchId_container">
                                <script>
                                    textField({
                                        id: 'branchId',
                                        title: 'Branch ID',
                                        readonly: true,
                                        value: getEachBranchSession?.branchId ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="branchCreatedTime_container">
                                <script>
                                    textField({
                                        id: 'branchCreatedTime',
                                        title: 'Date Of Registration',
                                        readonly: true,
                                        value: getEachBranchSession?.createdTime ?? ''
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">ADMINISTRATIVE INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateManagerId_container">
                                <script>
                                    selectField({
                                        id: 'updateManagerId',
                                        title: 'Select Branch Manager',
                                        fieldValue: getEachBranchSession?.managerId ?? '',
                                        fieldLabel: getEachBranchSession?.managerName ?? ''
                                    });
                                    _getSelectBranchManagerId('updateManagerId');
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateStatusId_container">
                                <script>
                                    selectField({
                                        id: 'updateStatusId',
                                        title: 'Select Status',
                                        fieldValue: getEachBranchSession?.statusId ?? '',
                                        fieldLabel: getEachBranchSession?.statusName ?? ''
                                    });
                                    _getSelectStatusId('updateStatusId', '1,2');
                                </script>
                            </div>
                        </div>

                        <div class="btn-div">
                            <button class="btn" title="UPDATE PROFILE" id="updateBtn" onclick="_updateCountryBranch();"> UPDATE PROFILE <i class="bi-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>