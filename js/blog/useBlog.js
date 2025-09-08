function _fetchAllPageBlogData(blogCatId = '') {
    $('#pageContent').html('<div class="ajax-loader blog-ajax-loader"><img src="' + websiteUrl + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/blog/fetch-blog?pageCategoryId=${pageCategory?.blogCategory}&blogCatId=${blogCatId || ''}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchBlogData(response.data);
			} else {
				_showCustomConfirm({
					title: "BLOG INFO",
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
			_callAjaxError(() => _fetchAllPageBlogData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchAllPageBlogData());
  	}
}

function _initFetchBlogData(data) {
  const content = data.map((item) => `
    <a href="${websiteUrl}/blog/${item.pageUrl}" title="${item.regTitle}">
    <div class="main-blog-div">
        <div class="top-text">${item.blogCatName}</div>
        <div class="image-div">
            <img src="${blogPixPath}/${item.regPix}" alt="${item.regTitle}"/>
        </div>
        
        <div class="text-content-div">
            <h2>${item.regTitle}</h2>
            <div class="count"><i class="bi-calendar3"></i> ${formatExamDate(item.updatedTime)} <span> | </span> <i class="bi-eye"></i> 10 VIEWS</div>
            <p>${item.seoDescription}</p>

            <div>
                <button class="btn" title="Read More">Read More <i class="bi-arrow-right"></i></button>
            </div>
        </div>
    </div></a>`).join("");
    $('#pageContent').html(content);
}

function _fetchBlogCat() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `preset-data/fetch-blog-category`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {

                let text = '';
                for (let i = 0; i < response.data.length; i++) {
                    const id = response.data[i].catId;
                    const value = response.data[i].catName;
                    text += `<li title="${value}" onclick="_fetchAllPageBlogData('${id}');">${value}</li>`;
				}
        		$('#catId').html(text);
			} else {
				_showCustomConfirm({
					title: "FETCH BLOG CAT ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _getSelectBlogCategory()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _getSelectBlogCategory());
  	}
}

function _fetchRelatedBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/blog/fetch-related-page-blog?pageCategoryId=${pageCategory?.blogCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchRelatedBlogData(response.data);
			} else {
				_showCustomConfirm({
					title: "BLOG INFO",
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
			_callAjaxError(() => _fetchRelatedBlogData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchRelatedBlogData());
  	}
}

function _initFetchRelatedBlogData(data) {
  const content = data.map((item) => `
    <div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
        <div class="blog-inner-div">
            <div class="image-div">
                <img src="${blogPixPath}/${item.regPix}"
                    alt="${item.regTitle}" />
            </div>

            <div class="text-div">
                <div class="count"><i class="bi-calendar3"></i> ${formatExamDate(item.updatedTime)} <span>|</span> <i
                        class="bi-eye-fill"></i> 250 VIEWS</div>
                <h3>${item.regTitle}</h3>

                <a href="${websiteUrl}/blog/${item.pageUrl}" title="Read More">
                    <button class="btn" title="Read More">Read More <i
                            class="bi-chevron-right"></i></button></a>
            </div>
        </div>
    </div>`).join("");
    $('#relatedBlogContent').html(content);
}

function _fetchIndexBlogData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/blog/fetch-index-blog?pageCategoryId=${pageCategory?.blogCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchIndexBlogData(response.data);
			} else {
				_showCustomConfirm({
					title: "BLOG INFO",
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
			_callAjaxError(() => _fetchRelatedBlogData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchRelatedBlogData());
  	}
}

function _initFetchIndexBlogData(data) {
  const content = data.map((item) => `
    <div class="blog-div" data-aos="fade-in" data-aos-duration="1000">
        <div class="blog-inner-div">
            <div class="image-div">
                <img src="${blogPixPath}/${item.regPix}"
                    alt="${item.regTitle}" />
            </div>

            <div class="text-div">
                <div class="count"><i class="bi-calendar3"></i> ${formatExamDate(item.updatedTime)} <span>|</span> <i
                        class="bi-eye-fill"></i> 250 VIEWS</div>
                <h3>${item.regTitle}</h3>

                <a href="${websiteUrl}/blog/${item.pageUrl}" title="Read More">
                    <button class="btn" title="Read More">Read More <i
                            class="bi-chevron-right"></i></button></a>
            </div>
        </div>
    </div>`).join("");
    $('#indexBlogContent').html(content);
}

function _fetchEachSiteBlog(publishId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/blog/fetch-blog?pageCategoryId=${pageCategory?.blogCategory}&publishId=${publishId}`,
		})
		.then((response) => {
			if (response.success && response.data) {
    			const data = response.data[0];

				const regTitle = data.regTitle;
				const seoDescription = data.seoDescription;
                const pageContent = data.pageContent;
				const pageUrl = data.pageUrl;
				const fullName = data.updatedBy.fullName;
                const updatedTime = formatExamDate(data.updatedTime);
                const regPix = data.regPix;

				$('#regTitle, #regTopTitle').html(regTitle);
                $('#seoDescription').html(seoDescription);
                $('#pageContentInfo').html(pageContent);
				$('#fullName').html(fullName);
                $('#updatedTime').html(updatedTime);
				$('#blogPreviewPix').attr('src', (blogPixPath) + '/' + regPix);
				$('#blogTitleLink').attr('href', websiteUrl + '/blog/' + pageUrl);
			} else {
				_showCustomConfirm({
					title: "PAGE ERROR",
					message: response.message,
					alertType: "warning",
					trueActionBtnText: "OK",
				});
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
			_callAjaxError(() => _fetchEachSiteBlog()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachSiteBlog());
  	}
}