$(document).ready(function () {
  let pageSession = JSON.parse(sessionStorage.getItem("pageSession"));
  if (pageSession == null) {
    _getPageSessionValue("");
  }
});

function _getPageSessionValue(reload) {
  //// call endpoint //////
  _callFetchEndPoints({
    url: `site/session/get-page-session`,
  }).then((response) => {
    sessionStorage.setItem("pageSession", JSON.stringify(response.pageSession));
    if (reload == "reload") {
      window.location.reload();
    }
  });
}

function filters(selectBoxId) {
  var valThis = $("#search" + selectBoxId).val();
  $("#page" + selectBoxId + " > a, .faq-title").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(valThis.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _fetchPagesPictureData(publishId, imageContainer) {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/page-picture/fetch-page-picture?publishId=${publishId}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          $(".bottom-img-div").show();
          _initFetchPagesPictureData(response.data, imageContainer);
        } else {
          $(".bottom-img-div").hide();
        }
        _slideImages();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFetchPagesPictureData(data, imageContainer) {
  const content = data
    .map(
      (item) => `
		<div class="each-img-div" title="Click to Preview" id="img${item.sn}" 
			onclick="_viewPreviewImage('img${item.sn}', '${imageContainer}')">
			<img src="${pagePicturePath}/${item.pictures}" alt="${item.sn}"/> 
		</div>`
    )
    .join("");
  $("#fetchPagePictures").html(content);
}

function _viewPreviewImage(divid, imageContainer) {
  const viewPix = $("#" + divid).html();
  $("#" + imageContainer)
    .html(viewPix)
    .fadeIn(3000);
}

function _slideImages() {
  $(document).ready(function () {
    var container = $(".inner-img-container");
    var imagesCount = $(".each-img-div").length;
    var currentIndex = 0;
    var visibleImages;
    var imageWidth = $(".each-img-div").outerWidth(true);

    function updateVisibleImages() {
      if ($(window).width() <= 767) {
        visibleImages = 1;
      } else {
        visibleImages = 5;
      }
    }

    updateVisibleImages();
    $(window).resize(updateVisibleImages);

    $(document).on("click", ".right-click-btn", function () {
      if (currentIndex < imagesCount - visibleImages) {
        currentIndex++;
        var translateValue = currentIndex * imageWidth;
        container.css("transform", "translateX(-" + translateValue + "px)");
      }
    });

    $(document).on("click", ".left-btn", function () {
      if (currentIndex > 0) {
        currentIndex--;
        var translateValue = currentIndex * imageWidth;
        container.css("transform", "translateX(-" + translateValue + "px)");
      }
    });
  });
}

function _getActiveContactLink(activeMenu) {
  $("#next-kaduna, #next-abuja, #next-ibadan").removeClass("active-btn");
  $("#next-" + activeMenu).addClass("active-btn");
}

function _nextContactPage(nextId, activeMenu) {
  _getActiveContactLink(activeMenu);
  $("#kaduna-hide-div, #abuja-hide-div, #ibadan-hide-div").hide();
  $("#" + nextId).fadeIn(1000);
}

function _setCountrySession() {
  const currentCountry = JSON.parse(localStorage.getItem("websiteCountryId"));
  if (!currentCountry || currentCountry.trim() === "") {
    _switchCountry();
  }
}
function _switchCountry() {
  $("#switchCountryModal").fadeIn(300);
}

function _setWebsiteCountryId(countryId) {
  const currentCountry = JSON.parse(localStorage.getItem("websiteCountryId"));
  if (countryId && countryId.trim() !== "" && currentCountry !== countryId) {
    _callFetchEndPoints({
      url: `${siteSetSessionUrl}?countryId=${countryId}`,
    }).then(() => {
      localStorage.setItem("websiteCountryId", JSON.stringify(countryId));
      window.location.reload();
    });
  } else {
    $("#switchCountryModal").fadeOut(500);
  }
}

function _fetchHeaderContact() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/contact/fetch-header-contact?countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data) {
          const data = response.data[0];

          const smtpUsername = data.smtpUsername;
          const phoneNumber = data.phoneNumber;

          $("#smtpUsername").html(smtpUsername);
          $("#phoneNumber, #examPageContact").html(phoneNumber);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _fetchFooterAddress(containerId) {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/contact/fetch-branch-contact?countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFooterAddress(response.data, containerId);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFooterAddress(data, containerId) {
  let groups = [];
  // Split contacts into groups of 3
  for (let i = 0; i < data.length; i += 3) {
    let eachContact = data.slice(i, i + 3);
    let content = eachContact
      .map(
        (item, index) => `
    <div class="contact-div ${
      index + 1 === eachContact.length ? "no-right-border" : ""
    }">
      <div class="icon-div">
          <i class="bi-geo-alt"></i>
      </div>
      <div class="text-div">
        <h3>${item.branchName}:</h3>
        <div class="text-in">
            <div>${item.address}</div>
            <div class="span">Phone Number: <span>${
              item.phoneNumber
            }</span></div>
            <div class="span">Email: <span>${item.email}</span></div>
        </div>
      </div>
    </div>
    `
      )
      .join("");

    groups.push(`
        <div class="top-footer-contact">
            <div class="top-inner-div">
                <div class="contact-back-div">
                    ${content}
                </div>
            </div>
        </div>
    `);
  }

  // Insert everything into container
  $(`#${containerId}`).html(groups.join(""));
}

function _fetchContactPageInfo() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/contact/fetch-header-contact?countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data) {
          const data = response.data[0];

          const countryName = data.countryName;
          const smtpUsername = data.smtpUsername;
          const phoneNumber = data.phoneNumber;

          $("#contactCountryName").html(countryName);
          $("#ContactSmtpUsername").html(smtpUsername);
          $("#ContactPhoneNumber").html(phoneNumber);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _getAgentModal() {
  _showCustomConfirm({
    title: "Become an Agent",
    message:
      "Become an agent and enjoy massive discounts. Please log in if you already have an account or sign up to get started.",
    alertType: "info",
    trueActionBtnText: "Login",
    falseActionBtn: true,
    falseActionBtnText: "Sign Up",
    trueActionCallback: () => (window.location.href = `${websiteUrl}/portal`),
    falseActionCallback: () =>
      (window.location.href = `${websiteUrl}/portal/sign-up`),
  });
}


function _diplaySuccess(){
  _alertClose();
 _showCustomConfirm({
      title: "Message Sent!",
      message: 'Your Message has been sent successfully',
      alertType: "success",
      trueActionBtnText: "Okay, Thanks",
  });
}



function _fetchPagesPaymentPricingData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/payment-pricing/fetch-payment-pricing?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchPagePaymentPricingData(response.data);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFetchPagePaymentPricingData(data) {
  let content = `
    <div class="details-div">
      <div>Exam Type</div>
      <span>Registration Fees (#)</span>
    </div>
  `;

  content += data
    .map((item) => {
      return `
        <div class="details-div">
          <div>${item.examAbbr}</div>
          <span>${
            item.currency === "USD"
              ? "$" + thousandSeperator(item.amount)
              : "<s>N</s>" + thousandSeperator(item.amount)
          }</span>
        </div>
      `;
    })
    .join("");

  $("#fetchPagesPaymentPricing").html(content);
}


function _sendContactEmail(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const fullName = $('#fullName').val().trim();
		const email = $('#email').val().trim();
    const phoneNumber = $('#inquiryPhoneNumber').val().trim();
    const subject = $('#subject').val().trim();
    const message = $('#message').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("fullName", "FULL NAME");
		issueCount += _validateEmptyValue("email", "EMAIL ADDRESS");
    issueCount += _validateEmail("email", email);
    issueCount += _validateEmptyValue("inquiryPhoneNumber", "PHONE NUMBER");
		issueCount += _validateEmptyValue("subject", "SUBJECT");
    issueCount += _validateEmptyValue("message", " MESSAGE");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = {
      fullName,
      email,
      phoneNumber,
      subject,
      message,
    };

		_sendContactEmailCallback(formData);
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _sendContactEmail());
	}
}

function _sendContactEmailCallback(formData) {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	//// call endpoint //////
	 _callRawEndPoints({
		url: `site/contact/send-contact-mail?countryId=${countryId}`,
		formData,
	})
    .then((response) => {
		if (response.success) {
      _showCustomConfirm({
          title: "Message Sent!",
          message: response.message,
          alertType: "success",
          trueActionBtnText: "Okay, Thanks",
      });
      _alertClose();
      _clearValues();
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "MESSAGE ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _sendContactEmailCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}

function _clearValues() {
  $('#fullName, #email, #inquiryPhoneNumber, #subject, #message').val('');
}