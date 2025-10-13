<title>Inicio de CRUD de votaciones</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<?php require(DIR_CONTROLLERS . "c_generarContrasegna.php") ?>
<main>
    
<h2>Subir una FOTO a las fotos de perfil</h2>
<p>DEBE acabar en .png, .jpg, .jpeg o .gif, si no no funcionará</p>
<form enctype="multipart/form-data" action="/api/guardarFotoPerfil"  method="POST">
    Archivo: <input name="foto" type="file" accept=".jpg,.jpeg,.png,.gif" />
    <br />
    <input type="text" name="uuid">
    <br>
    <input type="hidden" name="esParaPerfil" value="s">
    <br>
    <input type="submit" name="btnSubir" value="Subir" />
</form>



</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>