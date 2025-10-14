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

        public function __construct($usuario, $encuesta, $contenido = "Nada") {
            try {
                Validator::stringType()->notEmpty()->length(1,1023)->check($contenido);
                Validator::instance(Encuesta::class)->check($encuesta);
                Validator::instance(Usuario::class)->check($usuario);
                Validator::stringType()->length(36,36)->check($usuario->getUuid());
                Validator::stringType()->length(36,36)->check($encuesta->getId());
                if ($usuario->getUuid() === $encuesta->getUsuario()->getUuid()) {
                    throw new Exception("El usuario no puede responder a su propia encuesta.");
                }
                if ($encuesta->getTipoPermisos() === 'b' && in_array($usuario->getUuid(), $encuesta->getPermisos())) {
                    throw new Exception("El usuario ha sido prohibido en esta encuesta.");
                } else if ($encuesta->getTipoPermisos() === 'w' && !in_array($usuario->getUuid(), $encuesta->getPermisos())) {
                    throw new Exception("El usuario no esta permitido en esta encuesta.");
                }
                //Si ya ha respondido
                

                $idCreado = Uuid::uuid4();
                $this->id = $idCreado->toString();
                $this->contenido = $contenido;
                $this->usuario = $usuario;
                $this->encuesta = $encuesta;
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
    }
?>