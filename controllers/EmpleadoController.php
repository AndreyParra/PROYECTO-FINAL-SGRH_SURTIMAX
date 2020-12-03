<?php

  class EmpleadoController {



    public static function ctrBuscarEmpleado($item, $valor) {
      
      $respuesta = Empleado::buscarEmpleado($item, $valor);
      
      return $respuesta;
    }

    static public function ctrGraficarEmpleado() {


      $respuesta = Empleado::graficarEmpleado();

      return $respuesta;

    }

  	
  	static public function ctrNuevoEmpleado() {

  		if (isset($_POST["fullname"])) {
  			
  			// if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["fullname"])
  			//    && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["lastname"])
  			//    && preg_match('/^[a-zA-Z ]+$/', $_POST["tipo"]) &&
  		 //       preg_match('/^[0-9]+$/', $_POST["document"]) && preg_match('/^[0-9]+$/', $_POST["tel"]) && 
  			//    preg_match('/^[0-9]+$/', $_POST["cel"]) && preg_match('/^[a-zA-Z0-9.@ ]+$/', $_POST["email"]) &&
  			//    preg_match('/^[A-Z]+$/', $_POST["tipoGen"]) && preg_match('/^[A-Z ]+$/', $_POST["tipoEst"]) &&
  			//    preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["eps"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["arl"])) {

            $ruta="";
            if(isset($_FILES["nuevaFoto"]["tmp_name"])){

              list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

              $nuevoAncho = 500;
              $nuevoAlto = 500;

              /*=============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
              =============================================*/

              $directorio = "views/assets/img/usuarios/".$_POST["document"];

              mkdir($directorio, 0755);

              /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

              if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["document"]."/".$aleatorio.".jpg";

                $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);            

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);

              }

              if($_FILES["nuevaFoto"]["type"] == "image/png"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["document"]."/".$aleatorio.".png";

                $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);           

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);

              }

            }


                     $fullname =  strtoupper($_POST["fullname"]);
                     $lastname =  strtoupper($_POST["lastname"]);
                     $tipo = $_POST["tipo"];
                     $document = $_POST["document"];
                     $direccion = strtoupper($_POST["direccion"]);
                     $fecha = $_POST["fecha"]; 
                     $tel = $_POST["tel"];
                     $cel = $_POST["cel"]; 
                     $email = $_POST["email"];
                     $tipoGen = $_POST["tipoGen"];
                     $tipoEst = $_POST["tipoEst"];
                     $eps =  strtoupper($_POST["eps"]); 
                     $arl =  strtoupper($_POST["arl"]);
                     $codigoOcupacion = $_POST["codigoOcupacion"];
                     $codigoEmpleado = $_SESSION["codigo"];

  			    $respuesta = Empleado::nuevoEmpleado($fullname, $lastname, $tipo, $document, $direccion, 
                                                 $fecha, $tel, $cel, $email, $tipoGen, $tipoEst, $eps, $arl, 
                                                 $ruta, $codigoOcupacion, $codigoEmpleado);
           
  			    if ($respuesta == "ok") {
  			    	
  			    	echo "<script>

  			    	   Swal.fire({
  			    	     icon: 'success',
  			    	     title: '¡Operación completada!',
  			    	     title: 'Datos almacenados correctamente',
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

    // suma total empleados
    static public function ctrContarEmpleados() {

      $valor = "A";
      
      $respuesta = Empleado::contarEmpleados($valor);
      
      return $respuesta;
    }


    public static function ctrContarEmpleadosInactivos() {

      $respuesta = Empleado::contarEmpleadosInactivos();

      return $respuesta;
      
    }


    static public function ctrAsignarEmpleados($item, $valor){

     $respuesta = Empleado::asignarEmpleados($item, $valor);

     return $respuesta;
    }

    //FUNCION PARA IMPRIMIR UN NUEVO REPORTE

    static public function ctrNuevoReporteXml() {

      if (isset($_GET["reporte"])) {


        $empleado = Empleado::buscarEmpleadoXML();

        $nombre = $_GET["reporte"].'.xls';

        //CREAMOS EL ARCHIVO DE EXCEL

        header('Expires: 0');
        header('Cache-control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Cache-Control: cache, must-revalidate');
        header('Content-Description: File transfer');
        header('Last-Modified: '.date('D, d M Y H:i:s'));
        header("Pragma: public");
        header('Content-Disposition:; filename="'.$nombre.'"');
        header("Content-Transfer-Encoding: binary");

        echo utf8_decode("<table border='0'> 

          <tr>
              <td colspan='16' align='center' bgcolor='#D5D8DC' style='font-weight:bold; border:5px solid #eee'><h2>REPORTE DE EMPLEADOS ACTIVOS</h2></td>
          </tr>
             
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>CODIGO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>NOMBRE</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>APELLIDOS</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>TIPO DE DOCUMENTO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>NUM. DOCUMENTO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>FECHA DE NACIMIENTO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>CELULAR</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>TELEFONO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>DIRECCION</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>CORREO ELECTRONICO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>CARGO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>FECHA DE REGISTRO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>GENERO</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>ESTADO CIVIL</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>EPS</h3></td>
             <td style='font-weight:bold; border:5px solid #eee' align='center'><h3>ARL</h3></td>");

        foreach ($empleado as $key => $value) {
          
              echo utf8_decode("<tr>

                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["ID"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee'>".$value["Name"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["LastName"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["TypeDocument"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["NumDocument"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Birthdate"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["cellphone"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Phone"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Address"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Mail"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Type"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Admissiondate"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Gender"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Maritalstatus"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Eps"]."</td>
                  <td style='font-weight:bold; border:5px solid #eee' align='center'>".$value["Arl"]."</td>










                </tr>");
        }

        
          echo "</table>";
         
     
      }

    }

    public static function ctrEditarEmpleado(){

      if (isset($_POST["editarFullname"])) {

        //editar Foto

        $ruta = $_POST["fotoActual"];

        if(isset($_FILES["editarnuevaFoto"]["tmp_name"]) && !empty($_FILES["editarnuevaFoto"]["tmp_name"])){

          list($ancho, $alto) = getimagesize($_FILES["editarnuevaFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/

          $directorio = "views/assets/img/usuarios/".$_POST["editarDocument"];

          //primero preguntamos si existe una imagen en la base de datos

          if(!empty($_POST["fotoActual"])){

            unlink($_POST["fotoActual"]);


          }else {

            mkdir($directorio, 0755);

          }

        

          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

          if($_FILES["editarnuevaFoto"]["type"] == "image/jpeg"){

            /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            =============================================*/

            $aleatorio = mt_rand(100,999);

            $ruta = "views/assets/img/usuarios/".$_POST["editarDocument"]."/".$aleatorio.".jpg";

            $origen = imagecreatefromjpeg($_FILES["editarnuevaFoto"]["tmp_name"]);            

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagejpeg($destino, $ruta);

          }

          if($_FILES["editarnuevaFoto"]["type"] == "image/png"){

            /*=============================================
            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
            =============================================*/

            $aleatorio = mt_rand(100,999);

            $ruta = "views/assets/img/usuarios/".$_POST["editarDocument"]."/".$aleatorio.".png";

            $origen = imagecreatefrompng($_FILES["editarnuevaFoto"]["tmp_name"]);           

            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            imagepng($destino, $ruta);

          }

        }





        $fullname = strtoupper($_POST["editarFullname"]);
        $lastname = strtoupper($_POST["editarLastname"]);
        $tipoDoc = $_POST["editarTipo"];
        $document = $_POST["editarDocument"];
        $address = strtoupper($_POST["editarDireccion"]);
        $date = $_POST["editarFecha"];
        $tel = $_POST["editarTel"];
        $cel = $_POST["editarCel"];
        $email = $_POST["editarEmail"];
        $gender = $_POST["editarTipoGen"];
        $maritalStatus = $_POST["editarTipoEst"];
        $eps = strtoupper($_POST["editarEps"]);
        $arl = strtoupper($_POST["editarArl"]);
        $occupation = $_POST["editarCodigoOcupacion"];
        $codigoEmpleado = $_SESSION["codigo"];

       $respuesta = Empleado::editarEmpleado($fullname, $lastname, $tipoDoc, $document, $address, $date, $tel, $cel, $email, $gender, $maritalStatus, $eps, $arl, $occupation, $ruta, $codigoEmpleado);


          if ($respuesta == "ok") {
                
                echo "<script>

                   Swal.fire({
                     icon: 'success',
                     title: '¡Operación completada!',
                     title: 'Datos actualizados correctamente',
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