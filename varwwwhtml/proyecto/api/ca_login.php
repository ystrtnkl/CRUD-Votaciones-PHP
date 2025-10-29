<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;
    use Respect\Validation\Validator;
    use Respect\Validation\Exceptions\ValidationException;

    //Login con un usuario mediante su correo y contrasegna
    //Metodo GET y todos los campos validados
    //esApi para recibir una respuesta en JSON con los datos del usuario, si no devuelve a /verUsuario?uuid=x y inicia sesion

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? password_hash($_POST['contrasegna'], PASSWORD_BCRYPT) : null;
    
    $esApi = isset($_POST['esApi']);
    
    //header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = LeerUsuario::iniciarSesion($correo, $contrasegna);
        include_once(DIR_FUNCTIONS . "c_asignarUsuarioSesion.php");
        if ($esApi) {
            echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
        } else {
            header('Location: /verUsuario?uuid=' . $usuario->getUuid(), true, 303);
        }
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }




?>