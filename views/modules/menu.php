
<div class="content-wrapper">

  <section class="content-header">
    <?php //include "views/modules/chat.php"; ?>
    <h1>
      
      Inicio <i class="icon-home2"></i>
      
      <small>Panel de control</small>
    
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
     
      <li class="active">Tablero</li>
   
    </ol>
 
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box">


        <h3 class="text-center">BIENVENID@ <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"] ?></h3>


      <div class="box-body">
        
        <?php

        if ( $_SESSION["rol"] == "Administrador" ) {
          
          include "inicio/cajas-superiores.php";

        }

         ?>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">


        <?php 

        include "views/modules/inicio/editorNotas.php";
        include "views/modules/inicio/grafico-torta.php"; 
       
        if ($_SESSION["rol"] == "Administrador") {

          
          include "views/modules/inicio/grafica-torta-usuario.php"; 
          include "views/modules/inicio/grafica-barras.php"; 
          
        }

        ?>

    

      </div>


    </section>

    </div>


           


