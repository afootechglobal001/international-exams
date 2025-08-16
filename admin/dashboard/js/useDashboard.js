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
	$('#side-dashboard, #side-branch, #side-staff, #side-publish, #side-reports, #side-students, #top-dashboard, #top-staff').removeClass('active-li');
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

function capitalizeFirstLetterOfEachWord(inputText) {
	const words = inputText.toLowerCase().split(' ');
	for (let i = 0; i < words.length; i++) {
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	}
	const result = words.join(' ');
	return result;
}

function filters(selectBoxId) {
	var valThis = $('#search'+selectBoxId).val();
		$('#page'+selectBoxId+' > tbody .tb-row, .grid-div, .faq-back-div, .testimony-div').each(function() {
		var text = $(this).text();
		(text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
	});
};

function _logOut(){
	sessionStorage.clear();
	window.parent.location.href = adminPortalUrl;
}

function getAuthHeaders(includeAuth = false) {
    return {
        'apiKey': apiKey,
        'userOsBrowser': userOsBrowser,
        'userIpAddress': userIpAddress,
        'userDeviceId': userDeviceId,
        'Authorization': includeAuth ? ('Bearer ' + (loginAccessKey ?? '')) : undefined
    };
}

function formatDate(date) {
    if (!date) return ""; 
    // If input comes in as YYYY-MM-DD (from <input type="date">)
    if (date.includes('-')) {
        const [year, month, day] = date.split('-');
        return `${year}/${month}/${day}`;
    }
    // If input comes in as DD/MM/YYYY
    if (date.includes('/')) {
        const [day, month, year] = date.split('/');
        return `${year}/${month}/${day}`;
    }
    return date; // fallback
}


function _getSelectStatusId(fieldId, statusIds){
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/preset-data/fetch-status?statusId=${statusIds}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;

				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].statusId;
						const value = data[i].statusName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false);
					const response = info.response;
					if (response < 100) {
						_logOut();
					}    
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
	}
}

function _getSelectRoleId(fieldId) {
	try {
		$.ajax({
			type: "GET",
			url: `${endPoint}/preset-data/fetch-role?loginRoleId=${loginRoleId}`,
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(true),
			success: function(info) {
				const data = info.data;
				const success = info.success;

				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].roleId;
						const value = data[i].roleName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false); 
					const response = info.response;
					if (response < 100) {
						_logOut();
					}   
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
	}
}

function _getSelectTitle(fieldId){
	try {
		$.ajax({
			type: "GET",
			url: endPoint+'/preset-data/fetch-title',
			dataType: "json",
			cache: false,
			headers: getAuthHeaders(),
			success: function(info) {
				const data = info.data;
				const success = info.success;
				
				if (success === true) {
					for (let i = 0; i < data.length; i++) {
						const id = data[i].titleId;
						const value = data[i].titleName;
						$('#searchList_'+ fieldId).append('<li onclick="_clickOption(\'searchList_' + fieldId + '\', \'' + id + '\', \'' + value + '\');">'+ value +'</li>');
					}	
				} else {
					_actionAlert(info.message, false); 
				}
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		_actionAlert('An unexpected error occurred. Please try again.', false);
	}
}