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
    $centerId = $_GET['centerId'];
    $centerName=trim(strtoupper($data['centerName']));
    $centerNumber=trim(strtoupper($data['centerNumber']));
    $centerAddress=trim(strtoupper($data['centerAddress']));
    $dateSegment = $data['dateSegment'];
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($locationId, 'LOCATION ID');
    validateEmptyField($centerId, 'CENETR ID');
    validateEmptyField($centerName, 'CENTER NAME');
    validateEmptyField($centerNumber, 'CENTER NUMBER');
    validateEmptyField($centerAddress, 'CENTER ADDRESS');
    validateEmptyField($statusId, 'STATUS');

    $centerNameQuery=mysqli_query($conn,"SELECT centerName FROM EXAM_CENTER_TAB WHERE centerName='$centerName' AND centerId!='$centerId'") or die (mysqli_error($conn));
    $centerNameCountQuery=mysqli_num_rows($centerNameQuery);

    if ($centerNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam center with name ('$centerName') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM CENTER UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update exam center with a name ($centerName) that is already in use.";		
        goto end;
    }

        mysqli_query($conn,"UPDATE `EXAM_CENTER_TAB` 
        SET `centerName`='$centerName', `centerNumber`='$centerNumber', `centerAddress`='$centerAddress', `statusId`='$statusId', `updatedBy`='$loginStaffId', `updatedTime`=NOW()
        WHERE `centerId`='$centerId' AND `locationId`='$locationId'")or die (mysqli_error($conn));
        
        /// delete existing records from exam date tab
        mysqli_query($conn,"DELETE FROM `EXAM_CENTER_DATE` WHERE centerId='$centerId'")or die (mysqli_error($conn));

        ///////////////////////Insert into EXAM_CENTER_DATE//////////////////////////
        foreach ($dateSegment as $date) {
            $examDate = trim($date['examDate']);

            mysqli_query($conn,"INSERT INTO `EXAM_CENTER_DATE`
            (`centerId`, `examDate`) VALUES
            ('$centerId', '$examDate')") or die (mysqli_error($conn));
        }


        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM CENTER UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM CENTER UPDATED SUCCESSFULLY:Exam center was updated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: center Number: $centerNumber | center ID: $centerId | center Name: $centerName.";

            // Fetch branch details ///
            $select="SELECT * FROM EXAM_CENTER_TAB";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $updatedBy=$fetchQuery['updatedBy'];
                $centerId=$fetchQuery['centerId'];

                /////////////////// fetch exam date////////////
                $examDateData=array();
                $getExamDateQuery = mysqli_query($conn, "SELECT * FROM EXAM_CENTER_DATE WHERE centerId='$centerId'");
                while ($getExamDateFetch = mysqli_fetch_assoc($getExamDateQuery)) {
                    $examDateData[] = $getExamDateFetch;
                }
                $fetchQuery['examDateData']= $examDateData;
               
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