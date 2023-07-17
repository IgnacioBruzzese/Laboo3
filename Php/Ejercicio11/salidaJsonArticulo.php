<?php
$host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
$dbname = "bevvorozzdqektywccbc";
$user= "uael9o3qtnmbtxk7";
$password= "yAiHkT2vLckY5b4I1w50";

//$conexion = mysqli_connect($host, $user, $password, $dbname);

try {
    $dsn = "mysql:host=$host;dbname=$dbname"; 
    $dbh = new PDO($dsn, $user, $password);

    $id = $_GET["id"];

    $sql = "SELECT * FROM Clubes WHERE id  = :filtroId";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':filtroId', $id);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $fila = $stmt->fetch();

    $objClub = new stdClass;
    $objClub->id = $fila["id"];
    $objClub->nombre = $fila["nombre"];
    $objClub->apodo = $fila["apodo"];
    $objClub->fundado = $fila["fundado"];

    $jsonClub = json_encode($objClub);
    $dbh = null;
    echo $jsonClub;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>