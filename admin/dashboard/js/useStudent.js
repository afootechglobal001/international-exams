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
	$('#studentDashboard, #registeredExams, #Transactions, #studentProfileDetails').removeClass('active');
	$("#"+divid).addClass('active');
}
  