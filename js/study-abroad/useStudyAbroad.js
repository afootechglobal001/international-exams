function _fetchAllStudyAbroadData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategory?.studyAbroadCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchStudyAbroadData(response.data);
			} else {
				$('#pageContent').html(`
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

function _initFetchStudyAbroadData(data) {
  const content = data.map((item) => `
    <div class="exam-div for-study-abroad" data-aos="fade-in" data-aos-duration="1200">
		<div class="image-div">
			<img src="${studyAbroadPixPath}/${item.regPix}" alt="${item.regTitle}" />
		</div>

		<div class="text-div">
			<div class="inner-div">
				<div class="top-text">
				<div class="count"><i class="bi-calendar3"></i> ${formatExamDate(item.updatedTime)} <span>|</span> <i
                        class="bi-eye-fill"></i> ${item.pageView} VIEWS</div>
					<h3>${item.regTitle}</h3>
					<p>${item.studyAbroadSummary.substr(0, 75)}...</p>
				</div>

				<div class="bottom-div">
					<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
					<button class="btn" title="Read More">Read More <i
						class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
	</div>`).join("");
    $('#pageContent').html(content);
}

function _fetchEachStudyAbroad(publishId) {
	let pageSession = JSON.parse(sessionStorage.getItem("pageSession"));
	if (pageSession==null){
		_getPageSessionValue('reload')
	} else {
		try {
			//// call endpoint //////
			_callFetchEndPoints({
				url: `site/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategory?.studyAbroadCategory}&publishId=${publishId}&pageSession=${pageSession}`,
			})
			.then((response) => {
				if (response.success && response.data) {
					const data = response.data[0];

					const regTitle = data.regTitle;
					const seoDescription = data.seoDescription;
					const pageContent = data.pageContent;
					const pageUrl = data.pageUrl;
					const pageView = data.pageView;
					const fullName = data.updatedBy.fullName;
					const updatedTime = formatExamDate(data.updatedTime);
					const regPix = data.regPix;

					$('#regTitle, #regTopTitle').html(regTitle);
					$('#seoDescription').html(seoDescription);
					$('#pageContent').html(pageContent);
					$('#fullName').html(fullName);
					$('#pageView').html(pageView);
					$('#updatedTime').html(updatedTime);
					$('#studyAbroadFetchPix').attr('src', studyAbroadPixPath + '/' + regPix);
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
}

function _fetchPageRelatedStudyAbroadData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/study-abroad/fetch-related-study-abroad?pageCategoryId=${pageCategory?.studyAbroadCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchRelatedStudyAbroadData(response.data);
			} else {
				$('#relatedPageStudyAbroadContent').html(`
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

function _initFetchRelatedStudyAbroadData(data) {
  	const content = data.map((item) => `
    <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
	<div class="related-post">
		<div class="image-div">
            <img src="${studyAbroadPixPath}/${item.regPix}" alt="${item.regTitle}"/>
        </div>

		<div class="cont-div">
			<h3>${item.regTitle}</h3>
			<p>${item.studyAbroadSummary.substr(0, 40)}...</p> 
			<div class="comment"><i class="bi-clock"></i> <span> ${formatExamDate(item.updatedTime)} </span> </div>
		</div>
	</div></a>`).join("");
    $('#relatedPageStudyAbroadContent').html(content);
}

function _fetchHeaderStudyAbroad() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategory?.studyAbroadCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchHeaderStudyAbroad(response.data);
			}
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchHeaderStudyAbroad(data) {
  	const content = data.map((item) => `
    <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
		<li>${item.regTitle}</li>
	</a>`).join("");
    $('#fetchHeaderStudyAbroad').append(content);
}


function _fetchMobileStudyAbroad() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			 url: `site/study-abroad/fetch-study-abroad?pageCategoryId=${pageCategory?.studyAbroadCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
          _initFetchMobileStudyAbroad(response.data);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchMobileStudyAbroad(data) {
  	const content = data.map((item) => `
	<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
		<li>${item.regTitle}</li>
	</a>
    `).join("");
    $('#studyAbroad-sub-li').html(content);
}