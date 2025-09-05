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
    $pageCategoryId =trim($_GET['pageCategoryId']);
    $publishId =trim($_GET['publishId']);
    $faqCatId=trim($_POST['faqCatId']);
    $faqQuestion =trim(str_replace("'", "\'", $_POST['faqQuestion']));
    $faqAnswer =trim(str_replace("'", "\'", $_POST['faqAnswer']));
    $statusId=trim($_POST['statusId']);
   
    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($pageCategoryId, 'PAGE CATEGORY ID');
    validateEmptyField($faqCatId, 'FAQ CATEGORY');
    validateEmptyField($faqQuestion, 'FAQ QUESTION');
    validateEmptyField($faqAnswer, 'FAQ ANSWER');
    validateEmptyField($statusId, 'STATUS');

    $titleQuery=mysqli_query($conn,"SELECT faqQuestion FROM PUBLISH_TAB WHERE faqQuestion='$faqQuestion' AND publishId!='$publishId' AND pageCategoryId='$pageCategoryId'") or die (mysqli_error($conn));
    $titleCountQuery=mysqli_num_rows($titleQuery);

    if ($titleCountQuery>0){ /// start if 4
        $response = [
            'response'=> 101,
            'success'=> false,
            'message' => "This FAQ with question ('$faqQuestion') is already in use. Please try another Question."
        ];

        $alertDetail="FAQ UPDATE ATTEMPT FAILED: A staff whose name - ($loginStaffFullname) - (ID: $loginStaffId) attempted to update FAQ with a question ($faqQuestion) that is already in use.";	
        goto end;
    }

        $update ="UPDATE PUBLISH_TAB SET 
            faqCatId = '$faqCatId',
            faqQuestion = '$faqQuestion',
            faqAnswer = '$faqAnswer',
            statusId = '$statusId',
            updatedBy = '$loginStaffId',
            updatedTime = NOW()
            WHERE publishId = '$publishId' AND pageCategoryId = '$pageCategoryId'";
            mysqli_query($conn, $update) or die(mysqli_error($conn));

            $pageCatArray=$callclass->_getSetupPageCategoryDetails($conn, $pageCategoryId);
            $fetchPageCat = json_decode($pageCatArray, true);
            $pageCategoryName= $fetchPageCat[0]['pageCategoryName'];

            $response = [
                'response'=> 200,
                'success'=> true,
                'message'=> "FAQ UPDATED SUCCESFFULLY!",
                'data' => array() // Initialize the data array
            ];

            $alertDetail = "FAQ UPDATED SUCCESSFULLY: $pageCategoryName was updated successfully by $loginStaffFullname (ID: $loginStaffId). DETAILS: Question: $faqQuestion | Answer: $faqAnswer | ID: $publishId.";

           // Fetch FAQ details ///
            $select="SELECT a.pageCategoryId, 
            a.publishId,
            a.faqCatId, 
            a.faqQuestion, 
            a.faqAnswer, 
            a.statusId, 
            a.createdBy,
            a.updatedBy,
            a.createdTme, 
            a.updatedTime, 
            b.statusName, 
            c.catName AS faqCatName 
            FROM PUBLISH_TAB a, SETUP_STATUS_TAB b, SETUP_CATEGORIES_TAB c 
            WHERE a.statusId=b.statusId 
            AND a.faqCatId=c.catId 
            AND a.pageCategoryId='$pageCategoryId'";
                
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
//////////////////////////////////////////////////////////////////////////////////////////////
$callclass->_alertSequenceAndUpdate($conn,$loginCountryId,$loginStaffId,$loginStaffFullname,$alertDetail,$ipAddress,$systemName);
echo json_encode($response);
?>