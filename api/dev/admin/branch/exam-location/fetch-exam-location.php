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
    $countryId = $_GET['countryId'];
    $publishId = $_GET['publishId'];
    $locationId = $_GET['locationId'];
    $statusId = $_GET['statusId'];

    if (!empty($locationId)) {
        $locationIds = "AND a.locationId ='$locationId'";
    }

    if (!empty($statusId)) {
        $statusIds = "AND a.statusId IN ($statusId)";
    }

    if (!empty($publishId)) {
        $publishIds = "AND a.publishId ='$publishId'";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT a.*, b.statusName 
    FROM EXAM_LOCATION_TAB a 
    JOIN SETUP_STATUS_TAB b 
    ON a.statusId = b.statusId 
    WHERE (a.locationName LIKE '%$q%' OR a.examAbbr LIKE '%$q%') $publishIds $statusIds $locationIds
    AND a.countryId ='$countryId'
    ORDER BY a.locationName ASC";

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
        'message' => "EXAM LOCATION FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $locationId=$fetchQuery['locationId'];

        /////////////////// fetch exam centers per location////////////
        $centerData=array();
        $getexamCenterQuery = mysqli_query($conn, "SELECT a.*, b.statusName 
        FROM EXAM_CENTER_TAB a 
        JOIN SETUP_STATUS_TAB b 
        ON a.statusId = b.statusId 
        WHERE a.locationId='$locationId'
        ORDER BY a.centerName ASC");

        while ($getExamCenterFetch = mysqli_fetch_assoc($getexamCenterQuery)) {
            $centerId = $getExamCenterFetch['centerId'];

            /////////////////// fetch exam date per center////////////
            $examDateData = array();
            $getExamDateQuery = mysqli_query($conn, "SELECT * FROM EXAM_CENTER_DATE WHERE centerId='$centerId'");
            while ($getExamDateFetch = mysqli_fetch_assoc($getExamDateQuery)) {
                $examDateData[] = $getExamDateFetch;
            }

            $getExamCenterFetch['examDateData'] = $examDateData;
            $centerData[] = $getExamCenterFetch;
        }

        $fetchQuery['centerData']= $centerData;
        $response['data'][] = $fetchQuery;
    }
end:
echo json_encode($response);
?>