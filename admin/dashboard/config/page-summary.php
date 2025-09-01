<?php if ($pageCatId == 'examCategory') { ?>
    <script>
        function _loadExamSummary() {
            const pageSummary = JSON.parse(sessionStorage.getItem("pageSummary"));
            if (!pageSummary) return;

            // hide both first, then decide which to show
            $("#fullExamBlock").hide();
            $("#shortExamBlock").hide();

            if (pageSummary.incentivesData && pageSummary.incentivesData.length > 0) {
                $("#fullExamBlock").show();

                $("#examPixFull").attr("src", examPixPath + '/' + pageSummary.regPix).attr("alt", pageSummary.regTitle);
                $("#examAbbr").html(pageSummary.examAbbr || '');
                $("#regTitleFull").html(pageSummary.regTitle);
                $("#updatedDateFull").html(_fetchFormatDate(pageSummary.updatedTime));

                let content = '';
                for (let i = 0; i < pageSummary.incentivesData.length; i++) {
                    content += `<span>- ${pageSummary.incentivesData[i].incentives}</span>`;
                }
                $('#fetchedIncentives').html(content);

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
        <div class="img-div"><img id="studyAbroadPix" src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-canada.jpg" alt="TOEFL" /></div>
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
    <div class="grid-div">
        <div class="img-div"><img src="<?php echo $websiteUrl ?>/all-images/blogs/blog1.png" alt="TOEFL" /></div>
        <div class="text-div">
            <div class="top-text blog-top-text"><span> INTERNATIONAL EXAM</span></div>
            <h2 id="">HOW INTERNATIONAL EXAMS OPEN DOORS TO GLOBAL EDUCATION...</h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate">25 Jan 2025</span> | <span id="page_view">200</span> VIEWS </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'galleryCategory') { ?>
    <div class="grid-div">
        <div class="img-div"><img src="<?php echo $websiteUrl ?>/all-images/gallery/exam-writing.webp" alt="TOEFL" /></div>
        <div class="text-div">
            <div class="top-text blog-top-text"><span> GLOBAL READINESS</span></div>
            <h2 id="">INSIDE THE EXAM HALL: FOCUSED & DETERMINED...</h2>
            <div class="text-in">
                <div class="text">UPDATED ON: <span id="formattedDate">25 Jan 2025</span> | <span id="page_view">200</span> VIEWS </div>
            </div>
        </div>
    </div>
<?php } ?>