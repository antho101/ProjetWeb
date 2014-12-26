<?php
    class AffectationDB extends Affectation{       
        
        private $_db;
        function __construct($_db) {
            $this->_db = $_db;
        }

        public function read (){
        
        try{
            $query ="select classe from classe c "
                    . "inner join affectation  a"
                    . "ON c.id_classe = a.id_a "
                    . "inner join Jour j"
                    . "ON a.id_jour = j.id_jour"
                    . "inner join Locaux l"
                    . "ON a.id_locaux = l.id_locaux ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_id_locaux=$data["id_locaux"];
                $this->_id_jour=$data["id_jour"];
                $this->_id_classe=$data["id_classe"];
                $this->_id_a=$data["id_a"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }
    }



?>