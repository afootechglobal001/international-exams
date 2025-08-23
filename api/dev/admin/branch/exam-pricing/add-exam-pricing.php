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
    $publishId=trim($data['publishId']);
    $amount=trim($data['amount']);

    if (empty($countryId)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "COUNTRY ID REQUIRED! Provide valid country ID and try again",
        ]; 
        goto end;
    }

    if (empty($currency)){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "CURRENCY REQUIRED! Provide valid country and try again",
        ]; 
        goto end;
    }

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($publishId, 'EXAM NAME');
    validateEmptyField($amount, 'EXAM PRICE');

    $examNameQuery=mysqli_query($conn,"SELECT publishId FROM BRANCH_EXAM_PRICING_TAB WHERE countryId='$countryId' AND publishId='$publishId'") or die (mysqli_error($conn));
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
        $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$publishId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];

        mysqli_query($conn,"INSERT INTO `BRANCH_EXAM_PRICING_TAB`
        (`countryId`, `publishId`, `examAbbr`, `currency`, `amount`, `createdBy`, `createdTime`) VALUES
        ('$countryId', '$publishId', '$examAbbr', '$currency', '$amount', '$loginStaffId', NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "EXAM ADDED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

            $alertDetail = "EXAM ADDED SUCCESSFULLY:Exam was added successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Country: $countryId | ID: $publishId | Exam: $examAbbr.";

            // Fetch branch details ///
            $select="SELECT * FROM BRANCH_EXAM_PRICING_TAB WHERE publishId='$publishId' AND countryId='$countryId'";

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
$callclass->_alertSequenceAndUpdate($conn,$loginStaffId,$loginStaffFullname,$loginRoleId,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>