<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;
    use Models\Usuario;
    use Models\Encuesta;
    use Exception;
    //Objeto que representa una respuesta de un usuario a la encuesta de otro usuario
    class Respuesta implements \JsonSerializable {
        private $id; //uuid
        private $contenido; //Contenido de la respuesta
        private $usuario; //Usuario que hizo la respuesta
        private $encuesta; //A que encuesta responde
        private $fechaCreado; //Timestamp de la creacion

        public function __construct($usuario, $encuesta, $id = "", $contenido = "Nada", $fechaCreado = "") {
            try {
                try {
                    Validaciones::vUuid($id);
                } catch (ValidationException $e) {
                    $id = Uuid::uuid4()->toString();
                }
                Validaciones::vContenidoRespuesta($contenido);
                Validaciones::vEsEncuesta($encuesta);
                Validaciones::vEsUsuario($usuario);
                Validaciones::vString36($usuario->getUuid());
                Validaciones::vString36($encuesta->getId());
                try {
                    Validaciones::vFechaCreado($fechaCreado);
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

        public function jsonSerialize(): mixed
        {
            return [
              "id"=>$this->id,
              "contenido"=>$this->contenido,
              "usuario"=>$this->usuario->getUuid(),
              "encuesta"=>$this->encuesta->getUuid(),
              "fechaCreado"=>$this->fechaCreado
            ];
        }
    }
?>