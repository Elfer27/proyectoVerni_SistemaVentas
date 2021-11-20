<?php
include_once(RAIZ_APLICACION."/functions.php");

    class usuariosClass{
        //Funcion para obtener el listado de usuarios    
        function lista_usuarios(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT a.idusuario, a.nombre, a.dpi, a.direccion, a.telefono, a.email, a.estado, a.usuario, a.clave, b.nombre as rol FROM usuario a, rol b where a.idrol = b.idrol;";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para obtener el listado de roles   
        function lista_roles(){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM rol;";
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass->desconectar($conexion);
            return $resultado;
        }

        //Funcion para crear un nuevo usuario   
        function crear_usuario($rol, $nombre, $usuario, $correo, $clave, $dpi, $telefono, $direccion){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "INSERT INTO usuario (idrol, nombre, usuario, email, clave, dpi, telefono, direccion, estado) VALUES ($rol, '$nombre', '$usuario', '$correo', '$clave', '$dpi', '$telefono', '$direccion', 'A');";
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

        //Funcion para eliminar un usuario por su id   
        function eliminar_usuario($idusuario){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "DELETE FROM usuario WHERE idusuario= $idusuario;";
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
        function cargar_usuario($idusuario){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "SELECT * FROM usuario WHERE idusuario = '$idusuario';";
            $resultado = mysqli_query($conexion, $sql);

            return $resultado;
        }

        //Funcion para editar un usuario   
        function editar_usuario($rol_id, $nombre, $correo, $clave, $dpi, $direccion, $telefono, $user_id){  
            //Instancias de conexión
            $conexionClass = new Tools();
            $conexion = $conexionClass->conectar();

            $sql = "UPDATE usuario SET 
                idrol = $rol_id,
                nombre = '$nombre',
                email = '$correo', 
                clave = '$clave',
                dpi = '$dpi',  
                direccion = '$direccion', 
                telefono = '$telefono' 
                where idusuario = $user_id;";

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