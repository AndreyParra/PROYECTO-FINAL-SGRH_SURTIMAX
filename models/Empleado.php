<?php

require_once "Conexion.php";

  class Empleado extends Conexion {


    static public function asignarEmpleados($item, $valor){

      if ( $item == "Id") {
         
           $stmt = Conexion::conectar()->prepare("CALL SPASSIGN_EMPLOYEE(:valor)");

         }

        else if ( $item == "NumDocument") {
          
          $stmt = Conexion::conectar()->prepare("CALL SPVALIDATE_DOCUMENT(:valor)");

        }
        else if ( $item == "Mail") {
           
           $stmt = Conexion::conectar()->prepare("CALL SPVALIDATE_MAIL(:valor)");

         }
         else if ( $item == "Cellphone") {
          
          $stmt = Conexion::conectar()->prepare("CALL SPVALIDATE_CELLPHONE(:valor)");

        }

        $stmt -> bindParam(":valor" , $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }


    static public function graficarEmpleado() {

      $stmt = Conexion::conectar()->prepare("CALL SPGRAPH_ROLE()");

      $stmt -> execute();

      return $stmt -> fetchAll();

      $stmt->close();

      $stmt = null;  
    }


    // metodo para la consulta de un empleado
   
    static public function buscarEmpleado($item, $valor) {

      if ($item == "Status") {

      
          $stmt = Conexion::conectar()->prepare("CALL SPSEARCH_EMPLOYEE_STATUS()");
    

      }else if ($item == "ID") {

      
          $stmt = Conexion::conectar()->prepare("CALL SPSEARCH_EMPLOYEE_ID(:$item)");

          $stmt-> bindParam(":".$item, $valor, PDO::PARAM_STR);
    

      }else{

        $stmt = Conexion::conectar()->prepare("CALL SPSEARCH_EMPLOYEE_GENERAL()");
      

      }

      $stmt->execute();

      return $stmt -> fetchAll();

      $stmt->close();

      $stmt = null;

    }


    // metodo para generar un reporte de excel
    
    static public function buscarEmpleadoXML() {
      
      $stmt = Conexion::conectar()->prepare("CALL SPSEARCH_EMPLOYEE_STATUS()");
    
      $stmt->execute();

      return $stmt -> fetchAll();

      $stmt->close();

      $stmt = null;

    }

    // metodo para la insercion de un empleado

  	static public function nuevoEmpleado($fullname, $lastname, $tipo, $document, $direccion, $fecha, $tel, $cel, $email, $tipoGen, $tipoEst, $eps, $arl, $foto, $codigoOcupacion, $codigoEmpleado) {

  		$stmt = Conexion::conectar()->prepare("CALL SPNEW_EMPLOYEE( :fullname, :lastname, :tipo, :document, :direccion, :fecha, :tel, :cel, :email, :tipoGen, :tipoEst, :eps, :arl, :foto, :codigoOcupacion, :codigoEmpleado)");


      $stmt-> bindParam(":fullname", $fullname, PDO::PARAM_STR);
      $stmt-> bindParam(":lastname", $lastname, PDO::PARAM_STR);
      $stmt-> bindParam(":tipo", $tipo, PDO::PARAM_STR);
      $stmt-> bindParam(":document", $document, PDO::PARAM_STR);
      $stmt-> bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $stmt-> bindParam(":fecha", $fecha, PDO::PARAM_STR);
      $stmt-> bindParam(":tel", $tel, PDO::PARAM_STR);
      $stmt-> bindParam(":cel", $cel, PDO::PARAM_STR);
      $stmt-> bindParam(":email", $email, PDO::PARAM_STR);
      $stmt-> bindParam(":tipoGen", $tipoGen, PDO::PARAM_STR);
      $stmt-> bindParam(":tipoEst", $tipoEst, PDO::PARAM_STR);
      $stmt-> bindParam(":eps", $eps, PDO::PARAM_STR);
      $stmt-> bindParam(":arl", $arl, PDO::PARAM_STR);
      $stmt-> bindParam(":foto", $foto, PDO::PARAM_STR);
      $stmt-> bindParam(":codigoOcupacion", $codigoOcupacion, PDO::PARAM_STR);
      $stmt-> bindParam(":codigoEmpleado", $codigoEmpleado, PDO::PARAM_STR);

  		if($stmt->execute()){
  			
  			return "ok";
  		
  		} else{
  			
  			return "false";
  		}
  		


  		$stmt->close();

  		$stmt = null;


  	}

    static public function ActivarInactivarEmpleado($valor1, $valor2) {

          $stmt = Conexion::conectar()->prepare("CALL SPSTATUS_EMPLOYEE(:valor1, :valor2)");

          $stmt-> bindParam(":valor1", $valor1, PDO::PARAM_STR);
          $stmt-> bindParam(":valor2", $valor2, PDO::PARAM_STR);

          if($stmt->execute()){
            
            return "ok";
          
          } else{
            
            return "false";
          }
          


          $stmt->close();

          $stmt = null;



    }

    static public function contarEmpleados($valor) {

          $stmt = Conexion::conectar()->prepare("CALL SPCOUNT_EMPLOYEE(:valor)");

          $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

          $stmt->execute();

          return $stmt -> fetch();

          $stmt->close();

          $stmt = null;



    }




      static public function editarEmpleado($fullname, $lastname, $tipoDoc, $document, $address, $date, $tel, $cel, $email, $gender, $maritalStatus, $eps, $arl, $occupation, $ruta, $codigoEmpleado){

        $stmt = Conexion::conectar()->prepare("CALL SPEDIT_EMPLOYEE(:fullname, :lastname, :tipoDoc, :document, :address, :dateB, :tel, :cel, :email, :gender, :maritalstatus, :eps, :arl, :occupation, :ruta, :codigoEmpleado)");

        $stmt-> bindParam(":fullname", $fullname, PDO::PARAM_STR);
        $stmt-> bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $stmt-> bindParam(":tipoDoc", $tipoDoc, PDO::PARAM_STR);
        $stmt-> bindParam(":document", $document, PDO::PARAM_STR);
        $stmt-> bindParam(":address", $address, PDO::PARAM_STR);
        $stmt-> bindParam(":dateB", $date, PDO::PARAM_STR);
        $stmt-> bindParam(":tel", $tel, PDO::PARAM_STR);
        $stmt-> bindParam(":cel", $cel, PDO::PARAM_STR);
        $stmt-> bindParam(":email", $email, PDO::PARAM_STR);
        $stmt-> bindParam(":gender", $gender, PDO::PARAM_STR);
        $stmt-> bindParam(":maritalstatus", $maritalStatus, PDO::PARAM_STR);
        $stmt-> bindParam(":eps", $eps, PDO::PARAM_STR);
        $stmt-> bindParam(":arl", $arl, PDO::PARAM_STR);
        $stmt-> bindParam(":occupation", $occupation, PDO::PARAM_STR);
        $stmt-> bindParam(":ruta", $ruta, PDO::PARAM_STR);
        $stmt-> bindParam(":codigoEmpleado", $codigoEmpleado, PDO::PARAM_STR);

        if($stmt->execute()){

          return "ok";
        
        }else {

          return "false";

        }

        $stmt-> close(); 

        $stmt = null;

      } 

      public static function editarPerfil($idUsuario){

        $stmt = Conexion::conectar()-> prepare("CALL SPEDIT_ROLE(:valor)");

        $stmt->bindParam(":valor", $idUsuario, PDO::PARAM_STR);

        if($stmt->execute()) {

          return "ok";

        }else {
          
          return "false";
        }

        $stmt-> close();

        $stmt = null;
        
      }


      public static function contarEmpleadosInactivos() {

        $stmt = Conexion::conectar()->prepare("SELECT count(ID) as totalEmpleadosInactivos FROM Employee where Status = 'I'");

        $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt -> fetch();

        $stmt->close();

        $stmt = null;

      }


  }