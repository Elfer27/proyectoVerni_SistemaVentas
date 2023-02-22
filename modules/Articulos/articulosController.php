<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}
include_once('../../include/functions.php');
$articulosClass = new articulosClass();
$resultado = 0;
$respuesta = array();

$crearArticulo = (isset($_POST['crear_articulo'])) ? $_POST['crear_articulo'] : "0";
$cargarArticulo = (isset($_POST['cargar_articulo'])) ? $_POST['cargar_articulo'] : "0";
$editarArticulo = (isset($_POST['editar_articulo'])) ? $_POST['editar_articulo'] : "0";
$eliminarArticulo = (isset($_POST['eliminar_articulo'])) ? $_POST['eliminar_articulo'] : "0";

if($crearArticulo == 1){
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0"; 
    $codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : "0"; 
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "0"; 
    $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "0"; 
    $stock = (isset($_POST['stock'])) ? $_POST['stock'] : "0"; 
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "0"; 

    $resultado = $articulosClass->crear_articulo($nombre, $codigo, $categoria, $precio, $stock, $descripcion);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}

if($cargarArticulo == 1){
    $idarticulo = (isset($_POST['idarticulo'])) ? $_POST['idarticulo'] : "0";

    $resultado = $articulosClass->cargar_articulo($idarticulo);

    $data = array();

        if($fila = mysqli_fetch_array($resultado)){
            $data['idarticulo'] = $fila['idarticulo'];
            $data['nombre'] = $fila['nombre'];
            $data['codigo'] = $fila['codigo'];
            $data['idcategoria'] = $fila['idcategoria'];
            $data['precio_venta'] = $fila['precio_venta'];
            $data['stock'] = $fila['stock'];
            $data['descripcion'] = $fila['descripcion'];
            echo json_encode($data);
        }
        else{
            $data['resultado'] = 'error';
        }
}

if($editarArticulo ==1){
    $idarticulo = (isset($_POST['idarticulo'])) ? $_POST['idarticulo'] : "0";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
    $codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : "0";
    $idcategoria = (isset($_POST['idcategoria'])) ? $_POST['idcategoria'] : "0";
    $precio_venta = (isset($_POST['precio_venta'])) ? $_POST['precio_venta'] : "0";
    $stock = (isset($_POST['stock'])) ? $_POST['stock'] : "0";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "0";

    $resultado = $articulosClass->editar_articulo($idarticulo, $nombre, $codigo, $idcategoria, $precio_venta, $stock, $descripcion);
    $newdata['resultado'] = $resultado;
    echo json_encode($newdata);
}

if($eliminarArticulo == 1){
    $idarticulo = (isset($_POST['idarticulo'])) ? $_POST['idarticulo'] : "0";

    $resultado = $articulosClass->eliminar_articulo($idarticulo);

    $respuesta['resultado'] = $resultado;
    echo json_encode($respuesta);
}
?>