<?php
    require_once("../config/connect.php");

    $senderID = $_POST['senderID'];
    $userID = $_POST['userID'];
    $text = $_POST['text'];

    $sqlQuery = 
    "INSERT INTO `messages` (`text`, `userID`, `senderID`) 
    VALUES ('$text', '$userID', '$senderID')";

    mysqli_query($connect, $sqlQuery);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>