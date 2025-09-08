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
    $blogCatId = $_GET['blogCatId'];
    $q = $_GET['q'];

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId' ";
    }

    if (!empty($blogCatId)) {
        $blogCatIds = "AND a.blogCatId ='$blogCatId' ";
    }
    
    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId, 
        a.publishId, 
        a.regTitle, 
        a.blogCatId, 
        a.regPix, 
        a.statusId, 
        a.createdBy,
        a.updatedBy, 
        a.createdTme, 
        a.updatedTime, 
        b.pageUrl,
        b.pageContent,
        b.seoDescription,
        c.catName AS blogCatName
        FROM PUBLISH_TAB a
        JOIN PAGES_TAB b 
            ON a.publishId = b.publishId
        JOIN SETUP_CATEGORIES_TAB c
            ON a.blogCatId = c.catId
        WHERE (a.regTitle LIKE '%$q%' OR c.catName LIKE '%$q%') $publishIds $blogCatIds
        AND a.statusId= 1    
            AND a.pageCategoryId ='$pageCategoryId'
        ORDER BY a.createdTme DESC LIMIT 2;
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
        'message' => "BLOG FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $updatedBy=$fetchQuery['updatedBy'];

        /////////////////// for  UpdatedBy /////////
        $updatedByData=array();
        $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
        while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
            $updatedByData = $getUpdatedByfetch;
        }
        $fetchQuery['updatedBy']= $updatedByData;


        $response['data'][] = $fetchQuery;
    }

end:
echo json_encode($response);
?>