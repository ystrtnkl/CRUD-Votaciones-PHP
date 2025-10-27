<?php
    require("secretEnv.php"); #Variables privadas, incluye: MARIADB_ROOT_PASSWORD, MARIADB_DATABASE, MARIADB_USER, MARIADB_PASSWORD, MONGO_INITDB_ROOT_USERNAME, MONGO_INITDB_ROOT_PASSWORD
    /* ejemplo
        const MARIADB_ROOT_PASSWORD = "123456789";
        const MARIADB_DATABASE = "base";
        const MARIADB_USER = "usuario";
        const MARIADB_PASSWORD = "123456789";
        const MONGO_INITDB_ROOT_USERNAME = "root";
        const MONGO_INITDB_ROOT_PASSWORD = "123456789";
    */


    #define('DIR_VIEWS','views/');
    const DIR_VIEWS = "views/";
    const DIR_CONTROLLERS = "controllers/";
    const DIR_MODELS = "models/";
    const DIR_SQL = "sql/";
    const DIR_MEDIA = "media/";
    const DIR_PUBLIC = "public/";
    const DIR_API = "api/";
    const DIR_FILES = "public/files/";
    const DIR_FILES_PRIV = "files/";
    const DIR_FOTOS_PERFIL = "public/files/fotosPerfil/";
    const DIR_PORTADAS_ENCUESTAS = "public/files/portadasEncuestas/";



?>