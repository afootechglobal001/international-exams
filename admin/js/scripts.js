function _nextLoginPage(props) {
	const {
        page = '',
    } = props;
	_getPage({page: page, url: adminLocalUrl});
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
		const userName = $('#userName').val().trim();
		const password = $("#password").val().trim();

		$('#userName, #password').removeClass('issue');
		$('#issue_userName, #issue_password').html('');

		if (!userName || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(userName)) {
			$('#userName').addClass('issue');
			$('#issue_userName').html('USER ERROR! Kindy provide correct email address to continue');
			issueCount++;
		} 	

		if (!password) {
			$('#password').addClass('issue');
			$('#issue_password').html('USER ERROR! Kindy provide a correct password to continue');
			issueCount++;
		} 

		if (issueCount > 0) return;
		
		//////////////// get btn text ////////////////
		const btnText = $("#submitBtn").html();
		$("#submitBtn").html('<img src="' + websiteUrl + '/all-images/images/loading.gif" width="12px" alt="Loading"/>');
		$("#submitBtn").prop("disabled", true);
		////////////////////////////////////////////////
		
		const formData = {
			"userName": userName,
			"password": password
		};

		$.ajax({
			type: "POST",
			url: `${endPoint}/admin/auth/login`,
			data: JSON.stringify(formData),
			dataType: "json", 
			cache: false,
			headers: {
				'apiKey': apiKey,
				'userOsBrowser': userOsBrowser,
				'userIpAddress': userIpAddress,
				'userDeviceId': userDeviceId
			},
			success: function (data) {
				if (data.success) {
					const staffLoginData = data.data[0];
					// Store in sessionStorage
					sessionStorage.setItem("staffLoginData", JSON.stringify(staffLoginData));
					_actionAlert(data.message, true);
					window.location.href = adminDashboardUrl;
				} else {
					_actionAlert(data.message, false);
				}
				$("#submitBtn").html(btnText).prop("disabled", false);
			},
			error: function (error) {
				console.error("Error during login:", error);
				_actionAlert("Unable to reach the server. Please check your connection.", false);
				$("#submitBtn").html(btnText).prop("disabled", false);
			}
		});
	} catch (error) {
		console.error("Unexpected error:", error);
		_actionAlert("An unexpected error occurred. Please try again.", false);
		$("#submitBtn").prop("disabled", false);
	}
}


