<?php if ($pageCatId == 'examCategory') { ?>
    <script> getEachExamSession = JSON.parse(sessionStorage.getItem("getEachExamSession"));</script>
    <div class="exams-back-div page-summ-exam-div">
        <div class="exam-div pg-summ-exam-div">
            <div class="exam-image">
                <img id="examPix" src="<?php echo $websiteUrl ?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                <script>
                    $(document).ready(function() {
                        $("#examPix").attr("src", examPixPath+'/'+getEachExamSession.regPix).attr("alt", getEachExamSession.regTitle);
                        $("#updatedDate").html(_fetchFormatDate(getEachExamSession.updatedTime));
                    });
                </script>
            </div>

            <div class="exam-info">
                <h3 id="examAbbr"><script>$("#examAbbr").html(getEachExamSession.examAbbr);</script></h3>
                <p id="regTitle"><script>$("#regTitle").html(getEachExamSession.regTitle);</script></p>
                <div class="exam-time page-summ-exam-time">
                    <p><i class="bi bi-calendar"></i> Updated on: <strong id="updatedDate">Loading...</strong></p>
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

            <div class="inner-table-content pages-inner-content" id="fetchedIncentives">
                <script>
                    $(document).ready(function () {
                        const incentivesList = getEachExamSession?.incentivesData || [];

                        let content='';
                        for (let i = 0; i < incentivesList.length; i++) {
                            const incentivesInfo = incentivesList[i];
                            const incentives = incentivesInfo.incentives;
                            content +=`
                                <span>- ${incentives}</span>
						    `;
					    }
					    $('#fetchedIncentives').html(content);
                    });
                </script>

            </div>
        </div>
    </div>
<?php } ?>

<?php if ($pageCatId == 'examRelatedLinks') { ?>
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
            <div class="top-text"><span id="studyAbroadSummary"><script>$("#studyAbroadSummary").html(getEachStudyAbroadSession.studyAbroadSummary);</script> </span></div>
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