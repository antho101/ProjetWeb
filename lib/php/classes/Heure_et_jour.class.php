<?php
    class Heure_et_jour{
        protected $jour;
        protected $id_jour;
        function __construct($jour, $id_jour) {
            $this->jour = $jour;
            $this->id_jour = $id_jour;
        }

        public function getJour() {
            return $this->jour;
        }

        public function getId_jour() {
            return $this->id_jour;
        }

        public function setJour($jour) {
            $this->jour = $jour;
        }

        public function setId_jour($id_jour) {
            $this->id_jour = $id_jour;
        }


        
    }


?>
