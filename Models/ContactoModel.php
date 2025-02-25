<?php 
    require_once __DIR__ . '/ConexionPDOModel.php';

    class ContactoModel {
        private $conexion;

        public function __construct() {
            $this->conexion = ConexionPDOModel::connect();
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

        public function añadirContacto($nombre, $email, $tlf, $direccion) {
            $stmt = $this->conexion->prepare("INSERT INTO contactos (nombre, email, tlf, direccion) VALUES (:nombre, :email, :telefono, :direccion)");
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $tlf);
            $stmt->bindParam(':direccion', $direccion);

            $stmt->execute();
        }

        public function eliminarContacto($id_contacto) {
            try {
                $this->conexion->beginTransaction();
                
                $stmt = $this->conexion->prepare("DELETE from contactos WHERE id_contacto = :id;");
                $stmt->execute(['id' => $id_contacto]);

                $this->conexion->commit();
            } catch (Exception $ex) {
                $this->conexion->rollBack();
                echo "<br>Error en la transaccion. Rollback realizado" . $ex->getMessage() . "<br>";
            }
        }

        public function modificarContacto($id_contacto, $arrayDatosAsoc) {
            // LA INFORMACIÓN DEL ARRAY SE DISPONE ASÍ -> [nombre -> '...',
            //                                              email -> '...',
            //                                              tlf -> '...',
            //                                              direccion -> '...']
            // SI UNO DE LOS CAMPOS ESTÁ VACIO SIGNIFICA QUE NO SE MODIFICA
            
            try {
                $this->conexion->beginTransaction();

                foreach ($arrayDatosAsoc as $campo => $dato) {
                    if ($dato != '') {
                        $stmt = $this->conexion->prepare("UPDATE contactos SET $campo = ? WHERE id_contacto = ?");
                        $stmt->execute([$dato, $id_contacto]);
                    }   
                }

                $this->conexion->commit();
        
            } catch (Exception $ex) {
                $this->conexion->rollBack();
                echo "<br>Error en la transaccion. Rollback realizado" . $ex->getMessage() . "<br>";
            }
        }
    }
?>