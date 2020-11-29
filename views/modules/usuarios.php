 <?php if($_SESSION["rol"] == "Administrador"){ ?>
<!-- MODAL NUEVO USUARIO  -->
<!-- Trigger the modal with a button -->

<div id="modalNuevoUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style=" border-radius: 15px;">
      
      <form method="post" enctype="multipart/form-darta" >

          <div class="modal-header box box-success" style="background: rgb(0,141,76); color: rgba(255, 255, 255, .7); ">
            <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
            <h4 class="modal-title">Nuevo Usuario <i class="icon-user-plus"></i></h4>
          </div>
      
      <div class="modal-body">
        <div class="box-body">
           


          <div class="form-group col-md-12 listar">


              

                <?php 
                
                $listarRoles = UsuarioController::ctrListarRoles();


                if(count($listarRoles) == 0){
                  
                  echo '<div role="alert" class="alert" style="background:#A4F3AD; color:#145A32; border-color: #145A32;">
                            <i class="icon-check"></i>Todos los empleados de cargos superiores son usuarios del sistema. 
                       </div>';

                     echo '<div role="alert" class="alert" style="background: #F6F8A5; color: #F1C40F; border-color:#F1C40F;">
                            <i class="icon-warning"></i> Recuerde que si desea crear un usuario nuevo primero debe registrar un nuevo empleado.
                          </div>';
                  

                }else{
                  
                  echo '

                  <select name="datosUsuario" id="my-select" class="color medida form-control">
                  <option value="sinValor">Seleccione el usuario a crear</option> ';

                }

                foreach ($listarRoles as $key => $value) {
                 
                    echo '

                    <option value="'.$value["ID"].'">'.$value["Name"]." ".$value["LastName"]." - ".$value["TypeDocument"]." " .$value["NumDocument"].'</option>';

                  }


                ?>
                 
                 </select>
                 
          </div>

          <div class="col-md-12 form-group">

          <?php if(count($listarRoles) != 0) {?>
            
            <label id="labelCorreo"></label>
            <input type="text" class="color medida form-control" name="correo" id="correo" readonly placeholder="Correo del empleado">

          <?php } ?>

          </div>

        </div>
      
      </div>
      <?php if(count($listarRoles) != 0) {?>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

           <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
        </div>
      </div>
      <?php } 

           $usuario = new UsuarioController();
           $usuario -> ctrNuevoUsuario();
       ?>
      
       </form>
    
    </div>
  </div>
</div>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      
      Usuarios <i class="icon-person_outline"></i>
      
    
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
     
      <li class="active">Administrar usuarios</li>
   
    </ol>
 
  </section>

  <section class="content">

        <!-- /.box -->

        <div class="box">
          <div class="box-header with-border">
                  <button class="medida btn btn-success pull-right" data-toggle="modal" data-target="#modalNuevoUsuario">Usuario <i class="icon-user-plus"></i></button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas" width="100%">
             
             <thead>

              <tr>
                <th width="10px">#</th>
                <th  width="50px">Nombre</th>
                <th  width="50px">Apellidos</th>
                <th  width="50px">Documento</th>
                <th width="10px">Foto</th>
                <th width="10px">Perfil</th>
                <th width="50px">Correo electrónico</th>
                 <th width="10px">Celular</th>
                <th>Estado</th>
                <th>Ultimo ingreso</th>
                <th width="10px">Género</th>
              </tr>

              </thead>
                
                <tbody>

                  <?php 
                   
                   $buscarUsuario = UsuarioController::ctrBuscarUsuario();

                   foreach ($buscarUsuario as $key => $value) {
                    

                          echo '<tr>

                            <td class="tamano">'.$value["ID"].'</td>
                            <td class="tamano">'.$value["Name"].'</td>
                            <td class="tamano">'.$value["LastName"].'</td>
                            <td class="tamano">'.$value["TypeDocument"]." " .$value["NumDocument"].'</td>

                            <td><img src="'.$value["Photo"].'"  class="img-circle" width="40px"></td>';

                            if($value["Type"] == "Administrador"){

                              echo '<td class="tamano"><label class="label-primary btn-xs ">'.$value["Type"].'</label></td>';

                            }else if($value["Type"] == "Auxiliar"){

                              echo '<td class="tamano"><label class="label-danger btn-xs ">'.$value["Type"].'</label></td>';

                            }
                            
                           
                            echo '<td class="tamano">'.$value["Mail"].'</td>
                             <td class="tamano">'.$value["Cellphone"].'</td>';

                            if ($value["Status"] == 'A') {
                              
                             echo '<td><label class="label-success btn-xs ">Activado</label></td>';

                            }else {

                             echo '<td><label class="label-danger btn-xs">Desactivado</label></td>';

                            }

                            echo '<td>'.$value["ultimoLogin"].'</td>
                            <td class="text-center tamano">'.$value["Gender"].'</td>
                            
                            </tr>';


                   }

                   ?>
                   
                </tbody>

            </table>
          </div>

        </div>

  </section>
</div>

<?php }else { ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       
        <li class="active">Página no encontrada</li>
     
      </ol>
   
    </section>

    <section class="content">
       <div class="error-page">
         <h2 class="headline text-danger">404</h2>

         <div class="error-content">
           <h1><i class="fa fa-warning text-danger"></i>
               Ooops! Página no encontrada.
           </h1>
           <h3>
             Lo sentimos, esta página no se encuentra disponible, por favor vuelve al menú principal y allí encontraras las páginas disponibles.
           </h3>
         </div>

       </div>
    </section>

  </div>
  
<?php } ?>


  


<script src="views/assets/js/templete.js"></script>

<script src="views/assets/js/usuariosSistema.js"></script>






