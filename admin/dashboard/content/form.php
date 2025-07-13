<?php if ($view_content == 'edit_page_form') { ?>
    <div class="pages-creation-panel">
        <div class="side-bar">
            <div class="div-in">
                <?php include 'page-summary.php' ?>
            </div>
        </div>

        <div class="pages-content-div">
            <div class="title-div">
                <ul>
                    <?php if ($page_category_id == 'event_category') { ?>
                        <li class="active-li" title="Page Content" id="page_content" onclick="_check_page_content('page_content','page-content', '<?php echo $publish_id ?>')">Page Content </li>
                    <?php } ?>

                    <?php if ($page_category_id == 'gallery_category') { ?>
                        <li title="Upload Picture" id="picture_page" onclick="_check_page_content('picture_page','picture-page', '<?php echo $publish_id ?>')">Upload Picture</li>
                    <?php } ?>

                    <?php if ($page_category_id == 'blog_category') { ?>
                        <li class="active-li" title="Page Content" id="page_content" onclick="_check_page_content('page_content','page-content', '<?php echo $publish_id ?>')">Page Content </li>
                        <li title="Upload Picture" id="picture_page" onclick="_check_page_content('picture_page','picture-page', '<?php echo $publish_id ?>')">Upload Picture</li>
                    <?php } ?>
                </ul>
                <button class="close-btn" onclick="_alert_close()" title="Close"><i class="bi-x-lg"></i></button>
            </div>

            <div class="pages-back-div">
                <div id="get_pages_details">
                    <?php
                    if ($page_category_id == 'gallery_category') {
                        $page = 'picture-page';
                    } else {
                        $page = 'page-content';
                    }
                    include 'page-details.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php if ($page == 'staffReg') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
    <div class="title-panel-div">
        <div class="inner-top">
            <span id="panel-title"><i class="bi-plus-square"></i> ADD A NEW STAFF</span>
            <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
        </div>
    </div>

    <div class="container-back-div">
        <div class="inner-container">
            <div>
                <div class="alert alert-success form-alert">Kindly fill the form below to <span> ADD A NEW STAFF</span>
                </div>
            </div>

            <div class="cam-pix" onClick="takeSnapShot()" id="cam-pix">
                <img src="<?php echo $websiteUrl ?>/images/sample.jpg" />
            </div>

            <div class="text_field_container" id="titleId_container">
                <script>
                selectField({
                    id: 'titleId',
                    title: 'Select Title'
                });
                _getSelectTitle('titleId');
                </script>
            </div>

            <div class="text_field_container" id="firstName_container">
                <script>
                textField({
                    id: 'firstName',
                    title: 'First Name'
                });
                </script>
            </div>

            <div class="text_field_container" id="middleName_container">
                <script>
                textField({
                    id: 'middleName',
                    title: 'Middle Name'
                });
                </script>
            </div>

            <div class="text_field_container" id="lastName_container">
                <script>
                textField({
                    id: 'lastName',
                    title: 'Last Name'
                });
                </script>
            </div>

            <div class="text_field_container" id="emailAddress_container">
                <script>
                textField({
                    id: 'emailAddress',
                    title: 'Email Address',
                    type: 'email'
                });
                </script>
            </div>

            <div class="text_field_container" id="mobileNumber_container">
                <script>
                textField({
                    id: 'mobileNumber',
                    title: 'Phone Number',
                    type: 'tel',
                    onKeyPressFunction: 'isNumberCheck(event);'
                });
                </script>
            </div>

            <div class="text_field_container" id="genderId_container">
                <script>
                selectField({
                    id: 'genderId',
                    title: 'Select Gender'
                });
                _getSelectGender('genderId');
                </script>
            </div>

            <div class="text_field_container" id="dateOfBirth_container">
                <script>
                textField({
                    id: 'dateOfBirth',
                    title: 'Date Of Birth',
                    type: 'date'
                });
                </script>
            </div>

            <div class="text_field_container" id="stateId_container">
                <script>
                selectField({
                    id: 'stateId',
                    title: 'Select Branch State',
                });
                _getSelectGeneralState('stateId');
                </script>
            </div>

            <div class="text_field_container" id="lgaId_container">
                <script>
                selectField({
                    id: 'lgaId',
                    title: 'Select Branch Local Govt Area'
                });
                </script>
            </div>

            <div class="text_field_container" id="address_container">
                <script>
                textField({
                    id: 'address',
                    title: 'Home Address'
                });
                </script>
            </div>


            <div class="alert alert-success form-alert">
                <span>ADMINISTRATIVE INFORMATION</span>
                <div class="text_field_back_container">
                    <div class="text_field_container" id="branchId_container">
                        <script>
                        selectField({
                            id: 'branchId',
                            title: 'Select Branch'
                        });
                        _getSelectBranch('branchId');
                        </script>
                    </div>

                    <div class="text_field_container" id="roleId_container">
                        <script>
                        selectField({
                            id: 'roleId',
                            title: 'Select Role'
                        });
                        _getSelectRole('roleId');
                        </script>
                    </div>

                    <div class="text_field_container" id="statusId_container">
                        <script>
                        selectField({
                            id: 'statusId',
                            title: 'Select Status'
                        });
                        _getSelectStatusId('statusId', '1,2');
                        </script>
                    </div>
                </div>
            </div>

            <div>
                <button class="btn" title="SUBMIT" id="submitBtn" onclick="_createStaff();"> <i class="bi-check"></i>
                    SUBMIT </button>
            </div>
        </div>
    </div>
</div>
<?php } ?>