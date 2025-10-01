<?php

header("Content-Type: text/plain");
require_once DIR_CONTROLLERS . "generarContrasegna.php";
#$tamagno = $_GET['tamagno'] ?? 12;
echo generarContrasegna($tamagno);
