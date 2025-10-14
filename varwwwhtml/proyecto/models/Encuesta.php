<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Respect\Validation\Exceptions\ValidationException;
    use Models\Usuario;
    use Exception;
    class Encuesta {
        private $id;
        private $nombre;
        private $contenido;
        private $usuario;
        private $permisos;
        private $tipoPermisos;
        private $foto;
        private $fechaCreado;

        public function __construct($nombre, $contenido = "Nada", $usuario, $permisos = [], $tipoPermisos = 'n', $foto = "") {
            try {
                Validator::in(['b','n','w'])->check($tipoPermisos);
                Validator::arrayType()->each(Validator::stringType()->length(36,36))->check($permisos);
                Validator::stringType()->length(null,127)->check($foto);
                Validator::stringType()->notEmpty()->length(3, 127)->check($nombre);
                Validator::stringType()->notEmpty()->length(1,4095)->check($contenido);
                Validator::instance(Usuario::class)->check($usuario);
                Validator::stringType()->length(36,36)->check($usuario->getUuid());
                if (in_array($usuario->getUuid(), $permisos) && $tipoPermisos !== 'n') {
                    throw new Exception("El creador no tiene relevancia en los permisos de su encuesta.");

                }
                $uuidCreado = Uuid::uuid4();
                $this->id = $uuidCreado->toString();
                $this->nombre = $nombre;
                $this->contenido = $contenido;
                $this->usuario = $usuario;
                $this->permisos = $permisos;
                $this->tipoPermisos = $tipoPermisos;
                $this->foto = $foto;
                $this->fechaCreado = time();
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            } catch (Exception $e) {
                echo "Error en los datos: " . $e;
            }
        }

        public function getId() {
            return $this->id;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getContenido() {
            return $this->contenido;
        }
        public function getUsuario() {
            return $this->usuario;
        }
        public function getPermisos() {
            return $this->permisos;
        }
        public function getTipoPermisos() {
            return $this->tipoPermisos;
        }
        public function getFoto() {
            return $this->foto;
        }
        public function getFechaCreado() {
            return $this->fechaCreado;
        }
        public function __toString()
        {
            return $this->id;
        }

        public function setPermisos($permisos) {
            try{
                Validator::arrayType()->each(Validator::stringType()->length(36,36))->check($permisos);
                $this->permisos = $permisos;
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            }
        }
        public function setTipoPermisos($tipoPermisos) {
            try{
                Validator::in(['b','n','w'])->check($tipoPermisos);
                $this->tipoPermisos = $tipoPermisos;
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            }
        }
    }
?>