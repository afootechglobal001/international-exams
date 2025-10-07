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
    $examId =trim($_POST['examId']);
    $videoCatId =trim($_POST['videoCatId']);
    $regPix=$_FILES['regPix']['name'];
    $video=$_FILES['video']['name'];
    $statusId=trim($_POST['statusId']);
   
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($examId, 'EXAM');
    validateEmptyField($videoCatId, 'VIDEO CATEGORY');
    validateEmptyField($regPix, 'PICTURE');
    validateEmptyField($video, 'VIDEO');
    validateEmptyField($statusId, 'STATUS');

    //////////////////get exam abbreviation //////////////////////////////////////
    $examQuery=mysqli_query($conn,"SELECT examAbbr FROM PUBLISH_TAB WHERE publishId='$examId'")or die (mysqli_error($conn));
    $fetchExamQuery=mysqli_fetch_array($examQuery);
    $examAbbr=$fetchExamQuery['examAbbr'];

    //////////////////get exam abbreviation //////////////////////////////////////
    $videoCatQuery=mysqli_query($conn,"SELECT videoCatName FROM SETUP_VIDEO_CATEGORY_TAB WHERE videoCatId='$videoCatId'")or die (mysqli_error($conn));
    $fetchVideoQuery=mysqli_fetch_array($videoCatQuery);
    $videoCatName=$fetchVideoQuery['videoCatName'];

    ///////////////////////geting sequence//////////////////////////
    $countId='VIDEO';
    $sequence=$callclass->_getSequenceCount($conn, $countId);
    $array = json_decode($sequence, true);
    $no= $array[0]['no'];
    $videoId=$countId.$no.date("Ymdhis");

    ///////////////////////getting image extention//////////////////////////
    $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
    $extension = pathinfo($_FILES['regPix']['name'], PATHINFO_EXTENSION);
    
    if (!in_array(($extension), $allowedExts)) {
        $response = [
            'response' => 103,
            'success' => false,
            'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
        ];  
        goto end;
    }

    ///////////////////////getting material extention//////////////////////////
    $allowedExts = array("MP4", "mp4", "MOV", "mov", "AVI", "avi","WMV","wmv","AVCHD","avchd","WebM","FLV","flv");
    $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

    if (!in_array(($extension), $allowedExts)) {
        $response = [
            'response' => 103,
            'success' => false,
            'message' => 'INVALID VIDEO FORMAT! Check the video format and try again.'
        ];  
        goto end;
    }

        $datetime = date("Ymdhi");
            // Add unique ID for ebook picture ////
        $regPix = $videoId . '_' . $datetime . '_' . $regPix;

        // Add unique ID for material ////
        $video = $videoId . '_' . $datetime . '_' . $video;

        mysqli_query($conn,"INSERT INTO `EXAM_VIDEO_TAB`
        (`examId`, `examAbbr`, `videoId`, `videoCatId`, `regPix`, `video`, `statusId`, `createdBy`, `createdTime`, `updatedTime`) VALUES
        ('$examId', '$examAbbr', '$videoId', '$videoCatId', '$regPix', '$video', '$statusId', '$loginStaffId', NOW(), NOW())")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'regPix' => $regPix,
            'video' => $video,
            'message'=> "VIDEO UPLOADED SUCCESFFULLY!",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "VIDEO UPLOADED SUCCESSFULLY: Video was uploaded successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Video Category Name: $videoCatName | Exam: $examAbbr | Exam Id: $examId | ID: $videoId.";

        // Fetch ebook details ///
        $select="SELECT 
        a.*,
        b.statusName,
        c.videoCatName
        FROM EXAM_VIDEO_TAB a
        JOIN SETUP_STATUS_TAB b
        ON a.statusId=b.statusId
        JOIN SETUP_VIDEO_CATEGORY_TAB c
        ON a.videoCatId=c.videoCatId
        JOIN PUBLISH_TAB d
        ON a.examId=d.publishId";

        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $createdBy=$fetchQuery['createdBy'];

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