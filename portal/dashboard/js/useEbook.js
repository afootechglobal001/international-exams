function _fetchAllEbookData() {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `user/ebooks/fetch-ebook`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);
        if (response.success && response.data?.length > 0) {
          _initFetchEbookData(response.data);
        } else {
          $("#pageContent").html(`
            <div class="false-notification-div">
                <p>${response.message}</p>
            </div>
        `);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFetchEbookData(data) {
    const content = data.map((exam) => {
        const dataInfo = exam.ebookData || [];
        if (dataInfo.length === 0) return '';

        const eBookContent = dataInfo.map((ebook) => {

            const isFree = exam.isDownloadable === true;

            const btnContainer = isFree
                ? `
                    <button class="btn" title="Download"
                        id="downloadBtn_${ebook.ebookId}"
                        onclick="_downloadEbook('${exam?.examData?.examId}', '${ebook.ebookId}')">
                        <i class="bi bi-cloud-download"></i> Download Now!
                    </button>
                  `
                : `
                    <button class="btn" title="Pay To Download"
                        id="downloadBtn_${ebook.ebookId}"
                        onclick="_downloadEbook('${exam?.examData?.examId}', '${ebook.ebookId}');">
                        <i class="bi bi-credit-card"></i> Pay Now!
                    </button>
                  `;

            const priceText = isFree
                ? `<span class="price-value free">It’s Free</span>`
                : `<span class="price-value">${'<s>N</s>' + thousandSeparator(ebook.sellingPrice)}</span>`;

            return `
                <div class="book-div">
                    <div class="image-div">
                        <img src="${eBookPixPath}/${ebook.regpix}" alt="${exam?.examData?.examAbbr} Cover">
                    </div>

                    <div class="icon-div">
                        <img src="${examLogoPixPath}/${exam?.examData?.examLogo}" alt="${exam?.examData?.examAbbr} Exam">
                    </div>

                    <div class="text-div">
                        <div class="details">
                            <h3>${exam?.examData?.examAbbr}</h3>
                            <p>${ebook.ebookTitle}</p>

                            <div class="book-sum">
                                <p><i class="bi bi-journal-text"></i> <strong>${ebook.ebookPages} Pages</strong></p>
                                <p><i class="bi bi-floppy"></i> <strong>${ebook.ebookSize}</strong></p>
                            </div>
                        </div>

                        <div class="bottom-div">
                            ${btnContainer}
                            ${priceText}
                        </div>
                    </div>
                </div>
            `;
        }).join("");

        return `
            <section class="main-content-div">
                <section class="content-div">
                    <div class="content-title">
                        <div class="title">
                            <i class="bi bi-filetype-pdf"></i>
                            <p>${exam?.examData?.examAbbr} E-Books</p>
                        </div>
                    </div>

                    <div class="book-back-div">
                        ${eBookContent}
                    </div>
                </section>
            </section>
        `;
    }).join("");

    $('#pageContent').html(content);
}

function _filtersEbooks(value) {
  $("#pageContent > .main-content-div, .book-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _downloadEbook(examId, ebookId) {
    ///// get btn text/////
	const btnText = $(`#downloadBtn_${ebookId}`).html();
	_btnDisable(`downloadBtn_${ebookId}`, btnText, true);
    try {
        _callFetchEndPoints({
            url: `user/ebooks/download-ebook?examId=${examId}&ebookId=${ebookId}`,
            accessKey: true,
        })
            .then((response) => {
                _userValidationCheck(response.response);
                if (response.success) {
                    const isDownloadable = response.isDownloadable;
                    const material = response.material;

                    if (isDownloadable===true) {
                        _finishDownloadEbook(material);
                        _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
                    } else {
                        sessionStorage.setItem("useProceedEbookDownloadSession", JSON.stringify(response.data));
                        _getForm({page: 'proceedEbookForm', url: portalOperationMiddlewareUrl});
                        _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
                    }
                } else {
                    _showCustomConfirm({
                        title: "Download E-Book Error",
                        message: response.message,
                        alertType: "warning",
                        trueActionBtnText: "OK",
                    });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                 _alertClose();
                _callAjaxError(() => _downloadEbook(examId, ebookId)); // retry if needed
                _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
            });
    } catch (error) {
        console.error("Error:", error);
         _alertClose();
        _callAjaxError(() => _downloadEbook(examId, ebookId)); // retry if needed
         _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
    }
}

function _finishDownloadEbook(material) {
  const url = `${ebookMaterialPath}/${material}`;

  // open new tab
  const tab = window.open(url, '_blank');

  // force download after tab opens
  setTimeout(() => {
    const a = document.createElement('a');
    a.href = url;
    a.download = material;
    a.click();
  }, 500);
}

///// proceed to ebook payment /////
function _proceedToEbookPayment() {
  try {
    //////get all needed values////
    const paymentMethodId = $("#paymentMethodId").val().trim();

    ///// empty field validation//////////
    let issueCount = 0;
    issueCount += _validateEmptyValue("paymentMethodId", "PAYMENT METHOD");
    if (issueCount > 0) return;

    // Gather form data
    const formData = {
        paymentMethodId,
    };

    ////// confirm action
    _showCustomConfirm({
      callback: () => {
        _proceedEbookPaymentCallBack(formData);
      },
      title: "Are you sure?",
      message: "Confirm you want to proceed with the payment.",
      alertType: "warning",
      falseActionBtn: true,
    });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() => _proceedToEbookPayment());
  }
}

///// proceed to ebook payment callback ////
function _proceedEbookPaymentCallBack(formData) {
    let useProceedEbookDownloadSession = JSON.parse(sessionStorage.getItem("useProceedEbookDownloadSession")) || {};
    //// call endpoint
    const btnText = $("#proceedPayBtn").html();
    _btnDisable("proceedPayBtn", btnText, true);
    _callRawEndPoints({
        url: `/user/ebooks/proceed-to-ebook-payment?examId=${useProceedEbookDownloadSession?.examId}&ebookId=${useProceedEbookDownloadSession?.ebookId}`,
        formData,
        accessKey: true,
    })
    .then((response) => {
    if (response.success) {
        if (
          formData.paymentMethodId === "CC" ||
          formData.paymentMethodId === "BT"
        ) {
          _payWithPaystackForEbookDownload(response.data, formData.paymentMethodId);
          _btnDisable("proceedPayBtn", btnText, false);
        } else if (formData.paymentMethodId === "WLT") {
            const material = response.data?.material;
            _alertClose();
            _showCustomConfirm({
                callback: () => _finishDownloadEbook(material),
                title: "PAYMENT SUCCESSFUL",
                message: response.message,
                alertType: "success",
                trueActionBtnText: "ClICK TO DOWNLOAD",
            });
        } else {
            _btnDisable("proceedPayBtn", btnText, false);
            _showCustomConfirm({
                title: "USER ERROR",
                message:"The selected payment method is not recognized. Please try again.",
                alertType: "warning",
                trueActionBtnText: "OK",
            });
        }
    } else {
        _btnDisable("proceedPayBtn", btnText, false);
        _showCustomConfirm({
            title: "USER ERROR",
            message: response.message,
            alertType: "warning",
            trueActionBtnText: "OK",
        });
    }
    }).catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _proceedEbookPaymentCallBack(formData)); // retry if needed
        _btnDisable("proceedPayBtn", btnText, false);
    });
}

////// CALL PAY WITH PAYSTACK ////////////////
function _payWithPaystackForEbookDownload(data, paymentMethodId) {
  var handler = PaystackPop.setup({
    key: data.paymentKey,
    email: data.emailAddress,
    amount: data.amount * 100, //amt in kobo
    ref: data.transactionId,
    currency: data.currency, // Use GHS for Ghana Cedis or USD for US Dollars
    channel: [paymentMethodId === "CC" ? "card" : "bank_transfer"],
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
      _ebookDownloadPaymentAction(
        "success",
        data.transactionId,
        data.examId,
        data.ebookId
      );
    },
    onClose: function () {
      //update to cancelled.
      _ebookDownloadPaymentAction(
        "cancel",
        data.transactionId,
        data.examId,
        data.ebookId
      );
      return false;
    },
  });
  handler.openIframe();
}

function _ebookDownloadPaymentAction(action, transactionId, examId, ebookId) {
  try {
    _callRawEndPoints({
      url: `user/ebooks/ebook-payment-${action}?transactionId=${transactionId}&examId=${examId}&ebookId=${ebookId}`,
      accessKey: true,
    })
      .then((response) => {
        _userValidationCheck(response.response);

        if (response.success) {
            if(action === "success"){
                const material = response.data?.material;
                _alertClose();
                _showCustomConfirm({
                    callback: () => _finishDownloadEbook(material),
                    title: "PAYMENT SUCCESSFUL",
                    message: response.message,
                    alertType: "success",
                    trueActionBtnText: "ClICK TO DOWNLOAD",
                });
            }
        } else {
          _showCustomConfirm({
            title: "OPERATION FAILED",
            message: response.message,
            alertType: "failed",
            trueActionBtnText: "OK",
          });
          _btnDisable("proceedPayBtn", btnText, false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        _callAjaxError(() => _ebookDownloadPaymentAction(action, transactionId, examId, ebookId)); // retry if needed
        _btnDisable("proceedPayBtn", btnText, false);
      });
  } catch (error) {
    console.error("Error:", error);
    _callCatchError(() =>
      _ebookDownloadPaymentAction(action, transactionId, examId, ebookId)
    );
    _btnDisable("proceedPayBtn", btnText, false);
  }
}
////////////////////// END PAY WITH PAYSTACK /////////////////////////////