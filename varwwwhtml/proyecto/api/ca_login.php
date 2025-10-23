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

    $correo = isset($_GET['correo']) ? $_GET['correo'] : null;
    $contrasegna = isset($_GET['contrasegna']) ? $_GET['contrasegna'] : null;
    $esApi = isset($_POST['esApi']);

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = LeerUsuario::iniciarSesion($correo, $contrasegna);
        if ($esApi) {
            echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $usuario->getUuid(), true, 303);
        }
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