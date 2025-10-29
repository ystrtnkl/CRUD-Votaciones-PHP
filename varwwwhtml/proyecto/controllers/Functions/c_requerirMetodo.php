<?php
//Comprueba que el metodo es el necesario, si no da error
if ($_SERVER['REQUEST_METHOD'] !== $metodoRequerido ?? "POST") {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, " . $metodoRequerido ?? "POST" . " requerido";
        exit;
}

?>