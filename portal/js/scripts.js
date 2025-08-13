function _nextPage(next_id) {
	if (next_id != '') {
		$('#nextPage1,#nextPage2,#nextPage3').hide();
		$('#' + next_id).fadeIn(1000);
	} else {
		// do nothing
	}
}

function _prevPage(next_id) {
	if (next_id != '') {
		$('#nextPage1,#nextPage2,#nextPage3').hide();
		$('#' + next_id).fadeIn(1000);
	} else {
		// do nothing
	}
}


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
	$('#signUp').removeClass('active');
	$("#"+divid).addClass('active');
}
