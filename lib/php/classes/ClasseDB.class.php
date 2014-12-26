<?php
    class ClasseDB extends Classe{
        private $_db;
        function __construct($_db) {
            $this->_db = $_db;
        }

        public function read (){
        
        try{
            $query ="select * from classe ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_id_classe=$data["id_classe"];
                $this->_classe=$data["classe"];
                $this->_id_cat=$data["id_cat"];
                
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }
    public function realAll() {
        try {
            $query = "select * from \"classe\" ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $array = array();
            $i = 0;
            while ($data = $resultset->fetch()) {
                $array[$i]["id_classe"] = utf8_encode($data["id_classe"]);
                $array[$i]["classe"] = utf8_encode($data["classe"]);
                $array[$i]["id_cat"] = utf8_encode($data["id_cat"]);
                $i++;
            }
            return $array;
        } catch (Exception $ex) {
            echo "Echec de la requête: " . $ex->getMessage();
        }
    }

    }


?>
