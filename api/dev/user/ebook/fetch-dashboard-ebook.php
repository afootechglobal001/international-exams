<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/user-session-check.php';?>

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
    $select = "SELECT DISTINCT examId, examAbbr FROM EXAM_EBOOK_TAB ORDER BY RAND() LIMIT 1";

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

        /////////////////// Fetch ebook per exam /////////
        $ebookData=array();
        $getEbookQuery = mysqli_query($conn, "SELECT
        a.*,
        b.statusName,
        c.examLogo
        FROM EXAM_EBOOK_TAB a
        JOIN SETUP_STATUS_TAB b
        ON a.statusId=b.statusId
        JOIN PUBLISH_TAB c
        ON a.examId=c.publishId
        WHERE a.examId='$examId'
        LIMIT 5") or die(mysqli_error($conn));
        while ($getEbookFetch = mysqli_fetch_assoc($getEbookQuery)) {
            $ebookData[] = $getEbookFetch;
        }
        $fetchQuery['ebookData']= $ebookData;
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>