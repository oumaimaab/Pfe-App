
<?php
session_start();
if(isset($_SESSION['username'])) {
    require_once '../Config/DataBase.php';
    require_once '../models/Pfe.php';
    $database = new DataBase();
    $pfe = new Pfe();
    $table_pfe=$database->getTablePfe();
    $today = mktime(0, 0, 0, date("m"), date("d"), date("y"));
    $user = $pfe->profile($table_pfe,$_SESSION['username']);
    if (!$user instanceof Pfe) {
        echo "<script language=\"Javascript\" type=\"text/javascript\">
	    alert(\" Cette Utilisateur n'existe pas !! \")
	        document.location.href='index.php'</script>";
    } else {

        $username = $user->username;
        $nom1 = $user->nom1;
        $nom2 = $user->nom2;
        $nom3 = $user->nom3;
        $prenom1 = $user->prenom1;
        $prenom2 = $user->prenom2;
        $prenom3 = $user->prenom3;
        $filiere = $user->filiere;
        $groupe = $user->groupe;
        $groupe_label = $filiere . '-' . $groupe;
        $encadrant = $user->encadrant_ext;
        $email_encadrant = $user->email_encadrant_ext;
        $sujet = $user->sujet;
        $filename = $groupe_label . "-" . $username . ".pdf";
        $target_path = "rapports/" . $filename;
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
            <script src="../../public/js/jquery.min.js"></script>
            <script>
                var clignotement = function(){
                    if (document.getElementById('DivClignotante').style.visibility=='visible'){
                        document.getElementById('DivClignotante').style.visibility='hidden';
                    }
                    else{
                        document.getElementById('DivClignotante').style.visibility='visible';
                    }
                };
                // mise en place de l appel de la fonction toutes les 0.8 secondes
                // Pour arrêter le clignotement : clearInterval(periode);
                periode = setInterval(clignotement, 800);
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
                var list_show=-1;
                $(document).ready(function(){
                    $("#nav_mod_pfe").click(function(){
                        $("#main_content").load("downloads.php");
                    });
                    $("#nav_list_pfe").click(function(){
                        if(list_show==-1){
                            $("#nav_pfe_inf").show(); $("#nav_pfe_gtr").show(); list_show*=-1;
                        }
                        else{
                            $("#nav_pfe_inf").hide(); $("#nav_pfe_gtr").hide();list_show*=-1
                        }
                    });
                    $("#nav_pfe_inf").click(function(){
                        $("#main_content").load("liste_info.php");
                    });
                    $("#nav_pfe_gtr").click(function(){
                        $("#main_content").load("liste_telec.php");
                    });
                    $("#nav_fiche_pfe").click(function(){
                        $("#main_content").load("profile.php");
                    });
                    $("#btn_update_data").click(function(){
                        $("#main_content").load("updatedata.php");
                    });
                    $("#nav_form_pfe").click(function(){
                        $("#main_content").load("updatedata.php");nav_doc_util
                    });
                    $("#nav_doc_util").click(function(){
                        $("#main_content").load("documents.php");
                    });
                    $("#nav_rap_pfe").click(function(){
                        $("#main_content").load("<?php echo "updatepdf.php?user=".$_SESSION['username']?>");
                    });
                    $("#nav_stn_pfe").click(function(){
                        $("#main_content").load("planning1.php");
                    });
                    $('a[href=#top]').click(function(){
                        $('html, body').animate({scrollTop:0}, 'slow');
                        return false;
                    });
                });
            </script>
            <style>
                #main_content{
                    margin-top: 2%;
                }
                .warning{
                    margin-top: 2%;
                }
                #btn_update_data{
                    width: auto;
                }
            </style>
        </head>
        <body>
        <header>
            <?php include_once ("header.php");?>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-2" >
                    <div class="row" align="center" >
                        <p><br><b>  ✔ Groupe  : <?php echo $groupe_label;  ?></b></p>
                        <p> <?php echo  $nom1 . " " . $prenom1; ?><br>
                            <?php echo $nom2 . " " . $prenom2; ?><br>
                            <?php echo $nom3 . " " . $prenom3; ?>
                        </p>
                    </div>

                    <div class="row nav" align="center">
                        <p style="width:180px;text-align: center; " class="bg-success" >  Menu  </p>
                        <p><button id="nav_mod_pfe"   style="width:180px;text-align: left; "   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Modalités des PFE </button></p>
                        <p><button id="nav_list_pfe"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Liste des PFE </button></p>
                        <p><button id="nav_pfe_inf"   style="width: 180px;text-align: left; display: none"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Liste PFE G-Info </button></p>
                        <p><button id="nav_pfe_gtr"   style="width: 180px;text-align: left; display: none"   type="button" class="glyphicon glyphicon-list-alt btn btn-danger"> Liste PFE GTR </button></p>
                        <p><button id="nav_fiche_pfe" style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Ma fiche PFE </button></p>
                        <p><button id="nav_form_pfe"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Formulaire PFE </button></p>
                        <p><button id="nav_doc_util"  style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Documents Utiles </button></p>
                        <p><button id="nav_rap_pfe"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Rapport PFE </button></p>
                        <p><button id="nav_stn_pfe"   style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-list-alt btn btn-info"> Soutenances PFE </button></p>
                        <p><a href="logout.php"><button id="nav_off"       style="width: 180px;text-align: left;"   type="button" class="glyphicon glyphicon-off btn btn-info"> Déconnexion </button></a></p>

                    </div>

                </div>
                <div class="col-md-10">
                    <?php if(!$sujet){ ?> <p align="center" class="warning" > <button id="btn_update_data" class="btn btn-danger "><em id="DivClignotante" style="visibility:visible;" >Vous devez compléter votre formulaire PFE !! </em> </button></p><?php } ?>
                </div>
                <div class="col-md-10" id="main_content"  >
                    <?php include "calendrier.php" ; ?>
                </div>
            </div><hr>
            <!-- Footer -->
            <footer>
                <?php include_once ("footer.php");?>
            </footer>
        </div>
        </body>
        </html>
        <?php
    }
}
else{
    //print_r($_SESSION['username']);
    include "interdit.php";
}
?>

