<?php
  //controlador que devuelve la plantilla de la vista
  class LoginController {

  	
  	//método para el ingreso de un usuario

  	public function ctrLogin() {
  		
  		if(isset($_POST["email"])) {

  			if (preg_match('/^[a-zA-Z0-9.@]+$/', $_POST["email"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]) ) {

          $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

  				$valor = $_POST["email"];

  				$respuesta = Login::buscarUsuario($valor);

          if(@$respuesta["Mail"] == $_POST["email"] && @$respuesta["Password"] == $encriptar) {

            if ($respuesta["Status"] == "A") {

                        $_SESSION["acceder"] = "true";
                        $_SESSION["nombre"] = $respuesta["Name"];
                        $_SESSION["apellido"] = $respuesta["LastName"];
                        $_SESSION["email"] = $respuesta["Mail"];
                        $_SESSION["tipoDoc"] = $respuesta["TypeDocument"];
                        $_SESSION["cedula"] = $respuesta["NumDocument"];
                        $_SESSION["foto"] = $respuesta["Photo"];
                        $_SESSION["rol"] = $respuesta["Type"];
                        $_SESSION["codigo"] = $respuesta["ID"];

                        date_default_timezone_set('America/Bogota');


                        echo '<script> window.location= "menu" </script>';

                        $fecha = date('Y-m-d');
                        $hora= date('H:i:s');

                        $fechaActual = $fecha.' '.$hora;

                        $valor1 = $fechaActual;

                        $valor2 = $_SESSION["codigo"];

                        $valor3 = $respuesta["totalLogin"] + 1;

                        Usuario::editarUsuario($valor1, $valor2, $valor3);
            }else {
             
             echo "<script>

                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  title: 'Usted se encuentra desactivado, por lo tanto no puede ingresar',
                })


             </script>";
          }
  					

  				}else {
  					 
             echo "<script>

                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  title: 'Correo y/o contraseña no valido(s) por favor intenta de nuevo!',
                })


             </script>";
  				}
  			}else {
             
             echo "<script>

                Swal.fire({
                  icon: 'error',
                  title: 'El formato ingresado para el correo y contraseña no es valido!',
                })


             </script>";
          }
  		}
  	}

  }

