<?php
    use Models\Usuario;
    //use Exception;
    use Controllers\CrearUsuario;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, POST requerido";
        exit;
    }
    

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = new Usuario($nombre, $correo, $contrasegna);
        CrearUsuario::crear($usuario);
        /*$response = (object)[
            'success' => true,
            //'data' => (object)$data,
            'message' => 'Usuario creado correctamente.'
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);*/
        http_response_code(303);
        header('Location: /verUsuario?uuid=' . $usuario->getUuid());

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