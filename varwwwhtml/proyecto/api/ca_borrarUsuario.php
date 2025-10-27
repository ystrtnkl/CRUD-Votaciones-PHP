<?php
    use Models\Usuario;
    use Controllers\BorrarUsuario;

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    

    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;
    $esApi = isset($_POST['esApi']);

    //header('Content-Type: application/json; charset=utf-8');
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
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }

?>