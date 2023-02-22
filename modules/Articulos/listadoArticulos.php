<?php
    session_start();
    if (!$_SESSION['user_id']){
        header("location: ../../index.php");
    }
    include_once('../../include/functions.php');
    $articulosClass = new articulosClass();
    $resultado = array();
    $resultadoCategoria = array();
    $resultado = $articulosClass->lista_articulos();
    $resultadoCategoria = $articulosClass->lista_categorias();
    $resultadoCategoriaEditar = $articulosClass->lista_categorias();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">LISTADO DE ARTICULOS</h1>
</div>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary me-md-2" id="btnNuevoArticulo" name="btnNuevoArticulo" data-bs-toggle="modal" data-bs-target="#staticBackdropArt">Nuevo Articulo</button>
    </div>
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">IMAGEN</th>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CODIGO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">PRECIO</th>
                <th scope="col">STOCK</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">ESTADO</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>

            <?php
                while($fila = mysqli_fetch_array($resultado)){
            ?>
                <tr>
                <th><img src="img/producto1.jpg" width="200" height="120"></th>
                <td><?php echo $fila['idarticulo']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['codigo']?></td>
                <td><?php echo $fila['nombre_categoria']?></td>
                <td><?php echo $fila['precio_venta']?></td>
                <td><?php echo $fila['stock']?></td>
                <td><?php echo $fila['descripcion']?></td>
                <td><?php echo $fila['estado']?></td>
                <td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-outline-warning me-md-2" id="btnEditarArticulo" onclick="cargarArticulo(<?php echo $fila['idarticulo'];?>);" name="btnEditarArticulo" data-bs-toggle="modal" data-bs-target="#staticBackdropArtEdit">Editar</button>
                    </div>
                </td>
                <td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-outline-danger me-md-2" id="btnEliminarArticulo" onclick="eliminarArticulo(<?php echo $fila['idarticulo'];?>);" name="btnEliminarArticulo">Eliminar</button>
                    </div>
                </td>
                </tr>

            <?php
               }
            ?>   
            </tbody>
         </table>
    </div>
</div>

<!-- MODAL PARA AGREGAR Articulo -->
<!-- Modal -->
<div class="modal fade" id="staticBackdropArt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropArtLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Articulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreArt" placeholder="Aqui va tu nombre">
                <label for="nombreArt">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="codigoArt" placeholder="Aqui va tu usuario">
                <label for="codigoArt">Codigo</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="idcategoriaArt" aria-label="Categorias de productos">
                    <?php while($filaCat = mysqli_fetch_array($resultadoCategoria)){?>
                    <option value="<?php echo $filaCat['idcategoria'];?>"><?php echo $filaCat['nombre'];?></option>
                    <?php }?>
                </select>
                <label for="idcategoriaArt">Categoría</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="precioArt" placeholder="Aqui va tu correo">
                <label for="precioArt">Precio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="stockArt" placeholder="Aqui va tu clave">
                <label for="stockArt">Stock</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="descripcionArt" placeholder="Aqui va tu telefono">
                <label for="descripcionArt">Descripción</label>
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnAgregarArticulo">Agregar Articulo</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA EDITAR Articulo -->
<!-- Modal -->
<div class="modal fade" id="staticBackdropArtEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropArtEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropEditLabel">Editar Articulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="IDArtEdit" placeholder="Aqui va tu nombre" disabled>
                <label for="IDArtEdit">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreArtEdit" placeholder="Aqui va tu nombre">
                <label for="nombreArtEdit">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="codigoArtEdit" placeholder="Aqui va tu usuario">
                <label for="codigoArtEdit">Codigo</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="idcategoriaArtEdit" aria-label="Categorias de productos">
                    <?php while($filaCatEdit = mysqli_fetch_array($resultadoCategoriaEditar)){?>
                    <option value="<?php echo $filaCatEdit['idcategoria'];?>"><?php echo $filaCatEdit['nombre'];?></option>
                    <?php }?>
                </select>
                <label for="idcategoriaArtEdit">Categoría</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="precioArtEdit" placeholder="Aqui va tu correo">
                <label for="precioArtEdit">Precio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="stockArtEdit" placeholder="Aqui va tu clave">
                <label for="stockArtEdit">Stock</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="descripcionArtEdit" placeholder="Aqui va tu telefono">
                <label for="descripcionArtEdit">Descripción</label>
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="btnConfirmEditarArticulo">Editar Articulo</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/moduloArticulos.js"></script>