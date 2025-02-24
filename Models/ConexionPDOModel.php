<?php 
    class ConexionPDOModel {
        private static $server = 'localhost';
        private static $username = 'root';
        private static $pass = '';
        private static $db = 'agenda';
        private static $conexion = null;
        
        public static function connect() {
            if (self::$conexion == null) {
                try {
                    $conexion = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db . ";charset=utf8", self::$username, self::$pass);
                } catch (Exception $ex) {
                    echo "Se ha producido un error -> " . $ex->getMessage() . ' <br>';    
                }
            } else {
                echo "La conexión ya ha sido creada.<br>";
            }

            return $conexion;
        }
    }
?>