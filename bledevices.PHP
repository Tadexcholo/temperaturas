<?php
// Inicia la sesión si aún no se ha iniciado
session_start();
// Importar la clase del modelo
require 'modelo.php';
$obj = new UbicacionesModel(); 

// Genera un identificador único simple
$token = uniqid();
// Guarda el token en la sesión
$_SESSION['token'] = $token;

// Obtener los datos a registrar
if (isset($_POST["texto"]) && isset($_POST["email"]) && isset($_POST["token1"]) && isset($_POST["catcha"])) {
    // Descifrar los datos recibidos
    $password = $_POST["texto"];
    $email = $_POST["email"];
    $token1 = $_POST["token1"];
    $captchaValue = $_POST["catcha"];
    
    if (!($_SESSION['token'] == $token1 || $_SESSION['captchaText'] == $captchaValue)) {
        return;
    }    

    // Verificar si el correo ya está registrado
    if (!$obj->CorreoYaRegistrado($email)) {
        // Registrar el usuario
        if ($obj->RegistrarUsuario1($email, $password)) {
            // Registro exitoso, realizar alguna acción
            echo 'Registro exitoso.';
        } else {
            // Error en el registro, manejar según necesites
            echo 'Error en el registro.';
        }
    } else {
        // Correo ya registrado, manejar según necesites
        echo 'Este correo ya está registrado.';
    }  
}

// Obtener los datos a verificacion
if (isset($_POST["password"]) && isset($_POST["correo"])) {
    // Descifrar los datos recibidos
    $password = $_POST["password"];
    $email = $_POST["correo"];
    
    if (!($_SESSION['token'] == $token)){
        return;
    }

    // Verificar si el correo ya está registrado
    if ($obj->InicioSesion($email, $password)) {
        
    } else {
        // Correo ya registrado, manejar según necesites
        echo 'Este correo ya está registrado.';
    }  
}

if (isset($_POST['cerrarSesion'])) {
    if ($obj->cerrarSesion()) {
    }
}

// Obtener todas los datos de la tabla
$tablable = $obj->TablaBLE();
$tablaUsuarios = $obj->TablaUsuarios();


// Incluir la vista para mostrar los resultados
require 'vista.php';
?>
