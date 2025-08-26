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
    $q = $_GET['q'];
    $locationId = $_GET['locationId'];
    $centerId = $_GET['centerId'];
    $statusId = $_GET['statusId'];

    if (!empty($centerId)) {
        $centerIds = "AND a.centerId ='$centerId'";
    }

    if (!empty($statusId)) {
        $statusIds = "AND a.statusId IN ($statusId)";
    }

    if (!empty($locationId)) {
        $locationIds = "AND a.locationId='$locationId'";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT a.*, b.locationName, c.statusName 
    FROM EXAM_CENTER_TAB a 
    JOIN EXAM_LOCATION_TAB b ON a.locationId=b.locationId
    JOIN SETUP_STATUS_TAB c ON a.statusId = c.statusId 
    WHERE (a.centerName LIKE '%$q%' OR a.centerNumber LIKE '%$q%' OR a.centerAddress LIKE '%$q%') $centerIds $statusIds $locationIds
    ORDER BY a.centerName ASC";

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
        'message' => "EXAM CENTER FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $centerId=$fetchQuery['centerId'];

        /////////////////// fetch exam date////////////
        $examDateData=array();
        $getExamDateQuery = mysqli_query($conn, "SELECT * FROM EXAM_CENTER_DATE WHERE centerId='$centerId'");
        while ($getExamDateFetch = mysqli_fetch_assoc($getExamDateQuery)) {
            $examDateData[] = $getExamDateFetch;
        }
        $fetchQuery['examDateData']= $examDateData;

        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>