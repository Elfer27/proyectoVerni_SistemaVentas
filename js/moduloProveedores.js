$("#btnAgregarProveedor").on("click", function(){
    
    var nombre = $('#nombrePro').val();
    var dpi = $('#dpiPro').val();
    var direccion = $('#direccionPro').val();
    var telefono = $('#telefonoPro').val();
    var correo = $('#correoPro').val();
    
    if (nombre == ""){
        alert('El campo nombre es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  
    
    if (dpi == ""){
        alert('El campo DPI es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  

    if (direccion == ""){
        alert('El campo direccion es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  

    if (telefono == ""){
        alert('El campo telefono es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }

    if (correo == ""){
        alert('El campo correo es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    
    $.ajax({
        type: 'POST',
        data: "crear_proveedor=1&nombre="+nombre+"&dpi="+dpi+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo,
        url: 'modules/Proveedores/proveedoresController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#staticBackdropPro').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                swal("¡PROVEEDOR CREADO EXITOSAMENTE!", "Presione para continuar", "success");
                cargarContenido('modules/Proveedores/listadoProveedores.php');
            }
            else{
                alert('No se pudo crear el proveedor');
            }
        }
    });
});

function eliminarProveedor(idproveedor){
    $.ajax({
        type: 'POST',
        data: "eliminar_proveedor=1&idproveedor= "+idproveedor,
        url: 'modules/Proveedores/proveedoresController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#staticBackdropPro').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                swal("¡PERSONA ELIMINADA EXITOSAMENTE!", "Presione para continuar", "error");
                cargarContenido('modules/Proveedores/listadoProveedores.php');
            }
            else{
                alert('No se pudo eliminar a la persona');
            }
        }
    });    
}

function cargarProveedor(idproveedor) {
    $.ajax({
        type: "POST",
        data: "cargar_proveedor=1&idproveedor= "+idproveedor,
        url: 'modules/Proveedores/proveedoresController.php',
        dataType: "json",
        success: function (datos) {
              $('#editIdPro').val(datos['idproveedor']);
              $('#editNombrePro').val(datos['nombre']);
              $('#editDpiPro').val(datos['dpi']);
              $('#editDireccionPro').val(datos['direccion']);
              $('#editTelefonoPro').val(datos['telefono']);
              $('#editCorreoPro').val(datos['correo']);   
        },
    });
}

$("#btnConfirmEditarProveedor").on("click", function () {

    let idproveedor = $("#editIdPro").val();
    let nombre = $("#editNombrePro").val();
    let dpi = $("#editDpiPro").val();
    let direccion = $("#editDireccionPro").val();
    let telefono = $("#editTelefonoPro").val();
    let correo = $("#editCorreoPro").val();
   
    
  
    if (
      idproveedor == "" ||
      nombre == "" ||
      dpi == "" ||
      direccion == "" ||
      telefono == "" ||
      correo == ""  
    ) 
    {
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:"editar_proveedor=1&idproveedor="+idproveedor+"&nombre="+nombre+"&dpi="+dpi+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo, 
      url: 'modules/Proveedores/proveedoresController.php',
      dataType: "json",
      success: function (newdata) {
        var nuevoresultado = newdata.resultado;
        if (nuevoresultado === 1) {
          $("#modalEditarPro").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          swal("¡PERSONA EDITADA EXITOSAMENTE!", "Presione para continuar", "warning");
          cargarContenido('modules/Proveedores/listadoProveedores.php');
        } else {
          alert("No se pudo editar a la persona");
        }
      },
    });
  });

