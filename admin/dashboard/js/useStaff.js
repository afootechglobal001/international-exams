function _fetchStaffs() {
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: endPoint + '/admin/staff/fetch-staff',
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const fetch = info.data;

				let text = '';
				let no=0;

				text =`
				<thead>
                    <tr class="tb-col">
                        <th>sn</th>
                        <th>User Name</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>Last Login</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>`;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const staffId = fetch[i].staffId;
						const firstName = fetch[i].firstName;
						const lastName = fetch[i].lastName;
						const titleName = fetch[i].titleName;
						const staffNames = titleName + ' ' + firstName + ' ' + lastName;
						const emailAddress = fetch[i].emailAddress;
						const phoneNumber = fetch[i].phoneNumber;
						const roleName = fetch[i].roleName;
						const profilePix = fetch[i].profilePix;
						const lastLoginTime = fetch[i].lastLoginTime;
						const statusName = fetch[i].statusName;

						text +=`
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
								<td>${roleName}</td>
								<td>${lastLoginTime ? lastLoginTime : "00-00-00 00:00:00"}</td>
								<td><div class="status-div ${statusName}">${statusName}</div></td>
								<td><button class="btn view-btn" title="Click to view staff profile" onclick="_fetchEachStaff('${staffId}');">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(text);
				} else {
					_actionAlert(info.message, false);

					text +=`
						tbody>
							<tr>
								<td colspan="11">
									<div class="false-notification-div">
										<p>${info.message}</p>
										<div>
											<button class="btn" onclick="_getForm({page: 'staff_reg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW STAFF</button>
										</div>
									</div>
								</td>
							</tr>
						</tbody>`;
						$('#pageContent').html(text);
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				_actionAlert('An error occurred while fetching data! Please try again.', false);
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred! Please try again.', false);
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
				console.error("AJAX Error: ", textStatus, errorThrown);
				_actionAlert('An error occurred while fetching data! Please try again.', false);
			}
		});
	} catch (error) {
		_alertClose();
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred! Please try again.', false);
	}
}

function _getSelectBranch(fieldId){
	try {
		$.ajax({
			type: "GET",
			url: endPoint +'/admin/branch/fetch-branch?statusId=1',
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].branchId;
						const value = data[i].branchName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false); 
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
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
		const branchId = $('#branchId').val();
		const roleId = $('#roleId').val();
		const statusId = $('#statusId').val();

		$('#titleId, #firstName, #middleName, #lastName, #emailAddress, #phoneNumber, #address, #branchId, #roleId, #statusId').removeClass('issue');
		$('#issue_titleId, #issue_firstName, #issue_middleName, #issue_lastName, #issue_emailAddress, #issue_phoneNumber, #issue_address, #issue_branchId, #issue_roleId, #issue_statusId').html('');

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
		
		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btnText = $("#submitBtn").html();
			$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
			$("#submitBtn").prop("disabled", true);

			const formData = {
				"titleId": titleId,
				"firstName": firstName,
				"middleName": middleName,
				"lastName": lastName,
				"emailAddress": emailAddress,
				"phoneNumber": phoneNumber,
				"address": address,
				"branchId": branchId,
				"roleId": roleId,
				"statusId": statusId,
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
						_actionAlert(message, true);
						_getActivePage({page:'viewStaff', divid:'staff'});
						_alertClose();
					} else {
						_actionAlert(message, false);
					}
					$("#submitBtn").html(btnText).prop("disabled", false);
			},
				error: function (error) {
					_actionAlert('An error occurred while processing your request! Please Try Again', false);
					$("#submitBtn").html(btnText).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred! Please Try Again', false);
		$("#submitBtn").prop("disabled", false);
	}
}

function _updateStaff() {
	let getEachStaffDetailsSession = JSON.parse(sessionStorage.getItem("getEachStaffDetailsSession"));
	try {
		let issueCount = 0;
		const titleId = $('#updateTitleId').val();
		const firstName = $('#updateFirstName').val();
		const middleName = $('#updateMiddleName').val();
		const lastName = $('#updateLastName').val();
		const emailAddress = $('#updateEmailAddress').val();
		const phoneNumber = $('#updatePhoneNumber').val();
		const address = $('#updateAddress').val();
		const branchId = $('#updateBranchId').val();
		const roleId = $('#updateRoleId').val();
		const statusId = $('#updateStatusId').val();

		$('#updateTitleId, #updateFirstName, #updateMiddleName, #updateLastName, #updateEmailAddress, #updatePhoneNumber, #updateAddress, #updateBranchId, #updateRoleId, #updateStatusId').removeClass('issue');
		$('#issue_updateTitleId, #issue_updateFirstName, #issue_updateMiddleName, #issue_updateLastName, #issue_updateEmailAddress, #issue_updatePhoneNumber, #issue_updateAddress, #issue_updateBranchId, #issue_updateRoleId, #issue_updateStatusId').html('');

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

		if (!branchId) {
			$('#updateBranchId').addClass("issue");
			$('#issue_updateBranchId').html('USER ERROR! Kindly select branch to continue');
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

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btnText = $("#updateBtn").html();
			$("#updateBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
			$("#updateBtn").prop("disabled", true);

			const formData = {
				"titleId": titleId,
				"firstName": firstName,
				"middleName": middleName,
				"lastName": lastName,
				"emailAddress": emailAddress,
				"phoneNumber": phoneNumber,
				"address": address,
				"branchId": branchId,
				"roleId": roleId,
				"statusId": statusId
			};

			$.ajax({
				type: "POST",
				url: `${endPoint}/admin/staff/update-staff?staffId=${getEachStaffDetailsSession.staffId}`,
				data: JSON.stringify(formData),
				dataType: "json", 
				cache: false,
				headers: getAuthHeaders(true),
				processData: false,
				success: function (data) {
					if (data.success) {
						
						let getEachStaffDetailsSession =data.data[0];
						sessionStorage.setItem("getEachStaffDetailsSession", JSON.stringify(getEachStaffDetailsSession));

						_actionAlert(data.message, true);
						_getForm({page: 'staffProfile', url: adminPortalLocalUrl});
						_getActivePage({page:'viewStaff', divid:'staff'});
					} else {
						_actionAlert(data.message, false);
					}
					$("#updateBtn").html(btnText).prop("disabled", false);
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request! Please Try Again', false);
					$("#updateBtn").html(btnText).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred! Please Try Again', false);
		$("#updateBtn").prop("disabled", false);
	}
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
					_actionAlert(message, false);
				}
			},
			error: function (error) {
				_actionAlert('An error occurred while processing your request! Please Try Again', false);
			}
		});
		
	} catch (error) {
		_actionAlert('An unexpected error occurred! Please Try Again', false);
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
			_actionAlert(message, true);
			
			_fetchEachStaff(getEachStaffDetailsSession.staffId);
			_getActivePage({page:'viewStaff', divid:'staff'});
			window.location.reload();
        },
        error: function () {
            _actionAlert('Upload failed! Please try again.', false);
        }
    });
}