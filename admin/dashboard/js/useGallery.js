$(function () {
	galleryPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#galleryPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function createAndUpdateGallery(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const regTitle = $('#regTitle').val().trim();
		const regPix = $("#regPix").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("regTitle", "GALLERY TITLE");
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
			_saveGalleryCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to save? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => createAndUpdateGallery());
	}
}

function _saveGalleryCallback(formData) {
    let getEachGallerySession = JSON.parse(sessionStorage.getItem("getEachGallerySession"));
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
    let callUrl= getEachGallerySession?.publishId ? `admin/publish/gallery/update-gallery?pageCategoryId=${pageCategory.galleryCategory}&publishId=${getEachGallerySession?.publishId}` : `admin/publish/gallery/create-gallery?pageCategoryId=${pageCategory.galleryCategory}`;

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

            _uploadGalleryPix(newRegPix, oldRegPix, message);
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "GALLERY ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveGalleryCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _uploadGalleryPix(newRegPix, oldRegPix, message) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadGalleryPix");
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
                _getActivePage({page:'galleryCategory', divid:'publish'});
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
		_callAjaxError(() => _uploadGalleryPix(newRegPix, oldRegPix, message));
    });
}

function _fetchGalleryData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/gallery/fetch-gallery?pageCategoryId=${pageCategory.galleryCategory}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchGalleryData(response.data);
			} else {
				_showCustomConfirm({
					title: "GALLERY ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW GALLERY" onclick="sessionStorage.removeItem('getEachGallerySession'); _getForm({page: 'galleryReg', url: adminPortalLocalUrl});">
								<i class="bi-plus-square"></i> ADD NEW GALLERY
							</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchGalleryData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchGalleryData());
  	}
}

function _initFetchGalleryData(data) {
  const content = data.map((item) => `
    <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_fetchEachGallery('${item.pageCategoryId}','${item.publishId}', 'edit');">EDIT</button>
            <button class="btn" onclick="_fetchEachGallery('${item.pageCategoryId}','${item.publishId}', 'page');">EDIT PAGE DETAILS</button>
        </div>

        <div class="img-div">
            <img src="${galleryPixPath}/${item.regPix}" alt="${item.regTitle}" />
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

function _fetchEachGallery(pageCategoryId, publishId, action) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/gallery/fetch-gallery?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachGallerySession", JSON.stringify(response.data[0]));
                const publishData = {
                    publishId: response.data[0].publishId,
                    pageCategoryId: pageCategoryId
                };
                sessionStorage.setItem("publishData", JSON.stringify(publishData));
                _getForm({page: action==='edit' ? 'galleryReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH GALLERY ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachGallery(pageCategoryId, publishId, action)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachGallery(pageCategoryId, publishId, action));
  	}
}