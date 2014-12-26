<?php

class LocauxDB extends Locaux {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public function read($id) {

        try {
            $query = "select * from \"LOCAUX\" where id_local=".$id."";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $array[$i]["capacite"] = utf8_encode($data["capacite"]);
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["id_local"] = utf8_encode($data["id_local"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }

    public function realAll() {
        try {
            $query = "select * from \"Locaux\" ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["capacite"] = utf8_encode($data["capacite"]);
                $array[$i]["id_batiment"] = utf8_encode($data["id_local"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }

    public function CountB() {
        try {
            $query = "select * from \"LOCAUX\" ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $array[$i]["capacite"] = utf8_encode($data["capacite"]);
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["id_local"] = utf8_encode($data["id_local"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }

    public function pagination($premiereEntree) {
        try {
            $query = "select l.*, b.nom, b.lieu_bat from \"LOCAUX\" l, \"Batiment\" b  where l.id_batiment = b.id_batiment ORDER BY id_local asc limit 9 offset ".$premiereEntree.";";
            //$query = "select l.*, b. from \"LOCAUX\" l, \"Batiment\" b ORDER BY id_local asc limit 5 offset " . $premiereEntree . "";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $array[$i]["capacite"] = utf8_encode($data["capacite"]);
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["id_local"] = utf8_encode($data["id_local"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    public function insert($id,$places){
        $flag=0;
        try {
            $query = "update \"LOCAUX\" set capacite=".$places." where id_local=".$id;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $flag=1;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
        return $flag;
    }

}

?>
