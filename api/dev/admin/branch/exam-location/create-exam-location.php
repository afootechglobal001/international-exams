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
    $countryId =trim($_GET['countryId']);
    $publishId=trim($data['publishId']);
    $locationName=trim(strtoupper($data['locationName']));
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($countryId, 'COUNTRY ID');
    validateEmptyField($publishId, 'EXAM NAME');
    validateEmptyField($locationName, 'LOCATION NAME');
    validateEmptyField($statusId, 'STATUS');

    $locationNameQuery=mysqli_query($conn,"SELECT locationName FROM EXAM_LOCATION_TAB WHERE locationName='$locationName'") or die (mysqli_error($conn));
    $locationNameCountQuery=mysqli_num_rows($locationNameQuery);

    if ($locationNameCountQuery>0){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam location with name ('$locationName') is already in use. Please try another Name."
        ];

        $alertDetail="EXAM LOCATION REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a new exam location with a name ($locationName) that is already in use.";		
        goto end;
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$publishId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        ///////////////////////geting sequence//////////////////////////
        $countId='LOCATION';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $locationId=$countId.$no.date("Ymdhis");

        mysqli_query($conn,"INSERT INTO `EXAM_LOCATION_TAB`
        (`countryId`, `publishId`, `examAbbr`, `locationId`, `locationName`, `statusId`, `createdBy`, `createdTime`, `updatedTime`) VALUES
        ('$countryId', '$publishId', '$examAbbr', '$locationId', '$locationName', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM LOCATION CREATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM LOCATION CREATED SUCCESSFULLY:Exam location was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: publish ID: $publishId | Exam: $examAbbr | location ID: $locationId | location Name: $locationName.";

            // Fetch branch details ///
            $select="SELECT * FROM EXAM_LOCATION_TAB WHERE countryId ='$countryId'";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $createdBy=$fetchQuery['createdBy'];
               
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
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>