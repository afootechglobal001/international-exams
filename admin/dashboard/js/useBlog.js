$(function () {
	blogPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blogPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _getSelectBlogCategory(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-blog-category`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].catId;
                    const value = response.data[i].catName;
                    $('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
                }
			} else {
				_showCustomConfirm({
					title: "FETCH BLOG CAT ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _getSelectBlogCategory()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _getSelectBlogCategory());
  	}
}

function createAndUpdateBlog(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const regTitle = $('#regTitle').val().trim();
        const blogCatId = $('#catId').val().trim();
		const regPix = $("#regPix").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("regTitle", "TITLE");
		issueCount += _validateEmptyValue("catId", "BLOG CATEGORY");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("regTitle", regTitle);
		formData.append("blogCatId", blogCatId);
		formData.append("regPix", regPix);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveBlogCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to save? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => createAndUpdateBlog());
	}
}

function _saveBlogCallback(formData) {
    let getEachBlogSession = JSON.parse(sessionStorage.getItem("getEachBlogSession"));
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
    let callUrl= getEachBlogSession?.publishId ? `admin/publish/blog/update-blog?pageCategoryId=${pageCategory.blogCategory}&publishId=${getEachBlogSession?.publishId}` : `admin/publish/blog/create-blog?pageCategoryId=${pageCategory.blogCategory}`;

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

            _uploadBlogPix(newRegPix, oldRegPix, message);
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "BLOG ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveBlogCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _uploadBlogPix(newRegPix, oldRegPix, message) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadBlogPix");
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
                _getActivePage({page:'blogCategory', divid:'publish'});
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
		_callAjaxError(() => _uploadBlogPix(newRegPix, oldRegPix, message));
    });
}

function _fetchBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/blog/fetch-blog?pageCategoryId=${pageCategory.blogCategory}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchBlogData(response.data);
			} else {
				_showCustomConfirm({
					title: "BLOG ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW BLOG" onclick="sessionStorage.removeItem('getEachBlogSession'); _getForm({page: 'blogReg', url: adminPortalLocalUrl});">
                                <i class="bi-plus-square"></i> ADD NEW BLOG
                            </button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchBlogData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchBlogData());
  	}
}

function _initFetchBlogData(data) {
  const content = data.map((item) => `
    <div class="grid-div">
        <div class="btn-div">
            <button class="btn active-btn" onclick="_fetchEachBlog('${item.pageCategoryId}','${item.publishId}', 'edit');">EDIT</button>
            <button class="btn" onclick="_fetchEachBlog('${item.pageCategoryId}','${item.publishId}', 'page');">EDIT PAGE DETAILS</button>
        </div>

        <div class="img-div">
            <img src="${blogPixPath}/${item.regPix}" alt="${item.regTitle}" />
        </div>
        <div class="status-div ${item.statusName}">${item.statusName}</div>
        <div class="text-div">
            <div class="top-text blog-top-text"><span> ${item.blogCatName}</span></div>
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

function _fetchEachBlog(pageCategoryId, publishId, action) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/blog/fetch-blog?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachBlogSession", JSON.stringify(response.data[0]));
                const publishData = {
                    publishId: response.data[0].publishId,
                    pageCategoryId: pageCategoryId
                };
                sessionStorage.setItem("publishData", JSON.stringify(publishData));
                _getForm({page: action==='edit' ? 'blogReg' : 'editPageForm', pageCatId: pageCategoryId, url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH BLOG ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachBlog()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachBlog());
  	}
}