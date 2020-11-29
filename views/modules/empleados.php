

 <!-- MODAL NUEVO USUARIO  -->
  <!-- Trigger the modal with a button -->

  <div id="modalNuevoUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content " style=" border-radius: 15px;">

      <form method="post"  enctype="multipart/form-data" class="validarFormulario">

       <div class="modal-header box box-success" style="background: rgb(0,141,76); color: rgba(255, 255, 255, .7); ">
         <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
         <h4 class="modal-title">Nuevo Empleado <i class="icon-user-plus"></i></h4>
       </div>
        
  
        <div class="modal-body">
          <div class="box-body">

            <div class="form-row">
                <div class="form-group col-md-4 validar">
                  <label for="fullname"  class="colLabel">Nombre(s)<span class="text-danger">*</span></label>
                  <input type="text" class="formulario__input" name="fullname" id="fullname" placeholder="Digíte su nombre completo">
                </div>
                <div class="form-group col-md-4 validar">
                  <label for="lastname"  class="colLabel">Apellidos<span class="text-danger">*</span></label>
                    <input type="text" class="formulario__input" name="lastname" id="lastname" placeholder="Digíte sus apellidos">
                </div>
                <div class="form-group col-md-4 validar">
                  <label for="tipo_Doc"  class="colLabel">Tipo de documento<span class="text-danger">*</span></label>
                    <select  class="formulario__input" id="tipo" name="tipo">
                     <option value="">Seleccione..</option>
                      <option value="CC">CC</option>
                      <option value="TI">TI</option>
                    </select>
                </div>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-4 validar">
                    <label for="document" class="colLabel" >Documento<span class="text-danger">*</span></label>
                     <input type="text" class="formulario__input" name="document" id="document" placeholder="Digíte su # de documento">
                  </div>
                  <div class="form-group col-md-4 validar">
                    <label for="fecha"  class="colLabel">Fecha de nacimiento<span class="text-danger">*</span></label>
                     <input type="date" class="formulario__input" name="fecha" id="fecha" placeholder="Digíte su fecha de nacimiento">
                  </div>
                  <div class="form-group col-md-4 validar">
                    <label for="tipoGen" class="colLabel">Género<span class="text-danger">*</span></label>
                    <select  class="formulario__input" id="tipoGen" name="tipoGen">
                     <option value="">Seleccione..</option>
                      <option value="F">Femenino</option>
                      <option value="M">Masculino</option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 validar">
                      <label for="tipoEst" class="colLabel">Estado civil<span class="text-danger">*</span></label>
                      <select  class="formulario__input" id="tipoEst" name="tipoEst">
                       <option value="">Seleccione..</option>
                        <option value="C">Casado</option>
                        <option value="s">Soltero</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 validar">
                      <label for="direccion"  class="colLabel">Dirección<span class="text-danger">*</span></label>
                       <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Digíte su dirección">
                    </div>
                    <div class="form-group col-md-4 validar">
                      <label for="tel" class="colLabel" >Teléfono<span class="text-danger">*</span></label>
                       <input type="number" class="formulario__input" name="tel" id="tel" placeholder="Digíte su número de teléfono">
                    </div>
                  </div>


                  <div class="form-row">
                      <div class="form-group col-md-4 validar">
                        <label for="cel"  class="colLabel">Celular<span class="text-danger">*</span></label>
                         <input type="text" class="formulario__input" name="cel" id="cel" placeholder="Digíte su número de celular">
                      </div>
                      <div class="form-group col-md-4 validar">
                        <label for="emailemail"  class="colLabel">Correo electrónico<span class="text-danger">*</span></label>
                         <input type="email" class="formulario__input" name="email" id="email" placeholder="Digíte su correo electrónico">
                      </div>
                      <div class="form-group col-md-4 validar">
                        <label for="eps" class="colLabel">EPS<span class="text-danger">*</span></label>
                        <input type="text" class="formulario__input" id="eps" name="eps" placeholder="Digíte su EPS">
                      </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-3 validar">
                          <label for="arl" class="colLabel">ARL<span class="text-danger">*</span></label>
                          <input type="text" class="formulario__input" id="arl" name="arl" placeholder="Digíte su ARL">
                        </div>
                        <div class="form-group col-md-4 validar">
                          <label for="tipoGen" class="colLabel">Cargo<span class="text-danger">*</span></label>
                          <select  class="formulario__input" id="tipoOcu" name="codigoOcupacion">
                              <option value="">Seleccione su cargo</option>
                              <option value="1">Administrador</option>
                              <option value="2">Auxiliar</option>
                              <option value="3">Cajero</option>
                              <option value="4">Bodeguista</option>
                              <option value="5">Domiciliario</option>
                          </select>
                        </div>

                        <div class="form-group col-md-5">
                          <label class="colLabel">Foto de usuario:<span class="text-success"><small>(opcional en formato PNG o JPG)</span></small> </label>
                          <input type="file" class="nuevaFoto" name="nuevaFoto">
                          <p class="help-block">Peso máximo de 3MB</p>
                          <img src="views/assets/img/avatar.png" class="img-thumbnail previsualizar" width="70px">
                        </div>
                      </div>



            </div>

          </div>
  

          
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

               <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
            </div>
          </div>
        
        

          
          <?php 

            $nuevoEmpleado = new EmpleadoController();
             $nuevoEmpleado -> ctrNuevoEmpleado();

           ?>

         </form>
      
      </div>
    </div>
  </div>




  <!-- MODAL EDITAR USUARIO  -->
  <!-- Trigger the modal with a button -->

  <div id="modalEditarEmpleado" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content " style=" border-radius: 15px;">

      <form method="post"  enctype="multipart/form-data" class="validarFormularioEditar">
      
      <div class="modal-header box box-danger" style="background: rgba(215,57,37,1); color: rgba(255, 255, 255, .7);">
        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
        <h4 class="modal-title">Editar Empleado <i class="icon-edit"></i></h4>
      </div>
       
  
        <div class="modal-body">
          <div class="box-body">


            <div class="form-row">
                <div class="form-group col-md-4 validar">
                  <label for="editarFullname" class="colLabel" >Nombre(s)<span class="text-danger">*</span></label>
                  <input type="text" class="formulario__input" name="editarFullname" id="editarFullname" placeholder="Digíte su nombre completo">
                </div>
                <div class="form-group col-md-4 validar">
                  <label for="editarLastname"  class="colLabel">Apellidos<span class="text-danger">*</span></label>
                  <input type="text" class="formulario__input" name="editarLastname" id="editarLastname" placeholder="Digíte sus apellidos">
                </div>
                <div class="form-group col-md-4 validar">
                  <label for="editarTipo" class="colLabel">Tipo de documento<span class="text-danger">*</span></label>
                  <select  class="formulario__input" name="editarTipo">
                    <option value="" id="editarTipo"></option>
                    <option value="" id="editarTipo1"></option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-4 validar">
                    <label for="editarDocument" class="colLabel">Documento<span class="text-danger">*</span></label>
                    <input type="number" class="formulario__input" id="editarDocument" name="editarDocument" value="" readonly>
                  </div>
                  <div class="form-group col-md-4 validar">
                    <label for="editarFecha" class="colLabel">Fecha de nacimiento<span class="text-danger">*</span></label>
                    <input type="date" class="formulario__input" id="editarFecha" name="editarFecha" value="">
                  </div>
                  <div class="form-group col-md-4 validar">
                    <label for="editarTipoGene" class="colLabel">Género<span class="text-danger">*</span></label>
                    <select  class="formulario__input" name="editarTipoGen" id="editarTipoGene">
                       <option value="" id="editarTipoGen"></option>
                       <option value="" id="editarTipoGen1"></option>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 validar">
                      <label for="editarTipoEsta" class="colLabel">Estado civil<span class="text-danger">*</span></label>
                      <select  class="formulario__input"  name="editarTipoEst" id="editarTipoEsta">
                       <option value="" id="editarTipoEst"></option>
                       <option value="" id="editarTipoEst1"></option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 validar">
                      <label for="editarDireccion" class="colLabel">Dirección<span class="text-danger">*</span></label>
                      <input type="text" class="formulario__input" id="editarDireccion" name="editarDireccion" value="">
                    </div>
                    <div class="form-group col-md-4 validar">
                      <label for="editarTel" class="colLabel">Teléfono<span class="text-danger">*</span></label>
                      <input type="number" class="formulario__input" id="editarTel" name="editarTel" value="">
                    </div>
                  </div>


                  <div class="form-row">
                      <div class="form-group col-md-4 validar">
                        <label for="editarCel" class="colLabel">Celular<span class="text-danger">*</span></label>
                        <input type="number" class="formulario__input" id="editarCel" name="editarCel" value="">
                      </div>
                      <div class="form-group col-md-4 validar">
                        <label for="editarEmail" class="colLabel">Correo electrónico<span class="text-danger">*</span></label>
                        <input type="email" class="formulario__input" id="editarEmail" name="editarEmail" value="">
                      </div>
                      <div class="form-group col-md-4 validar">
                        <label for="editarEps" class="colLabel">EPS<span class="text-danger">*</span></label>
                        <input type="text" class="formulario__input" id="editarEps" name="editarEps" value="">
                      </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-3 validar">
                          <label for="editarArl" class="colLabel">ARL<span class="text-danger">*</span></label>
                          <input type="text" class="formulario__input" id="editarArl" name="editarArl" value="">
                        </div>
                        <div class="form-group col-md-4 validar">
                          <label for="editarTipoOcup" class="colLabel">Cargo<span class="text-danger">*</span></label>
                          <select  class="formulario__input" name="editarCodigoOcupacion" id="editarTipoOcup">         
                              <option value="" id="editarTipoOcu"></option>
                              <option value="" id="editarTipoOcu1"></option>
                              <option value="" id="editarTipoOcu2"></option>
                              <option value="" id="editarTipoOcu3"></option>
                              <option value="" id="editarTipoOcu4"></option>
                          </select>
                        </div>
                        <div class="form-group col-md-5">
                          
                          <input type="hidden" value="" name="fotoActual" id="fotoActual"> 

                          <label class="colLabel">Foto de usuario:<span class="text-success"><small>(opcional en formato PNG o JPG)</span></small> </label>
                          <input type="file" class="nuevaFoto" name="editarnuevaFoto">
                          <p class="help-block">Peso máximo de 3MB</p>
                          <img src="views/assets/img/avatar.png" class="img-thumbnail previsualizar" width="70px">
                        </div>
                      </div>


          </div>
          </div>
        
        

          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

               <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
            </div>
          </div>

           <?php 

            $editarEmpleado = new EmpleadoController();
            $editarEmpleado -> ctrEditarEmpleado();

           ?>

         </form>
      
      </div>
    </div>
  </div>


    




<div class="content-wrapper">

  <section class="content-header">
    <h1>
      
      Empleados <i class="icon-briefcase"></i>
      
    
    </h1>
    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
     
      <li class="active">Administrar empleados</li>
   
    </ol>
 
  </section>

  <section class="content">

        <!-- /.box -->

        <div class="box">
          <div class="box-header with-border">


            <div class="btn-group pull-right">


              <a href="views/reportes/excelEmpleados.php?reporte=reporte">
                
                <button class="medida btn btn-default"> Reporte <i class="far fa-file-excel" style="color:green;"></i></button>

              </a>


                <a href="views/reportes/PdfReporteEmpleado.php" target="_blank">
                  
                  <button class="medida btn btn-default"> Reporte <i class="far fa-file-pdf" style="color:red;"></i></button>

                </a>

                <a href="#">
                  
                  <button class="medida btn btn-success" data-toggle="modal" data-target="#modalNuevoUsuario" > Empleado <i class="icon-user-plus"></i></button>

                </a>

            </div>

                  
          </div> 
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas "width="100%">
             
             <thead>

              <tr>
                <th width="10px">#</th>
                <th width="100px">Nombre(s)</th>
                <th width="100px">Apellidos</th>
                <th width="90px">Documento</th>
                <th width="10px">Foto</th>
                <th>Cargo</th>
                <th  width="10px">Correo Electrónico</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th width="10px">Celular</th>
                <th width="10px">Teléfono</th>
                <th width="10px">Dirección</th>
                <th width="10px">Estado civil</th>
                <th width="10px">Fecha de Nacimiento</th>
                <th width="10px">Fecha de Registro</th>
                <th width="10px">EPS</th>
                <th width="10px">ARL</th>
              </tr>

              </thead>
                
                <tbody>

                  <?php


                         $item = null;
                         $valor = null;      
                         $empleados = EmpleadoController::ctrBuscarEmpleado($item, $valor);
                         
                         foreach ($empleados as $key => $value) {
                           
                           echo '<tr>
                                  <td class="tamano">'.$value["ID"].'</td>
                                  <td class="tamano">'.$value["Name"].'</td>
                                  <td class="tamano">'.$value["LastName"].'</td>
                                  <td class="tamano">'.$value["TypeDocument"]." " .$value["NumDocument"].'</td>';   
                                  if ($value["Photo"] == "") {

                                    echo '<td><img src="views/assets/img/avatar.png"  class="img-circle" width="40px"></td>';
                                                    
                                  }else {                
                                    
                                    echo '<td><img src="'.$value["Photo"].'"  class="img-circle" width="40px"></td>';

                                  }
                            
                                  

                                  if($value["Type"] == "Administrador"){

                                    echo '<td class="tamano"><label class="label-primary btn-xs ">'.$value["Type"].'</label></td>';

                                  }else if($value["Type"] == "Auxiliar"){

                                    echo '<td class="tamano"><label class="label-danger btn-xs ">'.$value["Type"].'</label></td>';

                                  }else if($value["Type"] == "Cajero"){

                                    echo '<td class="tamano"><label class="label-success btn-xs ">'.$value["Type"].'</label></td>';

                                  }else if($value["Type"] == "Domiciliario"){

                                    echo '<td class="tamano"><label class="label-warning btn-xs ">'.$value["Type"].'</label></td>';

                                  }else if($value["Type"] == "Bodeguista"){

                                    echo '<td class="tamano"><label class="label-info btn-xs ">'.$value["Type"].'</label></td>';

                                  }

                                  echo ' <td class="tamano">'.$value["Mail"].'</td>';

                                  if ($value["Status"] == 'A') {
                                    
                                    echo '<td><label class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["ID"].'" estadoUsuario="I">Activado</label></td>';

                                  }else {

                                    echo '<td><label class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["ID"].'" estadoUsuario="A">Desactivado</label></td>';

                                  }



                                  

                            echo  '<td class="text-center">
                                    <div class="btn-group">
                            <button class="btn btn-primary btn-xs  btnEditarUsuario" idUsuario="'.$value["ID"].'"  data-toggle="modal" data-target="#modalEditarEmpleado"><i class="icon-edit-3"></i></button>

                             <a href="views/reportes/PdfReporteEmpleadoEspecifico.php?consulta='.$value["ID"].'" target="_blank">
                                
                              <button class="btn btn-default btn-xs btnImprimirEmpleado"><i class="far fa-file-pdf" style="color:red;"></i></button>

                             </a>

                              
                                    </div>
                                  </td>

                                  <td class="tamano">'.$value["cellphone"].'</td>
                                  <td>'.$value["Phone"].'</td>
                                  <td>'.$value["Address"].'</td>
                                  <td>'.$value["Maritalstatus"].'</td>
                                  <td>'.$value["Birthdate"].'</td>
                                  <td>'.$value["Admissiondate"].'</td>
                                  <td>'.$value["Eps"].'</td>
                                  <td>'.$value["Arl"].'</td>

                                </tr>';
                         }

                    ?>
              
                </tbody>

            </table>
          </div>

        </div>

  </section>
  </div>



  <script src="views/assets/js/templete.js"></script>


