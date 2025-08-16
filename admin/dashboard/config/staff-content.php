<?php if ($page == 'viewStaff') { ?>
    <div class="other-pages-title-back-div" data-aos="fade-in" data-aos-duration="1500">
        <div class="page-title-div">
            <div class="title"><i class="bi-people"></i> <strong>Administrators</strong></div>
            <div class="bottom-title">
                Active: <span id="active-staff">10</span> |
                Suspended: <span>5</span>
            </div>
        </div>

        <div class="other-pages-filter-div">
            <div class="text-field-wrapper">
                <div class="text_field_container search_field_container">
                    <input class="text_field dash_text_field" type="text" id="searchContent" onkeyup="filters('Content')"
                        placeholder="" title="Type here to search staff..." />
                    <div class="placeholder dash_placeholder"><i class="bi-search"></i> Type here to search staff...</div>
                </div>
            </div>

            <div class="btn-div">
                <button class="btn" type="button" title="ADD NEW STAFF"
                    onclick="_getForm({page: 'staffReg', url: adminPortalLocalUrl});">
                    <i class="bi-plus-square"></i> ADD NEW STAFF
                </button>
            </div>
        </div>
    </div>


   
    <div class="tables-content-div">
        <div class="content-title">
            <div class="title">
                <i class="bi bi-people"></i>
                <p>Administrators</p>
            </div>
        </div>

        <div class="inner-table-content">
            <div class="table-div animated fadeIn">
                <table class="table" cellspacing="0" style="width:100%" id="pageContent">
                    <script>_fetchStaffs(); </script>
                </table>
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

                <div class="text_field_container" id="phoneNumber_container">
                    <script>
                        textField({
                            id: 'phoneNumber',
                            title: 'Phone Number',
                            type: 'tel',
                            onKeyPressFunction: 'isNumberCheck(event);'
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
                            <div class="text_field_container" id="countryId_container">
                            <script>
                                selectField({
                                    id: 'countryId',
                                    title: 'Select Country'
                                });
                                _getSelectCountry('countryId');
                            </script>
                        </div>

                        <div class="text_field_back_container">
                            <div class="text_field_container" id="branchId_container">
                            <script>
                                selectField({
                                    id: 'branchId',
                                    title: 'Select Branch'
                                });
                            </script>
                        </div>

                        <div class="text_field_container" id="roleId_container">
                            <script>
                                selectField({
                                    id: 'roleId',
                                    title: 'Select Role'
                                });
                                _getSelectRoleId('roleId');
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

<?php if ($page == 'staffProfile') { ?>
    <script> getEachStaffDetailsSession = JSON.parse(sessionStorage.getItem("getEachStaffDetailsSession"));</script>

    <div class="user-profile-div" data-aos="fade-left" data-aos-duration="900">
        <div class="top-panel-div">
            <div class="inner-top">
                <span><i class="bi-person-check-fill"></i> STAFF PROFILE</span>
                <div class="close" title="Close" onclick="_alertClose(<?php echo $modalLayer ?>);">X</div>
            </div>
        </div>

        <div class="profile-content-div">
            <div class="bg-img">
                <div class="mini-profile">
                    <label>
                        <div class="img-div">
                            <img id="staffProfilePix" src="<?php echo $websiteUrl ?>/uploaded_files/staffPix/default.jpg" alt="Profile Image">
                            <input type="file" id="profilePix" style="display:none" accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .webp, .svg, .avif" onchange="staffProfilePixPreview.UpdatePreview(this);" />
                        </div>

                        <script>
                            $(document).ready(function() {
                                const staffProfilePix = getEachStaffDetailsSession.profilePix;
                                const profilePixUrl = staffProfilePix ? "<?php echo $websiteUrl ?>/uploaded_files/staffPix/" + staffProfilePix : "<?php echo $websiteUrl ?>/uploaded_files/staffPix/default.jpg";

                                $("#staffProfilePix").attr("src", profilePixUrl).attr("alt", getEachStaffDetailsSession.lastName + " Logo");
                            });
                        </script>
                    </label>

                    <div class="text-back-div">
                        <div class="inner-text">
                            <div class="text-div">
                                <div class="name" id="fullName">
                                    <script>
                                        $("#fullName").html(getEachStaffDetailsSession.titleName + ' ' +
                                            getEachStaffDetailsSession.firstName + ' ' + getEachStaffDetailsSession.lastName
                                        );
                                    </script>
                                </div>

                                <div class="text">
                                    <div>
                                        <div id="statusBtn" class="status-btn"><span id="statusName"></span></div>
                                    </div>
                                    | LAST LOGIN DATE:
                                    <strong id="lastLoginTime">
                                        <script>
                                            $("#lastLoginTime").html(getEachStaffDetailsSession.lastLoginTime ?
                                                getEachStaffDetailsSession.lastLoginTime : "00-00-00 00:00:00");
                                        </script>
                                    </strong>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        const statusName = getEachStaffDetailsSession.statusName;
                                        $("#statusName").html(statusName);
                                        $("#statusBtn").addClass(statusName);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field-back-div">
                <div class="field-inner-div" id="get_staff_details">
                    <div class="user-in">
                        <div class="title">STAFF BASIC INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateTitleId_container">
                                <script>
                                    selectField({
                                        id: 'updateTitleId',
                                        title: 'Select Title',
                                        fieldValue: getEachStaffDetailsSession?.titleId ?? '',
                                        fieldLabel: getEachStaffDetailsSession?.titleName ?? ''
                                    });
                                    _getSelectTitle('updateTitleId');
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateFirstName_container">
                                <script>
                                    textField({
                                        id: 'updateFirstName',
                                        title: 'First Name',
                                        value: getEachStaffDetailsSession?.firstName ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateMiddleName_container">
                                <script>
                                    textField({
                                        id: 'updateMiddleName',
                                        title: 'Middle Name',
                                        value: getEachStaffDetailsSession?.middleName ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateLastName_container">
                                <script>
                                    textField({
                                        id: 'updateLastName',
                                        title: 'Last Name',
                                        value: getEachStaffDetailsSession?.lastName ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updatePhoneNumber_container">
                                <script>
                                    textField({
                                        id: 'updatePhoneNumber',
                                        title: 'Phone Number',
                                        type: 'tel',
                                        value: getEachStaffDetailsSession?.phoneNumber ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateEmailAddress_container">
                                <script>
                                    textField({
                                        id: 'updateEmailAddress',
                                        title: 'Email Address',
                                        type: 'email',
                                        value: getEachStaffDetailsSession?.emailAddress ?? ''
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">STAFF RESIDENT INFORMATION</div>
                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="countryId_container">
                                <script>
                                    selectField({
                                        id: 'countryId',
                                        title: 'Select Country',
                                        fieldValue: getEachStaffDetailsSession?.countryId ?? '',
                                        fieldLabel: getEachStaffDetailsSession?.countryName ?? ''
                                    });
                                    _getSelectCountry('countryId');
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="branchId_container">
                                <script>
                                    selectField({
                                        id: 'branchId',
                                        title: 'Select Branch',
                                        fieldValue: getEachStaffDetailsSession?.branchId ?? '',
                                        fieldLabel: getEachStaffDetailsSession?.branchName ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-2" id="updateAddress_container">
                                <script>
                                    textField({
                                        id: 'updateAddress',
                                        title: 'Home Address',
                                        value: getEachStaffDetailsSession?.address ?? ''
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">STAFF ACCOUNT INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-3" id="staffId_container">
                                <script>
                                    textField({
                                        id: 'staffId',
                                        title: 'Staff ID',
                                        readonly: true,
                                        value: getEachStaffDetailsSession?.staffId ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-3" id="createdTime_container">
                                <script>
                                    textField({
                                        id: 'createdTime',
                                        title: 'Date Of Registration',
                                        readonly: true,
                                        value: getEachStaffDetailsSession?.createdTime ?? ''
                                    });
                                </script>
                            </div>

                            <div class="text_field_container col-3" id="lastLoginTime_container">
                                <script>
                                    textField({
                                        id: 'lastLoginTime',
                                        title: 'Last Login Date',
                                        readonly: true,
                                        value: getEachStaffDetailsSession?.lastLoginTime ?? ''
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="user-in">
                        <div class="title">ADMINISTRATIVE INFORMATION</div>

                        <div class="profile-segment-div">
                            <div class="text_field_container col-1" id="updateRoleId_container">
                                <script>
                                    selectField({
                                        id: 'updateRoleId',
                                        title: 'Select Role',
                                        fieldValue: getEachStaffDetailsSession?.roleId ?? '',
                                        fieldLabel: getEachStaffDetailsSession?.roleName ?? ''
                                    });
                                    _getSelectRoleId('updateRoleId');
                                </script>
                            </div>

                            <div class="text_field_container col-1" id="updateStatusId_container">
                                <script>
                                    selectField({
                                        id: 'updateStatusId',
                                        title: 'Select Status',
                                        fieldValue: getEachStaffDetailsSession?.statusId ?? '',
                                        fieldLabel: getEachStaffDetailsSession?.statusName ?? ''
                                    });
                                    _getSelectStatusId('updateStatusId', '1,2');
                                </script>
                            </div>
                        </div>

                        <div class="btn-div">
                            <button class="btn" title="UPDATE PROFILE" id="updateBtn" onclick="_updateStaff();"> UPDATE PROFILE <i class="bi-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>