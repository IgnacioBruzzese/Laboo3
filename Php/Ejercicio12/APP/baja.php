<?php

$host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
$dbname = "bevvorozzdqektywccbc";
$user= "uael9o3qtnmbtxk7";
$password= "yAiHkT2vLckY5b4I1w50";
$respuesta_estado = "";

$conexion = mysqli_connect($host, $user, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM Clubes WHERE id = '$id'";

    if (mysqli_query($conexion, $sql)) {
        $respuesta_estado = $respuesta_estado . "Registro eliminado correctamente";
        // Redireccionar a index.html
        //header("Location: index.html");
        //exit();
    } else
     {
        $respuesta_estado=$respuesta_estado . "Error al eliminar el registro: "; //. mysqli_error($conexion);
    }
    echo $respuesta_estado;
}

//mysqli_close($conexion);
?>