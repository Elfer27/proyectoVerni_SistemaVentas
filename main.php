<?php
session_start();
if (!$_SESSION['user_id']){
    header("location: index.php");
}
include 'template/header.php';
include 'template/menu.php';
?>

        <!-- INICIAL EL CONTENIDO DINAMICO DEL SITIO -->
        <div class="container-fluid">
            <div class="row">
                <main>
                    <div class="container" id="contenedorPrincipal">

                        <!-- AQUI VA EL CONTENIDO DINAMICO -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="img/vista1.jpg" width="1080" height="720" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>NUESTRO LUGAR</h5>
                                            <p>Las mejores instalaciones para entregarte el mejor producto.</p>
                                        </div>
                                        </div>
                                        <div class="carousel-item">
                                        <img src="img/vista2.jpg" width="1080" height="720" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>NUESTRO PRODUCTO</h5>
                                            <p>Garantizamos papel de alta calidad.</p>
                                        </div>
                                        </div>
                                        <div class="carousel-item">
                                        <img src="img/vista3.jpg" width="1080" height="720" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>NUESTRA GENTE</h5>
                                            <p>Personas responsables entregando la mayor calidad en servicio.</p>
                                        </div>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                        </div>

                    </div>
                </main>
            </div>
        </div>

<!-- FINALIZA EL CONTENIDO DINAMICO DEL SITIO -->
<?php
include 'template/footer.php';
?>
