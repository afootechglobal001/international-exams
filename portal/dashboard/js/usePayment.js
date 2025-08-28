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
        _callAjaxError(() => _loadWallet()); // retry if needed
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
      console.log(response);
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
          const data = response.data;
          console.log(data);
          // $("#user_wallet_balance,#user_wallet_balance").html(
          //   _numberWithComma(getData.wallet_balance)
          // );
          sessionStorage.setItem("userLoginData", JSON.stringify(data));
          _alertClose();
          _showCustomConfirm({
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
        _callAjaxError(() => _loadWalletAction()); // retry if needed
        _btnDisable("loadWalletBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _loadWalletAction());
    _btnDisable("loadWalletBtn", btnText, false);
  }
}

// action==='success' ?"You have successfully loaded your wallet." : "You have cancelled the transaction.",
