
<?php

require_once "Conexion.php";

    class Cita extends Conexion {

      static public function nuevaCita($fechaInicio, $fechaFinal, $fecha, $horaIni, $horaFin, $comentarios) {

          $stmt = Conexion::conectar()->prepare("INSERT INTO interview (date_start, date_end, date, hour_start, hour_end, comments) VALUES( :date_start, :date_end, :date, :hour_start, :hour_end, :comments)");


          $stmt-> bindParam(":date_start", $fechaInicio, PDO::PARAM_STR);
          $stmt-> bindParam(":date_end", $fechaFinal, PDO::PARAM_STR);
          $stmt-> bindParam(":date", $fecha, PDO::PARAM_STR);
          $stmt-> bindParam(":hour_start", $horaIni, PDO::PARAM_STR);
          $stmt-> bindParam(":hour_end", $horaFin, PDO::PARAM_STR);
          $stmt-> bindParam(":comments", $comentarios, PDO::PARAM_STR);
          

          if($stmt->execute()){
            
            return "ok";
          
          } else{
            
            return "false";
          }
          


          $stmt->close();

          $stmt = null;

        }

        static public function editarCita($fechaInicio, $fechaFinal, $fecha, $horaIni, $horaFin, $comentarios, $id) {

            $stmt = Conexion::conectar()->prepare("UPDATE interview SET date_start = :date_start, date_end = :date_end, date = :date, hour_start = :hour_start, hour_end = :hour_end, comments = :comments WHERE id = :id");


            $stmt-> bindParam(":date_start", $fechaInicio, PDO::PARAM_STR);
            $stmt-> bindParam(":date_end", $fechaFinal, PDO::PARAM_STR);
            $stmt-> bindParam(":date", $fecha, PDO::PARAM_STR);
            $stmt-> bindParam(":hour_start", $horaIni, PDO::PARAM_STR);
            $stmt-> bindParam(":hour_end", $horaFin, PDO::PARAM_STR);
            $stmt-> bindParam(":comments", $comentarios, PDO::PARAM_STR);
            $stmt-> bindParam(":id", $id, PDO::PARAM_INT);

            if($stmt->execute()){
              
              return "ok";
            
            } else{
              
              return "false";
            }
            
            $stmt->close();

            $stmt = null;

          }


       public static function listarCita($item, $valor) {


        if ($item == "Id") { 
            
              $stmt = Conexion::conectar()->prepare("SELECT * FROM interview  WHERE id = :valor ");

              $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

              $stmt-> execute();

              return $stmt-> fetch();
            
          
        }else{
                  
              $stmt = Conexion::conectar()->prepare("SELECT * FROM interview inner join candidate on interview.Id_Asp = candidate.NumDocument");      

              $stmt-> execute();

              return $stmt-> fetchAll();    
        }
        

         $stmt->close();

         $stmt = null;



       }


    static public function eliminarCita($id){

      $stmt = Conexion::conectar()->prepare("DELETE FROM interview WHERE id = :id");

      $stmt-> bindParam(":id", $id, PDO::PARAM_STR);

      
      if ($stmt->execute()){

        return "ok";

      }else{

        return "false";
      }
      

      $stmt->close();

      $stmt = null;
    }
  

  static public function Asignar($id,$idcandidate){

    $stmt = Conexion::conectar()->prepare("UPDATE `interview` SET Id_Asp = :idcandidate , status = 1 WHERE id = :id");

    $stmt-> bindParam(":id", $id, PDO::PARAM_STR);
    $stmt-> bindParam(":idcandidate", $idcandidate, PDO::PARAM_STR);

    
    if ($stmt->execute()){

      return "ok";

    }else{

      return "false";
    }
    

    $stmt->close();

    $stmt = null;
  }

  public static function traerAspirante($idcandidate) {

    $stmt = Conexion::conectar()->prepare("SELECT candidate.Name, candidate.LastName, interview.date, interview.hour_start, interview.hour_end, interview.comments, candidate.Mail FROM candidate INNER JOIN interview ON candidate.NumDocument = interview.Id_Asp WHERE candidate.NumDocument = :idcandidate");

    $stmt->bindParam(":idcandidate", $idcandidate, PDO::PARAM_STR);

    $stmt->execute();
  
    return $stmt->fetch();
    
    $stmt->close();
   
    $stmt = null;

  }


    static public function ListarCitasDispo(){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM interview WHERE status = 0");
    
    $stmt-> execute();

    return $stmt-> fetchAll();
 
    $stmt->close();
   
    $stmt = null;

    
  }



  public static function contarCitaAsignada() {

    $stmt = Conexion::conectar()->prepare("SELECT count(ID) as totalAsignadas FROM interview WHERE id_Asp <> 0");
    
    $stmt->execute();
  
    return $stmt->fetch();
    
    $stmt->close();
   
    $stmt = null;
  }

}

  