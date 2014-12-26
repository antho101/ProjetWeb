<?php
    class Classe{
        protected $id_classe;
        protected $classe;
        protected $id_cat;
        
        function __construct($id_classe, $classe, $id_cat) {
            $this->id_classe = $id_classe;
            $this->classe = $classe;
            $this->id_cat = $id_cat;
        }
        
        public function getId_classe() {
            return $this->id_classe;
        }

        public function getClasse() {
            return $this->classe;
        }

        public function getId_cat() {
            return $this->id_cat;
        }

        public function setId_classe($id_classe) {
            $this->id_classe = $id_classe;
        }

        public function setClasse($classe) {
            $this->classe = $classe;
        }

        public function setId_cat($id_cat) {
            $this->id_cat = $id_cat;
        }



    }


?>