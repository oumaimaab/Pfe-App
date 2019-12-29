<?php


class DataBase
{
    private $site = "localhost";
    private $universite = 'Université Cadi Ayyad';
    private $ecole = 'ENSA Safi';
    private $dep_label = 'Département Informatique, Réseaux et Télécommunications';
    private $table_pfe = 'ensas_pfe';
    private $table_profs = 'ensas_pfe_profs';
    private $titre = 'Gestion des PFE';
    private $bg_color = '#E6E6E6';
    private $copyright;
    private $headers;
    private $datelimins; //(M,J,A) date limite de préinscription
    private $datelimedit; //date limite de compléter les données
    private $datefinale; //4jours apres les soutenances


    public static function connect()
    {
        $host = "localhost";
        $user = 'root';
        $pass = '';
        $db = 'pfe';
        try {
            $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            return $connect;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function __construct()
    {
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
        $headers .= "From: ENSAS - IRT <walid.bouarifi@gmail.com>\n";

        /*$headers  = "From: testsite < mail@testsite.com >\n";
        $headers .= "Cc: testsite < w.bouarifi@uca.ac.ma >\n";
            $headers .= "X-Sender: testsite < w.bouarifi@uca.ac.ma>\n";*/
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "Return-Path: w.bouarifi@uca.ac.ma\n"; // Return path for errors
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
        $this->copyright = 'ENSA SAFI (C) ' . date('Y');
        $this->headers .= 'X-Mailer: PHP/' . phpversion();
        $this->datelimins = mktime(0, 0, 0, 3, 3, 2020); //(M,J,A) date limite de préinscription
        $this->datelimedit = mktime(0, 0, 0, 5, 30, 2020); //date limite de compléter les données
        $this->datefinale = mktime(0, 0, 0, 7, 30, 2020); //4jours apres les soutenances
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return string
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * @return string
     */
    public function getEcole()
    {
        return $this->ecole;
    }

    /**
     * @return string
     */
    public function getDepLabel()
    {
        return $this->dep_label;
    }

    /**
     * @return string
     */
    public function getTablePfe()
    {
        return $this->table_pfe;
    }

    /**
     * @return string
     */
    public function getTableProfs()
    {
        return $this->table_profs;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return string
     */
    public function getBgColor()
    {
        return $this->bg_color;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return false|int
     */
    public function getDatelimins()
    {
        return $this->datelimins;
    }

    /**
     * @return false|int
     */
    public function getDatelimedit()
    {
        return $this->datelimedit;
    }

    /**
     * @return false|int
     */
    public function getDatefinale()
    {
        return $this->datefinale;
    }



}