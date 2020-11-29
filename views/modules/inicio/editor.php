

<div class="col-md-6 col-xs-12">
  
    <!-- Bar chart -->
    <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body">
                <canvas id="densityChart" width="600" height="400"></canvas>
            </div>
            <!-- /.box-body-->
    </div>
          <!-- /.box -->

</div>


<script>
        var densityCanvas = document.getElementById("densityChart");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var densityData = {
        label: 'Density of Planets (kg/m3)',
        data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638]
        };

        var barChart = new Chart(densityCanvas, {
        type: 'bar',
        data: {
            labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"],
            datasets: [densityData]
        }
        });
</script>




