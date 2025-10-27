<?php
    use Models\Usuario;
    use Controllers\CrearUsuario;

    //CREAR un usuario mediante su nombre, correo y contrasegna
    //Metodo POST y todos los campos validados
    //esApi para recibir una respuesta en JSON, si no devuelve a /verUsuario?uuid=x

    $metodoRequerido = "POST";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $contrasegna = isset($_POST['contrasegna']) ? $_POST['contrasegna'] : null;
    $esApi = isset($_POST['esApi']);

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = new Usuario($nombre, $correo, $contrasegna);
        CrearUsuario::crear($usuario);
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
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }

?>