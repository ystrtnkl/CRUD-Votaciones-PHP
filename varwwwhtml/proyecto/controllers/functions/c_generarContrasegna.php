<?php

//Genera una contrasegna con longitud concreta, se asegura de tener minúsculas, numeros, simbolos y mayusculas
function generarContrasegna(int $longitud = 12, bool $esPin = false): string {
    if ($longitud < 4 || !is_numeric($longitud) || $longitud > 70) {
        $longitud = 12;
    }
    if ($esPin) return substr(str_shuffle('0123456789012345678901234567890123456789012345678901234567890123456789'), 0, $longitud);
    $charsGeneral = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $charsNumeros = '0123456789';
    $charsSimbolos = '!@#$%^&*()';
    $charsMinusculas = 'abcdefghijklmnopqrstuvwxyz';
    $charsMayusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $texto = substr(str_shuffle($charsGeneral), 0, $longitud);
    $posNum = rand(0, strlen($texto) - 1);
    $randNum = rand(0, strlen($charsNumeros) - 1);
    $texto[$posNum] = $charsNumeros[$randNum];
    do {
        $posSimb = rand(0, strlen($texto) - 1);
    } while ($posSimb === $posNum);
    $randSimb = rand(0, strlen($charsSimbolos) - 1);
    $texto[$posSimb] = $charsSimbolos[$randSimb];
    do {
        $posMayus = rand(0, strlen($texto) - 1);
    } while ($posMayus === $posNum || $posMayus === $posSimb);
    $randMayus = rand(0, strlen($charsMayusculas) - 1);
    $texto[$posMayus] = $charsMayusculas[$randMayus];
    do {
        $posMinus = rand(0, strlen($texto) - 1);
    } while ($posMinus === $posNum || $posMinus === $posSimb || $posMinus === $posMayus);
    $randMinus = rand(0, strlen($charsMinusculas) - 1);
    $texto[$posMinus] = $charsMinusculas[$randMinus];
    return (string) $texto;
}
