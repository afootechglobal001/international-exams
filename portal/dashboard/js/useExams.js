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
        <div class="content-title">
            <div class="title">
                <i class="bi bi-mortarboard-fill"></i>
                <p> School Of Interest</p>
            </div>
             ${
               schoolCounter > 1
                 ? `<button type="button" class="btn" onclick="_deleteSchool('${schoolDiv.id}')">Delete</button>`
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
            const id = data[i].publishId;
            const value = data[i].examAbbr;
            $("#searchList_" + fieldId).append(
              "<li onclick=\"_clickOption('searchList_" +
                fieldId +
                "', '" +
                id +
                "', '" +
                value +
                "'); _getcountryExamPricing('" +
                id +
                "');\">" +
                value +
                "</li>"
            );
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
function _registerExam() {
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
      message: "An unexpected error occurred! Please try again.",
      alertType: "warning",
      falseActionBtn: true,
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _logUserEmail());
  }
}
