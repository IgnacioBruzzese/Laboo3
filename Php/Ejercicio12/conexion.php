<?php
$host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
$dbname = "bevvorozzdqektywccbc";
$user= "uael9o3qtnmbtxk7";
$password= "yAiHkT2vLckY5b4I1w50";

try{

    $conexion = new mysqli($host, $user, $password, $dbname);
    $dsn = "mysql:host=$host;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
}
catch(PDOException $e){
    echo " Error al conectar a la base de datos ";
    die();
}


?>