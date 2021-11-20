<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}
include_once('../../include/functions.php');
$usuariosClass = new usuariosClass();
$resultado = 0;
$respuesta = array();

$crearUsuario = (isset($_POST['crear_usuario'])) ? $_POST['crear_usuario'] : "0";
$eliminarUsuario = (isset($_POST['eliminar_usuario'])) ? $_POST['eliminar_usuario'] : "0";
$cargarUsuario = (isset($_POST['cargar_usuario'])) ? $_POST['cargar_usuario'] : "0";
$editarUsuario = (isset($_POST['editar_usuario'])) ? $_POST['editar_usuario'] : "0";

if($crearUsuario == 1){
    $rol = (isset($_POST['rol'])) ? $_POST['rol'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0"; 
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0"; 
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0"; 
    $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0"; 
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0"; 
    $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0"; 
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0"; 

    $resultado = $usuariosClass->crear_usuario($rol, $nombre, $usuario, $correo, $clave, $dpi, $telefono, $direccion);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if($eliminarUsuario == 1){
    $idusuario = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";

    $resultado = $usuariosClass->eliminar_usuario($idusuario);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if($cargarUsuario == 1){
    $idusuario = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";

    $resultado = $usuariosClass->cargar_usuario($idusuario);

    $data = array();

        if($fila = mysqli_fetch_array($resultado)){
            $data['idusuario'] = $fila['idusuario'];
            $data['nombre'] = $fila['nombre'];
            $data['direccion'] = $fila['direccion'];
            $data['usuario'] = $fila['usuario'];
            $data['clave'] = $fila['clave'];
            $data['dpi'] = $fila['dpi'];
            $data['email'] = $fila['email'];
            $data['telefono'] = $fila['telefono'];
            $data['idrol'] = $fila['idrol'];
            $data['estado']= $fila['estado'];
            echo json_encode($data);
        }
        else{
            $data['resultado'] = 'error';
        }
}

if($editarUsuario ==1){
    $user_id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
    $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
    $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
    $rol_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
    //$estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";

    $resultado = $usuariosClass->editar_usuario($rol_id, $nombre, $correo, $clave, $dpi, $direccion, $telefono, $user_id);
    $newdata['resultado'] = $resultado;
    echo json_encode($newdata);
}
?>
