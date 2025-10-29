<?php
    use Models\Usuario;
    use Controllers\ModificarUsuario;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;

    //MODIFICAR un usuario mediante su uuid cambiando su posible nombre, correo, contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /verUsuario?uuid=x

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $nuevaContrasegna = isset($_POST['nuevaContrasegna']) ? password_hash($_POST['nuevaContrasegna'], PASSWORD_BCRYPT) : null;
    //$nuevaContrasegna2 = isset($_POST['nuevaContrasegna2']) ? password_hash($_POST['nuevaContrasegna2'], PASSWORD_BCRYPT) : null;
    $uuid = isset($_POST['uuid']) ? $_POST['uuid'] : null;
    $nombre = $nombre === "" || $nombre === null ? false : $nombre;
    $correo = $correo === "" || $correo === null ? false : $correo;
    $nuevaContrasegna = $nuevaContrasegna === "" || $nuevaContrasegna === null ? false : $nuevaContrasegna;
    //$nuevaContrasegna2 = $nuevaContrasegna2 === "" || $nuevaContrasegna2 === null ? false : $nuevaContrasegna2;
    $esApi = isset($_POST['esApi']);
    $contrasegna = isset($_POST['contrasegna']) ? password_hash($_POST['contrasegna'], PASSWORD_BCRYPT) : null;
    //$contrasegna2 = isset($_POST['contrasegna2']) ? password_hash($_POST['contrasegna2'], PASSWORD_BCRYPT) : null;

    header('Content-Type: application/json; charset=utf-8');
    try {
        /*if ($contrasegna2 !== $contrasegna) {
            throw new Exception("Contrasegnas no coinciden");
        }
        if ($nuevaContrasegna2 !== $nuevaContrasegna) {
            throw new Exception("Contrasegnas nuevas no coinciden");
        }*/
        #$usuario = new Usuario($nombre, $correo, $contrasegna);
        try {
            Validaciones::vContrasegna($contrasegna);
            if ($nuevaContrasegna !== "") Validaciones::vContrasegna($nuevaContrasegna);
            if ($correo !== "") Validaciones::vCorreo($correo);
            if ($nombre !== "") Validaciones::vNombreUsuario($nombre);
            Validaciones::vUuid($uuid);
        } catch (\Exception $e) {
            header('Location: /error?mensaje=Alguno_de_los_campos_es_invalido', true, 303);
            exit;
        }
        if ($_POST['contrasegna'] !== $_POST['contrasegna2']) {
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit;
        }
        if ($_POST['nuevaContrasegna'] !== $_POST['nuevaContrasegna2']) {
            header('Location: /error?mensaje=Las_nuevas_contrasegnas_no_son_iguales', true, 303);
            exit;
        }
        $usuario = ModificarUsuario::modificarDatos($uuid, $nombre, $correo, $contrasegna, false);
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