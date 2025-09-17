function _getSelectFaqCategory(fieldId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-faq-category`,
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
					title: "FETCH FAQ CAT ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _getSelectFaqCategory()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _getSelectFaqCategory());
  	}
}

function createAndUpdatefaq(){
	try {
		tinyMCE.triggerSave();

		////////get all needed values////////////
		let issueCount = 0;
		const faqCatId = $('#catId').val().trim();
		const faqQuestion = $('#faqQuestion').val().trim();
		const faqAnswer = $('#faqAnswer').val().trim();
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("catId", "FAQ CATEGORY");
		issueCount += _validateEmptyValue("faqQuestion", "FAQ QUESTION");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		$("#faqAnswer").removeClass("issue");
  		$("#issue_faqAnswer").html("");

		if (!faqAnswer) {
			$("#faqAnswer").addClass("issue");
			$("#issue_faqAnswer").html("FAQ ANSWER REQUIRED");
			issueCount++;
		}

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("faqCatId", faqCatId);
		formData.append("faqQuestion", faqQuestion);
		formData.append("faqAnswer", faqAnswer);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_saveFaqCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to save? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => createAndUpdatefaq());
	}
}

function _saveFaqCallback(formData) {
    let getEachFaqSession = JSON.parse(sessionStorage.getItem("getEachFaqSession"));
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);

    let callUrl= getEachFaqSession?.publishId ? `admin/publish/faq/update-faq?pageCategoryId=${pageCategory.faqCategory}&publishId=${getEachFaqSession?.publishId}` : `admin/publish/faq/create-faq?pageCategoryId=${pageCategory.faqCategory}`;

	//// call endpoint //////
	_callFileEndPoints({
		url: callUrl,
		formData,
		accessKey: true,
	})
    .then((response) => {
        _staffValidationCheck(response.response);
		if (response.success) {
			_showCustomConfirm({
				callback: () => {
					_getActivePage({page:'faqCategory', divid:'publish'});
					_alertClose();
				},
				title: 'Success!',
				message: response.message,
				alertType: 'success',
				trueActionBtnText: 'OK, Thanks.',
			});
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "FAQ ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveFaqCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _fetchFaqData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/faq/fetch-faq?pageCategoryId=${pageCategory.faqCategory}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchFaqData(response.data);
			} else {
				_showCustomConfirm({
					title: "FAQ ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW FAQ" onclick="sessionStorage.removeItem('getEachFaqSession'); _getForm({page: 'faqReg', url: adminPortalLocalUrl});">
								<i class="bi-plus-square"></i> ADD NEW FAQ
							</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchFaqData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchFaqData());
  	}
}

function _initFetchFaqData(data, start = 0) {
  	const content = data.map((item, index) => {
    return `
      <div class="faq-back-div">
        <div class="title-div">
          <div class="num">${start + index + 1}</div>
          <button class="btn" onClick="_fetchEachFaq('${item.pageCategoryId}','${item.publishId}');">
            <i class="bi-pencil-square"></i> 
            <span>${item.faqQuestion}</span>
          </button>
        </div>
        <div class="answer-div">${item.faqAnswer}</div>
      </div>
    `;
  }).join("");

  $('#pageContent').html(content);
}


function _fetchEachFaq(pageCategoryId, publishId) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/faq/fetch-faq?pageCategoryId=${pageCategoryId}&publishId=${publishId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachFaqSession", JSON.stringify(response.data[0]));
                _getForm({page: 'faqReg', url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH FAQ ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachFaq(pageCategoryId, publishId)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachFaq(pageCategoryId, publishId));
  	}
}