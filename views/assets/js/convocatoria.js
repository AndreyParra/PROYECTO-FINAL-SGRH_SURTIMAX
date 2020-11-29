





$(".box-body").on("click", ".btnEditarConvocatoria", function(){

  var idConvocatoria = $(this).attr("idConvocatoria");

  
  var datos = new FormData();
  datos.append("idConvocatoria", idConvocatoria);

  $.ajax({

    url:"ajax/convocatoria.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      console.log(respuesta);

    }


  });

})
