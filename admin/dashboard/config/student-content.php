<?php if ($page == 'branchCountryStudent') { ?>
    <div class="main-content-div student-content-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="tables-content-div">
            <div class="content-title">
                <div class="title">
                    <i class="bi bi-mortarboard"></i>
                    <p>Students</p>
                </div>

                <div>
                    <button class="btn" title="REGISTER NEW STUDENT" onclick="_getForm({page: 'adminStudentRegForm', layer:2, url: adminPortalLocalUrl});">
                        <i class="bi bi-plus-square"></i> REGISTER NEW STUDENT
                    </button>
                </div>
            </div>

            <div class="inner-table-content">
                <div class="table-div animated fadeIn">
                    <table class="table" cellspacing="0" style="width:100%">
                        <thead>
                            <tr class="tb-col">
                                <th>sn</th>
                                <th>User Name</th>
                                <th>Contact</th>
                                <th>Last Login</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>

                        <tbody id="fetchBranchStudentContent">
                            <script>
                                _fetchBranchStudentData();
                            </script>

                            <tr>
                                <td colspan="8">
                                    <div class="content-loading-div">
                                        <img src="<?php echo $websiteUrl ?>/all-images/images/spinner.gif" alt="Loading" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div id="fetchBranchStudentContentPaginationControls" class="pagination-div"></div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'adminStudentRegForm') { ?>
    <div class="slide-form-div" data-aos="fade-left" data-aos-duration="900">
        <div class="form-title-div">
            <div class="title-div">
                <div class="icon-div"><i class="bi bi-person-fill-add"></i></div>
                <h3 id="pageTitle">REGISTER NEW STUDENT</h3>
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
                <p>You are about to register new student. Please complete the form below with accurate details to successfully register new student</p>
            </div>


            <div class="main-content-div">
                <div class="tables-content-div form-fill-content">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-person-fill-add"></i>
                            <p>Register Student Here</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="fullName-div">
                            <div class="text_field_container" id="firstName_container">
                                <script>
                                    textField({
                                        id: 'firstName',
                                        title: 'First Name',
                                    });
                                </script>
                            </div>
                            <div class="text_field_container" id="lastName_container">
                                <script>
                                    textField({
                                        id: 'lastName',
                                        title: 'Last Name',
                                    });
                                </script>
                            </div>
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

                        <div class="text_field_container" id="phoneNumber_container">
                            <script>
                                textField({
                                    id: 'phoneNumber',
                                    title: 'Phone Number',
                                    type: 'tel'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="userTypeId_container">
                            <script>
                                selectField({
                                    id: 'userTypeId',
                                    title: 'Select User Type'
                                });
                                _getSelectUserType('userTypeId');
                            </script>
                        </div>

                        <div class="text_field_container" id="createPassword_container">
                            <script>
                                textField({
                                    id: 'createPassword',
                                    title: 'Create Password',
                                    type: 'password'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="confirmPassword_container">
                            <script>
                                textField({
                                    id: 'confirmPassword',
                                    title: 'Confirm Password',
                                    type: 'password'
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="btn-div">
                    <button class="btn" title="SUBMIT" id="submitBtn" onclick="_userRegistration();"> <i class="bi-check"></i> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>