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

function _getActiveLink(divid, nav) {
	_removeClass()
	$('#side-'+divid).addClass('active-li');
	$('#top-'+divid).addClass('active-li');
	$('#mobile-'+divid).addClass('active-li');
	$("#page-title").html($("#_" + divid).html());
	_getNav(nav);
}

function _removeClass(){
	$('#side-dashboard, #side-staff, #side-publish, #side-reports, #side-students, #top-dashboard, #top-staff').removeClass('active-li');
	$('#mobile-dashboard,#mobile-branches,#mobile-staff,#mobile-reports').removeClass('active-li');
}

function _getNav(nav){
	if(nav==''){
		_closeNav();
	}else{
	   	$('#link-products, #link-orders, #link-publish, #link-publish, #link-reports').css({'display':'none'});
		$('#link-'+nav).css({'display':'block'});
	   	$('.side-nav-bg-sub-div').animate({'left':'150px'},200);
	}
}

function _closeNav(){
	$('.side-nav-bg-sub-div').animate({'left':'-100%'},400);
	var x = document.getElementById("menu-div");
	x.innerHTML = '<i class="bi-text-right"></i>';
    $('#side-nav-div').animate({'left':'-150px'},200);
}

function _closeAllNav(){
	_closeNav();
	_removeClass();
}

function _openMenu(){
	var x = document.getElementById("menu-div");
	if (x.innerHTML === '<i class="bi-text-right"></i>') {
	x.innerHTML = '<i class="bi-x-lg"></i>';
		$('#side-nav-div').animate({'left':'0px'},200);
	} else {
	x.innerHTML = '<i class="bi-text-right"></i>';
	_closeAllNav()
	}
}
  
function _open_li(ids){
	$('#'+ids+'-sub-li').toggle('slow');
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
  
function srch_custom(text){
	$('#srch-text').html(text);
	$('.custom-srch-div').fadeIn(500);
};

function _next_page(next_id, icon, divid) {
	$("#account_settings_id,#account_detail,#channge_password").hide();
	$("#" + next_id).fadeIn(1000);
	$("#panel-title").html($("#" + icon).html() + $("#" + divid).html());
}
  
function _prev_page(next_id) {
	$("#account_settings_id,#account_detail,#channge_password").hide();
	$("#" + next_id).fadeIn(1000);
	$("#panel-title").html(
	  '<i class="bi-gear"></i> </span id="app_text"> APP SETTINGS'
	);
}


function capitalizeFirstLetterOfEachWord(inputText) {
	const words = inputText.toLowerCase().split(' ');
	for (let i = 0; i < words.length; i++) {
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	}
	const result = words.join(' ');
	return result;
}

function isNumber_Check(e) {
    var key = e.keyCode || e.which;

    if (!((key >= 48 && key <= 57))) {
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }
}

function filters(selectBoxId) {
	var valThis = $('#search'+selectBoxId).val();
		$('#page'+selectBoxId+' > tbody .tb-row, .grid-div, .faq-back-div, .testimony-div').each(function() {
		var text = $(this).text();
		(text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
	});
};

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