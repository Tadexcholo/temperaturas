<?php
function generar() {
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $textorandom = substr(str_shuffle($caracteres), 0, 6);
    $_SESSION['captcha'] = $textorandom ;
    $imagen = imagecreate(84, 32);
    $fondo = imagecolorallocate($imagen, 255, 255, 255); 
    $texto = imagecolorallocate($imagen, 0, 0, 255); 
    imagefill($imagen, 0, 0, $fondo);
    imagestring($imagen, 15, 9, 5, $textorandom , $texto);
    
    ob_start(); 
    imagepng($imagen);
    $contenido = ob_get_clean(); 
    imagedestroy($imagen);
    return base64_encode($contenido);
}
if (isset($_GET['generarcaptcha'])) {
    session_start();
    $captcha = generar();
    echo $captcha;
    exit();
}
?>
