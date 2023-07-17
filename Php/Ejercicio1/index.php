<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" content-type="text/html">
    <title>Base</title>
    <style>
        .resaltado
        {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Todo lo escrito fuera de las marcas de php es entregado en la respuesta http sin pasar por el procesador php</h2>
    <hr>
    <?php
        $var1 = "Valor  1";
        $var2 = true;
        $var3 = false;
        $suPalabra = ["Hola", "Hello"];
        $suPalabra2 = ["Buen día", "Good day", "Buongiorno	", "Salut"];
        $suPalabra3 = ["Chau", "Goodbye", "Arrivederci", "	Au revoir"];
        define("ValorConstante", "StringConstante");

        echo "<h2>Texto <span class='resaltado'>entregado por el procesador php</span> usando la sentencia echo</h2>";
        echo "<hr>";
        echo "<h2>Sin usar concatenador <span class='resaltado'>\$var1</span>: $var1</h2>";
        echo "<h2>Usando concatenador <span class='resaltado'>\$var1</span>: " . $var1 . "</h2>" ;
        echo "<hr>";
        echo "<h2>Variable tipo lógica o booleana (verdadero) <span class='resaltado'>\$var2</span>: $var2</h2>";
        echo "<h2>Variable tipo lógica o booleana (falso) <span class='resaltado'>\$var3</span>: $var3</h2>";
        echo "<hr>";
        echo "<h2><span class='resaltado'>ValorConstante</span>: " . ValorConstante . "</h2>";
        echo "<h2>Tipo de <span class='resaltado'>ValorConstante</span>: " . gettype(ValorConstante) . "</h2>";
        echo "<hr>";
        echo "<h2>Arreglos:</h2>";
        echo "<p><span class='resaltado'>suPalabra</span>: $suPalabra[0] </p>";
        echo "<p><span class='resaltado'>suPalabra</span>: $suPalabra[1] </p>";
        echo "<p>Tipo de dato de <span class='resaltado'>suPalabra</span>: " . gettype($suPalabra) . "</p>";
        echo "<p>Se agregan por programa dos palabras: </p>";
        array_push($suPalabra, "Ciao");
        array_push($suPalabra, "Bonjour");
        echo "<ul>";
        foreach($suPalabra as $palabra)
        {
            echo "<li><p>$palabra</p></li>";
        }
        echo "</ul>";
        echo "<hr>";
        echo "<h2>Arreglo de dos dimensiones (diccionario): </h2>";
        
        $diccionario = [$suPalabra, $suPalabra2];
        array_push($diccionario, $suPalabra3);

        echo "<h2>Tipo de <span class='resaltado'>\$diccionario</span>: " . gettype($diccionario) . "</h2>";
        echo "<table style= 'border:solid;border-collapse:collapse;'>
            <thead>
                <th style= 'border:solid;'>Español</th>
                <th style= 'border:solid;'>Inglés</th>
                <th style= 'border:solid;'>Italiano</th>
                <th style= 'border:solid;'>Francés</th>";
        foreach($diccionario as $array)
        {
            echo "<tr>";
            foreach($array as $palabra)
            {
                echo "<td style= 'border:solid;'>$palabra</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<h2>También así se puede expresar el valor de <span class='resaltado'>\$diccionario[0][3]</span>: ". $diccionario[0][3] ."</h2>"; 
        echo "<h2>Cantidad de elementos del diccionario: " . count($diccionario) . "</h2>";
        echo "<hr>";
        echo "<h2>Variables tipo arreglo asociativo: </h2>";

        $arrayAsociativo = ["Codigo de Articulo" => "cp001", "Precio Unitario" => "2000", "Descripcion del Articulo" => "Remera", "Cantidad" => "20"];
        echo "<p>Codigo de Articulo: " . $arrayAsociativo["Codigo de Articulo"] . "</p>"; 
        echo "<p>Precio Unitario: " . $arrayAsociativo["Precio Unitario"] . "</p>"; 
        echo "<p>Descripcion del Articulo: " . $arrayAsociativo["Descripcion del Articulo"] . "</p>"; 
        echo "<p>Cantidad: " . $arrayAsociativo["Cantidad"] . "</p>"; 
        echo "<p>Cantidad de elementos ". count($arrayAsociativo) ."</p>";
        echo "<p>Tipo de dato: ". gettype($arrayAsociativo) ."</p>";
        echo "<hr>";

        $x = 2;
        $y = 1;

        echo "<h2>Expresiones aritméticas: </h2>";
        echo "<p>La variable \$x tiene el siguiente valor: ".($x). "</p>";
        echo "<p>La variable \$y tiene el siguiente valor: ". ($y). "</p>";
        echo "<p>La variable \$x es del tipo: ". gettype($x) . "</p>";
        echo "<p>La variable \$y es del tipo: ". gettype($y). "</p>";
        echo "<p>Así se imprime una expresión aritmética de tipo suma: (\$x + \$y) = " . ($x+$y) . "</h2>";
        echo "<p>Así se imprime una expresión aritmética de tipo resta: (\$x - \$y) = " . ($x-$y) . "</h2>";
        echo "<p>Así se imprime una expresión aritmética de tipo división: (\$x / \$y) = " . ($x/$y) . "</h2>";

    ?>
</body>
</html>