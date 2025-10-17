<?php

namespace Controllers\Interfaces;

interface Leer {
    public function autorizarAccion($usuario, $contrasegna): bool;
    public function leer($uuid);
    public function leerTodos(): array;
}