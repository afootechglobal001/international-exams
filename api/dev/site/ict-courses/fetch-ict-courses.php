<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId =trim($_GET['pageCategoryId']);
    $q = $_GET['q'];
    $publishId = $_GET['publishId'];

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId'";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId, 
        a.publishId, 
        a.regTitle, 
        a.subTitle, 
        a.regPix, 
        a.statusId, 
        a.createdBy, 
        a.createdTme, 
        a.updatedTime, 
        b.pageUrl,
        b.pageContent,
        b.seoDescription
        FROM PUBLISH_TAB a
        JOIN PAGES_TAB b 
            ON a.publishId = b.publishId
        WHERE (a.regTitle LIKE '%$q%') $publishIds
        AND a.statusId= 1    
            AND a.pageCategoryId ='$pageCategoryId'
        ORDER BY a.regTitle DESC;
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
        'message' => "ICT COURSE FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>