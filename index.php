<?php
    require_once('config/connect.php');
    require_once('vendor/userStatus.php');
    session_start();
    $user = new User();

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }


    $sqlQuery = "SELECT * FROM `devlogs`";
    $devlogs = mysqli_query($connect,$sqlQuery);
    $devlogs = mysqli_fetch_all($devlogs);
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
    <header>
        <div class="header content">
            <div class="header__left">
                <img class="header__left__nav__icon" src="/images/Logo.png" alt="">
                <nav class="header__left__nav">
                    <h3 class="header__left__nav__elem">About</h3>
                    <h3 class="header__left__nav__elem">News</h3>
                    <h3 class="header__left__nav__elem">Download</h3>
                </nav>
            </div>
            <?php if($user->isUserLogined) : ?>
                <div class="header__user">
                    <?php if($user->GetPathToAvatar() != null) : ?>
                        <img src="/uploads/avatars/<?= $user->GetPathToAvatar(); ?>" alt="" class="header__user__avatar">
                    <?php endif; ?>
                    <div class="header__user__inner">
                        <?php if(!$user->IsUserAdmin()) : ?> 
                            <a href="/views/pages/userProfile.php">
                                Welcome, <span class="header__authorization__button"><?= $user->GetNickname() ?></span>
                            </a>
                        <?php else: ?>
                            <a href="/views/pages/adminProfile.php" class="header__authorization__button">Welcome, <?= $user->GetNickname()?></a>
                        <?php endif; ?>
                        <a href="/vendor/authentication.php" class="header__authorization__button">Log out</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="header__authorization">
                    <h2 class="header__authorization__button" id="loginButton">SIGN UP</h2>
                    <h2>or</h2>
                    <h2 class="header__authorization__button" id="registrationButton">SIGN IN</h2>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <section class="download">
        <div class="download__header">
            <img src="/images/Logo.png" alt="">
            <h2>StationX</h2>
        </div>
        <div class="download__block">
            <h1 class="download__block__title">PLAY NOW</h1>
            <div class="download__block__button">
                <a href="/vendor/downloadGame.php">DOWNLOAD</a>
                <h5>(25MB)</h5>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="content">
            <div class="about__title">
                <div class="about__title__inner">
                    <img src="/images/Logo.png" alt="">
                    <h1>About the game</h1>
                </div>
            </div>
            <div class="about__description">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam commodi delectus, tempora nemo ipsum
                    praesentium culpa maiores consequatur illum blanditiis? Quasi quaerat officiis dolorem placeat
                    nihil. Dolorem ipsam omnis similique.
                    Dolorum expedita corrupti unde aperiam eius doloribus tempora? Aliquid magnam non sit eum,
                    consequatur eligendi aut iure, ipsum ab placeat earum reprehenderit. Ex fugiat eaque quae quasi
                    eligendi corrupti explicabo?
                    Dolorem voluptatum impedit praesentium optio, eius vitae. Maxime quae nisi fugit, aliquam architecto
                    eius culpa libero sint numquam optio recusandae velit soluta ipsa rem hic perferendis! Dolor
                    similique consequuntur id?
                    Suscipit id quia voluptatibus, saepe aut magnam! Recusandae ex saepe ipsa, eaque ipsam, eum corporis
                    rerum fugiat doloremque, nemo laudantium sunt. Nisi dolores consectetur, voluptatibus eum reiciendis
                    at ipsum exercitationem.
                    Illo, necessitatibus dicta? Delectus debitis ipsum consequatur quis quo? Expedita molestias illum
                    aliquid quae eos illo distinctio? Unde repellat harum illum aut veniam rem temporibus nostrum,
                    reiciendis cumque sequi maiores!
                </p>
            </div>
            <div class="about__screenshots">
                <div class="about__screenshots__image">
                    <button id="SliderArrowLeft" class="about__screenshots__slider__arrow">
                        <img src="/images/sliderArrow.svg" alt="">
                    </button>
                    <div class="about__screenshots__slider__items">
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="/images/monkey.jpg" alt="">
                        </div>
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="/images/monkey2.jpg" alt="">
                        </div>
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="/images/monkey3.jpg" alt="">
                        </div>
                    </div>
                    <button id="SliderArrowRigth" class="about__screenshots__slider__arrow">
                        <img src="/images/sliderArrow.svg" alt="">
                    </button>
                </div>
                <div class="about__screenshots__slider"></div>
            </div>
        </div>
    </section>
    <section class="devlogs">
        <h1 class="devlogs__title">What's new</h1>
        <div class="line"></div>
        <div class="line"></div>
        <div class="devlog__blocks content">
            <?php foreach($devlogs as $devlog):?>
                <a href="/views/pages/devlogPage.php?devlogID=<?=$devlog[0]?>"class="devlog__block">
                    <div class="devlog__block__inner">
                        <h3 class="devlog__block__title"><?= $devlog[1]?></h3>
                        <div class="article__block__elem__date">
                            <h4><?= $devlog[3]?></h4>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php include('views/templates/loginPopup.php')?>
    <?php include('views/templates/registrationPopup.php')?>
    <script src="/js/script.js"></script>
</body>
</html>
