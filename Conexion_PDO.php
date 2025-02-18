<?php 
    $server = 'localhost';
    $username = 'root';
    $pass = '';
    $db = 'ies_bd';

    //CONEXION PDO 
    $conexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $username, $pass);

    //CONFIGURACION DE PROPIEDADES
    //Manejo de errores con excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Se puede configurar el modo recuperacion predeterminado
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Conexion realizada con exito. <br>";

    echo "Version del servidor: " . $conexion->getAttribute(PDO::ATTR_SERVER_VERSION) . '<br>';
    echo "Tipo de controlador: " . $conexion->getAttribute(PDO::ATTR_DRIVER_NAME) . '<br>';

    //OBTENER DATOS DE LA BD CON PDO
    // $stmt = $conexion->query("SELECT * FROM alumnos");
    // $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($resultados as $fila) {
    //     echo "<pre>";
    //     print_r($fila);
    //     echo "</pre>";
    // }


    $stmt = $conexion->query("SELECT * FROM alumnos");
    $resultados = $stmt->fetchAll(PDO::FETCH_NUM);

    // foreach ($resultados as $fila) {
    //     echo "<pre>";
    //     print_r($fila);
    //     echo "</pre>";
    // }
    
    //TRANSACCIONES
    try {
        $conexion->beginTransaction();

        //consulta 1
        $stmt = $conexion->prepare("UPDATE profesores SET telefono = ? WHERE Id = ?");
        $stmt->execute(['666777444', 1]);
        
        //consulta 2
        $stmt = $conexion->prepare("UPDATE profesores SET telefono = ? WHERE Id = ?");
        $stmt->execute(['666999333', 1]);

        //Confirmo cambios
        $conexion->commit();

    } catch (Exception $ex) {
        //Revertimos cambios en caso de error
        $conexion->rollBack();
        echo "<br>Error en la transaccion. Rollback realizado" . $ex->getMessage() . "<br>";
    }

    //CONSULTAS PREPARADAS
    //ej utilizando ?
    echo "Consulta Preparada con ? <br>";
    $stmt2 = $conexion->prepare("INSERT INTO profesores (nombre, asignatura) VALUES (?,?)");
    
    $nombre = "Manolo";
    $asignatura = "Matemáticas";
    
    $stmt2->bindParam(1,$nombre);
    $stmt2->bindParam(2,$asignatura);
    $stmt2->execute();

    echo "Profesor " . $nombre . " de la asignatura " . $asignatura . " insertado en BD correctamente <br>";
    
    //ej utilizando etiquetas
    echo "Consulta Preparada con etiquetas <br>";
    $stmt3 = $conexion->prepare("INSERT INTO profesores (nombre,asignatura) VALUES (:nombreProfesor,:asignatura)");
    
    $nombre = "Pedro";
    $asignatura = "Física";
    
    $stmt3->bindParam(':nombreProfesor', $nombre);
    $stmt3->bindParam(':asignatura', $asignatura);
    
    $stmt3->execute();

    echo "Profesor " . $nombre . " de la asignatura " . $asignatura . " insertado en BD correctamente <br>";
?>