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
    $branchId = $_GET['branchId'];
	$branchName=trim(strtoupper($data['branchName']));
    $email=trim(strtolower($data['email']));
    $phoneNumber=trim($data['phoneNumber']);
    $address =trim(strtoupper(str_replace("'", "\'", $data['address'])));
    $managerId=trim(strtoupper($data['managerId']));
    $statusId=trim($data['statusId']);

    if (!$countryId){ /// start if 1
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "COUNTRY ID REQUIRED! Provide valid country ID and try again",
        ]; 
        goto end;
    }

    if (!$branchId){ /// start if 2
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> "BRANCH ID REQUIRED! Provide valid branch ID and try again",
        ]; 
        goto end;
    }

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($branchName, 'BRANCH NAME');
    validateEmptyField($email, 'EMAIL ADDRESS');
    validateEmptyField($phoneNumber, 'MOBILE NUMBER');
    validateEmptyField($address, 'ADDRESS');
    // validateEmptyField($managerId, 'BRANCH MANAGER');
    validateEmptyField($statusId, 'STATUS');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ /// start if 4
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

    if (!preg_match('/^[0-9]{10,15}$/', $phoneNumber)){ /// start if 3
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "INVALID MOBILE NUMBER! Enter a valid mobile number and try again",
        ];
        goto end;
    }

    if (strlen($phoneNumber) != 11) {
        $response = [
            'response' => 104,
            'success' => false,
            'message' => "INVALID PHONE NUMBER! NUMBER MUST BE EXACTLY 11 DIGITS."
        ];
        goto end;
    }

    $nameQuery=mysqli_query($conn,"SELECT branchName FROM BRANCH_COUNTRY_TAB WHERE branchName='$branchName' AND branchId!='$branchId'") or die (mysqli_error($conn));
    $nameCountQuery=mysqli_num_rows($nameQuery);

    if ($nameCountQuery>0){ /// start if 5
        $response = [
            'response'=> 105,
            'success'=> false,
            'message' => "This branch with name ('$branchName') is already in use. Please try another Name."
        ];

        $alertDetail="BRANCH UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update a branch with a name ($branchName) that is already in use.";	
        goto end;
    }

    $emailQuery=mysqli_query($conn,"SELECT email FROM BRANCH_COUNTRY_TAB WHERE email='$email' AND branchId!='$branchId'") or die (mysqli_error($conn));
    $emailCountQuery=mysqli_num_rows($emailQuery);

    if ($emailCountQuery>0){ /// start if 5
        $response = [
            'response'=> 105,
            'success'=> false,
            'message' => "This branch with email ('$email') is already in use. Please try another Email Address."
        ];

        $alertDetail="BRANCH UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update a branch with an email address ($email) that is already in use.";	
        goto end;
    }

        mysqli_query($conn,"UPDATE `BRANCH_COUNTRY_TAB`
        SET `countryId`='$countryId', `branchName`='$branchName', `email`='$email', `phoneNumber`='$phoneNumber', `address`='$address', `managerId`='$managerId', `statusId`='$statusId', `updatedBy`='$loginStaffId', `updatedTime`=NOW()
        WHERE `branchId`='$branchId' AND `countryId`='$countryId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'message'=> "BRANCH UPDATED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "BRANCH UPDATED SUCCESSFULLY: A staff whose name - $loginStaffFullname (ID: $loginStaffId) successfully updated the branch with the email address ($email) - (ID: $branchId).";

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
$callclass->_alertSequenceAndUpdate($conn,$loginStaffId,$loginStaffFullname,$loginRoleId,$alertDetail,$ipAddress,$systemName);
//////////////////////////////////////////////////////////////////////////////////////////////
echo json_encode($response);
?>