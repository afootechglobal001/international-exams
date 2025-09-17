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
    $countryId =trim($_GET['countryId']);
    $smtpHost=trim($data['smtpHost']);
    $smtpUsername=trim($data['smtpUsername']);
    $smtpPassword=trim($data['smtpPassword']);
    $smtpPort=trim($data['smtpPort']);
    $supportEmail=trim($data['supportEmail']);

    if(!filter_var($smtpUsername, FILTER_VALIDATE_EMAIL)){
        $response = [
            'response'=> 102,
            'success'=> false,
            'message'=> "INVALID SMTP USERNAME ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

    if(!filter_var($supportEmail, FILTER_VALIDATE_EMAIL)){
        $response = [
            'response'=> 103,
            'success'=> false,
            'message'=> "INVALID SUPPORT EMAIL ADDRESS! Enter a valid email address and try again",
        ]; 
        goto end;
    }

        mysqli_query($conn,"UPDATE `COUNTRY_TAB` SET
        `smtpHost`='$smtpHost', `smtpUsername`='$smtpUsername', `smtpPassword`='$smtpPassword', `smtpPort`='$smtpPort', `supportEmail`='$supportEmail',
        `updatedTime`=NOW() WHERE countryId='$countryId'")or die (mysqli_error($conn));

        $response['response']=200; 
        $response['success']=true;
        $response['message']="BRANCH UPDATED SUCCESFFULY!"; 
        $response['data'] = array(); // Initialize the data array

        $select="SELECT * FROM COUNTRY_VIEW WHERE countryId ='$countryId'";
        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $response['data'][] = $fetchQuery;
        }
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>