<?php
//$file="../Config/DataBase.php";
//if (file_exists($file)){
//    include '../Config/DataBase.php';
//}
//else{
//    include "../../Config/DataBase.php";
//}

class ListeSoutenance
{
    private $nom;
    private $prenom;
    private $filiere;
    private $encadrant;
    private $dateSout;
    private $heure;
    private $local;

    public function getSoutInfo()
    {
        $DB=DataBase::connect();
        $sql = "SELECT * FROM Soutenance";
        $stemt = $DB->query($sql);
        return $stemt->fetchAll();

    }


}