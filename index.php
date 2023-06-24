<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Final</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <?php


$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
$conexion = new PDO('mysql:host=localhost;dbname=Eugenia09072316870', 'root', '', $pdo_options);

if (isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){
        
        $insert = $conexion->prepare("INSERT INTO producto (codigo,nombre,precio,
        existencia) VALUES (:codigo,:nombre,:precio,:existencia)");
        $insert->bindValue('codigo', $_POST['codigo']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('precio', $_POST['precio']);
        $insert->bindValue('existencia', $_POST['existencia']);
        $insert->execute();
    }


$select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM producto");
?>

<a href="crear.php">Crear Boton</a>
    <table border="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>existencia</th>
                
</tr>
</thead>
<tbody>
    <?php foreach($select->fetchAll() as $producto) { ?>
        <tr>
            <td> <?php echo $producto["codigo"] ?> </td>
            <td> <?php echo $producto["nombre"] ?> </td>
            <td> <?php echo $producto["precio"] ?> </td>
            <td> <?php echo $producto["existencia"] ?> </td>
            <td>
                <form action="editar.php" method="POST">
                    <input type="hidden" name="codigo"
                    value="<?php echo $producto["codigo"]?>">
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </body>
</html>