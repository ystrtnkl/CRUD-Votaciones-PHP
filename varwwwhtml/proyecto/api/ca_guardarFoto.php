<?php
use Controllers\ModificarUsuario;
use Controllers\LeerUsuario;
use Controllers\UtilidadesDB;
//Recibe un uuid y una foto, y la guarda, y asigna a ese usuario esa foto

$metodoRequerido = "POST";
include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");


try {
if (isset($_POST['btnSubir']) && $_POST['btnSubir'] === 'Subir' && isset($_POST["uuid"]) && $_POST["uuid"] != "") {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        if (isset($_POST['esApi'])) {
            $_SESSION['porapi'] = true;
        }
        $nombre = $_FILES['foto']['name'];
        $usuario = $_POST["uuid"];

        $contrasegna = $_POST['contrasegna'] ?? '';
        $contrasegna2 = $_POST['contrasegna2'] ?? '';
        $correo = $_POST['correo'] ?? '';
        if ($contrasegna !== $contrasegna2) {
            $mensaje = "Ambas contrasegnas tienen que ser iguales";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Ambas_contrasegnas_tienen_que_ser_iguales', true, 303);
            exit();
        }
        $usuario = LeerUsuario::iniciarSesion(UtilidadesDB::getConexion(), $correo, $contrasegna);


        $extension = "";
        if (str_ends_with(strtolower($nombre), ".png")) {
            $extension = ".png";
        } else if (str_ends_with(strtolower($nombre), ".jpg")) {
            $extension = ".jpg";
        } else if (str_ends_with(strtolower($nombre), ".jpeg")) {
            $extension = ".jpeg";
        } else if (str_ends_with(strtolower($nombre), ".gif")) {
            $extension = ".gif";
        } else {
            //header("HTTP/1.1 400 Bad Request");
            $mensaje = "Solo se admiten: .png, .jpg, .jpeg y .gif con un tamagno razonable";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Formato_de_foto_invalido', true, 303);
            exit();
        }
        
        $ruta = DIR_FILES;
        if (isset($_POST["esParaPerfil"]) && $_POST["esParaPerfil"] == "s") {
            $ruta = DIR_FOTOS_PERFIL;
        } else {
            $ruta = DIR_PORTADAS_ENCUESTAS;
        }
        $final = $ruta . "pfp-" . $usuario . "-" . time() . $extension;
        if (file_exists($final)) {
            unlink($final);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], $final);

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $fotoUrl = $protocol . $_SERVER['HTTP_HOST'] . '/' . $final;
        if (!ModificarUsuario::modificarFoto(UtilidadesDB::getConexion(), $usuario, $contrasegna, $correo, $fotoUrl)) {
            $mensaje = "No se ha reconocido el archivo, no tienes permisos o ha ocurrido otro error";
            $_SESSION['error-mensaje'] = $mensaje;
            header('Location: /error?mensaje=Datos_invalidos', true, 303);
            exit();
        }
        $_SESSION['urlFoto'] = $fotoUrl;

        if (isset($_POST['esApi'])) {
            $response = (object)[
                'success' => true,
                'message' => 'Usuario creado correctamente.'
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else if (isset($_POST['redirigir'])) {
            header('Location: /verUsuario?uuid=' . $_POST["uuid"], true, 301);
        } else {
            echo "<p>Archivo $nombre subido con éxito</p><img src='/" . $final . "' alt='foto subida' width='200px'><p>" . $final . "</p>";
        }
    } else {
        //header("HTTP/1.1 400 Bad Request");
        $mensaje = "No se ha reconocido el archivo, no tienes permisos o ha ocurrido otro error";
        $_SESSION['error-mensaje'] = $mensaje;
        header('Location: /error?mensaje=Datos_invalidos', true, 303);
        exit();
    }
} else {
    //header("HTTP/1.1 400 Bad Request");
    $mensaje = "No se ha reconocido el archivo, no tienes permisos o ha ocurrido otro error";
    $_SESSION['error-mensaje'] = $mensaje;
    header('Location: /error?mensaje=Datos_invalidos', true, 303);
    exit();
}
} catch (\Exception $e) {
    $mensaje = "No se ha reconocido el archivo, no tienes permisos o ha ocurrido otro error";
    $_SESSION['error-mensaje'] = $mensaje;
    //$descripcion = $e->getMessage();
    header('Location: /error?mensaje=Datos_invalidos', true, 303);
    exit();
}