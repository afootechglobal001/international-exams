<?php if ($page == 'editPageForm') { ?>
    <div class="pages-creation-panel">
        <div class="side-bar">
            <div class="div-in">
                <?php include 'page-summary.php' ?>
            </div>
        </div>

        <div class="pages-content-div">
            <div class="title-div">
                <ul>
                    <?php if ($pageCatId == 'examCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'studyAbroadCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'blogCategory') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                        <li title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'galleryCategory') { ?>
                        <li class="active-li" title="UPLOAD PICTURE" id="picturePage" onclick="_getActivePagesTab({divid:'picturePage', page: 'picturePage', url: adminPortalLocalUrl});">UPLOAD PICTURE</li>
                    <?php } ?>

                    <?php if ($pageCatId == 'examRelatedLinks') { ?>
                        <li class="active-li" title="PAGE CONTENT" id="pageContent" onclick="_getActivePagesTab({divid:'pageContent', page: 'pageContent', url: adminPortalLocalUrl});">PAGE CONTENT</li>
                    <?php } ?>

                </ul>
                <button class="close-btn" onclick="_alertClose(<?php echo $modalLayer ?>);" title="Close"><i class="bi-x-lg"></i></button>
            </div>

            <div class="pages-back-div">
                <div id="getPagesDetails">
                    <?php
                    if ($pageCatId == 'galleryCategory') {
                        $page = 'picturePage';
                    } else {
                        $page = 'pageContent';
                    }
                    include 'page-details.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>