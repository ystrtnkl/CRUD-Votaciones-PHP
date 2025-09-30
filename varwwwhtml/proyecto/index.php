<?php
    require_once("env.php"); #Globales
    
    include_once "vendor/autoload.php"; #Obligatorio para composer
    use Phroute\Phroute\RouteCollector; #Incluir libreria de rutas (despues de configurar apache para que rediriga siempre a index.php)
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;;

    $router = new RouteCollector(); #Crear el enrutador


    $esHtml = true; #Si pone el principio y el final de un archivo .html correcto
    #Creando rutas, que tienen que devolver un texto (el contenido a mostrar)
    $router->get('/', function(){
        return "<script>window.location.pathname = 'inicio'</script>";
    });
    $router->get('/inicio', function(){
        include_once(DIR_VIEWS . "inicio.php");
    });
    $router->get('/registrarse', function(){
        include_once(DIR_VIEWS . "registrarse.php");
    });
    $router->get('/informacion', function(){
        include_once(DIR_VIEWS . "informacion.php");
    });
    $router->get('/crearEncuesta', function(){
        include_once(DIR_VIEWS . "crearEncuesta.php");
    });
    $router->get('/verEncuesta', function(){
        include_once(DIR_VIEWS . "verEncuesta.php");
    });
    $router->get('/verUsuario', function(){
        include_once(DIR_VIEWS . "verUsuario.php");
    });
    $router->get('/iniciarSesion', function(){
        include_once(DIR_VIEWS . "iniciarSesion.php");
    });
    $router->any('/ejemplo', function(){
        echo 'has llegado a ejemplo (no carga cosas html bien)';
    });
    $router->get('/ejemplo2', function(){
        include_once(DIR_VIEWS . "prueba.php"); #Redirigiendo a otro archivo
        #return 'has llegado a ejemplo2 con get';
    });
    
    if ($esHtml) include_once(DIR_PUBLIC . "html/head.html");  
    try{
        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        echo $response; #Mostrar en el navegador lo conseguido en la ruta

    } catch (HttpRouteNotFoundException $e)  {
        include_once(DIR_VIEWS . "error404.php");
    }
    if ($esHtml) include_once(DIR_PUBLIC . "html/end.html");

?>


