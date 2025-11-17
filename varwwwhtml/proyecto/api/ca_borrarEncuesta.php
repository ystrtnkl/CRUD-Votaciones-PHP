<?php
    $metodoRequerido = ["POST", "DELETE"];
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $nombre = isset($PETICION) ?? "";
    echo $nombre;
    header("Content-Type: text/plain");



?>