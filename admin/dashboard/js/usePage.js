
$(function () {
	seoFlyerPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#seoFlyerPreviewPix').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});


function _savePageContent(){
	try {
		tinyMCE.triggerSave();

		////////get all needed values////////////
		let issueCount = 0;
		const pageTitle = $('#pageTitle').val().trim();
		const pageUrl = $('#pageUrl').val().trim();
		const seoKeywords = $('#seoKeywords').val().trim();
		const seoDescription = $('#seoDescription').val().trim();
		const pageContent = $('#pageContents').val();
		const seoFlyer = $("#seoFlyer").prop("files")[0];
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("pageTitle", "PAGE TITLE");
		issueCount += _validateEmptyValue("pageUrl", "PAGE URL");
		issueCount += _validateEmptyValue("seoKeywords", "SEO KEYWORDS");
		issueCount += _validateEmptyValue("seoDescription", "SEO DESCRIPTION");

		if (!pageContent) {
			$("#pageContents").addClass("issue");
			$("#issue_pageContents").html("PAGE CONTENT REQUIRED");
			issueCount += 1;
		}

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("pageTitle", pageTitle);
		formData.append("pageUrl", pageUrl);
		formData.append("seoKeywords", seoKeywords);
		formData.append("seoDescription", seoDescription);
		formData.append("pageContent", pageContent);
		formData.append("seoFlyer", seoFlyer);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_savePageCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to save? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _savePageContent());
	}
}


function _savePageCallback(formData) {
	let publishData = JSON.parse(sessionStorage.getItem("publishData"));

	///// get btn text/////
	const btnText = $("#saveBtn").html();
	_btnDisable("saveBtn", btnText, true);
	
	//// call endpoint //////
	_callFileEndPoints({
		url: `admin/pages/page-content/create-or-update-page?publishId=${publishData?.publishId}&pageCategoryId=${publishData?.pageCategoryId}`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		if (response.success) {
			const message = response.message;
			const oldPageUrl = response.oldPageUrl;
			const oldSeoFlyer = response.oldSeoFlyer;

			const data = response.data[0];
			const publishId = data.publishId;
			const pageCategoryId = data.pageCategoryId;
			const pageUrl = data.pageUrl;
			const pageTitle = data.pageTitle;
			const seoKeywords = data.seoKeywords;
			const seoDescription = data.seoDescription;
			const newSeoFlyer = data.seoFlyer;
			const pageContent = data.pageContent;

			_uploadPagePix(oldSeoFlyer, newSeoFlyer);
			_createPagesFolder(pageCategoryId, publishId, pageUrl, oldPageUrl, pageTitle, seoKeywords, seoDescription, newSeoFlyer, oldSeoFlyer, pageContent, message);
		
			_btnDisable("saveBtn", btnText, false);
		} else {
			_btnDisable("saveBtn", btnText, false);
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
		_callAjaxError(() => _savePageContent()); // retry if needed
		_btnDisable("saveBtn", btnText, false);
    });
}


function _uploadPagePix(oldSeoFlyer, newSeoFlyer) {
    const uploadedFile = $("#seoFlyer").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadPagePix");
    formData.append("oldSeoFlyer", oldSeoFlyer);
    formData.append("newSeoFlyer", newSeoFlyer);
    formData.append("seoFlyer", uploadedFile);

	_callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _uploadPagePix());
    });
}

function _createPagesFolder(pageCategoryId, publishId, pageUrl, oldPageUrl, pageTitle, seoKeywords, seoDescription, newSeoFlyer, oldSeoFlyer, pageContent, message) {
	if(newSeoFlyer==null){
		newSeoFlyer='';
	}
	if(oldPageUrl==null){
		oldPageUrl='';
	}

	const formData = new FormData();
    formData.append("action", "createPagesFolder");
	formData.append("pageCategoryId", pageCategoryId);
	formData.append("publishId", publishId);
	formData.append("pageUrl", pageUrl);
	formData.append("oldPageUrl", oldPageUrl);
	formData.append("pageTitle", pageTitle);
	formData.append("seoKeywords", seoKeywords);
	formData.append("seoDescription", seoDescription);
	formData.append("newSeoFlyer", newSeoFlyer);
	formData.append("oldSeoFlyer", oldSeoFlyer);
	formData.append("pageContent", pageContent);

	_callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
			title: 'Success!',
			message: message,
			alertType: 'success',
			trueActionBtnText: 'OK, Thanks.',
		});
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _createPagesFolder());
    });
}

function _fetchPageContent() {
	let publishData = JSON.parse(sessionStorage.getItem("publishData"));

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/pages/page-content/fetch-page?publishId=${publishData?.publishId}`,
			accessKey: true,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
    			const data = response.data[0];
				const pageUrl = data.pageUrl;
				const pageTitle = data.pageTitle;
				const seoKeywords = data.seoKeywords;
				const seoDescription = data.seoDescription;
				const seoFlyer = data.seoFlyer;
				const pageContent = data.pageContent;

				$('#pageUrl').val(pageUrl);
				$('#pageTitle').val(pageTitle);
				$('#seoKeywords').val(seoKeywords);
				$('#seoDescription').val(seoDescription);
				$('#seoFlyerPreviewPix').attr('src', seoFlyerPixPath + '/' + seoFlyer);
				
				setTimeout(function() {
					tinymce.get('pageContents').setContent(pageContent);
				}, 2000);	
				
			} else {
				_showCustomConfirm({
					title: "PAGE ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				const backResponses = response.backResponses;
				if(backResponses<100){
					_logOut();
				}
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchPageContent()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchPageContent());
  	}
}