<?php

require_once "../Config/DataBase2.php";

class Functions
{
    public function liste_pfe($filiere)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare("SELECT * FROM ensas_pfe WHERE filiere = ?  ORDER BY groupe ");
        $req->execute(array(trim($filiere)));
        return $req;
    }

    public function is_username_existe($username)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT username FROM ensas_pfe WHERE username = ?');
        $req->execute(array(trim($username)));
        if ($req->fetch()) {
            return "<img src='ressources/img/erreur.png'> Nom Utilisateur déjà utilisé !";
        } else return "<img src='ressources/img/ok.png'>";
    }

    public function is_user_existe($nom, $prenom)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE nom1 = ? AND prenom1=? ');
        $req->execute(array(trim($nom), trim($prenom)));
        if ($req->fetch()) {
            return "<img src='ressources/img/erreur.png'> Vous êtes déjà inscrit  !";
        } else return "<img src='ressources/img/ok.png'>";
    }

    public function is_email_existe($email)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 =? ');
        $req->execute(array(trim($email)));
        if ($req->fetch()) {
            return "<img src='ressources/img/erreur.png'> &nbsp;Email déjà inscrit !";
        } else return "<img src='ressources/img/ok.png'>";
    }


    public function is_email_existe_2($email)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = ? ');
        $req->execute(array(trim($email)));
        if ($req->fetch()) {
            return "<img src='ressources/img/ok.png'>";
        } else return "<img src='ressources/img/erreur.png'>&nbsp;Email n'existe pas  !";
    }

    public function is_email_existe_3($email)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = ? ');
        $req->execute(array(trim($email)));
        if ($req->fetch()) {
            return true;
        } else return false;
    }

    public function verify_prof($login, $passe)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe_profs WHERE login = ? AND passe = ? ');
        $req->execute(array(htmlspecialchars(trim($login)), htmlspecialchars(trim($passe))));
        return $req;
    }

    public function get_email($login)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT email FROM ensas_pfe_profs WHERE login = ?  ');
        $req->execute(array(htmlspecialchars(trim($login))
        ));
        $email = $req->fetch();
        return $email['email'];
    }


    public function update_encadrant($groupe, $encadrant)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();

        $req = $bdd->prepare('SELECT email FROM ensas_pfe_profs WHERE nom = ?  ');
        $req->execute(array(htmlspecialchars(trim($encadrant))));
        $email_prof = $req->fetch();

        $req2 = $bdd->prepare('UPDATE ensas_pfe SET encadrant= ?,email_encadrant=?  WHERE groupe = ?');
        $req2->execute(array($groupe, $encadrant, $email_prof['email']));
    }

    public function recover_password_from_email($email)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();

        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE email1 = :email1 ');
        $req->execute(array(
            ':email1' => htmlspecialchars(trim($email))
        ));
        $data = $req->fetch();
        $emails2 = $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'];
        $username = $data['username'];
        $req2 = $bdd->prepare('SELECT password FROM ensas_pfe WHERE email1 = :email1 ');
        $req2->execute(array(
            ':email1' => htmlspecialchars(trim($email))
        ));
        $password = $req2->fetch();
        $password = $password['password'];
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: ENSAS - IRT <ensas.admin@gmail.com>\n";
        $to = $emails2;
        $subject = "Récupération du mot de passe";
        $message = "
<html>
<body>
<p>Vous avez demandé la récupération du mot de passe de votre compte PFE | Ensa Safi  ! <br>
Votre Username est : <strong>$username</strong><br>
 Votre mot de passe est : <strong>$password</strong> </p>
<p>ENSA Safi (C) 2016</p>
</body>
</html> ";
        mail($to, $subject, $message, $headers);
    }

    public function verify_token($token)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();

        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE token = :token ');
        $req->execute(array(
            ':token' => htmlspecialchars(trim($token))
        ));
        return $req;
    }


    public function validate_account($token)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req2 = $bdd->prepare('UPDATE ensas_pfe_options SET valide= ?  WHERE token = ?');
        $req2->execute(array(1, $token));
    }


    public function is_attribution_activated()
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->query("SELECT valeur FROM ensas_pfe_options WHERE label = 'prof_attrib_valide' ");
        $req = $req->fetch();
        return $req['valeur'];

    }


    public function get_groupes_by_prof($encadrant)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT * FROM ensas_pfe WHERE encadrant = :encadrant');
        $req->execute(array(
            ':encadrant' => htmlspecialchars(trim($encadrant))
        ));
        return $req;
    }

    public function get_emails_of_groupe($groupe)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT email1,email2,email3 FROM ensas_pfe WHERE groupe = ? ');
        $req->execute(array(htmlspecialchars(trim($groupe))));
        $req = $req->fetch();
        return $req;
    }

    public function get_emails_by_params($param)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $emails = "";
        switch ($param) {
            case 1:
                $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe");
                while ($data = $req->fetch()) {
                    $emails .= $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'] . ', ';
                }
                break;
            case 2:
                $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe WHERE filiere='F'  ");
                while ($data = $req->fetch()) {
                    $emails .= $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'] . ', ';
                }
                break;
            case 3:
                $req = $bdd->query("SELECT email1,email2,email3 FROM ensas_pfe WHERE filiere='T' ");
                while ($data = $req->fetch()) {
                    $emails .= $data['email1'] . ', ' . $data['email2'] . ', ' . $data['email3'] . ', ';
                }
                break;
            case 4:
                $req = $bdd->query("SELECT email FROM ensas_pfe_profs ");
                while ($data = $req->fetch()) {
                    $emails .= $data['email'] . ', ';
                }
                break;
        }

        return $emails;
    }

    public function get_option_value($option_label)
    {
        $dataBase = new DataBase2();
        $bdd = $dataBase->connexionBdd();
        $req = $bdd->prepare('SELECT valeur FROM ensas_pfe_options WHERE label = ? ');
        $req->execute(array(htmlspecialchars(trim($option_label))));
        $req = $req->fetch();
        return $req['valeur'];
    }


}