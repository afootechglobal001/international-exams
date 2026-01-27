function forceCountryTitle(title) {
  // If title starts with "What is", never add country
  if (/^what is/i.test(title)) {
    return title; // return clean
  }

  // Otherwise add country normally
  return title
    .replace(/in\s+[A-Za-z ]+$/i, "") // remove old country
    .trim() + " in " + websiteCountryName;
}

function _fetchAllExamsData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/exams/fetch-all-exams?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchExamData(response.data);
        } else {
          $("#pageContent").html(`
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

function _initFetchExamData(data) {
  const content = data
    .map(
      (item) => `
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
						<span class="price">${
              item.currency === "USD"
                ? "$" + thousandSeperator(item.amount)
                : "<s>N</s>" + thousandSeperator(item.amount)
            }</span>
					</div>
					
					<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
					<button class="btn" title="Read More">Read More <i
						class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
	</div>`
    )
    .join("");
  $("#pageContent").html(content);
}

function _fetchEachSiteExam(publishId) {
   // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  let pageSession = JSON.parse(sessionStorage.getItem("pageSession"));
  if (pageSession == null) {
    _getPageSessionValue("reload");
  } else {
    try {
      //// call endpoint //////
      _callFetchEndPoints({
        url: `site/exams/fetch-each-exam?publishId=${publishId}&pageSession=${pageSession}&countryId=${countryId}`,
      })
        .then((response) => {
          if (response.success && response.data) {
            const data = response.data;

            const pageTitle = data.pageTitle;
            const examAbbr = data.examAbbr;
            const seoDescription = data.seoDescription;
            const pageContent = data.pageContent;
            const pageUrl = data.pageUrl;
            const pageView = data.pageView;
            const fullName = data.updatedBy.fullName;
            const updatedTime = formatExamDate(data.updatedTime);
            const regPix = data.regPix;
            const incentives = data.incentives;
            const parentPublishId = data.parentPublishId;

            let basePath = (parentPublishId && parentPublishId !== "0") ? examRelatedLinkPixPath : examPixPath;

            $("#regTitle, #regTopTitle").html(forceCountryTitle(pageTitle));
            $("#seoDescription").html(seoDescription);
            $("#pageContent").html(pageContent);
            $("#fullName").html(fullName);
            $("#pageView").html(pageView);
            $("#updatedTime").html(updatedTime);
            $("#examFetchPix").attr("src", basePath + "/" + regPix);
            $("#examTitleLink").attr("href", websiteUrl + "/" + pageUrl);

            ////// Handle Pricing //////
            if (data.pricingData && data.pricingData.amount &&  data.pricingData.currency) {
              const { amount, physicalLectureAmount, onlineLectureAmount, currency } = data.pricingData;

              $("#amount").html(currency === "USD" ? "$" + thousandSeperator(amount) : "<s>N</s>" + thousandSeperator(amount));

              $("#physicalLectureAmount").html(currency === "USD" ? "$" + thousandSeperator(physicalLectureAmount) : "<s>N</s>" + thousandSeperator(physicalLectureAmount));

              $("#onlineLectureAmount").html(currency === "USD" ? "$" + thousandSeperator(onlineLectureAmount) : "<s>N</s>" + thousandSeperator(onlineLectureAmount));

              $("#pricingContainer").css("display", "flex");
            } else {
              $("#pricingContainer").hide();
            }

            if ((!parentPublishId || parentPublishId === "0") && incentives) {
              const $temp = $("<div>").html(incentives);
              $temp.find("p").prepend("- ");
              $("#incentives").html($temp.html()).closest(".div-in").show();
            } else {
              $("#incentives").empty().closest(".div-in").hide();
            }

            let linkContent = "";
            // Only add the header if there are related links
            if (data.relatedLinksData && data.relatedLinksData.length > 0) {
                linkContent += `<h3>${examAbbr} RELATED LINKS</h3><div class="related-post-back-div pages-inner-content">`;

                for (let i = 0; i < data.relatedLinksData.length; i++) {
                    const fetched = data.relatedLinksData[i];
                    const regTitle = fetched.regTitle;
                    const pageUrl = fetched.pageUrl;

                    // Don't hide links just because you're currently on one of them
                    linkContent += `
                        <a href="${websiteUrl}/${pageUrl}" title="${forceCountryTitle(regTitle)}">
                            <span>${forceCountryTitle(regTitle)}</span>
                        </a>
                    `;
                }
                linkContent += `</div>`;
            }
            $("#fetchedRelatedLinks").html(linkContent);
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

function _fetchIndexExamData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/exams/fetch-index-exams?pageCategoryId=${
        pageCategory?.examCategory
      }&countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchIndexExamData(response.data);
        } else {
          $("#pageContent").html(`
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

function _initFetchIndexExamData(data) {
  const content = data
    .map(
      (item) => `
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
					<h3>${item.examAbbr} REGISTRATION</h3>
					<p>${item.seoDescription.substr(0, 205)}...</p>
				</div>

				<div class="bottom-div">
					<a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
					<button class="btn" title="Read More">Read More <i
						class="bi-chevron-right"></i></button></a>
				</div>
			</div>
		</div>
	</div>`
    )
    .join("");
  $("#indexPageContent").html(content);
}


function _fetchHeaderExams() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/exams/fetch-header-exams?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchHeaderExams(response.data);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFetchHeaderExams(data) {
  const content = data.map(item => {
    let relatedLinks = "";

    if (item.relatedLinksData && item.relatedLinksData.length > 0) {
      relatedLinks = `
        <ul class="inner-expand-li animated fadeIn">
          <li><a href="${websiteUrl}/exam-registration">REGISTER FOR EXAM</a></li>
          <li><a href="${websiteUrl}/${item.pageUrl}">
            WHAT IS ${item.examAbbr}
          </a></li>

          ${item.relatedLinksData.map(link => `
            <li>
              <a href="${websiteUrl}/${link.pageUrl}" title="${forceCountryTitle(link.regTitle)}">
                ${forceCountryTitle(link.regTitle)}
              </a>
            </li>
          `).join("")}
        </ul>
      `;
    }

    return `
      <li>
        <a href="${websiteUrl}/${item.pageUrl}">
          ${item.examAbbr}
        </a>
        ${relatedLinks}
      </li>
    `;
  }).join("");

  $("#fetchHeaderExams").html(content);
}





function _fetchSlideExamsData() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

  try {
    //// call endpoint //////
    _callFetchEndPoints({
      url: `site/exams/fetch-all-exams?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId || ""}`,
    })
      .then((response) => {
        if (response.success && response.data?.length > 0) {
          _initFetchSlideExamsData(response.data);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } catch (error) {
    console.error("Error:", error);
  }
}

function _initFetchSlideExamsData(data) {
  data.forEach((item) => {
    const slide = `
       <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
          <div class="each-exam-back-div">
            <div class="each-exam-div">
                <div class="div-in">
                    <div class="img-div"><img src="${examLogoPixPath}/${item.examLogo}" alt="${item.regTitle}" /></div>
                </div>
            </div>
            <div class="text-div">
              <h4>${item.examAbbr} EXAM</h4>
            </div>
          </div>
       </a>`;
    $('.exams-back-div').slick('slickAdd', slide);
  });
}


function _fetchMobileExams() {
  // Get countryId from localStorage
  const countryId = JSON.parse(localStorage.getItem("websiteCountryId"));

	try {
		//// call endpoint //////
		_callFetchEndPoints({
			 url: `site/exams/fetch-header-exams?pageCategoryId=${pageCategory?.examCategory}&countryId=${countryId || ""}`,
		})
		.then((response) => {
			if (response.success && response.data?.length > 0) {
          _initFetchMobileExams(response.data);
			} 
		 })
		.catch((error) => {
			console.error("Error:", error);
		});
	} catch (error) {
		console.error("Error:", error);
  	}
}

function _initFetchMobileExams(data) {
  const content = data.map((item, index) => {
    let relatedLinks = `
      <ul class="related-links" id="related-links-${index}">
        <li>
          <a href="${websiteUrl}/exam-registration" title="REGISTER FOR EXAMS">
            REGISTER FOR ${item.examAbbr} EXAM
          </a>
        </li>
        <li>
          <a href="${websiteUrl}/${item.pageUrl}" title="${item.regTitle}">
            WHAT IS ${item.examAbbr}
          </a>
        </li>
        ${
          item.relatedLinksData && item.relatedLinksData.length > 0 ? item.relatedLinksData
              .map(
                  (link) => `
                    <li>
                      <a href="${websiteUrl}/${link.pageUrl}" title="${forceCountryTitle(link.regTitle)}">
                        ${forceCountryTitle(link.regTitle)}
                      </a>
                    </li>
                  `
                )
                .join("")
            : ""
        }
      </ul>
    `;

    return `
      <li>
        <div class="exam-header" onclick="toggleSubLinks(${index})">
          ${item.examAbbr}
          <i class="bi-plus side-expand"></i>
        </div>
        ${relatedLinks}
      </li>
    `;
  }).join("");

  $('#exams-sub-li').html(content);
}

function toggleSubLinks(index) {
  $(`#related-links-${index}`).toggle("slow");
}