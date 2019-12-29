<?php
require_once "../controllers/ReqController.php";


class Prof
{
    public static $table_pfe = 'ensas_pfe';
    public static $table_profs = 'ensas_pfe_profs';
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $GSM;
    private $jury;
    private $salle;
    private $observations;
    private $specialite;
    private $login;
    private $pass;
    private $reqController;
    /**
     * Prof constructor.
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $email
     * @param $GSM
     * @param $jury
     * @param $salle
     * @param $observations
     * @param $specialite
     * @param $login
     * @param $pass
     */

    /**
     * Prof constructor.
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $email
     * @param $GSM
     * @param $jury
     * @param $salle
     * @param $observations
     * @param $specialite
     * @param $login
     * @param $pass
     */
    public function __construct($id = "", $nom = "", $prenom = "", $email = "", $GSM = "", $jury = "", $salle = "", $observations = "", $specialite = "", $login = "", $pass = "")
    {
        $this->reqController = new ReqController();
        $this->id = $id;
        $this->nom = $this->nomBeautify($nom);
        $this->prenom = $this->prenomBeautify($prenom);
        $this->email = $this->emailBeautify($email);
        $this->GSM = $this->GSMBeautify($GSM);
        $this->jury = $jury;
        $this->salle = $salle;
        $this->observations = $observations;
        $this->specialite = $specialite;
        $this->login = $this->reqController->protect($login);
        $this->pass = $this->reqController->protect($pass);
        $date = date('Y/m/d-H:i');
    }

    public function nomBeautify($nom)
    {
        $nom = htmlspecialchars($nom);
        $nom = strtoupper($nom);
        $nom = ltrim($nom);
        return $nom;
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

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $id
     * @return Prof
     */
    public function getProfByID($id)
    {
        $sql = "SELECT * FROM " . self::$table_profs . " where id = ?";
        $param = array($id);
        return $this->RowToObj($this->reqController->findOne($sql, $param));
    }

    /**
     * @param $row
     * @return Prof
     */
    public function RowToObj($row)
    {
        try {
            return new Prof($row['id'], $row['nom'], $row['prenom'],
                $row['email'], $row['GSM'], $row['jury'],
                $row['salle'], $row['observations'], $row['specialite'],
                $row['login'], $row['password']);
        } catch (Exception $exception) {
            error_log(date("Y-m-d h:m:s") . "Invalid colums!", 3, ROOT . "log_file.log");
            return null;
        }
    }

    /**
     * @param $id
     * @return Prof
     */
    public function getProfByUsername($id)
    {
        $sql = "SELECT * FROM " . self::$table_profs . " where username = ?";
        $param = array($id);
        return $this->RowToObj($this->reqController->findOne($sql, $param));
    }

    /**
     * @return array
     */
    public function getListProf()
    {
        $sql = "SELECT * FROM " . self::$table_profs;
        $tab = array();
        $result = $this->reqController->findAll($sql);
        while ($tmp = $result->fetch()) {
            $tab[] = $this->RowToObj($tmp);
        }
        return $tab;
    }

    /**
     * @param $prof
     */
    public function UpdateProf()
    {
        $errors = $this->protectFeatures();
        $this->jury = protect($this->jury);
        $this->salle = protect($this->salle);
        if (count($errors) > 0)
            return $errors;
        try {
            $sql = "Update " . self::$table_profs . " SET `nom`=?,`prenom`=?,`email`=?,`GSM`=?,`jury`=?,`salle`=?,`observations`=?,`specialite`=?,`login`=?,`password`=? where id = ?";
            $params = [$this->nom, $this->prenom, $this->email, $this->GSM, $this->jury,
                $this->salle, $this->observations, $this->specialite, $this->login, $this->pass, $this->id];

            $this->reqController->update($sql, $params);
            return null;
        } catch (Exception $exception) {
            error_log(date("Y-m-d h:m:s") . $exception->getMessage(), 3, ROOT . "log_file.log");
        }
    }

    private function protectFeatures()
    {
        $errors = array();
        $msg = $this->checkEmailRegEx($this->email);
        if ($msg != "1")
            $errors[] = $msg;
        if (!$this->nom || !$this->prenom || !$this->email) {
            $errors[] = "Formulaire incompet ! ";
        }
        $var = $this->getProfByName($this->nom);
        if ($var->id != "" && $var->id != null) {
            $errors[] = "Encadrant deja inscrit !";
        }
        if (count($errors) > 0)
            return $errors;
        $this->pass = $this->reqController->protect($this->pass);
        $this->nom = $this->nomBeautify($this->nom);
        $this->prenom = $this->prenomBeautify($this->prenom);
        $this->email = $this->emailBeautify($this->email);
        $this->GSM = $this->GSMBeautify($this->GSM);
    }

    public function checkEmailRegEx($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            return "Adresse email non valide !";
        return 1;
    }

    /**
     * @param $id
     * @return Prof
     */
    public function getProfByName($id)
    {
        $sql = "SELECT * FROM " . self::$table_profs . " where nom = ?";
        $param = array($id);
        return $this->RowToObj($this->reqController->findOne($sql, $param));
    }

    /**
     * @param $id
     */
    public function DeleteProfByID($id)
    {
        try {
            $sql = "DELETE from " . self::$table_profs . " Where id = ?";
            $params = [$id];
            $this->reqController->delete($sql, $params);
        } catch (Exception $exception) {
            error_log(date("Y-m-d h:m:s") . "Error while deleting !", 3, ROOT . "log_file.log");
        }
    }

    /**
     * @param $login
     * @param $pass
     * @return bool
     */
    function protect($string)
    {
        return $this->pdo->quote(htmlspecialchars($string));
    }
    public function checkLogin($login, $pass)
    {
        $sql = "SELECT * FROM admin WHERE login = ? and password = ?";
        $param = [$login, $pass];
        $result = $this->reqController->findOne($sql, $param);
        if ($result != null) {
            $this->fillFromRow($result);
            echo $this;
            return true;
        }
        return false;
    }

    /**
     * @param $row
     */
    public function fillFromRow($row)
    {
        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->email = $row['email'];
        $this->GSM = $row['GSM'];
        $this->jury = $row['jury'];
        $this->salle = $row['salle'];
        $this->observations = $row['observations'];
        $this->specialite = $row['specialite'];
        $this->login = $row['login'];
        $this->pass = $row['password'];
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function InsertProf()
    {
        $errors = $this->protectFeatures();
        if (count($errors) > 0)
            return $errors;
        $sql = "INSERT INTO " . self::$table_profs . " ( nom , prenom , GSM , email,login,password ) VALUES(?,?,?,?,?,? )";
        $param = [$this->nom, $this->prenom, $this->GSM, $this->email, $this->login, $this->pass];
        $this->reqController->insert($sql, $param);
        return null;
    }
}