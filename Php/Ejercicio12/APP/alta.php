<?php 

$host= "bevvorozzdqektywccbc-mysql.services.clever-cloud.com";
$dbname = "bevvorozzdqektywccbc";
$user= "uael9o3qtnmbtxk7";
$password= "yAiHkT2vLckY5b4I1w50";
    $respuesta_estado = "";

    try
    {
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        $dbh = new PDO($dsn, $user, $password);


        $id = $_POST["idAlta"];
        $nombre = $_POST["nombreAlta"];
        $apodo = $_POST["apodoAlta"];
        $fundado = $_POST["fundadoAlta"];

        $sql = "INSERT INTO Clubes (id, nombre, apodo, fundado) VALUES (:id, :nombre, :apodo, :fundado)";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nPreparación exitosa.";

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apodo', $apodo);
        $stmt->bindParam(':fundado', $fundado);
        $respuesta_estado = $respuesta_estado . "\nBind exitoso.";
        $stmt->execute();
        $respuesta_estado = $respuesta_estado . "\nEjecución exitosa.";

        if(!isset($_FILES["pdfAlta"]))
        {
            $respuesta_estado = $respuesta_estado . "\nNo se inicializó la variable FILES";
        }
        else
        {
            if(empty($_FILES["pdfAlta"]["name"]))
            {
                $respuesta_estado = $respuesta_estado . "\nNo se eligieron archivos PDF.";
            }
            else
            {
                $contenidoPDF = file_get_contents($_FILES["pdfAlta"]["tmp_name"]);
                $sql = "UPDATE Clubes SET Archivo = :contenidoPdf WHERE id = :id";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(":contenidoPdf", $contenidoPDF);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                $respuesta_estado = $respuesta_estado . "\nPDF cargado";
            }
        }

        $dbh = null;
        $respuesta_estado = $respuesta_estado . "\nSe ha dado de alta al artículo. Vuelva a cargar los datos para visualizar los cambios.";
        echo $respuesta_estado;
    }
    catch(PDOException $e)
    {
        $respuesta_estado = $respuesta_estado . "\nERROR: \n" . $e->getMessage();
        echo $respuesta_estado;
    }

?>