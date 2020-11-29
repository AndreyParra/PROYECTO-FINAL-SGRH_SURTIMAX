<?php 

  class UsuarioController {

  	
    public static function ctrContarUsuarios() {

      $valor = "A";
  	  
  	  $respuesta = Usuario::contarUsuarios($valor);
  	  
  	  return $respuesta;
  	}

    
    public static function ctrGraficarRoles() {

      $respuesta = Usuario::graficarRoles();

      return $respuesta;

    }

    
    public static function ctrChatUsuario() {

      $respuesta = Usuario::verMensajes();

      return $respuesta;
    }
   

    public static function ctrListarRoles() {

      $valor = 'A';

      $respuesta = Usuario::listarRoles($valor);

      return $respuesta;
    }

    
    public static function ctrNuevoMensaje() {

      if (isset($_POST["msg"])) {

        $mensaje = $_POST["msg"];

        $respuesta = Usuario::nuevoMensaje($mensaje);

      }
    }

   
    public static function ctrBuscarUsuario() {

      $respuesta = Usuario::buscarUsuario();

      return $respuesta;
    }
    

    public static function ctrNuevoUsuario() {

        if(isset($_POST["datosUsuario"])) {

          if($_POST["datosUsuario"] != "sinValor") {

            $idUsuario = $_POST["datosUsuario"];



            //Generar contraseña
            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $password1 = "";

            for($i=0; $i<=9; $i++) {
               
               //obtenemos un caracter aleatorio escogido de la cadena de caracteres
               $password1 .= substr($str,rand(0,62),1);     
            }

            $encriptar = crypt($password1, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $respuesta = Usuario::nuevoUsuario( $encriptar, $idUsuario);

            $respuesta1 = Empleado::editarPerfil($idUsuario);


            // $fromemail = "aliadosurtimaxmerkamax@gmail.com";

            // $fromname = "MerkaMax Aliado Surtimax";

            // $host = "smtp.gmail.com";

            // $port = "587";

            // $SMTPAuth = "login";

            // $SMTPSecure = "tls";

            // $password = "merkamax123";

            // $emailTo = $_POST["correo"];

            // $subject = "Asignación de nueva contraseña";

            // $bodyEmail = "Su nueva contraseña para el sistem de contratación de Merka Max PG es: ".$password1.", recuerde que puede cambiarla";




            // $mail = new PHPMailer\PHPMailer\PHPMailer();

            // try {

            //   $mail->isSMTP();

            //   $mail->SMTPDebug = 1;
            //   $mail->Host = $host;
            //   $mail->Port = $port;
            //   $mail->SMTPAuth = $SMTPAuth;
            //   $mail->SMTPSecure = $SMTPSecure;
            //   $mail->Username = $fromemail;
            //   $mail->Password = $password;

            //   $mail->setFrom($fromemail, $fromname);
            //   $mail->addAddress($emailTo);



            //   $mail->isHTML(true);
            //   $mail->Subject = $subject;

            //   $mail->Body = $bodyEmail;

            //   if (!$mail->send()) {

            //     error_log("No se pudo enviar el correo");

            //   }


            //   echo "correo enviado con exito";

              
            // } catch (Exception $e) {
              
            // }


            if($respuesta == "ok" && $respuesta1 == "ok") {

              echo "<script>

                 Swal.fire({
                   icon: 'success',
                   title: '¡Usuario registrado correctamente!',
                 }).then((result)=>{

                  if(result.value) {
             
                    window.location = 'usuarios'; 
        
                   }
             
                 }) 


              </script>";

            }else {

              echo "<script>

                 Swal.fire({
                   icon: 'error',
                   title: '¡Usuario ya registrado!',
                 }).then((result)=>{

                  if(result.value) {
             
                    window.location = 'usuarios'; 
        
                   }
             
                 })


              </script>";

            }

          }else {
            
            echo "<script>

               Swal.fire({
                 icon: 'error',
                 title: '¡Debe seleccionar un empleado existente!',
               }).then((result)=>{

                if(result.value) {
           
                  window.location = 'usuarios'; 
      
                 }
           
               })


            </script>";
          }


        }
      }

  

    public static function ctrAgregarNota() {

      if (isset($_POST["item"])) {


        $nombre = $_SESSION["nombre"];

        $apellido = $_SESSION["apellido"];

        $valor = $_POST["item"];

        $respuesta = Usuario::agregarNota($nombre, $apellido, $valor);
        

      }
    }



    public static function ctrVerNotas() {

      $respuesta = Usuario::verNotas();

      return $respuesta;

    }



    public static function ctrEditarNota() {

      if (isset($_POST["editarItem"])) {


        $nombre = $_SESSION["nombre"];

        $apellido = $_SESSION["apellido"];
        
        $editarItem = $_POST["editarItem"];

        $listarItem = $_POST["listarItem"];


        $respuesta = Usuario::editarNota($nombre, $apellido, $editarItem, $listarItem);


      }
    }

    public function ctrEliminarNotas() {

      if(isset($_POST["eliminarItem"])){


        $valor = $_POST["eliminarItem"];

        $respuesta = Usuario::eliminarNotas($valor);
      }
    }

    public static function ctrEditarClave() {

      if(isset($_POST["conActual"])) {

       
        $conActual = crypt($_POST["conActual"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
       
        $conNueva = crypt($_POST["conNueva"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        
        $codigo =  $_SESSION["codigo"];

        $respuesta = Usuario::editarClave($conActual, $conNueva, $codigo);


        if($respuesta == "ok") {

          echo "<script>

             Swal.fire({
               icon: 'success',
               title: 'Su contraseña fue actualizada con éxito',
             })


          </script>";

        }else if($respuesta == "false") {

          echo "<script>

             Swal.fire({
               icon: 'error',
               title: 'Oops...',
               title: 'Verifique sus datos e intente de nuevo',
             })


          </script>";

        }

      }
    }

    public static function ctrPreguntarClave($clave, $codigo) {


      $valor = crypt($clave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

      $respuesta = Usuario::preguntarClave($valor, $codigo);

      return $respuesta;

    }

    public static function ctrTotalLogin(){

      $valor = 'A';

      $respuesta = Usuario::totalLogin($valor);

      return $respuesta;

    } 

    public static function ctrRecuperarClave() {

      if (isset($_POST["email"])) {
        
        $email = $_POST["email"];

        $respuesta = Usuario::recuperarClave($email);

        var_dump($respuesta);


      }

    }

  	
  }