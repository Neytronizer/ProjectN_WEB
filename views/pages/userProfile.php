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
            <section class="profile__window__header">
                <img src="/uploads/avatars/<?= $userData['pathToAvatarImage'] ?>" class="profile__picture">
                <div class="profile__window__header__inner">
                    <h1 class="profile__window__header__inner__name"><?= $userData['nickname']?></h1>
                    <div class="profile__window__header__inner__reputation">
                        <h1 class="profile__window__header__inner__reputation__title">Reputation -</h1>
                        <img src="/images/like.png">
                    </div>
                </div>
            </section>
            <section class="profile__window__block">
                <h1 class="profile__window__block__title">About</h1>
                <p class="user__about__text">
                    <?= $userData['about']?>
                </p>
            </section>
            <section class="profile__window__block profile__window__messages">
                <h1 class="profile__window__block__title">Recent messages</h1>
                <div class="profile__window__messages__block">
                    <h1>There is no messages!</h1>
                </div>
            </section>
            <section class="profile__window__block">
                <h1 class="profile__window__block__title">Statistics</h1>
                <div class="profile__window__block__statistic">
                    <div class="profile__window__block__statistic__elem">
                        <h5>Join date</h5>
                        <h3 class="profile__window__block__statistic__elem__value"><?= $userData['registrationDate']?></h3>
                    </div>
                    <div class="profile__window__block__statistic__elem">
                        <h5>Region</h5>
                        <div class="profile__window__block__statistic__elem__value">???</div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>