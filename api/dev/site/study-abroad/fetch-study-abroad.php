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
    $pageSession = $_GET['pageSession'];
    $q = $_GET['q'];

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId' ";
        ///////////////////////geting checkPageSession//////////////////////////
		$checkPageSession=$callclass->_checkPageSession($conn, 'studyAbroadCategory', $publishId, $pageSession);
		$array = json_decode($checkPageSession, true);
		$pageSessionCheck= $array[0]['pageSessionCheck'];

		if ($pageSessionCheck==1){
			mysqli_query($conn,"UPDATE `PUBLISH_TAB` SET pageView=pageView+1 WHERE publishId='$publishId'")or die (mysqli_error($conn));
		}
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT 
        a.pageCategoryId, 
        a.publishId, 
        a.regTitle, 
        a.regPix,
        a.studyAbroadSummary,
        a.statusId, 
        a.pageView,
        a.createdBy,
        a.updatedBy, 
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
        ORDER BY a.updatedTime DESC;
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
        'message' => "STUDY ABROAD FETCH SUCCESFFULY!",
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