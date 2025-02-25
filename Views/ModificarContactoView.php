<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        require_once __DIR__ . '/../Controllers/ContactoController.php';

        $controlador = new ContactoController();
        $contactos = $controlador->obtenerContactos();
        $controlador->listarContactos($contactos);

        
        
        echo "<br><br>";
        ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <label for="id">ID del contacto a modificar:</label>
        <input type="text" name="id" id="tInpId" required>
        
        <br><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="tInpName">

        <br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="tInpEmail">
        
        <br><br>

        <label for="tlf">Teléfono:</label>
        <input type="tel" name="tlf" id="tInpTlf">
        
        <br><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="tInpDir">
        
        <br><br>

        <input type="submit" value="MODIFICAR">
    </form>
    
    <?php
        if ($_POST) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $tlf = $_POST['tlf'];
            $direccion = $_POST['direccion'];
            
            $controlador->modificarContacto($id ,$nombre, $email, $tlf, $direccion);

            header("Location: ../index.php");

            
        }
    ?>
</body>

</html>