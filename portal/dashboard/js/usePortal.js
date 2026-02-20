function _getActivePage(props) {
  const { page = "", divid = "", pageContainer = "page-content" } = props;
  _getActivePageLink(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: portalOperationMiddlewareUrl,
    });
  }
}

function _getActivePageLink(divid) {
  $("#dashboard, #ebook, #exam, #transactions").removeClass("active");
  $("#" + divid).addClass("active");
}

function _logOut() {
  localStorage.clear();
  window.parent.location.href = portalUrl;
}

function _confirmLogOut() {
  _showCustomConfirm({
    callback: () => {
      _logOut();
    },
    title: "Confirm Logout Action!",
    message:
      "Are you sure you want to log out? You may miss important notifications or updates until you sign in again.",
    alertType: "warning",
    falseActionBtn: true,
  });
}

function _toggleProfileDiv() {
  $(".toggle").toggle("slow");
}
function _closeProfileDiv(event) {
  if (!$(event.target).closest(".toggle, .profile-pic-div").length) {
    $(".toggle").hide("slow");
  }
}
$(document).on("click", _closeProfileDiv);

function capitalizeFirstLetterOfEachWord(inputText) {
  const words = inputText.toLowerCase().split(" ");
  for (let i = 0; i < words.length; i++) {
    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
  }
  const result = words.join(" ");
  return result;
}

function getFirstLettersOfEachWord(str) {
  return str
    .split(" ") // split by spaces
    .filter((word) => word) // remove empty strings (in case of double spaces)
    .map((word) => word[0].toUpperCase()) // take first letter and uppercase it
    .join(""); // join into a single string
}

function thousandSeparator(val) {
  let dp = 2;
  const formatter = new Intl.NumberFormat("ng-NG", {
    style: "decimal",
    maximumFractionDigits: dp,
    minimumFractionDigits: dp,
  });
  //   return formatter.format(val);
  return isNaN(parseFloat(formatter.format(val))) ? "-" : formatter.format(val);
}

function _userValidationCheck(code) {
  if (code < 100) {
    _logOut();
    return;
  }
}


function _changePassword(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const oldPassword = $('#oldPassword').val().trim();
		const newPassword = $('#newPassword').val().trim();
    const cnewPassword = $('#cnewPassword').val().trim();

		///// empty field validation//////////
		  issueCount += _validateEmptyValue("oldPassword", "OLD PASSWORD");
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
      oldPassword,
      newPassword,
      cnewPassword,
    };

		////// confirm action////
		_showCustomConfirm({
			callback: () => {
				_changePasswordCallback(formData);
			},
			title: "Are you sure?",
			message: 'Are you sure you want to update password? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _changePassword());
	}
}

function _changePasswordCallback(formData) {

	///// get btn text/////
	const btnText = $("#submitBtn").html();
	_btnDisable("submitBtn", btnText, true);
	
	//// call endpoint //////
	 _callRawEndPoints({
		url: `user/settings/change-password`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		_userValidationCheck(response.response);
		if (response.success) {
        _showCustomConfirm({
            title: "Success",
            message: response.message,
            alertType: "success",
            trueActionBtnText: "Okay",
            trueActionCallback: () => _logOut(),
        });
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
			_showCustomConfirm({
				title: "ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _changePasswordCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}