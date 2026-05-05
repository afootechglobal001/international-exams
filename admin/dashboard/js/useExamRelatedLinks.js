
$(function () {
	examLinkPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#examLinkPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _createAndUpdateExamLink() {
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const regTitle = $('#regTitle').val().trim();
		const regPix = $("#regPix").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("regTitle", "TITLE");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("regTitle", regTitle);
		formData.append("regPix", regPix);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_createExamLinkCallback(formData);
		},
			title: "Are you sure?",
			message: "Are you sure you want to perform this action? This action is irreversible.",
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndUpdateExamLink());
	}
}

function _createExamLinkCallback(formData){
	let getEachExamLinkPageSession = JSON.parse(sessionStorage.getItem("getEachExamLinkPageSession"));
	let getEachExamLinkDataSession = JSON.parse(sessionStorage.getItem("getEachExamLinkDataSession"));

	const examPageCategoryId = getEachExamLinkPageSession?.pageCategoryId;
	const examPagePublishId= getEachExamLinkPageSession?.publishId;

	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);

	let callUrl= getEachExamLinkDataSession?.publishId ? `admin/publish/exams/exam-related-links/update-exam-related-links?pageCategoryId=${getEachExamLinkDataSession?.pageCategoryId}&parentPublishId=${getEachExamLinkDataSession?.parentPublishId}&publishId=${getEachExamLinkDataSession?.publishId}` : `${endPoint}/admin/publish/exams/exam-related-links/create-exam-related-links?pageCategoryId=${examPageCategoryId}&publishId=${examPagePublishId}`;

	//// call endpoint //////
	_callFileEndPoints({
		url: callUrl,
		formData,
		accessKey: true,
	})
	.then((response) => {
		_staffValidationCheck(response.response);
		if (response.success) {
			const message = response.message;
			const newRegPix = response.regPix;
			const oldRegPix = response.oldRegPix;

			_uploadRelatedLinkPix(newRegPix, oldRegPix, message, examPageCategoryId, examPagePublishId);
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "EXAM RELATED LINK ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
	})
	.catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _createExamLinkCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
	});
}

function _uploadRelatedLinkPix(newRegPix, oldRegPix, message, examPageCategoryId, examPagePublishId) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadRelatedExamPix");
    formData.append("oldRegPix", oldRegPix);
    formData.append("newRegPix", newRegPix);
    formData.append("regPix", uploadedFile);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
                _getEachExamLinkPage(examPageCategoryId, examPagePublishId);
				_alertClose();
            },
            title: 'Success!',
            message: message,
            alertType: 'success',
            trueActionBtnText: 'OK, Thanks.',
        });
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _uploadRelatedLinkPix(newRegPix, oldRegPix, message));
    });
}

function _fetchAllExamLinkData() {
	let getEachExamLinkPageSession = JSON.parse(sessionStorage.getItem("getEachExamLinkPageSession"));

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/exams/exam-related-links/fetch-exam-related-links?pageCategoryId=${getEachExamLinkPageSession?.pageCategoryId}&parentPublishId=${getEachExamLinkPageSession?.publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchExamLinkData(response.data);
			} else {
				_showCustomConfirm({
					title: "RELATED LINK",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW RELATED LINK" onclick="sessionStorage.removeItem('getEachExamLinkDataSession'); _getForm({page: 'relatedLinksReg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW RELATED LINK</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchAllExamLinkData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchAllExamLinkData());
  	}
}

function _initFetchExamLinkData(data) {
  const content = data.map((item) => `
    <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_fetchEachExamLink('${item.pageCategoryId}','${item.parentPublishId}','${item.publishId}', 'edit');">EDIT</button>
            <button class="btn" onclick="_fetchEachExamLink('${item.pageCategoryId}','${item.parentPublishId}','${item.publishId}', 'page');">EDIT PAGE DETAILS</button>
        </div>

        <div class="img-div">
            <img src="${examRelatedLinkPixPath}/${item.regPix}" alt="${item.regTitle}" />
        </div>
        <div class="status-div ${item.statusName}">${item.statusName}</div>
        <div class="text-div">
            <h2>${item.regTitle}</h2>
            <div class="text-in">
                <div class="text">
                    UPDATED ON: <span>${_fetchFormatDate(item.updatedTime)}</span> | <span>200</span> VIEWS
                </div>
            </div>
        </div>
    </div>`).join("");
    $('#pageContent').html(content);
}

function _fetchEachExamLink(pageCategoryId, parentPublishId, publishId, action) {
	$("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/exams/exam-related-links/fetch-exam-related-links?pageCategoryId=${pageCategoryId}&parentPublishId=${parentPublishId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
				const linkData = response.data[0];
    			sessionStorage.setItem("getEachExamLinkDataSession", JSON.stringify(linkData));
				sessionStorage.setItem("pageSummary", JSON.stringify(linkData));

				const publishData = {
					publishId: linkData.publishId,
					pageCategoryId: linkData.pageCategoryId
				};
				sessionStorage.setItem("publishData", JSON.stringify(publishData));
				_getForm({page: action==='edit' ? 'relatedLinksReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachExamLink(pageCategoryId, parentPublishId, publishId, action)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachExamLink(pageCategoryId, parentPublishId, publishId, action));
  	}
}