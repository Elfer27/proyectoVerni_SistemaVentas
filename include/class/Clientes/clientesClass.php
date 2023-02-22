<?php
include_once(RAIZ_APLICACION."/functions.php");
    class clientesClass{
        //Funcion para obtener el listado de clientes   
        function lista_clientes(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM persona WHERE tipo_persona = 'Cliente';";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para crear un nuevo proveedor  
        function crear_cliente($nombre, $dpi, $direccion, $telefono, $correo){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "INSERT INTO persona (tipo_persona, nombre, dpi, direccion, telefono,  email) VALUES ('Cliente', '$nombre', '$dpi', '$direccion', '$telefono', '$correo');";
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