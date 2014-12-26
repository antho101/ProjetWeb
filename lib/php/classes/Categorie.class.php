<?php
    class Categorie{
        protected $id_cat;
        protected $cat;
        function __construct($id_cat, $cat) {
            $this->id_cat = $id_cat;
            $this->cat = $cat;
        }

        public function getId_cat() {
            return $this->id_cat;
        }

        public function getCat() {
            return $this->cat;
        }

        public function setId_cat($id_cat) {
            $this->id_cat = $id_cat;
        }

        public function setCat($cat) {
            $this->cat = $cat;
        }


        
    }

?>
