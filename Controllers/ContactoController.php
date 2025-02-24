<?php 
    require_once __DIR__ . '/../Models/ContactoModel.php';

    class ContactoController {
        private $conexion;
        public function __construct() {
            $this->conexion = new ContactoModel();
        }

        public function obtenerContactos() {
            return $this->conexion->obtenerContactos();
        }

        public function listarContactos($arrayContactos) {
            echo "
                <h1>Lista de contactos:</h1>
                <table>
                    <thead>
                        <th>id_contacto</th>
                        <th>nombre</th>
                        <th>email</th>
                        <th>tlf</th>
                        <th>direccion</th>
                    </thead>
                <tbody>
            ";
            foreach ($arrayContactos as $contacto) {
                echo "<tr>";
                foreach ($contacto as $key => $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "
                    </tbody>
                </table>
                <br><br>
            ";
        }

        public function añadirContacto($nombre, $email, $tlf, $direccion) {
            $this->conexion->añadirContacto($nombre, $email, $tlf, $direccion);

            echo "<b>Contacto añadido con éxito</b>";
        }

        
    }
?>