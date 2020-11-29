<?php 

require_once "../controllers/AspiranteController.php";
require_once "../models/Aspirante.php";

class AjaxAspirante{
		
	public $codigo;

	public static function AjaxHojaVida(){

		$ID = $this->codigo;
		$respuesta = AspiranteController::HojaVida($ID);

		echo json_encode($respuesta);

	}

	public $documento;

	public function ajaxAsignarAspirante(){

	  $valor = $this->documento;

	  $respuesta = AspiranteController::ctrAsignarAspirante($valor);

	  echo json_encode($respuesta);

	}



}

if (isset($_POST["codigo"])) {

	$Mostrar = new AjaxAspirante();
	$Mostrar -> codigo = $_POST["codigo"];
	$Mostrar -> AjaxHojaVida();

}

if (isset($_POST["documento"])) {

	$Mostrar = new AjaxAspirante();
	$Mostrar -> documento = $_POST["documento"];
	$Mostrar -> ajaxAsignarAspirante();

}