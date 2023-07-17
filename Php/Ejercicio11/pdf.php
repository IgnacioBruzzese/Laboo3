<?php 

$host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
$dbname = "bevvorozzdqektywccbc";
$user= "uael9o3qtnmbtxk7";
$password= "yAiHkT2vLckY5b4I1w50";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);

        $id = $_GET["id"];

        $sql = "SELECT Archivo FROM Clubes WHERE id = :id";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $fila = $stmt->fetch();
        $objGuitarra = new stdClass;
        $objGuitarra->documentoPDF = base64_encode($fila["Archivo"]);
        $salidaJSON = json_encode($objGuitarra, JSON_INVALID_UTF8_SUBSTITUTE);
        echo $salidaJSON;
        $dbh = null;

    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }

?>