<?php

class MaterielDB extends Materiel {

    private $_db;

    function __construct($_db) {
        $this->_db = $_db;
    }

    public function read() {

        try {
            $query = "select * from materiel ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while ($data = $resultset->fetch()) {
                $this->_id_mat = $data["id_mat"];
                $this->_tv = $data["tv"];
                $this->_projecteur = $data["projecteur"];
                $this->_nbrePC = $data["nbrePC"];
                $this->_id_locaux = $data["id_locaux"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $e->getMessage();
        }
    }

    public function readLoc($id_l) {

        try {
            $query = "select * from materiel where id_local=" . $id_l . "";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $i = 0;
            $arrayM = array();
            while ($data = $resultset->fetch()) {
                $arrayM["id_mat"] = utf8_encode($data["id_mat"]);
                $arrayM["tv"] = utf8_encode($data["tv"]);
                $arrayM["projecteur"] = utf8_encode($data["projecteur"]);
                $arrayM["nbrePc"] = utf8_encode($data["nbrePc"]);
                $arrayM["id_local"] = utf8_encode($data["id_local"]);
            }
            return $arrayM;
        } catch (Exception $e) {
            echo "Echec de la requête: " . $e->getMessage();
        }
    }
    public function update($id,$tv,$pro,$pc){
        $flag=0;
        try {
            $query = "update materiel set tv=".$tv.", projecteur=".$pro.", \"nbrePc\"=".$pc." where id_local=".$id;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $flag=1;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
        return $flag;
    }
    public function insert($id,$tv,$pro,$pc){
        $flag=0;
        try {
            $query = "insert into \"materiel\"(tv,projecteur,\"nbrePc\",id_local) values(".$tv.",".$pro.",".$pc.",".$id.")";
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

