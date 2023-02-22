<?php
include_once(RAIZ_APLICACION."/functions.php");

    class articulosClass{
        //Funcion para obtener el listado de articulos  
        function lista_articulos(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT O.idarticulo, C.nombre as nombre_categoria, O.codigo, O.nombre, O.precio_venta, O.stock, O.descripcion, O.estado FROM articulo O, categoria C WHERE O.idcategoria = C.idcategoria;";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para obtener el listado de categorias  
        function lista_categorias(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT idcategoria, nombre FROM categoria;";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para crear un nuevo articulo  
        function crear_articulo($nombre, $codigo, $categoria, $precio, $stock, $descripcion){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "INSERT INTO articulo (idcategoria, codigo, nombre, precio_venta, stock, descripcion, imagen, estado) VALUES ($categoria, '$codigo', '$nombre', $precio, $stock, '$descripcion', '-', 'A');";
            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                $conexionClass->desconectar($conexion);
                return 1;
            }
            else{
                $conexionClass->desconectar($conexion);
                return 0;
            }
        }

        //Funcion para cargar un usuario   
        function cargar_articulo($idarticulo){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM articulo WHERE idarticulo = $idarticulo;";
            $resultado = mysqli_query($conexion, $sql);

            return $resultado;
        }

        //Funcion para editar un articulo  
        function editar_articulo($idarticulo, $nombre, $codigo, $idcategoria, $precio_venta, $stock, $descripcion){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "UPDATE articulo SET 
                nombre = '$nombre',
                codigo = '$codigo',
                idcategoria = $idcategoria, 
                precio_venta = $precio_venta,
                stock = $stock,  
                descripcion = '$descripcion'
                where idarticulo = $idarticulo;";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                $conexionClass -> desconectar($conexion);
                return 1;
            }
            else{
                $conexionClass -> desconectar($conexion);
                return 0;
            }
        }

        //Funcion para eliminar un articulo por su id   
        function eliminar_articulo($idarticulo){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "DELETE FROM articulo WHERE idarticulo= $idarticulo;";
            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                $conexionClass->desconectar($conexion);
                return 1;
            }
            else{
                $conexionClass->desconectar($conexion);
                return 0;
            }
        }

    }  
?>