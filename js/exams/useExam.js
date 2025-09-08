function _fetchAllexamsData() {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/exams/fetch-all-exams?pageCategoryId=${pageCategory?.examCategory}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
                _initFetchExamData(response.data);
			} else {
				_showCustomConfirm({
					title: "EXANM LINK",
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
			_callAjaxError(() => _fetchAllexamsData()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchAllexamsData());
  	}
}

function _initFetchExamData(data) {
  const content = data.map((item) => `
    <div class="exam-div" data-aos="fade-in" data-aos-duration="1200">
		<div class="image-div">
			<img src="${examPixPath}/${item.regPix}" alt="${item.regTitle}" />
		</div>

		<div class="icon-div">
			<img src="${examLogoPixPath}/${item.examLogo}" alt="${item.regTitle}" />
		</div>

		<div class="text-div">
			<div class="inner-div">
				<div class="top-text">
					<h3>${item.examAbbr}</h3>
					<p>${item.regTitle}</p>
				</div>

				<div class="bottom-div">
					<div class="left-div">
						<span class="price">${item.currency === 'USD' ? '$' + item.amount : '₦' + item.amount}</span>
						<span><i class="bi-person"></i> 320+</span>
					</div>
					
					<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
					<button class="btn" title="Read More">Read More <i
						class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
	</div>`).join("");
    $('#pageContent').html(content);
}


function _fetchEachSiteExam(publishId) {
	try {
		//// call endpoint //////
		_callFetchEndPoints({
			url: `site/exams/fetch-each-exam?publishId=${publishId}`,
		})
		.then((response) => {
			if (response.success && response.data) {
    			const data = response.data;

				const regTitle = data.regTitle;
				const seoDescription = data.seoDescription;
                const pageContent = data.pageContent;
				const pageUrl = data.pageUrl;
				const fullName = data.updatedBy.fullName;
                const updatedTime = formatExamDate(data.updatedTime);
                const regPix = data.regPix;
				const incentives = data.incentives;

				$('#regTitle, #regTopTitle').html(regTitle);
                $('#seoDescription').html(seoDescription);
                $('#pageContent').html(pageContent);
				$('#fullName').html(fullName);
                $('#updatedTime').html(updatedTime);
				$('#examPreviewPix').attr('src', (examPixPath ? examPixPath : examRelatedLinkPixPath) + '/' + regPix);
				$('#examTitleLink').attr('href', websiteUrl + '/' + pageUrl);
                $('#incentives').html(incentives);

				let linkContent = '';
                for (let i = 0; i < data.relatedLinksData.length; i++) {
                    const fetched = data.relatedLinksData[i];
					const regTitle= fetched.regTitle;
					const pageUrl= fetched.pageUrl;

					linkContent += `
					<a href="${websiteUrl}/${pageUrl}" title="${regTitle}">
						<span>${regTitle}</span></a>
					`;
                }
                $('#fetchedRelatedLinks').html(linkContent);

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
			_callAjaxError(() => _fetchEachSiteExam()); // retry if needed
		});
	} catch (error) {
		console.error("Error:", error);
		_callCatchError(() => _fetchEachSiteExam());
  	}
}