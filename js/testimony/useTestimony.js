function _sendTestimony(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const fullName = $('#fullName').val().trim();
		const emailAddress = $('#emailAddress').val().trim();
        const mobileNumber = $('#mobileNumber').val().trim();
        const testimony = $('#testimony').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("fullName", "FULL NAME");
		issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");
        issueCount += _validateEmail("emailAddress", emailAddress);
		issueCount += _validateEmptyValue("mobileNumber", "MOBILE NUMBER");
        issueCount += _validateEmptyValue("testimony", " TESTIMONY");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = {
            fullName,
            emailAddress,
            mobileNumber,
            testimony,
        };

		_sendTestimonyCallback(formData);
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _sendTestimony());
	}
}

function _sendTestimonyCallback(formData) {
    // Get countryId from localStorage
    const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	//// call endpoint //////
	 _callRawEndPoints({
		url: `site/testimony/send-testimony?countryId=${countryId}`,
		formData,
	})
    .then((response) => {
		if (response.success) {
            _showCustomConfirm({
                title: "Testimony Submitted!",
                message: response.message,
                alertType: "success",
                trueActionBtnText: "Okay, Thanks",
            });
            _alertClose();
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "REVIEW ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _sendTestimonyCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _fetchSiteTestimony() {
    // Get countryId from localStorage
    const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/testimony/fetch-testimony?countryId=${countryId}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchSiteTestimony(response.data);
			} else {
				$('#fetchSiteTestimony').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchSiteTestimony(data) {
  	const content = data.map((item) => `
   		<div class="cg-carousel__slide js-carousel__slide" data-aos="fade-left" data-aos-duration="1200">
			<div class="main-testimonial">
				<div class="img-back-div">
					<div class="img-div">
						<img src="${websiteUrl}/all-images/images/avatar.png" alt="testimonial" />
					</div>

					<div class="icon">
						<i class="bi-quote"></i>
					</div>
				</div>

				<p>${item.testimony}</p>

				<div class="bottom-div">
					<div class="star-div">
						<i class="bi-star-fill"></i>
						<i class="bi-star-fill"></i>
						<i class="bi-star-fill"></i>
						<i class="bi-star-fill"></i>
						<i class="bi-star-fill"></i>
					</div>

					<h5>${item.fullName}</h5>
				</div>
			</div>
		</div>`).join("");
    $('#fetchSiteTestimony').html(content);
	_call_carousel(1);
}