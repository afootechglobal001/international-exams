
<script>
    function writeSidebarItems(navId) {
        document.write(`
            <div class="nav-div active-li" title="Dashboard" onclick="_getActivePage({page:'dashboard', divid:'dashboard'});" id="${navId}-dashboard">           
                <div class="icon"><i class="bi-speedometer2"></i> Dashboard</div> 
                <div class="hidden" id="_dashboard"><i class="bi-speedometer2"></i> Admin Dashboard Overview</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Staff" onclick="_getActivePage({page:'viewStaff', divid:'staff'});" id="${navId}-staff">
                <div class="icon"><i class="bi-person-bounding-box"></i> Staffs</div> 
                <div class="hidden" id="_staff"><i class="bi-person-bounding-box"></i> Active Staff</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Students" onclick="_getActivePage({page:'viewStudents', divid:'students'});" id="${navId}-students">
                <div class="icon"><i class="bi-people"></i> Students</div> 
                <div class="hidden" id="_staff"><i class="bi-people"></i> Active Students</div>
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Publish" onclick="_getActivePage({nav:'publish', divid:'publish'});" id="${navId}-publish">
                <div class="icon"><i class="bi-menu-down"></i> Publish</div> 
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Report" onclick="_getActivePage({nav:'reports', divid:'reports'});" id="${navId}-reports">
                <div class="icon"><i class="bi-graph-up-arrow"></i> Report</div> 
            </div>
        `);

        document.write(`
            <div class="nav-div" title="Log-Out" onclick="" id="${navId}-reports">
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
        <div class="link" title="Publish International Exam" onclick="_getActivePage({page:'internationalExamCategory', divid:'publish'});">- International Exams <div class="num" id="">8</div></div>
        <div class="hidden" id="_publish_exam"><i class="bi-calendar-event"></i> International Exams</div>

        <div class="link" title="Study Abroad" onclick="_getActivePage({page:'studyAbroadCategory', divid:'publish'});">- Study Abroad <div class="num" id="">8</div></div>
        <div class="hidden" id="_publish_study_abroad"><i class="bi-calendar-event"></i> Study Abroad</div>

        <div class="link" title="Publish Blog" onclick="_getActivePage({page:'blogCategory', divid:'publish'});">- Blog <div class="num" id="">3</div></div>
        <div class="hidden" id="_publish_blog"><i class="bi-journal-text"></i> Publish Blog</div>

        <div class="link" title="Publish Gallery" onclick="_getActivePage({page:'galleryCategory', divid:'publish'});">- Gallery <div class="num" id="">0</div></div>
        <div class="hidden" id="_publish_gallery"><i class="bi-images"></i> Publish Gallery</div>

        <div class="link" title="Publish FAQ" onclick="_getActivePage({page:'faqCategory', divid:'publish'});">- FAQ <div class="num" id="">0</div></div>
        <div class="hidden" id="_publish_faq"><i class="bi-question-circle"></i> Publish FAQ</div>

        <div class="link" title="Publish Testimony" onclick="_getActivePage({page:'testimonyCategory', divid:'publish'});">- Testimony <div class="num" id="">0</div></div>
        <div class="hidden" id="_publish_testimony"><i class="bi-chat-left-text"></i> Publish Testimony</div>
    </div>

    <div class="nav-div animated fadeInLeft" id="link-reports">
        <div class="link" title="Product Report" onclick="">- Income Report <div class="num" id="">0</div></div>
        <div class="hidden" id="_product_report"><i class="bi-boxes"></i> Income Report</div>

        <div class="link" title="Sales Report" onclick="">- Expenses Report <div class="num" id="">0</div></div>
        <div class="hidden" id="_sales_report"><i class="bi-boxes"></i> Expenses Report</div>

        <div class="link" title="Wallet Report" onclick="">- Wallet Report <div class="num" id="">0</div></div>
        <div class="hidden" id="_wallet_report"><i class="bi-credit-card"></i> Wallet Report</div>
    </div>

    <div class="nav-back-container" onclick="_closeNav();"></div>
</div>