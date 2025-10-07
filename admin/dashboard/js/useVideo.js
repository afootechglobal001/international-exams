$(function () {
	videoPixPreview = {
	UpdatePreview: function (obj) {
		if (!window.FileReader) {
		// Handle browsers that don't support FileReader
		console.error("FileReader is not supported.");
		} else {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#videoPixPreview').prop("src", e.target.result);
		};
		reader.readAsDataURL(obj.files[0]);
		}
	},
	};
});

function _getSelectVideoExam(fieldId) {
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
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError();
  	}
}

function _getSelectVideoCategory(fieldId) {
	let $searchList = $("#searchList_" + fieldId);
 	$searchList.html("<li>Loading data...</li>");

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-video-category`,
			accessKey: true,
		})
		.then((response) => {
			_staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
				$("#searchList_" + fieldId).html("");

                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].videoCatId;
                    const value = response.data[i].videoCatName;
                    $('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
                }
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError();
  	}
}

function _uploadVideo(){
	try {
		////////get all needed values////////////
		let issueCount = 0;
		const examId = $('#publishId').val().trim();
		const videoCatId = $('#videoCatId').val().trim();
		const regPix = $("#regPix").prop("files")[0];
		const video = $("#video").prop("files")[0];
        const statusId = $('#statusId').val().trim();
		
		///// empty field validation//////////
		issueCount += _validateEmptyValue("publishId", "EXAM");
		issueCount += _validateEmptyValue("videoCatId", "VIDEO CATEGORY");
		issueCount += _validateEmptyValue("regPix", "VIDEO COVER IMAGE");
		issueCount += _validateEmptyValue("video", "VIDEO");
		issueCount += _validateEmptyValue("statusId", "STATUS");

		if (issueCount > 0) return;

		/////Gather form data////
		const formData = new FormData();
		formData.append("examId", examId);
		formData.append("videoCatId", videoCatId);
		formData.append("regPix", regPix);
		formData.append("video", video);
		formData.append("statusId", statusId);

		////// confirm action////
		_showCustomConfirm({
		callback: () => {
			_uploadVideoCallback(formData);
		},
			title: "Are you sure?",
			message: 'Are you sure you want to upload? This action is irreversible.',
			alertType: "warning",
			falseActionBtn: true,
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _uploadVideo());
	}
}

function _uploadVideoCallback(formData) {
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
		url: `admin/videos/upload-video`,
		formData,
		accessKey: true,
	})
    .then((response) => {
          _staffValidationCheck(response.response);
		if (response.success) {
            const message = response.message;
			const newRegPix = response.regPix;
            const newVideo = response.video;

            _uploadVideoFilePixAndVideo(newRegPix, newVideo, message);
		} else {
			$("#submitBtn").fadeIn();
			$("#progress-alert").hide();
			_showCustomConfirm({
				title: "VIDEO ERROR",
				message: response.message,
				alertType: "warning",
				trueActionBtnText: "OK",
			});
		}
    })
    .catch((error) => {
		console.error("Error:", error);
		_callAjaxError(() => _uploadVideoCallback(formData)); // retry if needed
		$("#submitBtn").fadeIn();
		$("#progress-alert").hide();
		$(".ajax-progress").css("width", "0%").text("0%");
    });
}

function _uploadVideoFilePixAndVideo(newRegPix, newVideo, message) {
    const uploadedPixFile = $("#regPix").prop("files")[0];
	const uploadeVideoFile = $("#video").prop("files")[0];

    const formData = new FormData();
    formData.append("action", "uploadVideoPixAndVideo");

	///// append new pix files /////
    formData.append("newRegPix", newRegPix);
    formData.append("regPix", uploadedPixFile);

	//// append new material files /////
	formData.append("newVideo", newVideo);
	formData.append("video", uploadeVideoFile);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
                _getActivePage({page:'viewVideos', divid:'publish'});
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
		_callAjaxError(() => _uploadVideoFilePixAndVideo(newRegPix, newVideo, message));
    });
}

function _fetchVideoData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/videos/fetch-video`,
			accessKey: true,
		})
		.then((response) => {
            _staffValidationCheck(response.response);
			if (response.success && response.data?.length > 0) {
                _initFetchVideoData(response.data);
			} else {
				_showCustomConfirm({
					title: "VIDEO ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
						<div>
							<button class="btn" title="ADD NEW VIDEO" onclick="_getForm({page: 'videoReg', url: adminPortalLocalUrl});">
								<i class="bi-plus-square"></i> ADD NEW VIDEO
							</button>
						</div>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchVideoData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchVideoData());
  	}
}

function _initFetchVideoData(data) {
  const content = data.map((exam) => {
    const categoryContent = exam.categoryData.map((category) => {
      const videosHtml = category.videoData.map((video) => `
		<div class="video-div" id="videos_${video.videoId}">
			<div class="delete-icon" title="Delete Video" id="deleteBtn_${video.videoId}" onclick="_deleteVideo('${exam.examId}','${video.videoId}');">
				<i class="bi-trash"></i>
			</div>

			<video 
				class="video-slide" 
				id="video_${video.videoId}" 
				controls 
				controlsList="nodownload noremoteplayback" 
				disablePictureInPicture 
				oncontextmenu="return false;" 
				poster="${videoPixPath}/${video.regPix}">
				<source src="${videoPath}/${video.video}" type="video/mp4">
			</video>


			<div class="play-overlay" id="playBtn_${video.videoId}">
				<i class="bi-play-fill"></i>
			</div>
		</div>
      `).join("");

      return `
        <div class="tables-content-div">
          <div class="content-title">
            <div class="title">
              <i class="bi bi-play-circle-fill"></i>
              <p>${category.videoCatName} VIDEOS</p>
            </div>
          </div>
          <div class="inner-table-content">
            <div class="other-pg-back-div">
        		<div class="video-back-div">
              		${videosHtml}
        		</div>
            </div>
          </div>
        </div>
      `;
    }).join("");

    // Wrap exam with its categories
    return `
      <div class="main-content-div animated fadeIn">
        <div class="tables-content-div">
          <div class="content-title">
            <div class="title">
              <i class="bi bi-journals"></i>
              <p>${exam.examAbbr} VIDEO TUTORIAL</p>
            </div>
          </div>
          <div class="video-cat-back-div">${categoryContent}</div>
        </div>
      </div>
    `;
  }).join("");

  $('#pageContent').html(content);

  /** ✅ Bind play/pause events **/
  $(".video-div").each(function () {
    const $video = $(this).find("video");
    const $playBtn = $(this).find(".play-overlay");

    $playBtn.on("click", function () {
      if ($video.get(0).paused) {
        $video.get(0).play();
      } else {
        $video.get(0).pause();
      }
    });

    $video.on("pause", function () {
      $playBtn.removeClass("hide");
    });

    $video.on("play", function () {
      $playBtn.addClass("hide");
    });
  });
}



        

function _deleteVideo(examId, videoId) {
	_showCustomConfirm({
		callback: () => {
			_deleteVideoCallback(examId, videoId);
		},
		title: "Are you sure?",
		message: 'Are you sure you want to delete this video? This action is irreversible.',
		alertType: "warning",
		falseActionBtn: true,
	});
}

function _deleteVideoCallback(examId, videoId){
	try {
		///// get btn text/////
		const btnText = $(`#deleteBtn_${videoId}`).html();
		_btnDisable(`deleteBtn_${videoId}`, btnText, true);

		//// call endpoint //////
		_callFetchEndPoints({
			url: `admin/videos/delete-video?examId=${examId}&videoId=${videoId}`,
			accessKey: true,	
		})
		.then((response) => {
			_staffValidationCheck(response.response);
			if (response.success) {
				const message = response.message;
				const oldRegPix = response.oldRegPix;
				const oldVideo = response.oldVideo;

				_unlinkVideoPixAndVideo(oldRegPix, oldVideo, videoId, message);
				_btnDisable(`deleteBtn_${videoId}`, btnText, false);
			} else {
				_btnDisable(`deleteBtn_${videoId}`, btnText, false);
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
			_callAjaxError(() => _deleteVideoCallback(examId, videoId)); // retry if needed
			_btnDisable(`deleteBtn_${videoId}`, btnText, false);
      	});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _deleteVideoCallback(examId, videoId));
		_btnDisable(`deleteBtn_${videoId}`, btnText, false);
	}
}


function _unlinkVideoPixAndVideo(oldRegPix, oldVideo, videoId, message) {
    const formData = new FormData();
    formData.append("action", "unlinkVideoPixAndVideo");
    formData.append("oldRegPix", oldRegPix);
	formData.append("oldVideo", oldVideo);

    _callFileEndPoints({
		url: adminPortalLocalUrl,
		formData,
		expectJson: false,
	})
	.then(() => {
		_showCustomConfirm({
            callback: () => {
              	$("#videos_" + videoId).fadeOut(300, function () {
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
		_callAjaxError(() => _unlinkEbookPixAndMaterial(oldRegPix, oldVideo, videoId, message));
    });
}