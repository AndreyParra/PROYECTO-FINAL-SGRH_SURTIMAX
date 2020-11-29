<?php

   require_once "../../controllers/EmpleadoController.php";
   require_once "../../models/Empleado.php";
   require_once "ReportePDF/vendor/autoload.php";
   require_once "ReportePDF/Plantilla/PlantillaEmpES.php";


   $valor = $_GET["consulta"];
   $item = "ID";
   $respuesta = EmpleadoController::ctrBuscarEmpleado($item, $valor);




   $mpdf = new \Mpdf\Mpdf([

     

   ]);

   $plantilla = PlantillaEmpleado($respuesta);
   
   $css = file_get_contents("ReportePDF/Plantilla/empleadoEs.css");


   $mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);

   $mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);

   $mpdf->Output("Reporte.pdf", "I");

?>

