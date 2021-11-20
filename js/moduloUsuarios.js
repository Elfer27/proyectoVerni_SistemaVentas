$('#btnAgregarUsuario').on('click', function(){
    
    var rol = $('#role_id').val();
    var nombre = $('#nombre').val();
    var usuario = $('#usuario').val();
    var correo = $('#correo').val();
    var clave = $('#clave').val();
    var telefono = $('#telefono').val();
    var dpi = $('#dpi').val();
    var direccion = $('#direccion').val();

    if (nombre == ""){
        alert('El campo nombre es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  
    if (usuario == ""){
        alert('El campo usuario es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    if (correo == ""){
        alert('El campo correo es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    if (clave == ""){
        alert('El campo clave es obligatorio');
        //Detiene la ejecución del programa
        return false;
    } 
    if (telefono == ""){
        alert('El campo telefono es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    if (direccion == ""){
        alert('El campo direccion es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  
    
    $.ajax({
        type: 'POST',
        data: "crear_usuario=1&rol= "+rol+" &nombre= "+nombre+" &usuario= "+usuario+" &correo= "+correo+" &clave= "+clave+" &telefono= "+telefono+" &dpi= "+dpi+" &direccion= "+direccion,
        url: 'modules/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('staticBackdrop').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                alert('Usuario creado exitosamente');
                cargarContenido('modules/Usuarios/listadoUsuarios.php');
            }
            else{
                alert('No se pudo crear el usuario');
            }
        }
    });
});

function eliminarUsuario(idusuario){
    $.ajax({
        type: 'POST',
        data: "eliminar_usuario=1&idusuario= "+idusuario,
        url: 'modules/Usuarios/usuariosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('staticBackdrop').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                alert('Usuario eliminado exitosamente');
                cargarContenido('modules/Usuarios/listadoUsuarios.php');
            }
            else{
                alert('No se pudo eliminar el usuario seleccionado');
            }
        }
    });    
}

function cargarUsuarios(id) {
    parametros = {
      cargar_usuario: 1,
      user_id: id,
    };
    $.ajax({
        type: "POST",
        data: parametros,
        url: "modules/usuarios/usuariosController.php",
        dataType: "json",
        success: function (datos) {
              $('#editIdUsuario').val(datos['idusuario']);
              $('#editNombre').val(datos['nombre']);
              $('#editDireccion').val(datos['direccion']);
              $('#editUsuario').val(datos['usuario']);
              $('#editClave').val(datos['clave']);
              $('#editDpi').val(datos['dpi']);
              $('#editCorreo').val(datos['email']);
              $('#editTelefono').val(datos['telefono']);
              $('#editrol_id').val(datos['role_id']);
              $('#editEstado').val(datos['estado']);
        },
    });
}

$("#btnConfirmEditarUsuario").on("click", function () {

    let idusuario = $("#editIdUsuario").val();
    let nombre = $("#editNombre").val();
    let direccion = $("#editDireccion").val();
    let usuario = $("#editUsuario").val();
    let clave = $("#editClave").val();
    let dpi = $("#editDpi").val();
    let correo = $("#editCorreo").val();
    let telefono = $("#editTelefono").val();
    //let estado = $("#editEstado").val();
    let idrol = $("#editRol_id").val();
  
    if (
      idusuario == "" ||
      nombre == "" ||
      direccion == "" ||
      usuario == "" ||
      clave == "" ||
      dpi == "" ||
      correo == "" ||
      telefono == "" ||
      //estado == null ||
      idrol == null
    ) 
    {
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "editar_usuario=1&idusuario=" + 
        idusuario +
        "&nombre=" +
        nombre +
        "&direccion=" +
        direccion +
        "&usuario=" +
        usuario +
        "&clave=" +
        clave +
        "&dpi=" +
        dpi +
        "&correo=" +
        correo +
        "&telefono=" +
        telefono +
        "&role_id=" +
        idrol,
      url: "modules/usuarios/usuariosController.php",
      dataType: "json",
      success: function (newdata) {
        var nuevoresultado = newdata.resultado;
        if (nuevoresultado === 1) {
          $("#modalEditar").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          alert("Usuario editado exitosamente");
          CargarContenido("modules/Usuarios/listadoUsuarios.php");
        } else {
          alert("No se pudo crear el usuario");
        }
      },
    });
  });