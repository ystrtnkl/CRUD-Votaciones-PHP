<title>Inicio de CRUD de votaciones</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<?php require(DIR_CONTROLLERS . "generarContrasegna.php") ?>
<main>
    <h2>Contrasegna</h2>
    <p>Aqui tienes una contrasegna nueva de ejemplo de 12 caracteres</p>
    <p id="contrasegnaGenerada"><?=generarContrasegna()?></p>
    <p>Actualiza para ver una nueva</p>


</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>