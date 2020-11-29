// subiendo seccion de usuario

$(".newPhoto").change(function() {
	var imagen = this.files[0];

	// validacion de png o jpg

	if (imagen["type"]!="image/jpeg" && imagen["type"] != "image/png") {

		$(".newPhoto").val("");

		swal.fire({
            icon: "error",
			title: "¡Error al subir imagen!",
			text: "La imagen debe estar en formato JPG o PNG",
			type: "error",
			confirmButtonText: "cerrar",
			showCloseButton: true
		});
	}else if(imagen["size"] > 3000000){

        swal.fire({
            icon: "error",
			title: "¡Error al subir imagen!",
			text: "La imagen no debe pesar más de 3MB",
			type: "error",
			confirmButtonText: "cerrar",
			showCloseButton: true
		});

	}else {
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event) {

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);
		})
	}

})


$(".nuevaFoto").change(function() {
	var imagen = this.files[0];

	// validacion de png o jpg

	if (imagen["type"]!="image/jpeg" && imagen["type"] != "image/png") {

		$(".nuevaFoto").val("");

		swal.fire({
            icon: "error",
			title: "¡Error al subir imagen!",
			text: "La imagen debe estar en formato JPG o PNG",
			type: "error",
			confirmButtonText: "cerrar",
			showCloseButton: true
		});
	}else if(imagen["size"] > 3000000){

        swal.fire({
            icon: "error",
			title: "¡Error al subir imagen!",
			text: "La imagen no debe pesar más de 3MB",
			type: "error",
			confirmButtonText: "cerrar",
			showCloseButton: true
		});

	}else {
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event) {

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);
		})
	}

})


/*=============================================
EDITAR EMPLEADO
=============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
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


			
           $('#editarFullname').val(respuesta["Name"]);
           $('#editarLastname').val(respuesta["LastName"]);
           $('#editarTipo').html(respuesta["TypeDocument"]);
           $('#editarTipo').val(respuesta["TypeDocument"]);
           $('#fotoActual').val(respuesta["Photo"]);

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
           $('#editarEps').val(respuesta["Eps"]);
           $('#editarArl').val(respuesta["Arl"]);
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

           if (respuesta["Photo"] != "") {

           	$(".previsualizar").attr("src", respuesta["Photo"]);


           }else {
                
              $(".previsualizar").attr("src", "views/assets/img/avatar.png");


           }

		}

	});

})








// ACTIVAR EMPLEADO
$(".btnActivar").click(function() {
	
	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario")

	var datos = new FormData();
	datos.append("activarId", idUsuario);
	datos.append("activarUsuario", estadoUsuario);

	$.ajax({
       
       url: "ajax/empleados.ajax.php",

       method: "POST",

       data: datos,

       cache: false,

       contentType: false,

       processData: false,

       success: function(respuesta){


       }

	})

	if (estadoUsuario == 'I') {

		$(this).removeClass('btn-sucess');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario','A');
	
	}else{

		$(this).removeClass('btn-danger');
		$(this).addClass('btn-sucess');
		$(this).html('Activado');
		$(this).attr('estadoUsuario','I');

	}
})




//validar duplicidad de los datos

$('#document').change(function(){

  $(".text-danger").remove();

  var usuario = $(this).val();

  var datos =  new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({

    url: "ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta) {

 

      if(respuesta){

        $("#document").before('<small class="text-danger"> (Documento ya registrado)</small>');

        $("#document").val("");
      }
    }
  })
})

$('#email').change(function(){

  $(".text-danger").remove();

  var correo = $(this).val();

  var datos = new FormData();
  datos.append("validarCorreo", correo);

  $.ajax({

    url: "ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta) {

       if(respuesta){

         $("#email").before('<small class="text-danger"> (Correo ya registrado)</small>');

         $("#email").val("");
       }
    }

  })

})


$('#cel').change(function(){

  $(".text-danger").remove();

  var cel = $(this).val();

  var datos = new FormData();
  datos.append("validarCelular", cel);

  $.ajax({

    url: "ajax/empleados.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta) {

       if(respuesta){

         $("#cel").before('<small class="text-danger"> (Celular ya registrado)</small>');

         $("#cel").val("");
       }
    }

  })

})


//EDITAR CONTRASEÑA 



$('#conActual').change(function(){

  $(".text-danger").remove();

  $(".text-success").remove();

  var conActual = $(this).val();
  var codigo = $(this).attr("codigo");

  var datos = new FormData();
  datos.append("claveActual", conActual);
  datos.append("codigoEmp", codigo);

  $.ajax({

    url: "ajax/usuario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta) {

        if(respuesta == false) {

          $("#conActual").before('<small class="text-danger"> (Contraseña incorrecta)</small>');

          $("#conActual").val("");
        }else {

          $("#conActual").before('<small class="text-success"> (Contraseña correcta)</small>');
        }
    }

  })

})


//EDITAR VACANTE 

$('.box-body').on("click", ".btnMostrarVacante", function(){

    var idVacante = $(this).attr("idVacante");

    var datos = new FormData();

    datos.append("idVacante", idVacante);

    $.ajax({

      url:"ajax/vacante.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){

         if(respuesta["NameVacant"] == 2) {

                    
                      $('#editarNameOcu1').html("Auxiliar");
                      $('#editarNameOcu1').val(2);

                      $('#editarNameOcu2').val(3);
                      $('#editarNameOcu2').html("Cajero");

                      $('#editarNameOcu3').val(4);
                      $('#editarNameOcu3').html("Bodeguista");

                      $('#editarNameOcu4').val(5);
                      $('#editarNameOcu4').html("Domiciliario");


                    }else if(respuesta["NameVacant"] ==  3) {

                    
                    $('#editarNameOcu1').html("Cajero");
                    $('#editarNameOcu1').val(3);

                    $('#editarNameOcu2').val(2);
                    $('#editarNameOcu2').html("Auxiliar");

                    $('#editarNameOcu3').val(4);
                    $('#editarNameOcu3').html("Bodeguista");

                    $('#editarNameOcu4').val(5);
                    $('#editarNameOcu4').html("Domiciliario");


                    }else if(respuesta["NameVacant"] == 4) {


                      $('#editarNameOcu1').html("Bodeguista");
                      $('#editarNameOcu1').val(4);

                      $('#editarNameOcu2').val(2);
                      $('#editarNameOcu2').html("Auxiliar");

                      $('#editarNameOcu3').val(3);
                      $('#editarNameOcu3').html("Cajero");

                      $('#editarNameOcu4').val(5);
                      $('#editarNameOcu4').html("Domiciliario");

                   
                    }else if(respuesta["NameVacant"] == 5) {

                     $('#editarNameOcu1').html("Domiciliario");
                     $('#editarNameOcu1').val(5);

                     $('#editarNameOcu2').val(2);
                     $('#editarNameOcu2').html("Auxiliar");

                     $('#editarNameOcu3').val(3);
                     $('#editarNameOcu3').html("Cajero");

                     $('#editarNameOcu4').val(4);
                     $('#editarNameOcu4').html("Bodeguista");



                    }

                    $('#editarWage').val(respuesta["Wage"]);

                    $('#editarDescription').val(respuesta["Description"]);

                  }

    })

})

//editar cita
$(".tablas").on("click", ".btnEditarCita", function(){

  var idCita = $(this).attr("idCita");

    var datos = new FormData();
    datos.append("idCita", idCita);

    $.ajax({

      url:"ajax/cita.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        
          $('#editardate_c').val(respuesta["date"]);   
          $('#editarhour_fin').val(respuesta["hour_end"]);  
          $('#editarhour_ini').val(respuesta["hour_start"]); 
          $('#editarcomments').val(respuesta["comments"]); 
          $('#id').val(respuesta["id"]); 

      }

    });

})





