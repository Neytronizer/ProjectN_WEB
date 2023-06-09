<?php
    require_once('../../config/connect.php');
    require_once('../../vendor/userStatus.php');
    session_start();
    $user = new User();

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }

    $devlogID = $_GET['devlogID'];

    $sqlQuery = "SELECT * FROM `devlogs` WHERE `id` = '$devlogID'";
    $devlogs = mysqli_query($connect,$sqlQuery);
    $devlogs = mysqli_fetch_assoc($devlogs);

    $sqlQuery = "SELECT * FROM `comments`";

    $comments = mysqli_query($connect, $sqlQuery);
    $comments = mysqli_fetch_all($comments);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/popups.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="website icon" type="png" href="/images/Logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trispace:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>ProjectN</title>
</head>
<body>
    <main class="devlogs devlog__page">
        <section class="devlog__block">
            <div class="devlog__block__inner">
                <h1 class="devlog__block__title"><?= $devlogs['title']?></h1>
                <p>
                    <?=$devlogs['text']?>
                </p>
                <div class="article__block__elem__date">
                    <h4><?= $devlogs['date']?></h4>
                </div>
            </div>
        </section>
        <section class="devlog__block devlog__block__comments">
            <h1>Comments</h1>
            <form action="../../vendor/createComment.php?userID=<?= $user->GetID()?>&devlogID=<?= $devlogID ?>" method="POST">
                <?php if($user->isUserLogined) : ?>
                    <textarea class="devlog__block__comments__input" name="text" cols="110" rows="5"></textarea>
                    <input class="devlog__block__comments__input devlog__block__comments__submit" type="submit" value="Submit">
                <?php else : ?>
                    <textarea class="devlog__block__comments__input" name="text" cols="110" rows="5" disabled></textarea>
                    <input class="devlog__block__comments__input devlog__block__comments__submit" type="submit" value="Submit" disabled>
                <?php endif;?>
            </form>
            <div class="comments__inner">
                <?php foreach($comments as $comment) : ?>
                    <div class="comment">
                        <?php
                            $sqlQuery = "SELECT `nickname`, `pathToAvatarImage` FROM `users` WHERE `id` = '$comment[2]'";
                            $userData = mysqli_query($connect, $sqlQuery);
                            $userData = mysqli_fetch_assoc($userData);
                        ?>
                        <div class="comment__header">
                            <img class="comment__avatar" src="../../uploads/avatars/<?=$userData['pathToAvatarImage']?>" alt="">
                            <h1 class="comment__nickname">
                                <?= $userData['nickname'] ?>
                            </h1>
                        </div>
                        <p class="comment__text"><?= $comment[1] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <script src="/js/script.js"></script>
</body>
</html>
