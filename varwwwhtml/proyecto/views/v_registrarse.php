<title>Registrarse</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<?php require(DIR_FUNCTIONS . "c_generarContrasegna.php") ?>
<main>
    <h2>Registrarse</h2>
    <p>Si ya tienes una sesión iniciada, se cerrara</p>
    <form action="api/crearUsuario" method="POST">
        <p>Nombre:</p> 
        <input required type="text" name="nombre" id="nombre"><br>
        <p>Correo:</p> 
        <input required type="email" name="correo" id="correo"><br>
        <p>Contrasegna:</p> 
        <input required type="password" name="contrasegna" id="contrasegna"><br>
        <p>Repetir contraseña:</p> 
        <input required type="password" name="contrasegna2" id="contrasegna2"><br>
        <input class="btn btn-primary" type="submit" value="Registrarse" id="submit">
    </form>

    <button class="btn btn-primary" type="button" id="generar">Generar contrasegna automatica</button> <br>
    <div id="posibleContrasegna" class="oculto">
        <div id="contrasegnaGenerada"></div>
        <p>(Actualiza para generar una nueva) <button class="btn btn-primary" type="button" id="usarContrasegna">Usar esta contrasegna</button></p>
    </div>

    <a href="/iniciarSesion">Ya tengo cuenta</a>
    <script src="<?=DIR_PUBLIC?>js/llamarGenerarContrasegna.js"></script>
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>