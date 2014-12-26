<?php
    class Batiment{
        protected $_id_bat= -1;
        protected $_nom_bat;
        protected $_lieu_bat;
        
        function __construct($_id_bat, $_nom_bat, $_lieu_bat) {
            $this->_id_bat = $_id_bat;
            $this->_nom_bat = $_nom_bat;
            $this->_lieu_bat = $_lieu_bat;
        }

        public function get_id_bat() {
            return $this->_id_bat;
        }

        public function get_nom_bat() {
            return $this->_nom_bat;
        }

        public function get_lieu_bat() {
            return $this->_lieu_bat;
        }

        public function set_id_bat($_id_bat) {
            $this->_id_bat = $_id_bat;
        }

        public function set_nom_bat($_nom_bat) {
            $this->_nom_bat = $_nom_bat;
        }

        public function set_lieu_bat($_lieu_bat) {
            $this->_lieu_bat = $_lieu_bat;
        }


    }

?>
