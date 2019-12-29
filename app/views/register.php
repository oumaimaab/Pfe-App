<?php
require_once '../Config/DataBase.php';
require_once '../models/Pfe.php';
$database = new DataBase();
$pfe = new Pfe();
if (!isset($_POST['submit'])) {
    $today = mktime(0, 0, 0, date("m"), date("d"), date("y"));
    if ($today >= $database->getDatelimins()) {
        include "expiration.php";
    } else {
        include "../views/formulaire.php";
    }
} else // begin else 1
{

    $filiere	= htmlspecialchars($_POST['filiere']);
    $username	= htmlspecialchars($_POST['username']);
    $password	= htmlspecialchars($_POST['password']);
    $password2	= htmlspecialchars($_POST['password2']);
    $nom1=$pfe->nomBeautify($_POST['nom1']);
    $nom2=$pfe->nomBeautify($_POST['nom2']);
    $nom3=$pfe->nomBeautify($_POST['nom3']);
    $prenom1=$pfe->prenomBeautify($_POST['prenom1']);
    $prenom2=$pfe->prenomBeautify($_POST['prenom2']);
    $prenom3=$pfe->prenomBeautify($_POST['prenom3']);
    $GSM1=$pfe->GSMBeautify($_POST['GSM1']);
    $GSM2=$pfe->GSMBeautify($_POST['GSM2']);
    $GSM3=$pfe->GSMBeautify($_POST['GSM3']);
    $email1 = $pfe->emailBeautify($_POST['email1']);
    $email2 = $pfe->emailBeautify($_POST['email2']);
    $email3 = $pfe->emailBeautify($_POST['email3']);
    $emails = $email1 . ', ' . $email2 . ', ' . $email3  ;
    $date = date('Y/m/d-H:i');
    //$matricule du groupe
    // Calculer le num du dernier groupe créé
    $tab_groups = $pfe->getAllFiliere($table_pfe);
    $groupe = 0;
    $groupes = [];
    for ($i = 0; $i < count($tab_groups); $i++) {
        $groupes[$i] = $tab_groups[$i]->groupe;
    }
    if ($groupes) { $groupe = max($groupes)+1; } else { $groupe = 1;}
    if ($groupe <10) {$groupe = '0' . $groupe;}
    $groupe_label = $filiere . '-' . $groupe ;
    $errors = array();
    // generate Token :
    $length = 20;
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $token= $groupe.$randomString ;
    // fin
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] ){
        $secret_key="6LdeIBsUAAAAACkXfjBErRIo6pWukTho5RPqpOvo";
        $ip=$_SERVER['REMOTE_ADDR'];
        $captcha=$_POST['g-recaptcha-response'];
        $rsp=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$ip);
        $arr=json_decode($rsp,TRUE);
        if(!($arr['success'])){
            $errors[] = "Verification Captcha non valide ! ";
        }
    }else{
        $errors[] = "Verification Captcha non valide ! ";
    }

    if ($_POST['password'] != $_POST['password2'])
    {
        $errors[] = "Mot de passe mal confirmé!";
    }
    if(strpos($username, " ") !== false)
    {
        $errors[] = "Votre Username ne doit pas contenir un espace !";
    }

    $regex = "/^[a-z0-9]+([_\.-][a-z0-9]+)*@([a-z0-9]+([.-][a-z0-9]+)*)+\.[a-z]{2,}$/i";
    if((!preg_match($regex, $email1) & $email1) ||
        (!preg_match($regex, $email2) & $email2) ||
        (!preg_match($regex, $email3) & $email3)  )
    {
        $errors[] = "Adresse email non valide !";
    }
    if(!$filiere || !$username  || !$password || !$nom1 || !$prenom1 || !$GSM1 || !$email1  )
    {
        $errors[] = "Formulaire incompet ! ";
    }
    $groupTempObject = $pfe->checkGroupExist($table_pfe,$username);
    if($groupTempObject instanceof Pfe)
    {
        $errors[] = "Nom Utilisateur déjà utilisé !";
    }
    $groupTempObject = $pfe->checkGroupExistNomPrenom($table_pfe,$nom1,$prenom1);
    if($groupTempObject instanceof Pfe)
    {
        $errors[] = "Vous êtes déjà inscrit !";
    }
    $groupTempObject = $pfe->checkGroupExistEmail($table_pfe,$email1);
    if($groupTempObject instanceof Pfe)
    {
        $errors[] = "Email déjà inscrit !";
    }
    if(count($errors) > 0)
    {
        ?>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Abainou Yasine">
            <title> Gestion des PFE </title>
            <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
            <link href="../../public/css/portfolio-item.css" rel="stylesheet">
            <style>
                .monter{
                    display: none;
                }
                p{
                    text-align: center;
                }
            </style>
        </head>
        <body>
        <header>
            <?php include_once("../views/header.php");?>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><br>
                    <p class="bg-danger"><strong>Des erreurs ont été détectées lors de l'enregistrement </strong> </p>
                    <?php
                    foreach($errors AS $error)
                    {?>
                        <p><img src="../../public/img/erreur.png">  <?php echo $error ; ?> </p>
                    <?php } ?>
                    <p class="bg-success"><a href="javascript:history.go(-1)"> Recommencer </a></p>
                </div>
            </div><hr>
            <footer>
                <?php include_once("footer.php");?>
            </footer>
        </div>
        </body>
        </html>>

        <?php
    }
    else // begin else 2
    {

        // create the group
        if($pfe->createGroup($table_pfe,$username , $password , $nom1 , $nom2 , $nom3 , $prenom1 , $prenom2 ,$prenom3,$email1,$email2,$email3,$GSM1,$GSM2,$GSM3,$filiere,$groupe,$date,1)){
            // header("location:index.php");
        }
        $subject = "Activation du compte PFE";
        $lien_activation="/activation.php?token=".$token;
        $message = "
         <html>
            <body>
                <p>Votre Formulaire a &eacute;t&eacute; rempli avec succ&eacute;s  ! <br>
                <p>Vous devez activer votre compte PFE en <a href='".$lien_activation."'> Cliquant-Ici</a> .</p>
				<p>Si le lien ne fonctionne pas , copier/coller le lien suivant : <strong>$lien_activation</strong> </p>
                 <p>ENSA Safi (C) 2019</p>
            </body>
         </html> ";
        //mail($emails, $subject, $message, $headers) ;

        ?>

        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="IRT">
            <title> Gestion des PFE </title>
            <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
            <link href="../../public/css/portfolio-item.css" rel="stylesheet">
            <style>
                .monter{
                    display: none;
                }
                p{
                    text-align: center;
                }
            </style>
        </head>
        <body>
        <header>
            <?php include_once("header.php");?>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12"  align="center"><br>
                    <p class="bg-success">Le formulaire en ligne a &eacute;t&eacute; rempli avec succ&eacute;s.</p>
                    <p class=" glyphicon glyphicon-envelope	 "  > Un email vous a été envoy&eacute; pour activer votre compte PFE  ! </p>
                    <p>Si vous n'avez pas reçu cet email, veuillez consultez votre dossier <strong>"Spam" / "courrier ind&eacute;sirable" </strong></p>
                </div>
            </div><hr>
            <footer>
                <?php include_once("../views/footer.php");?>
            </footer>
        </div>
        </body>
        </html>>
        <?php
    } // fin else 2
} // fin else 1
?>