function _fetchAllEbookData() {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `user/ebook/fetch-ebook`,
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
    // loop through all ebooks for this exam
    const eBookContent = exam.ebookData.map((ebook) => `
        <div class="book-div">
            <div class="image-div"> <img src="${eBookPixPath}/${ebook.regPix}" alt="${exam.examAbbr} Cover"></div>
            <div class="icon-div"> <img src="${examLogoPixPath}/${ebook.examLogo}" alt="${exam.examAbbr} Exam"/></div>
            <div class="text-div">
                <div class="details">
                    <h3>${exam.examAbbr}</h3>
                    <p>${ebook.ebookTitle}</p>
                    <div class="book-sum">
                        <p><i class="bi bi-journal-text"></i> <strong>${ebook.ebookPages} Pages</strong></p>
                        <p><i class="bi bi-floppy"></i> <strong>${ebook.ebookSize}</strong></p>
                    </div>
                </div>
                <button class="btn" title="Download"><i class="bi-cloud-download"></i> Download Now!</button>
            </div>
        </div>
    `).join("");

    return `
        <section class="main-content-div">
            <section class="content-div">
                <div class="content-title">
                    <div class="title">
                        <i class="bi bi-filetype-pdf"></i>
                        <p>${exam.examAbbr} E-Books</p>
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