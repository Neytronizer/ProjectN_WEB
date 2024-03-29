<?php 
    require_once '../config/connect.php';
    require 'userStatus.php';
    session_start();
    $user = new User();;

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
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

            $result = mysqli_query($connect, $sqlQuery);
            $userData = mysqli_fetch_assoc($result);
            
            if($result->num_rows > 0){
                $user->isUserLogined = true;
                $user->SetUserData($userData);
                $_SESSION['user'] = $user;
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