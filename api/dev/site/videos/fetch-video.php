<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
   //////////////////declaration of variables//////////////////////////////////////
$select = "SELECT DISTINCT examId, examAbbr 
           FROM EXAM_VIDEO_TAB 
           ORDER BY examAbbr ASC";

$query = mysqli_query($conn, $select) or die(mysqli_error($conn));
$allRecordCount = mysqli_num_rows($query);

if ($allRecordCount == 0) {
    $response['response'] = 200;
    $response['success'] = false;
    $response['message'] = "No Record found";
    goto end;
}

$response = [
    'response' => 200,
    'success' => true,
    'message' => "VIDEO FETCH SUCCESSFULLY!",
    'allRecordCount' => $allRecordCount,
    'data' => []
];

while ($fetchQuery = mysqli_fetch_assoc($query)) {
    $examId = $fetchQuery['examId'];

    /////////////////// fetch video categories per exam ////////////
    $categoryData = [];
    $getVideoCatQuery = mysqli_query($conn, "SELECT 
        DISTINCT a.videoCatId, b.videoCatName 
        FROM EXAM_VIDEO_TAB a
        JOIN SETUP_VIDEO_CATEGORY_TAB b 
        ON a.videoCatId = b.videoCatId
        WHERE a.examId = '$examId'
        ORDER BY b.videoCatName ASC") or die(mysqli_error($conn));

    while ($getVideoCatFetch = mysqli_fetch_assoc($getVideoCatQuery)) {
        $videoCatId = $getVideoCatFetch['videoCatId'];

        /////////////////// fetch videos per category ////////////
        $videoData = [];
        $getVideoQuery = mysqli_query($conn, "SELECT *
            FROM EXAM_VIDEO_TAB
            WHERE examId = '$examId' 
            AND videoCatId = '$videoCatId'
            AND statusId=1
            ORDER BY videoId ASC") or die(mysqli_error($conn));

        while ($getVideoFetch = mysqli_fetch_assoc($getVideoQuery)) {
            $videoData[] = $getVideoFetch;
        }

        $getVideoCatFetch['videoData'] = $videoData; // attach videos to category
        $categoryData[] = $getVideoCatFetch;
    }

    $fetchQuery['categoryData'] = $categoryData; // attach categories to exam
    $response['data'][] = $fetchQuery;
}
end:
echo json_encode($response);
?>