<?php 
    $host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
    $dbname = "bevvorozzdqektywccbc";
    $user= "uael9o3qtnmbtxk7";
    $password= "yAiHkT2vLckY5b4I1w50";

    if(isset($_POST["nombre"]))
    {
        try
        {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            $nombre = $_POST["nombre"];
            $contador = 0;
            $password = md5($_POST["password"]);
    
            $sql = "INSERT INTO invitados (nombre, password, contador) VALUES (:nombre, :password, 0)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $dbh = null;
            header("Location:./login.php");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    else
    {
        header("Location:./index.php");
    }

?>