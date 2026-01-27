<?php if ($page == 'ebook') { ?>
<!-- /////////// Title ////////////////////////////// -->
<section class="page-title-div">
    <div class="div-in">
        <div class="title-div">
            <div>
                <div class="icon-div"><i class="bi bi-filetype-pdf"></i></div>
            </div>
            <div class="text-div">
                <h3>Download E-Books</h3>
                <p>Access study resources and prepare for your international exams with ease. Stay on top of your
                    applications, schedules, and real-time updates—all in one place.</p>
            </div>

        </div>
        <div class="search-div">
            <input type="text" placeholder="Search E-Books Here...">
            <i class="bi bi-search"></i>
        </div>

    </div>
</section>
<!-- /////////// Title ////////////////////////////// -->

<section class="main-content-div" id="pageContent">
   <script>_fetchEbookData();</script>

    <div class="content-loading-div">
        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
    </div>
</section>
<?php } ?>