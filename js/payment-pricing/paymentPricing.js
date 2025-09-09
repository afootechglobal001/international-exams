function _fetchPaymentPricingData() {
	// Get countryId from sessionStorage
    const countryId = JSON.parse(sessionStorage.getItem("websiteCountryId"));

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/payment-pricing/fetch-payment-pricing?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchPaymentPricingData(response.data);
			} else {
				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchPaymentPricingData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchPaymentPricingData());
  	}
}

function _initFetchPaymentPricingData(data) {
  	const content = data.map((item) => {
		let incentivesContent = '';
		if (item.incentives) {
			// Parse the TinyMCE HTML with jQuery
			const $temp = $("<div>").html(item.incentives);

			// Loop through all <p> tags
			$temp.find("p").each(function () {
				const text = $(this).html();  // get the <p> text
				incentivesContent += `<div class="check"><i class="bi bi-check"></i> ${text}</div>`;
			});
		}

		return `
		<div class="exam-div pricing-div" data-aos="fade-up" data-aos-duration="1200">
			<div class="image-div">
				<img src="${examPixPath}/${item.regPix}" alt="${item.regTitle}" />
			</div>

			<div class="icon-div">
				<img src="${examLogoPixPath}/${item.examLogo}" alt="${item.regTitle}" />
			</div>

			<div class="text-div">
				<div class="inner-div">
					<div class="top-text">
						<h3>${item.examAbbr}</h3>
						<p>${item.regTitle}</p>
					</div>

					<div class="bottom-div">
						<div class="left-div">
							<span class="price new-price">${item.currency === 'USD' ? '$' + thousandSeperator(item.amount) : '<s>N</s>' + thousandSeperator(item.amount)}</span>
						</div>
					</div>

					<div class="incentive-back-div">
						${incentivesContent}
					</div>
					
					<button class="btn" title="Apply For Exam Now" onclick="_getApplyExamModal();">Apply Now<i class="bi-chevron-right"></i></button>
				</div>
			</div>
		</div>`;
	}).join("");
    
	$('#pageContent').html(content);
}

function _getApplyExamModal() {
	_showCustomConfirm({
		title: "Apply For Exam",
		message: "To apply for this exam, you need to log in or sign up first.",
		alertType: "info",
		trueActionBtnText: "Login",
		falseActionBtn: true,
		falseActionBtnText: "Sign Up",
		trueActionCallback: () => (window.location.href = `${websiteUrl}/portal`),
		falseActionCallback: () => (window.location.href = `${websiteUrl}/portal/sign-up`),
	});
}

