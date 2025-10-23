<?php
    use Models\Usuario;
    //use Exception;
    use Controllers\BorrarUsuario;

    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        http_response_code(405);
        header("Content-Type: text/plain");
        echo "Error 405, POST requerido";
        exit;
    }
    

    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;
    $esApi = isset($_POST['esApi']);

    header('Content-Type: application/json; charset=utf-8');
    try {
        BorrarUsuario::borrar($uuid, $contrasegna);
        if ($esApi) {
            $response = (object)[
            'success' => true,
            'message' => 'Usuario borrado correctamente.'
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /', true, 303);
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