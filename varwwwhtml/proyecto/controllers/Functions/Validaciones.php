<?php
namespace Controllers\Functions;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\ValidationException;
use Models\TipoPermisos;
use Models\Usuario;
use Models\Encuesta;
use Models\Respuesta;
class Validaciones {
    //Funcion para validar cada campo, y si hay un fallo suelta un error ValidationException
    public static function vUuid($dato) {
        Validator::uuid()->check($dato);
    }
    public static function vTipoPermisos($dato) {
        Validator::instance(TipoPermisos::class)->check($dato);
    }
    public static function vPermisos($dato) {
        Validator::arrayType()->each(Validator::stringType()->length(36,36))->check($dato);
    }
    public static function vFotoEncuesta($dato) {
        Validator::stringType()->length(null,127)->check($dato);
    }
    public static function vNombreEncuesta($dato) {
        Validator::stringType()->notEmpty()->length(3, 127)->check($dato);
    }
    public static function vContenidoEncuesta($dato) {
        Validator::stringType()->notEmpty()->length(1,4095)->check($dato);
    }
    public static function vEsUsuario($dato) {
        Validator::instance(Usuario::class)->check($dato);
    }
    public static function vFechaCreado($dato) {
        Validator::stringType()->notEmpty()->check($dato);
    }
    public static function vContenidoRespuesta($dato) {
        Validator::stringType()->notEmpty()->length(1,4094)->check($dato);
    }
    public static function vEsEncuesta($dato) {
        Validator::instance(Encuesta::class)->check($dato);
    }
    public static function vUrlFoto($dato) {
        Validator::stringType()->notEmpty()->url()->check($dato);
    }
    public static function vNombreUsuario($dato) {
        Validator::stringType()->notEmpty()->length(3, 63)->check($dato);
    }
    public static function vCorreo($dato) {
        Validator::email()->check($dato);
    }
    public static function vContrasegna($dato) {
        Validator::stringType()->notEmpty()->length(8, 4094)->check($dato);
    }
    public static function vString36($dato) {
        Validator::stringType()->length(36,36)->check($dato);
    }
}