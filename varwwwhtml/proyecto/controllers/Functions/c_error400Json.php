<?php

//Devuelve un error por fallo de datos

if (isset($_POST['esApi']) || isset($_GET['esApi']) || isset($_PUT['esApi']) || isset($_DELETE['esApi'])) {
    echo $e->getMessage();
    //http_response_code(400);
    $response = (object)[
        'success' => false,
        'error' => 'Datos inválidos',
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    //echo "<script>window.location.pathname = 'error?mensaje=Error_en_los_datos_introducidos'</script>";
    
    header('Location: /error?mensaje=Error_en_los_datos_introducidos', true, 303);
    exit;
}

?>