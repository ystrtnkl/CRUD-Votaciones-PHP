<?php
    use Models\Usuario;
    //use Exception;
    use Controllers\ModificarUsuario;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, POST requerido";
        exit;
    }
    

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;
    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $nombre = $nombre === "" || $nombre === null ? false : $nombre;
    $correo = $correo === "" || $correo === null ? false : $correo;
    $contrasegna = $contrasegna === "" || $contrasegna === null ? false : $contrasegna;
    $esApi = isset($_POST['esApi']);

    header('Content-Type: application/json; charset=utf-8');
    try {
        #$usuario = new Usuario($nombre, $correo, $contrasegna);
        ModificarUsuario::modificarDatos($uuid, $nombre, $correo, $contrasegna, false);
        if ($esApi) {
            $response = (object)[
            'success' => true,
            #'data' => (object)$usuario->jsonSerialize(),
            'message' => 'Usuario creado correctamente.'
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $uuid, true, 303);
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