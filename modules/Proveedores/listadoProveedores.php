<?php
    session_start();
    if (!$_SESSION['user_id']){
        header("location: ../../index.php");
    }
    include_once('../../include/functions.php');
    $proveedoresClass = new proveedoresClass();
    $resultado = array();
    $resultado = $proveedoresClass->lista_proveedores();
    $clientesClass = new clientesClass();
    $resultadoCli = array();
    $resultadoCli = $clientesClass->lista_clientes();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">LISTADO DE PROVEEDORES</h1>
</div>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info me-md-2" id="btnNuevoProveedor" name="btnNuevoProveedor" data-bs-toggle="modal" data-bs-target="#staticBackdropPro">Nuevo Proveedor</button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DPI</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">CORREO</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = mysqli_fetch_array($resultado)){
                ?>
                    <tr>
                        <th><?php echo $fila['idpersona']?></th>
                        <td><?php echo $fila['nombre']?></td>
                        <td><?php echo $fila['dpi']?></td>
                        <td><?php echo $fila['direccion']?></td>
                        <td><?php echo $fila['telefono']?></td>
                        <td><?php echo $fila['email']?></td>
                        <td><div>
                            <button type="button" class="btn btn-light me-md-2" id="btnEditarProveedor" onclick="cargarProveedor(<?php echo $fila['idpersona'];?>);" name="btnEditarProveedor" data-bs-toggle="modal" data-bs-target="#modalEditarPro">Editar</button>
                            </div>
                        </td>
                        <td><div>
                            <button type="button" class="btn btn-dark me-md-2" id="btnEliminarProveedor" onclick="eliminarProveedor(<?php echo $fila['idpersona'];?>);" name="btnEliminarProveedor">Eliminar</button>
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

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">LISTADO DE CLIENTES</h1>
</div>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info me-md-2" id="btnNuevoCliente" name="btnNuevoCliente" data-bs-toggle="modal" data-bs-target="#staticBackdropCli">Nuevo Cliente</button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DPI</th>
                <th scope="col">DIRECCIÓN</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">CORREO</th>
                <th scope="col">EDITAR</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = mysqli_fetch_array($resultadoCli)){
                ?>
                    <tr>
                        <th><?php echo $fila['idpersona']?></th>
                        <td><?php echo $fila['nombre']?></td>
                        <td><?php echo $fila['dpi']?></td>
                        <td><?php echo $fila['direccion']?></td>
                        <td><?php echo $fila['telefono']?></td>
                        <td><?php echo $fila['email']?></td>
                        <td><div>
                            <button type="button" class="btn btn-light me-md-2" id="btnEditarCliente" onclick="cargarProveedor(<?php echo $fila['idpersona'];?>);" name="btnEditarCliente" data-bs-toggle="modal" data-bs-target="#modalEditarPro">Editar</button>
                            </div>
                        </td>
                        <td><div>
                            <button type="button" class="btn btn-dark me-md-2" id="btnEliminarCliente" onclick="eliminarProveedor(<?php echo $fila['idpersona'];?>);" name="btnEliminarCliente">Eliminar</button>
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


<!-- MODAL PARA AGREGAR PROVEEDORES -->
<!-- Modal -->
<div class="modal fade" id="staticBackdropPro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropProLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropProLabel">Nuevo Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombrePro" placeholder="Aqui va tu nombre Proveedor">
                <label for="nombrePro">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="dpiPro" placeholder="0000-00000-0000">
                <label for="dpiPro">DPI</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccionPro" placeholder="Aqui va tu direccion Proveedor">
                <label for="direccionPro">Dirección</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="telefonoPro" placeholder="Aqui va tu telefono Proveedor">
                <label for="telefonoPro">Telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="correoPro" placeholder="Aqui va tu correo Proveedor">
                <label for="correoPro">Correo</label>
            </div>
                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btnAgregarProveedor">Agregar Proveedor</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA EDITAR Y CARGAR USUARIOS -->
<!-- Modal -->
<div class="modal fade" id="modalEditarPro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelPro" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelPro">Editar Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editIdPro" placeholder="Aqui va tu ID" disabled>
                        <label for="editIdPro">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editNombrePro" placeholder="Aqui va tu nombre">
                        <label for="editNombrePro">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editDpiPro" placeholder="0000-00000-0000">
                        <label for="editDpiPro">DPI</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editDireccionPro" placeholder="Aqui va tu direccion">
                        <label for="editDireccionPro">Dirección</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editTelefonoPro" placeholder="Aqui va tu telefono">
                        <label for="editTelefonoPro">Telefono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editCorreoPro" placeholder="Aqui va tu correo">
                        <label for="editCorreoPro">Correo</label>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" id="btnConfirmEditarProveedor">Editar Persona</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA AGREGAR CLIENTES -->
<!-- Modal -->
<div class="modal fade" id="staticBackdropCli" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropCliLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropCliLabel">Nuevo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreCli" placeholder="Aqui va tu nombre Cliente">
                <label for="nombreCli">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="dpiCli" placeholder="0000-00000-0000">
                <label for="dpiCli">DPI</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccionCli" placeholder="Aqui va tu direccion Cliente">
                <label for="direccionCli">Dirección</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="telefonoCli" placeholder="Aqui va tu telefono Cliente">
                <label for="telefonoCli">Telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="correoCli" placeholder="Aqui va tu correo Cliente">
                <label for="correoCli">Correo</label>
            </div>
                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btnAgregarCliente">Agregar Cliente</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<script src="js/moduloProveedores.js"></script>
<script src="js/moduloClientes.js"></script>
