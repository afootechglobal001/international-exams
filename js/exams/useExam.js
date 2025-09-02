function _fetchFormatDate(dateString) {
  if (!dateString) return "N/A"; // fallback if no date
  const dateObj = new Date(dateString);
  const options = { day: "2-digit", month: "short", year: "numeric" };
  // Example: 25 Jan 2025
  return dateObj.toLocaleDateString("en-GB", options).replace(" ", " ");
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
				const fullName = data.createdBy.fullName;
                const updatedTime = _fetchFormatDate(data.updatedTime);
                const regPix = data.regPix;

				$('#regTitle').html(regTitle);
                $('#seoDescription').html(seoDescription);
                $('#pageContent').html(pageContent);
				$('#fullName').html(fullName);
                $('#updatedTime').html(updatedTime);
				$('#examPreviewPix').attr('src', examPixPath + '/' + regPix);
				
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