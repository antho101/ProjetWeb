<?php
    class CategorieDB extends Categorie{
      private $_db;
        function __construct($_db) {
            $this->_db = $_db;
        }

        public function read (){
        
        try{
            $query ="select * from categorie ";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $this->_id_cat=$data["id_cat"];
                $this->_cat=$data["cat"];
            }
        } catch (Exception $ex) {
            echo "Echec de la requête: ".$e->getMessage();

        }
    }

        
    }

?>