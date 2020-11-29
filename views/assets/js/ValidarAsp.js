$(document).ready(function(){
$('.validarFormularioHV').validate({
    rules: {
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
        messages: {
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

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".validar").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".validar").addClass("has-success").removeClass("has-error");
        }
    });
});