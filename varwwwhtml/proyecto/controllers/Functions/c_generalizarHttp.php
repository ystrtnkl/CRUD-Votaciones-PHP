<?php
    //Función para que $_POST, $_PUT, $_GET y $_DELETE se fusionen en el mismo array declarativo
    function generalizarHttp() {
        $peticion = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $peticion = unserialize(serialize($_POST));
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $peticion = unserialize(serialize($_GET));
        } else {
            $peticion = json_decode(file_get_contents('php://input'), true) ?? [];
        }
        $peticion['_METHOD'] = $_SERVER['REQUEST_METHOD'];
        return $peticion;
    }