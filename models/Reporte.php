<?php 

require_once "Conexion.php";

class Reporte extends Conexion {

  public static function Resultado($C){
 	
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $C INNER join vacant ON vacant.ID = candidate.Id_Vacant INNER join occupation ON vacant.NameVacant = occupation.ID");

      	$stmt->execute();

     	return $stmt->fetchAll();

     	$stmt->close();

      	$stmt = null;

  		}

   public static function ResultadoEspecifico($C,$Vacante){

  		$stmt = Conexion::conectar()->prepare("SELECT * FROM $C INNER join vacant ON vacant.ID = candidate.Id_Vacant INNER join occupation ON vacant.NameVacant = occupation.ID WHERE ID_Vacant = $Vacante");

      	$stmt->execute();

     	return $stmt->fetchAll();

     	$stmt->close();

      	$stmt = null;

		  }

		  public static function ResultadoEspecificoEstado($C,$Estado){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $C INNER join vacant ON vacant.ID = candidate.Id_Vacant INNER join occupation ON vacant.NameVacant = occupation.ID WHERE Status = '$Estado'");
  
			$stmt->execute();
  
		   return $stmt->fetchAll();
  
		   $stmt->close();
  
			$stmt = null;
  
			}
		  
	public static function Academico ($D){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM academic_training INNER JOIN level on level.ID = academic_training.ID_Level WHERE ID_Candidate = $D");
  
		$stmt->execute();  
		
		return $stmt->fetchAll();

	   $stmt->close();
  
	   $stmt = null;


	}
	public static function Experiencia ($D){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM work_experience WHERE ID_Candidate = $D");
  
		$stmt->execute();  
		
		return $stmt->fetchAll();

	   $stmt->close();
  
	   $stmt = null;


	}
	public static function Idiomas ($D){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM LANGUAGE INNER join typelanguage ON language.ID_Type = typelanguage.ID where language.ID_Candidate = $D");
  
		$stmt->execute();  
		
		return $stmt->fetchAll();

	   $stmt->close();
  
	   $stmt = null;


	}
	public static function Referencias ($D){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM personal_references WHERE ID_Candidate = $D");
  
		$stmt->execute();  
		
		return $stmt->fetchAll();

	   $stmt->close();
  
	   $stmt = null;


	}
	public static function Informacion ($D){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM Candidate WHERE NumDocument = $D");
  
		$stmt->execute();  
		
		return $stmt->fetchAll();

	   $stmt->close();
  
	   $stmt = null;


	}

 }
 