<title>Registrarse</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<?php require(DIR_CONTROLLERS . "generarContrasegna.php") ?>
<main>
    <h2>Registrarse</h2>

    <form action="<?=DIR_CONTROLLERS?>registrar.php" method="POST">
        Nombre: <input type="text" name="nombre" id="nombre"><br>
        Correo: <input type="email" name="correo" id="correo"><br>
        Contrasegna: <input type="password" name="contrasegna" id="contrasegna"><br>
        Repetir contraseña: <input type="password" name="contrasegna2" id="contrasegna2"><br>
        <input type="submit" value="Iniciar sesión" id="submit">
    </form>

    <button id="generar">Generar contrasegna automatica</button> <br>
    <div id="posibleContrasegna" class="oculto">
        <div id="contrasegnaGenerada"></div>
        <p>(Actualiza para generar una nueva) <button id="usarContrasegna">Usar esta contrasegna</button></p>
    </div>

    <a href="/iniciarSesion">Ya tengo cuenta</a>
    <script src="<?=DIR_PUBLIC?>js/llamarGenerarContrasegna.js"></script>
</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>