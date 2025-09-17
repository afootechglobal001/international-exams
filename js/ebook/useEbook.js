function _fetchAllEbookData() {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/ebook/fetch-ebook`,
    })
      .then((response) => {
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
    // loop through all ebooks for this exam
    const eBookContent = exam.ebookData.map((ebook) => `
    <div class="book-back-div">
        <div class="book-div" id="ebookId_${ebook.ebookId}">
          <div class="image-div">
            <img src="${eBookPixPath}/${ebook.regPix}" alt="${exam.examAbbr} Cover">
          </div>
          <div class="icon-div">
            <img src="${examLogoPixPath}/${ebook.examLogo}" alt="${exam.examAbbr} Exam"/>
          </div>
          <div class="text-div">
            <div class="details">
              <h3>${exam.examAbbr}</h3>
              <p>${ebook.ebookTitle}</p>
              <div class="book-sum">
                <p><i class="bi bi-journal-text"></i> <strong>${ebook.ebookPages} Pages</strong></p>
                <p><i class="bi bi-floppy"></i> <strong>${ebook.ebookSize}</strong></p>
              </div>
            </div>
            <button class="btn" title="Download" onclick="_getDownloadEbookModal();"><i class="bi-cloud-download"></i> Download Now!</button>
          </div>
        </div>
      </div>
    `).join("");

    return `
      <div class="main-content-div animated fadeIn">
        <div class="tables-content-div">
          <div class="content-title">
            <div class="title">
              <i class="bi bi-filetype-pdf"></i>
              <p>${exam.examAbbr} E-Books</p>
            </div>
          </div>

          <div class="inner-table-content">
            ${eBookContent}
          </div>
        </div>
      </div>
    `;
  }).join("");

  $('#pageContent').html(content);
}

function _getDownloadEbookModal() {
  _showCustomConfirm({
    title: "Get Your Free E-Book",
    message: "Sign in or create a free account to start your download now.",
    alertType: "info",
    trueActionBtnText: "Login",
    falseActionBtn: true,
    falseActionBtnText: "Sign Up",
    trueActionCallback: () => (window.location.href = `${websiteUrl}/portal`),
    falseActionCallback: () =>
      (window.location.href = `${websiteUrl}/portal/sign-up`),
  });
}
