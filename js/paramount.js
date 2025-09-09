function _getPage(options) {
  const {
    page = "", /// compulsory
    action = "get_page", /// compulsory
    url = "", /// compulsory
    pageContainer = "page-content", /// compulsory
  } = options;

  $("#" + pageContainer)
    .html(
      '<div class="ajax-loader"><img src="' +
        websiteUrl +
        '/all-images/images/spinner.gif"/></div>'
    )
    .css({
      display: "flex",
      "flex-direction": "column",
      gap: "20px",
      "align-items": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  const dataString = "action=" + action + "&page=" + page;
  $.ajax({
    type: "POST",
    url: url,
    data: dataString,
    cache: false,
    success: function (html) {
      $("#" + pageContainer).html(html);
    },
  });
}

function _getForm(options) {
  const {
    page = "", /// compulsory
    layer = 1, /// compulsory
    action = "get_form", /// compulsory
    url = "", /// compulsory
    id = "", /// optional
    pageCatId = "", /// optional
  } = options;
  $(layer === 1 ? "#get-form-more-div" : "#get-more-div-secondary")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  const dataString =
    "action=" +
    action +
    "&page=" +
    page +
    "&id=" +
    id +
    "&pageCatId=" +
    pageCatId +
    "&modalLayer=" +
    layer;
  $.ajax({
    type: "POST",
    url: url,
    data: dataString,
    cache: false,
    success: function (html) {
      $(layer === 1 ? "#get-form-more-div" : "#get-more-div-secondary").html(
        html
      );
    },
  });
}
function _alertClose(layer = 1) {
  let text = "";
  text +=
    '<div class="alert-loading-div">' +
    '<div class="icon"><img src="' +
    websiteUrl +
    '/all-images/images/loading.gif" width="20px" alt="Loading"/></div>' +
    '<div class="text"><p>LOADING...</p></div>' +
    "</div>";
  $(layer === 1 ? "#get-form-more-div" : "#get-more-div-secondary")
    .html(text)
    .fadeOut(200);
}

function _actionAlert(message, status) {
  let text = "";
  $(".all-alert-back-div").html(text).css("display", "flex");
  if (status == true) {
    text +=
      '<div class="success-alert-div animated fadeInDown">' +
      '<div class="icon"><i class="bi-check-all"></i></div>' +
      '<div class="text"><p>' +
      message +
      "</p></div>" +
      "</div>";
  } else {
    text +=
      '<div class="failed-alert-div animated fadeInDown">' +
      '<div class="icon"><i class="bi-exclamation-octagon-fill"></i></div>' +
      '<div class="text"><p>' +
      message +
      "</p></div>" +
      "</div>";
  }
  $(".all-alert-back-div").html(text).fadeIn(500).delay(3000).fadeOut(100);
}

function isNumberCheck(e) {
  var key = e.keyCode || e.which;

  if (!(key >= 48 && key <= 57)) {
    if (e.preventDefault) {
      e.preventDefault();
    } else {
      e.returnValue = false;
    }
  }
}

function _call_carousel(cnt) {
  // INIT CAROUSEL
  window["carousel_" + cnt] = new CgCarousel(
    "#js-carousel_" + cnt,
    window["carousel_options_" + cnt],
    {}
  );
  // Navigation
  window["next_" + cnt] = document.getElementById("js-carousel__next_" + cnt);
  window["next_" + cnt].addEventListener("click", () =>
    window["carousel_" + cnt].next()
  );
  window["prev_" + cnt] = document.getElementById("js-carousel__prev_" + cnt);
  window["prev_" + cnt].addEventListener("click", () =>
    window["carousel_" + cnt].prev()
  );
}

$(window).scroll(function () {
  const scrollHeight = $(window).scrollTop();
  const windowWidth = $(window).width();

  if (scrollHeight >= 100) {
    $("#back2Top").fadeIn(1000);
  } else {
    $("#back2Top").fadeOut(1000);
  }

  if (scrollHeight >= 400) {
    $("header").addClass("scrolled");
  } else {
    $("header").removeClass("scrolled");
  }

  if (windowWidth <= 870) {
    $(".sticky-div").css({
      position: "relative",
      top: "0",
      height: "auto",
      overflow: "visible",
    });
  } else {
    if (scrollHeight >= 700) {
      $(".sticky-div").css({
        position: "sticky",
        top: "140px",
        "min-height": "280px",
        overflow: "auto",
      });
    } else {
      $(".sticky-div").css({
        position: "relative",
        top: "0",
        height: "auto",
        overflow: "auto",
      });
    }
  }
});

function _back_to_top() {
  event.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
}

function _open_menu() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "0" }, 200);
  $(".live-chat-back-div").animate({ "margin-left": "-100%" }, 400);
  $(".index-menu-back-div").animate({ "margin-left": "0" }, 400);
}

function _openLiveChat() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "0" }, 200);
  $(".index-menu-back-div").animate({ "margin-left": "-100%" }, 400);
  $(".live-chat-back-div").animate({ "margin-left": "0" }, 400);
}

function _close_side_nav() {
  $(".sidenavdiv, .sidenavdiv-in").animate({ "margin-left": "-100%" }, 200);
  $(".index-menu-back-div, .live-chat-back-div").animate(
    { "margin-left": "-100%" },
    400
  );
}

function _open_li(ids) {
  $("#" + ids + "-sub-li").toggle("slow");
}

function alert_close() {
  $("#get-more-div").html("").fadeOut(200);
}

///// for FAQs
function _collapse(div_id) {
  const $currentFaq = $("#" + div_id);
  const $currentIcon = $("#" + div_id + "num");
  const $currentAnswer = $("#" + div_id + "answer");

  $(".faq-toggle.active-faq").each(function () {
    if (this.id !== div_id) {
      $(this).removeClass("active-faq");
      $(this).find(".expand-div").html('&nbsp;<i class="bi-plus"></i>&nbsp;');
      $(this).find(".answer-div").slideUp("slow");
    }
  });

  const isActive = $currentFaq.toggleClass("active-faq").hasClass("active-faq");
  $currentIcon.html(
    isActive
      ? '&nbsp;<i class="bi-dash"></i>&nbsp;'
      : '&nbsp;<i class="bi-plus"></i>&nbsp;'
  );
  $currentAnswer.slideToggle("slow");
}

function _progressBar() {
  document.addEventListener("DOMContentLoaded", () => {
    const progressBars = document.querySelectorAll(".progress-per");

    const animateProgressBar = (entry) => {
      const progressBar = entry.target;
      if (!progressBar.classList.contains("animated")) {
        const value = progressBar.dataset.text;
        progressBar.style.width = `${value}%`; // Animate width
        progressBar.classList.add("animated");
      }
    };

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateProgressBar(entry);
          }
        });
      },
      { threshold: 0.5 }
    ); // Adjust threshold as needed

    progressBars.forEach((bar) => {
      observer.observe(bar);
    });
  });
}

function _showCustomConfirm(options) {
  const {
    callback = () => {},
    alertType = "info",
    title = "Are you sure?",
    message = "This action can't be undone. Please confirm if you want to proceed.",
    trueActionBtnText = "YES",
    falseActionBtn = false,
    falseActionBtnText = "NO",
    trueActionCallback = () => {},
    falseActionCallback = () => {},
  } = options;

  // Show modal
  $("#customConfirmModal").html("").fadeIn(200);
  let icon = "bi-info-circle-fill";
  let iconBg = "bg-info";

  if (alertType === "success") {
    icon = "bi-check-circle-fill";
    iconBg = "bg-success";
  } else if (alertType === "error") {
    icon = "bi-x-circle-fill";
    iconBg = "bg-danger";
  } else if (alertType === "warning") {
    icon = "bi-exclamation-octagon-fill";
    iconBg = "bg-warning";
  }

  const content = `
		<div class="modal-box">
			<div class="modal-icon ${iconBg}">
				<i class="bi ${icon}"></i>
			</div>
			<h3>${title}</h3>
			<p>${message}</p>
			<div class="btn-div">
				${
          falseActionBtn
            ? `<button id="confirmCancelBtn" class="btn false-btn">${falseActionBtnText}</button>`
            : ""
        }
				<button id="confirmOkBtn" class="btn">${trueActionBtnText}</button>
			</div>
		</div>
	`;
  $("#customConfirmModal").html(content);
  // Attach button events
  $("#confirmOkBtn")
    .off("click")
    .on("click", function () {
      callback();
      _modalClose();
      trueActionCallback();
    });
  if (falseActionBtn) {
    $("#confirmCancelBtn")
      .off("click")
      .on("click", function () {
        _modalClose();
        falseActionCallback();
      });
  }
}
function _modalClose() {
  $("#customConfirmModal").html("").fadeOut(200);
}

function _validateEmptyValue(fieldId, fieldName) {
  const fieldValue = $("#" + fieldId)
    .val()
    .trim();
  $("#" + fieldId).removeClass("issue");
  $("#issue_" + fieldId).html("");

  if (!fieldValue) {
    $("#" + fieldId).addClass("issue");
    $("#issue_" + fieldId).html(fieldName + " IS REQUIRED");
    return 1;
  }
  return 0;
}
function _validateEmail(fieldId, email) {
  if (!email) return 0;
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    $("#" + fieldId).addClass("issue");
    $("#issue_" + fieldId).html("PROVIDE A VALID EMAIL ADDRESS");
    return 1;
  }
  return 0;
}
function _validateNumber(fieldId, number) {
  if (!number) return 0;
  if (!/^\d+$/.test(number)) {
    $("#" + fieldId).addClass("issue");
    $("#issue_" + fieldId).html("PHONE NUMBER MUST CONTAIN ONLY DIGITS");
    return 1;
  }
  return 0;
}

function getAuthHeaders(includeAuth = false) {
  return {
    apiKey: apiKey,
    userOsBrowser: userOsBrowser,
    userIpAddress: userIpAddress,
    userDeviceId: userDeviceId,
    Authorization: includeAuth ? "Bearer " + (loginAccessKey ?? "") : undefined,
  };
}
function _callRawEndPoints(payLoadProps) {
  const {
    type = "POST",
    url = "",
    formData = null,
    accessKey = false,
  } = payLoadProps;
  // Auto-flatten if formData has only one key called "formData"
  const payload = formData && formData.formData ? formData.formData : formData;
  return new Promise((resolve, reject) => {
    $.ajax({
      type: type,
      url: `${endPoint}/${url}`,
      data: JSON.stringify(payload),
      dataType: "json",
      contentType: "application/json", // important for JSON
      cache: false,
      headers: getAuthHeaders(accessKey),
      success: function (data) {
        resolve(data); // ✅ resolve promise
      },
      error: function (error) {
        reject(error); // ✅ reject promise
      },
    });
  });
}

function _callFileEndPoints(payLoadProps) {
  const {
    type = "POST",
    url = "",
    formData = null,
    accessKey = false,
    expectJson = true, // default true
  } = payLoadProps;

  const payload = formData && formData.formData ? formData.formData : formData;
  const finalUrl = url.startsWith("http") ? url : `${endPoint}/${url}`;

  return new Promise((resolve, reject) => {
    $.ajax({
      type: type,
      url: finalUrl,
      data: formData,
      dataType: expectJson ? "json" : undefined, // only parse if JSON expected
      contentType: false,
      cache: false,
      processData: false,
      headers: getAuthHeaders(accessKey),
      success: function (data) {
        resolve(data);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}

function _callFetchEndPoints(payLoadProps) {
  const { type = "GET", url = "", accessKey = false } = payLoadProps;
  return new Promise((resolve, reject) => {
    $.ajax({
      type: type,
      url: `${endPoint}/${url}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(accessKey),
      success: function (data) {
        resolve(data);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}

function _callAjaxError(callback) {
  _showCustomConfirm({
    callback: () => {
      callback();
    },
    title: "Connection Error!",
    message: "Check your internet connection and try again.",
    alertType: "error",
    trueActionBtnText: "OK",
  });
}
function _callCatchError(callback) {
  _showCustomConfirm({
    callback: () => {
      callback();
    },
    title: "Unexpected Error",
    message: "An unexpected error occurred! Please try again.",
    alertType: "error",
    trueActionBtnText: "OK, Retry",
  });
}

function _btnDisable(btnId, btnText = "SUBMIT", action = true) {
  //////////////// get btn text ////////////////
  if (action) {
    $("#" + btnId).html(
      '<img src="' +
        websiteUrl +
        '/all-images/images/loading.gif" style="width:12px;" alt="Loading"/>'
    );
    $("#" + btnId).prop("disabled", action);
  } else {
    $("#" + btnId)
      .html(btnText)
      .prop("disabled", false);
  }
  ////////////////////////////////////////////////
}


function thousandSeperator(val) {
  let dp = 2;
  const formatter = new Intl.NumberFormat("ng-NG", {
    style: "decimal",
    maximumFractionDigits: dp,
    minimumFractionDigits: dp,
  });
  //   return formatter.format(val);
  return isNaN(parseFloat(formatter.format(val))) ? "-" : formatter.format(val);
}