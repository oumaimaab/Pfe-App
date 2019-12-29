<?php
include('../Config/DataBase.php');

class Admin
{
    public function getDataBase()
    {
        $dataBaseClass = new DataBase();
        return $dataBaseClass;
    }

    public function checkLogin($username, $password)
    {
        $users = $this->getAdmin();
        print_r($users);
        foreach ($users as $user) {
            if (($user['login'] == 'admin') && ($user['password'] == 'pfe.2019')) {
                session_start();
                $_SESSION['user'] = $username;
                $_SESSION['pass'] = $password;
                header('Location:views/mean.php');
            } elseif ($password==$user['password'] && $username==$user['login']) {
                session_start();
                $_SESSION['login'] = $user['login'];
                $_SESSION['user'] = "professeur";
                $_SESSION['pass'] = $password;
                //$_SESSION['email'] = $user['email'];
                header('Location:views/mean.php');
            }
//        else {
//                $dialog = "<img src='../../public/img/erreur.png'> Données non valides ou compte inexistant !";
//            }
        }

    }

    public function getAdmin()
    {
        $DB = DataBase::connect();
        $sql = "SELECT * FROM admin";
        $stemt = $DB->query($sql);
        return $stemt->fetchAll();
    }
    function protect($string)
    {
        return $string;
    }
}