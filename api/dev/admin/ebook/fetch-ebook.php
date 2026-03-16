<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/staff-session-check.php';?>

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
    $examId  = $_GET['examId'] ?? '';
    $ebookId = $_GET['ebookId'] ?? '';

    if (!empty($examId)){
        $examIds = "WHERE examId='$examId'";
    }

    //////////////////declaration of variables//////////////////////////////////////
    $select = "SELECT DISTINCT (examId) AS examId FROM EXAM_EBOOK_TAB $examIds ORDER BY examAbbr ASC";
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
        'message' => "E-BOOK FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $examId=$fetchQuery['examId'];

        ///// for $examId
        $getExamQuery=mysqli_query($conn,"SELECT publishId AS examId, examLogo, regTitle AS examName, examAbbr FROM PUBLISH_TAB WHERE publishId='$examId'")or die (mysqli_error($conn));
        $getExamFetch=mysqli_fetch_assoc($getExamQuery);
        $fetchQuery['examData']=$getExamFetch;
        
        /////////////////// Fetch ebook per exam /////////
        $ebookData=array();
        if (!empty($ebookId)) {
            $ebookIds = "AND ebookId='$ebookId'";
        }
        $getEbookQuery = mysqli_query($conn, "SELECT
        a.ebookId, 
        a.ebookTitle, 
        a.regPix, 
        a.material, 
        a.ebookSize, 
        a.ebookPages, 
        a.sellingPrice,
        a.statusId,
        b.statusName
        FROM EXAM_EBOOK_TAB a
        JOIN SETUP_STATUS_TAB b ON a.statusId = b.statusId
        WHERE a.examId='$examId' $ebookIds") or die(mysqli_error($conn));

        while ($getEbookFetch = mysqli_fetch_assoc($getEbookQuery)) {
            $ebookData[] = $getEbookFetch;
        }

        // skip exams without the ebook when ebookId is passed
        if ($ebookId != '' && empty($ebookData)) {
            continue;
        }
        $fetchQuery['ebookData']= $ebookData;
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>