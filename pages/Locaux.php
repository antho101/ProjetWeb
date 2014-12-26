
<?php
$tmp = new LocauxDB($db);
$tmp3 = new MaterielDB($db);
$tmp2 = new BatimentDB($db);
$erreur = 0;
$arrayTmp;
if (isset($_POST["envoie"])) {
    /* echo "places : ".$_POST['places'];
      echo "tv : ".$_POST['tv'];
      echo "pro : ".$_POST['pro'];
      echo "nbrePC : ".$_POST['nbrePC']; */
    $tv;
    $pro;
    if (!isset($_POST['nbrePC']) || empty($_POST['nbrePC']) || ($_POST['nbrePC'] == "Nombre de PC dans le local" )) {
        $erreur = $erreur + 1;
        $erreur_mess[$erreur] = 'Entrez un nombre de PC';
    }
    if (!isset($_POST['places']) || empty($_POST['places']) || ($_POST['places'] == "Places" )) {
        $erreur = $erreur + 1;
        $erreur_mess[$erreur] = 'Entrez le nombre de places';
    } else {
        $places = $_POST['places'];
    }
    if (!isset($_POST['tv']) || empty($_POST['tv'])) {
        $tv = 0;
    } else {
        $tv = 1;
    }
    if (!isset($_POST['pro']) || empty($_POST['pro'])) {
        $pro = 0;
    } else {
        $pro = 1;
    }

    if ($erreur == 0) {

        $tmp->insert($_GET['id'], $places);
        if ($tmp->insert($_GET['id'], $places) == 1) {
            $arrayTmp = $tmp3->readLoc($_GET['id']);
            if (empty($arrayTmp)) {
                $tmp3->insert($_GET['id'], $tv, $pro, $_POST['nbrePC']);
                if ($tmp3->insert($_GET['id'], $tv, $pro, $_POST['nbrePC']) == 1) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">INSERTION REUSSITE</div>";
                } else {
                    $erreur_mess[$erreur] = 'ERREUR LORS DE L INSERTION DU MATERIEL';
                }
            } else {
                $tmp3->update($_GET['id'], $tv, $pro, $_POST['nbrePC']);
                if ($tmp3->update($_GET['id'], $tv, $pro, $_POST['nbrePC']) == 1) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">MISE A JOUR REUSSITE</div>";
                } else {
                    $erreur_mess[$erreur] = 'ERREUR LORS DE LA MISE A JOUR DU MATERIEL';
                }
            }
        } else {
            $erreur_mess[$erreur] = 'ERREUR LORS DE L INSERTION DU LOCAL';
        }
    }
}
?>
<?php
if ($erreur != 0) {
    foreach ($erreur_mess as $key => $value) {
//echo '<div id="erreur">erreur #' . $key . ': ' . $value . '</div><br/>';
        echo '<div class="alert alert-danger" role="alert" >
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                ' . $value . '
                                </div>';
    }
}
?>
<table style="width:100%;background-color: #337ab7;color:white;
       padding:5px;
       /*arrondir les coins en haut à gauche et en bas à droite*/
       -moz-border-radius:10px 0;
       -webkit-border-radius:10px 0;
       border-radius:10px 0;">
    <tr>
        <td style="width: 70%; padding-left: 20px;">
            <h2 id="tables-condensed">Listes des locaux</h2>
        </td>

    </tr>

</table>
<br/>

<form action="#" method="post" role="form" >
    <?php
    $info = $tmp->read($_GET['id']);
    $i = 0;
    $infob = $tmp2->read($info[$i]["id_batiment"]);
    $infom = $tmp3->readLoc($info[$i]["id_local"]);
    echo"<h1> Local : " . $info[$i]["nom_l"] . " <br/>"
    . "<h3> Capacité : " . $info[$i]["capacite"] . " </h3>"
    . "<h3>" . $infob[$i]["nom"] . " </h3><br/>";
    if (empty($infom)) {
        echo "<table><tr><td colspan=4>Aucun matériel electronique dans cette classe !</td></tr></table>";
    } else {

        echo"<table><tr ><td colspan=4><h3>Matériel</h3>"
        . "TV : " . $infom["tv"] . "<br/>"
        . "Projecteur :" . $infom["projecteur"] . "<br/>"
        . "Nombre de pc :" . $infom["nbrePc"] . "<br/>"
        . "</td></tr></table>";
    }
    ?>
    <button id="modifier" style="float:right;" class="btn btn-primary" >Modifier</button>
    <div id="formmodif" style="margin-top:2%;">
        <label for="">Nombres de place dans le local</label>
        <select class="form-control" name="places">
            <option value="aucun" disabled selected >Places : </option>
            <?php
            for ($i = 1; $i < 101; $i++) {
                echo"<option>" . $i . "</option>";
            }
            ?>
        </select><br/>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="tv"> TELEVISION
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="pro"> PROJECTEUR
            </label>
        </div><br/>
        <label for="">NOMBRES DE PC</label>
        <select class="form-control" name="nbrePC">
            <option value="aucun" disabled selected >Nombre de PC dans le local </option>
            <?php
            for ($i = 0; $i < 51; $i++) {
                echo"<option>" . $i . "</option>";
            }
            ?>

        </select>	<br/><br/>
        <button id="" value="envoie" name="envoie" style="float:right;" class="btn btn-primary" >Appliquer</button>

    </div>
    <div id="contactForm">
        <br/><br/>
        <div class="form-group">
            <label for="exampleInputPassword1"> Votre mot de passe</label>
            <input type="password" name ="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div></div> 

</form><br/>


<script>
    $(document).ready(function() {
        $('#contactForm').hide(); // on cache tous les textes (blocs ayant la classe accordeon)
        $('#addBatiment').click(function() { // si on clique sur un titre (ici tous les éléments contenu en les balises h4)
            $('#contactForm').toggle(400);
            return false;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#formmodif').hide(); // on cache tous les textes (blocs ayant la classe accordeon)
        $('#modifier').click(function() { // si on clique sur un titre (ici tous les éléments contenu en les balises h4)
            $('#formmodif').toggle(400);
            return false;
        });
    });
</script>