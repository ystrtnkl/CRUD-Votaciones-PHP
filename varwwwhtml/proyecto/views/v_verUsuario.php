
<title>Ver usuario</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <h2>Ver usuario</h2>
    <!-- CERRAR SESION Y LOGOUT SOLO SI NO ES EL DUEGNO -->
    
    <?php if ($_SESSION['uuid'] === $_GET['uuid']) { ?>
    <a href="/api/cerrarSesion">Cerrar sesion</a> <p><?=$_SESSION['uuid']?></p>
    <?php } ?>
    
    <p>requiere variable en url</p>
    <p>requiere tener cuenta</p>

    <img src="<?=$_SESSION['urlFoto']?>" alt="Foto de perfil">
    <h2>Nombre</h2>
    <p><?=$_SESSION['nombre']?></p>
    <h2>Correo</h2>
    <p><?=$_SESSION['correo']?></p>
    <h2>Eres Admin</h2>
    <p><?=$_SESSION['esAdmin'] === 's' ? "Sí" : "No"?></p>
    <h2>Fecha de creacion</h2>
    <p><?=$_SESSION['fechaCreacion']?></p>
    <?php if ($_SESSION['uuid'] === $_GET['uuid']) { ?>
    <h2>Eliminar</h2>
    <form action="/api/borrarUsuario" method="POST">
        <input type="hidden" name="uuid" value="<?=$_SESSION['uuid']?>">
        Por razones de seguridad, introduce tu contrasegna: <input type="password" name="contrasegna" required placeholder="<?=$_SESSION['contrasegna']?>"><br>
        Otra vez: <input type="password" name="contrasegna2" required placeholder="<?=$_SESSION['contrasegna']?>"><br>
        <input type="submit" value="ELIMINAR">
    </form>
    <h2>Editar datos</h2>
    <p>Déjalos en blanco para no editarlos</p>
    <form action="/api/modificarUsuario" method="POST">
        Por razones de seguridad, introduce tu contrasegna: <input type="password" name="contrasegna" required placeholder="<?=$_SESSION['contrasegna']?>"><br>
        Otra vez: <input type="password" name="contrasegna2" required placeholder="<?=$_SESSION['contrasegna']?>"><br>
        Nuevo nombre: <input type="text" name="nombre" placeholder="<?=$_SESSION['nombre']?>"><br>
        Nuevo correo: <input type="email" name="correo" placeholder="<?=$_SESSION['correo']?>"><br>
        Nueva contrasegna: <input type="password" name="nuevaContrasegna"><br>
        Nueva contrasegna otra vez: <input type="password" name="nuevaContrasegna2"><br>
        <input type="hidden" name="uuid" value="<?=$_SESSION['uuid']?>">
        <input type="submit" value="Editar usuario">
    </form>
    <p><b>Cambia tu foto:</b></p>
    <form action="/api/guardarFotoPerfil" method="POST" enctype='multipart/form-data'>
        Nueva foto: <input type="file" required name="foto" accept=".jpg,.jpeg,.png,.gif"><br>
        <input type="hidden" name="esParaPerfil" value="s">
        <input type="hidden" name="uuid" value="<?=$_SESSION['uuid']?>">
        <input type="submit" value="Editar foto">
    </form>
    <h2>Encuestas del usuario</h2>
    <?php } ?>
    <p>a</p>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>