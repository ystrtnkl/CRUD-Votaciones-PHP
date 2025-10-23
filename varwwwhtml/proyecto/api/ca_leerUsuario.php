<?php
    use Models\Usuario;
    //use Exception;
    use Controllers\LeerUsuario;

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, GET requerido";
        exit;
    }

    $uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = LeerUsuario::leer($uuid);
        echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    } catch (\Exception $e) {
        echo $e->getMessage();
        http_response_code(400);
        $response = (object)[
            'success' => false,
            'error' => 'Datos inválidos',
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }




?>