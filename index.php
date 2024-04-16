<?php
$clave_privada = "-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgHinNEk0hXs9yDMPcbg2slbCM+iH0Rh+V6RTLnpSq+lflt1Py57u
2Wcq07gAE5Rp7qkZJUHae99alB7aEdu3CcMjqDiYag8h1te6c5M2DkQLoPcJP0H/
vWKPpgCGkqIlHhGMgOhFp5Oo6viMTjPhO+6cIRnWM8o4X0Rf/B/J5wwJAgMBAAEC
gYAXU8ShLr1sEYrmjGLhSfn7GjstBy1fPfY1+DsxPVCto2Soz2fAB9ASyU378k/W
zxBss0bnz5VJntqqiGERiPci9QLxwhNz/CkGE9AHKL2JIITVCDRTEDafrGQolpiv
pw+e62I5FeqYYk03PcIglTzpwrLzmO+efy+QxOXja52IvQJBANkg541ydbDBW4zS
Ej/Qnmiylz/0VOkMQLBY2mEe9Oqu/iMz1Vdznn5QVXdsSsixH/Vj5pk1tRNBCrB5
BjPk7hsCQQCOQMpYTWckfemqOXSpnVquEG0j4ORj5XEXIJm3Rqhx8qmQg26xRnpz
pfCp+koWBuXaWEwcdddD6DjT4rJvtACrAkEAlbli8t7i2Sf8gXa6rtak5X2BXtCV
XL7ePLyImkBGky5ogM3VZ6CKwn+S7+71Ar9hUk25Th0C6GwJevd5l39d0QJAFgFb
y9EddX2s2dJNg7d9wZN07qnparKhjexTGxDpGcdqB5rtUqsOYjl3QzQepc2nXOFv
1K89/5k6wTw+Uh1MRQJAVHtvJ7s4wiuEsjodrWY4JdkoIRR/NaMRjNFMKJaf5wLr
EoJuCfHgB68zSLMvsO/JRQxCDUdAJQbzFgo+N4PA6Q==
-----END RSA PRIVATE KEY-----";
// var_dump($_POST);
$ssl_clave_privada = openssl_get_privatekey($clave_privada);
openssl_private_decrypt(
    base64_decode($_POST["nombre"]),
    $nombre,
    $ssl_clave_privada
);
openssl_private_decrypt(
    base64_decode($_POST["contra"]),
    $contra,
    $ssl_clave_privada
);
require 'bd/conexion_bd.php';
$obj = new BD_PDO();
session_start();
function token() {
    return bin2hex(random_bytes(32));
}

if ($_POST["token"] === $_SESSION['token']) {
    if (isset($_SESSION['captcha']) && $_POST["txtcap"] === $_SESSION['captcha']) {
        $consulta = $obj->Ejecutar_Instruccion("SELECT * FROM usuarios WHERE nombre = '{$nombre}' AND contra = '{$contra}'");
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            // Usuario autenticado, redirigirlo a principal.html
            $_SESSION['usuario'] = $usuario;
            $_SESSION['token'] = token();
            header('Location: app.js');
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas. Inicio de sesión fallido.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">El captcha ingresado no coincide. Inicio de sesión fallido.</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Token inválido. Inicio de sesión fallido.</div>';
}
?>
