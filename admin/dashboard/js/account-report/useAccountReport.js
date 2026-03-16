function _getActiveReportNav(props) {
  const {
    page = "",
    divid = "",
    pageContainer = "getNavPage",
  } = props;
  _getReportActiveNav(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: adminPortalLocalUrl,
    });
  }
}
function _getReportActiveNav(divid) {
  $(
    "#filterByNaira, #filterByDollar"
  ).removeClass("active");
  $("#" + divid).addClass("active");
}


function _getPaymentStatusNav(props) {
  const {
    page = "",
    divid = "",
    id="",
    pageContainer = "getPaymentNav",
  } = props;
  _getActivePaymentStatusNav(divid);
  if (page) {
    _getPage({
      page: page,
      id: id,
      pageContainer: pageContainer,
      url: adminPortalLocalUrl,
    });
  }
}
function _getActivePaymentStatusNav(divid) {
  $(".title-nav-back-div ul li").removeClass("active-li");
  $("#" + divid).addClass("active-li");
}

///// Dashbaord Custom Revenue Filtering ////////
function _fetchReportRevenueFiltering(filterWith, text, currency) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeOut(500);
  let dateFrom;
  const dateTo = new Date().toISOString().split("T")[0];
  if (filterWith === "srch-today") {
    dateFrom = new Date().toISOString().split("T")[0];
  } else if (filterWith === "srch-week") {
    const currentDate = new Date();
    const firstDayOfWeek = new Date(
      currentDate.setDate(currentDate.getDate() - currentDate.getDay())
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfWeek;
  } else if (filterWith === "srch-7") {
    /// for last 7 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 6))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-30") {
    /// for last 30 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 29))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-90") {
    /// for last 90 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 89))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-month") {
    const currentDate = new Date();
    const firstDayOfMonth = new Date(
      currentDate.getFullYear(),
      currentDate.getMonth(),
      2
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfMonth;
  } else if (filterWith === "srch-year") {
    const currentDate = new Date();
    const firstDayOfYear = new Date(currentDate.getFullYear(), 0, 2)
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfYear;
  } else if (filterWith === "srch-1year") {
    /// for last 1 year
    const currentDate = new Date();
    const pastDate = new Date(
      currentDate.setFullYear(currentDate.getFullYear() - 1)
    )
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  }

  _reportRevenueFiltering(dateFrom, dateTo, currency);
}
function _fetchCustomReportRevenueFiltering(currency) {
  let issueCount = 0;

  const dateFrom = $("#datepickers-from").val();
  const dateTo = $("#datepickers-to").val();

  $("#datepickers-from, #datepickers-to").removeClass("issue");
  $("#issue_from, #issue_to").html("");

  if (!dateFrom) {
    $("#issue_from").html("Kindly Provide Start Date To Continue");
    issueCount++;
  }

  if (!dateTo) {
    $("#issue_to").html("Kindly Provide End Date To Continue");
    issueCount++;
  }

  if (issueCount > 0) {
    return;
  }

  _reportRevenueFiltering(dateFrom, dateTo, currency);
}

function _reportRevenueFiltering(dateFrom, dateTo, currency) {
  $("#get-form-more-div")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  $.ajax({
    type: "GET",
    url: `${endPoint}/admin/account-reports/fetch-revenue-by-date-range?dateFrom=${dateFrom}&dateTo=${dateTo}&currency=${currency}`,
    dataType: "json",
    cache: false,
    headers: getAuthHeaders(true),
    success: function (info) {
      if (info.success && info.statistics.length > 0) {
        const statistic = info.statistics[0];
        const sumCreditCardPayments = Number(statistic.sumCreditCardPayments) || 0;
        const sumBankTransferPayments = Number(statistic.sumBankTransferPayments) || 0;
        const totalRevenue = thousandSeperator(sumCreditCardPayments + sumBankTransferPayments);
        let fetchedCurrency = info.currency;
        let currencySymbol = info.currency === "USD" ? "$" : "<s>N</s>"; 
        
        /// Update Total Revenue ///
        $("#totalRevenue").html(currencySymbol + totalRevenue);

        // Update custom date from and date to///
        $("#dateFrom").html(info.dateFrom);
        $("#dateTo").html(info.dateTo);

        // Update Report Statistics info///
        $("#sumCreditCardPayments").html(currencySymbol + thousandSeperator(statistic.sumCreditCardPayments));
        $("#sumBankTransferPayments").html(currencySymbol + thousandSeperator(statistic.sumBankTransferPayments));
        $("#sumWalletPayments").html(currencySymbol + thousandSeperator(statistic.sumWalletPayments));
        $("#countCreditCardPayments").html(statistic.countCreditCardPayments);
        $("#countBankTransferPayments").html(statistic.countBankTransferPayments);
         $("#countWalletPayments").html(statistic.countWalletPayments);

        //// Update Dougnut Chart Revenue ///
        const dataPoints = [
          {
            label: "Credit Card",
            y: Number(statistic.sumCreditCardPayments) || 0,
          },
          {
            label: "Bank Transfer",
            y: Number(statistic.sumBankTransferPayments) || 0,
          },
          {
            label: "Wallet Payment",
            y: Number(statistic.sumWalletPayments) || 0,
          },
        ];

        $("#chartContainer1").CanvasJSChart({
          data: [
            {
              type: "doughnut",
              innerRadius: 30,
              indexLabel: "{label} ({y})",
              yValueFormatString: "₦#,##0.00",
              indexLabelFontSize: 9,
              dataPoints: dataPoints,
            },
          ],
        });

        const options = {
            title: { text: "" },
            data: [
              {
                type: "pie",
                startAngle: 45,
                showInLegend: true,
                legendText: "{label}",
                indexLabel: "{label} ({y})",
                indexLabelPlacement: "outside",
                indexLabelFontSize: 9,
                dataPoints: [
                {
                  label: "Debit/Credit Card",
                  y: parseInt(statistic.countCreditCardPayments) || 0,
                },
                {
                  label: "Bank Transfer",
                  y: parseInt(statistic.countBankTransferPayments) || 0,
                },
                {
                  label: "Wallet Payment",
                  y: parseInt(statistic.countWalletPayments) || 0,
                }
          ]
        }
      ]
    };

    $("#chartContainer2").CanvasJSChart(options);

        // Update Report revenue Table ///
        let text = "";
        let no = 0;
        if (info.data && info.data.length > 0) {
          for (let i = 0; i < info.data.length; i++) {
            no++;
            const fetchedData = info.data[i];
            const payDate = new Date(fetchedData.payDate);
            const newpayDate = payDate.toISOString().split("T")[0];
            const totalSuccessfulPayments = fetchedData.totalSuccessfulPayments;
            const totalPendingPayments = fetchedData.totalPendingPayments;
            const totalCancelledPayments = fetchedData.totalCancelledPayments;

            text += `
              <tr class="tb-row">
                <td>${no}</td>
                <td class="clickable-td" title="Click to view payment breakdown" onclick="_proceedRevenueDetails('${newpayDate}','${fetchedCurrency}');">${newpayDate}</td>
                <td class="SUCCESSFULSTATUS">${currencySymbol}${thousandSeperator(totalSuccessfulPayments)}</td>
                <td class="PENDINGSTATUS">${currencySymbol}${thousandSeperator(totalPendingPayments)}</td>
                <td class="CANCLLEDSTATUS">${currencySymbol}${thousandSeperator(totalCancelledPayments)}</td>
                <td><button class="btn view-btn" title="Click to view payment breakdown" onclick="_proceedRevenueDetails('${newpayDate}','${fetchedCurrency}');">VIEW DETAILS</button></td>
              </tr>
            `;
          }
          $("#pageContent").html(text);
        } else {
          text += `
            <tr>
                <td colspan="20">
                  <div class="false-notification-div">
										<p>No payment record found!</p>
									</div>
                </td>
            </tr>`;
          $("#pageContent").html(text);
        }
      } else {
        const response = info.response;
        if (response < 100) {
          _logOut();
        }
      }
    },
    error: function (err) {
      console.error(err);
    },
  });
  $("#get-form-more-div").fadeOut(500);
}

function _proceedRevenueDetails(date, currency){
  sessionStorage.setItem("sessionCurrency", currency);
    _getForm({
        page: "revenueBreakdown",
        id: date,
        url: adminPortalLocalUrl
    });
}

function _loadPaymentsByStatus(statusId, newpayDate) {
  let sessionCurrency = sessionStorage.getItem("sessionCurrency");

  try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/account-reports/fetch-revenue-by-date?date=${newpayDate}&statusId=${statusId}&currency=${sessionCurrency}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				if (info.success) {
					const fetchedData = info.data;
          let currencySymbol = info.currency === "USD" ? "$" : "<s>N</s>";

          $('#date').html(info?.date);
          if (statusId === '4' && fetchedData.length > 0) {
            $('output').show();
            $('#totalAmount').html(currencySymbol + thousandSeperator(info?.totalAmount));
          } else {
            $('output').hide();
          }

          if (statusId === '3') {
            $('#actionHeader').show();
          } else {
            $('#actionHeader').hide();
          }

          let text = "";
          let no = 0;

          if (fetchedData && fetchedData.length > 0) {
            for (let i = 0; i < fetchedData.length; i++) {
                no++;
                const fetchUserData = fetchedData[i]?.userData;
                const fetchReferenceData = fetchedData[i]?.referenceData;
                const amount = fetchedData[i]?.amount;
                const fetchedStatusData = fetchedData[i]?.statusData;
                const fetchedPaymentMethodData = fetchedData[i]?.paymentMethodData;
                const payDate = fetchedData[i]?.payDate;
                const transactionId = fetchedData[i]?.transactionId;
                const referenceId = fetchedData[i]?.referenceId;
                const currency = fetchedData[i]?.currency;
                const reasonForPayment = fetchedData[i]?.reasonForPayment;

                //// User Data ////
                const userId = fetchUserData?.userId || '';
                const firstName = fetchUserData?.firstName || '';
                const lastName = fetchUserData?.lastName || '';
                const phoneNumber = fetchUserData?.phoneNumber || '';
                const emailAddress = fetchUserData?.emailAddress || '';
                const fullname = firstName + ' ' + lastName;

                //// Reference Data ////
                const ebookExamAbbr = fetchReferenceData?.examAbbr || '';
                const examAbbr = fetchReferenceData?.examData?.examAbbr || '';
                const regTitle = fetchReferenceData?.examData?.regTitle || '';
                const ebookTitle = fetchReferenceData?.ebookTitle || '';
          
                /// Status Data ///
                const statusName = fetchedStatusData.statusName;
                const statusId = fetchedStatusData.statusId;

                /// Payment Method Data ///
                const paymentMethodName = fetchedPaymentMethodData?.paymentMethodName;

                let buttonHtml = '';

                $('#revenueAlert').removeClass('alert-success alert-failed');
                if (statusId === '4') {
                  $('#revenueAlert').addClass('alert-success');
                } else {
                  $('#revenueAlert').addClass('alert-failed');
                }

               if (reasonForPayment === 'ExamRegistration') {
                  refrenceTdHtml = `
                    <td>
                        <div class="text-back-div">
                            <div class="text-div">
                                <div class="first-class">${examAbbr}</div>
                                <div class="second-class">${regTitle}</div>
                            </div>
                        </div>
                    </td>
                  `;
                } else if (reasonForPayment === 'Ebook'){
                  refrenceTdHtml = `
                    <td>
                        <div class="text-back-div">
                            <div class="text-div">
                                <div class="first-class">${ebookExamAbbr}</div>
                                <div class="second-class">${ebookTitle}</div>
                            </div>
                        </div>
                    </td>
                  `;
                } else if (reasonForPayment === 'Wallet'){
                  refrenceTdHtml = `
                    <td>Load Wallet</td>
                  `;
                }

                if (statusId === '3') {
                  buttonHtml = `
                    <td>
                      <div class="btn-div">
                        <button class="confirm-btn"
                          id="confirmBtn_${transactionId}"
                          title="Click to confirm payment"
                          onclick="_paymentConfirmation('success', '${transactionId}', '${referenceId}');">
                          <i class="bi-check-circle"></i>
                        </button>

                        <button class="confirm-btn cancel-btn"
                          id="cancelBtn_${transactionId}"
                          title="Click to cancel payment"
                          onclick="_paymentConfirmation('cancel', '${transactionId}', '${referenceId}');">
                          <i class="bi-x-circle"></i>
                        </button>
                      </div>
                    </td>
                  `;
                }

                text += `
                  <tr class="tb-row">
                      <td>${no}</td>
                      <td class="clickable-td"
                          onclick="">
                          <div class="text-back-div">
                              <div class="text-div">
                                  <div class="first-class">${fullname}</div>
                                  <div class="second-class">${emailAddress}</div>
                                  <div class="second-class">${phoneNumber}</div>
                              </div>
                          </div>
                      </td>
                      <td>${reasonForPayment}</td>
                      ${refrenceTdHtml}
                    <td>${currencySymbol}${thousandSeperator(amount)}</td>
                    <td>${paymentMethodName}</td>
                    <td>
                        <div class="status-div ${statusName}">
                            ${statusName}
                        </div>
                    </td>
                    <td>${payDate}</td>
                    <td>
                     <div class="btn-div">
                      <button class="btn view-btn"
                          title="Click to view payment breakdown"
                          onclick="_fetchRevenueById('${transactionId}', '${currency}');">
                        VIEW DETAILS
                      </button>
                      </div>
                    </td>
                    ${buttonHtml} 
                  </tr>
              `;
            }
            $('#pageContent').html(text);
          } else {
            text += `
              <tr>
                  <td colspan="20">
                    <div class="false-notification-div">
                      <p>No payment record found!</p>
                    </div>
                  </td>
              </tr>`;
            $("#pageContent").html(text);
          }

				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				_actionAlert('Check your internet connection and try again.', false);
			}
		});
	} catch (error) {
		_alertClose();
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred! Please try again.', false);
	}
}

function _fetchRevenueById(transactionId, currency) {
	$("#get-more-div-secondary").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/admin/account-reports/fetch-revenue-by-id?transactionId=${transactionId}&currency=${currency}`,
			dataType: "json", 
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				if (info.success && info.data.length > 0) {
					sessionStorage.setItem("getRevenueBreakdownSessionData", JSON.stringify(info.data[0]));
					_getForm({ page: 'paymentBreakDownForm', layer: 2, url: adminPortalLocalUrl });
				} else {
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			},
			error: function(textStatus, errorThrown) {
        _alertClose(2);
				console.error("AJAX Error: ", textStatus, errorThrown);
				_actionAlert('Check your internet connection and try again.', false);
			}
		});
	} catch (error) {
		_alertClose(2);
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred! Please try again.', false);
	}
}

function _paymentConfirmation(action, transactionId, examRegistrationId) {
    _showCustomConfirm({
      callback: () => {
        _paymentConfirmationCallBack(action, transactionId, examRegistrationId);
      },
      title: "Are you sure?",
      message: action === "success"
      ? "Are you sure you want to confirm this payment?"
      : "Are you sure you want to cancel this payment?",
      alertType: action === "success" ? "success" : "warning",
      falseActionBtn: true,
    });
}

function _paymentConfirmationCallBack(action, transactionId, examRegistrationId) {
   let sessionPayDate = sessionStorage.getItem("sessionPayDate");

  const btnId = action === "success"
    ? `confirmBtn_${transactionId}`
    : `cancelBtn_${transactionId}`;

  const btnText = $("#" + btnId).html();
  _btnDisable(btnId, btnText, true);

  try {
    _callRawEndPoints({
      url: `admin/account-reports/payment/exam-payment-${action}?transactionId=${transactionId}&examRegistrationId=${examRegistrationId}`,
      accessKey: true,
    })
      .then((response) => {
        _staffValidationCheck(response.response);
        if (response.success) {
          _showCustomConfirm({
           callback: () => 
            _getPaymentStatusNav({
              divid: action === "success" ? "successfulPage" : "cancelledPage",
              page: action === "success" ? "successfulPage" : "cancelledPage",
              id: sessionPayDate,
              url: adminPortalLocalUrl
            }),
            title: action === "success"
              ? "PAYMENT CONFIRMATION SUCCESSFUL"
              : "PAYMENT CANCELLED",
            message: response.message,
            alertType: action === "success" ? "success" : "error",
            trueActionBtnText: "OK"
          });
          if (action==="success") {
            _sendExamRegistrationSuccessEmail(examRegistrationId);
          }
        } else {
          _showCustomConfirm({
            title: "Operation Failed",
            message: response.message,
            alertType: "warning",
            trueActionBtnText: "OK",
          });
          _btnDisable(btnId, btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _paymentConfirmationCallBack(action, transactionId, examRegistrationId)); // retry if needed
        _btnDisable(btnId, btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() =>
      _paymentConfirmationCallBack(action, transactionId, examRegistrationId),
    );
    _btnDisable(btnId, btnText, false);
  }
}

function _sendExamRegistrationSuccessEmail(examRegistrationId) {
  //// call endpoint //////
	_callFileEndPoints({
		url:  `user/exam/send-exam-registration-success-email?examRegistrationId=${examRegistrationId}`,
		accessKey: true,
	})
}