<?php
require_once '../app/controllers/loginController.php';
$dialog = "";
if (isset($_POST["submit"])){
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $login = new loginController();
        $login->login($_POST['username'],$_POST['password']);
    }
    else {
        $dialog = "<img src='img/erreur.png'> Veuillez entrer vos données d'accès! ";
    }

}

?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="PFE ENSA SAFI "/>
    <meta name="description" content="Application de Gestion des PFE | ENSA SAFI">
    <meta name="author" content="Arbani Oumaima">
    <title> Gestion des PFE </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/portfolio-item.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>

    <script>

        $(document).ready(function () {

            $("#cal").click(function () {
                $("#contenu").load("../app/views/calendrier.php");
            });

            $("#list_f").click(function () {
                $("#contenu").load("../app/views/liste_info.php");
            });

            $("#list_t").click(function () {
                $("#contenu").load("../app/views/liste_telec.php");
            });

            $("#planning").click(function () {
                $("#contenu").load("../app/views/planning_2018-2019.html");
            });

            $('a[href=#top]').click(function () {
                $('html, body').animate({scrollTop: 0}, 'slow');
                return false;
            });

        });

        function nospaces(t) {
            if (t.value.match(/\s/g)) {
                t.value = t.value.replace(/\s/g, '');
            }
        }

    </script>
</head>
<body>

<header>
    <?php include_once("../app/views/header.php"); ?>
</header>

<!-- Page Content -->
<div class="container"><br>

    <!-- Portfolio Item Row -->
    <div class="row">
        <p style="text-align: center; font-size: large; border-bottom: double lightgray;">
            <img src="img/notice.png" alt="ensa_safi">
            Cette rubrique est déstinée à la gestion des PFE pour le Département Informatique, Réseaux et
            Télécommunications</p>
    </div>


    <div class="row">
        <div class="button_nav">
            <button id="cal" type="button" class="glyphicon glyphicon-calendar	 btn btn-info"> Calendrier</button>
            <button id="list_f" type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE G-Info
            </button>
            <button id="list_t" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE GTR</button>
            <a href="../app/views/planning_2018-2019.html" target="_blank">
                <button id="planning" class="glyphicon glyphicon-calendar btn btn-info"> Planning des soutenances
                </button>
            </a>
        </div>


        <div class="col-md-8">
            <p id="contenu"> <?php include_once("../app/views/calendrier.php"); ?> </p>
        </div>

        <div class="col-md-4" style="margin-top: 3%;">
            <div id="login" class="span3 well well-large offset4">
                <p><img src="img/eleve.png" alt="ensasafi"></p>
                <h4 style="text-align:center"> S'identifier </h4>
                <p style="color: red"><?php echo $dialog; ?></p>
                <form class="form" method="post" action="">
                        <label>Nom d'utilisateur : &nbsp; </label><input type="text" name="username"
                                                                     onkeyup="nospaces(this)" required/><br><br>
                    <label>Mot de passe : &nbsp; </label><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input
                            type="password" name="password" required/><br> <br/>
                    <input class="btn btn-success" type="submit" name="submit" value=" Connexion "/>
                    <input class="  btn btn-danger" type="reset" name="submit" value=" &nbsp; Annuler &nbsp; "/><br>
                    <a href="" target="_blank"><span class="glyphicon glyphicon-refresh"></span>
                        Nom d'utilisateur ou Mot de passe oublié ?</a>
                    <br><br>
                    <a href="../app/views/register.php">
                        <button type="button" class="btn btn-lg">Créer un compte PFE</button>
                    </a>
                </form>
            </div>
        </div>

    </div>

    <hr>


    <!-- Footer -->
    <footer>
        <?php include_once("../app/views/footer.php"); ?>
    </footer>
</div>
<!-- /.container -->
</body>
</html>

