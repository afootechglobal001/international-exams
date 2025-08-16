function _getActivePagesTab(props) {
	const {
        page = '',
        divid = '',
		pageContainer='getPagesDetails'
    } = props;
	_getActivePagesTabLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: adminPortalLocalUrl});
	}
}
function _getActivePagesTabLink(divid){
	$('#pageContent, #picturePage').removeClass('active-li');
	$("#"+divid).addClass('active-li');
}


function _getActiveStudentPage(props) {
	const {
        page = '',
        divid = '',
		pageContainer='getStudentDetails'
    } = props;
	__getActiveStudentPageLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: adminPortalLocalUrl});
	}
}

function __getActiveStudentPageLink(divid){
	$('#studentDashboard, #studentProfileDetails, #paymentHistory, #walletHistory').removeClass('active');
	$("#"+divid).addClass('active');
}
  