$(function () {
	ictCoursesPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#ictCoursesPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _createAndUpdateIctCourses(){
	let getEachIctCoursesSession = JSON.parse(sessionStorage.getItem("getEachIctCoursesSession"));
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const regTitle = $('#regTitle').val().trim();
		const subTitle = $('#courseSubTitle').val().trim();
		const regPix = $("#regPix").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("regTitle", "TITLE");
		issueCount += _validateEmptyValue("courseSubTitle", "SUB TITLE");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("regTitle", regTitle);
		formData.append("subTitle", subTitle);
		formData.append("regPix", regPix);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveIctCoursesCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to create this new ICT Course? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndUpdateIctCourses());
	}
}

function _saveIctCoursesCallback(formData) {
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	let callUrl= getEachIctCoursesSession?.publishId ? `admin/publish/ict-courses/update-ict-courses?pageCategoryId=${pageCategory.ictCourseCategory}&publishId=${getEachIctCoursesSession?.publishId}` : `admin/publish/ict-courses/create-ict-course?pageCategoryId=${pageCategory.ictCourseCategory}`;

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

            _uploadIctCoursesPix(newRegPix, oldRegPix, message);
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "ICT COURSE ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveIctCoursesCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _uploadIctCoursesPix(newRegPix, oldRegPix, message) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadIctCoursesPix");
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
                _getActivePage({page:'ictCourses', divid:'publish'});
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
		_callAjaxError(() => _uploadIctCoursesPix(newRegPix, oldRegPix, message));
    });
}

function _fetchIctCoursesData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategory.ictCourseCategory}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchIctCoursesData(response.data);
			} else {
				_showCustomConfirm({
					title: "FETCH ICT COURSES",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW ICT COURSES" onclick="sessionStorage.removeItem('getEachIctCoursesSession'); _getForm({page: 'ictCoursesReg', url: adminPortalLocalUrl});"><i class="bi-plus-square"></i> ADD NEW ICT COURSES</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchIctCoursesData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchIctCoursesData());
  	}
}

function _initFetchIctCoursesData(data) {
  const content = data.map((item) => `
    <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_fetchIctCourses('${item.pageCategoryId}','${item.publishId}', 'edit');">EDIT</button>
            <button class="btn" onclick="_fetchIctCourses('${item.pageCategoryId}','${item.publishId}', 'page');">EDIT PAGE DETAILS</button>
        </div>

        <div class="img-div">
            <img src="${ictCoursePixPath}/${item.regPix}" alt="${item.regTitle}" />
        </div>
        <div class="status-div ${item.statusName}">${item.statusName}</div>
        <div class="text-div">
			<div class="top-text blog-top-text"><span> ${item.subTitle}</span></div>
            <h2>${item.regTitle}</h2>
            <div class="text-in">
                <div class="text">
                    UPDATED ON: <span>${_fetchFormatDate(item.updatedTime)}</span>
                </div>
            </div>
        </div>
    </div>`).join("");
    $('#pageContent').html(content);
}

function _fetchIctCourses(pageCategoryId, publishId, action) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachIctCoursesSession", JSON.stringify(response.data[0]));
                const publishData = {
                    publishId: response.data[0].publishId,
                    pageCategoryId: pageCategoryId
                };
                sessionStorage.setItem("publishData", JSON.stringify(publishData));
                _getForm({page: action==='edit' ? 'ictCoursesReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
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
			_callAjaxError(() => _fetchIctCourses(pageCategoryId, publishId, action)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchIctCourses(pageCategoryId, publishId, action));
  	}
}