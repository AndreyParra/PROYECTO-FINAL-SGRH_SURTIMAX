<?php 

require_once "Conexion.php";

class Convocatoria extends Conexion {

 public static function Contar($Conv){

  		$stmt = Conexion::conectar()-> prepare("SELECT ID FROM $Conv order by Asc limit 1"); 

  		$stmt -> execute();

  		return $stmt -> fetch();

  		$stmt->close();

  		$stmt = null;

  	}


  public static function Mostrar($Conv){
 	
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $Conv");

      $stmt->execute();

     	return $stmt->fetchAll();

     	$stmt->close();

      	$stmt = null;

  		}



       public static function MostrarConvocatoria($valor){
        
          $stmt = Conexion::conectar()->prepare("SELECT * FROM occupation INNER JOIN vacant ON occupation.ID = vacant.NameVacant INNER JOIN details_announcement ON vacant.ID = details_announcement.ID_vacant WHERE ID = :valor");

          $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);

          $stmt->execute();

          return $stmt->fetch();

          $stmt->close();

          $stmt = null;

          }


  	}