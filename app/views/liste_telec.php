<?php
require_once('../models/Functions.php');
$function = new Functions();
$query_tele=$function->liste_pfe("T");
$attribution_valide=$function->is_attribution_activated();

?>
<div class="col-md-12">

    <br>
    <p align="center"><span class="remarque"></span>
    <table class="table table-responsive table-bordered table-condensed">
        <tr class="bg-info" style="font-family: Calibri"><td colspan="6" style="text-align: center"><h4>Génie Télécom et Réseaux</h4></td></tr>
        <tr style="text-align: center; background-color: #f4f3f5;font-family: Calibri" ><td>N&nbsp;°</td><td> Matr</td><td>Membres</td>
            <td> Encadrant Interne</td><td>Sujet et ville</td><td>Rapport</tr>
        <?php
        $i=1;
        while($data=$query_tele->fetch()){
            if(1){
                $matricul = $data['filiere'] . '-' .$data['groupe'] ;
                $filename = $matricul . "-" . $data['username'] . ".pdf" ;
                $target_path = "rapports/" . $filename ;
                ?>
                <tr style="font-size: small;" >
                    <td><?php echo $i++;?></td><td><?php echo $data['filiere']."-".$data['groupe'];?></td>
                    <td><?php
                        if($data['nom1'] & $data['prenom1']){echo $data['nom1']."&nbsp;".$data['prenom1'];}
                        if($data['nom2'] & $data['prenom2']){echo "<br>".$data['nom2']."&nbsp;".$data['prenom2'];}
                        if($data['nom3'] & $data['prenom2']){echo "<br>".$data['nom3']."&nbsp;".$data['prenom3'];}?>
                    </td>
                    <td>
                        <?php
                        if($attribution_valide=='valide'){ echo $data['encadrant']; }
                        else{
                            echo "<img src='ressources/img/wait.png'>&nbsp;En&nbsp;Cours";
                        }
                        ?>
                    </td>
                    <td><?php echo $data['sujet']."&nbsp;<i><u>[".$data['ville']."]</strong></i></u>";?></td>
                    <td style="text-align:center" ><?php if(file_exists($target_path)) {echo"<img src='ressources/img/ok.png'>";}else{echo"&nbsp;<img src='ressources/img/wait.png'>";} ?></td>

                </tr>
            <?php } } ?>
    </table>
</div>