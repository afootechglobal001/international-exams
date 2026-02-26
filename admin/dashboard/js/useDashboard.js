function _getActivePage(props) {
  const { page = "", divid = "", nav = "" } = props;
  _getActiveLink(divid, nav);
  if (page) {
    _getPage({ page: page, url: adminPortalLocalUrl });
  }
}

function _getActiveLink(divid, nav) {
  _removeClass();
  $("#side-" + divid).addClass("active-li");
  $("#top-" + divid).addClass("active-li");
  $("#mobile-" + divid).addClass("active-li");
  $("#page-title").html($("#_" + divid).html());
  _getNav(nav);
}

function _removeClass() {
  $(
    "#side-dashboard, #side-branch, #side-staff, #side-publish, #side-reports, #side-ebook, #side-videos, #top-dashboard, #top-staff"
  ).removeClass("active-li");
  $(
    "#mobile-dashboard,#mobile-branches,#mobile-staff,#mobile-reports"
  ).removeClass("active-li");
}

function _getNav(nav) {
  if (nav == "") {
    _closeNav();
  } else {
    $(
      "#link-products, #link-orders, #link-publish, #link-publish, #link-reports"
    ).css({ display: "none" });
    $("#link-" + nav).css({ display: "block" });
    $(".side-nav-bg-sub-div").animate({ left: "150px" }, 200);
  }
}

function _closeNav() {
  $(".side-nav-bg-sub-div").animate({ left: "-100%" }, 400);
  var x = document.getElementById("menu-div");
  x.innerHTML = '<i class="bi-text-right"></i>';
  $("#side-nav-div").animate({ left: "-150px" }, 200);
}

function _closeAllNav() {
  _closeNav();
  _removeClass();
}

function _openMenu() {
  var x = document.getElementById("menu-div");
  if (x.innerHTML === '<i class="bi-text-right"></i>') {
    x.innerHTML = '<i class="bi-x-lg"></i>';
    $("#side-nav-div").animate({ left: "0px" }, 200);
  } else {
    x.innerHTML = '<i class="bi-text-right"></i>';
    _closeAllNav();
  }
}

function _open_li(ids) {
  $("#" + ids + "-sub-li").toggle("slow");
}

function _toggleProfileDiv() {
  $(".toggle-profile-div").toggle("slow");
}

function _closeProfileDiv(event) {
  if (!$(event.target).closest(".toggle-profile-div, .right-icon-div").length) {
    $(".toggle-profile-div").hide("slow");
  }
}
$(document).on("click", _closeProfileDiv);

function select_search() {
  $(".srch-select").toggle("fast");
}

function srch_custom(text) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeIn(500);
}

function _closeSearchDiv(event) {
  if (!$(event.target).closest(".srch-select, .text-right").length) {
    $(".srch-select").hide("slow");
  }
}
$(document).on("click", _closeSearchDiv);

function capitalizeFirstLetterOfEachWord(inputText) {
  const words = inputText.toLowerCase().split(" ");
  for (let i = 0; i < words.length; i++) {
    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
  }
  const result = words.join(" ");
  return result;
}

function filters(selectBoxId) {
  var valThis = $("#search" + selectBoxId).val();
  $(
    "#page" +
      selectBoxId +
      " > tbody .tb-row, .grid-div, .faq-back-div, .testimony-div, .exam-div, .book-back-div"
  ).each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(valThis.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _useCollapse(divId) {
  var x = document.getElementById(divId + "num");
  if (x.innerHTML === '&nbsp;<i class="bi-chevron-down"></i>&nbsp;') {
    x.innerHTML = '&nbsp;<i class="bi-chevron-up"></i>&nbsp;';
  } else {
    x.innerHTML = '&nbsp;<i class="bi-chevron-down"></i>&nbsp;';
  }
  $("#" + divId + "answer").slideToggle("slow");
}

function _logOut() {
  sessionStorage.clear();
  window.parent.location.href = adminPortalUrl;
}

function _confirmLogOut() {
  _showCustomConfirm({
    callback: () => {
      _logOut();
    },
    title: "Confirm Logout Action!",
    message:
      "Are you sure you want to log out? You may miss important notifications or updates until you sign in again.",
    alertType: "warning",
    falseActionBtn: true,
  });
}

function _staffValidationCheck(code) {
  if (code < 100) {
    _logOut();
    return;
  }
}

function formatDate(date) {
  if (!date) return "";
  // If input comes in as YYYY-MM-DD (from <input type="date">)
  if (date.includes("-")) {
    const [year, month, day] = date.split("-");
    return `${year}/${month}/${day}`;
  }
  // If input comes in as DD/MM/YYYY
  if (date.includes("/")) {
    const [day, month, year] = date.split("/");
    return `${year}/${month}/${day}`;
  }
  return date; // fallback
}

function _fetchFormatDate(dateString) {
  if (!dateString) return "N/A"; // fallback if no date
  const dateObj = new Date(dateString);
  const options = { day: "2-digit", month: "short", year: "numeric" };
  // Example: 25 Jan 2025
  return dateObj.toLocaleDateString("en-GB", options).replace(" ", " ");
}

function _getSelectRoleId(fieldId) {
  try {
    $.ajax({
      type: "GET",
      url: `${endPoint}/preset-data/fetch-role?loginRoleId=${loginRoleId}`,
      dataType: "json",
      cache: false,
      headers: getAuthHeaders(true),
      success: function (info) {
        const data = info.data;
        const success = info.success;

        if (success === true) {
          for (let i = 0; i < data.length; i++) {
            const id = data[i].roleId;
            const value = data[i].roleName;
            $("#searchList_" + fieldId).append(
              "<li onclick=\"_clickOption('searchList_" +
                fieldId +
                "', '" +
                id +
                "', '" +
                value +
                "');\">" +
                value +
                "</li>"
            );
          }
        } else {
          _actionAlert(info.message, false);
          const response = info.response;
          if (response < 100) {
            _logOut();
          }
        }
      },
    });
  } catch (error) {
    console.error("Error: ", error);
    _actionAlert("An unexpected error occurred. Please try again.", false);
  }
}



function _fetchDashboardStatistics() {
		try {
			//// call endpoint //////
			_callFetchEndPoints({
				url: `admin/dashboard/dashboad-statistics`,
        accessKey: true,
			})
			.then((response) => {
        _staffValidationCheck(response.response);
				if (response.success && response.data) {
					const data = response.data[0];

					const totalActiveStaffCount = data.totalActiveStaffCount;
					const totalActiveGalleryCount = data.totalActiveGalleryCount;
					const totalActiveExamCount = data.totalActiveExamCount;
					const totalActiveStudyAbroadCount = data.totalActiveStudyAbroadCount;
					const totalActiveBlogCount = data.totalActiveBlogCount;
					const totalActiveFaqCount = data.totalActiveFaqCount;
					const totalActiveBranchCount = data.totalActiveBranchCount;
          const totalActiveTestimonyCount = data.totalActiveTestimonyCount;
          const totalActiveIctCourseCount = data.totalActiveIctCourseCount;
          const totalActiveCustomerCount = data.totalActiveCustomerCount;

					$('#totalActiveStaffCount').html(totalActiveStaffCount);
					$('#totalActiveGalleryCount, #sideGalleryCount').html(totalActiveGalleryCount);
					$('#totalActiveExamCount, #sideExamCount').html(totalActiveExamCount);
					$('#totalActiveStudyAbroadCount, #sideStudyAbroadCount').html(totalActiveStudyAbroadCount);
					$('#totalActiveBlogCount, #sideBlogCount').html(totalActiveBlogCount);
					$('#totalActiveFaqCount, #sideFaqCount').html(totalActiveFaqCount);
          $('#totalActiveBranchCount').html(totalActiveBranchCount);
					$('#totalActiveBranchCount').html(totalActiveBranchCount);
					$('#totalActiveTestimonyCount, #sideTestimonyCount').html(totalActiveTestimonyCount);
          $('#totalActiveIctCourseCount').html(totalActiveIctCourseCount);
          $('#totalActiveCustomerCount').html(totalActiveCustomerCount);
				}
			})
			.catch((error) => {
				console.error("Error:", error);
			});
		} catch (error) {
			console.error("Error:", error);
		}
}

function thousandSeparator(val) {
  let dp = 2;
  const formatter = new Intl.NumberFormat("ng-NG", {
    style: "decimal",
    maximumFractionDigits: dp,
    minimumFractionDigits: dp,
  });
  //   return formatter.format(val);
  return isNaN(parseFloat(formatter.format(val))) ? "-" : formatter.format(val);
}



///// Dashbaord Custom Revenue Filtering ////////
function _fetchRevenueFiltering(filterWith, text) {
  $("#srch-text").html(text);
  $(".custom-srch-div").fadeOut(500);
  let dateFrom;
  const dateTo = new Date().toISOString().split("T")[0];
  if (filterWith === "srch-today") {
    dateFrom = new Date().toISOString().split("T")[0];
  } else if (filterWith === "srch-week") {
    const currentDate = new Date();
    const firstDayOfWeek = new Date(
      currentDate.setDate(currentDate.getDate() - currentDate.getDay())
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfWeek;
  } else if (filterWith === "srch-7") {
    /// for last 7 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 6))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-30") {
    /// for last 30 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 29))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-90") {
    /// for last 90 days
    const currentDate = new Date();
    const pastDate = new Date(currentDate.setDate(currentDate.getDate() - 89))
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  } else if (filterWith === "srch-month") {
    const currentDate = new Date();
    const firstDayOfMonth = new Date(
      currentDate.getFullYear(),
      currentDate.getMonth(),
      2
    )
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfMonth;
  } else if (filterWith === "srch-year") {
    const currentDate = new Date();
    const firstDayOfYear = new Date(currentDate.getFullYear(), 0, 2)
      .toISOString()
      .split("T")[0];
    dateFrom = firstDayOfYear;
  } else if (filterWith === "srch-1year") {
    /// for last 1 year
    const currentDate = new Date();
    const pastDate = new Date(
      currentDate.setFullYear(currentDate.getFullYear() - 1)
    )
      .toISOString()
      .split("T")[0];
    dateFrom = pastDate;
  }

  _revenueFiltering(dateFrom, dateTo);
}
function _fetchCustomRevenueFiltering() {
  let issueCount = 0;

  const dateFrom = $("#datepickers-from").val();
  const dateTo = $("#datepickers-to").val();

  $("#datepickers-from, #datepickers-to").removeClass("issue");
  $("#issue_from, #issue_to").html("");

  if (!dateFrom) {
    $("#issue_from").html("Kindly Provide Start Date To Continue");
    issueCount++;
  }

  if (!dateTo) {
    $("#issue_to").html("Kindly Provide End Date To Continue");
    issueCount++;
  }

  if (issueCount > 0) {
    return;
  }

  _revenueFiltering(dateFrom, dateTo);
}

function _revenueFiltering(dateFrom, dateTo) {
  $("#get-form-more-div")
    .css({
      display: "flex",
      "justify-content": "center",
      "align-items": "center",
    })
    .fadeIn(500);
  $.ajax({
    type: "GET",
    url: `${endPoint}/admin/dashboard/fetch-dashboard-revenue?dateFrom=${dateFrom}&dateTo=${dateTo}`,
    dataType: "json",
    cache: false,
    headers: getAuthHeaders(true),
    success: function (info) {
      if (info.success) {

        // Update custom date from and date to///
        $("#dateFrom").html(info.dateFrom);
        $("#dateTo").html(info.dateTo);

        // Update dashboard Income
        $("#totalIncome").html(
          "<s>N</s>" + thousandSeperator(info.totalIncome)
        );
        $("#totalWalletBalance").html(
          "<s>N</s>" + thousandSeperator(info.totalWalletBalance)
        );

        const incomeDataPoints = [];
        const walletDataPoints = [];
        // Update dashboard revenue bar Chart ///
        if (info.incomeData && info.incomeData.length > 0) {
          for (let i = 0; i < info.incomeData.length; i++) {
            const fetchedData = info.incomeData[i];
            const payDate = new Date(fetchedData.payDate);
            const incomeAmount = parseFloat(fetchedData.incomeAmount);

            incomeDataPoints.push({
              x: payDate,
              y: incomeAmount,
            });
          }
        }

        if (info.walletData && info.walletData.length > 0) {
          for (let i = 0; i < info.walletData.length; i++) {
            const fetchedData = info.walletData[i];
            const payDate = new Date(fetchedData.payDate);
            console.log(payDate);
            const walletAmount = parseFloat(fetchedData.walletAmount);

            walletDataPoints.push({
              x: payDate,
              y: walletAmount,
            });
          }
        }

          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1",
            axisX: {
            valueFormatString: "DD MMM",
            crosshair: {
              enabled: true,
              snapToDataPoint: true,
            },
          },
            axisY: {
                suffix: "₦",
                includeZero: true
            },
            toolTip: {
                shared: true
            },
            legend: {
                reversed: true,
                verticalAlign: "top",
                horizontalAlign: "left"
            },
            data: [{
              type: "stackedColumn",
              name: "Income",
              showInLegend: true,
              xValueFormatString: "DD MMM, YYYY",
              yValueFormatString: "₦#,##0",
              color: "#9d043c",
              dataPoints: incomeDataPoints
            },
            {
              type: "stackedColumn",
              name: "Wallet",
              showInLegend: true,
              xValueFormatString: "DD MMM, YYYY",
              yValueFormatString: "₦#,##0",
              color: "#f7a025",
              dataPoints: walletDataPoints
            }
        ]
    });
       chart.render();
        function toogleDataSeries(e) {
          if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              e.dataSeries.visible = false;
          } else {
              e.dataSeries.visible = true;
          }
            chart.render();
        }
      } else {
        const response = info.response;
        if (response < 100) {
          _logOut();
        }
      }
    },
    error: function (err) {
      console.error(err);
    },
  });
  $("#get-form-more-div").fadeOut(500);
}