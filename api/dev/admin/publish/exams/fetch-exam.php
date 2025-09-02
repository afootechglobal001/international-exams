<?php require_once '../../../config/connection.php';?>
<?php require_once '../../../config/staff-session-check.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
    if(!$checkSession){
        $response=[
            'response' => 99,
            'success' => false,
            'message' => "SESSION EXPIRED! Please LogIn Again.",
        ];
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId =trim($_GET['pageCategoryId']);
    $q = $_GET['q'];
    $publishId = $_GET['publishId'];
    $statusId = $_GET['statusId'];

    if (empty($pageCategoryId)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "PAGE CATEGORY ID REQUIRED! Provide valid category ID and try again",
        ]; 
        goto end;
    }

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId' ";
    }

    if (!empty($statusId)) {
        $statusIds = "AND a.statusId IN ($statusId)";
    }


    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId,
        a.parentPublishId,
        a.publishId, 
        a.regTitle, 
        a.examAbbr, 
        a.regPix,
        a.examLogo,
        a.statusId, 
        a.createdBy, 
        a.createdTme, 
        a.updatedTime, 
        b.statusName
        FROM PUBLISH_TAB a
        JOIN SETUP_STATUS_TAB b 
            ON a.statusId = b.statusId
        WHERE (a.regTitle LIKE '%$q%' OR a.examAbbr LIKE '%$q%') $publishIds $statusIds
            AND a.pageCategoryId ='$pageCategoryId'
            AND (a.parentPublishId IS NULL OR a.parentPublishId = '')
        ORDER BY a.examAbbr ASC;
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

        /////////////////// fetch incentives per exam ////////////
        $incentivesData=array();
        $getIncentivesQuery = mysqli_query($conn, "SELECT * FROM EXAM_INCENTIVE_TAB WHERE publishId='$publishId'");
        while ($getIncentivesfetch = mysqli_fetch_assoc($getIncentivesQuery)) {
            $incentivesData[] = $getIncentivesfetch;
        }
        $fetchQuery['incentivesData']= $incentivesData;

        //// get number of related exam links
        $examLinkCountQuery = mysqli_query($conn, "SELECT COUNT(*) AS count FROM PUBLISH_TAB WHERE parentPublishId='$publishId'");
        $examLinkCountFetch = mysqli_fetch_assoc($examLinkCountQuery);
        $fetchQuery['totalNumberOfRelatedLinks'] = $examLinkCountFetch['count']; // Assign the actual count value

        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>