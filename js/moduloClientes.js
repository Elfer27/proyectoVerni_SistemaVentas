$("#btnAgregarCliente").on("click", function(){
    
    var nombre = $('#nombreCli').val();
    var dpi = $('#dpiCli').val();
    var direccion = $('#direccionCli').val();
    var telefono = $('#telefonoCli').val();
    var correo = $('#correoCli').val();
    
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
        data: "crear_cliente=1&nombre="+nombre+"&dpi="+dpi+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo,
        url: 'modules/Clientes/clientesController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#staticBackdropCli').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                swal("¡CLIENTE CREADO EXITOSAMENTE!", "Presione para continuar", "success");
                cargarContenido('modules/Proveedores/listadoProveedores.php');
            }
            else{
                alert('No se pudo crear el proveedor');
            }
        }
    });
});