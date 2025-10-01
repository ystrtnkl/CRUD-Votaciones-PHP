<title>Inicio de CRUD de votaciones</title>
</head>
<body>
<?php require(DIR_VIEWS . "template/cabecera.php") ?>
<?php require(DIR_CONTROLLERS . "generarContrasegna.php") ?>
<main>
    <h2>Contrasegna de ejemplo</h2>
    <p>Genera una contrasegna de 4 a 72 caracteres asegurandose de que tiene numeros, simbolos, mayusculas y minusculas</p>
    <p>Aqui tienes una contrasegna nueva de ejemplo de 12 caracteres</p>
    Cantidad de caracteres: <input type="number" id="tamagnoContrasegna" name="tamagno" min="4" max="72" value="12">
    <button id="generar">Generar</button><br>
    <p id="contrasegnaGenerada"></p>
    <script src="<?=DIR_PUBLIC?>js/llamarGenerarContrasegna.js"></script>
</main>
<?php include(DIR_VIEWS . "template/footer.php") ?>