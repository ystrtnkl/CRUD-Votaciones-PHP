<?php
    use Models\Usuario;
    use Controllers\CrearUsuario;
    use Controllers\Functions\Validaciones;
    use Controllers\UtilidadesDB;
    use Respect\Validation\Exceptions\ValidationException;

    //CREAR un usuario mediante su nombre, correo y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /verUsuario?uuid=x

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    comprobarMetodo($metodoRequerido);

    $nombre = isset(PETICION['nombre']) ? PETICION['nombre'] : null;
    $correo = isset(PETICION['correo']) ? PETICION['correo'] : null;
    $contrasegna = isset(PETICION['contrasegna']) ? password_hash(PETICION['contrasegna'], PASSWORD_BCRYPT) : null;
    $contrasegna2 = isset(PETICION['contrasegna2']) ? PETICION['contrasegna2'] : null;
    $esApi = isset(PETICION['esApi']);
    if ($esApi) {
        $_SESSION['porapi'] = true;
    }

    header('Content-Type: application/json; charset=utf-8');
    try {
        try {
            /*if (password_verify($contrasegna2, $contrasegna)) {
                throw new Exception("Contrasegnas no coinciden");
            }*/
            Validaciones::vContrasegna($contrasegna);
            Validaciones::vCorreo($correo);
            Validaciones::vNombreUsuario($nombre);
        } catch (\Exception $e) {
            $mensaje = "Uno de los datos introducidos es invalido";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=El_nombre,_correo_o_contrasegna_son_invalidos', true, 303);
            exit;
        }
        if (!password_verify($contrasegna2, $contrasegna)) {
            $mensaje = "Las dos contrasegnas tienen que ser iguales";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        $usuario = new Usuario($nombre, $correo, $contrasegna);
        if (CrearUsuario::crear(UtilidadesDB::getConexion(), $usuario) === null) {
            throw new Exception("Error en los datos");
        }
        $_SESSION['auto-nombre'] = $nombre;
        $_SESSION['auto-correo'] = $correo;
        include_once(DIR_FUNCTIONS . "c_asignarUsuarioSesion.php");
        if ($esApi) {
            $response = (object)[
            'success' => true,
            'data' => (object)$usuario->jsonSerialize(),
            'message' => 'Usuario creado correctamente.'
            ];
            
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $usuario->getUuid(), true, 303);
        }
    } catch (\Exception $e) {
        $mensaje = "Ha habido un error en los campos";
        $_SESSION['error-mensaje'] = $mensaje;
        header('Location: /error?mensaje=Error_en_los_datos', true, 303);
    }

?>