  $('.listar').on("click", "#my-select", function() { 
      
      var idUsuario = $('#my-select').val(); 

      if(idUsuario != "sinValor") {

        $('#labelCorreo').removeClass('text-danger');
        $('#labelCorreo').addClass('text-success');

        $('#labelCorreo').html("La contraseña será enviada al siguiente correo electrónico:");

      }else {

        $('#labelCorreo').removeClass('text-success');
        $('#labelCorreo').addClass('text-danger');
     
            $('#labelCorreo').html("¡Seleccione el usuario a crear!");

      }


        var datos = new FormData();
          datos.append("idUsuario", idUsuario);

      $.ajax({

        url:"ajax/empleados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

               
          $('#correo').val(respuesta["Mail"]);

        }

      });
  }); 




  $(document).on("click", ".btnActivarVacante", function(){


    var idVacante = $(this).attr("idVacante");
    var estadoVacante = $(this).attr("estadoVacante");


    var datos = new FormData();
    datos.append("activarId", idVacante);
    datos.append("activarVacante", estadoVacante);

    $.ajax({
         
         url: "ajax/vacante.ajax.php",

         method: "POST",

         data: datos,

         cache: false,

         contentType: false,

         processData: false,

         success: function(respuesta){


         }

    });

    if (estadoVacante == 'I') {

      $(this).removeClass('btn-sucess');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado <i class="icon-x"></i>');
      $(this).attr('estadoVacante','A');
    
    }else{

      $(this).removeClass('btn-danger');
      $(this).addClass('btn-sucess');
      $(this).html('Activado <i class="icon-check"></i>');
      $(this).attr('estadoVacante','I');

    }

  });
