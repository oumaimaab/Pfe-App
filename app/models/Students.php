<?php

include('../app/Config/DataBase.php');
class Students
{
    private $username,$password;

    public function __construct($username,$password)
    {
        $this->username=$username;
        $this->password=$password;
    }

    public function getDataBase(){
        $dataBaseClass = new DataBase();
        return $dataBaseClass;
    }

    public function getStudents(){
        $DB=DataBase::connect();
        $dataBase = $this->getDataBase();
        $sql = "SELECT * FROM ".$dataBase->getTablePfe();
        $stemt = $DB->query($sql);
        return $stemt->fetchAll();
    }
    public function createStudent($username, $password)
    {
        $sql = "INSERT INTO ?  ( username , password , nom1, nom2 , nom3  , prenom1 , prenom2 , prenom3 ,  email1 , email2 , email3  , GSM1 , GSM2 , GSM3 , filiere , groupe , date,token,valide )VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'0')";

        $req = Database::connect()->prepare($sql);

        return $req->execute([$username,$password,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')]);
    }
    public function checkLogin($username,$password)
    {
        $users = $this->getStudents();
        foreach ($users as $user) {
            if ($user['password'] == $password && $user['username'] = $username) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['password'] = $user['password'];
                header('Location:../app/views/mean.php');
            } else {
                $dialog = "<img src='../../public/img/erreur.png'> Données non valides ou compte inexistant !";
                //header('Location:../../public/index.php');
            }
        }
//        $sql = "SELECT * FROM users WHERE username =? and password=?";
//        $req = Database::connect()->prepare($sql);
//        $req->execute(array($username,$password));
//        if ($req->rowCount()==1) {
//            return true;
//        }else{
//            return false;
//        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    function protect($string)
    {
        return $string;
    }
}