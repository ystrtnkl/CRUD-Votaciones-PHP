<title>Iniciar sesion</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<main>
    <h2>iniciar sesion</h2>

    <form action="<?=DIR_CONTROLLERS?>login.php" method="POST">
        Correo: <input type="email" name="correo"><br>
        Contraseña: <input type="password" name="contrasegna"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <a href="/registrarse">No tengo cuenta</a>
    
</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>