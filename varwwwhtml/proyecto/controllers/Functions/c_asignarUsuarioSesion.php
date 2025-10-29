<?php
//Asignar a la sesion los datos del usuario si existen
if (isset($usuario)) {
    unset($_SESSION["uuid"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["correo"]);
    unset($_SESSION["fechaCreacion"]);
    unset($_SESSION["esAdmin"]);
    unset($_SESSION["urlFoto"]);
    unset($_SESSION["contrasegna"]);
    unset($_SESSION["usuario"]);

    try {
        $_SESSION['uuid'] = $usuario->getUuid();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['correo'] = $usuario->getCorreo();
        $_SESSION['fechaCreacion'] = $usuario->getFechaCreado();    
        $_SESSION['esAdmin'] = $usuario->getEsAdmin();
        $_SESSION['urlFoto'] = $usuario->getUrlFoto();
        $_SESSION['contrasegna'] = $usuario->getContrasegna();
    } catch (\Exception $e) {
        //echo $e;
    }
    
}
?>