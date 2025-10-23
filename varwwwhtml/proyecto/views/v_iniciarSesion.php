<title>Iniciar sesion</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <h2>Iniciar sesion</h2>
    <p>Si ya tienes una sesión iniciada, se cerrará</p>
    <form action="/api/iniciarSesion" method="GET">
        <p>Correo: </p>
        <input type="email" name="correo"><br>
        <p>Contrasegna: </p>
        <input type="password" name="contrasegna"><br>
        <input class="btn btn-primary" type="submit" value="Iniciar sesión">
    </form>
    <a href="/registrarse">No tengo cuenta</a>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>