<?php 


$usuarios = UsuarioController::ctrGraficarRoles();
$usuariosActivos = UsuarioController::ctrcontarUsuarios();


 ?>



<div class="col-md-6 col-xs-12">
  
    <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fas fa-chart-pie"></i> Distribución de usuarios activos</h3>
              </div>
              <div class="box-body chart-responsive">
                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
              </div>
              <!-- /.box-body -->
    </div>

</div>

<script>
    
    //DONUT CHART
     var donut = new Morris.Donut({
       element: 'sales-chart',
       resize: true,
       colors: ["#28B463", "#f56954"],

       data: [

       <?php 

       for ($i=0; $i < count($usuarios) ; $i++) { 



        echo '

  
          {label: "'.$usuarios[$i]["type"].'", value:'.$usuarios[$i]["total"].'},

        '; 

       }


       ?>
        ],
       hideHover: 'auto'
     });

</script>

