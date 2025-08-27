function _fetchCountryData() {
  $("#pageContent")
    .html(
      '<div class="ajax-loader pages-ajax-loader"><img src="' +
        websiteUrl +
        '/all-images/images/spinner.gif" alt="Loading"/></div>'
    )
    .fadeIn("fast");
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/admin/country/fetch-country`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const fetch = info.data;

        let content = "";
        let no = 0;

        content = `
				<thead>
                    <tr class="tb-col">
                        <th>sn</th>
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Number of branches</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>`;

        if (info.success) {
          for (let i = 0; i < fetch.length; i++) {
            no++;
            const countryInfo = fetch[i];
            const countryId = countryInfo.countryId;
            const countryName = countryInfo.countryName;
            const smtpUsername = countryInfo.smtpUsername;
            const phoneNumber = countryInfo.phoneNumber;
            const statusName = countryInfo.statusName;
            const totalNumberOfBranches = countryInfo.totalNumberOfBranches;

            content += `
						<tbody>
							 <tr class="tb-row">
								<td>${no}</td>
								<td class="clickable-td" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">${countryName}</td>
								<td>${phoneNumber}<br/><span>${smtpUsername}</span></td>
								<td>${totalNumberOfBranches}</td>
								<td>
									<div class="status-div ${statusName}">${statusName}</div>
								</td>
								<td><button class="btn view-btn" title="CLICK TO VIEW ${countryName} PROFILE" onclick="_fetchEachCountry('${countryId}');">VIEW</button></td>
							</tr>
						</tbody>`;
          }
          $("#pageContent").html(content);
        } else {
          _showCustomConfirm({
            title: "Fetch Branch Error",
            message: info.message,
            alertType: "warning",
            trueActionBtnText: "OK",
          });

          $("#pageContent").html(`
					<tbody>
						<tr>
							<td colspan="11">
								<div class="false-notification-div">
					 				<p>${info.message}</p>
								</div>
							</td>
						</tr>
					</tbody>`);

          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
      error: function (textStatus, errorThrown) {
        console.error("AJAX Error: ", textStatus, errorThrown);
        _showCustomConfirm({
          title: "Connection Error!",
          message: "An error occurred while fetching data! Please try again.",
          alertType: "error",
          trueActionBtnText: "OK, Retry",
        });

        $("#pageContent").html(`
				<tbody>
					<tr>
						<td colspan="11">
							<div class="false-notification-div">
								<p>An error occurred while fetching data! Please try again.</p>
							</div>
						</td>
					</tr>
				</tbody>`);
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
///// for country modal
function _fetchEachCountry(countryId) {
  $("#get-form-more-div")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/admin/country/fetch-country?countryId=${countryId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        if (info.success && info.data.length > 0) {
          sessionStorage.setItem(
            "getEachCountrySession",
            JSON.stringify(info.data[0])
          );
          _getForm({ page: "branchCountry", url: adminPortalLocalUrl });
        } else {
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
      error: function (textStatus, errorThrown) {
        _alertClose();
        console.error("AJAX Error: ", textStatus, errorThrown);
        _showCustomConfirm({
          title: "Connection Error!",
          message: "An error occurred while fetching data! Please try again.",
          alertType: "error",
          trueActionBtnText: "OK, Retry",
        });
      },
    });
  } catch (error) {
    _alertClose();
    console.error("Error: ", error);
    _showCustomConfirm({
      title: "Unexpected Error",
      message: "An unexpected error occurred! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}

function _getSelectCountry(fieldId) {
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-country`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(),
      success: function (info) {
        const data = info.data;
        const success = info.success;

        if (success === true) {
          for (let i = 0; i < data.length; i++) {
            const id = data[i].countryId;
            const value = data[i].countryName;
            $("#searchList_" + fieldId).append(
              "<li onclick=\"_clickOption('searchList_" +
                fieldId +
                "', '" +
                id +
                "', '" +
                value +
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
      title: "Unexpected Error!",
      message:
        "An unexpected error occurred while fetching countries! Please try again.",
      alertType: "error",
      trueActionBtnText: "OK, Retry",
    });
  }
}
