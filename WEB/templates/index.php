<?php
    include('..static/php/db_connect.php');

    if(isset($_POST["log in"])){
        $login = $_POST['login'];
        $password = $_POST['password'];

        if(!$login || !$password){
           $error = 'Вы не ввели логин или пароль';
           exit;
        }

        if(!$error){

            $query = "INSERT INTO 'user' ('id', 'login', 'password') VALUES (NULL, '$login', '$password')";
            mysqli_query($link, $query);
            echo 'You were successfully sign up!';
        }
        else{
            echo $error;
            exit;
        }
    }
?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/styles.css">
    <link rel="stylesheet" href="../static/css/popups.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="website icon" type="png" href="./images/monkey3.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trispace:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="header content">
            <div class="header__left">
                <img class="header__left__nav__icon" src="../static/images/Logo.png" alt="">
                <nav class="header__left__nav">
                    <h3 class="header__left__nav__elem">About</h3>
                    <h3 class="header__left__nav__elem">News</h3>
                    <h3 class="header__left__nav__elem">Download</h3>
                </nav>
            </div>
            <div class="header__menu">
                <div class="header__registration">
                    <p class="header__registration__button" onclick="showPopup()">SIGN UP</p>
                        <p style="color: white; padding: 10px;">or</p>
                    <p class="header__registration__login__button" onclick="showPopup()">SIGN IN</p>
                </div>
                <img class="header__menu__icon" src="../static/images/Menu.png" alt="">
            </div>
        </div>
    </header>
    <div class="download__block">
        <div class="download__block__title">
            <img src="../static/images/Logo.png" alt="">
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
                    <img src="../static/images/Logo.png" alt="">
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
                        <img src="../static/images/sliderArrow.svg" alt="">
                    </button>
                    <div class="about__screenshots__slider__items">
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="../static/images/monkey.jpg" alt="">
                        </div>
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="../static/images/monkey2.jpg" alt="">
                        </div>
                        <div class="about__screenshots__slider__items__item">
                            <img class="about__screenshots__screenshot" src="../static/images/monkey3.jpg" alt="">
                        </div>
                    </div>
                    <button id="SliderArrowRigth" class="about__screenshots__slider__arrow">
                        <img src="../static/images/sliderArrow.svg" alt="">
                    </button>
                </div>
                <div class="about__screenshots__slider">
                </div>
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
    <div class="popup" id="popup_login">
        <div class="popup__window">
            <div class="popup__window__close" onclick="hidePopup()">&times;</div>
            <div class="popup__window__content">
                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder=" Login">
                    <input type="password" name="password" id="password" placeholder=" Password">
                    <input type="submit" name="log in" value="   Submit   ">
                </form>
            </div>
        </div>
    </div>
    <div class="popup" id="popup_registration">
        <div class="popup__window">
            <div class="popup__window__close" onclick="hidePopup()">&times;</div>
            <div class="popup__window__content">
                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder=" Login">
                    <input type="password" name="password" id="password" placeholder=" Password">
                    <input type="submit" name="Registrated" value="   Submit   ">
                </form>
            </div>
        </div>
    </div>
    <script src="../static/js/script.js"></script>
</body>

</html>
