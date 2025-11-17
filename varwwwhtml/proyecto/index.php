<?php
    session_start();

    require_once("env.php"); #Globales

    require_once(DIR_FUNCTIONS . "c_generalizarHttp.php");
    $PETICION = generalizarHttp();
    
    include_once("vendor/autoload.php"); #Obligatorio para composer
    
    include_once("rutas.php");

    #mongodb
?>


