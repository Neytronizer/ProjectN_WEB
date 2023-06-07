<?php 
    require_once '../config/connect.php';
    require 'userStatus.php';
    session_start();
    $user;

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } 
    else {
        $user = new User();
    }

    if($user->isUserLogined){
        LogoutUser($user);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['isRegistrationRequest'] === "true"){
            $email = $_POST['email'];
            $nickname = $_POST['nickname'];
            $login = $_POST['login'];
            $password = $_POST['password'];

            // if($password != $passwordCheck){
            //     header("Location: /");
            //     exit;
            // }
    
            $sqlQuery = 
            "INSERT INTO `users` (`login`, `password`, `nickname`, `email`) 
            VALUES('$login', '$password', '$nickname', '$email')";

            mysqli_query($connect, $sqlQuery);
        }
        else if($_POST['isRegistrationRequest'] === "false"){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $sqlQuery = 
            "SELECT * FROM `users` 
            WHERE `login`='$login' AND `password`='$password'";
            
            if($result->num_rows > 0){
                $user->isUserLogined = true;
                $user->SetUserData($userData);
                $_SESSION['user'] = $user;

                print("$user->isUserLogined");
            }
        }
    }

    function LogoutUser($user){
        $user->isUserLogined = false;
        $_SESSION['user'] = $user;
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
?>