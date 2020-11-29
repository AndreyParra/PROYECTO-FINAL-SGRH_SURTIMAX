<?php

   require_once "../../controllers/EmpleadoController.php";
   require_once "../../models/Empleado.php";


   $reporteEmpleado = new EmpleadoController();

   $reporteEmpleado -> ctrNuevoReporteXml(); 


   