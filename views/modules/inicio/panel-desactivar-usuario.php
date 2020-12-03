<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php
   
   $totalAspirantes = AspiranteController::ctrAspirantesCargo();


   ?>



<div class="col-md-6 col-xs-12">
   
   <div class="box box-danger">
             <div class="box-header with-border">
               <h3 class="box-title"><i class="fas fa-chart-bar"></i> Preferencias de los aspirantes por cargo</h3>
             </div>
             <div class="box-body chart-responsive">
                  <canvas id="myChart" ></canvas>
             </div>

   </div>

</div>




<script type="text/javascript">
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
      type: 'bar',
         data: {
            labels: [
                
                
               <?php
                
                foreach($totalAspirantes as $value) {

                     echo '"'.$value["cargo"].'",';
                }
                
            ?>
        
        
             ],
            datasets: [
               { label: 'cargo',
               data: [

                <?php
                
                foreach($totalAspirantes as $value) {

                     echo $value["total"].",";
                }
                
                ?>

            
               ],
               backgroundColor :[
               '#d73925',
               '#008d4c',
               '#f39c12',
               '#8e5ea2',
            ],
         }
      ]
   },
   options: {
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero:true
            }
         }]
      }
   }
});
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>