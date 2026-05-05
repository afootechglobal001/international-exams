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
		url: `admin/settings/change-password`,
		formData,
		accessKey: true,
	})
    .then((response) => {
		_staffValidationCheck(response.response);
		if (response.success) {
            _showCustomConfirm({
                title: "Password Changed",
                message: response.message,
                alertType: "success",
                trueActionBtnText: "Okay",
                trueActionCallback: () => _logOut(),
            });
			_btnDisable("submitBtn", btnText, false);
		} else {
			_btnDisable("submitBtn", btnText, false);
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
		_callAjaxError(() => _changePasswordCallback(formData)); // retry if needed
		_btnDisable("submitBtn", btnText, false);
    });
}