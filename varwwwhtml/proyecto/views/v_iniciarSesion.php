<title>Iniciar sesion</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <h2>Iniciar sesion</h2>
    <p>Si ya tienes una sesión iniciada, se cerrara</p>
    <form action="/api/iniciarSesion" method="POST">
        <p>Correo: </p>
        <input required type="email" name="correo"><br>
        <p>Contrasegna: </p>
        <input required type="password" name="contrasegna"><br>
        <input class="btn btn-primary" type="submit" value="Iniciar sesión">
    </form>
    <a href="/registrarse">No tengo cuenta</a>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>