<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RespuestaFormulario</title>
</head>
<body>
    <?php 
        echo "Valores pasados: <br>";
        echo "Nombre: " . $_GET["nombre"] . "<br>";
        echo "Apellido: " . $_GET["apellido"] . "<br>";
        echo '<a href ="./index.php">Volver</a> ';
        
    ?>
    
</body>
</html>