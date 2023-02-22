<?php
    require_once("config.php");

    if(DEBUG == "true"){
        ini_set('display_errors', 1);
    }
    else{
        ini_set('display_errors', 0);
    }

    #CLASES DE LA CAPA DE MODELO DE BASE DE DATOS
    require_once("class/Conn/Tools.php");
    require_once("class/Login/loginClass.php");
    require_once("class/Usuarios/usuariosClass.php");
    require_once("class/Proveedores/proveedoresClass.php");
    require_once("class/Clientes/clientesClass.php");
    require_once("class/Articulos/articulosClass.php");
?>