<?php
    require_once '../config/connect.php';
    $devlogID = $_GET['id'];
    $sqlQuery = "DELETE FROM `devlogs` WHERE `id` = '$devlogID'";

    mysqli_query($connect, $sqlQuery);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>