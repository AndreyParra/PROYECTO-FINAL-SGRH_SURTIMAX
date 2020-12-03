<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php
   
   $totalAspirantes = AspiranteController::ctrAspirantesItem();


   ?>



<div class="col-md-6 col-xs-12">
   
   <div class="box box-danger">
             <div class="box-header with-border">
               <h3 class="box-title"><i class="fas fa-chart-bar"></i> total de aspirantes por estado</h3>
             </div>
             <div class="box-body chart-responsive">
                  <canvas id="myCharttt" ></canvas>
             </div>

   </div>

</div>




<script type="text/javascript">

     
        new Chart(document.getElementById("myCharttt"), {
        type: 'line',
        data: {
            labels: [
              

                <?php
                    
                foreach($totalAspirantes as $value):

                    if($value["Status"] == "C"){

                        echo "'Contratado',";

                    }else if($value["Status"] == "A"){

                        echo "'Agendado',";

                    }else if($value["Status"] == "S"){

                        echo "'sin Agendar',";

                    }else if($value["Status"] == "E"){

                        echo "'Evaluado',";

                    }else if($value["Status"] == "I"){

                        echo "'Inactivo',";
                    }
                    
                endforeach;
                    
                ?>

        
            ],
            datasets: [{ 
                data: [
                    
                    <?php
                     
                       foreach($totalAspirantes as $value):

                            echo $value["total"].",";

                       endforeach;
                        
                    ?>
            
            
                ],
                label: "total",
                borderColor: "#3e95cd",
                fill: false
            }
            ]
        },

        });
  
  </script>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>