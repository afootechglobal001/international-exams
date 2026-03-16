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
	let useEachEbookSession = JSON.parse(sessionStorage.getItem("useEachEbookSession") || "{}");
	const isEditMode = !!useEachEbookSession;
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const examId = $('#publishId').val().trim();
		const ebookTitle = $('#ebookTitle').val().trim();
		const sellingPrice = $('#sellingPrice').val().trim();
		const regPix = $("#regPix").prop("files")[0];
		const material = $("#material").prop("files")[0];
		const ebookSize  = $('#ebookSize').val().trim();
		const ebookPages = $('#ebookPages').val().trim();
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("publishId", "EXAM");
		issueCount += _validateEmptyValue("ebookTitle", "E-BOOK TITLE");
		issueCount += _validateEmptyValue("sellingPrice", "SELLING PRICE");
		issueCount += _validateEmptyValue("ebookSize", "E-BOOK SIZE");
		issueCount += _validateEmptyValue("ebookPages", "NUMBER OF PAGES");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (!isEditMode) {
			issueCount += _validateEmptyValue("regPix", "E-BOOK COVER IMAGE");
			issueCount += _validateEmptyValue("material", "E-BOOK MATERIAL");
		}

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("examId", examId);
		formData.append("ebookTitle", ebookTitle);
		formData.append("sellingPrice", sellingPrice);
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
		_callCatchError(() => _createEbook());
	}
}

function _createEbookCallback(formData) {
	let useEachEbookSession = JSON.parse(sessionStorage.getItem("useEachEbookSession") || "{}");
	let examId = useEachEbookSession?.examData?.examId;
	let ebookId = useEachEbookSession?.ebookData?.[0]?.ebookId;

	///// get btn text/////
	$("#submitBtn").hide();
    $("#progress-alert").fadeIn(3000);

	let callUrl= ebookId ? `admin/ebook/update-ebook?examId=${examId}&ebookId=${ebookId}` : `admin/ebook/create-ebook`;
	
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
		url: callUrl,
		formData,
		accessKey: true,
	})
    .then((response) => {
          _staffValidationCheck(response.response);
		if (response.success) {
            const message = response.message;
			const newRegPix = response.regPix;
            const oldRegPix = response.oldRegPix;
			const newMaterial = response.material;
            const oldMaterial = response.oldMaterial;

            _uploadEbookPixAndMaterial(newRegPix,  oldRegPix, newMaterial, oldMaterial, message);
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
		_callAjaxError(() => _createEbookCallback(formData)); // retry if needed
		$("#submitBtn").fadeIn();
		$("#progress-alert").hide();
		$(".ajax-progress").css("width", "0%").text("0%");
    });
}

function _uploadEbookPixAndMaterial(newRegPix,  oldRegPix, newMaterial, oldMaterial, message) {
    const uploadedPixFile = $("#regPix").prop("files")[0];
	const uploadedMaterialFile = $("#material").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadEbookPixAndMaterial");

	///// append new pix files /////
    formData.append("newRegPix", newRegPix);
	formData.append("oldRegPix", oldRegPix);
    formData.append("regPix", uploadedPixFile);

	//// append new material files /////
	formData.append("newMaterial", newMaterial);
	formData.append("oldMaterial", oldMaterial);
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
		_callAjaxError(() => _uploadEbookPixAndMaterial(newRegPix,  oldRegPix, newMaterial, oldMaterial, message));
    });
}

function _fetchEbookData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/ebook/fetch-ebook`,
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
			_callAjaxError(() => _fetchEbookData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEbookData());
  	}
}

function _initFetchEbookData(data) {
  	const content = data.map((exam) => {
    const dataInfo = exam.ebookData || [];
     const eBookContent = dataInfo.map((ebook) => {
		return`
        <div class="book-div" id="ebookId_${ebook.ebookId}">
			<div class="image-div">
				<div class="status-div ${ebook.statusName}">${ebook.statusName}</div>
				<img src="${eBookPixPath}/${ebook.regPix}" alt="${exam.examData?.examAbbr} Cover">
			</div>
			<div class="icon-div">
				<img src="${examLogoPixPath}/${exam?.examData?.examLogo}" alt="${exam.examData?.examAbbr} Exam"/>
			</div>
			<div class="text-div">
				<div class="details">
					<h3>${exam.examData?.examAbbr}</h3>
					<p>${ebook.ebookTitle}</p>
					<div class="book-sum">
						<p><i class="bi bi-journal-text"></i> <strong>${ebook.ebookPages} Pages</strong></p>
						<p><i class="bi bi-floppy"></i> <strong>${ebook.ebookSize}</strong></p>
					</div>
				</div>
				<div class="book-sum">
					<button class="btn" onclick="_fetchEachEbook('${exam.examData?.examId}', '${ebook.ebookId}')">Edit</button>
					<span><strong>${'<s>N</s>' + thousandSeparator(ebook.sellingPrice)}</strong></span>
				</div>
			</div>
        </div>
     `;
    }).join("");

    return `
      <div class="main-content-div animated fadeIn">
        <div class="tables-content-div">
          <div class="content-title">
            <div class="title">
              <i class="bi bi-filetype-pdf"></i>
              <p>${exam.examData?.examAbbr} E-Books</p>
            </div>
          </div>

          <div class="inner-table-content">
            <div class="book-back-div">
              ${eBookContent}
            </div>
          </div>
        </div>
      </div>
    `;
  }).join("");

  $('#pageContent').html(content);
}

function _filterEbooks(value) {
  $("#pageContent > .main-content-div, .book-div").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(value.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _fetchEachEbook(examId, ebookId) {
    $("#get-form-more-div").css({'display': 'flex','justify-content': 'center','align-items': 'center'}) .fadeIn(500);
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/ebook/fetch-ebook?examId=${examId}&ebookId=${ebookId}`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
    			sessionStorage.setItem("useEachEbookSession", JSON.stringify(response.data[0]));
                _getForm({page: 'eBookReg', url: adminPortalLocalUrl});
			} else {
				_showCustomConfirm({
					title: "FETCH EBOOK ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachEbook(examId, ebookId)); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachEbook(examId, ebookId));
  	}
}