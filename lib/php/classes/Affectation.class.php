<?php
    class Affectation{
        protected $id_locaux=-1;
        protected $id_jour;
        protected $id_classe;
        protected $id_a;
        function __construct($id_locaux, $id_jour, $id_classe, $id_a) {
            $this->id_locaux = $id_locaux;
            $this->id_jour = $id_jour;
            $this->id_classe = $id_classe;
            $this->id_a = $id_a;
        }

        public function getId_locaux() {
            return $this->id_locaux;
        }

        public function getId_jour() {
            return $this->id_jour;
        }

        public function getId_classe() {
            return $this->id_classe;
        }

        public function getId_a() {
            return $this->id_a;
        }

        public function setId_locaux($id_locaux) {
            $this->id_locaux = $id_locaux;
        }

        public function setId_jour($id_jour) {
            $this->id_jour = $id_jour;
        }

        public function setId_classe($id_classe) {
            $this->id_classe = $id_classe;
        }

        public function setId_a($id_a) {
            $this->id_a = $id_a;
        }




    }


?>
