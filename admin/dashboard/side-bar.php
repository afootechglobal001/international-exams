
<script>
    function writeSidebarItems(navId) {
        document.write(`
            <div class="nav-div active-li" title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});" id="${navId}-dashboard">           
                <div class="icon"><i class="bi-speedometer2"></i> Dashboard</div> 
                <div class="hidden" id="_dashboard"><i class="bi-speedometer2"></i> Admin Dashboard Overview</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Branch" onclick="_getActivePage({page:'viewBranch', divid:'branch'});" id="${navId}-branch">
                <div class="icon"><i class="bi-diagram-3"></i> Branches</div> 
                <div class="hidden" id="_branch"><i class="bi-diagram-3"></i> Active Branches</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Staff" onclick="_getActivePage({page:'viewStaff', divid:'staff'});" id="${navId}-staff">
                <div class="icon"><i class="bi-person-bounding-box"></i> Staffs</div> 
                <div class="hidden" id="_staff"><i class="bi-person-bounding-box"></i> Active Staffs</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Publish" onclick="_getActivePage({nav:'publish', divid:'publish'});" id="${navId}-publish">
                <div class="icon"><i class="bi-menu-down"></i> Publish</div> 
            </div>
        `);

        document.write(`
            <div class="nav-div" title="E-Books" onclick="_getActivePage({page:'viewEbook', divid:'ebook'});" id="${navId}-ebook">
                <div class="icon"><i class="bi bi-filetype-pdf"></i> E-Books</div> 
                <div class="hidden" id="_ebooks"><i class="bi bi-filetype-pdf"></i> E-Books</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Videos" onclick="_getActivePage({page:'viewVideos', divid:'videos'});" id="${navId}-videos">
                <div class="icon"><i class="bi bi-camera-reels"></i> Videos</div> 
                <div class="hidden" id="_videos"><i class="bi bi-camera-reels"></i> Videos</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Report" onclick="_getActivePage({page:'incomeReport', divid:'reports'});" id="${navId}-reports">
                <div class="icon"><i class="bi-graph-up-arrow"></i> Report</div> 
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Log-Out" onclick="_confirmLogOut();" id="${navId}-logout">
                <div class="icon"><i class="bi-power"></i> Log-Out</div> 
            </div>
        `);
    }
</script>

<!-- Desktop Sidebar -->
<div class="side-nav-div animated fadeInLeft">
    <div class="nav-back-div">
        <script>writeSidebarItems('side');</script>
    </div>
</div>

<!-- Mobile Sidebar -->
<div class="side-nav-div animated fadeInLeft" id="side-nav-div">
    <div class="nav-back-div">
        <script>writeSidebarItems('mobile');</script>
    </div>
</div>


<!--------------------------for nav sub div view----------------------------------------->

<div class="side-nav-bg-sub-div">
    <div class="nav-div animated fadeInLeft" id="link-publish">
        <div class="link" title="Publish International Exam" onclick="_getActivePage({page:'examCategory', divid:'publish'});">- International Exams <div class="num" id="sideExamCount">0</div></div>
        <div class="hidden" id="_publish_exam"><i class="bi-calendar-event"></i> International Exams</div>

        <div class="link" title="Study Abroad" onclick="_getActivePage({page:'studyAbroadCategory', divid:'publish'});">- Study Abroad <div class="num" id="sideStudyAbroadCount">0</div></div>
        <div class="hidden" id="_publish_study_abroad"><i class="bi-calendar-event"></i> Study Abroad</div>

        <div class="link" title="Publish Blog" onclick="_getActivePage({page:'blogCategory', divid:'publish'});">- Blog <div class="num" id="sideBlogCount">0</div></div>
        <div class="hidden" id="_publish_blog"><i class="bi-journal-text"></i> Publish Blog</div>

        <div class="link" title="Publish Gallery" onclick="_getActivePage({page:'galleryCategory', divid:'publish'});">- Gallery <div class="num" id="sideGalleryCount">0</div></div>
        <div class="hidden" id="_publish_gallery"><i class="bi-images"></i> Publish Gallery</div>

        <div class="link" title="Publish FAQ" onclick="_getActivePage({page:'faqCategory', divid:'publish'});">- FAQ <div class="num" id="sideFaqCount">0</div></div>
        <div class="hidden" id="_publish_faq"><i class="bi-question-circle"></i> Publish FAQ</div>

        <div class="link" title="Publish Testimony" onclick="_getActivePage({page:'testimonyCategory', divid:'publish'});">- Testimony <div class="num" id="sideTestimonyCount">0</div></div>
        <div class="hidden" id="_publish_testimony"><i class="bi-chat-left-text"></i> Publish Testimony</div>

        <div class="link" title="ICT Courses" onclick="_getActivePage({page:'ictCourses', divid:'publish'});">- ICT Courses<div class="num" id="totalActiveIctCourseCount">0</div></div>
        <div class="hidden" id="_publishIctCourses"><i class="bi-pc-display"></i> ICT Courses</div>
    </div>

    <div class="nav-back-container" onclick="_closeNav();"></div>
    <script> _fetchDashboardStatistics();</script>
</div>