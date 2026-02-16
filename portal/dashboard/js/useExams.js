let schoolCounter = 0; // keeps track of how many schools have been added
function _addMoreSchoolsOfInterest() {
  useEachExamRegistrationSession = JSON.parse(
    sessionStorage.getItem("useEachExamRegistrationSession"),
  );
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
    value:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.nameOfInstitution ?? "",
  });

  textField({
    id: `institutionCode_${schoolCounter}`,
    title: "Institutional Code",
    value:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.institutionCode ?? "",
  });

  textField({
    id: `institutionLocation_${schoolCounter}`,
    title: "Institution Location",
    value:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.institutionLocation ?? "",
  });

  selectField({
    id: `programId_${schoolCounter}`,
    title: "Program of Study",
    fieldValue:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.programData?.programId ?? "",
    fieldLabel:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.programData?.programName ?? "",
  });
  _getSelectProgram(`programId_${schoolCounter}`);
  textField({
    id: `courseOfStudy_${schoolCounter}`,
    title: "Course of Study",
    value:
      useEachExamRegistrationSession?.schoolsOfInterest?.[schoolCounter - 1]
        ?.courseOfStudy ?? "",
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

$(function () {
	passportPhotographPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#passportPhotographPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

$(function () {
	internationalPassportPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#internationalPassportPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

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
        '/all-images/images/spinner.gif" alt="Loading"/></div>',
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
  const amount = thousandSeparator(examInfo.amount);

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
              <p>${currency} ${amount}</p>
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

function _registerExam(paymentChoice) {
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
    const paymentMethodId = $("#paymentMethodId").val().trim();
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
      "RESIDENTIAL ADDRESS",
    );
    issueCount += _validateEmptyValue("genderId", "GENDER");
    issueCount += _validateEmptyValue("paymentMethodId", "PAYMENT METHOD");
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
        paymentChoice,
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
  let useEachExamRegistrationSession =
    JSON.parse(sessionStorage.getItem("useEachExamRegistrationSession")) || {};
  let callUrl = "";
  if (useEachExamRegistrationSession?.examRegistrationId) {
    callUrl = `user/exam/exam-registration?examRegistrationId=${useEachExamRegistrationSession?.examRegistrationId}`;
  } else {
    callUrl = "user/exam/exam-registration";
  }

  //// call endpoint
  const btnText = $("#submitBtn").html();
  _btnDisable("submitBtn", btnText, true);
  _callRawEndPoints({
    url: callUrl,
    formData,
    accessKey: true,
  })
    .then((response) => {
        if (response.success) {
            _uploadExamFiles(response);
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

function _uploadExamFiles(examRegistrationResponse){
    const data = examRegistrationResponse.data;

    const passportPhotograph = $("#passportPhotograph").prop("files")[0];
    const internationalPassport = $("#internationalPassport").prop("files")[0];

    /////Gather form data////
    const formData = new FormData();
    
    formData.append("passportPhotograph", passportPhotograph);
    formData.append("internationalPassport", internationalPassport);

    //// call endpoint //////
	_callFileEndPoints({
		url:  `user/exam/upload-exam-files?examRegistrationId=${data.examRegistrationId}`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		if (response.success) {
			const fileUploadResponse = response.data;

            if (fileUploadResponse.files.newPassportPhotograph=="" && fileUploadResponse.files.newInternationalPassport=="") {
                _checkForPayment(examRegistrationResponse);
            } else {
                _uploadExamLocalFiles(examRegistrationResponse, fileUploadResponse, formData);
            }
		} else {
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
		_callAjaxError(() => _uploadExamFiles(data)); // retry if needed
    });
}


function _checkForPayment(response) {
      const data = response.data;
    if (data.paymentChoice === "payNow") {
        if (data.paymentMethodId === "CC" || data.paymentMethodId === "BT") {
            _payWithPaystackExamRegistration(data, data.paymentMethodId);
        } else if (data.paymentMethodId === "WLT") {
            _alertClose();
            _showCustomConfirm({
                callback: () => _getActivePage({ page: "exam", divid: "exam" }),
                title: "PAYMENT SUCCESSFUL",
                message: response.message,
                alertType: "success",
                trueActionBtnText: "OK",
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
        _alertClose();
        _showCustomConfirm({
            callback: () => _getActivePage({ page: "exam", divid: "exam" }),
            title: "Exam Saved for Later",
            message: response.message,
            alertType: "success",
            trueActionBtnText: "OK",
        });
    }
}

function _uploadExamLocalFiles(examRegistrationResponse, fileUploadResponse, formData) {
    formData.append("action", "uploadExamFiles");
    formData.append("oldPassportPhotograph", examRegistrationResponse.data.files.oldPassportPhotograph);
    formData.append("oldInternationalPassport", examRegistrationResponse.data.files.oldInternationalPassport);
    formData.append("newPassportPhotograph", fileUploadResponse.files.newPassportPhotograph);
    formData.append("newInternationalPassport", fileUploadResponse.files.newInternationalPassport);

    _callFileEndPoints({
		url: portalOperationMiddlewareUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_checkForPayment(examRegistrationResponse);
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _uploadExamLocalFiles(examRegistrationResponse, fileUploadResponse, formData));
    });
}

////// CALL PAY WITH PAYSTACK ////////////////
function _payWithPaystackExamRegistration(data, paymentMethodId) {
  const {
    paymentKey,
    emailAddress,
    amount,
    transactionId,
    currency,
    fullName,
    phoneNumber,
    examRegistrationId,
  } = data;

  // Create the base options
  const options = {
    key: paymentKey,
    email: emailAddress,
    amount: amount * 100, // amount in kobo
    ref: transactionId,
    currency: currency || "NGN",

    channels: paymentMethodId === "CC" ? ["card"] : ["bank_transfer"],

    metadata: {
      custom_fields: [
        {
          display_name: fullName,
          variable_name: "mobile_number",
          value: phoneNumber,
        },
      ],
    },

    callback: function () {
      // show processing loader
      $("#get-form-more-div")
        .css({
          display: "flex",
          "justify-content": "center",
          "align-items": "center",
        })
        .html(
          `<div class="alert-loading-div">
              <div class="icon">
                <img src="${websiteUrl}/all-images/images/loading.gif" width="20px" alt="Loading"/>
              </div>
              <div class="text"><p>PROCESSING...</p></div>
           </div>`,
        )
        .fadeIn(500);

      _examRegistrationPaymentAction(
        "success",
        transactionId,
        examRegistrationId,
      );
    },

    onClose: function () {
      _examRegistrationPaymentAction(
        "cancel",
        transactionId,
        examRegistrationId,
      );
      return false;
    },
  };

  const handler = PaystackPop.setup(options);
  handler.openIframe();
}

function _examRegistrationPaymentAction(
  action,
  transactionId,
  examRegistrationId,
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
            callback: () => _getActivePage({ page: "exam", divid: "exam" }),
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
      _examRegistrationPaymentAction(action, transactionId, examRegistrationId),
    );
    _btnDisable("submitBtn", btnText, false);
  }
}
////////////////////// END PAY WITH PAYSTACK /////////////////////////////

function _fetchRegisteredExams() {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `user/exam/fetch-exam`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);
        if (response.success && response.data?.length > 0) {
          _initFetchRegisteredExamsData(response.data);
        } else {
          $("#fetchRegisteredExamsContent").html(`
              <div class="false-notification-div">
                  <p>${response.message}</p>
              </div>
          `);
          $("#examPaginationControls").html("");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callCatchError(() => _fetchRegisteredExams());
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _fetchRegisteredExams());
  }
}

function renderExamsData(data) {
  return data
    .map(
      (item) => `
      <div class="exam-div">
          <div class="exam-image">
              <img src="${examLogoPixPath}/${item.examData?.examLogo}" alt="${item.examData?.examAbbr} Exam"/>
          </div>
          <div class="exam-status ${item.statusData?.statusName}">${item.statusData?.statusName}</div>
          <div class="exam-info">
              <h3>${item.examData?.examAbbr}</h3>
              <p>${item.examData?.examName}</p>
              <div class="exam-time">
                  <p><i class="bi bi-calendar"></i> <strong>${item.examDate}</strong></p>
              </div>
          </div>
          <button class="btn" title="View Details" onclick="_fetchExamRegistrationDetails('${item.examRegistrationId}');">
            <i class="bi bi-eye"></i> View Details
          </button>
      </div>`,
    )
    .join("");
}

function _initFetchRegisteredExamsData(data) {
  const paginator = new Paginator(
    data,
    renderExamsData,
    "examPaginationControls",
    "fetchRegisteredExamsContent",
    10, // items per page
  );
  __paginatorHandlers["fetchRegisteredExamsContent"] = paginator;
  paginator.renderPage();
}

function _filtersExams(value) {
  $("#fetchRegisteredExamsContent > .exam-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _fetchExamRegistrationDetails(examRegistrationId) {
  $("#get-form-more-div")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `user/exam/fetch-exam?examRegistrationId=${examRegistrationId}`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);
        if (response.success && response.data?.length > 0) {
          sessionStorage.setItem(
            "useEachExamRegistrationSession",
            JSON.stringify(response.data[0]),
          );
          _getForm({ page: "examForm", url: portalOperationMiddlewareUrl });
        } else {
          _showCustomConfirm({
            title: "FETCH EXAM REGISTRATION ERROR",
            message: response.message,
            alertType: "warning",
            trueActionBtnText: "OK",
          });
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _fetchExamRegistrationDetails(examRegistrationId)); // retry if needed
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _fetchExamRegistrationDetails(examRegistrationId));
  }
}
