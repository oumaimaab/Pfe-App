<?php


class AdminLogin
{
    public function login($username, $password){
        require_once "../models/Prof.php";
        $prof= new Prof();
        $db= new DataBase();
        $user  = $prof->protect($username);
        $pass = $prof->protect($password);
        $prof->checkLogin($username,$password);
    }
}