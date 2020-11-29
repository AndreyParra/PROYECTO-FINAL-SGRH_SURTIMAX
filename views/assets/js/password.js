$(document).ready(function(){
   $('.formulariio').validate({
      rules: {
         
         conActual: {
            required: true,
            minlength: 8,
            maxlength: 15
         },
         conNueva: {
            required: true,
            minlength: 10,
            maxlength: 15
         },
         conConfirmar: {
            required: true,
            minlength: 10,
            equalTo: "#password"
         }
      },
      messages: {           


         conConfirmar: {
            required: "Campo obligatorio.",
            minlength: "mínimo 10 caracteres de longitud.",
            equalTo: "Por favor ingresa la misma contraseña de arriba."
         },
         conActual: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "Longitud máximo de 15 caracteres."
         },
         conNueva: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "Longitud máximo de 15 caracteres."
         }

      },
      errorElement: "em",
      errorPlacement: function (error, element) {
         // Add the `help-block` class to the error element
         error.addClass("help-block");

         if (element.prop( "type" ) === "checkbox") {
            error.insertAfter(element.parent("label") );
         } else {
            error.insertAfter(element);
         }
         
      },
      highlight: function ( element, errorClass, validClass ) {
         $( element ).parents( ".validar" ).addClass( "has-error" ).removeClass( "has-success" );
      },
      unhighlight: function (element, errorClass, validClass) {
         $( element ).parents( ".validar" ).addClass( "has-success" ).removeClass( "has-error" );  
      } 
   });
});