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
