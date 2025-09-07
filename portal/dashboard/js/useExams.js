let schoolCounter = 0; // keeps track of how many schools have been added
function _addMoreSchoolsOfInterest() {
  schoolCounter++;

  // Get the container
  const container = document.getElementById("schoolsOfInterest_div");

  // Create a wrapper for each school
  const schoolDiv = document.createElement("div");
  schoolDiv.classList.add("content-div");
  schoolDiv.setAttribute("id", `school_${schoolCounter}`);

  // Build the HTML structure
  schoolDiv.innerHTML = `
        <div class="content-title" id="segmentBody">
            <div class="title">
                <i class="bi bi-mortarboard-fill"></i>
                <p> School Of Interest</p>
            </div>
             ${
               schoolCounter > 1
                 ? `<button type="button" class="btn" onclick="_deleteSchool('${schoolDiv.id}')"><i class="bi bi-trash3"></i></button>`
                 : ""
             }
        </div>

        <div class="form-text">
            <div class="text_field_container" id="nameOfInstitution_${schoolCounter}_container"></div>
            <div class="text_field_container" id="institutionCode_${schoolCounter}_container"></div>
            <div class="text_field_container" id="institutionLocation_${schoolCounter}_container"></div>
            <div class="text_field_container" id="programId_${schoolCounter}_container"></div>
            <div class="text_field_container" id="courseOfStudy_${schoolCounter}_container"></div>
        </div>
    `;

  // Append new school form
  container.appendChild(schoolDiv);

  // Call your field generators for each input
  textField({
    id: `nameOfInstitution_${schoolCounter}`,
    title: "Name Of Institution",
  });

  textField({
    id: `institutionCode_${schoolCounter}`,
    title: "Institutional Code",
  });

  textField({
    id: `institutionLocation_${schoolCounter}`,
    title: "Institution Location",
  });

  selectField({
    id: `programId_${schoolCounter}`,
    title: "Program of Study",
  });
  _getSelectProgram(`programId_${schoolCounter}`);
  textField({
    id: `courseOfStudy_${schoolCounter}`,
    title: "Course of Study",
  });
}

// Function to delete a school block
function _deleteSchool(schoolId) {
  schoolCounter = schoolCounter - 1;
  const schoolDiv = document.getElementById(schoolId);
  if (schoolDiv) {
    schoolDiv.remove();
  }
}

function _getCountryExams(fieldId) {
  let $searchList = $("#searchList_" + fieldId);
  $searchList.html("<li>Loading data...</li>");

  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-exam-pricing?countryId=${loginCountryData.countryId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const data = info.data;
        const success = info.success;

        if (success === true) {
          $("#searchList_" + fieldId).html("");

          for (let i = 0; i < data.length; i++) {
            const id = data[i].examId;
            const value = data[i].examAbbr;
            $("#searchList_" + fieldId).append(`
              <li onclick="_clickOption('searchList_${fieldId}', '${id}', '${value}'); 
                _getcountryExamPricing('${id}');">
                ${value}
              </li>
            `);
          }
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _getcountryExamPricing(examId) {
  $("#examPreviewContainer").show();
  $("#examPreviewDiv")
    .html(
      '<div class="ajax-loader other-pages-ajax-loader"><img src="' +
        websiteUrl +
        '/all-images/images/spinner.gif" alt="Loading"/></div>'
    )
    .fadeIn("fast");

  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-exam-pricing?countryId=${loginCountryData.countryId}&examId=${examId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const success = info.success;
        if (success === true) {
          const data = info.data[0];
          _previewExam(data);
          _getExamLocations("locationId", data.examId);
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _previewExam(examInfo) {
  let content = "";
  const regTitle = examInfo.regTitle;
  const examAbbr = examInfo.examAbbr;
  const examLogo = examInfo.examLogo;
  const currency = examInfo.currency;
  const amount = examInfo.amount;

  content += `
      <div class="exam-div">
          <div class="exam-image">
              <img src="${examLogoPixPath}/${examLogo}" alt="${regTitle}">
          </div>
          <div class="exam-status active">ACTIVE</div>
          <div class="exam-info">
              <h3>${examAbbr}</h3>
              <p>${regTitle}</p>
          </div>
          <div class="price">
              <p>${currency} ${amount.toLocaleString()}</p>
          </div>
      </div>
      `;

  $("#examPreviewDiv").html(content);
}

function _getExamLocations(fieldId, examId) {
  let $searchList = $("#searchList_" + fieldId);
  $searchList.html("<li>Loading data...</li>");

  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-exam-location?countryId=${loginCountryData.countryId}&examId=${examId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const data = info.data;
        const success = info.success;
        console.log(data);
        if (success === true) {
          $("#searchList_" + fieldId).html("");

          for (let i = 0; i < data.length; i++) {
            const id = data[i].locationId;
            const value = data[i].locationName;
            $("#searchList_" + fieldId).append(`
              <li onclick="_clickOption('searchList_${fieldId}', '${id}', '${value}'); 
                _getExamLocationCentres('locationCentreId', '${id}');">
                ${value}
              </li>
            `);
          }
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _getExamLocationCentres(fieldId, locationId) {
  let $searchList = $("#searchList_" + fieldId);
  $searchList.html("<li>Loading data...</li>");
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-exam-location-centres?locationId=${locationId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const data = info.data;
        const success = info.success;

        if (success === true) {
          $("#searchList_" + fieldId).html("");

          for (let i = 0; i < data.length; i++) {
            const id = data[i].centreId;
            const value = data[i].centreName;
            $("#searchList_" + fieldId).append(`
              <li onclick="_clickOption('searchList_${fieldId}', '${id}', '${value}'); 
                _getExamLocationCentreDates('examDate', '${id}');">
                ${value}
              </li>
            `);
          }
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _getExamLocationCentreDates(fieldId, centreId) {
  let $searchList = $("#searchList_" + fieldId);
  $searchList.html("<li>Loading data...</li>");
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-exam-location-centre-dates?centreId=${centreId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const data = info.data;
        const success = info.success;

        if (success === true) {
          $("#searchList_" + fieldId + ", #searchList_altDate").html("");

          for (let i = 0; i < data.length; i++) {
            const id = data[i].examDate;
            const value = formatExamDate(data[i].examDate);

            $("#searchList_" + fieldId).append(`
              <li onclick="_clickOption('searchList_${fieldId}', '${id}', '${value}');">
                ${value}
              </li>
            `);

            $("#searchList_altDate").append(`
              <li onclick="_clickOption('searchList_altDate', '${id}', '${value}');">
                ${value}
              </li>
            `);
          }
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _registerExam(paymentMethodId) {
  try {
    //////get all needed values////
    const examId = $("#examId").val().trim();
    const locationId = $("#locationId").val().trim();
    const centreId = $("#locationCentreId").val().trim();
    const examDate = $("#examDate").val().trim();
    const altDate = $("#altDate").val().trim();
    const firstName = $("#firstName").val().trim();
    const middleName = $("#middleName").val().trim();
    const lastName = $("#lastName").val().trim();
    const dob = $("#dob").val().trim();
    const emailAddress = $("#emailAddress").val().trim();
    const phoneNumber = $("#phoneNumber").val().trim();
    const residentialAddress = $("#residentialAddress").val().trim();
    const genderId = $("#genderId").val().trim();
    ///// empty field validation//////////
    let issueCount = 0;
    issueCount += _validateEmptyValue("examId", "EXAM");
    issueCount += _validateEmptyValue("locationId", "EXAM LOCATION");
    issueCount += _validateEmptyValue("locationCentreId", "EXAM CENTRE");
    issueCount += _validateEmptyValue("examDate", "EXAM DATE");
    issueCount += _validateEmptyValue("firstName", "FIRST NAME");
    issueCount += _validateEmptyValue("middleName", "MIDDLE NAME");
    issueCount += _validateEmptyValue("lastName", "LAST NAME");
    issueCount += _validateEmptyValue("dob", "DATE OF BIRTH");
    issueCount += _validateEmptyValue("emailAddress", "EMAIL ADDRESS");
    issueCount += _validateEmptyValue("phoneNumber", "PHONE NUMBER");
    issueCount += _validateEmptyValue(
      "residentialAddress",
      "RESIDENTIAL ADDRESS"
    );
    issueCount += _validateEmptyValue("genderId", "GENDER");
    if (issueCount > 0) return;

    const schoolsOfInterestSegment = [];
    let atLeastOneFilled = false; // flag to check if user filled something

    for (let i = 1; i <= schoolCounter; i++) {
      const nameOfInstitution =
        document.getElementById(`nameOfInstitution_${i}`)?.value.trim() || "";
      const institutionCode =
        document.getElementById(`institutionCode_${i}`)?.value.trim() || "";
      const institutionLocation =
        document.getElementById(`institutionLocation_${i}`)?.value.trim() || "";
      const programId =
        document.getElementById(`programId_${i}`)?.value.trim() || "";
      const courseOfStudy =
        document.getElementById(`courseOfStudy_${i}`)?.value.trim() || "";

      // Check if this form has at least one non-empty value
      if (
        nameOfInstitution ||
        institutionCode ||
        institutionLocation ||
        programId ||
        courseOfStudy
      ) {
        atLeastOneFilled = true;

        // Check required fields before pushing
        if (nameOfInstitution && programId && courseOfStudy) {
          schoolsOfInterestSegment.push({
            nameOfInstitution,
            institutionCode,
            institutionLocation,
            programId,
            courseOfStudy,
          });
        } else {
          _showCustomConfirm({
            title: "Form Incomplete",
            message: `Please fill all required fields for School #${i}`,
            alertType: "warning",
            trueActionBtnText: "OK",
          });
          return false; // stop function
        }
      }
    }

    if (!atLeastOneFilled) {
      _showCustomConfirm({
        title: "Field Required",
        message: "Please fill at least one School of Interest form.",
        alertType: "warning",
        trueActionBtnText: "OK",
      });
      return false;
    }

    // Gather form data
    const formData = {
      examId,
      locationId,
      centreId,
      examDate,
      altDate,
      firstName,
      middleName,
      lastName,
      dob,
      emailAddress,
      phoneNumber,
      residentialAddress,
      genderId,
      schoolsOfInterestSegment,
      paymentMethodId,
    };
    ////// confirm action
    _showCustomConfirm({
      callback: () => {
        _proceedExamRegistrationLog(formData);
      },
      title: "Are you sure?",
      message: "Confirm you want to register for the exam.",
      alertType: "warning",
      falseActionBtn: true,
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _registerExam(paymentMethodId));
  }
}

function _proceedExamRegistrationLog(formData) {
  //// call endpoint
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);
  _callRawEndPoints({
    url: "user/exam/exam-registration",
    formData,
    accessKey: true,
  })
    .then((response) => {
      if (response.success) {
        const data = response.data;
        console.log(data);
        if (formData.paymentMethodId === "CC") {
          _payWithPaystackExamRegistration(data);
        } else if (formData.paymentMethodId === "BT") {
          _getForm({
            page: "paymentInstructions",
            url: portalOperationMiddlewareUrl,
          });
        } else {
          _btnDisable("submitBtn", btnText, false);
          _showCustomConfirm({
            title: "USER ERROR",
            message:
              "The selected payment method is not recognized. Please try again.",
            alertType: "warning",
            trueActionBtnText: "OK",
          });
        }
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
      _callAjaxError(() => _proceedExamRegistrationLog(formData)); // retry if needed
      _btnDisable("submitBtn", btnText, false);
    });
}

////// CALL LOAD WALLET PAYSTACK ////////////////
function _payWithPaystackExamRegistration(data) {
  var handler = PaystackPop.setup({
    key: data.paymentKey,
    email: data.emailAddress,
    amount: data.amount * 100, //amt in kobo
    ref: data.transactionId,
    currency: data.currency, // Use GHS for Ghana Cedis or USD for US Dollars
    metadata: {
      custom_fields: [
        {
          display_name: data.fullName,
          variable_name: "mobile_number",
          value: data.phoneNumber,
        },
      ],
    },
    callback: function (response) {
      console.log(response);
      _examRegistrationPaymentAction(
        "success",
        data.transactionId,
        data.examRegistrationId
      );
    },
    onClose: function () {
      //update to cancelled.
      _examRegistrationPaymentAction(
        "cancel",
        data.transactionId,
        data.examRegistrationId
      );
      return false;
    },
  });
  handler.openIframe();
}
////////////////////// END LOAD WALLET PAYSTACK /////////////////////////////

function _examRegistrationPaymentAction(
  action,
  transactionId,
  examRegistrationId
) {
  try {
    _callRawEndPoints({
      url: `user/exam/exam-payment-${action}?transactionId=${transactionId}&examRegistrationId=${examRegistrationId}`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);

        if (response.success) {
          _alertClose();
          _showCustomConfirm({
            callback: () =>
              _getActivePage({ page: "transactions", divid: "transactions" }),
            title:
              action === "success" ? "PAYMENT SUCCESSFUL" : "PAYMENT CANCELLED",
            message: response.message,
            alertType: action === "success" ? "success" : "info",
            trueActionBtnText: "OK",
          });
        } else {
          _showCustomConfirm({
            title: "OPERATION FAILED",
            message: response.message,
            alertType: "failed",
            trueActionBtnText: "OK",
          });
          _btnDisable("submitBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _logOut()); // retry if needed
        _btnDisable("submitBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() =>
      _examRegistrationPaymentAction(action, transactionId, examRegistrationId)
    );
    _btnDisable("submitBtn", btnText, false);
  }
}
