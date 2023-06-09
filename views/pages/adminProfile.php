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

    $sqlQuery = 
    "SELECT * FROM `devlogs`";

    $devlogs = mysqli_query($connect,$sqlQuery);
    $devlogs = mysqli_fetch_all($devlogs);
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
                </div>
            </section>
            <section class="profile__window__block">
                <h1 class="profile__window__block__title">Statistics</h1>
                <div class="profile__window__block__statistic">
                    <div class="profile__window__block__statistic__elem">
                        <h5>Join date</h5>
                        <h3 class="profile__window__block__statistic__elem__value"><?= $userData['registrationDate']?></h3>
                    </div>
                </div>
            </section>
            <section class="profile__window__block">
                <h1 class="profile__window__block__title">Devlogs</h1>
                <nav class="admin__devlogs">
                    <h3 class="admin__devlogs__options" id="createDevlog">Create Devlog</h3>
                    <h3 class="admin__devlogs__options" id="editDevlogs">Edit Devlogs</h3>
                </nav>
                <form action="../../vendor/createDevlog.php" class="admin__devlog__create" id="createBlock" method="POST">
                    <label for="title">Title</label>
                    <input class="admin__devlog__create__input" type="text" id="title" name="title">
                    <label for="text">Text</label>
                    <textarea class="admin__devlog__create__input" name="text" id="text" cols="100" rows="10"></textarea>
                    <input class="admin__devlog__create__input" type="submit" value="Create">
                </form>
                <div class="admin__devlog__edit" id="editBlock">
                    <?php foreach($devlogs as $devlog) : ?>
                        <div class="admin__devlog__edit__block">
                            <h1><?= $devlog[1]?> </h1>
                            <h1>Date: <?= $devlog[3]?></h1>
                            <a href="../../vendor/deleteDevlog.php?id=<?=$devlog[0]?>" class="admin__devlog__edit__block__delete">Delete</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
    <script src="../../js/profile.js"></script>
</body>
</html>