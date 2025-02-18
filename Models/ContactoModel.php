<?php 
    require_once __DIR__ . '/ConexionPDOModel.php';

    class ContactoModel {
        private $conexion;

        public function __construct() {
            $this->conexion = ConexionPDOModel::connect();
        }

        public function listarContactos($arrayContactos) {
            # TODO Listado limpio
        }

        public function obtenerContactos() {
            try {
                $stmt = $this->conexion->query("SELECT * FROM contactos");
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (!$resultados) {
                    echo "<b>La agenda está vacía</b> <br>";
                } else {
                    return $resultados;
                }

            } catch (Exception $ex) {
                echo "ERROR: $ex";
            }
        }

        public function añadirContacto($id_contacto, $nombre, $email, $tlf, $direccion) {
            $stmt = $this->conexion->prepare("INSERT INTO contactos (id_contacto, nombre, email, tlf, direccion), VALUES (?,?,?,?,?)");
            
            $stmt->bindParam(1, $id_contacto);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $tlf);
            $stmt->bindParam(5, $direccion);

            $stmt->execute();
        }
    }
?>