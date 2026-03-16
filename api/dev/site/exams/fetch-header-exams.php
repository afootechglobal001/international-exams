<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId = $_GET['pageCategoryId'];
    $countryId = $_GET['countryId'];

    $select = "SELECT 
        a.pageCategoryId,
        a.publishId,
        a.regTitle, 
        a.examAbbr,
        b.examId,
        c.pageUrl
        FROM PUBLISH_TAB a
        JOIN BRANCH_EXAM_PRICING_TAB b ON a.publishId = b.examId
        JOIN PAGES_TAB c ON a.publishId = c.publishId
            AND b.countryId ='$countryId'
        AND a.pageCategoryId ='$pageCategoryId'
        AND a.statusId =1  
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
        $publishId = $fetchQuery['publishId'];

        $relatedLinksData = [];
        // fetch related links for main exam //////
        $getRelatedLinksQuery = mysqli_query($conn, 
            "SELECT a.parentPublishId, a.publishId, a.regTitle, a.examAbbr, b.pageUrl 
            FROM PUBLISH_TAB a 
            JOIN PAGES_TAB b ON a.publishId = b.publishId 
            WHERE a.parentPublishId='$publishId' 
            AND a.statusId=1"
        );

        while ($getRelatedLinksfetch = mysqli_fetch_assoc($getRelatedLinksQuery)) {
            $relatedLinksData[] = $getRelatedLinksfetch;
        }
        $fetchQuery['relatedLinksData'] = $relatedLinksData;

        $response['data'][]= $fetchQuery;
    }
end:
echo json_encode($response);
?>