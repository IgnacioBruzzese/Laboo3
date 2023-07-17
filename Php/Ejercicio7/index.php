
<?php
        if(isset($_POST["clave"]))
        {
            $variableAEncriptarmd5 = md5($_POST["clave"]);
            $variableAEncriptarSha1 = sha1($_POST["clave"]);
            echo "Clave sin encriptar: " . $_POST["clave"] . "<br>";
            echo "Clave encriptada en md5 (128 bits o 16 pares hexadecimales): <br> $variableAEncriptarmd5 <br>";
            echo "Clave encriptada en sha1 (160 bits o 20 pares hexadecimales): <br> $variableAEncriptarSha1 <br>";
        }
        else
        {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Encriptador</title>

</head>
<body>
    <form style="text-align:center"; action="./index.php" method="post">
        <label for="clave">Ingrese la clave a encriptar: </label>
        <input type="text" id="clave" name="clave"><br>
        <input type="submit" value="Encriptar">
    </form>


    
</body>
</html>

    <?php
        }
    ?>