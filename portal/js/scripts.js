function _nextUserLoginPage(props) {
  const { page = "" } = props;
  _getPage({ page: page, url: portalAuthMiddlewareUrl });
}

$(document).ready(function () {
  $("#viewLogin input, #viewLogin").on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      _userLogin(false);
    }
  });

  $("#viewOtp input").on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      _userSignUp();
    }
  });
});

function _counDownOtp(timer) {
  $("#resendOtpBtn").hide();
  $("#resendCountdown").fadeIn(500);
  const countdown = setInterval(() => {
    if (timer > 0) {
      timer = timer - 1;
      $("#timer").html(timer);
    } else {
      $("#resendCountdown").hide();
      $("#resendOtpBtn").fadeIn(500);
      clearInterval(countdown);
    }
  }, 1000);
  return () => clearInterval(countdown);
}

function _logUserEmail(isResend = false) {
  let userProceedLoginSession = JSON.parse(
    localStorage.getItem("userProceedLoginSession")
  );
  
  try {
    //////get all needed values////
    let issueCount = 0;
    let firstName = $("#firstName").val()?.trim();
    let lastName = $("#lastName").val()?.trim();
    let emailAddress = $("#emailAddress").val()?.trim();
    let phoneNumber = $("#phoneNumber").val()?.trim();
    let countryId = $("#countryId").val()?.trim();
    let userTypeId = $("#userTypeId").val()?.trim();
    let password = $("#createPassword").val()?.trim();
    let cpassword = $("#confirmPassword").val()?.trim();

    // Use session values when resending ///
    if (isResend) {
      firstName = userProceedLoginSession?.signupData?.firstName;
      lastName = userProceedLoginSession?.signupData?.lastName;
      emailAddress = userProceedLoginSession?.signupData?.emailAddress;
      phoneNumber = userProceedLoginSession?.signupData?.phoneNumber;
      countryId = userProceedLoginSession?.signupData?.countryId;
      userTypeId = userProceedLoginSession?.signupData?.userTypeId;
      password = userProceedLoginSession?.signupData?.password;
      cpassword = userProceedLoginSession?.signupData?.cpassword;
    }

    ///// empty field validation//////////
    if (!isResend) {
      issueCount += _validateEmptyValue("firstName", "FIRST NAME");
      issueCount += _validateEmptyValue("lastName", "LAST NAME");
      issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");
      issueCount += _validateEmptyValue("phoneNumber", "PHONE NUMBER");
      issueCount += _validateEmptyValue("countryId", "COUNTRY");
      issueCount += _validateEmptyValue("userTypeId", "USER TYPE");
      issueCount += _validateEmptyValue("createPassword", "PASSWORD");
      issueCount += _validateEmptyValue("confirmPassword", "PASSWORD");
      issueCount += _validateEmail("emailAddress", emailAddress);
      issueCount += _validateNumber("phoneNumber", phoneNumber);
      if (password != cpassword) {
        $("#confirmPassword").addClass("issue");
        $("#issue_confirmPassword").html("PASSWORD NOT MATCHED!");
        issueCount += 1;
      }
    }
   
    if (issueCount > 0) return;
    // Gather form data
    const formData = {
      firstName,
      lastName,
      emailAddress,
      phoneNumber,
      countryId,
      userTypeId,
      password,
      cpassword,
    };
    ////// confirm action
    _showCustomConfirm({
      callback: () => {
        _proceedLog(formData, isResend);
      },
      title: "Are you sure?",
      message: "Will proceed to send OTP to your email address.",
      alertType: "warning",
      falseActionBtn: true,
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _logUserEmail(isResend = false));
  }
}

function _proceedLog(formData, isResend) {
  //// call endpoint
   let btnText = "";
  if (!isResend) {
    const btnText = $("#submitBtn").html();
    _btnDisable("submitBtn", btnText, true);
  } else {
    _showLoader("Resending OTP... Please wait...");
  }

  _callRawEndPoints({
    url: "user/auth/verify-user-email-on-signup",
    formData,
  })
    .then((response) => {
      if (response.success) {
        const data = response.data;
         if (!isResend) {
            _btnDisable("submitBtn", btnText, false);
            localStorage.setItem(
              "userProceedLoginSession",
              JSON.stringify({
                signupData: formData,   // for resend
                displayData: data // for UI (fullName, email)
              })
            );
              _showLoader("OTP Sent Successfully!. Please wait...");
              window.location.href = userOtpVerificationUrl;
          } else {
            _hideLoader();
            _counDownOtp(30);
          }
      } else {
        _btnDisable("submitBtn", btnText, false);
        _showCustomConfirm({
          title: "Invalid Credentials!",
          message: response.message,
          alertType: "warning",
          trueActionBtnText: "OK",
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      _callAjaxError(() => _proceedLog(formData, isResend)); // retry if needed
      if (!isResend) {
        _btnDisable("submitBtn", btnText, false);
      } else {
        _hideLoader();
      }
    });
}

/// Proceed To Sign Up ///
function _userSignUp() {
  let userProceedLoginSession = JSON.parse(
    localStorage.getItem("userProceedLoginSession")
  );
  try {
    ////////get all needed values////////////
    let issueCount = 0;
    const otp = $("#otp").val();

    ///// empty field validation//////////
    issueCount += _validateEmptyValue("otp", "OTP");

    if (issueCount > 0) return;

    // Gather form data
    const formData = {
      otp,
      emailAddress: userProceedLoginSession?.displayData?.email,
    };

    _userSignUpCallback(formData);
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _userSignUp());
  }
}

/// Proceed To Sign Up Callback ///
function _userSignUpCallback(formData) {
  ///// get btn text/////
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);

  //// call endpoint //////
  _callRawEndPoints({
    url: `user/auth/signup`,
    formData,
  })
    .then((response) => {
      if (response.success) {
        const data = response.data;
          localStorage.setItem("userLoginData", JSON.stringify(data));
          _showCustomConfirm({
            callback: () => {
              window.location.href = portalDashboardUrl;
            },
            title: "SignUp Successful!",
            message: response.message,
            alertType: "success",
            trueActionBtnText: "Okay, Thanks",
          });
        _btnDisable("submitBtn", btnText, false);
      } else {
        _btnDisable("submitBtn", btnText, false);
        _hideLoader();
        _showCustomConfirm({
          title: "Invalid OTP",
          message: response.message,
          alertType: "error",
          trueActionBtnText: "OK",
          closeOnOverlayClick: true,
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      _callAjaxError(() => _userSignUpCallback(formData)); // retry if needed
      _btnDisable("submitBtn", btnText, false);
      _hideLoader();
    });
}

/// User Login ///
function _userLogin() {
  try {
    //////get all needed values////
    const emailAddress = $("#emailAddress").val().trim();
    const password = $("#password").val().trim();
    ///// empty field validation//////////
    let issueCount = 0;
    issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");
    issueCount += _validateEmptyValue("password", "PASSWORD");
    issueCount += _validateEmail("emailAddress", emailAddress);

    if (issueCount > 0) return;
    // Gather form data
    const formData = {
      emailAddress: emailAddress,
      password: password,
    };

    const btnText = $("#submitBtn").html();
    _btnDisable("submitBtn", btnText, true);

    _callRawEndPoints({
      url: "user/auth/login",
      formData,
    })
      .then((response) => {
        if (response.success) {
          const data = response.data;
          localStorage.setItem("userLoginData", JSON.stringify(data));
          window.location.href = portalDashboardUrl;
        } else {
          _showCustomConfirm({
            title: "USER ERROR",
            message: response.message,
            alertType: "warning",
            trueActionBtnText: "OK",
          });
          _btnDisable("submitBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _userLogin()); // retry if needed
        _btnDisable("submitBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _userLogin());
    _btnDisable("submitBtn", btnText, false);
  }
}


/// Proceed To Reset Password ///
function _proceedResetPassword() {
  try {
    ////////get all needed values////////////
    let issueCount = 0;
    const emailAddress = $("#emailAddress").val();

    ///// empty field validation//////////
    issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");

    if (issueCount > 0) return;

    // Gather form data
    const formData = {
      emailAddress,
    };
    ////// confirm action
    _showCustomConfirm({
      callback: () => {
        _proceedResetPasswordCallback(formData);
      },
      title: "Are you sure?",
      message: "Will proceed to send OTP to your email address.",
      alertType: "warning",
      falseActionBtn: true,
    });

  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _proceedResetPassword());
  }
}

/// Proceed To Reset Password  Callback ///
function _proceedResetPasswordCallback(formData) {
  ///// get btn text/////
  const btnText = $("#proceedBtn").html();
  _btnDisable("proceedBtn", btnText, true);

  //// call endpoint //////
  _callRawEndPoints({
    url: `user/auth/reset-password-verification`,
    formData,
  })
    .then((response) => {
      if (response.success) {
        const data = response.data;
        localStorage.setItem("useResetPasswordSession", JSON.stringify(data));
        _showLoader("OTP Sent Successfully!. Please wait...");
          window.location.href = userResetPasswordUrl;
        _btnDisable("proceedBtn", btnText, false);
      } else {
        _btnDisable("proceedBtn", btnText, false);
        _hideLoader();
        _showCustomConfirm({
          title: "Invalid Email Address",
          message: response.message,
          alertType: "error",
          trueActionBtnText: "OK",
          closeOnOverlayClick: true,
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      _callAjaxError(() => _proceedResetPasswordCallback(formData)); // retry if needed
      _btnDisable("proceedBtn", btnText, false);
      _hideLoader();
    });
}

/// Complete Proceed Password ///
function _completeResetPassword() {
  let useResetPasswordSession = JSON.parse(
    localStorage.getItem("useResetPasswordSession")
  );
  try {
    ////////get all needed values////////////
    let issueCount = 0;
    const otp = $("#otp").val();
    const newPassword = $("#newPassword").val();
    const cnewPassword = $("#cnewPassword").val();

    ///// empty field validation//////////
    issueCount += _validateEmptyValue("otp", "OTP");
    issueCount += _validateEmptyValue("newPassword", "CREATE NEW PASSWORD");
    issueCount += _validateEmptyValue("cnewPassword", "CONFIRM NEW PASSWORD");

    if (newPassword && cnewPassword) {
      if (newPassword !== cnewPassword) {
        $('#newPassword, #cnewPassword').addClass('issue');
        $('#issue_cnewPassword, #issue_cnewPassword').html('USER ERROR! Passwords do not match');
        issueCount++;
      }
    }

    if (issueCount > 0) return;

    // Gather form data
    const formData = {
      userId: useResetPasswordSession?.userId,
      otp,
      newPassword,
      cnewPassword,
    };

    _completeResetPasswordCallback(formData);
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _completeResetPassword());
  }
}

/// Complete Reset Pssword Callback ///
function _completeResetPasswordCallback(formData) {
  ///// get btn text/////
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);

  //// call endpoint //////
  _callRawEndPoints({
    url: `user/auth/reset-password`,
    formData,
  })
    .then((response) => {
      if (response.success) {
          _showCustomConfirm({
            callback: () => {
              window.location.href = portalUrl;
            },
            title: "Success!",
            message: response.message,
            alertType: "success",
            trueActionBtnText: "Okay, Thanks",
          });
        _btnDisable("submitBtn", btnText, false);
      } else {
        _btnDisable("submitBtn", btnText, false);
        _showCustomConfirm({
          title: "Invalid OTP",
          message: response.message,
          alertType: "error",
          trueActionBtnText: "OK",
          closeOnOverlayClick: true,
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      _callAjaxError(() => _completeResetPasswordCallback(formData)); // retry if needed
      _btnDisable("submitBtn", btnText, false);
    });
}