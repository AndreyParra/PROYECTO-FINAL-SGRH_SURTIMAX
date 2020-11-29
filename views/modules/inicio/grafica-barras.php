<?php 

   $respuesta = UsuarioController::ctrTotalLogin();


 ?>

 <div class="col-md-6 col-xs-12">
   
     <div class="box box-danger">
               <div class="box-header with-border">
                 <h3 class="box-title"><i class="fas fa-chart-pie"></i> Número de ingresos para usuarios activos</h3>
               </div>
               <div class="box-body chart-responsive">
                 <div class="chart" id="sales-chartt" style="height: 300px; position: relative;"></div>
               </div>
               <!-- /.box-body -->
     </div>

 </div>







<script>
    
    //DONUT CHART
     var donut = new Morris.Donut({
       element: 'sales-chartt',
       resize: true,
       colors: [

         <?php 

            for ($i=0; $i < count($respuesta) ; $i++) { 

                 echo '"#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850",';


           }


           ?>


       ],

       data: [

       <?php 

       for ($i=0; $i < count($respuesta) ; $i++) { 



        echo '

  
          {label: "'.$respuesta[$i]["Name"].' '.$respuesta[$i]["LastName"].'", value:'.$respuesta[$i]["totalLogin"].'},

        '; 

       }


       ?>
        ],
       hideHover: 'auto'
     });

</script>











