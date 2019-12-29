<?php


class DataBase2
{
    public $lien;
    public $local;  //exemple : mysql:host=hostname;dbname=database
    public $user;
    public $pass;

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        $this->local = "mysql:host=localhost;dbname=pfe";
        $this->user = "root";
        $this->pass = '';
        try {
            $this->lien = new PDO($this->local, $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            error_log(date("Y-m-d h:m:s") . " " . $e->getMessage(), 3, ROOT . "log_file.log");
            die($e->getMessage());
        }
    }

    public function connexionBdd()
    {
        return $this->lien;
    }

    public function deconnexionBdd()
    {
        $this->lien = null;
    }
}