<?php if ($page == 'ictCourses') { ?>
    <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi-pc-display"></i></div>
            </div>
            <div class="text-div">
                <h3>ICT Courses</h3>
                <p>Manage and update ICT course information, including modules, schedules, and resources, all from your dashboard.</p>
            </div>
        </div>

        <div class="btn-div">
            <div class="search-div">
                <input type="text" id="searchContent" onkeyup="filters('Content');" placeholder="Search ICT Courses...">
                <i class="bi bi-search"></i>
            </div>
            <button class="btn" title="ADD NEW ICT COURSES" onclick="sessionStorage.removeItem('getEachIctCoursesSession'); _getForm({page: 'ictCoursesReg', url: adminPortalLocalUrl});">
                <i class="bi-plus-square"></i> ADD NEW ICT COURSES
            </button>
        </div>
    </div>

    <div class="main-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-pc-display"></i>
                    <p>Study Abroad</p>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="other-pg-back-div" id="pageContent">
                    <script>
                        _fetchIctCoursesData();
                    </script>

                    <div class="content-loading-div">
                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'ictCoursesReg') { ?>
    <script> 
        getEachIctCoursesSession = JSON.parse(sessionStorage.getItem("getEachIctCoursesSession"));
        $('#pageTitle').html(getEachIctCoursesSession?.publishId ? 'UPDATE ICT COURSE':'CREATE NEW ICT COURSE');
        $('#subTitle, #subTitle2').html(getEachIctCoursesSession?.publishId ? 'update this ICT Course':'create new ICT Course');
    </script>

    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-book-half"></i></div>
                <h3 id="pageTitle">CREATE NEW ICT COURSES</h3>
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
                <p>You are about to <span id="subTitle"></span>. Please complete the form below with accurate details to successfully <span id="subTitle2"></span>.</p>
            </div>

            <div class="main-content-div">
                <div class="tables-content-div form-main-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-book-half"></i>
                            <p>Create new ICT Course here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="text_field_container" id="regTitle_container">
                            <script>
                                textField({
                                    id: 'regTitle',
                                    title: 'ICT Course Title',
                                    value: getEachIctCoursesSession?.regTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="courseSubTitle_container">
                            <script>
                                textField({
                                    id: 'courseSubTitle',
                                    title: 'Sub Title',
                                    value: getEachIctCoursesSession?.subTitle ?? ''
                                });
                            </script>
                        </div>

                        <div class="form-title">UPLOAD ICT COURSE PICTURE: <i>(JPG, PNG FORMAT ONLY)</i> <span>*</span></div>
                        <label>
                            <div class="pix-div">
                                <img id="ictCoursesPreview" src="<?php echo $websiteUrl ?>/all-images/images/sample.jpg" alt="Default Image">
                                <input type="file" id="regPix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="ictCoursesPreview.UpdatePreview(this);" />
                            </div>
                            <script>
                                $(document).ready(function () {
                                    const ictCoursesPix = getEachIctCoursesSession.regPix;
                                    const ictCoursesPixUrl = ictCoursesPix ? ictCoursePixPath + "/" + ictCoursesPix : "<?php echo $websiteUrl ?>/all-images/images/sample.jpg";

                                    $("#ictCoursesPreview").attr("src", ictCoursesPixUrl).attr("alt", getEachIctCoursesSession.regPix + " Logo");
                                });
                            </script>
                        </label>

                        <div class="text_field_container" id="statusId_container">
                            <script>
                                selectField({
                                    id: 'statusId',
                                    title: 'Select Status',
                                    fieldValue: getEachIctCoursesSession?.statusId ?? '',
                                    fieldLabel: getEachIctCoursesSession?.statusName ?? ''
                                });
                                _getSelectStatusId('statusId', '1,2');
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createAndUpdateIctCourses();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>