<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;
    include_once(DIR_FUNCTIONS . "c_generarContrasegna.php");
    //Objeto que representa un usuario
    class Usuario implements \JsonSerializable {

        private $uuid; //Su uuid
        private $nombre; //Nombre de usuario
        private $correo; //Correo del usuario
        private $contrasegna; //Contrasegna encriptada del usuario
        private $fechaCreado; //Timestamp de la creacion
        private $esAdmin; //Si es admin o no (solo cambiable en la base de datos)
        private $urlFoto; //La url de su foto de perfil

        public function __construct($nombre, $correo, $contrasegna = "", $uuid = "", $fechaCreado = "", $esAdmin = 'n', $urlFoto = "") {
            try {
                if ($urlFoto !== "") {
                    try {
                        Validaciones::vUrlFoto($urlFoto);
                    } catch (\Exception $e) {
                        $urlFoto = "";
                    }
                }
                try {
                    Validaciones::vUuid($uuid);
                } catch (ValidationException $e) {
                    $uuid = Uuid::uuid4()->toString();
                }
                Validaciones::vNombreUsuario($nombre);
                Validaciones::vCorreo($correo);
                try {
                    Validaciones::vContrasegna($contrasegna);
                } catch (ValidationException $e) {
                    $contrasegna = generarContrasegna();
                }
                $contrasegna = (string) $contrasegna;
                try {
                    Validaciones::vFechaCreado($fechaCreado);
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
                $this->urlFoto = $urlFoto;
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
        public function getUrlFoto() {
            return $this->urlFoto;
        }
        public function __toString()
        {
            return $this->uuid;
        }

        public function setNombre($nombre) {
            try {
                Validaciones::vNombreUsuario($nombre);
                $this->nombre = $nombre;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }
        public function setCorreo($correo) {
            try {
                Validaciones::vCorreo($correo);
                $this->correo = $correo;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }
        public function setContrasegna($contrasegna) {
            try {
                Validaciones::vContrasegna($contrasegna);
                $this->contrasegna = password_hash($contrasegna, PASSWORD_BCRYPT);
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }

        public function setUrlFoto($urlFoto) {
            try {
                Validaciones::vUrlFoto($urlFoto);
                $this->urlFoto = $urlFoto;
                return $this;
            } catch (ValidationException $e) {
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