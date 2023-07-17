<?php
    sleep(3);
    if(isset($_POST["nombre"]))
    {
        $personaForm = new stdClass;

        $personaForm->nombre = $_POST["nombre"];
        $personaForm->apellido = $_POST["apellido"];
        $personaForm->edad = $_POST["fecha"];
        $personaForm->sexo = $_POST["DNI"];

        $objetoJson = json_encode($personaForm);
        echo $objetoJson;
    }
?>