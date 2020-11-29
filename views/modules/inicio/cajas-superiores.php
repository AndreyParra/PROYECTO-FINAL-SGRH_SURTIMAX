<?php 
  
   $empleadosActivos = EmpleadoController::ctrContarEmpleados();


   $usuariosActivos = UsuarioController::ctrcontarUsuarios();

   $aspirantesRegistrados = AspiranteController::ctrContarAspirantes();

   $contarVacantes = VacanteController::ctrContarVacantes();

 ?>



<div class="col-lg-3 col-xs-6 ">
  <!-- small box -->
  <div class="small-box cajaRoja borde">
    <div class="inner">
      <h3><?php echo $empleadosActivos["empActivos"] ?></h3>

      <h4>Empleados Activos</h4>
    </div>
    <div class="icon">
      <i class="icon-users"></i>
    </div>
    <a href="empleados" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box cajaAmarilla borde">
    <div class="inner">
      <h3><?php echo $usuariosActivos["usuActivos"] ?></h3>

      <h4>Usuarios Activos</h4>
    </div>
    <div class="icon">
       <i class="icon-user-check"></i>
    </div>
    <a href="usuarios" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box cajaVerde borde">
    <div class="inner">
      <h3><?php echo $aspirantesRegistrados["totalAspirantes"] ?></h3>

      <h4>Aspirantes registrados</h4>
    </div>
    <div class="icon">
      <i class="icon-folder2"></i>
    </div>
    <a href="aspirantes" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box cajaPurpura borde">
    <div class="inner">
      <h3><?php echo $contarVacantes["totalVacantes"] ?></h3>

      <h4>Total de vacantes</h4>
    </div>
    <div class="icon">
      <i class="icon-file-plus"></i>
    </div>
    <a href="vacantes" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>











  
</div>