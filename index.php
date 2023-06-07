<?php
    require_once('config/connect.php');
    require_once('vendor/userStatus.php');
    session_start();
    $user;

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } 
    else {
        $user = new User();
    }
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
            <?php printf("$user->isUserLogined");?>
            <?php if($user->isUserLogined) : ?>
                <div>test</div>
            <?php else : ?>
                <div class="header__authorization">
                    <h2 class="header__authorization__button" id="loginButton">SIGN UP</h2>
                    <h2>or</h2>
                    <h2 class="header__authorization__button" id="registrationButton">SIGN IN</h2>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="download__block">
        <div class="download__block__title">
            <img src="/images/Logo.png" alt="">
            <h2>StationX</h2>
        </div>
        <div class="download__block__download">
            <h1 class="download__block__playsign">PLAY NOW</h1>
            <div class="download__block__button" download>
                <div class="download__block__text">
                    <h1>DOWNLOAD</h1>
                    <h5>(150MB)</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="about">
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
    </div>
    <div class="article__block">
        <div class="">
            <div class="article__block__lines content">
                <h1 class="article__block__title">What's new</h1>
            </div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="content">
                <div class="article__block__elem">
                    <div class="article__block__elem__inner">
                        <h3 class="article__block__elem__title">NEW UPDATE!</h3>
                        <ul class="article__block__elem__list">
                            <li>
                                <p>New weapons</p>
                            </li>
                            <li>
                                <p>New levels</p>
                            </li>
                            <li>
                                <p>New items</p>
                            </li>
                            <li>
                                <p>New content</p>
                            </li>
                        </ul>
                        <div class="article__block__elem__date">
                            <h4>Sep 3</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('views/templates/loginPopup.php')?>
    <?php include('views/templates/registrationPopup.php')?>
    <script src="/js/script.js"></script>
</body>
</html>
