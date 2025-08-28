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
    $countryId = $_GET['countryId'];
	$branchName=trim(strtoupper($data['branchName']));
    $email=trim(strtolower($data['email']));
    $phoneNumber=trim($data['phoneNumber']);
    $address =trim(strtoupper(str_replace("'", "\'", $data['address'])));
    $managerId=trim(strtoupper($data['managerId']));
    $statusId=trim($data['statusId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($countryId, 'COUNTRY ID');
    validateEmptyField($branchName, 'BRANCH NAME');
    validateEmptyField($email, 'EMAIL ADDRESS');
    validateEmptyField($phoneNumber, 'MOBILE NUMBER');
    validateEmptyField($address, 'ADDRESS');
    validateEmptyField($managerId, 'BRANCH MANAGER');
    validateEmptyField($statusId, 'STATUS');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ /// start if 2
        $response = [
            'response'=> 101,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

    if (!preg_match('/^[0-9]{10,15}$/', $phoneNumber)){ /// start if 3
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID MOBILE NUMBER! Enter a valid mobile number and try again",
        ];
        goto end;
    }

    if (strlen($phoneNumber) != 11) {
        $response = [
            'response' => 103,
            'success' => false,
            'message' => "INVALID PHONE NUMBER! NUMBER MUST BE EXACTLY 11 DIGITS."
        ];
        goto end;
    }

    $nameQuery=mysqli_query($conn,"SELECT branchName FROM BRANCH_COUNTRY_TAB WHERE branchName='$branchName'") or die (mysqli_error($conn));
    $nameCountQuery=mysqli_num_rows($nameQuery);

    if ($nameCountQuery>0){ /// start if 5
        $response = [
            'response'=> 104,
            'success'=> false,
            'message' => "This branch with name ('$branchName') is already in use. Please try another Name."
        ];

        $alertDetail="BRANCH REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a branch with a name ($branchName) that is already in use.";	
        goto end;
    }

    $emailQuery=mysqli_query($conn,"SELECT email FROM BRANCH_COUNTRY_TAB WHERE email='$email'") or die (mysqli_error($conn));
    $emailCountQuery=mysqli_num_rows($emailQuery);

    if ($emailCountQuery>0){ /// start if 5
        $response = [
            'response'=> 105,
            'success'=> false,
            'message' => "This branch with email ('$email') is already in use. Please try another Email Address."
        ];

        $alertDetail="BRANCH REGISTRATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to register a branch with an email address ($email) that is already in use.";	
        goto end;
    }

        ///////////////////////geting sequence//////////////////////////
        $countId='BRANCH';
        $sequence=$callclass->_getSequenceCount($conn, $countId);
        $array = json_decode($sequence, true);
        $no= $array[0]['no'];
        $branchId=$countId.$no.date("Ymdhis");

        mysqli_query($conn,"INSERT INTO `BRANCH_COUNTRY_TAB`
        (`countryId`, `branchId`, `branchName`, `email`, `phoneNumber`, `address`, `managerId`, `statusId`, `createdBy`, `createdTime`) VALUES
        ('$countryId', '$branchId', '$branchName', '$email', '$phoneNumber', '$address', '$managerId', '$statusId', '$loginStaffId', NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "BRANCH CREATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "BRANCH CREATED SUCCESSFULLY: A staff whose name - $loginStaffFullname (ID: $loginStaffId) successfully registered a new branch with the email address ($email) - (ID: $branchId).";

        // Fetch branch details ///
        $select="SELECT * FROM BRANCH_VIEW WHERE countryId='$countryId'";

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
$callclass->_alertSequenceAndUpdate($conn,$countryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>