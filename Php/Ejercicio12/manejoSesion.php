<?php

session_start();
if (!isset($_SESSION['nombre'])) {
    header('location: ./login.php');
    exit();
}

?>