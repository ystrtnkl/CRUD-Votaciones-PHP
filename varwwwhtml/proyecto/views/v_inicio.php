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
<main>
    <h2>Pagina de inicio</h2>

    
    <?php
        echo $usuario->getUuid() . "<br>";
        echo $usuario2->getUuid() . "<br>";
        echo $encuesta->getId() . "<br>";
        echo $respuesta->getId() . "<br>";
    ?>
    
</main>
<?php include(DIR_VIEWS . "template/vt_footer.php") ?>