<?php
    use Models\Usuario;
    use Controllers\LeerUsuario;

    //Logout con un usuario mediante su UUID
    //Metodo GET y todos los campos validados

    $metodoRequerido = "GET";
    include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

    //$uuid = isset($_GET['uuid']) ? $_GET['uuid'] : null;

    try {
        unset($_SESSION["usuario"]);
        unset($_SESSION["uuid"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION["correo"]);
        unset($_SESSION["fechaCreacion"]);
        unset($_SESSION["esAdmin"]);
        unset($_SESSION["urlFoto"]);
        unset($_SESSION["contrasegna"]);
        session_destroy();
        header('Location: /iniciarSesion', true, 303);
    } catch (\Exception $e) {
        include_once(DIR_FUNCTIONS . "c_error400Json.php");
    }




?>