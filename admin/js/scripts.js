function _nextLoginPage(props) {
  const { page = "" } = props;
  _getPage({ page: page, url: adminLocalUrl });
}

$(document).ready(function () {
  function trim(s) {
    return s.replace(/^\s*/, "").replace(/\s*$/, "");
  }
  $("#viewLogin").keydown(function (e) {
    if (e.keyCode == 13) {
      _confirmLogin();
    }
  });
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////// ADMIN LOGIN FUNCTION ////////
function _confirmLogin() {
  try {
    let issueCount = 0;
    const userName = $("#userName").val().trim();
    const password = $("#password").val().trim();

    $("#userName, #password").removeClass("issue");
    $("#issue_userName, #issue_password").html("");

    if (!userName || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(userName)) {
      $("#userName").addClass("issue");
      $("#issue_userName").html(
        "USER ERROR! Kindly provide correct email address to continue"
      );
      issueCount++;
    }

    if (!password) {
      $("#password").addClass("issue");
      $("#issue_password").html(
        "USER ERROR! Kindly provide a correct password to continue"
      );
      issueCount++;
    }

    if (issueCount > 0) return;

    //////////////// get btn text ////////////////
    const btnText = $("#submitBtn").html();
    $("#submitBtn").html(
      '<img src="' +
        websiteUrl +
        '/all-images/images/loading.gif" width="12px" alt="Loading"/>'
    );
    $("#submitBtn").prop("disabled", true);
    ////////////////////////////////////////////////

    const formData = {
      userName: userName,
      password: password,
    };

    $.ajax({
      type: "POST",
      url: `${endPoint}/admin/auth/login`,
      data: JSON.stringify(formData),
      dataType: "json",
      cache: false,
      headers: {
        apiKey: apiKey,
        userOsBrowser: userOsBrowser,
        userIpAddress: userIpAddress,
        userDeviceId: userDeviceId,
      },
      success: function (data) {
        if (data.success) {
          const staffLoginData = data.data[0];
          sessionStorage.setItem(
            "staffLoginData",
            JSON.stringify(staffLoginData)
          );
          window.location.href = adminDashboardUrl;
        } else {
          _showCustomConfirm({
            title: "Login Failed!",
            message: data.message,
            alertType: "error",
            trueActionBtnText: "OK, Retry",
          });
        }
        $("#submitBtn").html(btnText).prop("disabled", false);
      },
      error: function (error) {
        console.error("Error during login:", error);
        _showCustomConfirm({
          title: "Connection Error!",
          message: "Unable to reach the server. Please check your connection.",
          alertType: "error",
          trueActionBtnText: "OK, Retry",
        });
        $("#submitBtn").html(btnText).prop("disabled", false);
      },
    });
  } catch (error) {
    console.error("Unexpected error:", error);
    _showCustomConfirm({
      title: "Unexpected Error!",
      message: "An unexpected error occurred. Please try again.",
      alertType: "error",
      trueActionBtnText: "OK",
    });
    $("#submitBtn").prop("disabled", false);
  }
}


function _proceedResetPassword(sessionEmail = null, btnId = "proceedBtn") {
  try {
    let issueCount = 0;
    let email = sessionEmail || $("#email").val().trim();

    if (!sessionEmail) {
      $("#email").removeClass("issue");
      $("#issue_email").html("");

      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        $("#email").addClass("issue");
        $("#issue_email").html(
          "USER ERROR! Kindy provide correct email address to continue"
        );
        issueCount++;
      }

      if (issueCount > 0) return;
    }

    ////////////// get btn text ////////////////
    const btnText = $("#" + btnId).html();
    $("#" + btnId).html(
      '<img src="' +
        websiteUrl +'/all-images/images/loading.gif" width="12px" alt="Loading"/>'
    );
    $("#" + btnId).prop("disabled", true);
    ////////////////////////////////////////////////

    const formData = {
      email: email,
    };

    $.ajax({
      type: "POST",
      url: endPoint + "/admin/auth/reset-password",
      data: JSON.stringify(formData),
      dataType: "json",
      cache: false,
      headers: {
        apiKey: apiKey,
        userOsBrowser: userOsBrowser,
        userIpAddress: userIpAddress,
        userDeviceId: userDeviceId,
      },
      success: function (info) {
        if (info.success) {
          sessionStorage.setItem("staffEmailSession", JSON.stringify(info));
          _getPage({ page: "sendLinkMail", url: adminLocalUrl });
        } else {
          _showCustomConfirm({
            title: "Reset Password!",
            message: info.message,
            alertType: "warning",
            trueActionBtnText: "OK, Retry",
          });
        }
        $("#" + btnId)
          .html(btnText)
          .prop("disabled", false);
      },
      error: function () {
         _showCustomConfirm({
          title: "Connection Error!",
          message: "Unable to reach the server. Please check your connection.",
          alertType: "error",
          trueActionBtnText: "OK, Retry",
        });
        $("#" + btnId)
          .html(btnText)
          .prop("disabled", false);
      },
    });
  } catch (error) {
    console.error("Unexpected error:", error);
    _showCustomConfirm({
      title: "Unexpected Error!",
      message: "An unexpected error occurred. Please try again.",
      alertType: "error",
      trueActionBtnText: "OK",
    });
    $("#" + btnId).prop("disabled", false);
  }
}


//////LINK VERIFICATION FUNCTION////////
function _verifyLink(ref) {
  $("#page-content")
    .html(
      '<div class="ajax-loader"><img src="' +
        websiteUrl +
        '/all-images/images/spinner.gif"/></div>'
    )
    .css({
      display: "flex",
      "flex-direction": "column",
      gap: "20px",
      "align-items": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  $.ajax({
    type: "GET",
    url: `${endPoint}/admin/auth/verify-link?ref=${ref}`,
    dataType: "json",
    cache: false,
    headers: {
      apiKey: apiKey,
      userOsBrowser: userOsBrowser,
      userIpAddress: userIpAddress,
      userDeviceId: userDeviceId,
    },
    success: function (info) {
      if (info.success == true) {
        sessionStorage.setItem(
          "staffCompleteResetEmailSession",
          JSON.stringify(info)
        );
        _getPage({ page: "completeResetPassword", url: adminLocalUrl });
      } else {
        _getPage({ page: "verifyRefResponse", url: adminLocalUrl });
      }
    },
  });
}


function _completeResetPassword(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const newPassword = $('#newPassword').val().trim();
		const cnewPassword = $('#cnewPassword').val().trim();

		  ///// empty field validation//////////
      issueCount += _validateEmptyValue("newPassword", "NEW PASSWORD");
      issueCount += _validateEmptyValue("cnewPassword", "CONFIRM NEW PASSWORD");

      if (newPassword && cnewPassword) {
        if (newPassword.length < 8) {
          $('#newPassword').addClass("issue");
          $('#issue_newPassword').html('USER ERROR! Password must be at least 8 characters');
          issueCount++;
        }

        if (newPassword !== cnewPassword) {
          $('#newPassword, #cnewPassword').addClass('issue');
          $('#issue_cnewPassword, #issue_cnewPassword').html('USER ERROR! Passwords do not match');
          issueCount++;
        }

        if (!newPassword.match(/^(?=[^A-Z]*[A-Z])(?=[^!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]*[!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~])(?=\D*\d).{8,}$/ )) {
          $('#newPassword').addClass("issue");
          $('#issue_newPassword').html('USER ERROR! Password Not Accepted, Please follow the instructon above');
          issueCount++;
        }
      }

  if (issueCount > 0) return;

    /////Gather form data////
    const formData = {
        newPassword,
        cnewPassword,
    };
		_completeResetPasswordCallback(formData);
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _completeResetPassword());
	}
}

function _completeResetPasswordCallback(formData) {
let staffCompleteResetEmailSession = JSON.parse(
    sessionStorage.getItem("staffCompleteResetEmailSession")
  );

	///// get btn text/////
	const btnText = $("#completeBtn").html();
	_btnDisable("completeBtn", btnText, true);
	
	//// call endpoint //////
	 _callRawEndPoints({
		url: `admin/auth/complete-reset-password?email=${staffCompleteResetEmailSession.email}`,
		formData,
	})
    .then((response) => {
		if (response.success) {
      _showCustomConfirm({
          title: "Password Reset",
          message: response.message,
          alertType: "success",
          trueActionBtnText: "Okay",
          trueActionCallback: () => (window.location.href = `${websiteUrl}/admin`),
      });
			_btnDisable("completeBtn", btnText, false);
		} else {
			_btnDisable("completeBtn", btnText, false);
			_showCustomConfirm({
				title: "PASSWORD ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _completeResetPasswordCallback(formData)); // retry if needed
		_btnDisable("completeBtn", btnText, false);
    });
}