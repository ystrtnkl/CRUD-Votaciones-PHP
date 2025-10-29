<?php
use Controllers\Functions\Validaciones;
//Recibe un uuid y una foto, y la guarda, y asigna a ese usuario esa foto

$metodoRequerido = "POST";
include_once(DIR_FUNCTIONS . "c_requerirMetodo.php");

if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir' && isset($_POST["uuid"]) && $_POST["uuid"] != "") {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $nombre = $_FILES['foto']['name'];
        $usuario = $_POST["uuid"];
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
            header('Location: /404', true, 301);
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
            //header("HTTP/1.1 400 Bad Request");
            header('Location: /404', true, 301);
            exit();
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], $final);

        // CAMBIAR, NO DEVOLVER ESTO (modificar usuario para qeu tenga la url)
        echo "<p>Archivo $nombre subido con éxito</p><img src='/" . $final . "' alt='foto subida' width='200px'><p>" . $final . "</p>";
    } else {
        //header("HTTP/1.1 400 Bad Request");
        header('Location: /404', true, 301);
        exit();
    }
} else {
    //header("HTTP/1.1 400 Bad Request");
    header('Location: /404', true, 301);
    exit();
}