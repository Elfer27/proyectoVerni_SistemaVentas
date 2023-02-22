$("#btnAgregarArticulo").on("click", function(){

    var nombre = $('#nombreArt').val();
    var codigo = $('#codigoArt').val();
    var categoria = $('#idcategoriaArt').val();
    var precio = $('#precioArt').val();
    var stock = $('#stockArt').val();
    var descripcion = $('#descripcionArt').val();
    

    if (nombre == ""){
        alert('El campo nombre es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }  
    if (codigo == ""){
        alert('El campo codigo es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    if (precio == ""){
        alert('El campo precio es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    if (stock == ""){
        alert('El campo stock es obligatorio');
        //Detiene la ejecución del programa
        return false;
    } 
    if (descripcion == ""){
        alert('El campo descripcion es obligatorio');
        //Detiene la ejecución del programa
        return false;
    }
    
    $.ajax({
        type: 'POST',
        data: "crear_articulo=1&nombre="+nombre+"&codigo="+codigo+"&categoria="+categoria+"&precio="+precio+"&stock="+stock+"&descripcion="+descripcion,
        url: 'modules/Articulos/articulosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#staticBackdropArt').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                swal("¡ARTICULO CREADO EXITOSAMENTE!", "Presione para continuar", "success");
                cargarContenido('modules/Articulos/listadoArticulos.php');
            }
            else{
                alert('No se pudo crear el articulo');
            }
        }
    });
});

function cargarArticulo(idarticulo) {
    $.ajax({
        type: "POST",
        data: "cargar_articulo=1&idarticulo="+idarticulo,
        url: "modules/Articulos/articulosController.php",
        dataType: "json",
        success: function (datos) {
              $('#IDArtEdit').val(datos['idarticulo']);
              $('#nombreArtEdit').val(datos['nombre']);
              $('#codigoArtEdit').val(datos['codigo']);
              $('#idcategoriaArtEdit').val(datos['idcategoria']);
              $('#precioArtEdit').val(datos['precio_venta']);
              $('#stockArtEdit').val(datos['stock']);
              $('#descripcionArtEdit').val(datos['descripcion']);
        },
    });
}

$("#btnConfirmEditarArticulo").on("click", function () {

    let idarticulo = $("#IDArtEdit").val();
    let nombre = $("#nombreArtEdit").val();
    let codigo = $("#codigoArtEdit").val();
    let idcategoria = $("#idcategoriaArtEdit").val();
    let precio_venta = $("#precioArtEdit").val();
    let stock = $("#stockArtEdit").val();
    let descripcion = $("#descripcionArtEdit").val();
  
    if (
      idarticulo == "" ||
      nombre == "" ||
      codigo == "" ||
      idcategoria == "" ||
      precio_venta == "" ||
      stock == "" ||
      descripcion == ""
    ) 
    {
      alert("Todos los campos son obligatorios");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "editar_articulo=1&idarticulo=" + 
        idarticulo +
        "&nombre=" +
        nombre +
        "&codigo=" +
        codigo +
        "&idcategoria=" +
        idcategoria +
        "&precio_venta=" +
        precio_venta +
        "&stock=" +
        stock +
        "&descripcion=" +
        descripcion,
      url: "modules/Articulos/articulosController.php",
      dataType: "json",
      success: function (newdata) {
        var nuevoresultado = newdata.resultado;
        if (nuevoresultado === 1) {
          $("#staticBackdropArtEdit").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          swal("¡ARTICULO EDITADO EXITOSAMENTE!", "Presione para continuar", "warning");
          cargarContenido('modules/Articulos/listadoArticulos.php');
        } else {
          alert("No se pudo editar el articulo");
        }
      },
    });
  });

function eliminarArticulo(idarticulo){
  $.ajax({
        type: 'POST',
        data: "eliminar_articulo=1&idarticulo= "+idarticulo,
        url: 'modules/Articulos/articulosController.php',
        dataType: 'json',
        success: function(data){
            var resultado = data.resultado;
            if(resultado === 1){
                $('#staticBackdropArt').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                swal("¡ARTICULO ELIMINADO EXITOSAMENTE!", "Presione para continuar", "error");
                cargarContenido('modules/Articulos/listadoArticulos.php');
            }
            else{
                alert('No se pudo eliminar el articulo');
            }
        }
  });    
}
