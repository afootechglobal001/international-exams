<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $countryId = $_GET['countryId'];
    $publishId = $_GET['publishId'];
    $pageSession = $_GET['pageSession'];

    if (!empty($publishId)){
        ///////////////////////geting checkPageSession//////////////////////////
        $checkPageSession=$callclass->_checkPageSession($conn, 'examCategory', $publishId, $pageSession);
        $array = json_decode($checkPageSession, true);
        $pageSessionCheck= $array[0]['pageSessionCheck'];

        if ($pageSessionCheck==1){
            mysqli_query($conn,"UPDATE `PUBLISH_TAB` SET pageView=pageView+1 WHERE publishId='$publishId'")or die (mysqli_error($conn));
        }
    }

    $select = "SELECT 
        a.pageCategoryId,
        a.parentPublishId,
        a.publishId,
        a.regTitle, 
        a.examAbbr,
        a.incentives,
        a.regPix,
        a.statusId,
        a.pageView,
        a.updatedBy,
        a.updatedTime,
        b.seoDescription,
        b.pageUrl,
        b.pageContent
    FROM PUBLISH_TAB a
    JOIN PAGES_TAB b
        ON a.publishId = b.publishId
    WHERE a.statusId = 1
      AND a.publishId = '$publishId'";


    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
    $allRecordCount=mysqli_num_rows($query);
    if($allRecordCount==0){///start if 1
        $response['response']=200;
        $response['success']=false;
        $response['message']="No Record found";
        goto end;
    }

    $response=[
        'response' => 200,
        'success' => true,
        'message' => "EXAM FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $publishId = $fetchQuery['publishId'];
        $parentPublishId = $fetchQuery['parentPublishId'];
        $updatedBy = $fetchQuery['updatedBy'];

        /////////////////// fetch Related Links per exam ////////////
        $relatedLinksData = array();
        if ($parentPublishId && $parentPublishId !== "0") {
            // fetch the related links siblings //////
            $getRelatedLinksQuery = mysqli_query($conn, 
                "SELECT a.parentPublishId, a.publishId, a.regTitle, a.examAbbr, b.pageUrl 
                FROM PUBLISH_TAB a 
                JOIN PAGES_TAB b ON a.publishId = b.publishId 
                WHERE a.parentPublishId='$parentPublishId' 
                AND a.statusId=1"
            );
        } else {
            // fetch related links for main exam //////
            $getRelatedLinksQuery = mysqli_query($conn, 
                "SELECT a.parentPublishId, a.publishId, a.regTitle, a.examAbbr, b.pageUrl 
                FROM PUBLISH_TAB a 
                JOIN PAGES_TAB b ON a.publishId = b.publishId 
                WHERE a.parentPublishId='$publishId' 
                AND a.statusId=1"
            );
        }

        while ($getRelatedLinksfetch = mysqli_fetch_assoc($getRelatedLinksQuery)) {
            $relatedLinksData[] = $getRelatedLinksfetch;
        }
        $fetchQuery['relatedLinksData'] = $relatedLinksData;

        /////////////////// for UpdatedBy /////////
        $updatedByData = array();
        $getUpdatedByQuery = mysqli_query($conn, 
            "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress 
            FROM STAFF_TAB WHERE staffId='$updatedBy'"
        );
        while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
            $updatedByData = $getUpdatedByfetch;
        }
        $fetchQuery['updatedBy'] = $updatedByData;

        // Fetch Pricing for this exam
        $pricingData = array();
        $getPricingQuery = mysqli_query($conn,
            "SELECT countryId, examId, amount, currency, physicalLectureAmount, onlineLectureAmount
            FROM BRANCH_EXAM_PRICING_TAB 
            WHERE examId = '$publishId' 
            AND countryId = '$countryId'"
        );
        while ($getPricingFetch = mysqli_fetch_assoc($getPricingQuery)) {
            $pricingData = $getPricingFetch;
        }
        $fetchQuery['pricingData'] = $pricingData;

        $response['data'] = $fetchQuery;
    }
end:
echo json_encode($response);
?>