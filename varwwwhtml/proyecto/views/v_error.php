<title>Error 404</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<?php 
    //$mensaje = "";
    if (isset($error)) {
        if ($error === 404) {
            $mensaje = "Ruta no encontrada";
        }
        if ($error === 405) {
            $mensaje = "Metodo HTTP no permitido";
        }
    } else {
        //$mensaje = "Error desconocido";
        if (!isset($mensaje)) {
            $mensaje = $_GET['mensaje'] ?? "";
            $mensaje = str_replace("_", " ", $mensaje) . '.';
        }
    }
?>
<main>
    <h2>Error <?=$error ?? ""?></h2>
    <p><?=$mensaje ?? "Mensaje desconocido"?></p>
    <a href="/inicio">Volver al inicio</a>
    <p>Mas informacion:</p>
    <div class="alert alert-danger cajaError" role="alert">
        <?php
            if (isset($e)) {
                var_dump($e);
            }
        ?>
    </div>
    <br><br><br>
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>