function _updateTestimony(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = {
            statusId,
        };

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_updateTestimonyCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to update? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _updateTestimony());
	}
}

function _updateTestimonyCallback(formData) {
	let getEachTestimonySession = JSON.parse(sessionStorage.getItem("getEachTestimonySession"));

	///// get btn text/////
	const btnText = $("#updateBtn").html();
	_btnDisable("updateBtn", btnText, true);
	
	//// call endpoint //////
	 _callRawEndPoints({
		url: `admin/testimony/update-testimony?testimonyId=${getEachTestimonySession?.testimonyId}`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		_staffValidationCheck(response.response);
		if (response.success) {
            _showCustomConfirm({
				callback: () => {
				_getActivePage({page:'testimonyCategory', divid:'publish'});
				_alertClose();
				},
                title: "Testimony Successfull!",
                message: response.message,
                alertType: "success",
                trueActionBtnText: "Okay, Thanks",
            });
			_btnDisable("updateBtn", btnText, false);
		} else {
			_btnDisable("updateBtn", btnText, false);
			_showCustomConfirm({
				title: "TESTIMONY ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _updateTestimonyCallback(formData)); // retry if needed
		_btnDisable("updateBtn", btnText, false);
    });
}

function _fetchTestimonyData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/testimony/fetch-testimony`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchTestimonyData(response.data);
			} else {
				_showCustomConfirm({
					title: "TESTIMONY ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchTestimonyData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchTestimonyData());
  	}
}

function _initFetchTestimonyData(data) {
  	const content = data.map((item) => {
    return `
      <div class="testimony-div">
		<div class="details">
			<div class="text">
				<h3>${item.fullName}</h3>
				<div class="info">
					<div>
						<p>Email: <span>${item.emailAddress}</span></p>
						<p>Phone: <span>${item.mobileNumber}</span></p>
					</div>
					<button class="status-btn ${item.statusName}">${item.statusName}</button>
				</div>
			</div>
		</div>
		<button class="btn" onclick="_fetchEachTestimony('${item.testimonyId}');">VIEW DETAILS</button>
	</div>
    `;
  }).join("");

  $('#pageContent').html(content);
}

function _fetchEachTestimony(testimonyId) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/testimony/fetch-testimony?testimonyId=${testimonyId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("getEachTestimonySession", JSON.stringify(response.data[0]));
                _getForm({page: 'updateTestimony', url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH TESTIMONY ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachTestimony(testimonyId)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachTestimony(testimonyId));
  	}
}