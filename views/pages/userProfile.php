<?php 
    require_once("../../config/connect.php");
    require_once("../../vendor/userStatus.php");
    session_start();

    $user = new User();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

    $userID = $user->GetID();

    $sqlQuery = 
    "SELECT * FROM `users` 
    WHERE `id` = '$userID'";

    $userData = mysqli_query($connect, $sqlQuery);
    $userData = mysqli_fetch_assoc($userData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/userProfile.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Profile</title>
    <link rel="website icon" type="png" href="/images/Logo.png" >
</head>
<body>
    <main class="profile">
        <div class="profile__window">
            <?php include("../templates/profile/header.php")?>
            <section class="profile__window__block">
                <h1 class="profile__window__block__title">About</h1>
                <p class="user__about__text">
                    <?= $userData['about']?>
                </p>
            </section>
            <?php include("../templates/profile/messagesBlock.php")?>
            <?php include("../templates/profile/statisticsBlock.php")?>
        </div>
    </main>
    <script src="../../js/profile.js"></script>
</body>
</html>