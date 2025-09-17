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
    $ebookId=$_GET['ebookId'];

    if(empty($examId)){ 
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> 'E-BOOK ID REQUIRED! Check E-Book ID and try Again.'
        ];  
        goto end;
    }

    if(empty($ebookId)){ 
        $response = [
            'response'=> 101,
            'success'=> false,
            'message'=> 'E-BOOK ID REQUIRED! Check E-Book ID and try Again.'
        ];  
        goto end;
    }

    $query=mysqli_query($conn,"SELECT regPix, material FROM EXAM_EBOOK_TAB WHERE ebookId='$ebookId' AND examId='$examId'");
    $fetch=mysqli_fetch_array($query);
    $oldRegPix=$fetch['regPix'];
    $oldMaterial=$fetch['material'];

    mysqli_query($conn,"DELETE FROM `EXAM_EBOOK_TAB` WHERE ebookId='$ebookId' AND examId='$examId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'oldRegPix'=> $oldRegPix,
            'oldMaterial'=> $oldMaterial,
            'message'=> "SUCCESS! E-Book Deleted Successful!",
        ];

        /////////// get alert//////////////////////////////////
        $alertDetail = "E-BOOK DELETED SUCCESSFULLY: E-Book was deleted successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: ID: $ebookId.";

end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>