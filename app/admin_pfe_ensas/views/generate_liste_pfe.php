<?php
/**
 * Created by PhpStorm.
 * User: yassine
 * Date: 10/03/2016
 * Time: 19:50
 */
include_once "../../models/Pfe.php";
include_once "../../Config/DataBase.php";
$db = new DataBase();
$pfe = new Pfe();
$table_pfe= $db->getTablePfe();

if(isset($_POST['selected_choice']) and isset($_POST['selected_ordre']) ) {
    $ordre=$_POST['selected_ordre'];
    switch ($_POST['selected_choice']) {
        case 1:
            $req = $pfe->getAllFiliere($table_pfe,$ordre);
            break;
        case 2:
            $req = $pfe->getByFiliere($table_pfe,"F",$ordre);
            break;
        case 3:
            $req = $pfe->getByFiliere($table_pfe,"T",$ordre);
            break;
        case 4:
            $req = $pfe->getEmbauched($table_pfe,'oui',$ordre);
            break;
        case 5:
            $req = $pfe->getEmbauched($table_pfe,'non',$ordre);
            break;
    }
}else{
    $req = $pfe->getAllFiliere($table_pfe,"filiere");
}
?>
<div class="col-md-12" align="center">
    <table class="table table-bordered table-responsive" style="font-size: " >
        <tr class="bg-info" style="font-family: 'Times New Roman'">
            <th>Matr</th><th>Membres et Emails</th><th>Encadrant</th><th>Ville</th><th>Inscription</th><th>Consultation</th>
        </tr>
        <?php foreach($req as $donnees){
            $username=$donnees->username;
            ?>
            <tr>
                <td><?php echo $donnees->filiere."-".$donnees->groupe; ?></td>
                <td><?php if($donnees->nom1){ echo $donnees->nom1 . "&nbsp;" . $donnees->prenom1 . "&nbsp;" ;  }?>
                    <?php if($donnees->email1){ echo "<br><em style='color:#2e6da4'>".$donnees->email1."</em>" ;}?>
                    <?php if($donnees->nom2){ echo "<br>".$donnees->nom2 . "&nbsp;" . $donnees->prenom2 . "&nbsp;" ;  }?>
                    <?php if($donnees->email2){ echo "<br><em style='color:#2e6da4'>".$donnees->email2."</em>" ;}?>
                    <?php if($donnees->nom3){ echo "<br>".$donnees->nom3 . "&nbsp;" . $donnees->prenom3 . "&nbsp;" ;  }?>
                    <?php if($donnees->email3){ echo "<br><em style='color:#2e6da4'>".$donnees->email3."</em>" ;}?>
                </td>
                <td><?php echo $donnees->encadrant; ?></td>


                <td><?php echo $donnees->ville; ?></td>


                <td><?php echo $donnees->date; ?></td>

                <td><?php echo " "; ?></td>
            </tr>


        <?php } ?>
    </table>
</div>