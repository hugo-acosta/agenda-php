<?php 
    require_once __DIR__ . '/../Models/ContactoModel.php';

    class ContactoController {
        private $conexion;
        public function __construct() {
            $this->conexion = new ContactoModel();
        }

        public function obtenerContactos(): array {
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
                foreach ($contacto as $valor) {
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

        public function modificarContacto($id_contacto, $nombre, $email, $tlf, $direccion) {
            $arrayAsoc = [
                'nombre' => $nombre,
                'email' => $email,
                'tlf' => $tlf,
                'direccion' => $direccion,
            ];

            $this->conexion->modificarContacto($id_contacto, $arrayAsoc);

            echo "<b>Contacto modificado con éxito</b>";
        }

        public function añadirContacto($nombre, $email, $tlf, $direccion) {
            $this->conexion->añadirContacto($nombre, $email, $tlf, $direccion);

            echo "<b>Contacto añadido con éxito</b>";
        }

        public function eliminarContacto($id_contacto) {
            $this->conexion->eliminarContacto($id_contacto);

            echo "<b>Contacto eliminado con éxito</b>";
        }
        
    }
?>