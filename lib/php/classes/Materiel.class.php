<?php
    class Materiel{
        protected $id_mat;
        protected $tv;
        protected $projecteur;
        protected $nbrePC;
        protected $id_locaux;
        
        function __construct($id_mat, $tv, $projecteur, $nbrePC, $id_locaux) {
            $this->id_mat = $id_mat;
            $this->tv = $tv;
            $this->projecteur = $projecteur;
            $this->nbrePC = $nbrePC;
            $this->id_locaux = $id_locaux;
        }

        public function getId_mat() {
            return $this->id_mat;
        }

        public function getTv() {
            return $this->tv;
        }

        public function getProjecteur() {
            return $this->projecteur;
        }

        public function getNbrePC() {
            return $this->nbrePC;
        }

        public function getId_locaux() {
            return $this->id_locaux;
        }

        public function setId_mat($id_mat) {
            $this->id_mat = $id_mat;
        }

        public function setTv($tv) {
            $this->tv = $tv;
        }

        public function setProjecteur($projecteur) {
            $this->projecteur = $projecteur;
        }

        public function setNbrePC($nbrePC) {
            $this->nbrePC = $nbrePC;
        }

        public function setId_locaux($id_locaux) {
            $this->id_locaux = $id_locaux;
        }

   
    }



?>