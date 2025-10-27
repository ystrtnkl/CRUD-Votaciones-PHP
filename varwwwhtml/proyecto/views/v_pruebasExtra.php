<?php
        use Models\Usuario;
        use Models\Respuesta;
        use Models\Encuesta;

        $usuario = new Usuario("que", "que@gmail.com", "de443e67-c06a-4f3a-9e99-2e6189c9808f");
        $usuario2 = new Usuario("quien", "quien@gmail.com");
        $encuesta = new Encuesta("preguntas", $usuario);
        $respuesta = new Respuesta($usuario2, $encuesta);
        
?>
<title>Inicio de CRUD de votaciones</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/vt_cabecera.php") ?>
<?php require(DIR_FUNCTIONS . "c_generarContrasegna.php") ?>
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

<?php
        echo $usuario->getUuid() . "<br>";
        echo $usuario2->getUuid() . "<br>";
        echo $encuesta->getId() . "<br>";
        echo $respuesta->getId() . "<br>";
    ?>

</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>