<?php 
    require_once __DIR__ . '/../Controllers/ContactoController.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tbody {
            border: solid;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
        $controlador = new ContactoController(); 

        $contactos = $controlador->obtenerContactos();
        $controlador->listarContactos($contactos);
    ?>
    <a href="./Views/AñadirContactoView.php">Añadir Contacto</a>
    <br>
    <a href="./Views/ModificarContactoView.php">Modificar Contacto</a>
    <br>
    <a href="./Views/EliminarContactoView.php">Eliminar Contacto</a>
</body>
</html>