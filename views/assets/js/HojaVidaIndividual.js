
$(".hojavida").click(function(){
	var codigo = $(this).attr("codigo");
  var datos = new FormData();
	datos.append("codigo", codigo);
	
  $.ajax({

  	url:"ajax/aspirante.ajax.php",
  	method: "POST",
  	data: datos,
  	cache: false,
  	contentType: false,
  	processData: false,
  	dataType: "json",
  	success: function(respuesta){
	  
    }		
  });
})


	/*

           
           $('#editarFullname').val(respuesta["Name"]);
           $('#editarLastname').val(respuesta["LastName"]);
           $('#editarTipo').html(respuesta["TypeDocument"]);
           $('#editarTipo').val(respuesta["TypeDocument"]);

           if (respuesta["TypeDocument"] == "TI") {

           	$('#editarTipo1').html("CC");
           	$('#editarTipo1').val("CC");

           }else {

           	$('#editarTipo1').html("TI");
           	$('#editarTipo1').val("TI");
           }

           $('#editarDocument').val(respuesta["NumDocument"]);
           $('#editarDireccion').val(respuesta["Address"]);
           $('#editarFecha').val(respuesta["Birthdate"]);
           $('#editarTel').val(respuesta["Phone"]);
           $('#editarCel').val(respuesta["Cellphone"]);
           $('#editarEmail').val(respuesta["Mail"]);
           
           if(respuesta["Gender"] == "M") {
               
               $('#editarTipoGen').html("Masculino");

               $('#editarTipoGen1').html("Femenino");
               $('#editarTipoGen1').val("F");

           }else {
             
              $('#editarTipoGen').html("Femenino");

              $('#editarTipoGen1').html("Masculino");
              $('#editarTipoGen1').val("M");

           }
           
           $('#editarTipoEst').html(respuesta["Maritalstatus"]);
           $('#editarTipoGen').val(respuesta["Gender"]);

           if (respuesta["Maritalstatus"] == "C") {
               
               $('#editarTipoEst').html("Casado");

               $('#editarTipoEst1').html("Soltero");
               $('#editarTipoEst1').val("S");

           }else {

           	$('#editarTipoEst').html("Soltero");


           	$('#editarTipoEst1').html("Casado");
           	$('#editarTipoEst1').val("C");

           }

           $('#editarTipoEst').val(respuesta["Maritalstatus"]);
           $('#editarEPS').val(respuesta["Eps"]);
           $('#editarARL').val(respuesta["Arl"]);
           $('#editarTipoOcu').val(respuesta["ID_Occupation"]);

           if(respuesta["ID_Occupation"] == 1) {

           	
           	$('#editarTipoOcu').html("Administrador");

           	$('#editarTipoOcu1').val(2);
           	$('#editarTipoOcu1').html("Auxiliar");

           	$('#editarTipoOcu2').val(3);
           	$('#editarTipoOcu2').html("Cajero");

           	$('#editarTipoOcu3').val(4);
           	$('#editarTipoOcu3').html("Bodeguista");

           	$('#editarTipoOcu4').val(5);
           	$('#editarTipoOcu4').html("Domiciliario");


           }else if(respuesta["ID_Occupation"] == 2) {

           
           	$('#editarTipoOcu').html("Auxiliar");

           	$('#editarTipoOcu1').val(1);
           	$('#editarTipoOcu1').html("Administrador");

           	$('#editarTipoOcu2').val(3);
           	$('#editarTipoOcu2').html("Cajero");

           	$('#editarTipoOcu3').val(4);
           	$('#editarTipoOcu3').html("Bodeguista");

           	$('#editarTipoOcu4').val(5);
           	$('#editarTipoOcu4').html("Domiciliario");


           }else if(respuesta["ID_Occupation"] ==  3) {

           
           	$('#editarTipoOcu').html("Cajero");

           	$('#editarTipoOcu2').val(2);
           	$('#editarTipoOcu2').html("Auxiliar");

           	$('#editarTipoOcu1').val(1);
           	$('#editarTipoOcu1').html("Administrador");

           	$('#editarTipoOcu3').val(4);
           	$('#editarTipoOcu3').html("Bodeguista");

           	$('#editarTipoOcu4').val(5);
           	$('#editarTipoOcu4').html("Domiciliario");


           }else if(respuesta["ID_Occupation"] == 4) {


           	$('#editarTipoOcu').html("Bodeguista");

           	$('#editarTipoOcu1').val(2);
           	$('#editarTipoOcu1').html("Auxiliar");

           	$('#editarTipoOcu2').val(1);
           	$('#editarTipoOcu2').html("Administrador");

           	$('#editarTipoOcu3').val(3);
           	$('#editarTipoOcu3').html("Cajero");

           	$('#editarTipoOcu4').val(5);
           	$('#editarTipoOcu4').html("Domiciliario");

          
           }else if(respuesta["ID_Occupation"] == 5) {

           	$('#editarTipoOcu').html("Domiciliario");

           	$('#editarTipoOcu1').val(2);
           	$('#editarTipoOcu1').html("Auxiliar");

           	$('#editarTipoOcu2').val(1);
           	$('#editarTipoOcu2').html("Administrador");

           	$('#editarTipoOcu3').val(4);
           	$('#editarTipoOcu3').html("Bodeguista");

           	$('#editarTipoOcu4').val(3);
           	$('#editarTipoOcu4').html("Cajero");



           }

           $('#fotoActual').val(respuesta["Photo"]);

           if (respuesta["Photo"] != "views/assets/img/avatar.png") {

           	$(".previsualizar").attr("src", respuesta["Photo"]);


           }else {
                
              $(".previsualizar").attr("src", "views/assets/img/avatar.png");


           }

		}

	});