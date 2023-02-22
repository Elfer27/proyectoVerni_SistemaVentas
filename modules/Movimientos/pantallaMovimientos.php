<?php
    session_start();
    if (!$_SESSION['user_id']){
        header("location: ../../index.php");
    }
    include_once('../../include/functions.php');
?>

<br>
<div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="button">REALIZAR VENTA DE PRODUCTO</button>
  <button class="btn btn-primary" type="button">REALIZAR INGRESO DE MERCADERÍA</button>
</div>