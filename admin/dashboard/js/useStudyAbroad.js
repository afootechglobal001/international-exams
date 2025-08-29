$(function () {
	studyAbroadPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#studyAbroadPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _createAndUpdateStudyAbroad(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const regTitle = $('#regTitle').val().trim();
		const studyAbroadSummary = $('#studyAbroadSummary').val().trim();
		const regPix = $("#regPix").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("regTitle", "TITLE");
		issueCount += _validateEmptyValue("studyAbroadSummary", "SUMMARY");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("regTitle", regTitle);
		formData.append("studyAbroadSummary", studyAbroadSummary);
		formData.append("regPix", regPix);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveStudyAbroadCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to create new study abroad? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndUpdateStudyAbroad());
	}
}

function _saveStudyAbroadCallback(formData) {
    let getEachStudyAbroadSession = JSON.parse(sessionStorage.getItem("getEachStudyAbroadSession"));
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
    let callUrl= getEachStudyAbroadSession?.publishId ? `admin/publish/study-abroad/update-study-abroad?pageCategoryId=${pageCategory.studyAbroadCategory}&publishId=${getEachStudyAbroadSession?.publishId}` : `admin/publish/study-abroad/create-study-abroad?pageCategoryId=${pageCategory.studyAbroadCategory}`;

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

            _uploadStudyAbroadPix(newRegPix, oldRegPix, message);
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "STUDY ABROAD ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveStudyAbroadCallback()); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _uploadStudyAbroadPix(newRegPix, oldRegPix, message) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadStudyAbroadPix");
    formData.append("newRegPix", newRegPix);
    formData.append("oldRegPix", oldRegPix);
    formData.append("regPix", uploadedFile);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
                _getActivePage({page:'studyAbroadCategory', divid:'publish'});
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
		_callAjaxError(() => _uploadStudyAbroadPix());
    });
}

function _fetchStudyAbroadData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategory.studyAbroadCategory}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initfetchStudyAbroadData(response.data);
			} else {
				_showCustomConfirm({
					title: "PAGE ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchStudyAbroadData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchStudyAbroadData());
  	}
}

function _initfetchStudyAbroadData(data) {
  const content = data.map((item) => `
    <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_fetchEachStudyAbroad('${item.pageCategoryId}','${item.publishId}', 'edit');">EDIT</button>
            <button class="btn" onclick="_fetchEachStudyAbroad('${item.pageCategoryId}','${item.publishId}', 'page');">EDIT PAGE DETAILS</button>
        </div>

        <div class="img-div">
            <img src="${studyAbroadPixPath}/${item.regPix}" alt="${item.regTitle}" />
        </div>
        <div class="status-div ${item.statusName}">${item.statusName}</div>
        <div class="text-div">
            <h2>${item.regTitle}</h2>
            <div class="top-text"><span>${item.studyAbroadSummary.substr(0, 120)}...</span></div>
            <div class="text-in">
                <div class="text">
                    UPDATED ON: <span>${_fetchFormatDate(item.updatedTime)}</span> | <span>200</span> VIEWS
                </div>
            </div>
        </div>
    </div>`).join("");
    $('#pageContent').html(content);
}

function _fetchEachStudyAbroad(pageCategoryId, publishId, action) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachStudyAbroadSession", JSON.stringify(response.data[0]));
                const publishData = {
                    publishId: response.data[0].publishId,
                    pageCategoryId: pageCategoryId
                };
                sessionStorage.setItem("publishData", JSON.stringify(publishData));
                _getForm({page: action==='edit' ? 'studyAbroadReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
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
			_callAjaxError(() => _fetchEachStudyAbroad()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachStudyAbroad());
  	}
}