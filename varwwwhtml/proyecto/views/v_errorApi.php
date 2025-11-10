<?php
header('Content-Type: application/json; charset=utf-8');
$response = (object)[
    'success' => false,
    'error' => 406,
    'message' => 'Usuario creado correctamente.',
    'info' => $_SESSION['error-mensaje'] ?? $mensaje ?? ''
    ];
$_SESSION['error-mensaje'] = null;
echo json_encode($response, JSON_UNESCAPED_UNICODE);