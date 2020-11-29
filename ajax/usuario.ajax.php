<?php

  require_once "../controllers/UsuarioController.php";
  require_once "../models/Usuario.php";

  class ajaxUsuarios {


    public $conActual;
    public $codigoEmpleado;

    public function ajaxPreguntarClave() {
  
      $clave = $this->conActual;

      $codigo = $this->codigoEmpleado;

      $respuesta = UsuarioController::ctrPreguntarClave($clave, $codigo);

      echo json_encode($respuesta);

    }

  }



if (isset($_POST["claveActual"])) {
  
  $valUsuario = new ajaxUsuarios();

  $valUsuario -> conActual = $_POST["claveActual"];

  $valUsuario -> codigoEmpleado = $_POST["codigoEmp"];

  $valUsuario -> ajaxPreguntarClave();
}