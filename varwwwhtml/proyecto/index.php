<?php
    session_start();

    require_once("env.php"); #Globales
    
    include_once("vendor/autoload.php"); #Obligatorio para composer

    require_once(DIR_FUNCTIONS . "c_generalizarHttp.php");
    //$PETICION = generalizarHttp();
    //const PETICION = generalizarHttp();
    define('PETICION', generalizarHttp());
    
    include_once("rutas.php");

    #mongodb
?>


