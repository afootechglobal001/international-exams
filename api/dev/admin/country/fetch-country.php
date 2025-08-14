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

    if (!empty($countryId)) {
        $countryIds = "AND countryId ='$countryId'";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT * FROM COUNTRY_VIEW WHERE (countryName LIKE '%$q%' OR email LIKE '%$q%' OR phoneNumber LIKE '%$q%') $countryIds";

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
        'message' => "COUNTRY FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {

        //// get number of branches
        $branchCountQuery = mysqli_query($conn, "SELECT COUNT(*) AS count FROM BRANCH_COUNTRY_TAB WHERE countryId='$countryId'");
        $branchCountFetch = mysqli_fetch_assoc($branchCountQuery);
        $fetchQuery['totalNumberOfBranches'] = $branchCountFetch['count']; // Assign the actual count value

        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>