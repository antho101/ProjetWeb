<?php
$tmp = new BatimentDB($db);
$tmp2 = new ClasseDB($db);
$tmp3 = new MaterielDB($db);
$tmp4 = new LocauxDB($db);

if (isset($_POST["envoie"])) {
    $erreur = 0;
    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $erreur = $erreur + 1;
        $erreur_mess[$erreur] = 'login invalide';
    }
}

if (isset($_POST["ajout"])) {
    $erreur = 0;
    if (!isset($_POST['lieu']) || empty($_POST['batiment'])) {
        $erreur = $erreur + 1;
        $erreur_mess[$erreur] = 'login invalide';
    } else {
        $tmp->set_lieu_bat(lieu);
        $tmp->set_nom_bat(batiment);
        $tmp->insert();
    }
}
?>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Critère de recherche</h3>
    </div>
    <div class="panel-body">
        <form class="form-inline" action="#" role="form" method="post">
            <table>
                <tr>
                    <td style="padding-left: 5px; padding-right: 5px">
                        Trier par : 
                    </td>
                    <td>
                        <select id="choix-section" name="choix-section" class="form-control">
                            <option value="aucun" disabled selected>Toutes les sections</option>
                            <?php
                            $array = $tmp->realAll();

                            for ($i = 0; $i < count($array); $i++) {
                                echo "<option value='" . $array[$i]["nom"] . "'>" . $array[$i]["nom"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <a class="btn btn-warning" id="resetData" style="display: none;margin-left: 10px;">Annuler</a>
                    </td>
                </tr>
            </table>


        </form>
    </div>
</div>

<br/>

<table style="width:100%;background-color: #337ab7;color:white;
       padding:5px;
       /*arrondir les coins en haut à gauche et en bas à droite*/
       -moz-border-radius:10px 0;
       -webkit-border-radius:10px 0;
       border-radius:10px 0;">
    <tr>
        <td style="width: 70%; padding-left: 20px;">
            <h2 id="tables-condensed">Listes des batiments</h2>
        </td>
        <!--<td style="padding-right: 20px;"> 
            <div>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Rechercher</button>
                    </span>
                </div>
            </div>
        </td>-->
    </tr>

</table>
<br/>

  <!--<p>Add <code>.table-condensed</code> to make tables more compact by cutting cell padding in half.</p>-->
<div class="bs-example">
    <table border="1" style="border-color:rgb(248,248,248);" class="table table-condensed">
        <thead>
            <tr style="background-color:#ddd;">
                <th>#</th>
                <th>Lieu</th>
                <th>Batiments</th>
                <th>Classes</th>
            </tr>
        </thead>
        <tbody id="dataFromAjax">
            <?php
            $messagesParPage = 9; //Nous allons afficher 5 messages par page.
            $array = $tmp->readClasse();
            $array2 = $tmp4->CountB();
            $total = count($array2);

//Nous allons maintenant compter le nombre de pages.
            $nombreDePages = ceil($total / $messagesParPage);

            if (isset($_GET['np'])) { // Si la variable $_GET['page'] existe...
                $pageActuelle = intval($_GET['np']);

                if ($pageActuelle > $nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                    $pageActuelle = $nombreDePages;
                }
            } else { // Sinon
                $pageActuelle = 1; // La page actuelle est la n°1    
            }

            $premiereEntree = ($pageActuelle - 1) * $messagesParPage; // On calcul la première entrée à lire
            $i = 0;
            $pagi = $tmp4->pagination($premiereEntree);
//print_r($array); print_r(); == QUE POUR ARRAY-ARRAYLIST
            for ($i; $i < count($pagi); $i++) {
                echo"<tr class=accordeonP>";
                echo"<td> ";
                echo "ID Batiment : " . $pagi[$i]["id_batiment"] . "<br />";
                echo"</td>";
                echo"<td>";
                echo "Lieu : " . $pagi[$i]["lieu_bat"] . "<br />";
                echo"</td>";
                echo "<td>";
                echo "Nom : " . $pagi[$i]["nom"] . "<br />";
                echo"</td>";
                echo "<td>";
                echo"<a href='index.php?page=locaux&id=" . $pagi[$i]["id_local"] . "'>" . $pagi[$i]["nom_l"] . "</a>";
                echo"</td>";

                echo"</tr>";

                $arrayM = $tmp3->readLoc($pagi[$i]["id_local"]);
                if (empty($arrayM)) {
                    echo "<tr class=accordeon style='display:none;'><td colspan=4>Aucune donnée !</td></tr>";
                } else {

                    echo"<tr class=accordeon style='display:none;'><td colspan=4>Matériel<br/>"
                    . "TV : " . $arrayM["tv"] . "<br/>"
                    . "Projecteur :" . $arrayM["projecteur"] . "<br/>"
                    . "Nombre de pc :" . $arrayM["nbrePc"] . "<br/>"
                    . "</td></tr>";
                }
            }
            $dataPage = "";
            for ($m = 1; $m <= $nombreDePages; $m++) { //On fait notre boucle
                //On va faire notre condition
                if ($m == $pageActuelle) { //Si il s'agit de la page actuelle...
                    $dataPage .= ' [ ' . $m . ' ] ';
                } else { //Sinon...
                    $dataPage .= ' <a class="lien_pagination" href="index.php?page=Batiments&np=' . $m . '">' . $m . '</a> ';
                }
            }
            echo $dataPage;
            ?>

        </tbody>
    </table>
</div><!-- /example -->


<button id="addBatiment" style="float:right;" class="btn btn-primary" >Ajouter</button>

<br/>
<div id="contactForm">
    <form action="#" role="form" method="post" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title" id="myModalLabel">Batiment</h3>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Nouveau Batiment : </label>
                <input name ="Batiment" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nouveau Batiment">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Lieu : </label>
                <input name ="lieu" type="text" class="form-control" id="exampleInputEmail1" placeholder="Lieu">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a type="button" name ="ajout" value="ajout" class="btn btn-primary">Save changes</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $backUp = $("#dataFromAjax").html();
        $("#choix-section").change(function() {
            $.ajax({
                url: 'lib/ajax/ajaxBatiment.php',
                type: 'POST',
                data: {
                    section: $("#choix-section").val()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // En cas d'erreur, on le signale
                    $('#dataFromAjax').empty().append('<tr><td colspan="4"><center>Erreur</td></tr>');
                },
                success: function(data, textStatus, jqXHR) {
                    // Succes. On affiche un message de confirmation
                    $('#dataFromAjax').empty().append(data);
                    $('#resetData').slideDown("slow", function() {
                        
                    });

                }
            });
        });
        $("#resetData").click(function() {
            $("#choix-section").val("aucun");//reset la section
            $("#dataFromAjax").empty().append($backUp);//remise a 0 comme si c'était un refresh
            $(this).slideUp("slow", function() {
            });
        });
    });
</script>

<!--<script>
    var s;
    $(document).ready(function() {
        s = 0;
        $('.accordeon').hide(); // on cache tous les textes (blocs ayant la classe accordeon)
        $('.accordeonP').click(function() { // si on clique sur un titre (ici tous les éléments contenu en les balises h4)
            ///*$(this).next('tr').toggle(400);
            //return false;
            if (s == 0) {
                $(this).next('tr').slideDown(400);
                s = 1;
            } else {
                $(this).next('tr').slideUp(400);
                s = 0;
            }
        });
    });
</script>-->
<script>
    var s;
    $(document).on('ready', function() {
        s = 0;
        $('.accordeon').hide(); // on cache tous les textes (blocs ayant la classe accordeon)
        $(document).on('click', '.accordeonP', function() { // si on clique sur un titre (ici tous les éléments contenu en les balises h4)
            ///*$(this).next('tr').toggle(400);
            //return false;
            if (s == 0) {
                $(this).next('tr').slideDown(400);
                s = 1;
            } else {
                $(this).next('tr').slideUp(400);
                s = 0;
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#contactForm').hide(); // on cache tous les textes (blocs ayant la classe accordeon)
        $('#addBatiment').click(function() { // si on clique sur un titre (ici tous les éléments contenu en les balises h4)
            $('#contactForm').toggle(400);
            return false;
        });
    });
</script>