<?php
    ob_start();
    session_start();
    include_once("../../include/functions.php");
    $loginClass = new loginClass();

    $loginClass->cerrar_sesion();

    ob_end_flush();
?>