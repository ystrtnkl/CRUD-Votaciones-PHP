<?php

    use Phroute\Phroute\RouteCollector; #Incluir libreria de rutas (despues de configurar apache para que rediriga siempre a index.php)
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;
    use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
    use Controllers\LeerUsuario;

    $router = new RouteCollector(); #Crear el enrutador

    #Creando rutas, que tienen que devolver un texto (el contenido a mostrar)

    //VISTAS:
    $router->get('/', function(){
        #return "<script>window.location.pathname = 'inicio'</script>";
        header("Location: /inicio", true, 301);
    });
    $router->get('/inicio', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_inicio.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/registrarse', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_registrarse.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/informacion', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_informacion.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/crearEncuesta', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_crearEncuesta.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/verEncuesta', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_verEncuesta.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/verUsuario', function(){
        /*if (!isset($_GET['uuid'])) {
            header('Location: /iniciarSesion', true, 303);
            exit;
        } else {
            try {
                $usuario = LeerUsuario::leer($_GET['uuid']);    
            } catch (\Exception) {
                header('Location: /iniciarSesion', true, 303);
                exit;
            }
        }*/
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_verUsuario.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/iniciarSesion', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_iniciarSesion.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/pedirContrasegna', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_pedirContrasegna.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/exito', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_exito.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/error', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_error.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });

    $router->get('/extra', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_pruebasExtra.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    $router->get('/admin', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "admin/v_admin.php");
        include_once(DIR_PUBLIC . "html/end.html");
    });
    



    //API:
    $router->post('/api/iniciarSesion', function(){
        include_once(DIR_API . "ca_login.php");
    });
    $router->get('/api/cerrarSesion', function(){
        include_once(DIR_API . "ca_logout.php");
    });
    $router->post('/api/crearUsuario', function(){
        include_once(DIR_API . "ca_crearUsuario.php");
    });
    $router->post('/api/borrarUsuario', function(){
        include_once(DIR_API . "ca_borrarUsuario.php");
    });
    $router->get('/api/leerUsuario', function(){
        include_once(DIR_API . "ca_leerUsuario.php");
    });
    $router->post('/api/modificarUsuario', function(){
        include_once(DIR_API . "ca_modificarUsuario.php");
    });
    $router->post('/api/crearEncuesta', function(){
        include_once(DIR_API . "ca_crearEncuesta.php");
    });
    $router->post('/api/borrarEncuesta', function(){
        include_once(DIR_API . "ca_borrarEncuesta.php");
    });
    $router->get('/api/leerEncuesta', function(){
        include_once(DIR_API . "ca_leerEncuesta.php");
    });
    $router->post('/api/modificarEncuesta', function(){
        include_once(DIR_API . "ca_modificarEncuesta.php");
    });
    $router->post('/api/crearRespuesta', function(){
        include_once(DIR_API . "ca_crearRespuesta.php");
    });
    $router->get('/api/leerRespuesta', function(){
        include_once(DIR_API . "ca_leerRespuesta.php");
    });

    $router->get('/api/prueba', function(){
        include_once(DIR_API . "ca_pruebaApi.php");
    });
    $router->get('/api/prueba/{id}', function($id){
        echo $id;
    });
    $router->get('/api/nuevaContrasegna', function(){
        #pidiendo parametros por la url, en este caso el endpoint devuelve un texto plano y no html (en el propio archivo)
        include_once(DIR_API . "ca_devolverContrasegnaTamagno.php");
    });
    $router->post('/api/guardarFotoPerfil', function(){
        include_once(DIR_API . "ca_guardarFoto.php");
    });
    $router->any('/ejemplo', function(){
        echo 'has llegado a ejemplo (no carga cosas html bien)';
    });
    $router->get('/ejemplo2', function(){
        include_once(DIR_PUBLIC . "html/head.html");  
        include_once(DIR_VIEWS . "v_prueba.php"); #Redirigiendo a otro archivo
        #return 'has llegado a ejemplo2 con get';
        include_once(DIR_PUBLIC . "html/end.html");
    });
    
    try{
        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        echo $response; #Mostrar en el navegador lo conseguido en la ruta

    } catch (HttpMethodNotAllowedException $e) {
        include_once(DIR_PUBLIC . "html/head.html"); 
        $error = 405;
        echo $error;
        include_once(DIR_VIEWS . "v_error.php");
        include_once(DIR_PUBLIC . "html/end.html");
    } catch (HttpRouteNotFoundException $e)  {
        include_once(DIR_PUBLIC . "html/head.html"); 
        $error = 404;
        echo $error;
        include_once(DIR_VIEWS . "v_error.php");
        include_once(DIR_PUBLIC . "html/end.html");
    } catch (\Error $e) {
        include_once(DIR_PUBLIC . "html/head.html");
        include_once(DIR_VIEWS . "v_error.php");
        include_once(DIR_PUBLIC . "html/end.html");
    }

?>