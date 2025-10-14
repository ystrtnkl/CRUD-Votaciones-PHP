<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Respect\Validation\Exceptions\ValidationException;
    class Usuario {
        private $uuid;
        private $nombre;
        private $correo;
        private $contrasegna;
        private $fechaCreado;
        private $esAdmin;

        public function __construct($nombre, $correo, $contrasegna) {
            try {
                Validator::stringType()->notEmpty()->length(3, 63)->check($nombre);
                Validator::email()->check($correo);
                Validator::stringType()->notEmpty()->length(8, 128)->check($contrasegna);
                //Si el usuario ya existe
                $uuidCreado = Uuid::uuid4();
                $this->uuid = $uuidCreado->toString();
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->fechaCreado = time();
                $this->esAdmin = false;
                $this->contrasegna = password_hash($contrasegna, PASSWORD_BCRYPT);
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
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

        public function setNombre($nombre) {
            try {
                Validator::stringType()->notEmpty()->length(3, 63)->check($nombre);
                $this->nombre = $nombre;
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            }
        }
        public function setCorreo($correo) {
            try {
                Validator::email()->check($correo);
                $this->correo = $correo;
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            }
        }
        public function setContrasegna($contrasegna) {
            try {
                Validator::stringType()->notEmpty()->length(8, 128)->check($contrasegna);
                $this->contrasegna = password_hash($contrasegna, PASSWORD_BCRYPT);
            } catch (ValidationException $e) {
                echo "Error en los datos: " . $e;
            }
        }
    }
?>