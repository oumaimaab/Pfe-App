<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 18/02/2016
 * Time: 08:16
 */
//session_start();

/*if($_SERVER["HTTPS"] != "on") {
   header("Location: https://fcensas.com/pfe/admin_pfe_ensas");
}*/

include_once('../models/Functions.php');
include_once('../models/Admin.php');

$dialog = "";

if (isset($_POST['submit'])) {
    $admin = new Admin();
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $admin = new Admin();
        print_r($admin->getAdmin());
        $user = $admin->protect($_POST['user']);
        $pass = $admin->protect($_POST['pass']);
        $admin->checkLogin($_POST['user'], $_POST['pass']);
    }
}
//else {
//    $dialog = "<img src='../../public/img/erreur.png'> Données non valides ou compte inexistant !";
//    //print_r($admin->getAdmin());
//}
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
        .monter {
            display: none;
        }

        #login_box {
            margin-top: 2%;
        }

    </style>
</head>
<body>
<header>
    <?php include_once("../views/header.php"); ?>
</header>
<div class="container">
    <div class="row">
        <div id="login_box" class="col-md-4 col-md-offset-4 " align="center">
            <p align="center"><img src="../../public//img/attention.png"></p>
            <p style="text-align:center;font-size: large;font-family:'Lucida Fax' "> Accès réservé au corps
                professoral </p>
            <hr>
            <p style="color: red"><?php echo $dialog; ?></p>
            <form class="form" method="post" action="index.php"><br>
                <label> Nom d'utilisateur : &nbsp; </label><input type="text" name="user" required/><br><br>
                <label>Mot de passe : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label><input type="password" name="pass"
                                                                                          required/><br> <br/>
                <input class="btn btn-success" type="submit" name="submit" value=" Connexion "/>
                <input class="  btn btn-danger" type="reset" name="submit" value=" &nbsp; Annuler &nbsp; "/><br><br>
            </form>
        </div>
    </div>
    <hr>
    <hr>
    <!-- Footer -->
    <footer>
        <?php include_once("../views/footer.php"); ?>
    </footer>
</div>
</body>
</html>