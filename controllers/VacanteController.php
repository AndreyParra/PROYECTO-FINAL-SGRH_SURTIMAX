<?php

  class VacanteController {
  	
  	public static function ctrContarVacantes() {
     
     $tabla = "vacant";

     $respuesta = Vacante::contarVacantes($tabla);

     return $respuesta;

     
  	}



  	static public  function EditarVacante() {
  	      
  	  if (isset($_POST["vacantNombre"])) {

  	        $tabla = "vacant";
  	       
            $Name = $_POST["vacantNombre"];

  	        $Wage = $_POST["editarWage"];

  	        $Description = $_POST["editarDescription"];

            $ID_employee = $_SESSION["codigo"];


  	        $resultado = Vacante::Update($tabla, $Name, $Wage, $Description, $ID_employee);

  	            if ($resultado == "true") {
  	              
  	              echo "<script>

  	                 Swal.fire({
  	                   icon: 'success',
  	                   title: '¡Operación completada!',
  	                   title: 'Datos actualizados correctamente',
  	                 }).then((result)=>{

						if(result.value) {
				   
						  window.location = 'vacantes'; 
			  
						 }
				   
					   })


  	              </script>";
  	            } 
  	        else {

  	          echo "<script>

  	             Swal.fire({
  	               icon: 'error',
  	               title: 'Oops...',
  	               title: '¡Revisa el formato de los campos e intenta de nuevo!',
  	             })


  	          </script>";
  	        }
  	      }
  	}

  	  	static public  function MostrarVacantes() {

  	      $tabla = "vacant";
  	      $tabla1 = "occupation";
  	      
  	      $respuesta = Vacante::Select($tabla, $tabla1);
  	      
  	      return $respuesta;
  	    }

  	    static public  function DatosVacante($item, $valor) {

  	      $tabla = "vacant";

  	      $respuesta = Vacante::InfoVacante($tabla, $item, $valor);
  	      
  	      return $respuesta;
  	    }

  	    static public function Opciones(){
  	      $tabla = "occupation";
  	       $respuesta = Vacante::Roles($tabla);
  	       return $respuesta;
  	    }

  	    static public function MostrarLevel(){
  	      $tabla = "level";
  	       $respuesta = Vacante::Datos($tabla);
  	       return $respuesta;
  	    }

  	    static public function MostrarLanguage(){
  	      $tabla = "typelanguage";
  	       $respuesta = Vacante::Datos($tabla);
  	       return $respuesta;
  	    } 


          public static function ctrContarVacantesEstado() {
           
           $respuesta = Vacante::contarVacantesEstado();

           return $respuesta;

           
          }

  }
