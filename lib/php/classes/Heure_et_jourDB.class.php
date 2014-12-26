<?php
    class Heure_et_jourDB extends Heure_et_jour{
        private $_db;
        function __construct($_db) {
            $this->_db = $_db;
        }

        public function read (){
        
        try{
            $query ="select * from jour ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_jour=$data["jour"];
                $this->_id_jour=$data["id_jour"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }

        
    }


?>
