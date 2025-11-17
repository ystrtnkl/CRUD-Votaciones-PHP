<?php
    $nombre = isset(PETICION['nombre']) ?? "";
    echo $nombre;
    header("Content-Type: text/plain");



?>