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
	$publishId=trim(($_GET['publishId']));
    $pageCategoryId=trim(($_GET['pageCategoryId']));
    $pageTitle =trim((str_replace("'", "\'", $_POST['pageTitle'])));
    $pageUrl = strtolower(trim($_POST['pageUrl']));
    $seoKeywords =trim((str_replace("'", "\'", $_POST['seoKeywords'])));
    $seoDescription =trim((str_replace("'", "\'", $_POST['seoDescription'])));
    $seoFlyer = $_FILES["seoFlyer"]["name"];
    $pageContent =trim((str_replace("'", "\'", $_POST['pageContent'])));

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($publishId, 'PUBLISH ID');
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY');
    validateEmptyField($pageTitle, 'PAGE TITLE');
    validateEmptyField($pageUrl, 'PAGE URL');
    validateEmptyField($seoKeywords, 'SEO KEYWORDS');
    validateEmptyField($seoDescription, 'SEO DESCRIPTION');
    validateEmptyField($seoFlyer, 'SEO FLYER');
    validateEmptyField($pageContent, 'PAGE CONTENT');
   
        $query=mysqli_query($conn,"SELECT * FROM PAGES_TAB WHERE pageCategoryId='$pageCategoryId' AND pageUrl='$pageUrl' AND publishId!='$publishId'") or die (mysqli_error($conn));
        $count=mysqli_num_rows($query);
        if ($count>0){
            $response = [
                'response'=> 105,
                'success'=> false,
                'message'=> "PAGE EXIST! Page already exist by URL ($pageUrl). Check and try again.",
            ];

            $alertDetail="PAGE CREATION ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to create a page with a url ($pageUrl) that is already in use.";	
            goto end;
        }

        ////// GET CURRENT URL FROM DATABASE //////////////////////
        $urlQuery=mysqli_query($conn,"SELECT * FROM PAGES_TAB WHERE publishId='$publishId'")or die (mysqli_error($conn));
        $fetchUrl=mysqli_fetch_array($urlQuery);
        $dbPageUrl=$fetchUrl['pageUrl'];
        $dbSeoFlyer=$fetchUrl['seoFlyer'];

        $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
        $fetchPageCat = json_decode($pageCatArray, true);
        $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

        $query=mysqli_query($conn,"SELECT * FROM PAGES_TAB WHERE publishId='$publishId'") or die (mysqli_error($conn));
        $pageCount=mysqli_num_rows($query);
        if ($pageCount>0){
            mysqli_query($conn,"UPDATE `PAGES_TAB` SET
            `pageUrl`='$pageUrl', `pageTitle`='$pageTitle', `seoKeywords`='$seoKeywords', `seoDescription`='$seoDescription', 
            `pageContent`='$pageContent', `updatedBy`='$loginStaffId', `updatedTime`=NOW() WHERE publishId='$publishId'")or die (mysqli_error($conn));

            $response['message']="PAGE UPDATED SUCCESFFULY!";
        }else{
            mysqli_query($conn,"INSERT INTO `PAGES_TAB`
            (`publishId`, `pageCategoryId`, `pageUrl`, `pageTitle`, `seoKeywords`, `seoDescription`, `pageContent`, `createdBy`, `createdTime`) VALUES
            ('$publishId', '$pageCategoryId', '$pageUrl', '$pageTitle', '$seoKeywords',  '$seoDescription', '$pageContent', '$loginStaffId', NOW())")or die (mysqli_error($conn));
            
            $response['message']="PAGE CREATED SUCCESFFULY!";

            $alertDetail = "PAGE CREATED SUCCESSFULLY: $pageCategoryName was created successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $pageTitle | Page Url: $pageUrl | ID: $publishId.";
        }

        ///////////////////////getting image extention//////////////////////////
        $allowedExts = array("jpg", "jpeg", "JPEG", "JPG", "gif", "png","PNG","GIF","webp","WEBP");
        $extension = pathinfo($_FILES['seoFlyer']['name'], PATHINFO_EXTENSION);
        
        if (!in_array(($extension), $allowedExts)) {
            $response = [
                'response' => 103,
                'success' => false,
                'message' => 'INVALID PICTURE FORMAT! Check the picture format and try again.'
            ];  
            goto end;
        }
	
        $datetime = date("Ymdhi");
        $seoFlyer = $publishId . '_' . $datetime . '_' . $seoFlyer;
        mysqli_query($conn,"UPDATE `PAGES_TAB` SET `seoFlyer`='$seoFlyer' WHERE publishId='$publishId'")or die (mysqli_error($conn));

        $response = [
            'response'=> 200,
            'success'=> true,
            'oldPageUrl'=> $dbPageUrl,
            'pageUrl'=> $pageUrl,
            'oldSeoFlyer'=> $dbSeoFlyer,
            'seoFlyer'=> $seoFlyer,
            'message'=> "PAGE SAVED SUCCESSFULLY",
            'data' => array() // Initialize the data array
        ];

        $alertDetail = "PAGE UPDATED SUCCESSFULLY: $pageCategoryName was updated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Title: $pageTitle | Page Url: $pageUrl | ID: $publishId.";

        $select="SELECT * FROM PAGES_TAB WHERE publishId = '$publishId'";
        $query=mysqli_query($conn,$select)or die (mysqli_error($conn));
        while ($fetchQuery = mysqli_fetch_assoc($query)) {
            $response['data'][] = $fetchQuery;
        }
end:
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>