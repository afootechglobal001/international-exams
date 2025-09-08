function _getActivePage(props) {
  const { page = "", divid = "", pageContainer = "page-content" } = props;
  _getActivePageLink(divid);
  if (page) {
    _getPage({
      page: page,
      pageContainer: pageContainer,
      url: portalOperationMiddlewareUrl,
    });
  }
}

function _getActivePageLink(divid) {
  $("#dashboard, #ebook, #exam, #transactions").removeClass("active");
  $("#" + divid).addClass("active");
}

function _logOut() {
  sessionStorage.clear();
  window.parent.location.href = portalUrl;
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

function _toggleProfileDiv() {
  $(".toggle").toggle("slow");
}
function _closeProfileDiv(event) {
  if (!$(event.target).closest(".toggle, .profile-pic-div").length) {
    $(".toggle").hide("slow");
  }
}
$(document).on("click", _closeProfileDiv);

function capitalizeFirstLetterOfEachWord(inputText) {
  const words = inputText.toLowerCase().split(" ");
  for (let i = 0; i < words.length; i++) {
    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
  }
  const result = words.join(" ");
  return result;
}

function getFirstLettersOfEachWord(str) {
  return str
    .split(" ") // split by spaces
    .filter((word) => word) // remove empty strings (in case of double spaces)
    .map((word) => word[0].toUpperCase()) // take first letter and uppercase it
    .join(""); // join into a single string
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

function _userValidationCheck(code) {
  if (code < 100) {
    _logOut();
    return;
  }
}
