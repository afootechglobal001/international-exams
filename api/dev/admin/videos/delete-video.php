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
        
    $examId=$_GET['examId'];
    $videoId=$_GET['videoId'];

    if(empty($examId)){ 
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> 'E-BOOK ID REQUIRED! Check E-Book ID and try Again.'
        ];  
        goto end;
    }

    if(empty($videoId)){ 
        $response = [
            'response'=> 101,
            'success'=> false,
            'message'=> 'VIDEO ID REQUIRED! Check video ID and try Again.'
        ];  
        goto end;
    }

    $query=mysqli_query($conn,"SELECT regPix, video FROM EXAM_VIDEO_TAB WHERE videoId='$videoId' AND examId='$examId'");
    $fetch=mysqli_fetch_array($query);
    $oldRegPix=$fetch['regPix'];
    $oldVideo=$fetch['video'];

    mysqli_query($conn,"DELETE FROM `EXAM_VIDEO_TAB` WHERE videoId='$videoId' AND examId='$examId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'oldRegPix'=> $oldRegPix,
            'oldVideo'=> $oldVideo,
            'message'=> "SUCCESS! Video Deleted Successful!",
        ];

        /////////// get alert//////////////////////////////////
        $alertDetail = "VIDEO DELETED SUCCESSFULLY: Video was deleted successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: ID: $videoId.";

end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>