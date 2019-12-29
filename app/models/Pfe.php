<?php
$file="../controllers/ReqController.php";
if (file_exists($file)){
    include "../controllers/ReqController.php";
}
else{
    include "../../controllers/ReqController.php";
}

class Pfe
{


    private  $username;
    private  $password;
    private  $nom1;
    private  $nom2;
    private  $nom3;
    private  $prenom1;
    private  $prenom2;
    private  $prenom3;
    private  $email1;
    private  $email2;
    private  $email3;
    private  $GSM1;
    private  $GSM2;
    private  $GSM3;
    private $filiere;
    private $groupe;
    private $date;
    private $valide;
    private $sujet;
    private $descr;
    private $preembauche;
    private $motscle;
    private $debut;
    private $duree;
    private $entreprise;
    private $adresse;
    private $ville;
    private $encadrant_ext;
    private $fonction;
    private $email_encadrant_ext;
    private $GSM_encadrant_ext;
    private $note;
    private $reqController;
    public function __construct($username='', $password='', $nom1='', $nom2='', $nom3='', $prenom1='', $prenom2='', $prenom3='', $email1='', $email2='', $email3='', $GSM1='', $GSM2='', $GSM3='', $filiere='', $groupe='', $date='', $valide='',$sujet="",$descr="",$preembauche="",$motscle="",$debut="",$duree="",$entreprise="",$adresse="",$ville="",$encadrant_ext="",$fonction="",$email_encadrant_ext="",$GSM_encadrant_ext="",$sessionUser="",$note="")
    {
        $this->username= $username;
        $this->password= $password;
        $this->nom1= $nom1;
        $this->nom2= $nom2;
        $this->nom3= $nom3;
        $this->prenom1= $prenom1;
        $this->prenom2= $prenom2;
        $this->prenom3= $prenom3;
        $this->email1= $email1;
        $this->email2= $email2;
        $this->email3= $email3;
        $this->GSM1= $GSM1;
        $this->GSM2= $GSM2;
        $this->GSM3= $GSM3;
        $this->filiere= $filiere;
        $this->groupe= $groupe;
        $this->date= $date;
        $this->valide= $valide;
        $this->sujet=$sujet;
        $this->descr=$descr;
        $this->preembauche=$preembauche;
        $this->motscle=$motscle;
        $this->debut=$debut;
        $this->duree=$duree;
        $this->entreprise=$entreprise;
        $this->adresse=$adresse;
        $this->ville=$ville;
        $this->encadrant_ext=$encadrant_ext;
        $this->fonction=$fonction;
        $this->email_encadrant_ext=$email_encadrant_ext;
        $this->GSM_encadrant_ext=$GSM_encadrant_ext;
        $this->note=$note;
        $this->reqController = new ReqController();
    }
    public function updateGroupPFE($table_pfe,$password,$filiere,$nom1,$nom2,$nom3,$prenom1,$prenom2,$prenom3,$GSM1,$GSM2,$GSM3,$email1,$email2,$email3,$sujet,$descr,$preembauche,$motscle,$debut,$duree,$entreprise,$adresse,$ville,$encadrant_ext,$fonction,$email_encadrant_ext,$GSM_encadrant_ext,$sessionUser)
    {
        $query = "UPDATE $table_pfe SET password=? , filiere=?, nom1=?, nom2=?, nom3=?, prenom1=?,
        prenom2=?, prenom3=?,GSM1=?,GSM2=?,GSM3=?,email1=?,email2=?,email3=?,
       sujet=?,descr=?,preembauche=?,motscle=?,debut=?,duree=?,entreprise=?,
       adresse=?,ville=?,encadrant_ext=?,fonction=?,email_encadrant_ext=?,GSM_encadrant_ext = ?
       WHERE username=?";
        $updatedOrNo = $this->reqController->update($query,[$password,$filiere,$nom1,$nom2,$nom3,
            $prenom1,$prenom2,$prenom3,$GSM1,$GSM2,$GSM3,
            $email1,$email2,$email3,$sujet,$descr,$preembauche
            ,$motscle,$debut,$duree,$entreprise,$adresse,$ville,$encadrant_ext,
            $fonction,$email_encadrant_ext,$GSM_encadrant_ext,$sessionUser]);
        if (!$updatedOrNo) {
            return false;
        }else
            return true;
    }
    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    function checkGroupExist($table_pfe, $username)
    {
        $query = "SELECT username from $table_pfe where username=?";
        $result = $this->reqController->findOne($query, [$username]);
        if ($result) {
            return $this->RowToObj($result);
        } else
            return false;
    }


    public  function RowToObj($row)
    {
        try
        {
            return new Pfe($row[0]['username'],$row[0]['password'],$row[0]['nom1'],$row[0]['nom2'],$row[0]['nom3'],$row[0]['prenom1'],$row[0]['prenom2'],$row[0]['prenom3'],$row[0]['email1'],$row[0]['email2'],$row[0]['email3'],$row[0]['GSM1'],$row[0]['GSM2'],$row[0]['GSM3'],$row[0]['filiere'],$row[0]['groupe'],$row[0]['date'],$row[0]['valide'],$row[0]['sujet'],$row[0]['descr'],$row[0]['preembauche'],$row[0]['motscle'],$row[0]['debut'],$row[0]['duree'],$row[0]['entreprise'],$row[0]['adresse'],$row[0]['ville'],$row[0]['encadrant_ext'],$row[0]['fonction'],$row[0]['email_encadrant_ext'],$row[0]['GSM_encadrant_ext'],$row[0]['note']);
        }catch (Exception $exception)
        {
            error_log("Invalid colums!", 3, "/log_file.log");
        }
    }

    public function checkGroupExistNomPrenom($table_pfe, $nom, $prenom)
    {
        $query = "SELECT * FROM $table_pfe WHERE `nom1`=? AND `prenom1`=?";
        $result = $this->reqController->findOne($query, [$nom, $prenom]);
        if ($result) {
            return $this->RowToObj($result);
        } else
            return false;
    }
    public function profile($table_pfe,$username){
        $query= "SELECT * from $table_pfe  WHERE `username`=?";
        $result = $this->reqController->findOne($query, [$username]);
        if ($result) {
            //print_r($result);
            return $this->RowToObj($result);
        } else
            return false;
    }
    public function checkGroupExistEmail($table_pfe, $email)
    {
        $query = "SELECT * FROM $table_pfe WHERE `email1`=?";
        $result = $this->reqController->findOne($query, [$email]);
        if ($result) {
            return $this->RowToObj($result);
        } else
            return false;
    }

    public function createGroup($table_pfe, $username, $password, $nom1, $nom2, $nom3, $prenom1, $prenom2, $prenom3, $email1, $email2, $email3, $GSM1, $GSM2, $GSM3, $filiere, $groupe, $date, $valide)
    {
        $query = "INSERT INTO  $table_pfe ( username , password , nom1, nom2 , nom3  , prenom1 , prenom2 , prenom3 ,  email1 , email2 , email3  , GSM1 , GSM2 , GSM3 , filiere , groupe , date,valide )VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $addOrNo = $this->reqController->insert($query, [$username, $password, $nom1, $nom2, $nom3, $prenom1, $prenom2, $prenom3, $email1, $email2, $email3, $GSM1, $GSM2, $GSM3, $filiere, $groupe, $date, $valide]);
        if ($addOrNo) {
            return true;
        } else
            return false;
    }

//    public function checkLogin($table_pfe, $username, $password)
//    {
//        $query = "SELECT  username , password  from $table_pfe where username=? and password=? ";
//        $result = $this->reqController->findOne($query, [$username, $password]);
//        if ($result) {
//            return $this->RowToObj($result);
//        } else
//            return false;
//    }

    public function getAllFiliere($table_pfe, $order = "id")
    {
        $query = "SELECT  *  from $table_pfe order by ? asc ";
        $result = $this->reqController->findMany($query, array($order));
        for ($i = 0; $i < count($result); $i++) {
            $tab[] = $this->RowToObj($result[$i]);
        }
        return $tab;
    }
    function protect($string)
    {
        return $this->pdo->quote(htmlspecialchars($string));
    }

    public function updateLastConsultation($table_pfe,$dateconsult,$username){
        $query = "SELECT  *  from $table_pfe SET `dateconsult`=? WHERE `username`=?";
        $result = $this->reqController->findOne($query, [$dateconsult],[$username]);
        //$query->execute(array($dateconsult, $_SESSION['username']));
        $updatedOrNo = $this->reqController->update($query,[$dateconsult],[$username]);
        if (!$updatedOrNo) {
            return false;
        }else
            return true;

    }

    public function getByFiliere($table_pfe, $filiere, $order = "id")
    {
        $query = "SELECT  *  from $table_pfe where filiere=? order by ? asc";
        $result = $this->reqController->findMany($query, [$filiere, $order]);
        for ($i = 0; $i < count($result); $i++) {
            $tab[] = $this->RowToObj($result[$i]);
        }
        return $tab;
    }

    public function getEmbauched($table_pfe, $embauche = 'non')
    {
        $query = "SELECT  *  from $table_pfe where preembauche=? ";
        $result = $this->reqController->findMany($query, [$embauche]);
        for ($i = 0; $i < count($result); $i++) {
            $tab[] = $this->RowToObj($result[$i]);
        }
        return $tab;
    }

    public function emailBeautify($email)
    {
        $email = htmlspecialchars($email);
        $email = ltrim($email);
        $email = strtolower($email);
        $email = str_replace(' ', '', $email);
        return $email;
    }

    public function GSMBeautify($gsm)
    {
        $gsm = htmlspecialchars($gsm);
        $gsm = str_replace(' ', '', $gsm);
        $gsm = str_replace('-', '', $gsm);
        $gsm = str_replace('.', '', $gsm);
        $gsm = str_replace('+212', '0', $gsm);
        $gsm = chunk_split($gsm, "2", " ");
        return $gsm;
    }

    public function prenomBeautify($prenom)
    {
        $prenom = htmlspecialchars($prenom);
        $prenom = ltrim($prenom);
        $prenom = ucfirst(strtolower($prenom));
        $prenom = str_replace('\\', '', $prenom);
        $prenom = str_replace("'", '', $prenom);
        return $prenom;
    }

    public function nomBeautify($nom)
    {
        $nom = htmlspecialchars($nom);
        $nom = strtoupper($nom);
        $nom = ltrim($nom);
        return $nom;
    }
}
