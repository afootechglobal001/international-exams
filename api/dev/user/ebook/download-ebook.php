<?php require_once '../../config/connection.php';?>
<?php require_once '../../config/user-session-check.php';?>

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
    $ebookId =trim($_GET['ebookId']);

    //////////////////check for empty fields//////////////////////////////////////
    validateEmptyField($ebookId, 'EBOOK ID');

    $select = "SELECT ebookId, material FROM EXAM_EBOOK_TAB WHERE ebookId='$ebookId'";

    $query=mysqli_query($conn,$select)or die (mysqli_error($conn));

    $fetchQuery=mysqli_fetch_array($query); 
    $material=$fetchQuery['material'];
    $filePath = $ebookFilePath . $material;

    $response=[
        'response' => 200,
        'success' => true,
        'message' => "E-BOOK DOWNLOAD SUCCESFFULY!",
        'filePath' => $filePath
    ];
   
end:
echo json_encode($response);
?>