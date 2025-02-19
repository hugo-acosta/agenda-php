<?php 
    require_once __DIR__ . '/../Models/ContactoModel.php';

    class ContactoController {
        private $conexion;
        public function __construct() {
            $this->conexion = new ContactoModel();
        }

        
    }
?>