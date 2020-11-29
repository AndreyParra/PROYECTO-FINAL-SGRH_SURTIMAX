<?php

  require_once "Conexion.php";

  class Vacante extends Conexion {

  	public static function contarVacantes($tabla){

  		$stmt = Conexion::conectar()-> prepare("SELECT count(ID) as totalVacantes FROM $tabla where Status = 'A'"); 

  		$stmt -> execute();

  		return $stmt -> fetch();

  		$stmt->close();

  		$stmt = null;

  	}

    public static function Insertar($tabla, $Name, $Wage, $Description, $ID){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (Name, Wage, Description, ID_Employee) 
        VALUES( :Name,:Wage,:Description,:ID)");


      $stmt-> bindParam(":Name", $Name, PDO::PARAM_STR);
      $stmt-> bindParam(":Wage", $Wage, PDO::PARAM_STR);
      $stmt-> bindParam(":Description", $Description, PDO::PARAM_STR);
      $stmt-> bindParam(":ID", $ID, PDO::PARAM_STR);

      if($stmt->execute()){
        
        return "true";
      
      } else{
        
        return "false";
      }
      
      $stmt->close();

      $stmt = null;
    } 

    public static function Select($tabla, $tabla1) {
        
      $stmt = Conexion::conectar()->prepare("SELECT $tabla.ID, $tabla.Wage, $tabla.Description, $tabla.Status, $tabla1.Type, Employee.TypeDocument, Employee.NumDocument FROM $tabla inner join $tabla1 On $tabla.NameVacant = $tabla1.ID inner join Employee on Employee.ID = Vacant.ID_Employee order By $tabla1.ID;"
      );

      $stmt->execute();

      return $stmt->fetchAll();

      $stmt->close();

      $stmt = null;

      }

      public function InfoVacante($tabla, $item, $valor) {
     
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetch();

      $stmt -> close();

      $stmt = null;

      }

      static public function Update($tabla, $Name, $Wage, $Description, $ID_employee){

      $stmt = Conexion::conectar()->prepare("UPDATE $tabla set Wage = :Wage , description = :Description, ID_employee = :ID_employee where NameVacant = :Name");

      $stmt-> bindParam(":Wage", $Wage, PDO::PARAM_STR);
      $stmt-> bindParam(":Description", $Description, PDO::PARAM_STR);
      $stmt-> bindParam(":ID_employee", $ID_employee, PDO::PARAM_STR);
      $stmt-> bindParam(":Name", $Name, PDO::PARAM_STR);

      if($stmt->execute()){
        
        return "true";
      
      } else{
        
        return "false";
      }
      
      $stmt->close();

      $stmt = null;
    } 


    public static function Roles($tabla) {
        
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla Where ID <> 1");

      $stmt->execute();

      return $stmt->fetchAll();

      $stmt->close();

      $stmt = null;

      }
      public static function Datos($tabla) {
        
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ID");

      $stmt->execute();

      return $stmt->fetchAll();

      $stmt->close();

      $stmt = null;

      }


      static public function ActivarInactivarVacante($valor1, $valor2) {

            $stmt = Conexion::conectar()->prepare("UPDATE vacant SET Status = :valor1 WHERE ID = :valor2");

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


      public static function contarVacantesEstado() {


        $stmt = Conexion::conectar()-> prepare("SELECT count(ID) as totalVacantes FROM vacant WHERE Status ='A';"); 

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt->close();

        $stmt = null;

      }



  }























  