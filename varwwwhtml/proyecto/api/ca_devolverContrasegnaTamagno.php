<?php
$tamagno = isset($_GET['tamagno']) ? (int)$_GET['tamagno'] : 12;
$esPin = isset($_GET['esPin']) ?? false;
header("Content-Type: text/plain");
require_once(DIR_FUNCTIONS . "c_generarContrasegna.php");
#$tamagno = $_GET['tamagno'] ?? 12;
#echo generarContrasegna($tamagno, $esPin);
echo htmlspecialchars(generarContrasegna($tamagno, $esPin), ENT_QUOTES, 'UTF-8');