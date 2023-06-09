<?php
    require_once("../config/connect.php");

    $tilte = $_POST['title'];
    $text = $_POST['text'];

    $sqlQuery = 
    "INSERT INTO `devlogs` (`title`, `text`) 
    VALUES ('$tilte', '$text')";

    mysqli_query($connect, $sqlQuery);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>