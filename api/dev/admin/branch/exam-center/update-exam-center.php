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
    $centreId = $_GET['centreId'];
    $centreName=trim(strtoupper($data['centreName']));
    $centreNumber=trim(strtoupper($data['centreNumber']));
    $centreAddress=trim(strtoupper($data['centreAddress']));
    $dateSegment = $data['dateSegment'];
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($locationId, 'LOCATION ID');
    validateEmptyField($centreId, 'CENTRE ID');
    validateEmptyField($centreName, 'CENTRE NAME');
    validateEmptyField($centreNumber, 'CENTRE NUMBER');
    validateEmptyField($centreAddress, 'CENTRE ADDRESS');
    validateEmptyField($statusId, 'STATUS');

    if (count($dateSegment)==0) {
        $response = [
            'response' => 101,
            'success' => false,
            'message' => 'DATE SEGMENT REQUIRED! Check field and try again.'
        ];
        goto end;
    }

    $centreNameQuery=mysqli_query($conn,"SELECT centreName FROM EXAM_CENTRE_TAB WHERE centreName='$centreName' AND centreId!='$centreId'") or die (mysqli_error($conn));
    $centreNameCountQuery=mysqli_num_rows($centreNameQuery);

    if ($centreNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam center with name ('$centreName') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM CENTER UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update exam center with a name ($centreName) that is already in use.";		
        goto end;
    }

        mysqli_query($conn,"UPDATE `EXAM_CENTRE_TAB` 
        SET `centreName`='$centreName', `centreNumber`='$centreNumber', `centreAddress`='$centreAddress', `statusId`='$statusId', `updatedBy`='$loginStaffId', `updatedTime`=NOW()
        WHERE `centreId`='$centreId' AND `locationId`='$locationId'")or die (mysqli_error($conn));

        /// delete existing records from exam date tab
        mysqli_query($conn,"DELETE FROM `EXAM_CENTRE_DATE` WHERE centreId='$centreId'")or die (mysqli_error($conn));

        ///////////////////////Insert into EXAM_CENTRE_DATE//////////////////////////
        foreach ($dateSegment as $date) {
            $examDate = trim($date['examDate']);

            mysqli_query($conn,"INSERT INTO `EXAM_CENTRE_DATE`
            (`centreId`, `examDate`) VALUES
            ('$centreId', '$examDate')") or die (mysqli_error($conn));
        }


        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM CENTRE UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM CENTRE UPDATED SUCCESSFULLY:Exam centre was updated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: centre Number: $centreNumber | centreId ID: $centreId | centre Name: $centreName.";

            // Fetch branch details ///
            $select="SELECT * FROM EXAM_CENTRE_TAB";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $updatedBy=$fetchQuery['updatedBy'];
                $centreId=$fetchQuery['centreId'];

                /////////////////// fetch exam date////////////
                $examDateData=array();
                $getExamDateQuery = mysqli_query($conn, "SELECT * FROM EXAM_CENTRE_DATE WHERE centreId='$centreId'");
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
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>