<div class="content-wrapper">
  <section class="content-header">
    <h1>      
      Convocatorias <i class="fas fa-th-list"></i> 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar convocatorias</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-danger">
      <div class="box-header with-border">
        <button class=" btn btn-success pull-right" data-toggle="modal" data-target="#modalNuevaConvocatoria" style="margin-left:5px;"> Convocatoria <i class="fa fa-plus"></i></button>
      </div>
      <div class="box-body">
        <div class="row">
          <?php   

            $Convocatorias = ConvocatoriaController::MostrarConvocatoria();
            foreach ($Convocatorias as $key => $value) {
                $i = $value["ID"]%3;
                    if ($i == 0) {
                      echo '
                      <div class="col-md-4">
                        <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-number">Covocatoria #'.$value["ID"].'</span>
                              <span class="progress-description">Fecha Y Hora De Creacion</span>
                              <span class="info-box-number">'.$value["Date"].'</span>
                              <button>Ver</button>
                              <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                              <button idConvocatoria="'.$value["ID"].'" class="btn btn-success pull-right btnEditarConvocatoria"><i class="icon-eye"></i> </button>
                            </div>
                        </div>
                      </div>';    
                    }
                    elseif ($i == 1) {
                      echo ' 
                      <div class="col-md-4">
                        <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-number">Covocatoria #'.$value["ID"].'</span>
                            <span class="progress-description">Fecha Y Hora De Creacion </span>
                            <span class="info-box-number">'.$value["Date"].'</span>
                            <button idConvocatoria="'.$value["ID"].'" class="btn btn-primary pull-right btnEditarConvocatoria"><i class="icon-eye"></i> </button>
                          </div>
                        </div>
                      </div>
                    ';
                  }
                   elseif ($i == 2) {
                      echo ' 
                      <div class="col-md-4">
                        <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-number">Covocatoria #'.$value["ID"].'</span>
                            <span class="progress-description">Fecha Y Hora De Creacion </span>
                            <span class="info-box-number">'.$value["Date"].'</span>
                            <button idConvocatoria="'.$value["ID"].'" class="btn btn-danger active pull-right btnEditarConvocatoria"><i class="icon-eye"></i> </button>
                          </div>
                        </div>
                      </div>
                    ';
                  }
            
            }
           ?>
          
        </div>
      </div>
    </div>
  </section>
</div>

<div id="modalNuevaConvocatoria" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style=" border-radius: 15px;">
        <div class="modal-header">
          <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-times"></i></button>
          <h4>Nueva Convocatoria <i class="icon-list"></i></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
              <div class="box box-success">
                <div class="box-header">
                </div>
                <form method="post" role="form" name="form" id="form">
                  <div class="box-body"> 
                    <div class="row">
                      <div class="form-group col-lg-12">
                        <label for="User">Usuario</label>
                        <input type="text" class="color  form-control" id="User" name="User" value="<?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"] ?>" readonly> 
                        <input type="hidden" name="id" value=" <?php echo $_SESSION["codigo"] ?> " >
                      </div>
                    </div>
                    <div class="form-group row nuevaVacante">
                    </div>
                  <div class="box-footer pull-right">
                    <button type="submit" class="btn btn-info"> Guardar <i class="fa fa-save"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
            <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
              <div class="box box-danger">
                <div class="box-header">
                </div>
                <table class="table tablaVacante table-bordered table-striped tablas dt-responsive tablas">
                  <thead>
                    <tr>
                      <td>Vacante</td>
                      <td>Descripción</td>
                      <td>Salario</td>
                      <td>Acción</td>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php 
                     $TraerVacante = VacanteController::MostrarVacantes();
                     foreach ($TraerVacante as $key => $value) {
                     ?>
                     <tr>
                       <td><?php echo $value["Type"] ?></td>
                       <td><?php echo $value["Description"] ?></td>
                       <td><?php echo $value["Wage"] ?></td>
                       <td><button class ="btn btn-success agregarVacante" idVacante = '<?php echo $value["ID"] ?>'>Agregar <i class="fa fa-plus"></i> </button> </td>
                     </tr>
                     <?php } ?>
                  </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="views/assets/js/CrearConvocatoria.js"></script>
<script src="views/assets/js/templete.js"></script>
<script src="views/assets/js/convocatoria.js"></script>








































<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab"><i class="icon-documents"></i> Vacantes</a></li>
    <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-user-plus"></i> Info-Personal </a></li>
    <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-graduation-cap"></i> Educación</a></li>
    <li><a href="#tab_4" data-toggle="tab"> <i class="fa fa-address-book"></i> Experiencia</a></li>
    <li><a href="#tab_5" data-toggle="tab"><i class="fa fa-users"></i> Referencias</a></li>
    <li><a href="#tab_6" data-toggle="tab"><i class="fa fa-language"></i> Idiomas</a></li>
    <li><a class="btn bg-green" data-toggle="modal" data-target="#RegistrarDatos">Registrar <i class="fa fa-save"></i></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
        <h2 class="text-muted text-center"> ¡Vacantes Disponibles! </h2> 
        <br>
      
      <div class="row">
          <?php 
          $TraerVacante = VacanteController::MostrarVacantes();
          foreach ($TraerVacante as $key => $value) {   
            if ($value["Type"] == "Cajero") {
              echo '
            <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-orange borde cajaAmarilla">
            <div class="inner">
            <h2><b>'.$value["Type"].'</b></h2>
            <label>Salario: $ '.$value["Wage"].' </label>
            <br>
            <em><b>Descripción:</b> '.$value["Description"].' </em>
            </div>
            <div class="icon">
            <i class="icon-shopping-cart1"></i>
            </div>
            <a class="small-box-footer">
            Aplicar <input type="radio"  name="Vacante" id="Vacante" value="Cajero" value="'.$value["ID"].'">   
            </a>
            </div>
            </div>';
          }else if ($value["Type"] == "Auxiliar") {
            echo
             '
            <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red borde cajaRoja">
            <div class="inner">
            <h2><b>'.$value["Type"].'</b></h2>
            <label>Salario: $ '.$value["Wage"].' </label>
            <br>
            <em><b>Descripción:</b> '.$value["Description"].' </em>
            </div>
            <div class="icon">
            <i class="icon-user-plus"></i>
            </div>
            <a class="small-box-footer">
            Aplicar <input type="radio" style="pad" name="Vacante" id="Vacante" value="Auxiliar" value="'.$value["ID"].'">   
            </a>
            </div>
            </div>';
          }else  if ($value["Type"] == "Domiciliario") {
            echo '
            <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green borde cajaVerde">
            <div class="inner">
            <h2><b>'.$value["Type"].'</b></h2>
            <label>Salario: $ '.$value["Wage"].' </label>
            <br>
            <em><b>Descripción:</b> '.$value["Description"].' </em>
            </div>
            <div class="icon">
            <i class="icon-map-pin"></i>
            </div>
            <a class="small-box-footer">
            Aplicar <input type="radio" style="pad" name="Vacante" id="Vacante" value="Domiciliario" value="'.$value["ID"].'">   
            </a>                </div>
            </div>';
          } else  if ($value["Type"] == "Bodeguista") {
            echo '
            <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-purple borde cajaPurpura">
            <div class="inner">
            <h2><b>'.$value["Type"].'</b></h2>
            <label>Salario: $ '.$value["Wage"].' </label>
            <br>
            <em><b>Descripción:</b> '.$value["Description"].' </em>
            </div>
            <div class="icon">
            <i class="icon-box"></i>
            </div>
            <a  class="small-box-footer">
            Aplicar <input type="radio" style="pad" name="Vacante" id="Vacante" value="Bodeguista" value="'.$value["ID"].'">    
            </a>
            </div>
            </div>';
              }
            }
          ?>
      </div>
    </div>
    <div class="tab-pane" id="tab_2">
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Name" >Nombre(s)<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="text" class="color form-control" name="Name" id="Name" placeholder="Nombre">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="LastName">Apellidos<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="text" class=" color form-control" name="LastName" id="LastName" placeholder="Apellido">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="TDocument" >Tipo De Documento<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <select name="TDocument" id="TDocument" class=" color form-control"> 
                    <option value="">Seleccione...</option>
                    <option value="CC">Cédula Ciudadania</option>
                    <option value="CE">Cédula Extranjera</option>
                    <option value="PA">Pasaporte</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="NumDocument"># Documento<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="number" class=" color form-control " name="NumDocument" id="NumDocument" placeholder="Documento">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Phone" >Teléfono</label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="number" class=" color form-control " name="CPhone" id="CPhone" placeholder="Teléfono">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="CellPhone">Celular<span>*</span> </label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="number" class=" color form-control" name="CCellphone" id="CCellphone" placeholder="Número de Movil">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Address" >Dirección<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input   type="text" class=" color form-control " name="CAddress" id="CAddress" placeholder="Dirección">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Mail" >Correo electrónico<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="text" class=" color form-control " name="CMail" id="CMail" placeholder="Email">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
            <label for="Gender" >Género<span>*</span></label>
              <div class="validar">
                <div class="input-group">
                  <select name="CGender" id="CGender" class="color form-control"> 
                    <option value="">Seleccione...</option>
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                    <option value="O">Prefiero No Decir</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Maritalstatus">Estado Civil<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <select name="CMaritalStatus" id="CMaritalStatus" class="color form-control">
                    <option value="">Seleccione...</option>
                    <option value="S">Soltero</option>
                    <option value="C">Casado</option>
                    <option value="D">Divordiado</option>
                    <option value="V">Viudo</option>
                    <option value="U">Union Libre</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="BirthDate" >Fecha De Nacimiento<span>*</span></label>
              <div class="validar">
                <div class="input-group"> 
                  <input  type="date" class=" color form-control" id="CBirthDate" name="CBirthDate" placeholder="Fecha De Nacimiento">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="Description">Descripción<span>*</span> </label>
              <div class="validar">
                <div class="input-group"> 
                  <textarea class=" color form-control" name="CDescription" id="CDescription"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-sm-6">
            <div class="form-group">
              <label for="Photo">Foto<span>*</span></label>
              <div class="input-group"> 
                <input type="file" class="newPhoto" id="Photo" name="Photo">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <img src="views/assets/img/avatar.png" class="img-thumbnail previsualizar" width="70px">
              <p class="help-block">Peso máximo de 200 MB</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="tab-pane" id="tab_3">
      <div class="panel-body"> 
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Primer Estudio Académico</h3>
            </div>
            <div class="box-body">
              <div class="form-group ">
                <label>Título<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="form-control color" name="Titulo1" id="Titulo1">
                      <option value=""> Seleccione...</option>
                      <?php   
                      $TraerLevel = AspiranteController::MostrarLevel();
                      foreach ($TraerLevel as $key => $value) { 
                      ?> 
                      <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Type"]; ?>
                      </option>
                      <?php 
                      } 
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Carrera <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Carrera1" id="Carrera1" placeholder="Carrera ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tiempo<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="TiempoEstudio1" placeholder="TiempoEstudio">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Institución<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Instituion1" id="Instituion1" placeholder="Institucion">
                  </div>
                </div>
              </div>
             <!-- <div class="form-group col-md-10">
                <label>Certificado<span>*</span></label>
                <div class="validar">
                  <input  type="file" class="form-control" name="CertificadoEstudio1" placeholder="Certificado Estudio">
                </div>
              </div>-->
            </div>                    
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Segundo Estudio Académico</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Título<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="form-control color" name="Titulo2" id="Titulo2">
                      <option value=""> Seleccione...</option>
                      <?php   
                      $TraerLevel = AspiranteController::MostrarLevel();
                      foreach ($TraerLevel as $key => $value) { 
                      ?> 
                      <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Type"]; ?>
                      </option>
                      <?php 
                      } 
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Carrera <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Carrera2" id="Carrera2" placeholder="Carrera ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tiempo<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="TiempoEstudio2" placeholder="TiempoEstudio">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Institución<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" id="Instituion2" name="Instituion2" placeholder="Institucion">
                  </div>
                </div>
              </div>
             <!--   <div class="form-group col-md-10">
                <label>Certificado<span>*</span></label>
                <div class="validar">
                  <input  type="file" class="form-control" name="CertificadoEstudio2" placeholder="Certificado Estudio">
                </div>
              </div> -->
            </div>                    
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Tercer Estudio Académico</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Título<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="form-control color" name="Titulo3" id="Titulo3">
                      <option value=""> Seleccione...</option>
                      <?php   
                      $TraerLevel = AspiranteController::MostrarLevel();
                      foreach ($TraerLevel as $key => $value) { 
                      ?> 
                      <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Type"]; ?>
                      </option>
                      <?php 
                      } 
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Carrera <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Carrera3" id="Carrera3" placeholder="Carrera ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tiempo<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="TiempoEstudio3" placeholder="TiempoEstudio">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Institución<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Instituion3" id="Instituion3" placeholder="Institucion">
                  </div>
                </div>
              </div>
        <!-- <div class="form-group col-md-10">
                <label>Certificado<span>*</span></label>
                <div class="validar">
                  <input  type="file" class="form-control" name="CertificadoEstudio2" placeholder="Certificado Estudio">
                </div>
              </div> .--->
            </div>                    
          </div>
        </div>
      </div>

    </div>
    <div class="tab-pane" id="tab_4">
      <div class="panel-body"> 
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Primera Experiencia Laboral</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label >Compañia <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" id="Compania1" name="Compania1" placeholder="Compañia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Jefe Inmediato <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Jefe1" id="Jefe1" placeholder="Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Documento Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="DocJefe1" id="DocJefe1" placeholder="Documento Del Jefe ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Telefono Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" id="TelefonoJefe1" name="TelefonoJefe1" placeholder="Telefono Del Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Cargo Que Ejercia<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="CargoAntes1" id="CargoAntes1" placeholder="Cargo Que Ejercia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Tiempo En Dicha Compañia <span>*</span></label>
                <div class="validar input-group">
                  <div class="col-md-4"> 
                    <input type="number" class="color form-control" name="Cantidad1" placeholder="#">
                  </div>
                  <div class="col-md-8"> 
                    <select class="color form-control " name="Tiempo1">
                      <option value=" ">Seleccione... </option>
                      <option value="Dias">Dias</option>
                      <option value="Semanas">Semanas</option>
                      <option value="Meses">Meses</option>
                      <option value="Años">Años</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Segunda Experiencia Laboral</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label >Compañia <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="Compania2" id="Compania2" placeholder="Compañia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Jefe Inmediato <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Jefe2" id="Jefe2" placeholder="Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Documento Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="DocJefe2" id="DocJefe2" placeholder="Documento Del Jefe ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Telefono Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="TelefonoJefe2" id="TelefonoJefe2" placeholder="Telefono Del Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Cargo Que Ejercia<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="CargoAntes2" id="CargoAntes2" placeholder="Cargo Que Ejercia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Tiempo En Dicha Compañia <span>*</span></label>
                <div class="validar input-group">
                  <div class="col-md-4"> 
                    <input type="number" class="color form-control" name="Cantidad2" placeholder="#">
                  </div>
                  <div class="col-md-8"> 
                    <select class="color form-control " name="Tiempo2">
                      <option value=" ">Seleccione... </option>
                      <option value="Dias">Dias</option>
                      <option value="Semanas">Semanas</option>
                      <option value="Meses">Meses</option>
                      <option value="Años">Años</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Tercera Experiencia Laboral</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label >Compañia <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Compania3" id="Compania3" placeholder="Compañia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Jefe Inmediato <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Jefe3" id="Jefe3" placeholder="Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Documento Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="DocJefe3" id="DocJefe3"  placeholder="Documento Del Jefe ">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Telefono Del Jefe <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="TelefonoJefe3" id="TelefonoJefe3" placeholder="Telefono Del Jefe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label >Cargo Que Ejercia<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="CargoAntes3" id="CargoAntes3" placeholder="Cargo Que Ejercia">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Tiempo En Dicha Compañia <span>*</span></label>
                <div class="validar input-group">
                  <div class="col-md-4"> 
                    <input type="number" class="color form-control" name="Cantidad3" placeholder="#">
                  </div>
                  <div class="col-md-8"> 
                    <select class="color form-control " name="Tiempo3">
                      <option value=" ">Seleccione... </option>
                      <option value="Dias">Dias</option>
                      <option value="Semanas">Semanas</option>
                      <option value="Meses">Meses</option>
                      <option value="Años">Años</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab_5">
      <div class="panel-body"> 
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Primera Referencia</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Número De Documento <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="DocRefe1" id="DocRefe1" placeholder="Número De Documento">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nombre <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="NombreRefe1" id="NombreRefe1" placeholder="Nombre">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ocupación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="OcupacionRefe1" id="OcupacionRefe1" placeholder="Ocupación">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Parentesco<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="color form-control" name="ParentescoRefe1" id="ParentescoRefe1">
                      <option value="">Selecione...</option>
                      <option value="Familiar">Familiar</option>
                      <option value="Amigo">Amigo</option>
                      <option value="Jefe Anterior">Jefe Anterior</option>
                      <option value="Cónyuge">Cónyuge</option>
                      <option value="Otro">Otro</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Telefono <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="number" class="color form-control" name="TelefonoRefe1" id="TelefonoRefe1" placeholder="Telefono">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Segunda Referencia</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Número De Documento <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" id="DocRefe2" name="DocRefe2" placeholder="Número De Documento">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nombre <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" id="NombreRefe2" name="NombreRefe2" placeholder="Nombre">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ocupación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="text" class="color form-control" name="OcupacionRefe2" id="OcupacionRefe2" placeholder="Ocupación">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Parentesco<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="color form-control" name="ParentescoRefe2" id="ParentescoRefe2">
                      <option value="">Selecione...</option>
                      <option value="Familiar">Familiar</option>
                      <option value="Amigo">Amigo</option>
                      <option value="Jefe Anterior">Jefe Anterior</option>
                      <option value="Cónyuge">Cónyuge</option>
                      <option value="Otro">Otro</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Telefono <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input type="number" class="color form-control" id="TelefonoRefe2" name="TelefonoRefe2" placeholder="Telefono">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Tercera Referencia</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Número De Documento <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" id="DocRefe3" name="DocRefe3" placeholder="Número De Documento">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nombre <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" id="NombreRefe3" name="NombreRefe3" placeholder="Nombre">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Ocupación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="OcupacionRefe3" id="OcupacionRefe3" placeholder="Ocupación">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Parentesco<span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select class="color form-control" name="ParentescoRefe3" id="ParentescoRefe3">
                      <option value="">Selecione...</option>
                      <option value="Familiar">Familiar</option>
                      <option value="Amigo">Amigo</option>
                      <option value="Jefe Anterior">Jefe Anterior</option>
                      <option value="Cónyuge">Cónyuge</option>
                      <option value="Otro">Otro</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Telefono <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="number" class="color form-control" name="TelefonoRefe3" name="TelefonoRefe3" placeholder="Telefono">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> 
    <div class="tab-pane" id="tab_6">
      <div class="panel-body"> 
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Primer Idioma</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label> Idioma <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select name="Idioma1" id="Idioma1" class=" color form-control"> 
                    <option value="">Seleccione...</option>
                      <?php   
                        $TraerLanguage = AspiranteController::MostrarLanguage();
                        foreach ($TraerLanguage as $key => $value) { ?> 
                          <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Name"];?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Institución <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Institucion1" id="Institucion1"  placeholder="Institución">
                  </div>
                </div>
              </div>
         <!--  <div class="form-group">
                <label> Certificación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="file" class="color form-control" name="CertificacionIdioma1" placeholder="Certificación">
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Segundo Idioma</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label> Idioma <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select name="Idioma2" id="Idioma2" class=" color form-control"> 
                    <option value="">Seleccione...</option>
                      <?php   
                        $TraerLanguage = AspiranteController::MostrarLanguage();
                        foreach ($TraerLanguage as $key => $value) { ?> 
                          <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Name"];?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Institución <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Institucion2" id="Institucion2" placeholder="Institución">
                  </div>
                </div>
              </div>
            <!--  <div class="form-group">
                <label> Certificación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="file" class="color form-control" name="CertificacionIdioma2" placeholder="Certificación">
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-danger">
            <div class="box-header text-center with-border">
              <h3 class="box-title ">Tercer Idioma</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label> Idioma <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <select name="Idioma3" id="Idioma3" class=" color form-control"> 
                    <option value="">Seleccione...</option>
                      <?php   
                        $TraerLanguage = AspiranteController::MostrarLanguage();
                        foreach ($TraerLanguage as $key => $value) { ?> 
                          <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["Name"];?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label> Institución <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="text" class="color form-control" name="Institucion3" id="Institucion3" placeholder="Institución">
                  </div>
                </div>
              </div>
             <!-- <div class="form-group">
                <label> Certificación <span>*</span></label>
                <div class="validar">
                  <div class="input-group col-sm-12"> 
                    <input  type="file" class="color form-control" name="CertificacionIdioma3" placeholder="Certificación">
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div> 
    
  </div>
</div>