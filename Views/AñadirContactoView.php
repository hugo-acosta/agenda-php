<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="tInpName" required>
        
        <br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="tInpEmail" required>

        <br><br>

        <label for="tlf">Teléfono:</label>
        <input type="tel" name="tlf" id="tInpTlf" required>

        <br><br>

        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="tInpDir" required>

        <br><br>

        <input type="submit" value="AÑADIR">
    </form>

    <?php 
        require_once __DIR__ . '/../Controllers/ContactoController.php';

        $controlador = new ContactoController();

        if ($_POST) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $tlf = $_POST['tlf'];
            $direccion = $_POST['direccion'];

            $controlador->añadirContacto($nombre, $email, $tlf, $direccion);

            header("Location: ../index.php");

            
        }
    ?>
</body>
</html>