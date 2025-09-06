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
    $currency=trim($_GET['currency']);
    $examId=trim($data['examId']);
    $amount=trim($data['amount']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($countryId, 'COUNTRY ID');
    validateEmptyField($currency, 'CURRENCY');
    validateEmptyField($examId, 'EXAM');
    validateEmptyField($amount, 'EXAM PRICE');

    $examNameQuery=mysqli_query($conn,"SELECT examId FROM BRANCH_EXAM_PRICING_TAB WHERE countryId='$countryId' AND examId='$examId'") or die (mysqli_error($conn));
    $examNameCountQuery=mysqli_num_rows($examNameQuery);

    if ($examNameCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This exam already in use. Please choose another Exam."
        ];

        $alertDetail="ADD EXAM ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to add new exam name that is already in use.";	
        goto end;
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$examId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        mysqli_query($conn,"INSERT INTO `BRANCH_EXAM_PRICING_TAB`
        (`countryId`, `examId`, `examAbbr`, `currency`, `amount`, `createdBy`, `createdTime`) VALUES
        ('$countryId', '$examId', '$examAbbr', '$currency', '$amount', '$loginStaffId', NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM ADDED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM ADDED SUCCESSFULLY:Exam was added successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Country: $countryId | ID: $examId | Exam: $examAbbr.";

            // Fetch branch details ///
            $select="SELECT * FROM BRANCH_EXAM_PRICING_TAB WHERE examId='$examId' AND countryId='$countryId'";

            $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
            while ($fetchQuery = mysqli_fetch_assoc($query)) {
                $createdBy=$fetchQuery['createdBy'];
                $updatedBy=$fetchQuery['updatedBy'];
               
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