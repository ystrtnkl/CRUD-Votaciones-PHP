
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina ejemplo dos</title>
    <link rel="icon" type="image/x-icon" href="media/favicon.png">
</head>
<body>
<?php
    echo "esto esta en prueba.php pero se ha accedido desde /ejemplo2";
    echo DIR_VIEWS;
?>
<script src="<?=DIR_PUBLIC?>js/hola.js"></script>
</body>
</html>