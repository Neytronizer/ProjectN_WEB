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
        <div class="devlog__blocks">
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
            <section class="devlog__block">
                <form action="../../vendor/createComment.php" method="post">
                    <label for="">Comments</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Submit">
                </form>
            </section>
        </div>
    </main>
    <script src="/js/script.js"></script>
</body>
</html>
