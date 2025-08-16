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
    $staffId = $_GET['staffId'];
    $statusId = $_GET['statusId'];

    if (!empty($staffId)) {
        $staffIds = "AND staffId ='$staffId'";
    }else{
       $staffIds = "AND roleId < '$loginRoleId'";
    }
    if (!empty($statusId)) {
        $statusIds = "AND statusId IN ($statusId)";
    }

    // Securely escape $q
    $q = mysqli_real_escape_string($conn, $q);
    $select = "SELECT * FROM STAFF_VIEW WHERE (firstName LIKE '%$q%' OR lastName LIKE '%$q%' OR phoneNumber LIKE '%$q%' OR address LIKE '%$q%') $staffIds $statusIds ORDER BY firstName ASC";

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
        'message' => "STAFF FETCH SUCCESFFULY!",
        'allRecordCount' => $allRecordCount,
        'data' => array() // Initialize the data array
    ];

    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $titleId=$fetchQuery['titleId'];
        $firstName=$fetchQuery['firstName'];
        $lastName=$fetchQuery['lastName'];
        $fullName="$titleId $firstName $lastName";
        $fetchQuery['fullName']=$fullName;
        $createdBy=$fetchQuery['createdBy'];
        $updatedBy=$fetchQuery['updatedBy'];
      
        /////////////////// for  CreatedBy /////////
        $createdByData=array();
        $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$createdBy'");
        while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
            $createdByData[] = $getCreatedByfetch;
        }
        $fetchQuery['createdBy']= $createdByData;

        /////////////////// for  UpdatedBy /////////
        $updatedByData=array();
        $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
        while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
            $updatedByData[] = $getUpdatedByfetch;
        }
        $fetchQuery['updatedBy']= $updatedByData;

        $response['data'][] = $fetchQuery;
    }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>