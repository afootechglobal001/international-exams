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
                    
    $loginUserId = $_GET['userId'];
    $response = [
        'response'=> 200,
        'success'=> true,
        'message'=> "LOGIN SUCCESSFUL!",
        'data' => array() // Initialize the data array
    ];
    require_once '../../../user/auth/loginUserDetails.php';
    $response['data'] = $userData;

                
//////////////////////////////////////////////////////////////////////////////////////////////
end:
echo json_encode($response);
?>