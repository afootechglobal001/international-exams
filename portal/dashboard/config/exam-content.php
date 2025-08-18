<?php if ($page == 'exam') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="page-title-div">
    <div class="div-in">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-journal-text"></i></div>
            </div>
            <div class="text-div">
                <h3>My Registered Exams</h3>
                <p>View and manage all your registered international exams in one place. Track schedules and stay
                    informed
                    with important exam updates.</p>
            </div>

        </div>
        <div class="search-div">
            <input type="text" placeholder="Search Exams Here...">
            <i class="bi bi-search"></i>
        </div>
    </div>
</section>
<!-- /////////// Title ////////////////////////////// -->

<sction class="main-content-div">
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="statistics-back-div">
        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>PENDING EXAM</p>
                    <span>Statistics of unpaid exam registrations</span>
                    <h2>2</h2>

                </div>
                <div class="statistics-icon pending"><i class="bi-credit-card-2-back"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>UPCOMING EXAM</p>
                    <span>Statistics of scheduled exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon upcoming"><i class="bi-calendar3"></i></div>
            </div>
        </div>

        <div class="statistics-div" id="branch" title="Branches">
            <div class="statistics-inner-div">
                <div class="statistics-text">
                    <p>COMPLETED EXAM</p>
                    <span>Statistics of completed exams</span>
                    <h2>1</h2>
                </div>
                <div class="statistics-icon completed"><i class="bi-card-checklist"></i></div>
            </div>
        </div>
    </section>
    <!--  ////////////////////////////////////////////////////////////////////////////////-->
    <section class="content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-journal-text"></i>
                <p>My International Exams</p>
            </div>
            <div>
                <button class="btn" title="Apply for Exam">
                    <i class="bi bi-eye"></i> Apply for Exam
                </button>
            </div>
        </div>

        <div class="exams-back-div">
            <div class="exam-div">
                <div class="exam-image">
                    <img src="<?php echo $websiteUrl?>/all-images/exam-logo/ielts-exam-nigeria.jpg" alt="Exam Image">
                </div>
                <div class="exam-status draft">DRAFT</div>
                <div class="exam-info">
                    <h3>IELTS</h3>
                    <p>International English Language Testing System</p>
                    <div class="exam-time">
                        <p><i class="bi bi-calendar"></i> <strong>31-05-2025</strong></p>
                        <p><i class="bi bi-clock"></i> <strong>10:00 AM </strong></p>
                    </div>
                </div>
                <button class="btn" title="View Details">
                    <i class="bi bi-eye"></i> View Details
                </button>
            </div>
        </div>
    </section>
</sction>
<?php } ?>