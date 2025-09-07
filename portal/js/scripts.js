function _logUserEmail() {
  try {
    //////get all needed values////
    const firstName = $("#firstName").val().trim();
    const lastName = $("#lastName").val().trim();
    const emailAddress = $("#emailAddress").val().trim();
    const phoneNumber = $("#phoneNumber").val().trim();
    const countryId = $("#countryId").val().trim();
    const createPassword = $("#createPassword").val().trim();
    const confirmPassword = $("#confirmPassword").val().trim();
    ///// empty field validation//////////
    let issueCount = 0;
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
    if (createPassword != confirmPassword) {
      $("#confirmPassword").addClass("issue");
      $("#issue_confirmPassword").html("PASSWORD NOT MATCHED!");
      issueCount += 1;
    }
    if (issueCount > 0) return;
    // Gather form data
    const formData = {
      emailAddress,
      firstName,
      lastName,
      countryId,
    };
    ////// confirm action
    _showCustomConfirm({
      callback: () => {
        _proceedLog(formData);
      },
      title: "Are you sure?",
      message: "Will proceed to send OTP to your email address.",
      alertType: "warning",
      falseActionBtn: true,
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _logUserEmail());
  }
}

function _proceedLog(formData) {
  //// call endpoint
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);
  _callRawEndPoints({
    url: "user/auth/log-user-signup-email",
    formData,
  })
    .then((response) => {
      if (response.success) {
        const data = response.data;
        //// get signup OTP modal////
        _getForm({
          page: "signupOtp",
          url: portalAuthMiddlewareUrl,
          id: data.email,
        });
        _btnDisable("submitBtn", btnText, false);
      } else {
        _btnDisable("submitBtn", btnText, false);
        _showCustomConfirm({
          title: "USER ERROR",
          message: response.message,
          alertType: "warning",
          trueActionBtnText: "OK",
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      _callAjaxError(() => _logUserEmail()); // retry if needed
      _btnDisable("submitBtn", btnText, false);
    });
}

function _verifyUserEmail() {
  try {
    //////get all needed values////
    const emailAddress = $("#emailAddress").val().trim();
    const otp = $("#otp").val().trim();
    ///// empty field validation//////////
    let issueCount = 0;
    issueCount += _validateEmptyValue("otp", "OTP");
    issueCount += _validateNumber("otp", otp);
    if (issueCount > 0) return;
    const btnText = $("#proceedBtn").html();
    _btnDisable("proceedBtn", btnText, true);
    // Gather form data
    const formData = {
      emailAddress,
      otp,
    };

    //// call endpoint
    _callRawEndPoints({
      url: "user/auth/verify-user-signup-email",
      formData,
    })
      .then((response) => {
        if (response.success) {
          _userSignUp(otp);
          _alertClose();
        } else {
          _showCustomConfirm({
            title: "INVALID OTP",
            message: response.message,
            alertType: "warning",
            trueActionBtnText: "OK",
          });
          _btnDisable("proceedBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _verifyUserEmail()); // retry if needed
        _btnDisable("proceedBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _verifyUserEmail());
    _btnDisable("proceedBtn", btnText, false);
  }
}

function _userSignUp(otp) {
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);
  try {
    const firstName = $("#firstName").val().trim();
    const lastName = $("#lastName").val().trim();
    const emailAddress = $("#emailAddress").val().trim();
    const phoneNumber = $("#phoneNumber").val().trim();
    const countryId = $("#countryId").val().trim();
    const userTypeId = $("#userTypeId").val().trim();
    const createPassword = $("#createPassword").val().trim();
    const confirmPassword = $("#confirmPassword").val().trim();
    // Gather form data
    const formData = {
      otp: otp,
      firstName: firstName,
      lastName: lastName,
      emailAddress: emailAddress,
      phoneNumber: phoneNumber,
      countryId: countryId,
      userTypeId: userTypeId,
      password: createPassword,
      cPassword: confirmPassword,
    };

    _callRawEndPoints({
      url: "user/auth/signup",
      formData,
    })
      .then((response) => {
        if (response.success) {
          const data = response.data;
          sessionStorage.setItem("userLoginData", JSON.stringify(data));
          _showCustomConfirm({
            callback: () => {
              window.location.href = portalDashboardUrl;
            },
            title: "SignUp Successful!",
            message: response.message,
            alertType: "success",
            trueActionBtnText: "Okay, Thanks",
          });
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
        _callAjaxError(() => _userSignUp()); // retry if needed
        _btnDisable("submitBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _userSignUp());
    _btnDisable("submitBtn", btnText, false);
  }
}

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
          sessionStorage.setItem("userLoginData", JSON.stringify(data));
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
