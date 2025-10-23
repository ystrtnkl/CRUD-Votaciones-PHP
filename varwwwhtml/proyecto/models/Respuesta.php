<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Respect\Validation\Exceptions\ValidationException;
    use Models\Usuario;
    use Models\Encuesta;
    use Exception;
    class Respuesta {
        private $id;
        private $contenido;
        private $usuario;
        private $encuesta;
        private $fechaCreado;

        public function __construct($usuario, $encuesta, $id = "", $contenido = "Nada", $fechaCreado = "") {
            try {
                try {
                    Validator::uuid()->check($id);
                } catch (ValidationException $e) {
                    $id = Uuid::uuid4()->toString();
                }
                Validator::stringType()->notEmpty()->length(1,1023)->check($contenido);
                Validator::instance(Encuesta::class)->check($encuesta);
                Validator::instance(Usuario::class)->check($usuario);
                Validator::stringType()->length(36,36)->check($usuario->getUuid());
                Validator::stringType()->length(36,36)->check($encuesta->getId());
                try {
                    Validator::stringType()->notEmpty()->check($fechaCreado);
                } catch (ValidationException $e) {
                    $fechaCreado = (string) time();
                }
                if ($usuario->getUuid() === $encuesta->getUsuario()->getUuid()) {
                    throw new Exception("El usuario no puede responder a su propia encuesta.");
                }
                if ($encuesta->getTipoPermisos() === 'b' && in_array($usuario->getUuid(), $encuesta->getPermisos())) {
                    throw new Exception("El usuario ha sido prohibido en esta encuesta.");
                } else if ($encuesta->getTipoPermisos() === 'w' && !in_array($usuario->getUuid(), $encuesta->getPermisos())) {
                    throw new Exception("El usuario no esta permitido en esta encuesta.");
                }
                


                $this->id = $id;
                $this->usuario = $usuario;
                $this->encuesta = $encuesta;
                $this->fechaCreado = $fechaCreado;
                $this->contenido = $contenido;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                throw $e;
            } catch (Exception $e) {
                //echo "Error en los datos: " . $e;
                throw $e;
            }
        }

        public function getId() {
            return $this->id;
        }
        public function getUsuario() {
            return $this->usuario;
        }
        public function getEncuesta() {
            return $this->encuesta;
        }
        public function getContenido() {
            return $this->contenido;
        }
        public function getFechaCreado() {
            return $this->fechaCreado;
        }
        public function __toString()
        {
            return $this->id;
        }
    }
?>