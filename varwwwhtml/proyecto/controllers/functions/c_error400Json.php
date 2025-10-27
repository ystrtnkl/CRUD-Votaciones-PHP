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
    header('Location: /404', true, 303);
}

?>