function _fetchAllVideoData() {
  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/videos/fetch-video`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchVideoData(response.data);
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

function _initFetchVideoData(data) {
  const content = data.map((exam) => {
    const categoryContent = exam.categoryData.map((category) => {
      const videosHtml = category.videoData.map((video) => `
		<div class="video-div">
			<video class="video-slide" id="video_${video.videoId}" controls playsinline controlsList="nodownload"
				poster="${videoPixPath}/${video.regPix}">
				<source src="${videoPath}/${video.video}" type="video/mp4">
			</video>

			<div class="play-overlay" id="playBtn_${video.videoId}">
				<i class="bi-play-fill"></i>
			</div>

      <div class="sub-overlay" onclick="_getSubscribeVideoModal();">
        <h3>Subscribe to watch this video</h3>
      </div>
		</div>
      `).join("");

      return `
        <div class="tables-content-div">
          <div class="content-title video-title">
            <div class="title">
              <i class="bi bi-play-circle-fill"></i>
              <p>${category.videoCatName} VIDEOS</p>
            </div>

            <div>
              <button class="btn" title="SUBSCRIBE" 
                onclick="_getSubscribeVideoModal();">
                <i class="bi bi-box-arrow-down"></i> SUBSCRIBE
              </button>
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

function _getSubscribeVideoModal() {
  _showCustomConfirm({
    title: "You Want To Subscribe For This Video?",
    message: "Sign in or create a free account to subscribe for a video.",
    alertType: "info",
    trueActionBtnText: "Login",
    falseActionBtn: true,
    falseActionBtnText: "Sign Up",
    trueActionCallback: () => (window.location.href = `${websiteUrl}/portal`),
    falseActionCallback: () =>
      (window.location.href = `${websiteUrl}/portal/sign-up`),
  });
}
