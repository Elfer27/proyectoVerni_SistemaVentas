<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class loginClass{
        /**
         * Función para validar las credenciales de un usuario
         */

         function valida_login($usuario, $clave){

             $conexionClass = new Tools();
             $conexion = $conexionClass->conectar();

             $sql = "SELECT * from usuario where usuario = '$usuario' and clave = '$clave'";
             $resultado = mysqli_query($conexion, $sql);
             $conexionClass->desconectar($conexion);
             return $resultado;
         }

         /**
         * Función para cerrar sesión
         */

         function cerrar_sesion(){
             session_start();
             session_destroy();
             header("location: ../../index.php");
             exit;
         }
    }
?>