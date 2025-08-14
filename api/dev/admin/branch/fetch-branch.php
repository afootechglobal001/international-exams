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
    //////////////////declaration of variables//////////////////////////////////////
    $q = $_GET['q'];
    $countryId = $_GET['countryId'];
    $branchId = $_GET['branchId'];
    $statusId = $_GET['statusId'];

    if (!$countryId){ /// start if 1
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "COUNTRY ID REQUIRED! Provide valid country ID and try again",
        ]; 
        goto end;
    }

    if (!empty($branchId)) {
        $branchIds = "AND branchId ='$branchId'";
    }

    if (!empty($statusId)) {
        $statusIds = "AND statusId IN ($statusId)";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT * FROM BRANCH_VIEW WHERE countryId='$countryId' AND (branchName LIKE '%$q%' OR email LIKE '%$q%' OR phoneNumber LIKE '%$q%') $branchIds $statusIds ORDER BY branchName ASC";

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
        'message' => "BRANCH FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {

        //// get number of staff
        $staffCountQuery = mysqli_query($conn, "SELECT COUNT(*) AS count FROM STAFF_TAB WHERE branchId='$branchId'");
        $staffCountFetch = mysqli_fetch_assoc($staffCountQuery);
        $fetchQuery['totalNumberOfStaff'] = $staffCountFetch['count']; // Assign the actual count value

        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>