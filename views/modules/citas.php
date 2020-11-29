
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <h1 class="titulo">
      
      Citas <i class="icon-event_note"></i>
      
    
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
     
      <li class="active">Administrar citas</li>
   
    </ol>
 
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
          
         <button type="button" class="btn btn-success pull-right medida" data-toggle="modal" data-target="#NuevaCita">Nueva <i class="icon-event_note"></i></button>
         

      </div>

      <div class="box-body">
        
        <div class="panel-group" id="accordion">
          <div class="panel">
            <div class="panel-heading bg-yellow">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: white;">
                 Tabla <i class="icon-plus"></i></a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
              <div class="panel-body">

                   <table id="example1" class="table table-no-margin table-striped dt-responsive tablas" width="100%">
                      
                      <thead>

                      <tr>
                         <th>#</th>
                         <th>Fecha</th>
                         <th>Hora de inicio</th>
                         <th>Hora final</th>
                         <th>Comentarios</th>
                         <th>Aspirante</th>
                         <th>Acciones</th>
                      </tr>

                       </thead>
                                
                        <tbody>

                          <?php 

                          $respuesta = CitaController::ctrListarCita();
        
                            foreach ($respuesta as $key => $value) {
                            
                            echo '
                              
                              <tr>
                                 <td>'.$value["id"].'</td>
                                 <td><label class="label-primary btn-xs ">'.$value["date"].'</label></td>
                                 <td><label class="label-success btn-xs "><i class="fa fa-clock-o"></i> '.$value["hour_start"].'</label></td>
                                 <td><label class="label-danger btn-xs "><i class="fa fa-clock-o"></i> '.$value["hour_end"].'</label></td>
                                 <td>'.$value["comments"].'</td>';
                                 if($value["Id_Asp"] == 0){

                                  echo '<td><label class="label-danger btn-xs ">Sin asignación</label></td>';

                                 } else {

                                   echo '<td><label class="label-success btn-xs ">'.$value["Name"].' '.$value["LastName"].'</label></td>';

                                 }

                                 if($value["Id_Asp"] != 0) {

                                  echo '

                                     <td class="text-center"><div class="btn-group">

                                         <button class="btn-default btn btn-xs " ><i class="icon-edit-3 text-white"></i></button>

                                       
                                         <button class="btn btn-danger btn-xs btnEliminarCita" idCita="'.$value["id"].'" data-toggle="modal" data-target="#EliminarCita"><i class="icon-trash" style="color:white;"></i></button>

                                  
                                      </div></td>

                                 </tr>';

                                 }else {
                                   
                                      echo '

                                      <td class="text-center"><div class="btn-group">

                                          <button class="btn btn-primary btn-xs  btnEditarCita" idCita="'.$value["id"].'"  data-toggle="modal" data-target="#modalEditarCita"><i class="icon-edit-3"></i></button>

                                        
                                          <button class="btn btn-danger btn-xs btnEliminarCita" idCita="'.$value["id"].'" data-toggle="modal" data-target="#EliminarCita"><i class="icon-trash" style="color:white;"></i></button>

                                  
                                      </div></td>

                                  </tr>';

                                 }
                                 

                            }
  

                           ?>

                                
                        </tbody>

                   </table>

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading bg-purple">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color: white;">
                 Calendario <i class="icon-plus"></i></a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">

                <div class="calendar" id="calendar"></div>

            </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>
</div>

<!-- REGISTRAR Cita -->

<div id="NuevaCita" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" class="validarFormulario">
    <div class="modal-dialog ">
     <div class="modal-content " style=" border-radius: 15px;">
       
       <div class="modal-header box box-success" style="background: rgb(0,141,76); color: rgba(255, 255, 255, .7); ">
         <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
         <h4 class="modal-title">Nueva Cita <i class="icon-plus"></i></h4>
       </div>
        
        <div class="modal-body">
              <div class="box-body">
               <div class="form-group validar">
                 <label for="date_c">Fecha:</label>
                <input type="date" name="date_c" class="color medida form-control" id="date_c" value="<?php echo date("Y-m-d");?>" required="">
               </div>

               <div class="form-group validar">
                 <label for= "hour">Hora Inicio:</label>
                 <input type="time" name="hour_ini" class="color medida form-control" id="hour" required="">
               </div>

               <div class="form-group validar">
                 <label for= "hour">Hora Fín:</label>
                 <input type="time" name="hour_fin" class="color medida form-control" id="hour" required>
               </div>

               <div class="form-group validar">
                 <label for="comments">Comentarios</label>
                 <input type="text" name="comments" class="color medida form-control" id="comments" required placeholder="Digíte comentarios de la entrevista">  
               </div>

             </div>
             <div class="modal-footer">
               <div class="btn-group pull-right">
                 <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

                  <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
               </div>
             </div>
        </div>
      </div>
    </div>
  </div>

  <?php 

     $cita = new CitaController();

     $cita -> ctrNuevaCita();
 
   ?>

</form>
</div>

<!-- EDITAR Cita -->

<div id="modalEditarCita" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" class="validarFormulario">
    <div class="modal-dialog ">
     <div class="modal-content " style=" border-radius: 15px;">
       
       <div class="modal-header box box-danger" style="background: rgba(215,57,37,1); color: rgba(255, 255, 255, .7);">
         <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
         <h4 class="modal-title">Editar Cita <i class="icon-edit"></i></h4>
       </div>
        
        <div class="modal-body">
              <div class="box-body">

                 <input type="hidden" name="id" id="id">


               <div class="form-group validar">
                 <label for="editardate_c">Fecha:</label>
                <input type="date" name="editardate_c" class="color medida form-control" id="editardate_c" required>
               </div>

               <div class="form-group validar">
                 <label for= "editarhour__ini">Hora Inicio:</label>
                 <input type="time" name="editarhour_ini" class="color medida form-control" id="editarhour_ini" required="">
               </div>

               <div class="form-group validar">
                 <label for= "editarhour_fin">Hora Fín:</label>
                 <input type="time" name="editarhour_fin" class="color medida form-control" id="editarhour_fin" required>
               </div>

               <div class="form-group validar">
                 <label for="comments">Comentarios</label>
                 <input type="text" name="editarcomments" class="color medida form-control" id="editarcomments" required placeholder="Digíte comentarios de la entrevista">  
               </div>

             </div>
             <div class="modal-footer">
               <div class="btn-group pull-right">
                 <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

                  <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
               </div>
             </div>
        </div>
      </div>
    </div>
  </div>

  <?php 

     $cita = new CitaController();

     $cita -> ctrEditarCita();
 
   ?> 

</form>
</div>



<div class="modal fade" id="EliminarCita">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class=" pull-right btn btn-default" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        <div class="text-center">
          <h3>¿Esta seguro que desea eliminar esta cita?</h3>
        </div>
      </div>
      <div class="modal-footer " style="margin-right:30%;">
        
        <form action="" method="post">    
            <input type="hidden" id="idEliminar" name="idEliminar">
            <button class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
            <button type="submit" class="btn btn-danger">Eliminar <i class="icon-trash"></i></button>

            <?php
               
               $eliminar = new CitaController();
               $eliminar -> ctrEliminarCita();  
            
            ?>
        </form>
  
      </div>
    </div>
  </div>
</div>


<script src="views/assets/js/templete.js"></script>



<script>
  $(function () {


    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week : 'semana',
        day  : 'día'
      },
      events    : [

      <?php 

          $respuesta = CitaController::ctrListarCita();

          $colores = array('#f56954', '#f39c12', '#0073b7', '#00c0ef', '#00a65a', '#3c8dbc');

          foreach ($respuesta as $key => $value) {
            
          echo '


          {

          id : "'.$value["id"].'",
          title: "'.$value["comments"].'",
          start: "'.$value["date_start"].'",
          end: "'.$value["date_end"].'",
          backgroundColor: "'.$colores[array_rand($colores)].'"
       
         }, ';
        
         }

       ?>

      ],

    })


  })
</script>

<script>
  
  $(document).on("click", ".btnEliminarCita", function(){

    var idCita = $(this).attr("idCita");
      
    var datos = new FormData();
    datos.append("idCita", idCita);

    $.ajax({

      url:"ajax/cita.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        
          $("#idEliminar").val(respuesta["id"]);

      }

    });

  })
</script>