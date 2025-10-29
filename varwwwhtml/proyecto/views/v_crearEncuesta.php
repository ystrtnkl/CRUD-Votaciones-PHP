
<title>Crear encuesta</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <?php
        if (!isset($_SESSION['uuid'])/* || no existe el usuario*/) {
            echo "<script>window.location.href = '/iniciarSesion';</script>";
            exit;
        }
    ?>
    <h2>Crear encuesta</h2>
    <form method="POST" action="/api/crearEncuesta" enctype='multipart/form-data'>
        <input type="hidden" name="uuid" value="<?=$_SESSION['uuid']?>">
        Portada (solo imagenes): <input type="file" name="portada" accept=".jpg,.jpeg,.png,.gif"><br>
        Nombre: <input type="text" name="nombre" autofocus required><br>
        Contenido: <br><textarea name="contenido">Escribe tus preguntas</textarea><br>
        <fieldset>
            <legend>Selecciona el tipo de permisos:</legend>
            <div>
                <input type="radio" id="tipoPermisos-nada" name="tipoPermisos" value="n" checked />
                <label for="tipoPermisos-nada">Nada (todos pueden interactuar)</label>
            </div>
            <div>
                <input type="radio" id="tipoPermisos-blacklist" name="tipoPermisos" value="b" />
                <label for="tipoPermisos-blacklist">Blacklist (puedes prohibir ciertos usuarios)</label>
            </div>
            <div>
                <input type="radio" id="tipoPermisos-whitelist" name="tipoPermisos" value="w" />
                <label for="tipoPermisos-whitelist">Whitelist (solo ciertos usuarios pueden interactuar)</label>
            </div>
        </fieldset>
        Escribe los UUIDs de los usuarios que permitir/denegar separados por comas (si elegiste Nada, esto sera irrelevante): <br>
        <textarea name="permisos">1,2,3...</textarea><br>
        <input type="submit" value="crear">
    </form>
    <p>La encuesta sera publica mediante su enlace, y estara hecha a tu nombre. Luego podras ir viendo los distintos resultados.</p>
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>