<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;
    use Controllers\UtilidadesDB;

    //Login con un usuario mediante su correo y contrasegna
    //Metodo GET y todos los campos validados
    //esApi para recibir una respuesta en JSON con los datos del usuario, si no devuelve a /verUsuario?uuid=x y inicia sesion
    
    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");
    comprobarMetodo($metodoRequerido);

    $correo = isset(PETICION['correo']) ? PETICION['correo'] : null;
    $contrasegna = isset(PETICION['contrasegna']) ? /*password_hash(*/PETICION['contrasegna']/*, PASSWORD_BCRYPT)*/ : null;
    
    $esApi = isset(PETICION['esApi']);
    if ($esApi) {
        $_SESSION['porapi'] = true;
    }
    
    try {
        
        Validaciones::vCorreo($correo);
        Validaciones::vContrasegna($contrasegna);
        $usuario = LeerUsuario::iniciarSesion(UtilidadesDB::getConexion(), $correo, $contrasegna);
        $_SESSION['auto-correo'] = $correo;
        if ($usuario === null) {
            include_once(DIR_FUNCTIONS . "c_error400Json.php");
        } else {
            include_once(DIR_FUNCTIONS . "c_asignarUsuarioSesion.php");
            if ($esApi) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
            } else {
                header('Location: /verUsuario?uuid=' . $usuario->getUuid(), true, 303);
            }
        }
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }




?>