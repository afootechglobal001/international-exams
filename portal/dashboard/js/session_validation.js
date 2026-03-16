(function () {
  function _checkActiveSession() {
    let userLoginData_ = JSON.parse(localStorage.getItem("userLoginData"));
    if (!userLoginData_ || !userLoginData_.hasOwnProperty("userId")) {
      _logOut();
    }
  }
  _checkActiveSession();
})();
