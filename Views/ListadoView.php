<?php 
    require_once __DIR__ . '/../Controllers/ContactoController.php';

    $controlador = new ContactoController(); 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post"></form>
    <input type="button" value="AÑADIR">
    <input type="button" value="MODIFICAR">
    <input type="button" value="BORRAR">
</body>
</html>