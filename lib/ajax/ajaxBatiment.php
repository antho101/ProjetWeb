<?php

include ('../php/db_pg.php');
include ('../php/classes/Batiment.class.php');
include ('../php/classes/BatimentDB.class.php');
include ('../php/classes/Materiel.class.php');
include ('../php/classes/MaterielDB.class.php');
include ('../php/classes/connexion.class.php');
$db = Connexion::getInstance($dsn, $user, $pass);
$tmp3 = new MaterielDB($db);
$arrayAjaxLocaux = array();
$arrayM = array();
$tmpAjax = new BatimentDB($db);
$arrayAjaxLocaux = $tmpAjax->getByName($_POST["section"]);
if (count($arrayAjaxLocaux) > 0) {
    $data = "";
    for ($i = 0; $i < count($arrayAjaxLocaux); $i++) {
        $data .= "<tr class=accordeonP>";
        $data .= "<td> ";
        $data .= "ID Batiment : " . $arrayAjaxLocaux[$i]["id_batiment"] . "<br />";
        $data .= "</td>";
        $data .= "<td>";
        $data .= "Lieu : " . $arrayAjaxLocaux[$i]["lieu_bat"] . "<br />";
        $data .= "</td>";
        $data .= "<td>";
        $data .= "Nom : " . $arrayAjaxLocaux[$i]["nom"] . "<br />";
        $data .= "</td>";
        $data .= "<td>";
        $data .= "<a href='index.php?page=local&id=" . $arrayAjaxLocaux[$i]["nom_l"] . "'>" . $arrayAjaxLocaux[$i]["nom_l"] . "</a>";
        $data .= "</td>";
        $data .= "</tr>";
        
        $arrayM = $tmp3->readLoc($arrayAjaxLocaux[$i]["id_local"]);
                if (empty($arrayM)) {
                    $data .= "<tr class=accordeon style='display:none;'><td colspan=4>Aucune donnée !</td></tr>";
                } else {

                    $data .="<tr class=accordeon style='display:none;'><td colspan=4>Matériel<br/>"
                    . "TV : " . $arrayM["tv"] . "<br/>"
                    . "Projecteur :" . $arrayM["projecteur"] . "<br/>"
                    . "Nombre de pc :" . $arrayM["nbrePc"] . "<br/>"
                    . "</td></tr>";
                }
    }
} else {
    $data = '<tr><td colspan="4"><center>Aucune donnée !</td></tr>';
}
echo $data;
?>