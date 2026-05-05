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
    $userId = $_GET['userId'];
    $countryId = $_GET['countryId'];

    validateEmptyField($countryId, 'COUNTRY ID');

    if (!empty($userId)) {
        $userIds = "AND userId ='$userId'";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT * FROM USER_VIEW WHERE (firstName LIKE '%$q%' OR emailAddress LIKE '%$q%' OR phoneNumber LIKE '%$q%') $userIds AND countryId='$countryId' ORDER BY lastName ASC";

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
        'message' => "USER FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $countryId=$fetchQuery['countryId'];

        ///// get country details /////
        $countrySelect="SELECT countryId, countryName, countryFlag, currency, accountName, accountNumber, bankName, phoneNumber, supportEmail FROM COUNTRY_TAB WHERE countryId = '$countryId'";
        $countryQuery=mysqli_query($conn,$countrySelect)or die (mysqli_error($conn));
        $countryData = mysqli_fetch_assoc($countryQuery);
        $userData['countryData'] = $countryData;

        $response['data'][] = array_merge($fetchQuery, $userData);
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>