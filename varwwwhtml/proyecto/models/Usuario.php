<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Respect\Validation\Exceptions\ValidationException;
    include_once(DIR_FUNCTIONS . "c_generarContrasegna.php");
    class Usuario implements \JsonSerializable {

        private $uuid;
        private $nombre;
        private $correo;
        private $contrasegna;
        private $fechaCreado;
        private $esAdmin;

        public function __construct($nombre, $correo, $contrasegna = "", $uuid = "", $fechaCreado = "", $esAdmin = 'n') {
            try {
                try {
                    Validator::uuid()->check($uuid);
                } catch (ValidationException $e) {
                    $uuid = Uuid::uuid4()->toString();
                }
                Validator::stringType()->notEmpty()->length(3, 63)->check($nombre);
                Validator::email()->check($correo);
                try {
                    Validator::stringType()->notEmpty()->length(8, 128)->check($contrasegna);
                } catch (ValidationException $e) {
                    $contrasegna = generarContrasegna();
                }
                $contrasegna = (string) $contrasegna;
                try {
                    Validator::stringType()->notEmpty()->check($fechaCreado);
                } catch (ValidationException $e) {
                    $fechaCreado = (string) time();
                }
                if ($esAdmin !== 's') {
                    $esAdmin = 'n';
                }
                $this->uuid = $uuid;
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->fechaCreado = $fechaCreado;
                $this->esAdmin = $esAdmin;
                $this->contrasegna = password_hash($contrasegna, PASSWORD_BCRYPT);
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                throw $e;
            }
        }
        public function getUuid() {
            return $this->uuid;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getCorreo() {
            return $this->correo;
        }
        public function getContrasegna() {
            return $this->contrasegna;
        }
        public function getFechaCreado() {
            return $this->fechaCreado;
        }
        public function getEsAdmin() {
            return $this->esAdmin;
        }
        public function __toString()
        {
            return $this->uuid;
        }

        public function setNombre($nombre) {
            try {
                Validator::stringType()->notEmpty()->length(3, 63)->check($nombre);
                $this->nombre = $nombre;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }
        public function setCorreo($correo) {
            try {
                Validator::email()->check($correo);
                $this->correo = $correo;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }
        public function setContrasegna($contrasegna) {
            try {
                Validator::stringType()->notEmpty()->length(8, 128)->check($contrasegna);
                $this->contrasegna = password_hash($contrasegna, PASSWORD_BCRYPT);
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }

        public function jsonSerialize(): mixed
        {
            return [
              "uuid"=>$this->uuid,
              "nombre"=>$this->nombre,
              "correo"=>$this->correo,
              "contrasegna"=>$this->contrasegna,
              "fechaCreado"=>$this->fechaCreado,
              "esAdmin"=>$this->esAdmin
            ];
    }
    }
?>