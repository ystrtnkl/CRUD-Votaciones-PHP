<?php
    use Models\Usuario;
    use Controllers\BorrarUsuario;
    use Controllers\Functions\Validaciones;
    use Controllers\UtilidadesDB;

    //BORRAR un usuario mediante su UUID y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /

    $metodoRequerido = ["POST", "DELETE"];
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    
    $uuid = isset(PETICION['uuid']) ? PETICION['uuid'] : null;
    $correo = isset(PETICION['correo']) ? PETICION['correo'] : null;
    $contrasegna = isset(PETICION['contrasegna']) ? PETICION['contrasegna'] : null;
    $contrasegna2 = isset(PETICION['contrasegna2']) ? PETICION['contrasegna2'] : null;
    $esApi = isset(PETICION['esApi']);
    if ($esApi) {
        $_SESSION['porapi'] = true;
    }

    try {
        try {
            Validaciones::vUuid($uuid);
            Validaciones::vContrasegna($contrasegna);
        } catch (\Exception $e) {
            $mensaje = "Los campos introducidos son incorrectos";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Ha_habido_un_error_en_los_campos', true, 303);
            exit;
        }
        if ($contrasegna !== $contrasegna2) {
            $mensaje = "Las dos contrasegnas tienen que ser iguales";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        if (!BorrarUsuario::borrar(UtilidadesDB::getConexion(), $uuid, $contrasegna, $correo)) {
            $mensaje = "Ha habido un error con los datos o no tienes autorizacion para borrar el usuario";
            $_SESSION['error-mensaje'] = $mensaje;
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