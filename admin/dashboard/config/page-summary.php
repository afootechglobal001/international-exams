<?php if ($pageCatId == 'examCategory') { ?>
    <script>
        function _loadExamSummary() {
            const pageSummary = JSON.parse(sessionStorage.getItem("pageSummary"));
            if (!pageSummary) return;

            // hide both first, then decide which to show
            $("#fullExamBlock").hide();
            $("#shortExamBlock").hide();

            if (pageSummary.incentives && pageSummary.incentives.length > 0) {
                $("#fullExamBlock").show();

                $("#examPixFull").attr("src", examPixPath + '/' + pageSummary.regPix).attr("alt", pageSummary.regTitle);
                $("#examAbbr").html(pageSummary.examAbbr || '');
                $("#regTitleFull").html(pageSummary.regTitle);
                $("#updatedDateFull").html(_fetchFormatDate(pageSummary.updatedTime));

                const incentives = pageSummary.incentives || '';
                const $temp = $("<div>").html(incentives);
                // Add hyphen before each <p>
                $temp.find("p").prepend("- ");
                // Put it back in the DOM

                $('#fetchedIncentives').html($temp.html());

            } else {
                $("#shortExamBlock").show();

                $("#examPixShort").attr("src", examRelatedLinkPixPath + '/' + pageSummary.regPix).attr("alt", pageSummary.regTitle);
                $("#regTitleShort").html(pageSummary.regTitle);
                $("#updatedDateShort").html(_fetchFormatDate(pageSummary.updatedTime));
            }
        }

        $(document).ready(function () {
            _loadExamSummary();
            window.addEventListener("storage", function (e) {
                if (e.key === "pageSummary") {
                    _loadExamSummary();
                }
            });
        });
    </script>

    <div id="fullExamBlock" style="display:none;">
        <div class="exams-back-div page-summ-exam-div">
            <div class="exam-div pg-summ-exam-div">
                <div class="exam-image">
                    <img id="examPixFull" src="<?php echo $websiteUrl ?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>

                <div class="exam-info">
                    <h3 id="examAbbr"></h3>
                    <p id="regTitleFull"></p>
                    <div class="exam-time page-summ-exam-time">
                        <p><i class="bi bi-calendar"></i> Updated on: <strong id="updatedDateFull">Loading...</strong></p>
                        <p><i class="bi bi-eye"></i> View: <strong>10</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-div form-main-content page-summ-content">
            <div class="tables-content-div form-content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-journals"></i>
                        <p>Incentives</p>
                    </div>
                </div>
                <div class="inner-table-content pages-inner-content" id="fetchedIncentives"></div>
            </div>
        </div>
    </div>

    <div id="shortExamBlock" style="display:none;">
        <div class="exams-back-div page-summ-exam-div">
            <div class="exam-div pg-summ-exam-div">
                <div class="exam-image">
                    <img id="examPixShort" src="<?php echo $websiteUrl ?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>

                <div class="exam-info">
                    <p id="regTitleShort"></p>
                    <div class="exam-time page-summ-exam-time">
                        <p><i class="bi bi-calendar"></i> Updated on: <strong id="updatedDateShort">Loading...</strong></p>
                        <p><i class="bi bi-eye"></i> View: <strong>10</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'studyAbroadCategory') { ?>
    <script> getEachStudyAbroadSession = JSON.parse(sessionStorage.getItem("getEachStudyAbroadSession"));</script>
    <div class="grid-div">
        <div class="img-div"><img id="studyAbroadPix" src="<?php echo $websiteUrl ?>/uploaded_files/studyAbroad/default.jpg" alt="TOEFL" /></div>
        <script>
            $(document).ready(function() {
                $("#studyAbroadPix").attr("src", studyAbroadPixPath+'/'+getEachStudyAbroadSession.regPix).attr("alt", getEachStudyAbroadSession.regTitle);
                $("#formattedDate").html(_fetchFormatDate(getEachStudyAbroadSession.updatedTime));
            });
        </script>
        <div class="text-div">
            <div class="top-text"><span id="studyAbroadSummary"><script>$("#studyAbroadSummary").html(getEachStudyAbroadSession.studyAbroadSummary.substr(0, 120) +'...');</script> </span></div>
            <h2 id="studyAbroadRegTitle"><script>$("#studyAbroadRegTitle").html(getEachStudyAbroadSession.regTitle);</script></h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate">Loading...</span> | <span id="page_view">200</span> VIEWS </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'blogCategory') { ?>
    <script> getEachBlogSession = JSON.parse(sessionStorage.getItem("getEachBlogSession"));</script>
    <div class="grid-div">
        <div class="img-div"><img id="blogPix" src="<?php echo $websiteUrl ?>/uploaded_files/blog/default.jpg" alt="TOEFL" /></div>
        <script>
            $(document).ready(function() {
                $("#blogPix").attr("src", blogPixPath+'/'+getEachBlogSession.regPix).attr("alt", getEachBlogSession.regTitle);
            });
        </script>

        <div class="text-div">
            <div class="top-text blog-top-text"><span id="blogCatName"> <script>$("#blogCatName").html(getEachBlogSession.blogCatName);</script></span></div>
            <h2 id="blogRegTitle"><script>$("#blogRegTitle").html(getEachBlogSession.regTitle);</script></h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate"><script>$("#formattedDate").html(_fetchFormatDate(getEachBlogSession.updatedTime));</script></span> | <span id="page_view">200</span> VIEWS </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'galleryCategory') { ?>
    <script> getEachGallerySession = JSON.parse(sessionStorage.getItem("getEachGallerySession"));</script>
    <div class="grid-div">
        <div class="img-div"><img id="galleryPix" src="<?php echo $websiteUrl ?>/uploaded_files/galleryPictures/default.jpg" alt="Gallery" /></div>
        <script>
            $(document).ready(function() {
                $("#galleryPix").attr("src", galleryPixPath+'/'+getEachGallerySession.regPix).attr("alt", getEachGallerySession.regTitle);
            });
        </script>
        <div class="text-div">
            <h2 id="galleryRegTitle"><script>$("#galleryRegTitle").html(getEachGallerySession.regTitle);</script></h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate"><script>$("#formattedDate").html(_fetchFormatDate(getEachGallerySession.updatedTime));</script></span> | <span id="page_view">200</span> VIEWS </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'ictCourseCategory') { ?>
    <script> getEachIctCoursesSession = JSON.parse(sessionStorage.getItem("getEachIctCoursesSession"));</script>
    <div class="grid-div">
        <div class="img-div"><img id="ictCoursePix" src="<?php echo $websiteUrl ?>/uploaded_files/IctCourses/default.jpg" alt="ICT COurses" /></div>
        <script>
            $(document).ready(function() {
                $("#ictCoursePix").attr("src", ictCoursePixPath+'/'+getEachIctCoursesSession.regPix).attr("alt", getEachIctCoursesSession.regTitle);
                $("#formattedDate").html(_fetchFormatDate(getEachIctCoursesSession.updatedTime));
            });
        </script>
        <div class="text-div">
            <div class="top-text"><span id="subTitle"><script>$("#subTitle").html(getEachIctCoursesSession.subTitle);</script> </span></div>
            <h2 id="ictCourseRegTitle"><script>$("#ictCourseRegTitle").html(getEachIctCoursesSession.regTitle);</script></h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate">Loading...</span> </div>
            </div>
        </div>
    </div>
<?php } ?>