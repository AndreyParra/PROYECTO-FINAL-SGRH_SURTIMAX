<?php 
  
  require_once "Conexion.php";

  class Login extends Conexion {

  	static public function buscarUsuario($valor) {

  		$stmt = Conexion::conectar()->prepare("CALL SP_SIGNIN(:valor)");

  		$stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

  		$stmt->execute();

  		return $stmt -> fetch();
	
  		$stmt->close();

  		$stmt = null;

  	}

  }