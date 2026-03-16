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
    $testimonyId=trim($_GET['testimonyId']);
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($statusId, 'STATUS');

        mysqli_query($conn,"UPDATE `TESTIMONY_TAB` SET
        `statusId`='$statusId', `updatedBy`='$loginStaffId', `updatedTime`=NOW() WHERE testimonyId='$testimonyId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "TESTIMONY UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail="TESTIMONY UPDATE ATTEMPT SUCCESS: A staff whose name - $loginStaffFullname (ID: $loginStaffId) successfully updated a testimony (ID: $testimonyId).";

        // Fetch staff details
        $select="SELECT a.*, b.statusName
        FROM TESTIMONY_TAB a
        JOIN SETUP_STATUS_TAB b ON a.statusId=b.statusId
        WHERE testimonyId='$testimonyId' ORDER BY a.updatedTime DESC";

        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $updatedBy=$fetchQuery['updatedBy'];

            /////////////////// for  UpdatedBy /////////
            $updatedByData=array();
            $getUpdatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$updatedBy'");
            while ($getUpdatedByfetch = mysqli_fetch_assoc($getUpdatedByQuery)) {
                $updatedByData[] = $getUpdatedByfetch;
            }
            $fetchQuery['updatedBy']= $updatedByData;

            $response['data'][] = $fetchQuery;
        }
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>