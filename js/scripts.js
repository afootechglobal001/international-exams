$(document).ready(function(){
	let pageSession = JSON.parse(sessionStorage.getItem("pageSession"));
	if (pageSession==null){
	  _getPageSessionValue('');
	}
});
  
  
  
function _getPageSessionValue(reload) {
	//// call endpoint //////
	_callFetchEndPoints({
		url: `site/session/get-page-session`,
	})
	.then((response) => {
		sessionStorage.setItem("pageSession", JSON.stringify(response.pageSession));
		if (reload=='reload'){
			window.location.reload()
		}
	})
}
  

function filters(selectBoxId) {
  var valThis = $("#search" + selectBoxId).val();
  $("#page" + selectBoxId + " > a, .faq-title").each(function () {
    var text = $(this).text();
    text.toLowerCase().indexOf(valThis.toLowerCase()) > -1
      ? $(this).show()
      : $(this).hide();
  });
}

function _fetchPagesPictureData(publishId, imageContainer) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/page-picture/fetch-page-picture?publishId=${publishId}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
        		_initFetchPagesPictureData(response.data, imageContainer);
			} else {
				_showCustomConfirm({
					title: "BLOG INFO",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#fetchPagePictures').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			}
			_slideImages();
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchPagesPictureData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchPagesPictureData());
  	}
}

function _initFetchPagesPictureData(data, imageContainer) {
  	const content = data.map((item) => `
		<div class="each-img-div" title="Click to Preview" id="img${item.sn}" 
			onclick="_viewPreviewImage('img${item.sn}', '${imageContainer}')">
			<img src="${pagePicturePath}/${item.pictures}" alt="${item.sn}"/> 
		</div>`).join("");
    $('#fetchPagePictures').html(content);
}

function _viewPreviewImage(divid, imageContainer) {
	const viewPix = $("#" + divid).html();
	$('#' + imageContainer).html(viewPix).fadeIn(3000);
}

function _slideImages(){
    $(document).ready(function () {
	var container = $(".inner-img-container");
	var imagesCount = $(".each-img-div").length;
	var currentIndex = 0;
	var visibleImages;
	var imageWidth = $('.each-img-div').outerWidth(true);
	
	function updateVisibleImages() {
		if ($(window).width() <= 767) {
			visibleImages = 1;
		} else {
			visibleImages = 5;
		}
	}

	updateVisibleImages();
	$(window).resize(updateVisibleImages);

	$(document).on("click", ".right-click-btn", function () {
		if (currentIndex < imagesCount - visibleImages) {
			currentIndex++;
			var translateValue = currentIndex * imageWidth;
			container.css("transform", "translateX(-" + translateValue + "px)");
		}
	});

	$(document).on("click", ".left-btn", function () {
		if (currentIndex > 0) {
			currentIndex--;
			var translateValue = currentIndex * imageWidth;
			container.css("transform", "translateX(-" + translateValue + "px)");
		}
	});
  });
}

function _getActiveContactLink(activeMenu) {
	$('#next-kaduna, #next-abuja, #next-ibadan').removeClass('active-btn');
	$('#next-'+activeMenu).addClass('active-btn');
}


function _nextContactPage(nextId, activeMenu) {
	_getActiveContactLink(activeMenu);
	$("#kaduna-hide-div, #abuja-hide-div, #ibadan-hide-div").hide();
	$("#" + nextId).fadeIn(1000);
}




function _setCountry(countryId) {
    const currentCountry = JSON.parse(sessionStorage.getItem("websiteCountryId"));
    const $modal = $('#switchCountryModal'); // jQuery modal reference

    if (countryId && countryId.trim() !== "" && currentCountry !== countryId) {
        sessionStorage.setItem("websiteCountryId", JSON.stringify(countryId));

        // Fade out the modal before reload
        $modal.fadeOut(500, function() {
            window.location.reload();
        });
    } else {
        // If same country, just fade out modal
        $modal.fadeOut(500);
    }
}

$(document).ready(function() {
    const $modal = $('#switchCountryModal');

    // Show modal only on first visit
    if (!sessionStorage.getItem('visited')) {
        $modal.show();
        sessionStorage.setItem('visited', 'true');
    }

    // Optional: attach _setCountry via jQuery instead of inline onclick
    $('.each-content').on('click', function() {
        const countryId = $(this).data('country');
        _setCountry(countryId);
    });
});


function _getForms(action) {
    if (action === 'switchCountry') {
        $('#switchCountryModal').fadeIn(300); // show the modal
    }
}
