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
    $picturesCount =  $_FILES["pictures"]["name"] ? count($_FILES["pictures"]["name"]) : 0;

    if(empty($publishId)){ 
        $response = [
            'response'=> 100,
            'success'=> false,
            'message'=> 'PUBLISH ID REQUIRED! Check Publish ID and try Again.'
        ];  
        goto end;
    }

    if($picturesCount==0){
        $response = [
            'response'=> 101,
            'success'=> false,
            'message'=> "PICTURES REQUIRED! Check the fields and try again",
        ]; 
        goto end;
    }

    if(isset($_FILES["pictures"]["name"])){
        $totalFiles = count($_FILES["pictures"]["name"]);
        $uploadedFiles = array();

        for ($i = 0; $i < $totalFiles; $i++){
            $imageName = $_FILES["pictures"]["name"][$i];
            $tmpName = $_FILES["pictures"]["tmp_name"][$i];

            $imageExtension = explode('.', $imageName);

            $name = $imageExtension[0];
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = $publishId . "-" . $i . uniqid() . "." . $imageExtension;
            $uploadedFiles[] = $newImageName; // push into array

            mysqli_query($conn,"INSERT INTO `PAGES_PICTURE_TAB` 
            (`publishId`, `pictures`, `createdBy`) VALUES 
            ('$publishId', '$newImageName', '$loginStaffId')")or die (mysqli_error($conn));
        }
    }

        //////////////////get exam abbreviation //////////////////////////////////////
        $examQuery=mysqli_query($conn,"SELECT regTitle, examAbbr FROM PUBLISH_TAB WHERE publishId='$publishId'")or die (mysqli_error($conn));
	    $fetchExamQuery=mysqli_fetch_array($examQuery);
		$examAbbr=$fetchExamQuery['examAbbr'];
        $regTitle=$fetchExamQuery['regTitle'];

        $response = [
            'response'=> 200,
            'success'=> true,
            'newPagePictures' => implode(",", $uploadedFiles),
            'message'=> "PICTURES UPLOADED SUCCESSFULLY!",
            'data' => array() // Initialize the data array
        ];

        // Fetch pictures details ///
        $select="SELECT * FROM PAGES_PICTURE_TAB WHERE publishId='$publishId'";

        /////////// get alert//////////////////////////////////
        $alertDetail = "PAGE PICTURE SAVED SUCCESSFULLY: Pictures was uploaded successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $regTitle | Abbreviation: $examAbbr | ID: $publishId.";
        
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