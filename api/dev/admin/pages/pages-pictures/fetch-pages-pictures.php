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
    $publishId=$_GET['publishId'];

    $getPictures = "SELECT 
    sn, publishId, pictures 
    FROM PAGES_PICTURE_TAB 
    WHERE publishId = '$publishId'";

    $query=mysqli_query($conn,$getPictures)or die (mysqli_error($conn));
    $allRecordCount=mysqli_num_rows($query);
    if($allRecordCount==0){///start if 1
        $response['response']=200;
        $response['success']=false;
        $response['message']="No Record found";
        goto end;
    }

    $response = [
        'response'=> 200,
        'success'=> true,
        'message'=> "PICTURES FETCH SUCCESSFULLY!",
        'data' => array() // Initialize the data array
    ];
    
    while ($fetchQuery = mysqli_fetch_assoc($query)) {
        $response['data'][] = $fetchQuery;
    }

        
end:
echo json_encode($response);
?>