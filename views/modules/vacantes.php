<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Vacantes <i class="icon-documents"></i></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Vacantes</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">

     <!--  <div class="box-header with-border">
        <button class="medida btn btn-success pull-right" data-toggle="modal" data-target="#modalVacante"> Vacante <i class="fas fa-plus"></i></button>
      </div> -->
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
                         <th>Nombre</th>
                         <th>Salario</th>
                         <th>Descripción</th>
                         <th>Registrado por:</th>
                         <th>Editar</th>
                         <th>Estado</th>
    
                      </tr>

                       </thead>
                                
                        <tbody>

                          <?php 

                          $Vacantes = VacanteController::MostrarVacantes();
        
                            foreach ($Vacantes as $value) {
                            
                            echo '

                            <tr>

                            <td>'.$value["ID"].'</td>';

                            if ($value["Type"] == "Auxiliar") {
                              
                              echo '<td><label class="btn-xs label-danger">'.$value["Type"].' <i class="icon-user-plus"></i></label></td>';

                            }else if($value["Type"] == "Cajero") {

                              echo '<td><label class="btn-xs label-warning">'.$value["Type"].' <i class="icon-shopping-cart1"></i></td></label>';

                            }else if($value["Type"] == "Bodeguista") {

                              echo '<td><label class="btn-xs bg-purple">'.$value["Type"].' <i class="icon-box"></i></label></td>';

                            }else if($value["Type"] == "Domiciliario") {

                              echo '<td><label class="btn-xs label-success">'.$value["Type"].' <i class="icon-map-pin"></i></label></td>';

                            }else if($value["Type"] == "Administrador") {

                              echo '<td><label class="btn-xs label-primary">'.$value["Type"].' <i class="icon-map-pin"></i></label></td>';
                            }else {

                              echo '<td><label class="btn-xs label-info">'.$value["Type"].' <i class="icon-map-pin"></i></label></td>';
                            }

                            

                            
                            echo '

                            <td>'.$value["Wage"].' $</td>
                            <td>'.$value["Description"].'</td>
                            <td><label class="btn-xs bg-info">'.$value["TypeDocument"].' '.$value["NumDocument"].'</label></td>

                            <td><button class="btn-xs btn-primary btnMostrarVacante" data-toggle="modal"data-target="#EditarVacante" idVacante="'.$value["ID"].'"><i class="icon-edit-3"></i></button></td>';
                            
                            if ($value["Status"] == 'A') {
                              
                              echo '<td><label class="btn btn-success btn-xs btnActivarVacante" idVacante="'.$value["ID"].'" estadoVacante="I">Activado <i class="icon-check"></i></label></td>';

                            }else {

                              echo '<td><label class="btn btn-danger btn-xs btnActivarVacante" idVacante="'.$value["ID"].'" estadoVacante="A">Desactivado <i class="icon-x"></i></label></td>';

                            }

                            echo '


                            </tr>
                              
                              ';

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
                 Previsualizar vacantes <i class="icon-plus"></i></a>
              </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">

                <div class="row">
                  <?php 
                  $TraerVacante = VacanteController::MostrarVacantes();


                    foreach ($TraerVacante as $key => $value) {   

                    if ($value["Type"] == "Cajero") {

                      echo '

                      <div class="col-lg-3 col-xs-6">

                        <div class="small-box cajaAmarilla borde">
                          <div class="inner">
                            <h2><b>'.$value["Type"].'</b></h2>

                            <label>Salario: '.$value["Wage"].' $</label>
                            <br>

                            <em><b>Descripción:</b> '.$value["Description"].' </em>

                          </div>
                          <div class="icon">
                            <i class="icon-shopping-cart1"></i>
                          </div>
                          <a href="#" class="small-box-footer btnMostrarVacante" data-toggle="modal"data-target="#EditarVacante" idVacante="'.$value["ID"].'">Editar <i class="icon-edit-3"></i></a>
                        </div>
                      </div>';
                      
                     }else if ($value["Type"] == "Auxiliar") {

                      echo '

                      <div class="col-lg-3 col-xs-6">

                        <div class="small-box cajaRoja borde">
                          <div class="inner">
                            <h2><b>'.$value["Type"].'</b></h2>

                            <label>Salario: '.$value["Wage"].' $</label>
                            <br>

                            <em><b>Descripción:</b> '.$value["Description"].' </em>
                          </div>
                          <div class="icon">
                            <i class="icon-user-plus"></i>
                          </div>
                          <a href="#" class="small-box-footer btnMostrarVacante" data-toggle="modal"data-target="#EditarVacante" idVacante="'.$value["ID"].'">Editar <i class="icon-edit-3"></i></a>
                        </div>
                      </div>';
                      
                     }else  if ($value["Type"] == "Domiciliario") {

                      echo '

                      <div class="col-lg-3 col-xs-6">

                        <div class="small-box cajaVerde borde">
                          <div class="inner">
                            <h2><b>'.$value["Type"].'</b></h2>

                            <label>Salario: '.$value["Wage"].' $</label>
                            <br>

                            <em><b>Descripción:</b> '.$value["Description"].' </em>
                          </div>
                          <div class="icon">
                            <i class="icon-map-pin"></i>
                          </div>
                          <a href="#" class="small-box-footer btnMostrarVacante" data-toggle="modal"data-target="#EditarVacante" idVacante="'.$value["ID"].'">Editar <i class="icon-edit-3"></i></a>
                        </div>
                      </div>';
                      
                     } else  if ($value["Type"] == "Bodeguista") {

                      echo '

                      <div class="col-lg-3 col-xs-6">

                        <div class="small-box cajaPurpura borde">
                          <div class="inner">
                            <h2><b>'.$value["Type"].'</b></h2>

                            <label>Salario: '.$value["Wage"].' $</label>

                            <br>

                            <em><b>Descripción:</b> '.$value["Description"].' </em>
                          </div>
                          <div class="icon">
                            <i class="icon-box"></i>
                          </div>
                          <a href="#" class="small-box-footer btnMostrarVacante" data-toggle="modal"data-target="#EditarVacante" idVacante="'.$value["ID"].'">Editar <i class="icon-edit-3"></i></a>
                        </div>
                      </div>';
                      
                     }

                    }
                   ?>

                </div>

            </div>
            </div>
          </div>

        </div>


        
      </div>
    </div>
  </section>
</div>
<div>  
</div>


<!-- EDITAR VACANTE -->

<div id="EditarVacante" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" id="formulario">
    <div class="modal-dialog ">
      <div class="modal-content " style=" border-radius: 15px;">

        <div class="modal-header box box-danger" style="background: rgba(215,57,37,1); color: rgba(255, 255, 255, .7);">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Editar Vacante <i class="icon-edit"></i></h4>
        </div>

        <div class="modal-body">
          <div class="container-fluid text-left">
              <div class="box-body">

                    <input type="hidden" id="editarVacant" name="vacantNombre">

                  <div class="form-group validar" style="padding-left:0">
                    <label for="editarWage"  class="colLabel">Salario<span class="text-danger">*</span></label>
                    <input type="text" class="formulario__input" name="editarWage" id="editarWage" placeholder="Digíte el salario">
                  </div>

                  <div class="form-group">
                    <label for="Description">Descripción</label>
                    <textarea class="color medida form-control" id="editarDescription" name="editarDescription" value="" ></textarea>
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

      $EditarVacante = new VacanteController();  
      $EditarVacante -> EditarVacante();      

     ?>
</form>
</div>






<script src="views/assets/js/templete.js"></script>

<script src="views/assets/js/usuariosSistema.js"></script>





