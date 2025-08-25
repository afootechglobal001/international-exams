function _fetchStaffs() {
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/staff/fetch-staff`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const fetch = info.data;

				let content = '';
				let no=0;

				content =`
				<thead>
                    <tr class="tb-col">
                        <th>sn</th>
                        <th>User Name</th>
                        <th>Contact</th>
						<th>Staff Branch</th>
                        <th>Role</th>
                        <th>Last Login</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>`;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const staffInfo = fetch[i];
						const staffId = staffInfo.staffId;
						const firstName = staffInfo.firstName;
						const lastName = staffInfo.lastName;
						const titleName = staffInfo.titleName;
						const staffNames = titleName + ' ' + firstName + ' ' + lastName;
						const emailAddress = staffInfo.emailAddress;
						const phoneNumber = staffInfo.phoneNumber;
						const roleName = staffInfo.roleName;
						const countryName = staffInfo.countryName;
						const branchName = staffInfo.branchName;
						const profilePix = staffInfo.profilePix;
						const lastLoginTime = staffInfo.lastLoginTime;
						const statusName = staffInfo.statusName;

						content +=`
						<tbody>
							<tr class="tb-row">
								<td>${no}</td>
								<td class="clickable-td" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">
									<div class="text-back-div">
										<div class="image-div">
											<img src="${websiteUrl}/uploaded_files/staffPix/${profilePix}" alt="${staffNames}"/>
										</div>

										<div class="text-div">
											<div class="first-class">${staffNames}</div>
											<div class="second-class">${staffId}</div>
										</div>
									</div>
								</td>
								<td>
									<div class="text-div">
										<div>${emailAddress}</div> 
										<div>${phoneNumber}</div>
									</div>
								</td>
								<td>
									<div class="text-div">
										<div>${countryName}</div> 
										<div>${branchName}</div>
									</div>
								</td>
								<td>${roleName}</td>
								<td>${lastLoginTime ? lastLoginTime : "00-00-00 00:00:00"}</td>
								<td><div class="status-div ${statusName}">${statusName}</div></td>
								<td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(content);
				} else {
					_showCustomConfirm({
						title: 'Fetch Staff',
						message: info.message,
						alertType: 'warning',
						trueActionBtnText: 'OK'
					});

					$('#pageContent').html(`
					<tbody>
						<tr>
							<td colspan="11">
								<div class="false-notification-div">
					 				<p>${info.message}</p>
									<div>
										<button class="btn" onclick="_getForm({page: 'staffReg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW STAFF</button>
									</div>
								</div>
							</td>
						</tr>
					</tbody>`);
					
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				_showCustomConfirm({
					title: 'Connection Error!',
					message: 'An error occurred while fetching data! Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});

				$('#pageContent').html(`
				<tbody>
					<tr>
						<td colspan="11">
							<div class="false-notification-div">
								<p>An error occurred while fetching data! Please try again.</p>
							</div>
						</td>
					</tr>
				</tbody>`);
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error!',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}


function _fetchEachStaff(staffId) {
	$("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/staff/fetch-staff?staffId=${staffId}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				if (info.success && info.data.length > 0) {
					sessionStorage.setItem("getEachStaffDetailsSession", JSON.stringify(info.data[0]));
					_getForm({page: 'staffProfile', url: adminPortalLocalUrl});
				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
				_alertClose();
				console.error("AJAX Error: ", textStatus, errorThrown);
				_showCustomConfirm({
					title: 'Connection Error!',
					message: 'An error occurred while fetching staff details! Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});
			}
		});
	} catch (error) {
		_alertClose();
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error!',
			message: 'An unexpected error occurred while fetching staff details! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _getSelectCountryStaff(fieldId){
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/preset-data/fetch-country`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].countryId;
						const value = data[i].countryName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\'); _fetchSelectedBranch()">'+ value +'</li>');
					}	
				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error!',
			message: 'An unexpected error occurred while fetching countries! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _fetchSelectedBranch(){
	_getSelectCountryBranch('branchId');
}
function _getSelectCountryBranch(fieldId){
	let $searchList = $('#searchList_' + fieldId);
    $searchList.html('<li>Loading data...</li>');

	const countryId = $('#countryId').val();
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/branch/fetch-branch?countryId=${countryId}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;

				if (success === true) {
					$('#searchList_'+ fieldId).html('');
					for (let i = 0; i < data.length; i++) {
						const id = data[i].branchId;
						const value = data[i].branchName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\')">'+ value +'</li>');
					}	
				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error!',
			message: 'An unexpected error occurred while fetching branches! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
	
}

function _createStaff() {
	try {
		let issueCount = 0;
		const titleId = $('#titleId').val();
		const firstName = $('#firstName').val();
		const middleName = $('#middleName').val();
		const lastName = $('#lastName').val();
		const emailAddress = $('#emailAddress').val();
		const phoneNumber = $('#phoneNumber').val();
		const address = $('#address').val();
		const countryId = $('#countryId').val();
		const branchId = $('#branchId').val();
		const roleId = $('#roleId').val();
		const statusId = $('#statusId').val();

		$('#titleId, #firstName, #middleName, #lastName, #emailAddress, #phoneNumber, #address, #countryId, #branchId, #roleId, #statusId').removeClass('issue');
		$('#issue_titleId, #issue_firstName, #issue_middleName, #issue_lastName, #issue_emailAddress, #issue_phoneNumber, #issue_address, #issue_countryId, #issue_branchId, #issue_roleId, #issue_statusId').html('');

		if (!titleId) {
			$('#titleId').addClass('issue');
			$('#issue_titleId').html('USER ERROR! Kindly Select title to continue');
			issueCount++;
		}

		if (!firstName) {
			$('#firstName').addClass('issue');
			$('#issue_firstName').html('USER ERROR! Kindly Provide first name to continue');
			issueCount++;
		}

		if (!middleName) {
			$('#middleName').addClass("issue");
			$('#issue_middleName').html('USER ERROR! Kindly Provide middle name to continue');
			issueCount++;
		}

		if (!lastName) {
			$('#lastName').addClass("issue");
			$('#issue_lastName').html('USER ERROR! Kindly Provide last name to continue');
			issueCount++;
		}

		if (!emailAddress || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test($('#emailAddress').val())) {
			$('#emailAddress').addClass("issue");
			$('#issue_emailAddress').html('USER ERROR! Kindly Provide a valid email address to continue');
			issueCount++;
		}

		if (!phoneNumber) {
			$('#phoneNumber').addClass("issue");
			$('#issue_phoneNumber').html('USER ERROR! Kindly Provide mobile number to continue');
			issueCount++;
		}

		if (!address) {
			$('#address').addClass("issue");
			$('#issue_address').html('USER ERROR! Kindly Provide full address to continue');
			issueCount++;
		}

		if (!countryId) {
			$('#countryId').addClass("issue");
			$('#issue_countryId').html('USER ERROR! Kindly Select country to continue');
			issueCount++;
		}

		if (!branchId) {
			$('#branchId').addClass("issue");
			$('#issue_branchId').html('USER ERROR! Kindly Select branch to continue');
			issueCount++;
		}

		if (!roleId) {
			$('#roleId').addClass("issue");
			$('#issue_roleId').html('USER ERROR! Kindly Select role to continue');
			issueCount++;
		}

		if (!statusId) {
			$('#statusId').addClass("issue");
			$('#issue_statusId').html('USER ERROR! Kindly Select status to continue');
			issueCount++;
		}

		if (issueCount > 0) return;
		
		const form ={titleId, firstName, middleName, lastName, emailAddress, phoneNumber, address, countryId, branchId, roleId, statusId};
		_showCustomConfirm({
			callback: () => {
				_createStaffCallback(form);
			},
			title: 'Are you sure?',
			message: 'Are you sure you want to create a new staff? This action is irreversible.',
			alertType: 'warning',
			falseActionBtn: true,
		});
	} catch (error) {
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
		$("#submitBtn").prop("disabled", false);
	}
}

function _createStaffCallback(form){
	const btnText = $("#submitBtn").html();
	$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#submitBtn").prop("disabled", true);

	const formData = {
		"titleId": form.titleId,
		"firstName": form.firstName,
		"middleName": form.middleName,
		"lastName": form.lastName,
		"emailAddress": form.emailAddress,
		"phoneNumber": form.phoneNumber,
		"address": form.address,
		"countryId": form.countryId,
		"branchId": form.branchId,
		"roleId": form.roleId,
		"statusId": form.statusId,
	};

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/staff/create-staff`,
		data: JSON.stringify(formData),
		dataType: "json", 
		cache: false,
		headers: getAuthHeaders(true),
		success: function (info) {
			const success = info.success;
			const message = info.message;

			if (success=== true) {
				_showCustomConfirm({
					callback: () => {
						_getActivePage({page:'viewStaff', divid:'staff'});
						_alertClose();
					},
					title: 'Success!',
					message: message,
					alertType: 'success',
					trueActionBtnText: 'OK, Thanks.',
				});
			} else {
				_showCustomConfirm({
					title: 'Create Staff Error',
					message: message,
					alertType: 'warning',
					trueActionBtnText: 'OK'
				});
			}
			$("#submitBtn").html(btnText).prop("disabled", false);
	},
		error: function (error) {
			_showCustomConfirm({
				title: 'Unexpected Error',
				message: 'An unexpected error occurred! Please try again.',
				alertType: 'error',
				trueActionBtnText: 'OK, Retry'
			});
			$("#submitBtn").html(btnText).prop("disabled", false);
		}
	});
}

function _updateStaff() {
	try {
		let issueCount = 0;
		const titleId = $('#updateTitleId').val();
		const firstName = $('#updateFirstName').val();
		const middleName = $('#updateMiddleName').val();
		const lastName = $('#updateLastName').val();
		const emailAddress = $('#updateEmailAddress').val();
		const phoneNumber = $('#updatePhoneNumber').val();
		const address = $('#updateAddress').val();
		const countryId = $('#countryId').val();
		const branchId = $('#branchId').val();
		const roleId = $('#updateRoleId').val();
		const statusId = $('#updateStatusId').val();

		$('#updateTitleId, #updateFirstName, #updateMiddleName, #updateLastName, #updateEmailAddress, #updatePhoneNumber, #updateAddress, #countryId, #branchId, #updateRoleId, #updateStatusId').removeClass('issue');
		$('#issue_updateTitleId, #issue_updateFirstName, #issue_updateMiddleName, #issue_updateLastName, #issue_updateEmailAddress, #issue_updatePhoneNumber, #issue_updateAddress, #issue_countryId, #issue_branchId, #issue_updateRoleId, #issue_updateStatusId').html('');

		if (!titleId) {
			$('#updateTitleId').addClass('issue');
			$('#issue_updateTitleId').html('USER ERROR! Kindly Select title to continue');
			issueCount++;
		}

		if (!firstName) {
			$('#updateFirstName').addClass('issue');
			$('#issue_updateFirstName').html('USER ERROR! Kindly provide first name to continue');
			issueCount++;
		}

		if (!middleName) {
			$('#updateMiddleName').addClass("issue");
			$('#issue_updateMiddleName').html('USER ERROR! Kindly provide middle name to continue');
			issueCount++;
		}

		if (!lastName) {
			$('#updateLastName').addClass("issue");
			$('#issue_updateLastName').html('USER ERROR! Kindly provide last name to continue');
			issueCount++;
		}

		if (!emailAddress || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test($('#updateEmailAddress').val())) {
			$('#updateEmailAddress').addClass("issue");
			$('#issue_updateEmailAddress').html('USER ERROR! Kindly provide valid email address to continue');
			issueCount++;
		}

		if (!phoneNumber) {
			$('#updatePhoneNumber').addClass("issue");
			$('#issue_updatePhoneNumber').html('USER ERROR! Kindly provide valid mobile number to continue');
			issueCount++;
		}

		if (!address) {
			$('#updateAddress').addClass("issue");
			$('#issue_updateAddress').html('USER ERROR! Kindly provide full address to continue');
			issueCount++;
		}

		if (!countryId) {
			$('#countryId').addClass("issue");
			$('#issue_countryId').html('USER ERROR! Kindly select country to continue');
			issueCount++;
		}

		if (!branchId) {
			$('#branchId').addClass("issue");
			$('#issue_branchId').html('USER ERROR! Kindly select branch to continue');
			issueCount++;
		}

		if (!roleId) {
			$('#updateRoleId').addClass("issue");
			$('#issue_updateRoleId').html('USER ERROR! Kindly select role to continue');
			issueCount++;
		}

		if (!statusId) {
			$('#updateStatusId').addClass("issue");
			$('#issue_updateStatusId').html('USER ERROR! Kindly select status to continue');
			issueCount++;
		}

		if (issueCount > 0) return;

		const form ={titleId, firstName, middleName, lastName, emailAddress, phoneNumber, address, countryId, branchId, roleId, statusId};
		_showCustomConfirm({
			callback: () => {
				_updateStaffCallback(form);
			},
			title: 'Are you sure?',
			message: 'Are you sure you want to update a new staff? This action is irreversible.',
			alertType: 'warning',
			falseActionBtn: true,
		});
	} catch (error) {
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
		$("#updateBtn").prop("disabled", false);
	}
}

function _updateStaffCallback(form){
	let getEachStaffDetailsSession = JSON.parse(sessionStorage.getItem("getEachStaffDetailsSession"));

	const btnText = $("#updateBtn").html();
	$("#updateBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#updateBtn").prop("disabled", true);

	const formData = {
		"titleId": form.titleId,
		"firstName": form.firstName,
		"middleName": form.middleName,
		"lastName": form.lastName,
		"emailAddress": form.emailAddress,
		"phoneNumber": form.phoneNumber,
		"address": form.address,
		"countryId": form.countryId,
		"branchId": form.branchId,
		"roleId": form.roleId,
		"statusId": form.statusId,
	};

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/staff/update-staff?staffId=${getEachStaffDetailsSession.staffId}`,
		data: JSON.stringify(formData),
		dataType: "json", 
		cache: false,
		headers: getAuthHeaders(true),
		success: function (info) {
			const success = info.success;
			const message = info.message;

			if (success=== true) {
				_showCustomConfirm({
					callback: () => {
						let getEachStaffDetailsSession =info.data[0];
						sessionStorage.setItem("getEachStaffDetailsSession", JSON.stringify(getEachStaffDetailsSession));

						_getForm({page: 'staffProfile', url: adminPortalLocalUrl});
						_getActivePage({page:'viewStaff', divid:'staff'});
					},
					title: 'Success!',
					message: message,
					alertType: 'success',
					trueActionBtnText: 'OK, Thanks.',
				});
			} else {
				_showCustomConfirm({
					title: 'Update Staff Error',
					message: message,
					alertType: 'warning',
					trueActionBtnText: 'OK'
				});
			}
			$("#updateBtn").html(btnText).prop("disabled", false);
	},
		error: function (error) {
			_showCustomConfirm({
				title: 'Unexpected Error',
				message: 'An unexpected error occurred! Please try again.',
				alertType: 'error',
				trueActionBtnText: 'OK, Retry'
			});
			$("#updateBtn").html(btnText).prop("disabled", false);
		}
	});
}

$(function () {
	staffProfilePixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		_uploadStaffProfilepix();
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#staffProfilePix, #profilePix2').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});


function _uploadStaffProfilepix() {
	try {
		const profilePix = $("#profilePix").prop("files")[0];

		const formData = new FormData();
		formData.append("profilePix", profilePix);

		$.ajax({
			type: "POST",
			url: `${endPoint}/admin/staff/update-staff-picture?staffId=${getEachStaffDetailsSession.staffId}`,
			data: formData,
			dataType: "json",
			contentType: false,
			cache: false,
			processData: false,
			headers: getAuthHeaders(true),
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success === true) {
					let staffLoginData = JSON.parse(sessionStorage.getItem("staffLoginData")) || {};

					if (staffLoginData.data && Array.isArray(staffLoginData.data) && staffLoginData.data.length > 0) {
						staffLoginData.data[0] = info.data[0];
					}

					// also update root-level properties
					Object.keys(info.data[0]).forEach(key => {
						staffLoginData[key] = info.data[0][key];
					});
					sessionStorage.setItem("staffLoginData", JSON.stringify(staffLoginData));

					_uploadStaffPix(info.oldProfilePix, info.profilePix, info.message);
				} else {
					_showCustomConfirm({
						title: 'Update Staff Picture Error',
						message: message,
						alertType: 'warning',
						trueActionBtnText: 'OK'
					});
				}
			},
			error: function (error) {
				_showCustomConfirm({
					title: 'Unexpected Error',
					message: 'An unexpected error occurred while uploading the profile picture! Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});
			}
		});
		
	} catch (error) {
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred while uploading the profile picture! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _uploadStaffPix(oldProfilePix, newProfilePix, message) {
    const uploadedFile = $("#profilePix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadStaffPix");
    formData.append("oldProfilePix", oldProfilePix);
    formData.append("newProfilePix", newProfilePix);
    formData.append("profilePix", uploadedFile);

    $.ajax({
        url: adminPortalLocalUrl,
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function () {
			_showCustomConfirm({
				callback: () => {
						_fetchEachStaff(getEachStaffDetailsSession.staffId);
			_getActivePage({page:'viewStaff', divid:'staff'});
			window.location.reload();
					},
				title: 'Success!',
				message: message,
				alertType: 'success',
				trueActionBtnText: 'OK, Thanks.',
			});
			
			
        },
        error: function () {
			_showCustomConfirm({
				title: 'Upload Error',
				message: 'An error occurred while uploading the profile picture! Please try again.',
				alertType: 'error',
				trueActionBtnText: 'OK, Retry'
			});
        }
    });
}