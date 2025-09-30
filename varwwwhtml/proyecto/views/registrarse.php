<title>registrarse</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<main>
    <h2>registrarse</h2>

    <form action="<?=DIR_CONTROLLERS?>registrar.php" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Correo: <input type="email" name="correo"><br>
        Contraseña: <input type="password" name="contrasegna"><br>
        Repetir contraseña: <input type="password" name="contrasegna2"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <button id="generar">Generar contraseña automática</button> 
    <p id="posibleContrasegna" class="oculto"><?=require(DIR_CONTROLLERS . "generarContrasegna.php")?></p>
    <a href="/iniciarSesion">Ya tengo cuenta</a>
    <script src="<?=DIR_PUBLIC?>js/llamarGenerarContrasegna.js"></script>
</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>