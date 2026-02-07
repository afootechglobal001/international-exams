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
                        onclick="_proceedDownloadEbook('${exam?.examData?.examId}', '${ebook.ebookId}');">
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
                    const material = response.material;
                    _finishDownloadEbook(material);
                    _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
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
                _callAjaxError(() => _downloadEbook(examId, ebookId)); // retry if needed
                _btnDisable(`downloadBtn_${ebookId}`, btnText, false);
            });
    } catch (error) {
        console.error("Error:", error);
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

function _proceedDownloadEbook(examId, ebookId) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `user/ebooks/download-ebook?examId=${examId}&ebookId=${ebookId}`,
			accessKey: true,
		})
		.then((response) => {
            _userValidationCheck(response.response);
			if (response.success && response.data) {
    			sessionStorage.setItem("useProceedEbookDownloadSession", JSON.stringify(response.data));
                _getForm({page: 'proceedEbookForm', url: portalOperationMiddlewareUrl});
			} else {
                _alertClose();
				_showCustomConfirm({
					title: "ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
            _alertClose();
			console.error("Error:", error);
			_callAjaxError(() => _proceedDownloadEbook(examId, ebookId)); // retry if needed
		});
	} catch (error) {
        _alertClose();
		console.error("Error:", error);
		_callCatchError(() => _proceedDownloadEbook(examId, ebookId));
  	}
}