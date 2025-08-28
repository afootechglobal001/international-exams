<?php
    $userSelect="SELECT * FROM USER_VIEW WHERE userId = '$loginUserId'";
    $userQuery=mysqli_query($conn,$userSelect)or die (mysqli_error($conn));
    $userData = mysqli_fetch_assoc($userQuery);
    $firstName = $userData['firstName'];
    $lastName = $userData['lastName'];
    $userData['fullName'] = "$firstName $lastName";
?>