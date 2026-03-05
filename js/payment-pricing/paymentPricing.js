function _fetchPaymentPricingData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/payment-pricing/fetch-payment-pricing?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchPaymentPricingData(response.data);
        } else {
          $("#pageContent").html(`
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

function _initFetchPaymentPricingData(data) {
  const content = data
    .map((item) => {
      let incentivesContent = "";
      if (item.incentives) {
        // Parse the TinyMCE HTML with jQuery
        const $temp = $("<div>").html(item.incentives);

        // Loop through all <p> tags
        $temp.find("p").each(function () {
          const text = $(this).html(); // get the <p> text
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
							<span class="price new-price">${
                item.currency === "USD"
                  ? "$" + thousandSeperator(item.amount)
                  : "<s>N</s>" + thousandSeperator(item.amount)
              }</span>
						</div>
					</div>

					<div class="incentive-back-div">
						${incentivesContent}
					</div>
					<a href="${websiteUrl}/exam-registration" title="REGISTER FOR EXAMS">
					<button class="btn" title="Apply For Exam Now">Apply Now<i class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>`;
    })
    .join("");

  $("#pageContent").html(content);
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
    falseActionCallback: () =>
      (window.location.href = `${websiteUrl}/portal/sign-up`),
  });
}

function _fetchTablePaymentPricingData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/payment-pricing/fetch-payment-pricing?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchTablePaymentPricingData(response.data);
          _initFetchTableLecturePricingData(response.data);
        } else {
          $("#fetchTablePaymentPricingData").html(`
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

function _initFetchTablePaymentPricingData(data, start = 0) {
  const content = data
    .map(
      (item, i) => `
      <tr class="tb-row">
        <td>${start + i + 1}</td>
        <td>${item.examAbbr}</td>
        <td>${item.currency === "USD" ? "$" + thousandSeperator(item.amount) : "<s>N</s>" + thousandSeperator(item.amount)}</td>
      </tr>`
    )
    .join("");

  $("#fetchTablePaymentPricingData").html(content);
}

function _initFetchTableLecturePricingData(data, start = 0) {
  const content = data
    .map(
      (item, i) => `
      <tr class="tb-row">
        <td>${start + i + 1}</td>
        <td>${item.examAbbr}</td>
        <td>${item.currency === "USD" ? "$" + thousandSeperator(item.physicalLectureAmount) : "<s>N</s>" + thousandSeperator(item.physicalLectureAmount)}</td>
        <td>${item.currency === "USD" ? "$" + thousandSeperator(item.onlineLectureAmount) : "<s>N</s>" + thousandSeperator(item.onlineLectureAmount)}</td>
      </tr>`
    )
    .join("");

  $("#fetchTableLecturePricingData").html(content);
}

function _fetchAccountDetails() {
   // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/payment-pricing/fetch-payment-pricing?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
    })
      .then((response) => {
        if (response.success && response.data) {
          const data = response.data[0];
          ////// Naira Account Details //////
          const accountName = data?.accountData?.accountName;
          const accountNumber = data?.accountData?.accountNumber;
          const bankName = data?.accountData?.bankName;

           ////// Dollar Account Details //////
          const dollarAccountName = data?.accountData?.dollarAccountName;
          const dollarAccountNumber = data?.accountData?.dollarAccountNumber;
          const dollarAccountBank = data?.accountData?.dollarAccountBank;
          

          $("#accountName").html(accountName);
          $("#accountNumber").html(accountNumber);
          $("#bankName").html(bankName);

          $("#dollarAccountName").html(dollarAccountName);
          $("#dollarAccountNumber").html(dollarAccountNumber);
          $("#dollarAccountBank").html(dollarAccountBank);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}