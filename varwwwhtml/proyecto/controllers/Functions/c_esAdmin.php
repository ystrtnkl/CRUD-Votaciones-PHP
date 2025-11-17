<?php
    use Controllers\LeerUsuario;
    use Controllers\UtilidadesDB;

    //Devuelve true si el usuario es admin, ya sea teniendo el check de administrador en la sesion o teniendo el correo y contrasegna en la peticion post/get
    function esAdmin() {
        if (isset($_SESSION['esAdmin']) && $_SESSION['esAdmin'] === 's') {
            return true;
        } else if (isset(PETICION['correo']) && isset(PETICION['contrasegna'])) {
            try {
                $usuario = LeerUsuario::iniciarSesion(UtilidadesDB::getConexion(), PETICION['correo'] ?? '', PETICION['contrasegna'] ?? '');
                return $usuario->getEsAdmin() === 's';
            } catch (\Exception $e) {}
        }
        return false;
    }