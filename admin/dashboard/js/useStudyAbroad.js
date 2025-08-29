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
	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	//// call endpoint //////
	_callFileEndPoints({
		url: `admin/publish/study-abroad/create-study-abroad?pageCategoryId=${pageCategory.studyAbroadCategory}`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		if (response.success) {

			const newRegPix = response.regPix;
            _uploadStudyAbroadPix(newRegPix, message);
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

function _uploadStudyAbroadPix(newRegPix, message) {
    const uploadedFile = $("#regPix").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadStudyAbroadPix");
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
			if (response.success && response.data?.length > 0) {
    			for (let i = 0; i < response.length; i++) {
                    
                    
                    content +=`
                        <div class="grid-div">
                            <div class="btn-div">
                                <button class="btn active-btn" onclick="">EDIT</button>
                                <button class="btn" onclick="_getForm({page: 'editPageForm', pageCatId: 'studyAbroadCategory', url: adminPortalLocalUrl});">EDIT PAGE DETAILS</button>
                            </div>

                            <div class="img-div">
                                <img src="<?php echo $websiteUrl ?>/all-images/study-abroad/study-in-canada.jpg" alt="STUDY IN CANADA" />
                            </div>
                            <div class="status-div ACTIVE">ACTIVE</div>
                            <div class="text-div">
                                <h2>STUDY IN CANADA</h2>
                                <div class="top-text"><span> Canada plays host to more than 180,000 International students in any given... </span></div>
                                <div class="text-in">
                                    <div class="text">
                                        UPDATED ON: <span>25 Jan 2025</span> | <span>200</span> VIEWS
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                $('#pageContent').html(content);	
				
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
			_callAjaxError(() => _fetchStudyAbroadData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchStudyAbroadData());
  	}
}

