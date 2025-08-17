<?php if ($page == 'dashboard') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-speedometer2"></i></div>
            </div>
            <div class="text-div">
                <h2>👋 Welcome Back, <span id="DashFullname">
                    <script> $("#DashFullname").html(capitalizeFirstLetterOfEachWord(staffLoginData.loginFullName)); </script>
                </span>!</h2>
                <p>Welcome to your dashboard, where you can oversee all your activities, tasks, progress, and updates—helping you stay organized and on track</p>
            </div>
        </div>

        <div class="dashboard-right-wrapper">
            <div><p><span><i class="bi-clock"></i> Last Login Date </span></p></div>
            <div><strong id="lastLoginTime"><script>$("#lastLoginTime").html(staffLoginData.lastLoginTime);</script></strong></div>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="dashboard-wrapper">
            <div class="statistics-back-div">
                <div class="statistics-div" onclick="_getActivePage({page:'viewBranch', divid:'branch'});" id="branch" title="Branches">
                    <div class="inner-div">
                        <div class="number-div">
                            Branches
                            <span id="">3</span>
                        </div>
                        <div class="icon"><i class="bi-diagram-3"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'viewStaff', divid:'staff'});" id="staff" title="Administrators">
                    <div class="inner-div">
                        <div class="number-div">
                            Administrators
                            <span id="total_active_event_count">10</span>
                        </div>
                        <div class="icon"><i class="bi-person-bounding-box"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'viewStudents', divid:'students'});" id="students" title="Students">
                    <div class="inner-div">
                        <div class="number-div">
                            Students
                            <span id="total_active_event_count">30</span>
                        </div>
                        <div class="icon"><i class="bi-people"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'galleryCategory', divid:'publish'});" id="gallery" title="Gallery">
                    <div class="inner-div">
                        <div class="number-div">
                            Gallery
                            <span id="total_active_gallery_count">5</span>
                        </div>
                        <div class="icon"><i class="bi-images"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'blogCategory', divid:'publish'});" id="blog" title="Blog">
                    <div class="inner-div">
                        <div class="number-div">
                            Blog
                            <span id="total_active_blog_count">10</span>
                        </div>
                        <div class="icon"><i class="bi-file-post"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'faqCategory', divid:'publish'});" id="faq" title="FAQ">
                    <div class="inner-div">
                        <div class="number-div">
                            FAQ
                            <span id="total_active_faq_count">3</span>
                        </div>
                        <div class="icon"><i class="bi-patch-question"></i></div>
                    </div>
                </div>

                <div class="statistics-div" onclick="_getActivePage({page:'testimonyCategory', divid:'publish'});" id="test" title="Testimony">
                    <div class="inner-div">
                        <div class="number-div">
                            Testimony
                            <span id="total_active_testimony_count">10</span>
                        </div>
                        <div class="icon"><i class="bi-chat-quote-fill"></i></div>
                    </div>
                </div>

                <div class="statistics-div round">
                    <div class="inner-div text-centre">
                        View All Activities
                        <div class="icon-div">
                            <i class="bi-arrow-up-right"> </i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-statistics-wrapper">
                <div class="left-contaioner">
                    <div class="chart-back-div">
                        <div class="chart-div-notifications">
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

                <div class="right-container">
                    <div class="matrix-div">
                        <div class="inner-div">
                            <div class="title">
                                <h3>Recent Activities</h3>
                                <span title="Click to view all activities" onclick="_getActivePage({page:'systemAlert', divid:'systemAlert'});">View All</span>
                            </div>

                            <div class="main-alert-div dash-alert-back-div" id="">
                                <div class="system-alert dash-system-alert" id="<?php echo $alert_id; ?>" onclick="_getForm({page: 'alertRead', url: adminPortalLocalUrl});">
                                    <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                                    <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                                    <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                                </div>

                                <div class="system-alert dash-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
                                    <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                                    <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                                    <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                                </div>

                                <div class="system-alert dash-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
                                    <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                                    <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                                    <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                                </div>

                                <div class="system-alert dash-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
                                    <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
                                    <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
                                    <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tables-content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-person-check"></i>
                        <p>Recent Enrolled Students</p>
                    </div>

                    <div>
                        <button class="btn" title="View All" onclick="_getActivePage({page:'viewStudents', divid:'students'});">
                            <i class="bi bi-eye"></i> View All
                        </button>
                    </div>
                </div>

                <div class="inner-table-content">
                    <div class="table-div animated fadeIn">
                        <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                            <thead>
                                <tr class="tb-col">
                                    <th>sn</th>
                                    <th>Student Name</th>
                                    <th>Contact</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th>View</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="tb-row">
                                    <td>1</td>
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
                                    <td><button class="btn view-btn" title="Click to view staff profile" onclick="">VIEW</button></td>
                                </tr>

                                <tr class="tb-row">
                                    <td>2</td>
                                    <td class="clickable-td" title="Click to view staff profile" onclick="">
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
                                    <td><button class="btn view-btn" title="Click to view staff profile" onclick="">VIEW</button></td>
                                </tr>

                                <tr class="tb-row">
                                    <td>3</td>
                                    <td class="clickable-td" title="Click to view staff profile" onclick="">
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
                                    <td><button class="btn view-btn" title="Click to view staff profile" onclick="">VIEW</button></td>
                                </tr>

                                <tr class="tb-row">
                                    <td>4</td>
                                    <td class="clickable-td" title="Click to view staff profile" onclick="">
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
                                    <td><button class="btn view-btn" title="Click to view staff profile" onclick="">VIEW</button></td>
                                </tr>

                                <tr class="tb-row">
                                    <td>5</td>
                                    <td class="clickable-td" title="Click to view staff profile" onclick="">
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
                                    <td><button class="btn view-btn" title="Click to view staff profile" onclick="">VIEW</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                <button class="btn" onclick="_logOut();">YES</button>
                <button class="btn no-btn" onclick="_alertClose(<?php echo $modalLayer ?>);">NO</button>
            </div>
        </div>
    </div>
<?php } ?>