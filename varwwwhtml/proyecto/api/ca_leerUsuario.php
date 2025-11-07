<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;
    use Controllers\UtilidadesDB;

    //LEER un usuario mediante su UUID
    //Metodo GET y todos los campos validados (y que el usuario exista)
    //Devuelve el objeto en formato JSON

    $metodoRequerido = "GET";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = LeerUsuario::leer(UtilidadesDB::getConexion(), $uuid);
        echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    } catch (\Exception $e) {
        $mensaje = "El usuario no existe";
        header('Location: /error?mensaje=Usuario_no_existe', true, 303);
        exit;
    }




?>