<?php
//error_reporting(E_ERROR | E_PARSE);

session_start();

if ($_SESSION['username']) {

    require_once '../models/Pfe.php';
    require_once '../Config/DataBase.php';
    $db = new DataBase();
    $pfe = new Pfe();
    $table_pfe = $db->getTablePfe();
    $res = $pfe->profile($table_pfe, $_SESSION['username']);

    if ($res == false) {
        echo ");
	document.location.href='index.php'</script>";
    } else {
        //$row = $res->fetchAll();


        $username = $res->username;
        $password = $res->password;
        $groupe = $res->groupe;

        $nom1 = $res->nom1;
        $nom2 = $res->nom2;
        $nom3 = $res->nom3;

        $prenom1 = $res->prenom1;
        $prenom2 = $res->prenom2;
        $prenom3 = $res->prenom3;


        $email1 = $res->email1;
        $email2 = $res->email2;
        $email3 = $res->email3;


        $GSM1 = $res->GSM1;
        $GSM2 = $res->GSM2;
        $GSM3 = $res->GSM3;


        $encadrant = $res->encadrant_ext;
        $email_encadrant = $res->email_encadrant_ext;
        $filiere = $res->filiere;
        $sujet = $res->sujet;

        $date = $res->date;

        $universite = "Université Cadi Ayyad";
        $ecole=" ENSA Safi";
        $groupe_label = $filiere . '-' . $groupe;
        $filename = $groupe_label . "-" . $username . ".pdf";
        $target_path = "rapports/" . $filename;
        $dep_label="Département Informatique, Réseaux et Télécommunications";

//Traitement des données

        switch ($filiere) {

            case 'T':
                $filiere_label = 'Génie Télécom et Réseaux';
                $pfa_label = 'PFE';
                break;

            case 'F':
                $filiere_label = 'Génie Informatique';
                $pfa_label = 'PFE';
                break;

        }


//Date de derniere consultation
        $dateconsult = date('m/d-H:i');
//        $sql = "UPDATE " . $table_pfe . " SET `dateconsult`=? WHERE `username`=?";
//        $query = $con->prepare($sql);
//        $query->execute(array($dateconsult, $_SESSION['username']));
        $pfe->updateLastConsultation($table_pfe, $dateconsult, $_SESSION['username'])


        ?>


        <html>

        <head>
            <title>Fiche PFE</title>
            <meta http-equiv=Content-Type content='text/html; charset=utf-8'/>
            <base target="_self">
        </head>
        <body>
        <!--email_off-->
        <div align=center id="printableArea">
            <table width="766" bgcolor="#FFFFFF"
                   style="font-family:Tahoma; font-size:10pt; border-right-width:0px; border-top-width:0px; border-bottom-width:0px"
                   height="130">
                <tr>


                    <td style="border-style:solid; border-width:1px; width: 250px;" bgcolor=#FFFFFF>
                        <p align="center">
                            <img src="../../images/irt_logo.jpg" height=108 align="center">
                    </td>


                    <td style="border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"
                        bgcolor="#F4F4F0">
                        <p align="center" style="margin-top: 0; margin-bottom: 0">
                            <font size="2"><?php echo $universite; ?><br><?php echo $ecole; ?>
                                <br><?php echo $dep_label; ?></p>


                        <p align="center" style="margin-top: 0; margin-bottom: 0">
                            &nbsp;</p>

                        <p align="center" style="margin-top: 0; margin-bottom: 0"><b>
                                <font size="5" face="Tahoma">Fiche &nbsp;<?php echo $pfa_label; ?> </font></b></p>
                        <p align="center" style="margin-top: 0; margin-bottom: 0"><b>
                                <font face="Tahoma" size="4"><?php echo $filiere_label; ?></font>
                            </b></p>
                        </font></td>
                </tr>
            </table>


            <p align="center" style="margin-top: 0; margin-bottom: 0">
                <font size="1" color="#4476C1"><b>
                        <font color="#4476C1" face="Arial"> </font></b></font></p>


            <table width="766" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">
                <tr>
                    <td colspan="3" style="border-style:none; border-width:medium; height: 6px;">


                        <p align="right" style="margin-top: 0; margin-bottom: 0">
                            <font face="Tahoma">Matricule de PFE :<font size="4"><b>&nbsp;
                                        <?php echo $groupe_label; ?> </b> </font></font>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;"
                        bgcolor="">
                        <font size="3"><b>Membres du groupe PFE</b></font></td>
                </tr>
                <tr>
                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0"><br>
                        <strong><?php echo $prenom1; ?><?php echo $nom1; ?></strong></td>

                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0"><br>
                        <strong><?php echo $email1; ?></strong></td>

                    <td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0"><br>
                        <strong><?php echo $GSM1; ?></strong></td>

                </tr>

                <tr>
                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $prenom2; ?><?php echo $nom2; ?></strong></td>

                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $email2; ?></strong></td>

                    <td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $GSM2; ?></strong></td>

                </tr>

                <tr>
                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $prenom3; ?><?php echo $nom3; ?></strong></td>

                    <td width="300" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $email3; ?></strong></td>

                    <td width="140" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <strong><?php echo $GSM3; ?></strong></td>

                </tr>


            </table>
            <br>

            <table width="766" id="table3" bgcolor="#FFFFFF"
                   style="border-width:0px; font-family: Tahoma; font-size: 10pt">
                <tr>
                    <td bgcolor="" colspan="2" style="border-left-style:none; border-left-width:medium;
		border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium;
		 border-bottom-style:solid; border-bottom-width:1px"><b><font size="3" face="Tahoma">Thème du PFE</font></b>
                    </td>
                </tr>
                <tr>
                    <td width="146" bgcolor="#F4F4F0" style="border-left-style:none; border-left-width:medium;
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"
                        valign="top"><br>Intitulé du PFE:
                    </td>
                    <td width="610" bgcolor="#F4F4F0" style="font-weight:bold; border-left-style:none; border-left-width:medium;
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"><br>


                        <p style="margin-top: 0; margin-bottom: 0">
                            <strong>
                                <?php if (file_exists($target_path)) {
                                    echo "<a style='text-decoration:yes' target='_blank' href='rapports/$filename'>";
                                } ?>
                                <?php echo $res->sujet . "</a>"; ?>
                            </strong>
                        </p>


                    </td>
                </tr>

                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium; ">
                        Description du PFE:
                    </td>
                    <td width="610"
                        style="border-style: none; border-width: medium; "><?php echo $res->descr; ?> </td>
                </tr>

                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top"
                        style="border-style: none; border-width: medium; height: 20px;">Mots-clés:
                    </td>
                    <td width="610"
                        style="border-style: none; border-width: medium; height: 20px;"><?php echo $res->motscle; ?> </td>
                </tr>

                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        &nbsp;
                    </td>
                    <td width="610" style="border-style: none; border-width: medium"></td>
                </tr>


                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">PFE
                        pré-embauche:
                    </td>
                    <td width="610"
                        style="border-style: none; border-width: medium"><?php echo $res->preembauche; ?> </td>
                </tr>

                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">Date
                        début de stage:
                    </td>
                    <td width="610" style="border-style: none; border-width: medium"><?php echo $res->debut; ?> </td>
                </tr>

                <tr>
                    <td width="146" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Durée de stage:
                    </td>
                    <td width="610" style="border-style: none; border-width: medium"><?php echo $res->duree; ?> </td>
                </tr>
            </table>


            <br>


            <table width="764" id="table2" bgcolor="#FFFFFF"
                   style="border-width:0px; font-family: Tahoma; font-size: 10pt">
                <tr>
                    <td bgcolor="" colspan="2" style="border-left-style:none; border-left-width:medium;
		border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; 
		border-bottom-style:solid; border-bottom-width:1px"><b>
                            <font size="3" face="Tahoma">
                                Entreprise &amp; Encadrement externe</font></b></td>
                </tr>
                <tr>
                    <td width="145" bgcolor="#F4F4F0" style="border-left-style:none; border-left-width:medium;
		border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium"
                        valign="top"><br>
                        Entreprise &amp; Département:
                    </td>
                    <td style="font-weight:bold; border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">
                        <br><b><?php echo $res->entreprise; ?></b></td>
                </tr>

                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Coordonnés et Web:
                    </td>
                    <td width="609" style="border-style: none; border-width: medium"><?php echo $res->adresse; ?></td>
                </tr>


                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Ville:
                    </td>
                    <td width="609" style="border-style: none; border-width: medium"><?php echo $res->ville; ?> </td>
                </tr>
                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        &nbsp;
                    </td>
                    <td width="609" style="border-style: none; border-width: medium">&nbsp;</td>
                </tr>
                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Encadrant(s) externe(s):
                    </td>
                    <td style="border-style: none; border-width: medium; font-weight:bold">
                        <b><?php echo $res->encadrant_ext; ?></b></td>
                </tr>
                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Fonction de l&#39;encadrant:
                    </td>
                    <td width="609"
                        style="border-style: none; border-width: medium"><?php echo $res->fonction; ?> </td>
                </tr>

                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Téléphone / GSM:
                    </td>
                    <td width="609"
                        style="border-style: none; border-width: medium"><?php echo $res->GSM_encadrant_ext; ?> </td>
                </tr>
                <tr>
                    <td width="145" bgcolor="#F4F4F0" valign="top" style="border-style: none; border-width: medium">
                        Email:
                    </td>
                    <td width="609"
                        style="border-style: none; border-width: medium"><?php echo $res->email_encadrant_ext; ?> </td>
                </tr>
            </table>


            <br>

            <table width="766" bgcolor="#FFFFFF" style="border-width:0px; font-family:Tahoma; font-size:10pt">

                <tr>
                    <td colspan="2" style="border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px; height: 24px;"
                        bgcolor="">
                        <font size="3"><b>Encadrement pédagogique</b></font></td>
                </tr>


                <tr>
                    <td width="248" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0"><br>
                        <p style="margin-top: 0; margin-bottom: 0">Encadrant pédagogique:</td>
                    <td style="border-style:none; border-width:medium" bgcolor="#F4F4F0"><br>
                        <p style="margin-top: 0; margin-bottom: 0"><strong>Prof. <?php echo $encadrant; ?></strong></p>
                    </td>
                </tr>
                <tr style="display:yes">
                    <td width="248" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        Email de l'encadrant
                        pédagogique:
                    </td>
                    <td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0">
                        <p style="margin-top: 0; margin-bottom: 0"><strong><?php echo $email_encadrant; ?></strong></p>
                    </td>

                </tr>


            </table>


            <br>

            <table width="766" id="table3" bgcolor="#FFFFFF"
                   style="border-width:0px; font-family: Tahoma; font-size: 10pt">


                <tr>
                    <td width="373" style="border-style:none; border-width:medium; " bgcolor="#F4F4F0" height="26">
                        <font face="Arial">Date d'enregistrement :<b> <?php echo $date; ?></b></font>


                    </td>
                    <td style="border-style:none; border-width:medium; " bgcolor="#F4F4F0" height="26" width="383">


                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="border-left-style:none; border-left-width:medium; border-right-style:none;
		border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px"
                        bgcolor="#F4F4F0" colspan="2">
                        &nbsp;<p align="center">
                </tr>
            </table>

        </div>
        <br>
        <div align="center">
            <button class=" btn btn-success " onclick="printDiv('printableArea')"> Imprimer la fiche &nbsp; <span
                        class="glyphicon glyphicon-print"></span></button>
        </div>
        <br>
        <!--/email_off-->

        </body>
        </html>


        <?php

    }


} else {
    include "interdit.php";
}


?>