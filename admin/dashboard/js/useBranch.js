function _getActiveBranchPage(props) {
	const {
        page = '',
        divid = '',
		pageContainer='getBranchDetails'
    } = props;
	_getBranchPagesActiveLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: adminPortalLocalUrl});
	}
}
function _getBranchPagesActiveLink(divid){
	$('#countryBranchDashboard, #branchesPage, #branchCountryStudent, #examPricingPage').removeClass('active');
	$("#"+divid).addClass('active');
}

function _getSelectBranchManagerId(fieldId){
	let $searchList = $('#searchList_' + fieldId);
    $searchList.html('<li>Loading data...</li>');

	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/staff/fetch-staff?statusId=1`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				$searchList.empty();
				
				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const managerFirstName = data[i].firstName
						const managerLastName = data[i].lastName
						const id = data[i].staffId;
						const value = managerFirstName + ' ' + managerLastName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
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
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _fetchCountryData() {
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/country/fetch-country`,
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
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Number of branches</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>`;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const countryInfo = fetch[i];
						const countryId = countryInfo.countryId;
						const countryName = countryInfo.countryName;
						const email = countryInfo.email;
						const phoneNumber = countryInfo.phoneNumber;
						const statusName = countryInfo.statusName;
						const totalNumberOfBranches = countryInfo.totalNumberOfBranches;

						content +=`
						<tbody>
							 <tr class="tb-row">
								<td>${no}</td>
								<td class="clickable-td" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">${countryName}</td>
								<td>${phoneNumber}<br/><span>${email}</span></td>
								<td>${totalNumberOfBranches}</td>
								<td>
									<div class="status-div ${statusName}">${statusName}</div>
								</td>
								<td><button class="btn view-btn" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(content);
				} else {
					_showCustomConfirm({
						title: 'Fetch Branch Error',
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
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _fetchEachCountry(countryId) {
	$("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/country/fetch-country?countryId=${countryId}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				if (info.success && info.data.length > 0) {
					sessionStorage.setItem("getEachCountrySession", JSON.stringify(info.data[0]));
					_getForm({page: 'branchCountry', url: adminPortalLocalUrl});
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
					message: 'An error occurred while fetching data! Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});
			}
		});
	} catch (error) {
		_alertClose();
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _fetchCountryBranchData() {
	let getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/branch/fetch-branch?countryId=${getEachCountrySession.countryId}`,
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
						<th>Name</th>
						<th>Phone Number</th>
						<th>Address</th>
						<th>Branch Manager</th>
						<th>Number of staff</th>
						<th>Date of Reg.</th>
						<th>Status</th>
						<th>View</th>
					</tr>
				</thead>`;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const branchId = fetch[i].branchId;
						const branchName = fetch[i].branchName;
						const email = fetch[i].email;
						const phoneNumber = fetch[i].phoneNumber;
						const address = fetch[i].address;
						const managerName = fetch[i].managerName;
						const statusName = fetch[i].statusName;
						const totalNumberOfStaff = fetch[i].totalNumberOfStaff;
						const createdTime = fetch[i].createdTime;

						content +=`
						<tbody>
							<tr class="tb-row">
							<td>${no}</td>
							<td class="clickable-td" title="Click to view ${branchName} PROFILE" onclick="_fetchEachCountryBranch('${branchId}');">${branchName}<br /><span>${email}</span></td>
							<td>${phoneNumber}</td>
							<td>${address}</td>
							<td>${managerName}</td>
							<td>${totalNumberOfStaff}</td>
							<td>${createdTime}</td>
							<td>
								<div class="status-div ${statusName}">${statusName}</div>
							</td>
							<td><button class="btn view-btn" title="CLICK TO VIEW ${branchName} PROFILE" onclick="_fetchEachCountryBranch('${branchId}');">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(content);
				} else {
					_showCustomConfirm({
						title: 'Fetch Branch Error',
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
										<button class="btn" onclick="_getForm({page: 'branchReg', layer:2, url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW BRANCH</button>
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
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _fetchEachCountryBranch(branchId) {
	$("#get-more-div-secondary").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/branch/fetch-branch?branchId=${branchId}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				if (info.success && info.data.length > 0) {
					sessionStorage.setItem("getEachBranchSession", JSON.stringify(info.data[0]));
					_getForm({page: 'branchCountryProfile', layer:2, url: adminPortalLocalUrl});
				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				_alertClose(2);
				_showCustomConfirm({
					title: 'Connection Error!',
					message: 'An error occurred while fetching data! Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});
			}
		});
	} catch (error) {
		_alertClose(2);
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}

function _createCountryBranch() {
	try {
		let issueCount = 0;
		const branchName = $('#branchName').val();
		const email = $('#email').val();
		const phoneNumber = $('#phoneNumber').val();
		const address = $('#address').val();
		const managerId = $('#staffId').val();
		const statusId = $('#statusId').val();

		$('#branchName, #email, #phoneNumber, #address, #staffId, #statusId').removeClass('issue');
		$('#issue_branchName, #issue_email, #issue_phoneNumber, #issue_address, #issue_staffId, #issue_statusId').html('');

		if (!branchName) {
			$('#branchName').addClass('issue');
			$('#issue_branchName').html('USER ERROR! Kindly Provide branch name to continue');
			issueCount++;
		}

		if (!email || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
			$('#email').addClass("issue");
			$('#issue_email').html('USER ERROR! Kindly Provide a valid email address to continue');
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

		if (!managerId) {
			$('#staffId').addClass("issue");
			$('#issue_staffId').html('USER ERROR! Kindly Select Branch Manager to continue');
			issueCount++;
		}

		if (!statusId) {
			$('#statusId').addClass("issue");
			$('#issue_statusId').html('USER ERROR! Kindly Select status to continue');
			issueCount++;
		}

		if (issueCount > 0) return;

		const form ={branchName, email, phoneNumber, address, managerId, statusId}
		_showCustomConfirm({
			callback: () => {
				_createCountryBranchCallback(form);
			},
			title: 'Are you sure?',
			message: 'Are you sure you want to create a new branch? This action is irreversible.',
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


function _createCountryBranchCallback(form){
	let getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));

	const btnText = $("#submitBtn").html();
	$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#submitBtn").prop("disabled", true);

	const formData = {
		"branchName": form.branchName,
		"email": form.email,
		"phoneNumber": form.phoneNumber,
		"address": form.address,
		"managerId": form.managerId,
		"statusId": form.statusId,
	};

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/branch/create-branch?countryId=${getEachCountrySession?.countryId}`,
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
						_getActiveBranchPage({divid: 'branchesPage', page: 'branchesPage', url: adminPortalLocalUrl});
						_alertClose(2);
					},
					title: 'Success!',
					message: message,
					alertType: 'success',
					trueActionBtnText: 'OK, Thanks.',
				});
			} else {
				_showCustomConfirm({
					title: 'Create Branch Error',
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


function _updateCountryBranch() {
	try {
		let issueCount = 0;
		const branchName = $('#updateBranchName').val();
		const email = $('#updateEmail').val();
		const phoneNumber = $('#updateBranchPhoneNumber').val();
		const address = $('#updateBranchAddress').val();
		const managerId = $('#updateManagerId').val();
		const statusId = $('#updateStatusId').val();

		$('#updateBranchName, #updateEmail, #updateBranchPhoneNumber, #updateBranchAddress, #updateManagerId, #updateStatusId').removeClass('issue');
		$('#issue_updateBranchName, #issue_updateEmail, #issue_updateBranchPhoneNumber, #issue_updateBranchAddress, #issue_updateManagerId, #issue_updateStatusId').html('');

		if (!branchName) {
			$('#updateBranchName').addClass('issue');
			$('#issue_updateBranchName').html('USER ERROR! Kindly Provide branch name to continue');
			issueCount++;
		}

		if (!email || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
			$('#updateEmail').addClass("issue");
			$('#issue_updateEmail').html('USER ERROR! Kindly Provide a valid email address to continue');
			issueCount++;
		}

		if (!phoneNumber) {
			$('#updateBranchPhoneNumber').addClass("issue");
			$('#issue_updateBranchPhoneNumber').html('USER ERROR! Kindly Provide mobile number to continue');
			issueCount++;
		}

		if (!address) {
			$('#updateBranchAddress').addClass("issue");
			$('#issue_updateBranchAddress').html('USER ERROR! Kindly Provide full address to continue');
			issueCount++;
		}

		if (!managerId) {
			$('#updateManagerId').addClass("issue");
			$('#issue_updateManagerId').html('USER ERROR! Kindly Select Branch Manager to continue');
			issueCount++;
		}

		if (!statusId) {
			$('#updateStatusId').addClass("issue");
			$('#issue_updateStatusId').html('USER ERROR! Kindly Select status to continue');
			issueCount++;
		}

		if (issueCount > 0) return;
		const form ={branchName, email, phoneNumber, address, managerId, statusId}
		_showCustomConfirm({
			callback: () => {
				_updateCountryBranchCallback(form);
			},
			title: 'Are you sure?',
			message: 'You are about to update this branch. This action is irreversible.',
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


function _updateCountryBranchCallback(form){
	let getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));
	let getEachBranchSession = JSON.parse(sessionStorage.getItem("getEachBranchSession"));

	const btnText = $("#updateBtn").html();
	$("#updateBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#updateBtn").prop("disabled", true);

	const formData = {
		"branchName": form.branchName,
		"email": form.email,
		"phoneNumber": form.phoneNumber,
		"address": form.address,
		"managerId": form.managerId,
		"statusId": form.statusId,
	};

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/branch/update-branch?countryId=${getEachCountrySession?.countryId}&branchId=${getEachBranchSession?.branchId}`,
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
						_fetchEachCountryBranch(getEachBranchSession?.branchId);
						_getActiveBranchPage({divid: 'branchesPage', page: 'branchesPage', url: adminPortalLocalUrl});
					},
					title: 'Success!',
					message: message,
					alertType: 'success',
					trueActionBtnText: 'OK, Thanks.',
				});
			} else {
				_showCustomConfirm({
					title: 'Update Branch Error',
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


function fetchCountryExamData() {
	let getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/branch/exam-pricing/fetch-exam-pricing?countryId=${getEachCountrySession?.countryId}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const fetch = info.data;

				let content = '';
				let no=0;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const examInfo = fetch[i];
						const publishId = examInfo.publishId;
						const examAbbr = examInfo.examAbbr;
						const regTitle = examInfo.regTitle;
						const regPix = examInfo.regPix;
						const currency = examInfo.currency;
						const amount = thousandSeperator(examInfo.amount);
						const formattedDate = formatDate(examInfo.createdTime);

						content +=`
							<div class="exam-div country-exam-div" id="publish_${publishId}">
								<div class="exam-image">
									<img src="${websiteUrl}/uploaded_files/examLogo/${regPix}" alt="${regTitle}">
								</div>

								<div class="top-div">
									<button class="delete-btn" id="deleteBtn_${publishId}" title="DELETE" onclick="_deleteExam('${publishId}');">DELETE</button>
								</div>

								<div class="exam-info">
									<h3>${examAbbr}</h3>
									<p>${regTitle}</p>
									<div class="exam-time">
										<p><i class="bi bi-calendar"></i> Updated on: <strong>${formattedDate}</strong></p>
									</div>
								</div>
								<div class="price">${currency} ${amount}</div>
							</div>
						`;
					}
					$('#pageContent').html(content);
				} else {
					_showCustomConfirm({
						title: 'Fetch Exam Error',
						message: info.message,
						alertType: 'warning',
						trueActionBtnText: 'OK'
					});

					$('#pageContent').html(`
						<div class="false-notification-div">
							<p>${info.message}</p>
							<div>
								<button class="btn" title="ADD NEW EXAM PRICING" onclick="_getForm({page: 'examPricingReg', layer:2, url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW EXAM</button>
							</div>
						</div>
					`);
					
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
					<div class="false-notification-div">
						<p>An error occurred while fetching data! Please try again.</p>
					</div>
				`);
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


function _getSelectExams(fieldId){
	let $searchList = $('#searchList_' + fieldId);
    $searchList.html('<li>Loading data...</li>');

	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/publish/exams/fetch-exam?pageCategoryId=${pageCategory.examCategory}&statusId=1`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				if (success === true) {
					$('#searchList_'+ fieldId).html('');

					for (let i = 0; i < data.length; i++) {
						const id = data[i].publishId;
						const value = data[i].examAbbr;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\'); _getSelectFetchExam(\'' + id + '\');">'+ value +'</li>');
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
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}


function _getSelectFetchExam(publishId){
	$('#examPreviewContainer').show();
   	$('#pageContent2').html('<div class="ajax-loader other-pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        

	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/publish/exams/fetch-exam?pageCategoryId=${pageCategory.examCategory}&publishId=${publishId}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				let content = '';

				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const examInfo = data[i];
						const regTitle = examInfo.regTitle;
						const examAbbr = examInfo.examAbbr;
						const regPix = examInfo.regPix;
						const statusName = examInfo.statusName;

						content +=`
							<div class="exams-back-div">
								<div class="exam-div form-exam-div">
									<div class="exam-image">
										<img src="${websiteUrl}/uploaded_files/examLogo/${regPix}" alt="${regTitle}">
									</div>

									<div class="top-div">
										<div class="exam-status ${statusName}">${statusName}</div>
									</div>

									<div class="exam-info">
										<h3>${examAbbr}</h3>
										<p>${regTitle}</p>
									</div>
								</div>
							</div>
						`;
					}
					$('#pageContent2').html(content);
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
			title: 'Unexpected Error',
			message: 'An unexpected error occurred! Please try again.',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
	}
}


function _addExamPricing() {
	try {
		let issueCount = 0;
		const publishId = $('#publishId').val();
		const amount = $('#amount').val();

		$('#publishId, #amount').removeClass('issue');
		$('#issue_publishId, #issue_amount').html('');

		if (!publishId) {
			$('#publishId').addClass('issue');
			$('#issue_publishId').html('USER ERROR! Kindly Select exam to continue');
			issueCount++;
		}

		if (!amount) {
			$('#amount').addClass("issue");
			$('#issue_amount').html('USER ERROR! Kindly Provide exam pricing to continue');
			issueCount++;
		}

		if (issueCount > 0) return;

		const form ={publishId, amount}
		_showCustomConfirm({
			callback: () => {
				_addExamPricingCallback(form);
			},
			title: 'Are you sure?',
			message: 'Are you sure you want to add a new exam pricing? This action is irreversible.',
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


function _addExamPricingCallback(form){
	let getEachCountrySession = JSON.parse(sessionStorage.getItem("getEachCountrySession"));

	const btnText = $("#submitBtn").html();
	$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#submitBtn").prop("disabled", true);

	const formData = {
		"publishId": form.publishId,
		"amount": form.amount,
	};

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/branch/exam-pricing/add-exam-pricing?countryId=${getEachCountrySession?.countryId}&currency=${getEachCountrySession?.currency}`,
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
						_getActiveBranchPage({divid: 'examPricingPage', page: 'examPricingPage', url: adminPortalLocalUrl});
						_alertClose(2);
					},
					title: 'Success!',
					message: message,
					alertType: 'success',
					trueActionBtnText: 'OK, Thanks.',
				});
			} else {
				_showCustomConfirm({
					title: 'Add Exam Pricing Error',
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

function _deleteExam(publishId) {
	try {
		_showCustomConfirm({
			callback: () => {
				_deleteExamCallBack(publishId);
			},
			title: 'Are you sure?',
			message: 'Are you sure to delete this exam pricing? This action is irreversible.',
			alertType: 'warning',
			falseActionBtn: true,
		});

	} catch (error) {
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred. Please try again',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
		btn.html(btnText).prop("disabled", false);
	}
}

function _deleteExamCallBack(publishId) {
	try {
		const btn = $("#deleteBtn_" + publishId);
		const btnText = btn.html();
		btn.html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>').prop('disabled', true);

		$.ajax({
			type: "POST",
			url: `${endPoint}/admin/branch/exam-pricing/delete-exam-pricing?countryId=${getEachCountrySession?.countryId}&publishId=${publishId}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {

				if (info.success) {
					$('#publish_' + publishId).fadeOut(300, function () {
						$(this).remove();
					});

					_showCustomConfirm({
						title: 'Success!',
						message: info.message,
						alertType: 'success',
						trueActionBtnText: 'OK, Thanks.'
					});

				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					} else {
						_showCustomConfirm({
							title: 'Delete Exam Error',
							message: info.message,
							alertType: 'warning',
							trueActionBtnText: 'OK'
						});
					}
				}
				btn.html(btnText).prop("disabled", false);
			},
			error: function(textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				_showCustomConfirm({
					title: 'Unexpected Error',
					message: 'An error occurred while deleting the exam. Please try again.',
					alertType: 'error',
					trueActionBtnText: 'OK, Retry'
				});
				btn.html(btnText).prop("disabled", false);
			}
		});

	} catch (error) {
		console.error("Error: ", error);
		_showCustomConfirm({
			title: 'Unexpected Error',
			message: 'An unexpected error occurred. Please try again',
			alertType: 'error',
			trueActionBtnText: 'OK, Retry'
		});
		btn.html(btnText).prop("disabled", false);
	}
}
