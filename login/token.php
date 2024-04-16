<?php 
session_start();
require 'bd/conexion_bd.php';

 if(isset($_GET["generartokeng"])) {
    $token = uniqid();
    $_SESSION["token"] = $token;
    echo $token;
}
?>