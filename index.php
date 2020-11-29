<?php 
  
  require_once 'controllers/TempleteController.php'; //ruta de Templete controlador
  require_once 'controllers/AspiranteController.php'; //ruta de Aspirante controlador
  require_once 'controllers/ConvocatoriaController.php'; //ruta de Convocatoria controlador
  require_once 'controllers/EmpleadoController.php'; //ruta de Empleado controlador
  require_once 'controllers/LoginController.php'; //ruta de Usuario controlador
  require_once 'controllers/VacanteController.php'; //ruta de Vacante controlador
  require_once 'controllers/UsuarioController.php';
  require_once 'controllers/CitaController.php';
  require_once 'controllers/EvaluacionController.php';

  require_once 'models/Aspirante.php'; //ruta de Aspirante modelo
  require_once 'models/Convocatoria.php'; //ruta de Convocatoriamodelo 
  require_once 'models/Empleado.php'; //ruta de Empleado modelo
  require_once 'models/Login.php'; //ruta de Usuario modelo
  require_once 'models/Usuario.php';
  require_once 'models/Vacante.php'; //ruta de Vacante modelo
  require_once 'models/Cita.php';

  
  $templete = new TempleteController(); //creamos la instancia a la clase Templete controller para acceder a sus metodos

  $templete -> ctrTemplete();//llamamos este método para que nos traiga la vista templete
