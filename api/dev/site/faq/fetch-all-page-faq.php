<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
    //////////////////declaration of variables//////////////////////////////////////
    $pageCategoryId =trim($_GET['pageCategoryId']);
    $publishId = $_GET['publishId'];
    $faqCatId = $_GET['faqCatId'];
    $q = $_GET['q'];

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId' ";
    }

    if (!empty($faqCatId)) {
        $faqCatIds = "AND a.faqCatId ='$faqCatId' ";
    }
    
    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId, 
        a.publishId, 
        a.faqCatId, 
        a.faqQuestion,
        a.faqAnswer,
        a.statusId, 
        a.createdBy, 
        a.createdTme, 
        a.updatedTime, 
        b.catName AS faqCatName
        FROM PUBLISH_TAB a
        JOIN SETUP_CATEGORIES_TAB b
            ON a.faqCatId = b.catId
        WHERE (a.faqQuestion LIKE '%$q%' OR b.catName LIKE '%$q%' OR a.faqAnswer LIKE '%$q%') $publishIds $faqCatIds
        AND a.statusId= 1    
            AND a.pageCategoryId ='$pageCategoryId'
        ORDER BY a.createdTme DESC;
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
        'message' => "FAQ FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }

end:
echo json_encode($response);
?>