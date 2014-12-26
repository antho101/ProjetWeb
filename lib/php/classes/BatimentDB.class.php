<?php

class BatimentDB extends Batiment {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public function read($id) {
        try {
            $query = "select * from \"Batiment\" where id_batiment=".$id."";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    
    public function CountB() {
        try {
            $query = "select * from \"Batiment\" ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    
    public function pagination($debut,$fin){
        try {
            $query = "select b.id_batiment, b.nom, b.lieu_bat, c.nom_l, c.id_local from \"Batiment\" b FULL JOIN \"LOCAUX\" c ON b.id_batiment = c.id_batiment ORDER BY b.id_batiment limit 5 offset 5";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
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
            $query = "select * from \"Batiment\" ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    public function readClasse(){
        try {
            $query = "select b.id_batiment, b.nom, b.lieu_bat, c.nom_l, c.id_local from \"Batiment\" b FULL JOIN \"LOCAUX\" c ON b.id_batiment = c.id_batiment ORDER BY b.id_batiment desc";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $array[$i]["id_local"] = utf8_encode($data["id_local"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    
    public function readClasseP(){
        try {
            $query = "select b.id_batiment, b.nom, b.lieu_bat, c.nom_l from \"Batiment\" b FULL JOIN \"LOCAUX\" c ON b.id_batiment = c.id_batiment";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    public function insert(){
        try {
            $query = "INSERT INTO \"Batiment\"('nom', Batiment_id_batiment_seq.currval, 'lieu_bat') 
                VALUES(?, ?, ?);";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
    public function getByName($var){
        try {
            $query = "select b.*, l.nom_l, l.id_local from \"Batiment\" b, \"LOCAUX\" l where b.id_batiment = l.id_batiment and b.nom = '".$var."';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["nom_l"] = utf8_encode($data["nom_l"]);
                $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
                $array[$i]["nom"] = utf8_encode($data["nom"]);
                $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
                $array[$i]["id_local"] = utf8_encode($data["id_local"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }
}

?>