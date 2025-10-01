<?php
#Longitud concreta, se asegura de tener minúsculas, números, símbolos y mayúsculas
function generarContrasegna($longitud = 12) {
    $charsGeneral = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    if ($longitud < 4 || !is_numeric($longitud) || $longitud > 72) {
        $longitud = 12;
    }
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
    return $texto;
}
