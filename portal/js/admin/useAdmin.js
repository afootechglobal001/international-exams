function _getActivePage(props) {
	const {
        page = '',
        divid = '',
		nav= ''
    } = props;
	_getActiveLink(divid, nav);
	if(page){
		_getPage({page: page, url: adminPortalLocalUrl});
	}
}