function _loadWallet() {
  try {
    //////get all needed values////
    const amount = $("#walletAmount").val().trim();
    ///// empty field validation//////////
    let issueCount = 0;
    issueCount += _validateEmptyValue("walletAmount", "AMOUNT");
    issueCount += _validateNumber("walletAmount", amount);
    if (issueCount > 0) return;
    // Gather form data
    const formData = {
      amount: amount,
    };

    const btnText = $("#loadWalletBtn").html();
    _btnDisable("loadWalletBtn", btnText, true);

    _callRawEndPoints({
      url: "user/payment/load-wallet-log",
      formData,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);
        if (response.success) {
          const data = response.data;
          _payWithPaystackLoadWallet(
            data.transactionId,
            data.fullName,
            data.emailAddress,
            data.phoneNumber,
            data.paymentKey,
            data.amount,
            data.currency
          );
        } else {
          _showCustomConfirm({
            title: "OPERATION FAILED",
            message: response.message,
            alertType: "failed",
            trueActionBtnText: "OK",
          });
          _btnDisable("loadWalletBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _logOut()); // retry if needed
        _btnDisable("loadWalletBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _loadWallet());
    _btnDisable("loadWalletBtn", btnText, false);
  }
}

////// CALL LOAD WALLET PAYSTACK ////////////////
function _payWithPaystackLoadWallet(
  transactionId,
  fullName,
  emailAddress,
  phoneNumber,
  paymentKey,
  amount,
  currency
) {
  var handler = PaystackPop.setup({
    key: paymentKey,
    email: emailAddress,
    amount: amount * 100, //amt in kobo
    ref: transactionId,
    currency: currency, // Use GHS for Ghana Cedis or USD for US Dollars
    metadata: {
      custom_fields: [
        {
          display_name: fullName,
          variable_name: "mobile_number",
          value: phoneNumber,
        },
      ],
    },
    callback: function (response) {
      _loadWalletAction("success", transactionId);
    },
    onClose: function () {
      //update to cancelled.
      _loadWalletAction("cancel", transactionId);
      return false;
    },
  });
  handler.openIframe();
}
////////////////////// END LOAD WALLET PAYSTACK /////////////////////////////

function _loadWalletAction(action, transactionId) {
  try {
    _callRawEndPoints({
      url: `user/payment/load-wallet-${action}?id=${transactionId}`,
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
              action === "success"
                ? "TRANSACTION SUCCESSFUL"
                : "TRANSACTION CANCELLED",
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
          _btnDisable("loadWalletBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _logOut()); // retry if needed
        _btnDisable("loadWalletBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _loadWalletAction());
    _btnDisable("loadWalletBtn", btnText, false);
  }
}

function _fetchTransactionHistory() {
  try {
    _callFetchEndPoints({
      url: `user/payment/fetch-transactions`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);
        if (response.success && response.data?.length > 0) {
          $("#walletBalance").html(
            thousandSeparator(response.userData.walletBalance)
          );
          $("#currencySymbol").html(response.userData.currency);
          initTransactionTable(response.data);
        } else {
          $("#transactionHistoryContent").html(`
            <tr>
              <td colspan="8">
                <div class="false-notification-div">
                  <p>${response.message}</p>
                </div>
              </td>
            </tr>`);

          $("transactionPaginationControls").html("");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function renderTransactionRows(data, start) {
  return data
    .map(
      (item, i) => `
    <tr class="tb-row">
      <td>${start + i + 1}</td>
      <td>${item.updatedTime}</td>
      <td class="clickable-td">${item.transactionId}</td>
      <td>${item.currency} ${thousandSeparator(item.amount)}</td>
      <td>${item.transactionTypeName}</td>
      <td>${item.paymentMethodName}</td>
      <td><div class="status-div ${item.statusName}">${
        item.statusName
      }</div></td>
      <td>
        <button class="btn view-btn"
          onclick="_fetchEachTransactionHistory('${item.transactionId}')">
          VIEW
        </button>
      </td>
    </tr>`
    )
    .join("");
}

function initTransactionTable(transactions) {
  const paginator = new Paginator(
    transactions,
    renderTransactionRows,
    "transactionPaginationControls",
    "transactionHistoryContent",
    5 // items per page
  );
  __paginatorHandlers["transactionHistoryContent"] = paginator;
  paginator.renderPage();
}

function _filtersTransactionHistory(value) {
  $("#searchTransactionHistory > tbody .tb-row").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _fetchEachTransactionHistory(transactionId) {
  $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `user/payment/fetch-transactions?transactionId=${transactionId}`,
			accessKey: true,
		})
		.then((response) => {
        _userValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("useEachTransactionSession", JSON.stringify(response.data[0]));
          _getForm({page: 'transactionHistoryDetails', url: portalOperationMiddlewareUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH TRANSACTION HISTORY ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}