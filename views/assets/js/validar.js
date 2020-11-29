
 $(document).ready(function(){
    $('.validarFormulario').validate({
       rules: {
          fullname: {
             required: true,
             minlength: 3,
             maxlength: 30
          },
          Description: {
             required: true,
             minlength: 10,
             maxlength: 100
          },
          Name: {
             required: true
          },
          direccion: {
             required: true,
             minlength: 10,
             maxlength: 30
          },
          lastname: {
             required: true,
             minlength: 10,
             maxlength: 30
          },
          tipo: {
             required: true
          },
          datosUsuario: {
             required: true
          },
          tipoGen: {
             required: true
          },
          fecha: {
             required: true
          },
          tipoEst: {
             required: true
          },
          document: {
             required: true,
             minlength: 7,
             maxlength: 10
          },
          foto: {
             required: true
          },
          comments: {
             required: true,
             minlength: 5,
             maxlength: 30
          },
          mensaje: {
             required: true,
             minlength: 15,
             maxlength: 100
          },
          lugar: {
             required: true,
             minlength: 8,
             maxlength: 30
          },
          tel: {
             required: true,
             minlength: 7,
             maxlength: 7
          },
          cel: {
             required: true,
             minlength: 10,
             maxlength: 10
          },
          Wage: {
             required: true,
             minlength: 6,
             maxlength: 7
          },
          password: {
             required: true,
             minlength: 8,
             maxlength: 15
          },
          confirm_password: {
             required: true,
             minlength: 8,
             equalTo: "#password"
          },
          email: {
             required: true,
             email: true
          },
          email1: {
             email: true
          },
          empresa: {
             required: true,
             minlength: 3,
             maxlength: 30
          },
          codigoOcupacion: {
            required: true
          },
          cargoAnterior: {
             required: true,
             minlength: 3,
             maxlength: 15
          },
          eps: {
              required: true,
              minlength: 3,
              maxlength: 15
          },
          arl: {
              required: true,
              minlength: 3,
              maxlength: 15
          },
          nameBoss: {
             required: true,
             minlength: 10,
             maxlength: 40
          },
          telBoss: {
             minlength: 7,
             maxlength: 10
          },
          horas: { 
             required: true,
             minlength: 5,
             maxlength: 20
          },
          formExperiencia: {
             required: true
          },
          Vacante: {
            required: true
        },
        Name: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        LastName: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        TDocument: {
            required: true
        },
        NumDocument: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        CPhone: {
            minlength: 7,
            maxlength: 10
        },
        CCellphone: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        CAddress: {
            required: true,
            minlength: 10
        },
        CMail: {
            required: true,
            email: true
        },
        CGender: {
            required: true
        },
        CMaritalStatus: {
            required: true
        },
        CBirthDate: {
            required: true
        },
        CDescription: {
            required: true,
            minlength: 25,
            maxlength: 250
        },
        Photo: {
            required: true
        },
        Titulo1: {
            required: true
        },
        Carrera1: {
            required: true,
            minlength: 10,
            maxlength: 50
        },
        Instituion1: {
            required: true,
            minlength: 4,
            maxlength: 50
        },
        Titulo2: {
            required: true
        },
        Carrera2: {
            required: true,
            minlength: 10,
            maxlength: 50
        },
        Instituion2: {
            required: true,
            minlength: 4,
            maxlength: 50
        },
        Titulo3: {
            required: true
        },
        Carrera3: {
            required: true,
            minlength: 10,
            maxlength: 50
        },
        Instituion3: {
            required: true,
            minlength: 4,
            maxlength: 50
        },
        Compania1: {
            required: true,
            minlength: 8,
            maxlength: 50
        },
        Jefe1: {
            required: true,
            minlength: 8,
            maxlength: 25
        },
        DocJefe1: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        TelefonoJefe1: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        CargoAntes1: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        Compania2: {
            required: true,
            minlength: 8,
            maxlength: 50
        },
        Jefe2: {
            required: true,
            minlength: 8,
            maxlength: 25
        },
        DocJefe2: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        TelefonoJefe2: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        CargoAntes2: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        Compania3: {
            required: true,
            minlength: 8,
            maxlength: 50
        },
        Jefe3: {
            required: true,
            minlength: 8,
            maxlength: 25
        },
        DocJefe3: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        TelefonoJefe3: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        CargoAntes3: {
            required: true,
            minlength: 3,
            maxlength: 30
        },
        DocRefe1: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        NombreRefe1: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        OcupacionRefe1: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        ParentescoRefe1: {
            required: true
        },
        TelefonoRefe1: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        DocRefe2: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        NombreRefe2: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        OcupacionRefe2: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        ParentescoRefe2: {
            required: true
        },
        TelefonoRefe2: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        DocRefe3: {
            required: true,
            minlength: 8,
            maxlength: 10
        },
        NombreRefe3: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        OcupacionRefe3: {
            required: true,
            minlength: 3,
            maxlength: 15
        },
        ParentescoRefe3: {
            required: true
        },
        TelefonoRefe3: {
            required: true,
            minlength: 7,
            maxlength: 10
        },
        Idioma1: {
            required: true
        },
        Institucion1: {
            required: true,
            minlength: 7,
            maxlength: 20
        },
        Idioma2: {
            required: true
        },
        Institucion2: {
            required: true,
            minlength: 7,
            maxlength: 20
        },
        Idioma3: {
            required: true
        },
        Institucion3: {
            required: true,
            minlength: 7,
            maxlength: 20
        },
          agree: "required"
       },
       messages: {           
          fullname: {
             required: "Campo obligatorio.",
             minlength: "Longitud mínimo de 3 caracteres.",
             maxlength: "No puede digitar mas de 30 caracteres."
          },
          Description: {
             required: "Campo obligatorio.",
             minlength: "Longitud mínimo de 10 caracteres.",
             maxlength: "No puede digitar mas de 100 caracteres."
          },
          Name: {
             required: "Campo obligatorio."
          },
          direccion: {
             required: "Campo obligatorio",
             minlength: "Mínimo debes digitar 10 caracteres.",
             maxlength: "No puede digitar mas de 30 caracteres."
          },
          fecha: {
             required: "Seleccione su fecha de nacimiento."
          },
          radio: {
             required: "Seleccione su genero."
          },
          lastname: {
             required: "Campo obligatorio.",
             minlength: "Longitud mínimo de 10 caracteres.",
             maxlength: "No puede digitar mas de 30 caracteres."
          },
          lugar: {
             required: "Campo obligatorio.",
             minlength: "Longitud minima 10 caracteres.",
             maxlength: "No puede digitar mas de 30 caracteres."
          },
          codigoOcupacion: {
             required: "Campo obligatorio."
          },
          document: {
             required: "Campo obligatorio.",
             minlength: "Longitud de 7 caracteres minimo.",
             number: "Digite solo números.", 
             maxlength: "Longitud de 10 caracteres maximo."
          },
          foto: {
             required: "Cargue su foto."
          },
          comments: {
            required: "Campo obligatorio.",
            minlength: "Longitud de 5 caracteres minimo.",
            maxlength: "Longitud de 30 caracteres máximo."
          }, 
          mensaje: {
            required: "Campo obligatorio.",
            minlength: "Longitud de 15 caracteres minimo.",
            maxlength: "Longitud de 100 caracteres maximo."
          }, 
          tel: {
             minlength: "El teléfono debe tener 7 digitos.",
             maxlength: "El teléfono debe tener 7 digitos.",
             number: "Digite solo números.", 
             required: "Campo obligatorio."
          },
          Wage: {
             minlength: "El salario debe tener 6 digitos como mínimo.",
             maxlength: "El salario debe tener 7 dígitos máximo.",
             number: "Digite solo números.", 
             required: "Campo obligatorio."
          },
          cel: {
             minlength: "El celular debe tener 10 digitos.",
             maxlength: "El celular debe tener 10 digitos.",
             number: "Digite solo números.", 
             required: "Campo obligatorio."
          },
          confirm_password: {
             required: "Ingresa un password.",
             minlength: "mínimo 8 caracteres de longitud.",
             equalTo: "Por favor ingresa la misma contraseña de arriba."
          },
          password: {
             required: "Campo obligatorio.",
             minlength: "Longitud mínimo de 8 caracteres.",
             maxlength: "Longitud máximo de 20 caracteres."
          },
          empresa: {
             required: "Campo obligatorio.",
             minlength: "Debe digitar minimo 3 caracteres.",
             maxlength: "No puede digitar mas de 30 caracteres."
          },
          cargoAnterior: {
             required: "Campo obligatorio.",
             minlength: "Debe digitar minimo 3 caracteres.",
             maxlength: "No puede digitar mas de 15 caracteres."
          },
          nameBoss: {
             required: "Campo obligatorio.",
             minlength: "Debe digitar minimo 10 caracteres.",
             maxlength: "No puede digitar mas de 40 caracteres."
          },
          eps: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
          },
          arl: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
          },
          telBoss: {
             minlength: "El teléfono debe tener minimo 7 digitos.",
             maxlength: "El teléfono debe tener maximo 10 digitos.",
             number: "Digite solo números.", 
             required: "Campo obligatorio."
          },
          horas: {
             required: "Campo obligatorio.",
             minlength: "Debe digitar minimo 5 caracteres.",
             maxlength: "No puede digitar mas de 20 caracteres."
          },
          formExperiencia: {
             required: "Adjunte formulario de experiencia."
          },
          experiencia: "Campo obligatorio.",
          cargo: "Por favor seleccione su cargo.",
          tipo: "Campo obligatorio.",
          tipoGen: "Campo obligatorio.",
          tipoEst: "Campo obligatorio.",
          datosUsuario: "Campo obligatorio.",
          email: "Por favor ingresa un correo válido.",
          agree: "Por favor acepta nuestra política.",
          luckynumber: {
             required: "Por favor."
          },
          Vacante: {
            required: "Campo Obligatorio."
        },
        Name: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
        },
        LastName: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
        },
        TDocument: {
            required: "Campo Obligatorio."
        },
        NumDocument: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        CPhone: {
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        CCellphone: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        CAddress: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres."
        },
        CMail: {
            required: "Campo Obligatorio.",
            email: "Formato no coincide ."
        },
        CGender: {
            required: "Seleccione un Campo",
        },
        CMaritalStatus: {
            required: "Seleccione un Campo",
        },
        CBirthDate: {
            required: "Seleccione",
        },
        CDescription: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 25 caracteres.",
            maxlength: "No puede digitar mas de 250 caracteres."
        },
        Photo: {
            required: "Seleccione Una Foto"
        },
        Titulo1: {
            required: "Selecione"
        },
        Carrera1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Instituion1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Titulo2: {
            required: "Campo Obligatorio."
        },
        Carrera2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Instituion2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Titulo3: {
            required: "Campo Obligatorio."
        },
        Carrera3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Instituion3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Compania1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Jefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 25 caracteres."
        },
        DocJefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 25 caracteres."
        },
        TelefonoJefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 25 caracteres."
        },
        CargoAntes1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
        },
        Compania2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Jefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 25 caracteres."
        },
        DocJefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        TelefonoJefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        CargoAntes2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
        },
        Compania3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 50 caracteres."
        },
        Jefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 25 caracteres."
        },
        DocJefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        TelefonoJefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        CargoAntes3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
        },
        DocRefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        NombreRefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
        },
        OcupacionRefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
        },
        ParentescoRefe1: {
            required: "Campo Obligatorio."
        },
        TelefonoRefe1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        DocRefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        NombreRefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        OcupacionRefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        ParentescoRefe2: {
            required: "Campo Obligatorio."
        },
        TelefonoRefe2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        DocRefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        NombreRefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
        },
        OcupacionRefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
        },
        ParentescoRefe3: {
            required: "Campo Obligatorio."
        },
        TelefonoRefe3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 10 caracteres."
        },
        Idioma1: {
            required: "Campo Obligatorio."
        },
        Institucion1: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 20 caracteres."
        },
        Idioma2: {
            required: "Campo Obligatorio."
        },
        Institucion2: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 20 caracteres."
        },
        Idioma3: {
            required: "Campo Obligatorio."
        },
        Institucion3: {
            required: "Campo Obligatorio.",
            minlength: "Longitud mínimo de 7 caracteres.",
            maxlength: "No puede digitar mas de 20 caracteres."
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



$(document).ready(function(){
   $('#login').validate({
      rules: {
         
         password: {
            required: true,
            minlength: 8,
            maxlength: 20
         },
         email: {
            required: true,
            email: true
         },
         
      },
      messages: {           
         
         password: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "Longitud máximo de 20 caracteres."
         },
         email: "Por favor ingresa un correo válido.",
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
 
 





$(document).ready(function(){
   $('.validarFormularioEditar').validate({
      rules: {
         editarFullname: {
            required: true,
            minlength: 3,
            maxlength: 30
         },
         Description: {
            required: true,
            minlength: 10,
            maxlength: 100
         },
         editarDireccion: {
            required: true,
            minlength: 10,
            maxlength: 30
         },
         editarLastname: {
            required: true,
            minlength: 10,
            maxlength: 30
         },
         tipo: {
            required: true
         },
         datosUsuario: {
            required: true
         },
         tipoGen: {
            required: true
         },
         editarFecha: {
            required: true
         },
         tipoEst: {
            required: true
         },
         editarDocument: {
            required: true,
            minlength: 7,
            maxlength: 10
         },
         foto: {
            required: true
         },
         comments: {
            required: true,
            minlength: 5,
            maxlength: 30
         },
         mensaje: {
            required: true,
            minlength: 15,
            maxlength: 100
         },
         lugar: {
            required: true,
            minlength: 8,
            maxlength: 30
         },
         editarTel: {
            required: true,
            minlength: 7,
            maxlength: 7
         },
         editarCel: {
            required: true,
            minlength: 10,
            maxlength: 10
         },
         editarWage: {
            required: true,
            minlength: 6,
            maxlength: 7
         },
         password: {
            required: true,
            minlength: 8,
            maxlength: 15
         },
         confirm_password: {
            required: true,
            minlength: 8,
            equalTo: "#password"
         },
         editarEmail: {
            required: true,
            email: true
         },
         email1: {
            email: true
         },
         empresa: {
            required: true,
            minlength: 3,
            maxlength: 30
         },
         codigoOcupacion: {
           required: true
         },
         cargoAnterior: {
            required: true,
            minlength: 3,
            maxlength: 15
         },
         editarEps: {
             required: true,
             minlength: 3,
             maxlength: 15
         },
         editarArl: {
             required: true,
             minlength: 3,
             maxlength: 15
         },
         nameBoss: {
            required: true,
            minlength: 10,
            maxlength: 40
         },
         telBoss: {
            minlength: 7,
            maxlength: 10
         },
         horas: {
            required: true,
            minlength: 5,
            maxlength: 20
         },
         formExperiencia: {
            required: true
         },
         agree: "required"
      },
      messages: {           

         editarFullname: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
         },
         Description: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 100 caracteres."
         },
         Name: {
            required: "Campo obligatorio."
         },
         editarDireccion: {
            required: "Campo obligatorio",
            minlength: "Mínimo debes digitar 10 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
         },
         editarFecha: {
            required: "Seleccione su fecha de nacimiento."
         },
         radio: {
            required: "Seleccione su genero."
         },
         editarLastname: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 10 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
         },
         lugar: {
            required: "Campo obligatorio.",
            minlength: "Longitud minima 10 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
         },
         codigoOcupacion: {
            required: "Campo obligatorio."
         },
         editarDocument: {
            required: "Campo obligatorio.",
            minlength: "Longitud de 7 caracteres minimo.",
            number: "Digite solo números.", 
            maxlength: "Longitud de 10 caracteres maximo."
         },
         foto: {
            required: "Cargue su foto."
         },
         comments: {
           required: "Campo obligatorio.",
           minlength: "Longitud de 5 caracteres minimo.",
           maxlength: "Longitud de 30 caracteres máximo."
         }, 
         mensaje: {
           required: "Campo obligatorio.",
           minlength: "Longitud de 15 caracteres minimo.",
           maxlength: "Longitud de 100 caracteres maximo."
         }, 
         editarTel: {
            minlength: "El teléfono debe tener 7 digitos.",
            maxlength: "El teléfono debe tener 7 digitos.",
            number: "Digite solo números.", 
            required: "Campo obligatorio."
         },
         Wage: {
            minlength: "El salario debe tener 6 digitos como mínimo.",
            maxlength: "El salario debe tener 7 dígitos máximo.",
            number: "Digite solo números.", 
            required: "Campo obligatorio."
         },
         editarCel: {
            minlength: "El celular debe tener 10 digitos.",
            maxlength: "El celular debe tener 10 digitos.",
            number: "Digite solo números.", 
            required: "Campo obligatorio."
         },
         confirm_password: {
            required: "Ingresa un password.",
            minlength: "mínimo 8 caracteres de longitud.",
            equalTo: "Por favor ingresa la misma contraseña de arriba."
         },
         password: {
            required: "Campo obligatorio.",
            minlength: "Longitud mínimo de 8 caracteres.",
            maxlength: "Longitud máximo de 20 caracteres."
         },
         empresa: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 3 caracteres.",
            maxlength: "No puede digitar mas de 30 caracteres."
         },
         cargoAnterior: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 3 caracteres.",
            maxlength: "No puede digitar mas de 15 caracteres."
         },
         nameBoss: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 10 caracteres.",
            maxlength: "No puede digitar mas de 40 caracteres."
         },
         editarEps: {
           required: "Campo obligatorio.",
           minlength: "Debe digitar minimo 3 caracteres.",
           maxlength: "No puede digitar mas de 15 caracteres."
         },
         editarArl: {
           required: "Campo obligatorio.",
           minlength: "Debe digitar minimo 3 caracteres.",
           maxlength: "No puede digitar mas de 15 caracteres."
         },
         telBoss: {
            minlength: "El teléfono debe tener minimo 7 digitos.",
            maxlength: "El teléfono debe tener maximo 10 digitos.",
            number: "Digite solo números.", 
            required: "Campo obligatorio."
         },
         horas: {
            required: "Campo obligatorio.",
            minlength: "Debe digitar minimo 5 caracteres.",
            maxlength: "No puede digitar mas de 20 caracteres."
         },
         formExperiencia: {
            required: "Adjunte formulario de experiencia."
         },
         experiencia: "Campo obligatorio.",
         cargo: "Por favor seleccione su cargo.",
         tipo: "Campo obligatorio.",
         tipoGen: "Campo obligatorio.",
         tipoEst: "Campo obligatorio.",
         datosUsuario: "Campo obligatorio.",
         editarEmail: "Por favor ingresa un correo válido.",
         agree: "Por favor acepta nuestra política.",
         luckynumber: {
            required: "Por favor."
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

