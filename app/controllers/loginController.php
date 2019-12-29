<?php
include ("../app/models/Students.php");

class loginController
{
    function login($username, $password)
    {

        $student = new Students($username,$password);
        $student->checkLogin($username,$password);
//        if ($student->checkLogin($username,$password)) {
//            $_SESSION['username'] = $username;
//            $_SESSION['password'] = $password;
//            header('Location:mean.php');
//        } else {
//            $dialog = "<img src='../../public/img/erreur.png'> Données non valides ou compte inexistant !";
//            return $dialog;
//            //header('Location:../../public/index.php');
//        }


    }
}