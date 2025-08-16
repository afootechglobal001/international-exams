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
        <div class="system-alert" id="<?php echo $alert_id; ?>" onclick="_getForm({page: 'alertRead', url: adminPortalLocalUrl});">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
            <div class="alert-name"><i class="bi-person"></i> Afolabi Taiwo <span id="<?php echo $alert_id; ?>viewed"><i class="bi-check"></i></span></div>
            <div class="alert-text">Success Alert: EMMANUEL SAMUEL profile was updated successfully...</div>
            <div class="alert-time"><i class="bi-clock"></i> <span>2023-07-09 15:31:34</span></div>
        </div>

        <div class="system-alert" id="<?php echo $alert_id; ?>" onClick="_get_form_with_id('alert-read')">
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


<?php if ($page == 'alertRead') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
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