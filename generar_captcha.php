<?php
session_start();

$captchaText = substr(md5(mt_rand()), 0, 5);
$_SESSION['captchaText'] = $captchaText;

$imagen = imagecreatetruecolor(120, 40);
$colorFondo = imagecolorallocate($imagen, 255, 255, 255);
$colorTexto = imagecolorallocate($imagen, 0, 0, 0);

// Llena el fondo de la imagen
imagefill($imagen, 0, 0, $colorFondo);

// Agrega el texto al centro de la imagen
imagettftext($imagen, 20, 0, 10, 30, $colorTexto, 'arial.ttf', $captchaText);

// Agrega un borde negro alrededor de la imagen
$bordeColor = imagecolorallocate($imagen, 128, 128, 128);
imagerectangle($imagen, 0, 0, 118, 39, $bordeColor);
// Establece el tipo de contenido como imagen PNG
header('Content-Type: image/png');

// Genera la imagen
imagepng($imagen);

// Libera la memoria ocupada por la imagen
imagedestroy($imagen);
?>

