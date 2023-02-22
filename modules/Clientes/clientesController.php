<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}
include_once('../../include/functions.php');
$clientesClass = new clientesClass();
$resultado = 0;
$respuesta = array();

$crearCliente = (isset($_POST['crear_cliente'])) ? $_POST['crear_cliente'] : "0";

if($crearCliente == 1){
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0"; 
    $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0"; 
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0"; 
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0"; 
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0"; 
    
    $resultado = $clientesClass->crear_cliente($nombre, $dpi, $direccion, $telefono, $correo);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}
?>