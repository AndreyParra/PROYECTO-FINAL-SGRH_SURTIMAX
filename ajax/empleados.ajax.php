<?php

  require_once "../controllers/EmpleadoController.php";
  require_once "../models/Empleado.php";

  class ajaxEmpleados {
    // editar usuario

    /*=============================================
    EDITAR USUARIO
    =============================================*/ 

    public $idUsuario;

    public function ajaxEditarEmpleado(){

      $item = "Id";

      $valor = $this->idUsuario;

      $respuesta = EmpleadoController::ctrAsignarEmpleados($item, $valor);

      echo json_encode($respuesta);

    }
    // activar e inactivar

    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario() {


    	$valor1 = $this->activarUsuario;

    	$valor2 = $this->activarId;
       
       $respuesta = Empleado::ActivarInactivarEmpleado($valor1, $valor2);

    }

    /*=============================================
    VALIDAR DUPLICIDAD
    =============================================*/

    public $validarDocumento;

    public function ajaxValidarUsuarioDocumento() {

      $item = "NumDocument";
      $valor = $this->validarDocumento;

      $respuesta = EmpleadoController::ctrAsignarEmpleados($item, $valor);

      echo json_encode($respuesta);

    }

    public $validarCorreo;

    public function ajaxValidarCorreo() {

      $item = "Mail";
      $valor = $this->validarCorreo;

      $respuesta = EmpleadoController::ctrAsignarEmpleados($item, $valor);

      echo json_encode($respuesta);

    }

      public $validarCelular;

      public function ajaxValidarCelular() {

             $item = "Cellphone";

             $valor = $this->validarCelular;

             $respuesta = EmpleadoController::ctrAsignarEmpleados($item, $valor);

             echo json_encode($respuesta);

      }

    

  }






  /*=============================================
  EDITAR USUARIO
  =============================================*/
  if(isset($_POST["idUsuario"])){

    $editar = new ajaxEmpleados();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarEmpleado();

  }


// activar usuario 

if(isset($_POST["activarUsuario"])) {

	$activarUsuario = new ajaxEmpleados();

	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];

	$activarUsuario  -> activarId = $_POST["activarId"];

	$activarUsuario -> ajaxActivarUsuario();
}

//validar usuario 

if (isset($_POST["validarUsuario"])) {
  
  $valUsuario = new ajaxEmpleados();

  $valUsuario -> validarDocumento = $_POST["validarUsuario"];

  $valUsuario -> ajaxValidarUsuarioDocumento();
}

if (isset($_POST["validarCorreo"])) {
  
  $valUsuario = new ajaxEmpleados();

  $valUsuario -> validarCorreo = $_POST["validarCorreo"];

  $valUsuario -> ajaxValidarCorreo();
}

if (isset($_POST["validarCelular"])) {
  
  $valUsuario = new ajaxEmpleados();

  $valUsuario -> validarCelular = $_POST["validarCelular"];

  $valUsuario -> ajaxValidarCelular();
}