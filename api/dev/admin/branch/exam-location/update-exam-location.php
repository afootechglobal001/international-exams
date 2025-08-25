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
    $locationId = $_GET['locationId'];
    $publishId=trim($data['publishId']);
    $locationName=trim(strtoupper($data['locationName']));
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($locationId, 'LOCATION ID');
    validateEmptyField($publishId, 'EXAM NAME');
    validateEmptyField($locationName, 'LOCATION NAME');
    validateEmptyField($statusId, 'STATUS');

    $locationNameQuery=mysqli_query($conn,"SELECT locationName FROM EXAM_LOCATION_TAB WHERE locationName='$locationName' AND locationId!='$locationId'") or die (mysqli_error($conn));
    $locationNameCountQuery=mysqli_num_rows($locationNameQuery);

    if ($locationNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam location with name ('$locationName') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM LOCATION UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update exam location with a name ($locationName) that is already in use.";		
        goto end;
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$publishId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        mysqli_query($conn,"UPDATE `EXAM_LOCATION_TAB` 
        SET `publishId`='$publishId', `examAbbr`='$examAbbr', `locationName`='$locationName', `statusId`='$statusId', `updatedBy`='$loginStaffId', `updatedTime`=NOW()
        WHERE `publishId`='$publishId' AND `locationId`='$locationId'")or die (mysqli_error($conn));
        
        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM LOCATION UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM LOCATION UPDATED SUCCESSFULLY:Exam location was updated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: publish ID: $publishId | Exam: $examAbbr | location ID: $locationId | location Name: $locationName.";

            // Fetch branch details ///
            $select="SELECT * FROM EXAM_LOCATION_TAB";

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
$callclass->_alertSequenceAndUpdate($conn,$loginStaffId,$loginStaffFullname,$loginRoleId,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>