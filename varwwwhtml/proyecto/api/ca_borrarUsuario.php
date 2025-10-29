<?php
    use Models\Usuario;
    use Controllers\BorrarUsuario;
    use Controllers\Functions\Validaciones;

    //BORRAR un usuario mediante su UUID y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    
    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? password_hash($_POST['contrasegna'], PASSWORD_BCRYPT) : null;
    $contrasegna2 = isset($_POST['contrasegna2']) ? password_hash($_POST['contrasegna2'], PASSWORD_BCRYPT) : null;
    $esApi = isset($_POST['esApi']);

    try {
        try {
            Validaciones::vUuid($uuid);
            Validaciones::vContrasegna($contrasegna);
        } catch (\Exception $e) {
            header('Location: /error?mensaje=Ha_habido_un_error_en_los_campos', true, 303);
            exit;
        }
        if ($_POST['contrasegna'] !== $_POST['contrasegna2']) {
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        BorrarUsuario::borrar($uuid, $contrasegna);
        if ($esApi) {
            $response = (object)[
            'success' => true,
            'message' => 'Usuario borrado correctamente.'
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /api/cerrarSesion', true, 303);
        }
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }

?>