<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Objeto</title>
    <style>
        .resaltado
        {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Variables tipo objeto en PHP. Objeto renglon de pedido </h2>

    <h2 class="resaltado">$objRenglonPedido</h2>
    <?php 
        $objRenglonPedido = new stdClass;
        $objRenglonPedido->codigo = "abc1234";
        $objRenglonPedido->descripcion = "Remera";
        $objRenglonPedido->Precio = "$1500";

        $objRenglonPedido2 = new stdClass;
        $objRenglonPedido2->codigo = "def567";
        $objRenglonPedido2->descripcion = " Campera  ";
        $objRenglonPedido2->Precio = "$750";

        $renglonesPedido = [];
        array_push($renglonesPedido, $objRenglonPedido);
        array_push($renglonesPedido, $objRenglonPedido2);

        echo "Codigo: " . $objRenglonPedido->codigo . "<br>";
        echo "Descripcion: " . $objRenglonPedido->descripcion . "<br>";
        echo "Precio: " . $objRenglonPedido->Precio . "<br>";
        echo "Cantidad: " . count($renglonesPedido);

        echo "<h2>Tipo de <span class='resaltado'>\$objRenglonPedido</span>: " . gettype($objRenglonPedido) . "</h2>";

        echo "<h2>Definamos arreglo de pedidos: </h2>";
        echo "<h2><span class='resaltado'>\$renglonesPedido</span></h2>";
        echo "<h2>Tabula <span class='resaltado'>\$renglonesPedido</span>. Recorrer el arreglo de renglones y tabularlos con html</h2>";
        echo "<table>";
        foreach($renglonesPedido as $objRenglon)
        {
            echo "<tr>";
            echo "<td>" . $objRenglon->codigo . "</td>";
            echo "<td>" . $objRenglon->descripcion . "</td>";
            echo "<td>" . $objRenglon->Precio . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h3>Cantidad de renglones: ". count($renglonesPedido) ."</h3>";
        echo "<h2>Producción de un objeto <span class='resaltado'>\$objRenglonesPedido</span> con dos atributos array renglonesPedido y cantidadRenglones</h2>";

        $objRenglonesPedido = new stdClass;
        $objRenglonesPedido->renglonesPedido = $renglonesPedido;
        $objRenglonesPedido->cantidadRenglones = count($renglonesPedido);

        echo "<h2>Producción de un JSON jsonRenglones</h2>";
        $jsonRenglones = json_encode($objRenglonesPedido);
        echo $jsonRenglones;

    ?>

</body>
</html>