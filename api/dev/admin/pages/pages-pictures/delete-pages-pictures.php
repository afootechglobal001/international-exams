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
        
    $publishId=$_GET['publishId'];
    $sn=$_GET['sn'];

    $query=mysqli_query($conn,"SELECT pictures FROM PAGES_PICTURE_TAB WHERE sn='$sn' AND publishId='$publishId'");
    $fetch=mysqli_fetch_array($query);
    $pictures=$fetch['pictures'];

    mysqli_query($conn,"DELETE FROM `PAGES_PICTURE_TAB` WHERE sn='$sn' AND publishId='$publishId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'oldPagePictures'=> $pictures,
            'message'=> "SUCCESS! Picture Deleted Successful!",
        ];

        /////////// get alert//////////////////////////////////
        $alertDetail = "PAGE PICTURE DELETED SUCCESSFULLY: Pictures was deleted successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: ID: $publishId.";

end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>