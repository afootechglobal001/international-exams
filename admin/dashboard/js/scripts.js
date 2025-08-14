function _getActivePage(props) {
	const {
        page = '',
        divid = '',
		nav= ''
    } = props;
	_getActiveLink(divid, nav);
	if(page){
		_getPage({page: page, url: adminPortalLocalUrl});
	}
}

function _getActiveLink(divid, nav) {
	_removeClass()
	$('#side-'+divid).addClass('active-li');
	$('#top-'+divid).addClass('active-li');
	$('#mobile-'+divid).addClass('active-li');
	$("#page-title").html($("#_" + divid).html());
	_getNav(nav);
}

function _removeClass(){
	$('#side-dashboard, #side-branch, #side-staff, #side-publish, #side-reports, #side-students, #top-dashboard, #top-staff').removeClass('active-li');
	$('#mobile-dashboard,#mobile-branches,#mobile-staff,#mobile-reports').removeClass('active-li');
}

function _getNav(nav){
	if(nav==''){
		_closeNav();
	}else{
	   	$('#link-products, #link-orders, #link-publish, #link-publish, #link-reports').css({'display':'none'});
		$('#link-'+nav).css({'display':'block'});
	   	$('.side-nav-bg-sub-div').animate({'left':'150px'},200);
	}
}

function _closeNav(){
	$('.side-nav-bg-sub-div').animate({'left':'-100%'},400);
	var x = document.getElementById("menu-div");
	x.innerHTML = '<i class="bi-text-right"></i>';
    $('#side-nav-div').animate({'left':'-150px'},200);
}

function _closeAllNav(){
	_closeNav();
	_removeClass();
}

function _openMenu(){
	var x = document.getElementById("menu-div");
	if (x.innerHTML === '<i class="bi-text-right"></i>') {
	x.innerHTML = '<i class="bi-x-lg"></i>';
		$('#side-nav-div').animate({'left':'0px'},200);
	} else {
	x.innerHTML = '<i class="bi-text-right"></i>';
	_closeAllNav()
	}
}


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
	$('#countryBranchDashboard, #branchesPage').removeClass('active');
	$("#"+divid).addClass('active');
}

function _getActivePagesTab(props) {
	const {
        page = '',
        divid = '',
		pageContainer='getPagesDetails'
    } = props;
	_getActivePagesTabLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: adminPortalLocalUrl});
	}
}
function _getActivePagesTabLink(divid){
	$('#pageContent, #picturePage').removeClass('active-li');
	$("#"+divid).addClass('active-li');
}


function _getActiveStudentPage(props) {
	const {
        page = '',
        divid = '',
		pageContainer='getStudentDetails'
    } = props;
	__getActiveStudentPageLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: adminPortalLocalUrl});
	}
}

function __getActiveStudentPageLink(divid){
	$('#studentDashboard, #studentProfileDetails, #paymentHistory, #walletHistory').removeClass('active');
	$("#"+divid).addClass('active');
}
  
function _open_li(ids){
	$('#'+ids+'-sub-li').toggle('slow');
}

function _toggleProfileDiv() {
    $(".toggle-profile-div").toggle("slow");
}

function _closeProfileDiv(event) {
    if (!$(event.target).closest(".toggle-profile-div, .right-icon-div").length) {
        $(".toggle-profile-div").hide("slow");
    }
}
$(document).on("click", _closeProfileDiv);

function select_search() {
	$(".srch-select").toggle("fast");
}
  
function srch_custom(text){
	$('#srch-text').html(text);
	$('.custom-srch-div').fadeIn(500);
};

function capitalizeFirstLetterOfEachWord(inputText) {
	const words = inputText.toLowerCase().split(' ');
	for (let i = 0; i < words.length; i++) {
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	}
	const result = words.join(' ');
	return result;
}

function isNumber_Check(e) {
    var key = e.keyCode || e.which;

    if (!((key >= 48 && key <= 57))) {
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }
}

function filters(selectBoxId) {
	var valThis = $('#search'+selectBoxId).val();
		$('#page'+selectBoxId+' > tbody .tb-row, .grid-div, .faq-back-div, .testimony-div').each(function() {
		var text = $(this).text();
		(text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
	});
};

function _logOut(){
	sessionStorage.clear();
	window.parent.location.href = adminPortalUrl;
}

function getAuthHeaders(includeAuth = false) {
    return {
        'apiKey': apiKey,
        'userOsBrowser': userOsBrowser,
        'userIpAddress': userIpAddress,
        'userDeviceId': userDeviceId,
        'Authorization': includeAuth ? ('Bearer ' + (loginAccessKey ?? '')) : undefined
    };
}

function _getSelectStatusId(fieldId, statusIds){
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/preset-data/fetch-status?statusId=${statusIds}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;

				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].statusId;
						const value = data[i].statusName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false);
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
	}
}

function _getSelectRoleId(fieldId) {
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/preset-data/fetch-role?loginRoleId=${loginRoleId}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;

				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].roleId;
						const value = data[i].roleName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false); 
					const response = info.response;
					if (response < 100) {
						_logOut();
					}   
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
	}
}


function _getSelectTitle(fieldId){
	try {
		$.ajax({
			type: "GET",
			url: endPoint+'/preset-data/fetch-title',
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].titleId;
						const value = data[i].titleName;
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


function formatDate(date) {
    if (!date) return ""; 
    // If input comes in as YYYY-MM-DD (from <input type="date">)
    if (date.includes('-')) {
        const [year, month, day] = date.split('-');
        return `${year}/${month}/${day}`;
    }
    // If input comes in as DD/MM/YYYY
    if (date.includes('/')) {
        const [day, month, year] = date.split('/');
        return `${year}/${month}/${day}`;
    }
    return date; // fallback
}


function _fetchCountryData() {
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: endPoint + '/admin/country/fetch-country',
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
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Number of branches</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>`;

				if (info.success) {
					for (let i = 0; i < fetch.length; i++) {
						no++;
						const countryId = fetch[i].countryId;
						const countryName = fetch[i].countryName;
						const email = fetch[i].email;
						const phoneNumber = fetch[i].phoneNumber;
						const statusName = fetch[i].statusName;
						const totalNumberOfBranches = fetch[i].totalNumberOfBranches;

						text +=`
						<tbody>
							 <tr class="tb-row">
								<td>${no}</td>
								<td class="clickable-td" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">${countryName}<br /><span>${email}</span></td>
								<td>${phoneNumber}</td>
								<td>${totalNumberOfBranches}</td>
								<td>
									<div class="status-div ${statusName}">${statusName}</div>
								</td>
								<td><button class="btn view-btn" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(text);
				} else {
					_actionAlert(info.message, false);

					text += `
						tbody>
							<tr>
								<td colspan="11">
									<div class="false-notification-div">
										<p>${info.message}</p>
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
				_actionAlert('An error occurred while fetching data! Please try again.', false);
			}
		});
	} catch (error) {
		_alertClose();
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred! Please try again.', false);
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

				let text = '';
				let no=0;

				text =`
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

						text +=`
						<tbody>
							<tr class="tb-row">
							<td>${no}</td>
							<td class="clickable-td" title="Click to view ${branchName} PROFILE" onclick="_getForm({page: 'branchCountryProfile', layer:2, url: adminPortalLocalUrl});">${branchName}<br /><span>${email}</span></td>
							<td>${phoneNumber}</td>
							<td>${address}</td>
							<td>${managerName}</td>
							<td>${totalNumberOfStaff}</td>
							<td>${createdTime}</td>
							<td>
								<div class="status-div ${statusName}">${statusName}</div>
							</td>
							<td><button class="btn view-btn" title="CLICK TO VIEW ${branchName} PROFILE" onclick="">VIEW</button></td>
							</tr>
						</tbody>`;
					}
					$('#pageContent').html(text);
				} else {
					_actionAlert(info.message, false);

					text += `
						tbody>
							<tr>
								<td colspan="11">
									<div class="false-notification-div">
										<p>${info.message}</p>
										<div>
											<button class="btn" onclick="_getForm({page: 'branchReg', layer:2, url: adminPortalLocalUrl});">ADD NEW BRANCH</button>
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


function _createStaff() {
	try {
		let issueCount = 0;
		const titleId = $('#titleId').val();
		const firstName = $('#firstName').val();
		const middleName = $('#middleName').val();
		const lastName = $('#lastName').val();
		const emailAddress = $('#emailAddress').val();
		const phoneNumber = $('#phoneNumber').val();
		const genderId = $('#genderId').val();
		const dateOfBirth = formatDate($('#dateOfBirth').val());
		const stateId = $('#stateId').val();
		const lgaId = $('#lgaId').val(); 
		const address = $('#address').val();
		const roleId = $('#roleId').val();
		const statusId = $('#statusId').val();

		$('#titleId, #firstName, #middleName, #lastName, #emailAddress, #phoneNumber, #genderId, #dateOfBirth, #stateId, #lgaId, #address, #branchId, #roleId, #statusId').removeClass('issue');
		$('#issue_titleId, #issue_firstName, #issue_middleName, #issue_lastName, #issue_emailAddress, #issue_phoneNumber, #issue_genderId, #issue_dateOfBirth, #issue_stateId, #issue_lgaId, #issue_address, #issue_roleId, #issue_statusId').html('');

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

		if (!genderId) {
			$('#genderId').addClass("issue");
			$('#issue_genderId').html('USER ERROR! Kindly Select gender to continue');
			issueCount++;
		}

		if (!dateOfBirth) {
			$('#dateOfBirth').addClass("issue");
			$('#issue_dateOfBirth').html('USER ERROR! Kindly Provide date of birth to continue');
			issueCount++;
		}

		if (!stateId){
			$('#stateId').addClass("issue");
			$('#issue_stateId').html('USER ERROR! Kindly Select state to continue');
			issueCount++;
		}
		
		if (!lgaId){
			$('#lgaId').addClass("issue");
			$('#issue_lgaId').html('USER ERROR! Kindly Select local govt to continue');
			issueCount++;
		}

		if (!address) {
			$('#address').addClass("issue");
			$('#issue_address').html('USER ERROR! Kindly Provide full address to continue');
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
				"genderId": genderId,
				"dateOfBirth": dateOfBirth,
				"stateId": stateId,
				"lgaId": lgaId,
				"address": address,
				"roleId": roleId,
				"titleId": titleId,
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


function _fetchStaffs() {
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/loading.gif" alt="Loading"/></div>').fadeIn("fast");        
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
						<div class="false-notification-div">
							<p>${info.message}</p>
							<div>
								<button class="btn" onclick="_getForm({page: 'staff_reg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW STAFF</button>
							</div>
						</div>`;

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
		const genderId = $('#updateGenderId').val();
		const dateOfBirth = formatDate($('#updateDateOfBirth').val()); 
		const stateId = $('#stateId').val();
		const lgaId = $('#lgaId').val();
		const address = $('#updateAddress').val();
		const roleId = $('#updateRoleId').val();
		const statusId = $('#updateStatusId').val();

		$('#updateTitleId, #updateFirstName, #updateMiddleName, #updateLastName, #updateEmailAddress, #updatePhoneNumber, #updateGenderId, #updateDateOfBirth, #stateId, #lgaId, #updateAddress, #updateRoleId, #updateStatusId').removeClass('issue');
		$('#issue_updateTitleId, #issue_updateFirstName, #issue_updateMiddleName, #issue_updateLastName, #issue_updateEmailAddress, #issue_updatePhoneNumber, #issue_updateGenderId, #issue_updateDateOfBirth, #issue_stateId, #issue_lgaId, #issue_updateAddress, #issue_updateRoleId, #issue_updateStatusId').html('');

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

		if (!genderId) {
			$('#updateGenderId').addClass("issue");
			$('#issue_updateGenderId').html('USER ERROR! Kindly provide valid gender to continue');
			issueCount++;
		}

		if (!dateOfBirth) {
			$('#updateDateOfBirth').addClass("issue");
			$('#issue_updateDateOfBirth').html('USER ERROR! Kindly provide valid date of birth to continue');
			issueCount++;
		}

		if (!stateId) {
			$('#stateId').addClass("issue");
			$('#issue_stateId').html('USER ERROR! Kindly select state to continue');
			issueCount++;
		}

		if (!lgaId) {
			$('#lgaId').addClass("issue");
			$('#issue_lgaId').html('USER ERROR! Kindly select local govt area to continue');
			issueCount++;
		}

		if (!address) {
			$('#updateAddress').addClass("issue");
			$('#issue_updateAddress').html('USER ERROR! Kindly provide full address to continue');
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
				"genderId": genderId,
				"dateOfBirth": dateOfBirth,
				"stateId": stateId,
				"lgaId": lgaId,
				"address": address,
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
						_actionAlert(data.message, true);
						_fetchEachStaff(getEachStaffDetailsSession.staffId);
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

					_uploadStaffPix(info.oldProfilePix, info.profilePix, message);
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