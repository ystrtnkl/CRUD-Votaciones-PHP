<?php
    namespace Models;
    use Ramsey\Uuid\Uuid;
    use Respect\Validation\Validator;
    use Controllers\Functions\Validaciones;
    use Respect\Validation\Exceptions\ValidationException;
    use Models\Usuario;
    use Models\TipoPermisos;
    //Clase representativa de una encuesta
    class Encuesta implements \JsonSerializable {
        private $id; //uuid
        private $nombre; //Titulo de la encuesta
        private $contenido; //Preguntas o contenido
        private $usuario; //Usuario creador de la encuesta
        private $permisos; //Lista con los uuid de los usuarios
        private TipoPermisos $tipoPermisos; //B = blacklist, W = whitelist, N = nada
        private $foto; //Url a la foto de la portada
        private $fechaCreado; //Timestamp de su creacion

        public function __construct($nombre, $usuario, $id = "", $contenido = "Nada", $permisos = [], $tipoPermisos = TipoPermisos::N, $foto = "", $fechaCreado = "") {
            try {
                try {
                    Validaciones::vUuid($id);
                } catch (ValidationException $e) {
                    $id = Uuid::uuid4()->toString();
                }
                //Validator::in(['b','n','w'])->check($tipoPermisos);
                Validaciones::vTipoPermisos($tipoPermisos);
                Validaciones::vPermisos($permisos);
                Validaciones::vFotoEncuesta($foto);
                Validaciones::vNombreEncuesta($nombre);
                Validaciones::vContenidoEncuesta($contenido);
                Validaciones::vEsUsuario($usuario);
                Validaciones::vString36($usuario->getUuid());
                try {
                    Validaciones::vFechaCreado($fechaCreado);
                } catch (ValidationException $e) {
                    $fechaCreado = (string) time();
                }
                if (in_array($usuario->getUuid(), $permisos) && $tipoPermisos !== 'n') {
                    throw new \Exception("El creador no tiene relevancia en los permisos de su encuesta.");
                }
                
                $this->id = $id;
                $this->nombre = $nombre;
                $this->contenido = $contenido;
                $this->usuario = $usuario;
                $this->permisos = $permisos;
                $this->tipoPermisos = $tipoPermisos;
                $this->foto = $foto;
                $this->fechaCreado = $fechaCreado;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                throw $e;
            } catch (\Exception $e) {
                //echo "Error en los datos: " . $e;
                throw $e;
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
                Validaciones::vPermisos($permisos);
                $this->permisos = $permisos;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }
        public function setTipoPermisos($tipoPermisos) {
            try{
                //Validator::in(['b','n','w'])->check($tipoPermisos);
                Validaciones::vTipoPermisos($tipoPermisos);
                $this->tipoPermisos = $tipoPermisos;
                return $this;
            } catch (ValidationException $e) {
                //echo "Error en los datos: " . $e;
                return null;
            }
        }

        public function jsonSerialize(): mixed
        {
            return [
              "id"=>$this->id,
              "nombre"=>$this->nombre,
              "contenido"=>$this->contenido,
              "usuario"=>$this->usuario->getUuid(),
              "tipoPermisos"=>strtoupper($this->tipoPermisos->name),
              "foto"=>$this->foto??"",
              "fechaCreado"=>$this->fechaCreado
            ];
        }

    }
?>