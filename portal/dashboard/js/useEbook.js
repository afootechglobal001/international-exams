function _fetchEbookData() {
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
				_showCustomConfirm({
					title: "E-BOOK ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEbookData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEbookData());
  	}
}

function _initFetchEbookData(data) {
  const content = data.map((exam) => {
    // loop through all ebooks for this exam
    const eBookContent = exam.ebookData.map((ebook) => `
	<div class="book-div">
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
			<button class="btn" title="Download" id="downloadBtn_${ebook.ebookId}" onclick="_downloadEbook('${ebook.ebookId}')"><i class="bi-cloud-download"></i> Download Now!</button>
		</div>
	</div>
    `).join("");

    return `
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
    `;
  }).join("");

  $('#pageContent').html(content);
}

function _downloadEbook(ebookId) {
	_showCustomConfirm({
		callback: () => {
			_downloadEbookCallback(ebookId);
		},
		title: "Are you sure?",
		message: 'Are you sure you want to download this e-book?',
		alertType: "warning",
		falseActionBtn: true,
	});
}

function _downloadEbookCallback(ebookId) {
	try {
		const btnId = `downloadBtn_${ebookId}`;
		const btnText = $(`#${btnId}`).html();
		_btnDisable(btnId, btnText, true);

		_callFetchEndPoints({
			url: `user/ebook/download-ebook?ebookId=${ebookId}`,
			accessKey: true,
		})
		.then((response) => {
			_userValidationCheck(response.response);
			if (response.success) {
				const filePath = response.filePath;

				const a = document.createElement("a");
				a.href = filePath;
				a.setAttribute("download", "");
				document.body.appendChild(a);
				a.click();
				document.body.removeChild(a);

			} else {
				_showCustomConfirm({
					title: "DOWNLOAD ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			}
			_btnDisable(btnId, btnText, false);
		})
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _downloadEbookCallback(ebookId));
			_btnDisable(btnId, btnText, false);
		});

	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _downloadEbookCallback(ebookId));
		_btnDisable(`downloadBtn_${ebookId}`, btnText, false);
	}
}

//// Fetch Dashboard Ebook Data
function _fetchDashboardEbookData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `user/ebook/fetch-dashboard-ebook`,
			accessKey: true,
		})
		.then((response) => {
            _userValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchDashboardEbookData(response.data);
			} else {
				_showCustomConfirm({
					title: "ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#fetchDashboardEbookContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchDashboardEbookData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchDashboardEbookData());
  	}
}

function _initFetchDashboardEbookData(data) {
  const content = data.map((exam) => {
    // loop through all ebooks for this exam
    const eBookContent = exam.ebookData.map((ebook) => `
	<div class="book-div">
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
			<button class="btn" title="Download" id="downloadBtn_${ebook.ebookId}" onclick="_downloadEbook('${ebook.ebookId}')"><i class="bi-cloud-download"></i> Download Now!</button>
		</div>
	</div>
    `).join("");

 	return eBookContent;
  }).join("");

  $('#fetchDashboardEbookContent').html(content);
}