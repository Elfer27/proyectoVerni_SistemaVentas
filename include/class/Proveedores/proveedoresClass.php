<?php
include_once(RAIZ_APLICACION."/functions.php");
    class proveedoresClass{
        //Funcion para obtener el listado de proveedores    
        function lista_proveedores(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM persona WHERE tipo_persona = 'Proveedor';";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para crear un nuevo proveedor  
        function crear_proveedor($nombre, $dpi, $direccion, $telefono, $correo){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "INSERT INTO persona (tipo_persona, nombre, dpi, direccion, telefono,  email) VALUES ('Proveedor', '$nombre', '$dpi', '$direccion', '$telefono', '$correo');";
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

        //Funcion para eliminar un proveedor por su id   
        function eliminar_proveedor($idproveedor){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "DELETE FROM persona WHERE idpersona= $idproveedor;";
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

        //Funcion para cargar un proveedor   
        function cargar_proveedor($idproveedor){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM persona WHERE idpersona = '$idproveedor';";
            $resultado = mysqli_query($conexion, $sql);

            return $resultado;
        }

        //Funcion para editar un proveedor 
        function editar_proveedor($idproveedor, $nombre, $dpi, $direccion, $telefono, $correo){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "UPDATE persona SET 
                nombre = '$nombre',
                dpi = '$dpi', 
                direccion = '$direccion', 
                telefono = '$telefono',
                email = '$correo'      
                WHERE idpersona = $idproveedor;";

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

    }
?>