<?php
    require_once("../config/connect.php");

    $userID = $_GET['userID'];

    $image = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $fileType = $_FILES['avatar']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = $fileName . uniqid('', true) . "." . $fileActualExt;
    $fileDestinationToDB = '/uploads/avatars/' . $fileNameNew;
    $fileDestination = '../uploads/avatars/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);    

    $sqlQuery = "UPDATE `users` 
    SET `pathToAvatarImage` = '$fileDestinationToDB' WHERE `id` = '$userID'";

    mysqli_query($connect, $sqlQuery);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>