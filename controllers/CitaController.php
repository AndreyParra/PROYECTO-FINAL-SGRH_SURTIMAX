<?php
 
  class CitaController {

  	static public function ctrNuevaCita() {

  		if (isset($_POST["date_c"])) {
  					

            $fechaInicio = $_POST["date_c"].' '.$_POST["hour_ini"];

            $fechaFinal = $_POST["date_c"].' '.$_POST["hour_fin"];

            $fecha = $_POST["date_c"];

            $horaIni = $_POST["hour_ini"];

            $horaFin = $_POST["hour_fin"];

            $comentarios = $_POST["comments"];


  			    $respuesta = Cita::nuevaCita($fechaInicio, $fechaFinal, $fecha, $horaIni, $horaFin, $comentarios);
           

  			    if ($respuesta == "ok") {
  			    	
  			    	echo  " <script>

                       Swal.fire({

                       title: 'Cita creada correctamente',
                       icon: 'success',
                       confirmButtonColor: '#3085d6'
                       
                       }).then((result)=>{

                         if(result.value) {
              
                           window.location = 'citas'; 

                          }
              
                      }) 

                      </script";
  			    }	
        else {

  				echo "<script>

  				   Swal.fire({
  				     icon: 'error',
  				     title: 'Oops...',
  				     title: 'La Cita no fue Generada',
  				   })


  				</script>";
  			}
  		}
    }

      static public function ctrEditarCita() {

        if (isset($_POST["editardate_c"])) {
              

              $fechaInicio = $_POST["editardate_c"].' '.$_POST["editarhour_ini"];

              $fechaFinal = $_POST["editardate_c"].' '.$_POST["editarhour_fin"];

              $fecha = $_POST["editardate_c"];

              $horaIni = $_POST["editarhour_ini"];

              $horaFin = $_POST["editarhour_fin"];

              $comentarios = $_POST["editarcomments"];

              $id = $_POST["id"];


              $respuesta = Cita::editarCita($fechaInicio, $fechaFinal, $fecha, $horaIni, $horaFin, $comentarios, $id);
             

              if ($respuesta == "ok") {
                
               echo  " <script>

                        Swal.fire({

                        title: 'Cita editada correctamente',
                        icon: 'success',
                        confirmButtonColor: '#3085d6'

                        }).then((result)=>{

                          if(result.value) {
               
                            window.location = 'citas'; 

                           }
               
                       }) 

                       </script";
               
              } 
          else {

            echo "<script>

               Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 title: 'La Cita no fue Editada',
               })


            </script>";
          }
        }
      }


    static public function ctrListarCita() {
      
      $item = "";
      $valor = "";

      $respuesta = Cita::listarCita($item, $valor);

      return $respuesta;


    }

    static public function ctrAsignarCita() {
      if (isset($_POST["idcita"])) {

            $id = $_POST["idcita"];

            $idcandidate = $_POST["UsrCita"];

            $respuesta = Cita::Asignar($id, $idcandidate);

            if ($respuesta == "ok"){

              $respuesta1 = Cita::traerAspirante($idcandidate);

              if($respuesta1) {

                date_default_timezone_set("America/Bogota");

                $mail = new PHPMailer;
  
                $mail->isMail();
  
                $mail->setFrom('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');
  
                $mail->addReplyTo('aliadosurtimaxmerkamax@gmail.com', 'Merka Max PG | Aliado Surtimax');
            
                $mail->Subject = "Cita programada a Merka Max PG | Aliado Surtimax ";
                
                $mail->addAddress($respuesta1["Mail"]);
                
                $mail->msgHTML('
                
  
                    <div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
  
                      <center>
  
                        <img  style="padding:20px; width: 15%" src="https://www.grupoexito.com.co/sites/default/files/2019-12/logo-aliado_surtimax.png" alt="">
  
                      </center>
  
                      <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
  
                        <center>
  
                          <img style="padding:20px; width:10%; " src="https://www.vippng.com/png/detail/397-3975144_sobre-png-icono-email-rojo-png.png" alt="">
  
                          <h3 style="font-weight:100; color:gray;">Estimado(a) '.$respuesta1["Name"].' '.$respuesta1["LastName"].' usted ha sido citado el día '.$respuesta1["date"].' a las '.$respuesta1["hour_start"].' hasta las '.$respuesta1["hour_end"].'. Por favor sea puntual y siga las siguientes recomendaciones: '.$respuesta1["comments"].'</h3>
                          <hr style="border:1px solid  #ccc; width:80%">
  
                        </center>
  
                      </div>
  
  
                    </div> ');
  
                    $envio = $mail->Send();
  
                    if(!$envio) {
  
                      echo "<script>
  
                      Swal.fire({
                        icon: 'error',
                        title: '¡Ha ocurrido un problema enviando la cita el correo a ".$respuesta1["Mail"].$mail->ErrorInfo."!',
                      })
     
     
                   </script>";
                      
  
                    }else {
  
                  
                    echo  " <script>

                       Swal.fire({

                       title: 'Cita Asignada Correctamente',
                       icon: 'success',
                       confirmButtonColor: '#3085d6'
                       
                       }).then((result)=>{

                         if(result.value) {
              
                           window.location = 'citas'; 

                          }
              
                      }) 

                      </script";
                      
                    }


              }else {
               
                echo "<script>

                Swal.fire({
                  icon: 'Error',
                  title: 'Oops...',
                  title: 'Ha ocurrido un error al enviar la cita al correo ".$respuesta1["Mail"]."',
                  })
        
              </script";


              }
 
    }else{

      echo "<script>

        Swal.fire({
          icon: 'Error',
          title: 'Oops...',
          title: 'No se pudo Asignar la Cita',
          })

      </script";

        }
      }
    }

    static public function ctrAjaxCita($item, $valor){

      $respuesta = Cita::listarCita($item,$valor);
      return $respuesta ;

    }
  

    static public function ctrEliminarCita(){

      if (isset($_POST["idEliminar"])) {

        $id = $_POST["idEliminar"];

          $respuesta = Cita::eliminarCita($id);


               if ($respuesta == "ok"){

                echo  " <script>

                         Swal.fire({

                         title: 'Cita emiminada correctamente',
                         icon: 'success',
                         confirmButtonColor: '#3085d6'
                         
                         }).then((result)=>{

                           if(result.value) {
                
                             window.location = 'citas'; 

                            }
                
                        }) 

                        </script";
               
                  }else{

                    echo "<script>

                      Swal.fire({
                        icon: 'Error',
                        title: 'Oops...',
                        title: 'No se pudo Eliminar la Cita',
                        })

                    </script";

                  }
    }
  }
  static public function ctrListarCitasDispo() {
    $respuesta = Cita::ListarCitasDispo();
    return $respuesta;

  }

  
}