<?php 

    $host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
    $dbname = "bevvorozzdqektywccbc";
    $user= "uael9o3qtnmbtxk7";
    $password= "yAiHkT2vLckY5b4I1w50";
    //$conexion = mysqli_connect($host, $user, $password, $dbname);
    try 
    { 
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password); 

        $orden = $_GET["orden"];
        $filtroId = $_GET["id"];
        $filtronombre = $_GET["nombre"];
        $filtroapodo = $_GET["apodo"];
        $filtrofundado = $_GET["fundado"];

        $sql = "SELECT * FROM Clubes WHERE id LIKE CONCAT('%',:filtroId,'%') AND nombre LIKE CONCAT('%',:filtronombre ,'%') AND apodo LIKE CONCAT('%',:filtroapodo ,'%') AND fundado LIKE CONCAT('%',:filtrofundado ,'%') ORDER BY $orden";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':filtroId', $filtroId);
        $stmt->bindParam(':filtronombre', $filtronombre);
        $stmt->bindParam(':filtroapodo', $filtroapodo);
        $stmt->bindParam(':filtrofundado', $filtrofundado);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $ArrayClubs = [];
        $objClubs = new stdClass;

        while($fila = $stmt->fetch())
        {
            $objClub = new stdClass;
            $objClub->id = $fila["id"];
            $objClub->nombre = $fila["nombre"];
            $objClub->apodo = $fila["apodo"];
            $objClub->fundado = $fila["fundado"];

            array_push($ArrayClubs, $objClub);
        }

        $dbh = null;
        $objClubs->Autos = $ArrayClubs;
        $objClubs->largo = count($ArrayClubs);
        $jsonClubs = json_encode($objClubs);
        echo $jsonClubs;

    } catch (PDOException $e) 
    { 

        echo $e->getMessage();
     }

?>