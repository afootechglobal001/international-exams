<?php if ($page == 'dashboard') { ?>
    <div class="dash-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title"><span id="page-title"><i class="bi-speedometer2"></i> Admin Dashboard Overview</span></div>
        <h2>👋 Hi, <span id="login_fullname">Hon. Paul Emmanuel</span></h2>
    </div>

    <div class="dashboard-wrapper" data-aos="fade-in" data-aos-duration="1500">
        <div class="statistics-back-div" data-aos="fade-in" data-aos-duration="1500">
            <div class="statistics-div" onClick="_getActivePage({page:'viewStaff', divid:'staff'});" id="staff" title="Administrators">
                <div class="inner-div">
                    <div class="number-div">
                        Administrators
                        <span id="total_active_event_count">10</span>
                    </div>
                    <div class="icon"><i class="bi-person-bounding-box"></i></div>
                </div>
            </div>

            <div class="statistics-div" onClick="_getActivePage({page:'viewStudents', divid:'students'});" id="students" title="Students">
                <div class="inner-div">
                    <div class="number-div">
                        Students
                        <span id="total_active_event_count">30</span>
                    </div>
                    <div class="icon"><i class="bi-people"></i></div>
                </div>
            </div>

            <div class="statistics-div" onClick="" id="gallery" title="Gallery">
                <div class="inner-div">
                    <div class="number-div">
                        Gallery
                        <span id="total_active_gallery_count">5</span>
                    </div>
                    <div class="icon"><i class="bi-images"></i></div>
                </div>
            </div>

            <div class="statistics-div" onClick="" id="blog" title="Blog">
                <div class="inner-div">
                    <div class="number-div">
                        Blog
                        <span id="total_active_blog_count">10</span>
                    </div>
                    <div class="icon"><i class="bi-file-post"></i></div>
                </div>
            </div>

            <div class="statistics-div" onClick="" id="faq" title="FAQ">
                <div class="inner-div">
                    <div class="number-div">
                        FAQ
                        <span id="total_active_faq_count">3</span>
                    </div>
                    <div class="icon"><i class="bi-patch-question"></i></div>
                </div>
            </div>

            <div class="statistics-div" onClick="" id="test" title="Testimony">
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
                            <h3>Payment Channel Matrix</h3>
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

        <div class="table-div animated fadeIn">
            <ul>
                <li><i class="bi-people"></i> Recently Enrolled Students</li>
            </ul>

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
                        <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
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

            <div class="bottom-div">
                <span title="View All Students" onclick="">View All</span>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'viewStaff') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-people"></i> <strong>Administrators</strong></div>
            <div class="bottom-title">
                Active: <span id="active-staff">10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach staff..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search staff...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW STAFF"
                    onclick="_getForm({page: 'staffReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW STAFF
                </button>
            </div>
        </div>
    </div>


    <div class="pages-back-div">
        <div class="table-div animated fadeIn">
            <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                <thead>
                    <tr class="tb-col">
                        <th>sn</th>
                        <th>User Name</th>
                        <th>Contact</th>
                        <th>Role</th>
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
                        <td>SUPER ADMIN</td>
                        <td>00-00-00 00:00:00</td>
                        <td>
                            <div class="status-div ACTIVE">ACTIVE</div>
                        </td>
                        <td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
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
                        <td>ADMIN</td>
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
                        <td>STAFF</td>
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
                        <td>STAFF</td>
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
                        <td>STAFF</td>
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
<?php } ?>

<?php if ($page == 'viewStudents') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-people"></i> <strong>Students</strong></div>
            <div class="bottom-title">
                Active: <span id="active-staff">10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach staff..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search students...</div>
                </div>
            </div>
        </div>
    </div>


    <div class="pages-back-div">
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
<?php } ?>

<?php if ($page == 'system_alert') { ?>
    <div class="search-div">
        <!--------------------------------all search select------------------------->
        <input id="search_keywords" onkeyup="_fetchAlertByKeywords();" type="text" class="text_field full" placeholder="Type here to search..." title="Type here to search" />
    </div>

    <div class="alert-chart-back-div">
        <div class="chart-div-notifications alert-chart-div-notifications">
            <div class="text"><i class="bi-graph-up-arrow"></i> Showing Matrix for</div>

            <div class="text">
                <div class="custom-srch-div">
                    <input id="datepicker-from" type="text" class="srchtxt" placeholder="From" title="Select Date From" />
                    <input id="datepicker-to" type="text" class="srchtxt" placeholder="To" title="Select Date To" />
                    <button type="button" class="btn" onclick="_getCustomReport('','','custom_search')">Apply</button>
                </div>
            </div>

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
        </div>
    </div>

    <div class="alert alert-success"> <span><i class="bi-bell"></i></span> Notification Between <span id="date_from">Loading...</span> - <span id="date_to">Loading...</span></div>

    <div class="main-alert-div" id="fetchAllSystemAlert">
        <script>
            _getAlertReport('srch-30', 'view_30days_search');
        </script>
        <!-- <div class="system-alert main-system-alert" id="<?php //echo $alert_id; 
                                                                ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php //echo $alert_id; 
                                                                                        ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div> -->


    </div>

    <div class="bottom-btn-div">
        <button id="fetch_previous_alerts" title="Older" class="btn" onclick="_fetchPreviousAlerts()"><i class="bi-chevron-left"></i></button>
        <div><span id="view_from">0</span>-<span id="view_to">0</span> of <span id="all_record_count">0</span></div>
        <button id="fetch_next_alerts" title="Newer" class="btn" onclick="_fetchNextAlerts()"><i class="bi-chevron-right"></i></button>
    </div>
<?php } ?>