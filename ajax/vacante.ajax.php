<?php

  require_once "../controllers/VacanteController.php";
  require_once "../models/Vacante.php";

  class ajaxVacante {

  	//Editar vacante

  	public $idVacante;

  	public function ajaxMostrarVacantes() {

  		$tabla = "vacant";

  		$item = "ID";
  		
  		$valor = $this->idVacante;

  		$respuesta = Vacante::InfoVacante($tabla, $item, $valor);

  		echo json_encode($respuesta);

  	}


    // activar e inactivar

    public $activarVacante;
    public $activarId;

    public function ajaxActivarVacante() {


      $valor1 = $this->activarVacante;

      $valor2 = $this->activarId;
       
       $respuesta = Vacante::ActivarInactivarVacante($valor1, $valor2);

    }
  }



  /*=============================================
  EDITAR VACANTE
  =============================================*/
  if(isset($_POST["idVacante"])){

    $editar = new ajaxVacante();
    $editar -> idVacante = $_POST["idVacante"];
    $editar -> ajaxMostrarVacantes();

  }


  // activar usuario 

  if(isset($_POST["activarVacante"])) {

    $activarVacante = new ajaxVacante();

    $activarVacante -> activarVacante = $_POST["activarVacante"];

    $activarVacante  -> activarId = $_POST["activarId"];

    $activarVacante -> ajaxActivarVacante();
  }
