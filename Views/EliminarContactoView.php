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

    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <label for="id">ID del contacto a eliminar:</label>
        <input type="text" name="id" id="tInpId">

        <input type="submit" value="ENVIAR">
    </form>

    <?php 
        if ($_POST) {
            if ($contactos['id_contacto'].isset($_POST['id'])){
                $id = $_POST['id'];
                $controlador->eliminarContacto($id);

                header("Location: ../index.php");
            } else {
                echo "<b>ID no encontrada en la lista de contactos. Por favor, inténtelo de nuevo.</b>";
            }
        }
    ?>
</body>
</html>