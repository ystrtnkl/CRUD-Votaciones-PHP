<?php
#Longitud concreta, x cantidad mínima de caracteres especiales, se asegura de tener minúsculas, números y mayúsculas
function generatePassword($longitud = 12) {
    $charsGeneral = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $charsNumeros = '0123456789';
    $charsSimbolos = '!@#$%^&*()';
    $texto = substr(str_shuffle($charsGeneral), 0, $longitud);
    return $texto;
}

echo generatePassword();