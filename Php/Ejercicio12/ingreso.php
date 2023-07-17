<?php

    include("./conexion.php");

    $sql = "SELECT nombre, password, contador FROM invitados WHERE nombre = '".strtolower($_POST['nombre'])."'";

    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $row = $stmt->fetch();

    if(md5($_POST['password']) == $row['password']){
        session_start();
        $_SESSION['id'] = session_create_id();
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['contador'] = $row['contador'];

        $inicios = $row['contador'];
        $inicios += 1;
        $sql = "UPDATE invitados SET contador = $inicios WHERE nombre = '".strtolower($_POST['nombre'])."'";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        echo "
        <h1>BIENVENIDO!!!!</h1>
            <br>
            <br>
            <div style='border: 1px solid black'>
            <h1>Sus datos de sesion</h1>
            <h2>ID: ". $_SESSION['id'] ."</h2>
            <h2>Nombre de Usuario:". $_SESSION['nombre'] ."</h2>
            <h2>Contador de Logueos: ". $_SESSION['contador'] ."</h2>
            <br>
            <br>
            </div>
            <p><button onClick=\"location.href='./APP/index.php'\">Continuar a la app</button><p>
            <p><button onClick=\"location.href='./salir.php'\">Salir</button><p>";
    }
    else{
        echo "<h2>Usuario o contraseña incorrectos</h2><br>";
        echo "<p><button onClick=\"location.href='./salir.php'\">Volver a loguear</button><p>";

    }

?>