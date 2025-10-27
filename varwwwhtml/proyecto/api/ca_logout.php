<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;

    //Logout con un usuario mediante su UUID
    //Metodo GET y todos los campos validados

    $metodoRequerido = "GET";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    //$uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;

    try {
        //cerrar sesion y borrar cookies
        unset($_SESSION["usuario"]);
        session_destroy();
        header('Location: /iniciarSesion', true, 303);
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }




?>