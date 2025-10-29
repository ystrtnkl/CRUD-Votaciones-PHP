<?php
    use Models\Usuario;
    use Controllers\CrearUsuario;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;

    //CREAR un usuario mediante su nombre, correo y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /verUsuario?uuid=x

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? password_hash($_POST['contrasegna'], PASSWORD_BCRYPT) : null;
    //$contrasegna2 = isset($_POST['contrasegna2']) ? password_hash($_POST['contrasegna2'], PASSWORD_BCRYPT) : null;
    $esApi = isset($_POST['esApi']);

    header('Content-Type: application/json; charset=utf-8');
    try {
        /*if ($contrasegna2 !== $contrasegna) {
            throw new Exception("Contrasegnas no coinciden");
        }password_verify(original, hash2)*/
        try {
            Validaciones::vContrasegna($contrasegna);
            Validaciones::vCorreo($correo);
            Validaciones::vNombreUsuario($nombre);
        } catch (\Exception $e) {
            header('Location: /error?mensaje=El_nombre,_correo_o_contrasegna_son_invalidos', true, 303);
            exit;
        }
        if ($_POST['contrasegna'] !== $_POST['contrasegna2']) {
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        $usuario = new Usuario($nombre, $correo, $contrasegna);
        CrearUsuario::crear($usuario);
        include_once(DIR_FUNCTIONS . "c_asignarUsuarioSesion.php");
        if ($esApi) {
            $response = (object)[
            'success' => true,
            'data' => (object)$usuario->jsonSerialize(),
            'message' => 'Usuario creado correctamente.'
            ];
            $_SESSION['auto-nombre'] = $nombre;
            $_SESSION['auto-correo'] = $correo;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $usuario->getUuid(), true, 303);
        }
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }

?>