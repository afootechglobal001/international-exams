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
    $parentPublishId = trim($_GET['parentPublishId']);
    $publishId = trim($_GET['publishId']);
    $statusId = $_GET['statusId'];
    $q = $_GET['q'];

    if (empty($pageCategoryId)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "PAGE CATEGORY ID REQUIRED! Provide valid category ID and try again",
        ]; 
        goto end;
    }

    if (empty($parentPublishId)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "PUBLISH ID REQUIRED! Provide valid publish ID and try again",
        ]; 
        goto end;
    }

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId'";
    }

    if (!empty($statusId)) {
        $statusIds = "AND a.statusId IN ($statusId)";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId, 
        a.publishId,
        a.regTitle, 
        a.regPix, 
        a.statusId, 
        a.createdBy, 
        a.createdTme, 
        a.updatedTime, 
        b.statusName
        FROM PUBLISH_TAB a
        JOIN SETUP_STATUS_TAB b 
            ON a.statusId = b.statusId
        WHERE (a.regTitle LIKE '%$q%') $publishIds $statusIds
            AND a.pageCategoryId ='$pageCategoryId'
            AND a.parentPublishId ='$parentPublishId'
        ORDER BY a.regTitle ASC;
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
        'message' => "EXAM RELATED LINK FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }

end:
echo json_encode($response);
?>