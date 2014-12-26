<?php
    class Locaux{
        protected $id_locaux=-1;
        protected $nom_l;
        protected $capacite;
        protected $id_batiment;
        
        function __construct($id_locaux, $nom_l, $capacite, $id_batiment) {
            $this->id_locaux = $id_locaux;
            $this->nom_l = $nom_l;
            $this->capacite = $capacite;
            $this->id_batiment = $id_batiment;
        }
        public function getId_locaux() {
            return $this->id_locaux;
        }

        public function getNom_l() {
            return $this->nom_l;
        }

        public function getCapacite() {
            return $this->capacite;
        }

        public function getId_batiment() {
            return $this->id_batiment;
        }

        public function setId_locaux($id_locaux) {
            $this->id_locaux = $id_locaux;
        }

        public function setNom_l($nom_l) {
            $this->nom_l = $nom_l;
        }

        public function setCapacite($capacite) {
            $this->capacite = $capacite;
        }

        public function setId_batiment($id_batiment) {
            $this->id_batiment = $id_batiment;
        }


    }


?>