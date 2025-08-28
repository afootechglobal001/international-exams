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
    $centerName=trim(strtoupper($data['centerName']));
    $centerNumber=trim(strtoupper($data['centerNumber']));
    $centerAddress=trim(strtoupper($data['centerAddress']));
    $dateSegment = $data['dateSegment'];
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($locationId, 'LOCATION ID');
    validateEmptyField($centerName, 'CENTER NAME');
    validateEmptyField($centerNumber, 'CENTER NUMBER');
    validateEmptyField($centerAddress, 'CENTER ADDRESS');
    validateEmptyField($statusId, 'STATUS');

    if (count($dateSegment)==0) {
        $response = [
            'response' => 101,
            'success' => false,
            'message' => 'DATE SEGMENT REQUIRED! Check field and try again.'
        ];
        goto end;
    }

    $centerNameQuery=mysqli_query($conn,"SELECT centerName FROM EXAM_CENTER_TAB WHERE centerName='$centerName'") or die (mysqli_error($conn));
    $centerNameCountQuery=mysqli_num_rows($centerNameQuery);

    if ($centerNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 102,
            'success'=> false,
            'message' => "This exam center with name ('$centerName') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM CENTER REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new exam center with a name ($centerName) that is already in use.";		
        goto end;
    }

        ///////////////////////geting sequence//////////////////////////
        $countId='CENTER';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $centerId=$countId.$no.date("Ymdhis");

        mysqli_query($conn,"INSERT INTO `EXAM_CENTER_TAB`
        (`locationId`, `centerId`, `centerName`, `centerNumber`, `centerAddress`, `statusId`, `createdBy`, `createdTime`, `updatedTime`) VALUES
        ('$locationId', '$centerId', '$centerName', '$centerNumber', '$centerAddress', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

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
            'message'=> "EXAM CENTER CREATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM CENTER CREATED SUCCESSFULLY:Exam center was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Location ID: $locationId | center ID: $centerId | center Name: $centerName.";

            // Fetch branch details ///
            $select="SELECT * FROM EXAM_CENTER_TAB";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $createdBy=$fetchQuery['createdBy'];
                $centerId=$fetchQuery['centerId'];

                /////////////////// fetch exam date////////////
                $examDateData=array();
                $getExamDateQuery = mysqli_query($conn, "SELECT * FROM EXAM_CENTER_DATE WHERE centerId='$centerId'");
                while ($getExamDateFetch = mysqli_fetch_assoc($getExamDateQuery)) {
                    $examDateData[] = $getExamDateFetch;
                }
                $fetchQuery['examDateData']= $examDateData;
               
                /////////////////// for  CreatedBy /////////
                $createdByData=array();
                $getCreatedByQuery = mysqli_query($conn, "SELECT CONCAT(titleId, ' ', firstName, ' ', lastName) AS fullName, emailAddress FROM STAFF_TAB WHERE staffId='$createdBy'");
                while ($getCreatedByfetch = mysqli_fetch_assoc($getCreatedByQuery)) {
                    $createdByData[] = $getCreatedByfetch;
                }
                $fetchQuery['createdBy']= $createdByData;

                $response['data'][] = $fetchQuery;
            }
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$countryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>