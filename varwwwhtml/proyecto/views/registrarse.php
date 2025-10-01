<title>Registrarse</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<?php require(DIR_CONTROLLERS . "generarContrasegna.php") ?>
<main>
    <h2>Registrarse</h2>

    <form action="<?=DIR_API?>registrar.php" method="POST">
        <p>Nombre:</p> 
        <input type="text" name="nombre" id="nombre"><br>
        <p>Correo:</p> 
        <input type="email" name="correo" id="correo"><br>
        <p>Contrasegna:</p> 
        <input type="password" name="contrasegna" id="contrasegna"><br>
        <p>Repetir contraseña:</p> 
        <input type="password" name="contrasegna2" id="contrasegna2"><br>
        <input class="btn btn-primary" type="submit" value="Iniciar sesión" id="submit">
    </form>

    <button class="btn btn-primary" type="button" id="generar">Generar contrasegna automatica</button> <br>
    <div id="posibleContrasegna" class="oculto">
        <div id="contrasegnaGenerada"></div>
        <p>(Actualiza para generar una nueva) <button class="btn btn-primary" type="button" id="usarContrasegna">Usar esta contrasegna</button></p>
    </div>

    <a href="/iniciarSesion">Ya tengo cuenta</a>
    <script src="<?=DIR_PUBLIC?>js/llamarGenerarContrasegna.js"></script>
</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>