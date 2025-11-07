<?php
    use Models\Usuario;
    use Controllers\BorrarUsuario;
    use Controllers\Functions\Validaciones;
    use Controllers\UtilidadesDB;

    //BORRAR un usuario mediante su UUID y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    
    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? password_hash($_POST['contrasegna'], PASSWORD_BCRYPT) : null;
    $contrasegna2 = isset($_POST['contrasegna2']) ? $_POST['contrasegna2'] : null;
    $esApi = isset($_POST['esApi']);

    try {
        try {
            Validaciones::vUuid($uuid);
            Validaciones::vContrasegna($contrasegna);
        } catch (\Exception $e) {
            $mensaje = "Los campos introducidos son incorrectos";
            header('Location: /error?mensaje=Ha_habido_un_error_en_los_campos', true, 303);
            exit;
        }
        if (!password_verify($contrasegna2, $contrasegna)) {
            $mensaje = "Las dos contrasegnas tienen que ser iguales";
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        if (!BorrarUsuario::borrar(UtilidadesDB::getConexion(), $uuid, $contrasegna2)) {
            $mensaje = "Ha habido un error con los datos o no tienes autorizacion para borrar el usuario";
            header('Location: /error?mensaje=Error_de_datos_o_autorizacion', true, 303);
            exit;
        }
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