<?php
    $nombre = isset($_POST['nombre']) ? $_GET['nombre'] : "";
    echo $nombre;
    header("Content-Type: text/plain");



?>