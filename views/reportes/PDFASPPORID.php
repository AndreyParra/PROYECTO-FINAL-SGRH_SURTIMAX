<?php

   require_once "../../controllers/AspiranteController.php";
   require_once "../../models/Reporte.php";
   require_once "ReportePDF/vendor/autoload.php";
   require_once "ReportePDF/vendor/autoload.php";


   $PdfAspiranteID = new AspiranteController();
   $PdfAspiranteID -> AspirantePorID(); 
   