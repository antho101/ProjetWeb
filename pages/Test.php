<?php

$tmp  = new BatimentDB($db);
$array = $tmp->realAll();
//print_r($array); print_r(); == QUE POUR ARRAY-ARRAYLIST
for($i=0; $i<count($array);$i++){
    echo "Nom : ".$array[$i]["nom"]."<br />";
    echo "ID Batiment : ".$array[$i]["id_batiment"]."<br />";
    echo "Lieu : ".$array[$i]["lieu_bat"]."<br />";
}
?>

