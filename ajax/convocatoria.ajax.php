<?php

  require_once "../controllers/ConvocatoriaController.php";
  require_once "../models/Convocatoria.php";

  class ajaxConvocatoria {


    /*=============================================
    EDITAR CONVOVATORIA
    =============================================*/ 

    public $idConvocatoria;

    public function ajaxEditarConvocatoria(){

      $valor = $this->idConvocatoria;

      $respuesta = ConvocatoriaController::MostrarConvocatoriaID($valor);

      echo json_encode($respuesta);

    }

  }






  /*=============================================
  EDITAR CONVOCATORIA
  =============================================*/
  if(isset($_POST["idConvocatoria"])){

    $editar = new ajaxConvocatoria();
    $editar -> idConvocatoria = $_POST["idConvocatoria"];
    $editar -> ajaxEditarConvocatoria();

  }


