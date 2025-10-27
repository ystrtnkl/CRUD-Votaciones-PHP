
<title>Ver usuario</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <h2>Ver usuario</h2>
    <p>requiere variable en url</p>
    <p>requiere tener cuenta</p>

    <h2>Nombre</h2>
    <p><?=$usuario->getNombre()?></p>
    <h2>Correo</h2>
    <p><?=$usuario->getCorreo()?></p>
    <h2>Eres Admin</h2>
    <p><?=$usuario->getEsAdmin() === 's' ? "Sí" : "No"?></p>
    <h2>Fecha de creacion</h2>
    <p><?=$usuario->getFechaCreado()?></p>
    <h2>Eliminar</h2>
    <form action="/api/borrarUsuario" method="POST">
        <input type="hidden" name="uuid" value="<?=$usuario->getUuid()?>">
        <input type="hidden" name="contrasegna" value="<?=$usuario->getContrasegna()?>"> <!--PELIGROOOOOOOOOOO -->
        <input type="submit" value="ELIMINAR">
    </form>
    <h2>Editar datos</h2>
    <p>Déjalos en blanco para no editarlos</p>
    <form action="/api/modificarUsuario" method="POST">
        Nuevo nombre: <input type="text" name="nombre" placeholder="<?=$usuario->getNombre()?>"><br>
        Nuevo correo: <input type="email" name="correo" placeholder="<?=$usuario->getCorreo()?>"><br>
        Nueva contrasegna: <input type="password" name="contrasegna"><br>
        Nueva contrasegna otra vez: <input type="password" name="contrasegna2"><br>
        <input type="hidden" name="uuid" value="<?=$usuario->getUuid()?>">
        <input type="submit" value="Editar usuario">
    </form>
    <p>Cambia tu foto:</p>
    <form action="/api/guardarFotoPerfil" method="POST" enctype='multipart/form-data'>
        Nueva foto: <input type="file" name="foto"><br>
        <input type="hidden" name="uuid" value="<?=$usuario->getUuid()?>">
    </form>
    <h2>Tus encuestas</h2>
    <p>a</p>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>