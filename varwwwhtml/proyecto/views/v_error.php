<?php
    if ($_SESSION['porapi'] === true) {
        header('Location: /api/error', true, 303);
        $_SESSION['porapi'] = false;
    }
?>
<title>Error 404</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<?php 
    //$mensaje = "";
    if (isset($error)) {
        if ($error === 404) {
            $mensaje = "Ruta no encontrada";
            //$_SESSION['error-mensaje'] = $mensaje;
        }
        if ($error === 405) {
            $mensaje = "Metodo HTTP no permitido";
            //$_SESSION['error-mensaje'] = $mensaje;
        }
    } else {
        //$mensaje = "Error desconocido";
        if (!isset($mensaje)) {
            $mensaje = $_GET['mensaje'] ?? "";
            $mensaje = str_replace("_", " ", $mensaje) . '.';
            //$_SESSION['error-mensaje'] = $mensaje;
        }
    }
?>
<main>
    <h2>Error <?=$error ?? ""?></h2>
    <h3><?=$mensaje ?? "Mensaje desconocido"?></h3>
    <a href="/inicio">Volver al inicio</a><br>
    <button onclick="window.history.back()">Ir atras</button>
    <?php if (!isset($e) || $e === null) { ?>
    <p>Mas informacion: <?=$descripcion??''?></p>
    <p><?=$_SESSION['error-mensaje'] ?? $mensaje?></p>
    <div class="alert alert-danger cajaError" role="alert">
        <?php
            if (isset($e)) {
                var_dump($e);
            }
        ?>
    </div>
    <?php } 
    $_SESSION['error-mensaje'] = "";
    ?>
    <br><br><br>
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>