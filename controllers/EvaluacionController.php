<?php


class EvaluacionController
{
    static public  function Evaluar()
	{
		if (isset($_POST["Flexibilidad"])) {

            $F = $_POST["Flexibilidad"];
            $C = $_POST["Creatividad"];
            $O = $_POST["Organizacion"];
            $E = $_POST["Equipo"];
            $P = $_POST["Proactividad"]; 

            $Resultado = ($F+$C+$O+$E+$P)/5;

            $IdCandidate = $_POST["UsrEvaluar"];

            $Commen = $_POST["Comments"];
            
            var_dump($IdCandidate,$Resultado,$Commen);

            $respuesta = Evaluacion::Insertar($Resultado,$Commen,$IdCandidate);

            var_dump($respuesta);

            if ($respuesta == true) {
  			    	
                echo "<script>

                   Swal.fire({
                     icon: 'success',
                     title: '¡Operación completada!',
                     title: 'Datos almacenados correctamente',
                     title: 'Su Resultado Fue ".$Resultado."Sobre 5',
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

}