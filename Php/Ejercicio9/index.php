<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body, html
        {
            height: 100%;
            width: 100%;
            margin: 0;
        }
        #contenedor
        {
            height: 100%;
            width: 100%;
            position: relative;
        }

        #header, #footer
        {
            height: 10%;
            width: 100%;
            background-color: #4ef1f7;
        }

        #main
        {
            height: 80%;
            width: 100%;
            background-color: rgba(54, 54, 54, 0.219);
        }

        #botonModal
        {
            width: 120px;
            height: 40px;
            background-color: rgba(144, 132, 255, 0.596);
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 20px;
        }

        #botonModal:hover
        {
            background-color: rgb(144, 132, 255);
        }

        #contenedorForm
        {
            min-height: 325px;
            width: 700px;
            background-color: beige;
            position: fixed;
            top: 10%;
            left: 20%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 6px 8px 10px 2px gray;
            display:none;
        }

        #headerForm
        {
            width: 100%;
            height: 100px;
            background-color: grey;
            border-radius: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px;
            box-sizing: border-box;
        }

        #formulario
        {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: green;
            color: white;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }



        {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: justify;
            align-items: left;
            background-color: green;
            color: white;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }
        input
        {
            padding: 5px;
            margin-bottom: 10px;
        }

        #botonForm
        {
            color: red;
            background-color: white;
            width: 20px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            margin: 10%;
        }

        #botonForm:hover
        {
            background-color: white;
        }

        #enviarForm
        {
            width: 70px;
            padding: 5px;
        }

        .modalActivado
        {
            opacity: 0.3;
            pointer-events: none;
        }

        .modalDesactivado
        {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
    <title>Form to Json</title>
</head>
<body>
    <div id="contenedor">
        <div id="header">Header 10%</div>
        <div id="main">
            <div id="botonModal">
                Ventana Modal
            </div>
        </div>
        <div id="footer">Footer 10%</div>
    </div>
    <div id="contenedorForm">
        <div id="headerForm">
            <div id="botonForm">X</div>
        </div>
        <div id="formulario">
            <label for="nombre">Nombre:</label><br>
            <input id="nombre" name="nombre" type="text" required autocomplete="on"><br>
            <label for="apellido">Apellido:</label><br>
            <input id="apellido" name="apellido" type="text" required autocomplete="on"><br>
            <label for="fecha">Fecha de Nacimineto:</label><br>
            <input id="fecha" name="fecha" type="date" required autocomplete="on"><br>
            <label for="DNI">DNI:</label><br>
            <input id="DNI" name="DNI" type="number" required autocomplete="on"><br>
            <button id="enviarForm">Enviar</button>
            <div id="respuesta"></div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $("#botonForm").click(function(){
        document.getElementById("contenedor").className = "modalDesactivado";
        $("#contenedorForm").hide();
    });

    $("#botonModal").click(function(){
        document.getElementById("contenedor").className = "modalActivado";
        $("#contenedorForm").show();
    });

    $("#enviarForm").click(function(){

        var confirmacion = confirm("¿Está seguro de enviar el formulario?");
        if(confirmacion)
        {
            $("#respuesta").empty();
            $("#respuesta").html("<h4><i>Cargando...</i><h4>");

            $.ajax({
                type:"post",
                url: "./respuestaForm.php",
                data: {
                       nombre: $("#nombre").val(), 
                       apellido: $("#apellido").val(), 
                       fecha: $("#fecha").val(), 
                       DNI: $("#DNI").val()
                    },
                success: function(respuestaDelServer, estado)
                {
                    $("#respuesta").empty();
                    $("#respuesta").html("<h4>Respuesta del Servidor</h4>" + respuestaDelServer);
                }
            });
        }
    })

</script>