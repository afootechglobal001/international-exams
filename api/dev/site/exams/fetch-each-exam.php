<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $publishId = $_GET['publishId'];

    $select = "SELECT 
        a.pageCategoryId,
        a.publishId, 
        a.regTitle, 
        a.examAbbr,
        a.incentives,
        a.regPix, 
        a.statusId, 
        a.updatedBy,
        a.updatedTime,
        b.seoDescription,
        b.pageUrl,
        b.pageContent
        FROM PUBLISH_TAB a
        JOIN PAGES_TAB b
            ON a.publishId= b.publishId
            AND a.statusId =1
        AND a.publishId ='$publishId'  
    ";

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
        $publishId=$fetchQuery['publishId'];
        $updatedBy=$fetchQuery['updatedBy'];

        /////////////////// fetch incentives per exam ////////////
        $incentivesData=array();
        $getIncentivesQuery = mysqli_query($conn, "SELECT * FROM EXAM_INCENTIVE_TAB WHERE publishId='$publishId'");
        while ($getIncentivesfetch = mysqli_fetch_assoc($getIncentivesQuery)) {
            $incentivesData[] = $getIncentivesfetch;
        }
        $fetchQuery['incentivesData']= $incentivesData;

        /////////////////// fetch Related Links per exam ////////////
        $relatedLinksData=array();
        $getRelatedLinksQuery = mysqli_query($conn, "SELECT a.parentPublishId, a.publishId, a.regTitle, b.pageUrl FROM PUBLISH_TAB a JOIN PAGES_TAB b ON a.publishId= b.publishId WHERE a.parentPublishId='$publishId'");
        while ($getRelatedLinksfetch = mysqli_fetch_assoc($getRelatedLinksQuery)) {
            $relatedLinksData[] = $getRelatedLinksfetch;
        }
        $fetchQuery['relatedLinksData']= $relatedLinksData;

        /////////////////// for  CreatedBy /////////
        $createdByData=array();
        $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
        while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
            $createdByData = $getCreatedByfetch;
        }
        $fetchQuery['createdBy']= $createdByData;

        $response['data']= $fetchQuery;
    }
end:
echo json_encode($response);
?>