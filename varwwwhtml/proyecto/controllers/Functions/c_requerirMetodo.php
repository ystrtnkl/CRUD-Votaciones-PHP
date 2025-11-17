<?php
//Comprueba que el metodo es el necesario, si no da error

function malMetodo($metodoRequerido) {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, " . $metodoRequerido ?? "metodo HTTP concreto" . " requerido";
        exit;
}



function comprobarMetodo($metodoRequerido) {
try {
        if (is_array($metodoRequerido) && !in_array($_SERVER['REQUEST_METHOD'], $metodoRequerido ?? [])) {
                malMetodo($metodoRequerido);
        } else if (is_string($metodoRequerido) && $_SERVER['REQUEST_METHOD'] !== $metodoRequerido ?? '') {
                malMetodo($metodoRequerido);
        } /*else {
                malMetodo();
        }*/
} catch (\Exception $e) {
        malMetodo($metodoRequerido);
}
}


?>