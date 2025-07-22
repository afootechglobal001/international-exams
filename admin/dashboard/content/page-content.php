<?php if ($page == 'dashboard') { ?>
    <div class="dash-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title"><span id="page-title"><i class="bi-speedometer2"></i> Admin Dashboard Overview</span></div>
        <h2>👋 Hi, <span id="login_fullname">Hon. Paul Emmanuel</span></h2>
        <div class="bottom-title"><i class="bi-clock"></i> Last Login Date | <span id="">2025-07-21 09:12:16</span></div>
    </div>

    <div class="dashboard-wrapper" data-aos="fade-in" data-aos-duration="1500">
        <div class="statistics-back-div" data-aos="fade-in" data-aos-duration="1500">
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
                <span title="View All Students" onclick="_getActivePage({page:'viewStudents', divid:'students'});">View All</span>
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
                        placeholder="" title="Type here to search staff..." />
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
                        <td class="clickable-td" title="Click to view staff profile" onclick="_getForm({page: 'staffProfile', url: adminPortalLocalUrl});">
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
                        <td><button class="btn view-btn" title="Click to view staff profile" onclick="_getForm({page: 'staffProfile', url: adminPortalLocalUrl});">VIEW</button></td>
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
                        placeholder="" title="Type here to search students..." />
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
                        <td class="clickable-td" title="Click to view staff profile" onclick="_getForm({page: 'studentProfile', url: adminPortalLocalUrl});">
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
<?php } ?>

<?php if ($page == 'internationalExamCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-book-half"></i> <strong>International Exams</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search exams..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search exams...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW INTERNATION EXAM"
                    onclick="_getForm({page: 'internationalExamReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW INTERNATIONAL EXAM
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'internationalExamCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="_getActivePage({page:'examRelatedLinks', divid:'publish'});">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>TOEFL</h2>
                    <div class="top-text"><span> Test of English as a Foreign Language </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GRE.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>GRE</h2>
                    <div class="top-text"><span> Graduate Record Examination </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/student1.avif" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>IELTS</h2>
                    <div class="top-text"><span>International English Language Testing System</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>
                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GMAT.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>GMAT</h2>
                    <div class="top-text"><span> Graduate Management Admission Test </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>PTE</h2>
                    <div class="top-text"><span> Pearson Test of English</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GRE.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>SAT</h2>
                    <div class="top-text"><span> Scholastic Assessment Test </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/images/student1.avif" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>MCAT</h2>
                    <div class="top-text"><span>Medical College Admission Test</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                    <button class="btn link-btn" onclick="">RELATED LINKS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/GMAT.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>NCLEX</h2>
                    <div class="top-text"><span> National Concil Licensure Examination </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'examRelatedLinks') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="back-div"><span title="Click and navigate back to International Exams" onclick="_getActivePage({page:'internationalExamCategory', divid:'publish'});"><i class="bi-arrow-left"></i> International Exams</span> Related Links</div>
            <div class="title"><i class="bi-book-half"></i> <strong>Related Links</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search link..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search link...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW RELATED LINK"
                    onclick="_getForm({page: 'relatedLinksReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW RELATED LINK
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'examRelatedLinks', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/body-pix/TOEL.jpg" alt="TOEFL" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>TOEFL ELIGIBILTY IN NIGERIA</h2>
                    <div class="top-text"><span> Test of English as a Foreign Language </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'studyAbroadCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-book-half"></i> <strong>Study Abroad</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper study-abroad-text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search study abroad..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search study abroad...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW TUDY ABROAD"
                    onclick="_getForm({page: 'studyAbroadReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW STUDY ABROAD
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'studyAbroadCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-canada.jpg" alt="STUDY IN CANADA" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN CANADA</h2>
                    <div class="top-text"><span> Canada plays host to more than 180,000 International students in any given... </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-australia.jpg" alt="STUDY IN AUSTRALIA" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN AUSTRALIA</h2>
                    <div class="top-text"><span> Australia plays host to more than 180,000 International students in any... </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-usa.png" alt="STUDY IN UNITED STATE" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN UNITED STATE</h2>
                    <div class="top-text"><span>U.S plays host to more than 180,000 International students in any given...</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-frnace.jpg" alt="STUDY IN FRANCE" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN FRANCE</h2>
                    <div class="top-text"><span> Graduate Management Admission TestStudying abroad in France...</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-dubai.jpg" alt="STUDY IN DUBAI" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN DUBAI</h2>
                    <div class="top-text"><span> Dubai is one of the seven emirates of the United Arab Emirates...</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-china.jpg" alt="STUDY IN CHINA" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN CHINA</h2>
                    <div class="top-text"><span> The People's Republic of China has been a center of international attention... </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-ghana.jpg" alt="STUDY IN GHANA" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN GHANA</h2>
                    <div class="top-text"><span>The People's Republic of China has been a center of international attention...</span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-qatar.jpg" alt="STUDY IN QATAR" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>
                <div class="text-div">
                    <h2>STUDY IN QATAR</h2>
                    <div class="top-text"><span> Qatar is a small peninsular nation about the size of Connecticut. </span></div>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'blogCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-journals"></i> <strong>Blog And Articles</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach blog..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search blog...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW BLOG"
                    onclick="_getForm({page: 'blogReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW BLOG
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'blogCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/blogs/blog1.png" alt="HOW INTERNATIONAL EXAMS OPEN DOORS TO GLOBAL EDUCATION" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> INTERNATIONAL EXAM</span></div>
                    <h2>HOW INTERNATIONAL EXAMS OPEN DOORS TO GLOBAL EDUCATION...</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/blogs/blog2.png" alt="TOP EXAMS YOU NEED TO STUDY ABROAD: IELTS, TOEFL, SAT, GRE & MORE" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> INTERNATIONAL EXAM</span></div>
                    <h2>TOP EXAMS YOU NEED TO STUDY ABROAD: IELTS, TOEFL, SAT, GRE...</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
<?php } ?>

<?php if ($page == 'galleryCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-images"></i> <strong>Gallery</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach gallery..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search gallery...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW GALLERY"
                    onclick="_getForm({page: 'galleryReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW GALLERY
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'galleryCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/exam-writing.webp" alt="Students preparing for international exams like IELTS and SAT" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> GLOBAL READINESS</span></div>
                    <h2>INSIDE THE EXAM HALL: FOCUSED & DETERMINED</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>350</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/study-group.webp" alt="Students taking an international standardized test" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> PREP SESSIONS</span></div>
                    <h2>COLLABORATIVE LEARNING: DIVERSE STUDY GROUPS</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>410</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-div">
                <div class="btn-div">
                    <button class="btn active-btn" onclick="">EDIT</button>
                    <button class="btn" onclick="">EDIT PAGE DETAILS</button>
                </div>

                <div class="img-div">
                    <img src="<?php echo $websiteUrl ?>/all-images/gallery/result-celebration.jpg" alt="EDUGRADE students celebrating international exam success" />
                </div>
                <div class="status-div ACTIVE">ACTIVE</div>

                <div class="text-div">
                    <div class="top-text blog-top-text"><span> SUCCESS STORIES</span></div>
                    <h2>GLOBAL ACHIEVEMENTS: EXAM SUCCESS CELEBRATED</h2>
                    <div class="text-in">
                        <div class="text">
                            UPDATED ON: <span>25 Jan 2025</span> | <span>500</span> VIEWS
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php } ?>

<?php if ($page == 'faqCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-patch-question"></i> <strong>Frequently Asked Questions</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to serach faq..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search faq...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW FAQ"
                    onclick="_getForm({page: 'faqReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW FAQ
                </button>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">1</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>What is the TOEFL exam used for?</span></button>
                </div>
                <div class="answer-div">The TOEFL (Test of English as a Foreign Language) is widely used to assess the English proficiency of non-native speakers, primarily for academic purposes such as university admissions in English-speaking countries.</div>
            </div>

            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">2</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>How is the IELTS scored?</span></button>
                </div>
                <div class="answer-div">The IELTS (International English Language Testing System) is scored on a band scale from 0 to 9, with each skill (Listening, Reading, Writing, Speaking) rated individually, and an overall band score calculated as an average.</div>
            </div>

            <div class="faq-back-div">
                <div class="title-div">
                    <div class="num">3</div>
                    <button class="btn" onClick=""><i class="bi-pencil-square"></i> <span>What is the purpose of the PTE?</span></button>
                </div>
                <div class="answer-div">The PTE (Pearson Test of English) is used to measure English language proficiency for academic, professional, or immigration purposes, offering a computer-based test format recognized globally.</div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'testimonyCategory') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-quote"></i> <strong>Testimonies</strong></div>
            <div class="bottom-title">
                Active: <span>10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search testimony..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search testimony...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="other-pg-back-div">
            <div class="testimony-back-div">
                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Paul Emmanuel</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>seunemmanuel107@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onclick="_getForm({page: 'updateTestimony', url: adminPortalLocalUrl});">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Gideo Smith</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>gideo200@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onclick="">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Solomon James</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>solomon12@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onClick="">VIEW DETAILS</button>
                </div>

                <div class="testimony-div">
                    <div class="details">
                        <div class="text">
                            <h3>Cynthia Morgan</h3>
                            <div class="info">
                                <div>
                                    <p>Email: <span>cynthia123@gmail.com</span></p>
                                    <p>Phone: <span>07050903886</span></p>
                                </div>
                                <button class="status-btn ACTIVE">ACTIVE</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn" onClick="">VIEW DETAILS</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'settings') { ?>
    <div class="page-title-back-div other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-gear"></i> <strong>Global Configurations</strong></div>
            <span class="settings-span">Manage and configure dashboard settings, global settings and manage users </span>
        </div>
        <button class="btn" title="LEARN MORE">LEARN MORE</button>
    </div>

    <div class="pages-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="user-managment-back-div" data-aos="fade-in" data-aos-duration="1500">
            <div class="user-managment-list" onclick="_getForm({page: 'accountSettings', url: adminPortalLocalUrl});">
                <div class="inner-div">
                    <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/gear.png" alt="Account Management" /></div>
                    <div class="text-div">
                        <h3>Account Management</h3>
                        <p>User can Manage account informations, ensuring secure and efficient access to features.</p>
                    </div>
                </div>
            </div>

            <div class="user-managment-list" onclick="_getForm({page: 'changePassword', url: adminPortalLocalUrl});">
                <div class="inner-div">
                    <div class="icon-div"><img src="<?php echo $websiteUrl ?>/all-images/images/status.png" alt="Change Password" /></div>
                    <div class="text-div">
                        <h3>Change Password</h3>
                        <p>Users can change and upadate their password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'systemAlert') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-bell-fill"></i> <strong>System Alert</strong></div>
            <span class="settings-span">View system alerts and notifications that require your attention.</span>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert-chart-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="chart-div-notifications alert-chart-div-notifications">
            <div class="text"><i class="bi-graph-up-arrow"></i> Showing Notofication for</div>

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
        </div>
        <div class="alert alert-success form-alert"> <span><i class="bi-bell"></i></span> Notification Between <span id="date_from">July 19 2025</span> - <span id="date_to">August 19 2025</span></div>
    </div>

    <div class="main-alert-div" id="fetchAllSystemAlert" data-aos="fade-in" data-aos-duration="1500">
        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onclick="_getForm({page: 'alertRead', url: adminPortalLocalUrl});">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert main-system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

    </div>

    <div class="bottom-btn-div">
        <button id="" title="Older" class="btn" onclick=""><i class="bi-chevron-left"></i></button>
        <div><span id="">0</span>-<span id="">0</span> of <span id="">0</span></div>
        <button id="" title="Newer" class="btn" onclick=""><i class="bi-chevron-right"></i></button>
    </div>
<?php } ?>