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
    <div class="user__background">
        <div class="user__profile">
             <div class="user__profile__inner">
                <div class="user__profile__inner__header">
                    <img src="/uploads/avatars/<?= $userData['pathToAvatarImage'] ?>" class="profile__picture">
                    <div class="user__content">
                        <div class="user__profilename">
                            <h1 class="user__name"><?= $userData['nickname']?></h1>
                        </div>
                        <div class="user__reputation">
                            <h1 class="user__REP">Reputation: -</h1>
                            <img class="rep_icon" src="/images/like.png">
                        </div>
                    </div>
                </div>
                <div class="user__profile__inner__about">
                    <h1 class="user__profile__inner__about__title">About</h1>
                    <div class="user__about_line"></div>
                    <p class="user__about__text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam commodi delectus, tempora nemo ipsum praesentium culpa maiores consequatur illum blanditiis? Quasi quaerat officiis dolorem placeat nihil. Dolorem ipsam omnis similique.
                        Dolorum expedita corrupti unde aperiam eius doloribus tempora? Aliquid magnam non sit eum, consequatur eligendi aut iure, ipsum ab placeat earum reprehenderit. Ex fugiat eaque quae quasi eligendi corrupti explicabo?
                        Dolorem voluptatum impedit praesentium optio, eius vitae. Maxime quae nisi fugit, aliquam architecto eius culpa libero sint numquam optio recusandae velit soluta ipsa rem hic perferendis! Dolor similique consequuntur id?
                        Suscipit id quia voluptatibus, saepe aut magnam! Recusandae ex saepe ipsa, eaque ipsam, eum corporis rerum fugiat doloremque, nemo laudantium sunt. Nisi dolores consectetur, voluptatibus eum reiciendis at ipsum exercitationem.
                        Illo, necessitatibus dicta? Delectus debitis ipsum consequatur quis quo? Expedita molestias illum aliquid quae eos illo distinctio? Unde repellat harum illum aut veniam rem temporibus nostrum, reiciendis cumque sequi maiores!
                    </p>
                </div>
                <div class="user__profile__inner__statistics">
                    <h1 class="user__profile__inner__statistics__title">Statistics</h1>
                    <div class="user__about_line"></div>
                    <div class="user__profile__inner__statistics__content">
                        <div class="user__profile__inner__statistics__content__date">Join date
                            <h3 class="user__profile__inner__statistics__content__date__numbers"><?= $userData['registrationDate']?></h3>
                        </div>
                        <div class="user__profile__inner__statistics__content__region">Region
                            <div class="user__profile__inner__statistics__content__region__location">???</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>