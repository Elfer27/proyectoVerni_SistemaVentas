<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: index.php");
}

include 'template/header.php';
include 'template/menu.php';
include 'template/sidebar.php';
?>
<!-- INICIAL EL CONTENIDO DINAMICO DEL SITIO -->
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container" id="contenedorPrincipal">
                    <!-- AQUI VA EL CONTENIDO DINAMICO -->
                </div>
            </main>
        </div>
    </div>
<!-- FINALIZA EL CONTENIDO DINAMICO DEL SITIO -->
<?php
include 'template/footer.php';
?>
