<?php
    session_start();
    if (!$_SESSION['user_id']){
        header("location: ../../index.php");
    }
    include_once('../../include/functions.php');
    $usuariosClass = new usuariosClass();
    $resultado = array();
    $resultadoRol = array();
    $resultado = $usuariosClass->lista_usuarios();
    $resultadoRol = $usuariosClass->lista_roles();
    $resultadoRol_Editar = $usuariosClass->lista_roles();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">LISTADO DE USUARIOS</h1>
</div>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success me-md-2" id="btnNuevoUsuario" name="btnNuevoUsuario" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Nuevo Usuario</button>
    </div>
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">ROL</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">USUARIO</th>
                <th scope="col">CORREO</th>
                <th scope="col">CLAVE</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">DPI</th>
                <th scope="col">DIRECCIÓN</th>
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
                <th><?php echo $fila['idusuario']?></th>
                <td><?php echo $fila['rol']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['usuario']?></td>
                <td><?php echo $fila['email']?></td>
                <td><?php echo $fila['clave']?></td>
                <td><?php echo $fila['telefono']?></td>
                <td><?php echo $fila['dpi']?></td>
                <td><?php echo $fila['direccion']?></td>
                <td><?php echo $fila['estado']?></td>
                <td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-warning me-md-2" id="btnEditarUsuario" onclick="cargarUsuarios(<?php echo $fila['idusuario'];?>);" name="btnEditarUsuario" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</button>
                    </div>
                </td>
                <td><div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-danger me-md-2" id="btnEliminarUsuario" onclick="eliminarUsuario(<?php echo $fila['idusuario'];?>);" name="btnEliminarUsuario">Eliminar</button>
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

<!-- MODAL PARA AGREGAR USUARIOS -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
            <div class="form-floating mb-3">
                <select class="form-select" id="role_id" aria-label="Roles de usuarios">
                    <?php while($filaRol = mysqli_fetch_array($resultadoRol)){?>
                    <option value="<?php echo $filaRol['idrol'];?>"><?php echo $filaRol['nombre'];?></option>
                    <?php }?>
                </select>
                <label for="role_id">Rol</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombre" placeholder="Aqui va tu nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usuario" placeholder="Aqui va tu usuario">
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="correo" placeholder="Aqui va tu correo">
                <label for="correo">Correo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="clave" placeholder="Aqui va tu clave">
                <label for="clave">Clave</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="telefono" placeholder="Aqui va tu telefono">
                <label for="telefono">Telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="dpi" placeholder="0000-00000-0000">
                <label for="dpi">DPI</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccion" placeholder="Aqui va tu direccion">
                <label for="direccion">Dirección</label>
            </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnAgregarUsuario">Agregar Usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA EDITAR Y CARGAR USUARIOS -->
<!-- Modal -->
<div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        
            <div class="form-floating mb-3">
                <select class="form-select" id="editRol_id" aria-label="Roles de usuarios">
                    <?php while($filaRol2 = mysqli_fetch_array($resultadoRol_Editar)){?>
                    <option value="<?php echo $filaRol2['idrol'];?>"><?php echo $filaRol2['nombre'];?></option>
                    <?php }?>
                </select>
                <label for="role_id">Rol</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editIdUsuario" placeholder="Aqui va tu ID" disabled>
                <label for="editIdUsuario">ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editNombre" placeholder="Aqui va tu nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editUsuario" placeholder="Aqui va tu usuario" disabled>
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editCorreo" placeholder="Aqui va tu correo">
                <label for="correo">Correo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="editClave" placeholder="Aqui va tu clave">
                <label for="clave">Clave</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editTelefono" placeholder="Aqui va tu telefono">
                <label for="telefono">Telefono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editDpi" placeholder="0000-00000-0000">
                <label for="dpi">DPI</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editDireccion" placeholder="Aqui va tu direccion">
                <label for="direccion">Dirección</label>
            </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="btnConfirmEditarUsuario">Editar Usuario</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/moduloUsuarios.js"></script>