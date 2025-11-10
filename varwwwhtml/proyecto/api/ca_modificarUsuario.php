<?php
    use Models\Usuario;
    use Controllers\ModificarUsuario;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;
    use Controllers\UtilidadesDB;

    //MODIFICAR un usuario mediante su uuid cambiando su posible nombre, correo, contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /verUsuario?uuid=x

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $nuevoNombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $nuevoCorreo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $nuevaContrasegna = isset($_POST['nuevaContrasegna']) ? $_POST['nuevaContrasegna'] : null;
    $nuevaContrasegna2 = isset($_POST['nuevaContrasegna2']) ? $_POST['nuevaContrasegna2'] : null;
    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $correoOriginal = isset($_POST['correoOriginal']) ? $_POST['correoOriginal'] : null;
    $contrasegnaOriginal = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;
    $contrasegnaOriginal2 = isset($_POST['contrasegna2']) ? $_POST['contrasegna2'] : null;
    $esApi = isset($_POST['esApi']);

    $nuevoNombre = $nuevoNombre === "" || $nuevoNombre === null ? "" : $nuevoNombre;
    $nuevoCorreo = $nuevoCorreo === "" || $nuevoCorreo === null ? "" : $nuevoCorreo;
    if ($nuevaContrasegna === "" || $nuevaContrasegna === null || $nuevaContrasegna2 === "" || $nuevaContrasegna2 === null) {
        $nuevaContrasegna = $contrasegnaOriginal;
        $nuevaContrasegna2 = $contrasegnaOriginal2;
    }

    header('Content-Type: application/json; charset=utf-8');
    try {
        if ($nuevaContrasegna !== $nuevaContrasegna2 || $contrasegnaOriginal !== $contrasegnaOriginal2) {
            $mensaje = "Las dos contrasegnas tienen que ser iguales";
            $_SESSION['error-mensaje'] = $mensaje;
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        try {
            $nuevaContrasegna ?? Validaciones::vContrasegna($nuevaContrasegna);
            Validaciones::vContrasegna($contrasegnaOriginal);
            $nuevoCorreo ?? Validaciones::vCorreo($nuevoCorreo);
            Validaciones::vCorreo($correoOriginal);
            $nuevoNombre ?? Validaciones::vNombreUsuario($nuevoNombre);
            Validaciones::vUuid($uuid);
        } catch (\Exception $e) {
            $mensaje = "Uno de los campos es invalido";
            $_SESSION['error-mensaje'] = $mensaje;
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Alguno_de_los_campos_es_invalido', true, 303);
            exit;
        }
        $nuevaContrasegna = password_hash($nuevaContrasegna, PASSWORD_BCRYPT);
        $usuarioDatos = array("nombre" => $nuevoNombre, "correo" => $nuevoCorreo, "contrasegna" => $nuevaContrasegna);
        $usuario = ModificarUsuario::modificar(UtilidadesDB::getConexion(), $uuid, $contrasegnaOriginal, $correoOriginal, $usuarioDatos);
        if ($usuario === null) {
            $mensaje = "Ha habido un error con los datos o no tienes autorizacion para editar el usuario";
            $_SESSION['error-mensaje'] = $mensaje;
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Error_de_datos_o_autorizacion', true, 303);
            exit;
        }
        include_once(DIR_FUNCTIONS . "c_asignarUsuarioSesion.php");
        if ($esApi) {
            $response = (object)[
            'success' => true,
            #'data' => (object)$usuario->jsonSerialize(),
            'message' => 'Usuario creado correctamente.'
            ];
            $_SESSION['auto-nombre'] = $nombre;
            $_SESSION['auto-correo'] = $correo;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $uuid, true, 303);
        }
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }

?>