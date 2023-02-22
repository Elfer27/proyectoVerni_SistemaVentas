<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}
include_once('../../include/functions.php');
$proveedoresClass = new proveedoresClass();
$resultado = 0;
$respuesta = array();

$crearProveedor = (isset($_POST['crear_proveedor'])) ? $_POST['crear_proveedor'] : "0";
$eliminarProveedor = (isset($_POST['eliminar_proveedor'])) ? $_POST['eliminar_proveedor'] : "0";
$cargarProveedor = (isset($_POST['cargar_proveedor'])) ? $_POST['cargar_proveedor'] : "0";
$editarProveedor = (isset($_POST['editar_proveedor'])) ? $_POST['editar_proveedor'] : "0";


if($crearProveedor == 1){
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0"; 
    $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0"; 
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0"; 
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0"; 
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0"; 
    
    $resultado = $proveedoresClass->crear_proveedor($nombre, $dpi, $direccion, $telefono, $correo);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if($eliminarProveedor == 1){
    $idproveedor = (isset($_POST['idproveedor'])) ? $_POST['idproveedor'] : "0";

    $resultado = $proveedoresClass->eliminar_proveedor($idproveedor);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if($cargarProveedor == 1){
    $idproveedor = (isset($_POST['idproveedor'])) ? $_POST['idproveedor'] : "0";

    $resultado = $proveedoresClass->cargar_proveedor($idproveedor);

    $data = array();

        if($fila = mysqli_fetch_array($resultado)){
            $data['idproveedor'] = $fila['idpersona'];
            $data['nombre'] = $fila['nombre'];
            $data['dpi'] = $fila['dpi'];
            $data['direccion'] = $fila['direccion'];
            $data['telefono'] = $fila['telefono'];
            $data['correo'] = $fila['email'];
            echo json_encode($data);
        }
        else{
            $data['resultado'] = 'error';
        }
}

if($editarProveedor ==1){
    $idproveedor = (isset($_POST['idproveedor'])) ? $_POST['idproveedor'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
    

    $resultado = $proveedoresClass->editar_proveedor($idproveedor, $nombre, $dpi, $direccion, $telefono, $correo);
    $newdata['resultado'] = $resultado;
    echo json_encode($newdata);
}

?>
