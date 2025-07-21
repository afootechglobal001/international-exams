function _getActivePage(props) {
	const {
        page = '',
        divid = '',
		pageContainer='page-content'
    } = props;
    _getActivePageLink(divid);
	if(page){
		_getPage({page: page, pageContainer: pageContainer,  url: portalLocalUrl});
	}
}

function _getActivePageLink(divid){
	$('#dashboard, #exam, #transactionHistory, #subscriptionHistory, #settings').removeClass('active');
	$("#"+divid).addClass('active');
}