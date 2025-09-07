<?php
    $userSelect="SELECT * FROM USER_VIEW WHERE userId = '$loginUserId'";
    $userQuery=mysqli_query($conn,$userSelect)or die (mysqli_error($conn));
    $userData = mysqli_fetch_assoc($userQuery);
    $firstName = $userData['firstName'];
    $lastName = $userData['lastName'];
    $countryId = $userData['countryId'];
    $userData['fullName'] = "$firstName $lastName";

    ///// get country details /////
    $countrySelect="SELECT countryId, countryName, countryFlag, currency, accountName, accountNumber, bankName, phoneNumber, supportEmail FROM COUNTRY_TAB WHERE countryId = '$countryId'";
    $countryQuery=mysqli_query($conn,$countrySelect)or die (mysqli_error($conn));
    $countryData = mysqli_fetch_assoc($countryQuery);
    $userData['countryData'] = $countryData;
?>