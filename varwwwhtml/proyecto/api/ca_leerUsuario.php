<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;

    //LEER un usuario mediante su UUID
    //Metodo GET y todos los campos validados (y que el usuario exista)
    //Devuelve el objeto en formato JSON

    $metodoRequerido = "GET";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    $uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;

    header('Content-Type: application/json; charset=utf-8');
    try {
        $usuario = LeerUsuario::leer($uuid);
        echo json_encode($usuario->jsonSerialize(), JSON_UNESCAPED_UNICODE);
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }




?>