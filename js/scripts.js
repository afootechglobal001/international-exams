function filters(selectBoxId) {
  var valThis = $("#search" + selectBoxId).val();
  $("#page" + selectBoxId + " > a, .faq-title").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(valThis.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}