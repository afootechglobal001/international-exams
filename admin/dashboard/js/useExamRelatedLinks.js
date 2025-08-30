
$(function () {
	examPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#examPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});


function formatDate(date) {
	const options = { day: '2-digit', month: 'short', year: 'numeric' };
	const formattedDate = new Date(date).toLocaleDateString('en-GB', options);
	
	const dateParts = formattedDate.split(' ');
	return `${dateParts[0]} ${dateParts[1]} ${dateParts[2]}`;
}

function _fetchAllExamLinkData() {
	let getEachExamLinkSession = JSON.parse(sessionStorage.getItem("getEachExamLinkSession"));
    $('#pageContent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");        
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/publish/exam-related-links/fetch-exam-related-links?pageCategoryId=${getEachExamLinkSession.pageCategoryId}&parentPublishId=${getEachExamLinkSession.publishId}`,
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
						const pageCategoryId = examInfo.pageCategoryId;
						const publishId = examInfo.publishId;
						const regTitle = examInfo.regTitle;
						const examAbbr = examInfo.examAbbr;
						const regPix = examInfo.regPix;
						const statusName = examInfo.statusName;
						const formattedDate = formatDate(examInfo.updatedTime);

						content +=`
							<div class="grid-div">
								<div class="btn-div">
									<button class="btn active-btn" onclick="_fetchEachStudyAbroad('${pageCategoryId}','${publishId}', 'edit');">EDIT</button>
									<button class="btn" onclick="_fetchEachStudyAbroad('${pageCategoryId}','${publishId}', 'page');">EDIT PAGE DETAILS</button>
								</div>

								<div class="img-div">
									<img src="${regPix}" alt="${regTitle}" />
								</div>
								<div class="status-div ${statusName}">${statusName}</div>
								<div class="text-div">
									<h2>${regTitle}</h2>
									<div class="text-in">
										<div class="text">
											UPDATED ON: <span>${formattedDate}</span> | <span>200</span> VIEWS
										</div>
									</div>
								</div>
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
								<button class="btn" title="ADD NEW INTERNATIONAL EXAM" onclick="_getForm({page: 'examReg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW EXAM</button>
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

function _createExamLink() {
	try {
		let issueCount = 0;
		const regTitle = $('#regTitle').val();
		const regPix = $("#regPix").prop("files")[0];
		const statusId = $('#statusId').val();

		$('#regTitle, #regPix, #statusId').removeClass('issue');
		$('#issue_regTitle, #issue_regPix, #issue_statusId').html('');

		if (!regTitle) {
			$('#regTitle').addClass('issue');
			$('#issue_regTitle').html('USER ERROR! Kindly Provide exam name to continue');
			issueCount++;
		}

		if (!statusId) {
			$('#statusId').addClass("issue");
			$('#issue_statusId').html('USER ERROR! Kindly Select status to continue');
			issueCount++;
		}

		if (issueCount > 0) return;

		const form ={regTitle, regPix, statusId}
		_showCustomConfirm({
			callback: () => {
				_createExamLinkCallback(form);
			},
			title: 'Are you sure?',
			message: 'Are you sure you want to create a new exam? This action is irreversible.',
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

function _createExamLinkCallback(form){
	let getEachExamLinkSession = JSON.parse(sessionStorage.getItem("getEachExamLinkSession"));

	const btnText = $("#submitBtn").html();
	$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
	$("#submitBtn").prop("disabled", true);

	const formData = new FormData();
	formData.append("regTitle", form.regTitle);
	formData.append("regPix", form.regPix);
	formData.append("statusId", form.statusId);

	$.ajax({
		type: "POST",
		url: `${endPoint}/admin/publish/exam-related-links/create-exam-related-links?pageCategoryId=${getEachExamLinkSession?.pageCategoryId}&publishId=${getEachExamLinkSession?.publishId}`,
		data: formData,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,
		headers: getAuthHeaders(true),
		success: function (info) {
			const success = info.success;
			const message = info.message;

			if (success=== true) {
				_showCustomConfirm({
				callback: () => {
					_getActivePage({page:'examRelatedLinks', divid:'publish'});
					_alertClose();
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

// function _uploadExamPix(newRegPix, oldRegPix, message) {
//     const uploadedFile = $("#regPix").prop("files")[0];

//     const formData = new FormData();
//     formData.append("action", "uploadExamPix");
//     formData.append("oldRegPix", oldRegPix);
//     formData.append("newRegPix", newRegPix);
//     formData.append("regPix", uploadedFile);

//     $.ajax({
//         url: adminPortalLocalUrl,
//         type: "POST",
//         data: formData,
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: function () {
// 			_showCustomConfirm({
// 				callback: () => {
// 					_getActivePage({page:'examCategory', divid:'publish'});
// 					_alertClose();
// 				},
// 				title: 'Success!',
// 				message: message,
// 				alertType: 'success',
// 				trueActionBtnText: 'OK, Thanks.',
// 			});
			
			
//         },
//         error: function () {
// 			_showCustomConfirm({
// 				title: 'Upload Error',
// 				message: 'An error occurred while uploading the profile picture! Please try again.',
// 				alertType: 'error',
// 				trueActionBtnText: 'OK, Retry'
// 			});
//         }
//     });
// }

// function _fetchEachExam(pageCategoryId, publishId, action) {
// 	$("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
// 	try {
// 		$.ajax({
// 			type: "GET",
// 			url: `${endPoint}/admin/publish/exams/fetch-exam?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
// 			dataType: "json", 
// 			cache: false,
// 			headers: getAuthHeaders(true),
// 			success: function(info) {
// 				if (info.success && info.data.length > 0) {
// 					sessionStorage.setItem("getEachExamSession", JSON.stringify(info.data[0]));

// 					const publishData = {
// 						publishId: info.data[0].publishId,
// 						pageCategoryId: pageCategoryId
// 					};
// 					sessionStorage.setItem("publishData", JSON.stringify(publishData));
// 					_getForm({page: action==='edit' ? 'examReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
// 				} else {
// 					const response = info.response;
// 					if (response < 100) {
// 						_logOut();
// 					}    
// 				}
// 			},
// 			error: function(textStatus, errorThrown) {
// 				_alertClose();
// 				console.error("AJAX Error: ", textStatus, errorThrown);
// 				_showCustomConfirm({
// 					title: 'Connection Error!',
// 					message: 'An error occurred while fetching exam details! Please try again.',
// 					alertType: 'error',
// 					trueActionBtnText: 'OK, Retry'
// 				});
// 			}
// 		});
// 	} catch (error) {
// 		_alertClose();
// 		console.error("Error: ", error);
// 		_showCustomConfirm({
// 			title: 'Unexpected Error!',
// 			message: 'An unexpected error occurred while fetching exam details! Please try again.',
// 			alertType: 'error',
// 			trueActionBtnText: 'OK, Retry'
// 		});
// 	}
// }