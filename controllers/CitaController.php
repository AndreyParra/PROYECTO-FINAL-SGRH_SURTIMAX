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
            $respuesta = Cita::Asignar($id,$idcandidate);

            if ($respuesta == "ok"){

              echo  " <script>

                       Swal.fire({

                       title: 'Cita Asiganda Correctamente',
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