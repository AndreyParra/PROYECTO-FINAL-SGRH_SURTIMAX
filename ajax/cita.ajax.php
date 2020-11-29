<?php

  require_once "../controllers/CitaController.php";
  require_once "../models/Cita.php";

  class ajaxCitas {
    
    public $idCita;

    public function ajaxEditarCita(){

      $item = "Id";

      $valor = $this->idCita;

      $respuesta = CitaController::ctrAjaxCita($item, $valor);

      echo json_encode($respuesta);

    }
   
    
  }


  /*=============================================
  EDITAR Citas
  =============================================*/
  if(isset($_POST["idCita"])){

    $editar = new ajaxCitas();
    $editar -> idCita = $_POST["idCita"];
    $editar -> ajaxEditarCita();

  }


  
