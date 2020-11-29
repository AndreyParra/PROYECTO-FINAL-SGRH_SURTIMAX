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



            if($respuesta == "ok" && $respuesta1 == "ok") {

              date_default_timezone_set("America/Bogota");

              $mail = new PHPMailer;

              $mail->isMail();

              $mail->setFrom('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');

              $mail->addReplyTo('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');
          
              $mail->Subject = "Asignación de nueva contraseña";
              
              $mail->addAddress($_POST["correo"]);
              
              $mail->msgHTML('
              

                  <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                    <center>

                      <img  style="padding:20px; width: 15%" src="https://www.grupoexito.com.co/sites/default/files/2019-12/logo-aliado_surtimax.png" alt="">

                    </center>

                    <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                      <center>

                        <img style="padding:20px; width:10%; " src="https://www.vippng.com/png/detail/397-3975144_sobre-png-icono-email-rojo-png.png" alt="">

                        <h3 style="font-weight:100; color:gray;">Su contraseña de acceso es: '.$password1.'</h3>
                        <hr style="border:1px solid  #ccc; width:80%">

                      </center>

                    </div>


                  </div> ');

                  $envio = $mail->Send();

                  if(!$envio) {

                    echo "<script>

                    Swal.fire({
                      icon: 'error',
                      title: '¡Ha ocurrido un problema enviando la contraseña el correo a ".$_POST["correo"].$mail->ErrorInfo."!',
                    }).then((result)=>{
   
                     if(result.value) {
                
                       window.location = 'usuarios'; 
           
                      }
                
                    })
   
   
                 </script>";
                    

                  }else {

                          echo "<script>

                          Swal.fire({
                            icon: 'success',
                            title: '¡Usuario registrado correctamente!, revise el correo ".$_POST["correo"]."',
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

      if (isset($_POST["emailRecuperar"])) {
        
        $email = $_POST["emailRecuperar"];

          //Generar contraseña
          $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
          $passwordRec = "";

          for($i=0; $i<=9; $i++) {
             
             //obtenemos un caracter aleatorio escogido de la cadena de caracteres
             $passwordRec .= substr($str,rand(0,62),1);     
          }

          $encriptar = crypt($passwordRec, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        
          $respuesta = Usuario::recuperarClave($email);

          if($respuesta){

             $respuesta1 = Usuario::actualizarClave($respuesta[0], $encriptar);

             if($respuesta1) {

              date_default_timezone_set("America/Bogota");

              $mail = new PHPMailer;

              $mail->isMail();

              $mail->setFrom('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');

              $mail->addReplyTo('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');
          
              $mail->Subject = "Asignación de nueva contraseña";
              
              $mail->addAddress($_POST["emailRecuperar"]);
              
              $mail->msgHTML('
              

                  <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                    <center>

                      <img  style="padding:20px; width: 15%" src="https://www.grupoexito.com.co/sites/default/files/2019-12/logo-aliado_surtimax.png" alt="">

                    </center>

                    <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">

                      <center>

                        <img style="padding:20px; width:10%; " src="https://www.vippng.com/png/detail/397-3975144_sobre-png-icono-email-rojo-png.png" alt="">

                        <h3 style="font-weight:100; color:gray;">Su contraseña de acceso es: '.$passwordRec.'</h3>
                        <hr style="border:1px solid  #ccc; width:80%">

                      </center>

                    </div>


                  </div> ');

                  $envio = $mail->Send();

                  if(!$envio) {

                    echo "<script>

                    Swal.fire({
                      icon: 'error',
                      title: '¡Ha ocurrido un problema enviando la contraseña el correo a ".$_POST["emailRecuperar"].$mail->ErrorInfo."!',
                    })
   
   
                 </script>";
                    

                  }else {

                          echo "<script>

                          Swal.fire({
                            icon: 'success',
                            title: '¡Contraseña enviada correctamente!, revise el correo ".$_POST["emailRecuperar"]."',
                          })
        
        
                      </script>";
                    
                  }

             }else {

              echo "<script>

              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                title: 'Ha ocurrido un error y la contraseña no se ha podido actualizar',
              })
 
 
             </script>";

             }

          }else {

            echo "<script>

             Swal.fire({
               icon: 'error',
               title: 'Oops...',
               title: 'Verifique su correo e intente de nuevo',
             })


            </script>";

          }


      }

    }

    public static function ctrEliminarChat() {

      if(isset($_POST["eliminarTodo"])) {

        $respuesta = Usuario::eliminarChat();

          if($respuesta){

            echo "<script>

                Swal.fire({
                  icon: 'success',
                  title: 'Oops...',
                  title: 'Mensajes eliminados correctamente',
                })


                </script>";

          }

      }

    }

  	
  }