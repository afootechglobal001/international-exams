$(function () {
	ebookPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#ebookPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _getSelectEbookExam(fieldId) {
	let $searchList = $("#searchList_" + fieldId);
 	$searchList.html("<li>Loading data...</li>");

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/exams/fetch-exam?pageCategoryId=${pageCategory.examCategory}&statusId=1`,
			accessKey: true,
		})
		.then((response) => {
			_staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
				$("#searchList_" + fieldId).html("");

                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].publishId;
                    const value = response.data[i].examAbbr;
                    $('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
                }
			} else {
				_showCustomConfirm({
					title: "FETCH EXAM ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _getSelectEbookExam()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _getSelectEbookExam());
  	}
}

function _createEbook(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const examId = $('#publishId').val().trim();
		const ebookTitle = $('#ebookTitle').val().trim();
		const regPix = $("#regPix").prop("files")[0];
		const material = $("#material").prop("files")[0];
		const ebookSize  = $('#ebookSize').val().trim();
		const ebookPages = $('#ebookPages').val().trim();
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("publishId", "EXAM");
		issueCount += _validateEmptyValue("ebookTitle", "E-BOOK TITLE");
		issueCount += _validateEmptyValue("regPix", "E-BOOK COVER IMAGE");
		issueCount += _validateEmptyValue("material", "E-BOOK MATERIAL");
		issueCount += _validateEmptyValue("ebookSize", "E-BOOK SIZE");
		issueCount += _validateEmptyValue("ebookPages", "NUMBER OF PAGES");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("examId", examId);
		formData.append("ebookTitle", ebookTitle);
		formData.append("regPix", regPix);
		formData.append("material", material);
		formData.append("ebookSize", ebookSize);
		formData.append("ebookPages", ebookPages);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_createEbookCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to save? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _createAndUpdateEbook());
	}
}

function _createEbookCallback(formData) {
	///// get btn text/////
	$("#submitBtn").hide();
    $("#progress-alert").fadeIn(3000);
	
	//// call endpoint //////
	_callFileEndPoints({
		//////////// loading progress bar............
		xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = ((evt.loaded / evt.total) * 100).toFixed();
                    $(".ajax-progress")
                        .css("width", percentComplete + "%")
                        .text(percentComplete + "%");
                }
            }, false);
            return xhr;
        },
		url: `admin/publish/ebook/create-ebook`,
		formData,
		accessKey: true,
	})
    .then((response) => {
          _staffValidationCheck(response.response);
		if (response.success) {
            const message = response.message;
			const newRegPix = response.regPix;
            const newMaterial = response.material;

            _uploadEbookPixAndMaterial(newRegPix, newMaterial, message);
		} else {
			$("#submitBtn").fadeIn();
			$("#progress-alert").hide();
			_showCustomConfirm({
				title: "E-BOOK ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _saveBlogCallback()); // retry if needed
		$("#submitBtn").fadeIn();
		$("#progress-alert").hide();
		$(".ajax-progress").css("width", "0%").text("0%");
    });
}

function _uploadEbookPixAndMaterial(newRegPix, newMaterial, message) {
    const uploadedPixFile = $("#regPix").prop("files")[0];
	const uploadedMaterialFile = $("#material").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadEbookPixAndMaterial");

	///// append new pix files /////
    formData.append("newRegPix", newRegPix);
    formData.append("regPix", uploadedPixFile);

	//// append new material files /////
	formData.append("newMaterial", newMaterial);
	formData.append("material", uploadedMaterialFile);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
                _getActivePage({page:'viewEbook', divid:'publish'});
                _alertClose();
            },
            title: 'Success!',
            message: message,
            alertType: 'success',
            trueActionBtnText: 'OK, Thanks.',
        });
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _uploadEbookPixAndMaterial());
    });
}

function _fetchEbookData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/ebook/fetch-ebook`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
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
						<div>
							<button class="btn" title="ADD NEW E-BOOK" onclick="_getForm({page: 'eBookReg', url: adminPortalLocalUrl});">
								<i class="bi-plus-square"></i> ADD NEW E-BOOK
							</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchBlogData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchBlogData());
  	}
}

function _initFetchEbookData(data) {
  const content = data.map((exam) => {
    // loop through all ebooks for this exam
    const eBookContent = exam.ebookData.map((ebook) => `
    <div class="book-back-div">
        <div class="book-div" id="ebookId_${ebook.ebookId}">
          <div class="image-div">
		  <div class="delete-icon" title="Delete E-Book" id="deleteBtn_${ebook.ebookId}" onclick="_deleteEbook('${ebook.examId}','${ebook.ebookId}');"><i class="bi-trash"></i></div>
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
            <div class="other-pg-back-div">
              ${eBookContent}
            </div>
          </div>
        </div>
      </div>
    `;
  }).join("");

  $('#pageContent').html(content);
}


function _deleteEbook(examId, ebookId) {
	_showCustomConfirm({
		callback: () => {
			_deleteEbookCallback(examId, ebookId);
		},
		title: "Are you sure?",
		message: 'Are you sure you want to delete this e-book? This action is irreversible.',
		alertType: "warning",
		falseActionBtn: true,
	});
}

function _deleteEbookCallback(examId, ebookId){
	try {
		///// get btn text/////
		const btnText = $(`#deleteBtn_${ebookId}`).html();
		_btnDisable(`deleteBtn_${ebookId}`, btnText, true);

		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/publish/ebook/delete-ebook?examId=${examId}&ebookId=${ebookId}`,
			accessKey: true,	
		})
		.then((response) => {
			_staffValidationCheck(response.response);
			if (response.success) {
				const message = response.message;
				const oldRegPix = response.oldRegPix;
				const oldMaterial = response.oldMaterial;

				_unlinkEbookPixAndMaterial(oldRegPix, oldMaterial, ebookId, message);
				_btnDisable(`deleteBtn_${ebookId}`, btnText, false);
			} else {
				_btnDisable(`deleteBtn_${ebookId}`, btnText, false);
				_showCustomConfirm({
					title: "Error!",
					message: response.message,
					alertType: "danger",
					trueActionBtnText: "OK",
				});
			}
		})
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _deleteEbookCallback()); // retry if needed
			_btnDisable(`deleteBtn_${ebookId}`, btnText, false);
      	});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _deleteEbookCallback());
		_btnDisable(`deleteBtn_${ebookId}`, btnText, false);
	}
}


function _unlinkEbookPixAndMaterial(oldRegPix, oldMaterial, ebookId, message) {
    const formData = new FormData();
    formData.append("action", "unlinkEbookPixAndMaterial");
    formData.append("oldRegPix", oldRegPix);
	formData.append("oldMaterial", oldMaterial);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
              	$("#ebookId_" + ebookId).fadeOut(300, function () {
				$(this).remove();
				});
            },
            title: 'Success!',
            message: message,
            alertType: 'success',
            trueActionBtnText: 'OK, Thanks.',
        });
	})
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _unlinkEbookPixAndMaterial());
    });
}