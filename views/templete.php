<?php 
   session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximum-scalable=1.0, minimum-scalable=1.0">
  <link rel="icon" href="views/assets/img/max.png">
  <title>Merka Max PG</title>

  <!-- DataTables -->
  <link rel="stylesheet" href="views/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="views/assets/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="views/assets/fonts/style.css">

  <!-- fullcalendar -->
  <link rel="stylesheet" href="views/assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="views/assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <?php include "modules/VistasSecundarias/rutasAdminLite.php"; ?>
</head>


  <?php

  if (isset($_SESSION["acceder"]) && $_SESSION["acceder"] == "true") {


        echo '<body class="hold-transition skin-red fixed sidebar-collapse sidebar-mini">';

        echo '<div class="wrapper">';

        include "modules/VistasSecundarias/header.php";
        
        include "modules/VistasSecundarias/menu-side.php";

      if (isset($_GET["ruta"])) {
       
        if ($_GET["ruta"]=="menu" 
            || $_GET["ruta"]=="usuarios" 
            || $_GET["ruta"]=="empleados"
            || $_GET["ruta"]=="aspirantes" 
            || $_GET["ruta"]=="vacantes" 
            || $_GET["ruta"]=="chat"
            || $_GET["ruta"]=="mensajes"
            || $_GET["ruta"]=="salir"
            || $_GET["ruta"]=="citas") {  

          
            include "modules/".$_GET["ruta"].".php";


      }else {

            include "modules/VistasSecundarias/404Usuario.php";
            
            }

      }else {
       
        include "modules/menu.php";

      }
      
      echo "</div>";


   }else if (isset($_GET["ruta"])) {

         if ($_GET["ruta"]=="inicio" 
             || $_GET["ruta"]=="convocatorias" 
             || $_GET["ruta"]=="nosotros"
             || $_GET["ruta"]=="contacto" ) {  

            echo "<body>";
                         
              include "modules/VistasSecundarias/headerPublico.php";
              include "modules/VistasSecundarias/".$_GET["ruta"].".php";

        }else {

            include "modules/VistasSecundarias/404.php";
        }
   
   }else{
      

      include "modules/VistasSecundarias/headerPublico.php";
      include "modules/VistasSecundarias/inicio.php";

   }


    
  ?>


<script src="views/assets/js/kit.fontawesome.min.js"></script>
<script type="text/javascript" src="views/assets/js/script.js"></script>
<script type="text/javascript" src="views/assets/js/jquery.min.js"></script>
<!-- DataTables -->
<script src="views/assets/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="views/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>

<!-- DataTables responsive -->
<script src="views/assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="views/assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<script src="views/assets/js/usuarios.js"></script>
<script src="views/assets/js/aspirante.js"></script>
<script src="views/assets/js/validar.js"></script>
<script src="views/assets/js/ValidarAsp.js"></script>

<!-- fullCalendar -->
<script src="views/assets/bower_components/moment/moment.js"></script>
<script src="views/assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="views/assets/bower_components/fullcalendar/dist/locale/es.js"></script>








  
</body>
</html>

















