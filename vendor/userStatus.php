<?php
class User{
    public $isUserLogined;
    
    private $userID = null;
    private $nickname = null;
    private $email = null;
    private $isUserAdmin = 0;
    private $pathToAvatar = null;

    public function __construct()
    {
        $this->isUserLogined = false;
    }

    public function SetUserData($userData)
    {
        $this->userID = $userData['id'];
        $this->nickname = $userData['nickname'];
        $this->email = $userData['email'];
        $this->isUserAdmin = $userData['isAdmin'];
        $this->pathToAvatar = $userData['pathToAvatarImage'];
    }

    public function GetNickname(){
        return $this->nickname;
    }
    
    public function GetID(){
        return $this->userID;
    }
    public function IsUserAdmin(){
        return $this->isUserAdmin;
    }
    public function GetPathToAvatar(){
        return $this->pathToAvatar;
    }
}
?>