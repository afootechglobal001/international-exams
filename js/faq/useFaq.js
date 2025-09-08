function _fetchFaqCat() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-faq-category`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {

                let text = '';
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].catId;
                    const value = response.data[i].catName;
                    text += `<li title="${value}" onclick="_fetchFaqPageData('${id}');">${value}</li>`;
				}
        		$('#catId').html(text);
			} else {
				_showCustomConfirm({
					title: "FETCH FAQ CAT ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchFaqCat()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchFaqCat());
  	}
}

function _fetchIndexFaqData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/faq/fetch-index-faq?pageCategoryId=${pageCategory?.faqCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                	_initFetchIndexFaqData(response.data);
			} else {
				_showCustomConfirm({
					title: "FAQ INFO",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchIndexFaqData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchIndexFaqData());
  	}
}

function _initFetchIndexFaqData(data) {
  	const content = data.map((item, index) => {
    const faqId = `faq${index}`; // unique wrapper ID
    const faqNumId = `faq${index}num`; // unique expand icon ID
    const faqAnswerId = `faq${index}answer`; // unique answer div ID

    return `
      <div class="faq-toggle" id="${faqId}">
        <div class="title-text" onclick="_collapse('${faqId}')">
          <div class="quest-text-div">
            <div class="icon-div"><i class="bi-question"></i></div>
            <h3>${item.faqQuestion}</h3>
          </div>
          <div class="expand-div" id="${faqNumId}">
            <i class="bi-plus"></i>
          </div>
        </div>
        <div class="answer-div" id="${faqAnswerId}" style="display: none;">
          <p>${item.faqAnswer}</p>
        </div>
      </div>
    `;
  }).join("");

  $('#indexFaqContent').html(content);
}

function _fetchFaqPageData(faqCatId='') {
	$('#pageContent').html(`
      <div class="content-loading-div">
        <img src="${websiteUrl}/all-images/images/spinner.gif" alt="Loading..." />
      </div>
    `).fadeIn("fast");

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/faq/fetch-all-page-faq?pageCategoryId=${pageCategory?.faqCategory}&faqCatId=${faqCatId}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                	_initFetchPageFaqData(response.data);
			} else {
				_showCustomConfirm({
					title: "FAQ INFO",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});

				$('#pageContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchIndexFaqData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchIndexFaqData());
  	}
}

function _initFetchPageFaqData(data) {
  	const content = data.map((item, index) => {
    const faqId = `faq${index}`; // unique wrapper ID
    const faqNumId = `faq${index}num`; // unique expand icon ID
    const faqAnswerId = `faq${index}answer`; // unique answer div ID

    return `
      <div class="faq-title" id="${faqId}">
		<div class="inner-title-div" onclick="_collapse('${faqId}')">
			<h2>${item.faqQuestion}</h2>
			<div class="expand-div" id="${faqNumId}">&nbsp;<i class="bi-plus"></i>&nbsp;</div>
		</div>

		<div class="faq-answer-div" id="${faqAnswerId}" style="display: none;">
			<p>${item.faqAnswer}</p>
		</div>
	</div>`;
  }).join("");

  $('#pageContent').html(content);
}
