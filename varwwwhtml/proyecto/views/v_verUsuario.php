<?php 
    use Models\Usuario;
    use Controllers\LeerUsuario;
    use Controllers\UtilidadesDB;
?>
<title>Ver usuario</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<main>
    <h2>Ver usuario</h2>
    
    <?php 
    if ($_SESSION['uuid'] === $_GET['uuid'] && isset($_SESSION['uuid'])) { 
        $uuid = $_SESSION['uuid'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
        $esAdmin = $_SESSION['esAdmin'];
        $fechaCreacion = $_SESSION['fechaCreacion'];
        $contrasegna = $_SESSION['contrasegna'];
        $urlFoto = $_SESSION['urlFoto'];
    ?>
    <a href="/api/cerrarSesion">Cerrar sesion</a> <p><?=$_SESSION['uuid']?></p>
    <?php } else { ?>
    <?php
        $usuario = LeerUsuario::leer(UtilidadesDB::getConexion(), $_GET['uuid']);
        if ($usuario === null) {
            $mensaje = "No se ha encontrado el usuario especificado";
            header('Location: /error?mensaje=Usuario_no_encontrado', true, 303);
            exit;
        } else {
            $uuid = $usuario->getUuid();
            $nombre = $usuario->getNombre();
            $correo = $usuario->getCorreo();
            $esAdmin = $usuario->getEsAdmin();
            $fechaCreacion = $usuario->getFechaCreado();
            $contrasegna = "?";
            $urlFoto = $usuario->getUrlFoto() ?? '#';
        }
    ?>
    <?php } ?>

    <img src="<?=$urlFoto ?? 'http://localhost:8081/public/media/nofoto.png'?>" alt="Foto de perfil" class="foto-perfil">
    <h2>Nombre</h2>
    <p><?=$nombre?></p>
    <h2>Correo</h2>
    <p><?=$correo?></p>
    <h2>Eres Admin</h2>
    <p>
    <?php 
    echo $esAdmin === 's' ? "Sí" : "No";
    if ($esAdmin === 's' && $_SESSION['uuid'] === $_GET['uuid'] && isset($_SESSION['uuid'])) { ?>
        <br><a href="/admin">Panel de administracion</a>
    <?php } ?>
    </p>
    <h2>Fecha de creacion</h2>
    <p><?=date('d/m/y', (int)$fechaCreacion) ?? "Desconocido"?></p>
    <?php if ($uuid === $_GET['uuid']) { ?>
    <h2>Eliminar</h2>
    <form action="/api/borrarUsuario" method="POST">
        <input type="hidden" name="uuid" value="<?=$uuid?>">
        Por razones de seguridad, introduce tu contrasegna: <input type="password" name="contrasegna" required><br>
        Otra vez: <input type="password" name="contrasegna2" required><br>
        <input type="submit" value="ELIMINAR">
    </form>
    <h2>Editar datos</h2>
    <p>Déjalos en blanco para no editarlos</p>
    <form action="/api/modificarUsuario" method="POST">
        Por razones de seguridad, introduce tu contrasegna: <input type="password" name="contrasegna" required><br>
        Otra vez: <input type="password" name="contrasegna2" required><br>
        Nuevo nombre: <input type="text" name="nombre" placeholder="<?=$_SESSION['auto-nombre'] ?? ''?>"><br>
        Nuevo correo: <input type="email" name="correo" placeholder="<?=$_SESSION['auto-correo'] ?? ''?>"><br>
        Nueva contrasegna: <input type="password" name="nuevaContrasegna"><br>
        Nueva contrasegna otra vez: <input type="password" name="nuevaContrasegna2"><br>
        <input type="hidden" name="uuid" value="<?=$uuid?>">
        <input type="submit" value="Editar usuario">
    </form>
    <p><b>Cambia tu foto:</b></p>
    <form action="/api/guardarFotoPerfil" method="POST" enctype='multipart/form-data'>
        Nueva foto: <input type="file" required name="foto" accept=".jpg,.jpeg,.png,.gif"><br>
        <input type="hidden" name="esParaPerfil" value="s">
        <input type="hidden" name="btnSubir" value="Subir">
        <input type="hidden" name="uuid" value="<?=$uuid?>">
        <input type="hidden" name="redirigir" value="s">
        <input type="submit" value="Editar foto">
    </form>
    <h2>Encuestas del usuario</h2>
    <?php } ?>
    <p>a</p>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>