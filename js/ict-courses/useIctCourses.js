function _fetchEachIctCourses(publishId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategory?.ictCourseCategory}&publishId=${publishId}`,
		})
		.then((response) => {
			if (response.success && response.data) {
				const data = response.data[0];

				const regTitle = data.regTitle;
				const subTitle = data.subTitle;
				const seoDescription = data.seoDescription;
				const pageContent = data.pageContent;
				const pageUrl = data.pageUrl;
				const regPix = data.regPix;

				$('#regTitle, #regTopTitle').html(regTitle);
				$('#subTitle').html(subTitle);
				$('#seoDescription').html(seoDescription);
				$('#pageContent').html(pageContent);
				$('#ictCourseFetchPix').attr('src', ictCoursePixPath + '/' + regPix);
				$('#examTitleLink').attr('href', websiteUrl + '/' + pageUrl);
			}
		})
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
	}
}

function _fetchPageRelatedIctCoursesData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategory?.ictCourseCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchRelatedIctCoursesData(response.data);
			} else {
				$('#relatedPageIctCoursesContent').html(`
					<div class="false-notification-div">
						<p>${response.message}</p>
					</div>
				`);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchRelatedIctCoursesData(data) {
  	const content = data.map((item) => `
    <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
	<div class="related-post">
		<div class="image-div">
            <img src="${ictCoursePixPath}/${item.regPix}" alt="${item.regTitle}"/>
        </div>

		<div class="cont-div">
			<h3>${item.regTitle}</h3>
			<p>${item.subTitle}</p> 
			<div class="comment"><i class="bi-clock"></i> <span> ${formatExamDate(item.updatedTime)} </span> </div>
		</div>
	</div></a>`).join("");
    $('#relatedPageIctCoursesContent').html(content);
}

function _fetchHeaderIctCourses() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategory?.ictCourseCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchHeaderIctCourses(response.data);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchHeaderIctCourses(data) {
  	const content = data.map((item) => `
	 <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
		<li>${item.regTitle}</li>
	</a>
    `).join("");
    $('#fetchHeaderIctCourses').html(content);
}

function _fetchMobileIctCourses() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/ict-courses/fetch-ict-courses?pageCategoryId=${pageCategory?.ictCourseCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchMobileIctCourses(response.data);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchMobileIctCourses(data) {
  	const content = data.map((item) => `
	<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
		<li>${item.regTitle}</li>
	</a>
    `).join("");
    $('#courses-sub-li').html(content);
}