<?php
    require_once("../config/connect.php");

    $userID = $_GET['userID'];
    $devlogID = $_GET['devlogID'];

    $text = $_POST['text'];

    $sqlQuery = 
    "INSERT INTO `comments` (`text`, `userID`, `devlogID`) 
    VALUES ('$text', '$userID', '$devlogID')";

    mysqli_query($connect, $sqlQuery);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>