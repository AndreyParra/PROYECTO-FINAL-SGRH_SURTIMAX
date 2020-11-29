<div id="modalNuevoAspirante" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content " style=" border-radius: 15px;">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header box box-success" style="background: rgb(0,141,76); color: rgba(255, 255, 255, .7); ">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Contratar Aspirante <i class="icon-user-plus"></i></h4>
        </div>


        <div class="modal-body">
          <div class="box-body">

            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="fullname" class="colLabel">Nombre(s)<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" name="fullname" id="fullname" placeholder="Digíte su nombre completo" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="lastname" class="colLabel">Apellidos<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" name="lastname" id="lastname" placeholder="Digíte sus apellidos" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="tipo_Doc" class="colLabel">Tipo de documento<span class="text-danger">*</span></label>

                <input type="text" class="formulario__input" name="tipo" id="tipo" placeholder="Digíte su # de documento" readonly>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="document" class="colLabel">Documento<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" name="document" id="document" placeholder="Digíte su # de documento" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="fecha" class="colLabel">Fecha de nacimiento<span class="text-danger">*</span></label>
                <input type="date" class="formulario__input" name="fecha" id="fecha" placeholder="Digíte su fecha de nacimiento" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="tipoGen" class="colLabel">Género<span class="text-danger">*</span></label>

                <select class="formulario__input" name="tipoGen" id="tipoGen">
                  <option value="" id="Genero1"></option>
                </select>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="tipoEst" class="colLabel">Estado civil<span class="text-danger">*</span></label>

                <select class="formulario__input" name="tipoEst">
                  <option value="" id="estadoc"></option>
                </select>

              </div>
              <div class="form-group col-md-4 ">
                <label for="direccion" class="colLabel">Dirección<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Digíte su dirección" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="tel" class="colLabel">Teléfono<span class="text-danger">*</span></label>
                <input type="number" class="formulario__input" name="tel" id="tel" placeholder="Digíte su número de teléfono" readonly>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-4 ">
                <label for="cel" class="colLabel">Celular<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" name="cel" id="cel" placeholder="Digíte su número de celular" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="emailemail" class="colLabel">Correo electrónico<span class="text-danger">*</span></label>
                <input type="email" class="formulario__input" name="email" id="email" placeholder="Digíte su correo electrónico" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="eps" class="colLabel">EPS<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" id="eps" name="eps" placeholder="Digíte su EPS" value="Sin asignación" readonly>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-3 ">
                <label for="arl" class="colLabel">ARL<span class="text-danger">*</span></label>
                <input type="text" class="formulario__input" id="arl" name="arl" placeholder="Digíte su ARL" value="Sin asignación" readonly>
              </div>
              <div class="form-group col-md-4 ">
                <label for="tipoGen" class="colLabel">Cargo<span class="text-danger">*</span></label>
                <select class="formulario__input" name="codigoOcupacion">
                  <option value="" id="cargoA"></option>
                </select>

              </div>

 
                <input type="hidden" class="formulario__input" name="Photo" id="Photo" readonly>
 
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

        $nuevoEmpleado = new AspiranteController();
        $nuevoEmpleado->ctrNuevoEmpleado(); 

        ?>

      </form>

    </div>
  </div>
</div>

<div class="content-wrapper">

  <section class="content-header">
    <h1 class="titulo">

      Aspirantes <i class="icon-users"></i>

    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar aspirantes</li>
    </ol>
  </section>


  <section class="content">
    <div class="box">
      <div class="nav-tabs-custom">

        <ul class="nav nav-tabs pull-right">
          <li><a type="button" data-toggle="modal" data-target="#modal-default"><i class="fa fa-file-pdf-o" style="color: red"></i></a></li>
          <li><a href="#Inactive" data-toggle="tab"><label class="bg-gray btn-xs">Contratados <i class="icon-users"></i></label></a></li>
          <li><a href="#WithOut" data-toggle="tab"><label class="btn-xs label-danger">Sin agendar <i class="icon-calendar"></i></label></a></li>
          <li><a href="#With" data-toggle="tab"><label class="btn-xs label-info">Agendados <i class="icon-calendar"></i></label></a></li>
          <li><a href="#Evaluated" data-toggle="tab"><label class="btn-xs label-primary">Evaluados <i class="icon-list"></i></label></a></li>
          <li><a href="#Featured" data-toggle="tab"><label class="btn-xs label-success">Destacados <i class="icon-user-check"></i></label></a></li>
          <li ><a href="#Everyone" data-toggle="tab"><label class="btn-xs bg-purple">Todos <i class="icon-plus"></i></label></a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="Featured">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Score</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center">Fecha de Registro</th>
                  <th class="text-center">Teléfono </th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ctrListarAspirantesDestacados();
                foreach ($aspirantes as $key => $value) {
                  echo '
                 <tr>
                 <td class="text-center"><label class="label-success btn-xs">' . $value["Result"] . '</label></td>
                 <td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                 <td>' . $value["Name"] . '</td>
                 <td>' . $value["LastName"] . '</td>
                 <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                 <td>' . $value["Mail"] . '</td>
                 <td><label class="btn-xs label-default">' . $value["DateAplication"] . '</label></td>
                 <td>' . $value["Phone"] . '</td>';
                 
                 
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

                 echo '<td>

                 <a href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank" >

                 <button class="btn-xs btn btn-default" ><i class="fa fa-file-pdf"style="color:red;"></i></button>
                      
                 </a>

                 <button class="btn btn-success btn-xs  btnNuevoAspirante" idAspirante="' . $value["NumDocument"] . '"  data-toggle="modal" data-target="#modalNuevoAspirante"><i class="icon-user-plus"></i></button>
                 <button class="btn-xs btn btn-danger btnEliminarAspirante" eliminarAsp="'.$value["NumDocument"].'" data-toggle="modal" data-target="#EliminarAsp"><i class="icon-trash"></i></button>
                 </td>

                 </tr>
                 ';
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="Everyone">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center">Fecha de Registro</th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Teléfono </th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ListarAspirantes();
                foreach ($aspirantes as $key => $value) {
                  echo '
                 <tr>
                 <td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                 <td>' . $value["Name"] . '</td>
                 <td>' . $value["LastName"] . '</td>
                 <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                 <td>' . $value["Mail"] . '</td>
                 <td><label class="label-default btn-xs">' . $value["DateAplication"] . '</label></td>
                 ';
                  
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
                 
                echo '<td>' . $value["Phone"] . '</td>
                
                  <td class="text-center">';
                  if ($value["Status"] == "E") {
                    echo '<label class="btn-xs bg-blue"> <i class="icon-list"></i></label>';
                  } elseif ($value["Status"] == "S") {
                    echo '<label class="btn-xs label-danger"> <i class="icon-calendar"></i></label>';
                  } elseif ($value["Status"] == "A") {
                    echo '<label class="btn-xs label-info"> <i class="icon-calendar"></i></label>';
                  } else {
                    echo '<label class="btn-xs label-secondary">Contratado <i class="fa fa-user-plus"></i></label>';
                  }
                  echo '</td>
                  

                  <td>
                <a class="btn-xs btn btn-default" href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank" >
                     <i class="fa fa-file-pdf"style="color:red;"></i>
                   </a>';

                  if ($value["Status"] == "S") {
                    echo '<button type="button" class="btn-xs btn btn-info" data-toggle="modal" data-target="#modalCita" onClick="document.getElementById(\'UsrCita\').value=\'' . $value["NumDocument"] . '\';">
                    <i class=" fa fa-calendar-plus-o"> </i>
                  </button>';
                  } elseif ($value["Status"] == "A") {
                    echo '<button type="button" class="btn-xs btn  btn-success" data-toggle="modal" data-target="#modal-success" onClick="document.getElementById(\'UsrEvaluar\').value=\'' . $value["NumDocument"] . '\';"><i class="fa fa-check-square-o" ></i> </button>';
                  } else {
                    echo '<label class="btn-xs label-default" style="color:white"> <i class="fa fa-user-check"></i></label>';
                  }

                   echo '<button class="btn-xs btn btn-danger btnEliminarAspirante" eliminarAsp="'.$value["NumDocument"].'" data-toggle="modal" data-target="#EliminarAsp"><i class="icon-trash"></i></button>

                </td>

                 </tr>
                 ';
                }

                
    
                ?>
              </tbody>
              
            </table>
            </table>
          </div>
          <div class="tab-pane" id="Inactive">

            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">Móvil</th>
                  <th class="text-center">Fijo</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Hoja Vida</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ListarAspirantesContratados();
                foreach ($aspirantes as $key => $value) {
                  if ($value["Status"] == "C") {
                    echo '<td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                  <td>' . $value["Name"] . '</td>
                  <td>' . $value["LastName"] . '</td>
                  <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                  <td>' . $value["Cellphone"] . '</td>
                  <td>' . $value["Phone"] . '</td>
                  <td>' . $value["Mail"] . '</td>';
                  
                  
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

                  echo '<td>
                  <a class="btn-xs btn btn-default" href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank" >
                      <i class="fa fa-file-pdf"style="color:red;"></i>
                    </a>
                  </td>
                  </tr>';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="Evaluated">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Score</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center">Telefono</th>
                  <th class="text-center">Fecha de Registro</th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ctrListarAspirantesEvaluados();
                foreach ($aspirantes as $key => $value) {

                    if($value["Result"] < 38) {
                      echo ' <td><label class="label-danger btn-xs">'.$value["Result"].'</label></td>';
                    }else if($value["Result"] >= 38 && $value["Result"] <= 44 ) {
                      echo ' <td><label class="label-warning btn-xs">'.$value["Result"].'</label></td>';
                    }else {
                      echo ' <td><label class="label-success btn-xs">'.$value["Result"].'</label></td>';
                    }
                    echo '
                    <td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                    <td>' . $value["Name"] . '</td>
                    <td>' . $value["LastName"] . '</td>
                    <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                    <td>' . $value["Mail"] . '</td>
                    <td>' . $value["Cellphone"] . '</td>
                    <td> <label class="btn-xs label-default">' . $value["DateAplication"] . ' </label></td>';
                    
                    
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

                    echo '<td>
                    <a class="btn-xs btn btn-default" href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank" >
                      <i class="fa fa-file-pdf"style="color:red;"></i>
                    </a>';

                    if($value["Result"] >= 38) {
                      
                      echo '<button class="btn btn-success btn-xs  btnNuevoAspirante" idAspirante="' . $value["NumDocument"] . '"  data-toggle="modal" data-target="#modalNuevoAspirante"><i class="icon-user-plus"></i></button>';
                    }else {
                       
                      echo '<label class="label-default btn-xs" style="color:white"><i class="icon-user-plus"></i></label>';
                    }

                    echo '
                    <button class="btn-xs btn btn-danger btnEliminarAspirante" eliminarAsp="'.$value["NumDocument"].'" data-toggle="modal" data-target="#EliminarAsp"><i class="icon-trash"></i></button>
                    </td>
                    </tr>';
              
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="With">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Cita</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center">Móvil</th>
                  <th class="text-center">Teléfono</th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Hoja Vida</th>
                  <th class="text-center">Evaluar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ListarAspirantesAgendados();
                foreach ($aspirantes as $key => $value) {
                  if ($value["Status"] == "A") {
                    echo '
                    <td> ' . $value["date"] . ' </td>
                    <td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                    <td>' . $value["Name"] . '</td>
                    <td>' . $value["LastName"] . '</td>
                    <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                    <td>' . $value["Mail"] . '</td>
                    <td> ' . $value["Cellphone"] . ' </td>
                    <td> ' . $value["Phone"] . ' </td>';
                    
                    
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

                    echo '<td><a class="btn btn-xs btn-default" href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank"><i class="fa fa-file-pdf"style="color:red;"></i></a></td>
                    <td><button type="button" class="btn-xs btn  btn-success" data-toggle="modal" data-target="#modal-success" onClick="document.getElementById(\'UsrEvaluar\').value=\'' . $value["NumDocument"] . '\';"><i class="fa fa-check-square-o" ></i> </button></td>
                    </tr>';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="WithOut">
            <table id="example1" class="table table-no-margin table-striped dt-responsive tablas " width="100%">
              <thead>
                <tr class="text-center">
                  <th class="text-center">Aplicación</th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">E-Mail</th>
                  <th class="text-center"> Teléfono</th>
                  <th class="text-center">Vacante</th>
                  <th class="text-center">Hoja Vida</th>
                  <th class="text-center">Agendar Cita</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $aspirantes = AspiranteController::ListarAspirantes();
                foreach ($aspirantes as $key => $value) {
                  if ($value["Status"] == "S") {
                    echo '
                  <td>' . $value["DateAplication"] . '</td>
                   <td><img src="' . $value["Photo"] . '" class="img-circle" width="50px"></td>
                   <td>' . $value["Name"] . '</td>
                   <td>' . $value["LastName"] . '</td>
                   <td>' . $value["TypeDocument"] . ' : ' . $value["NumDocument"] . '</td>
                   <td>' . $value["Mail"] . '</td>
                   <td>' . $value["Phone"] . '</td>';
                  
                   
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
                   echo '<td>
                   <a class="btn-xs btn-default btn" href="views/reportes/PDFASPPORID.php?Document=' . $value["NumDocument"] . '" target="_blank" >
                      <i class="fa fa-file-pdf"style="color:red;"></i>
                    </a>
                   </td>
                    <td> <button type="button" class="btn-xs btn btn-info" data-toggle="modal" data-target="#modalCita" onClick="document.getElementById(\'UsrCita\').value=\'' . $value["NumDocument"] . '\';">
                    <i class=" fa fa-calendar-plus-o"> </i>
                  </button></td>
                   </tr>';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<div class="modal fade" id="EliminarAsp">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class=" pull-right btn btn-default" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        <div class="text-center">
          <h3>¿Esta seguro que desea eliminar este candidato?</h3>
        </div>
      </div>
      <div class="modal-footer " style="margin-right:30%;">
        
        <form action="" method="post">    
            <input type="hidden" id="documentEliminar" name="documentEliminar">
            <button class="btn btn-default" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
            <button type="submit" class="btn btn-danger">Eliminar <i class="icon-trash"></i></button>

            <?php
               
               $eliminar = new AspiranteController();

               $eliminar -> ctrEliminarAspirante();
            
            ?>
        </form>
  
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------- 

Modal Informes

------------------------------------------------>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <div class="modal-header bg-red">
        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fa fa-times"></i>
          </span>
        </button>
        <h4 class="modal-title">Informes <i class="fa fa-file-pdf-o"></i></h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="margin col-md-8">
            <div class="btn-group col-sm">
              <a class="btn btn-default" href="views/reportes/PdfReporteAspirante.php?General=General" target="_blank"><i class="fa fa-files-o"></i> General</a>
            </div>
            <div class="btn-group col-sm">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="icon-documents"></i>
                Vacantes
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="views/reportes/PdfReporteAspirante.php? Auxiliar = Auxiliar" target="_blank">Auxiliar</a></li>
                <li><a href="views/reportes/PdfReporteAspirante.php?Cajero=Cajero" target="_blank">Cajero</a></li>
                <li><a href="views/reportes/PdfReporteAspirante.php?Bodeguista=Bodeguista" target="_blank">Bodegista</a></li>
                <li><a href="views/reportes/PdfReporteAspirante.php?Domiciliario=Domiciliario" target="_blank">Domiciliario</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------------------------------------- 
Modal Asignacion Citas 
------------------------------------------------>

<div class="modal fade " id="modalCita">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-aqua">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h2 class="modal-title">Asignación de Citas: </h2>
      </div>
      <form method="post" id="formulario">
        <div class="modal-body">
          <div class="panel">
            <div class="panel-body">
              <div class="box">
                <div class="box-body">
                  <table class="table table-bordered table-striped tablas">
                    <thead>
                      <tr>
                        <th width="10px"></th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Finalización</th>
                        <th>Comentarios</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $citas = CitaController::ctrListarCitasDispo();

                      foreach ($citas as $key => $value) {
                        echo '
                            <tr>
                              <td><input type="radio" id="idcita" name="idcita" value="' . $value["id"] . '" ></td>
                              <td>' . $value["date"] . '</td>
                              <td>' . $value["hour_start"] . '</td>
                              <td>' . $value["hour_end"] . '</td>
                              <td>' . $value["comments"] . '</td>
                            </tr> ';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <i class="fa fa-times"></i> </button>
              <button type="submit" name="" class="btn btn-success pull-right">Solicitar cita <i class="fa fa-calendar-check-o"></i></button>
              <input type="hidden" id="UsrCita" name="UsrCita" value="" />
            </div>
          </div>
        </div>
        <?php
        $AsignarCita = new CitaController();
        $AsignarCita->ctrAsignarCita();
        ?>
      </form>
    </div>
  </div>

</div>

<!------------------------------------------------- 
Modal Evaluacion
------------------------------------------------>

<div class="modal fade " id="modal-success" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <form method="POST">
          <button type="button" class="btn btn-success pull-right" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
          <h4 class="modal-title">Evaluación</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">  
          <label for="UsrEvaluar" class="col-form-label col-md-1">Usuario</label>
          <div class="col-md-3">
            <input type="text" readonly class="form-control " id="UsrEvaluar" name="UsrEvaluar" value="" />
          </div>
        </div>
        <table class="table table-condensed">
          <thead>
            <tr>
              <td style="width: 500px;"> </td>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b> Flexibilidad : </b>
                Siendo flexible en tu trabajo podrás modificar tu comportamiento y adoptar un diferente enfoque sobre tus ideas o tus criterios.
              </td>
              <td>
                <input type="range" name="F" class="form-control-range" value="0" min="0" max="50" id="formControlRange" onchange="Flexibilidad(this.value)">
                <script type="text/javascript">
                  function Flexibilidad(value) {
                    document.getElementById('flexibilidad').innerHTML = value;
                  }
                </script>
              </td>
              <td>
                <span for="formControlRange" class="label bg-red" id="flexibilidad">0</span>
              </td>
            </tr>
            <tr>
              <td>
                <b> Creatividad : </b>
                Siendo creativo podrás proponer y encontrar formas nuevas y eficaces de hacer tu trabajo.
              </td>
              <td>
                <input type="range" style="color: green;" class="form-control-range" name="C" value="0" min="0" max="50" id="formControlRange" onchange="Creatividad(this.value)">
                <script type="text/javascript">
                  function Creatividad(value) {
                    document.getElementById('Creatividad').innerHTML = value;
                  }
                </script>
              </td>
              <td>
                <span for="formControlRange" class="label bg-red" id="Creatividad">0</span>
              </td>
            </tr>
            <tr>
              <td>
                <b> Capacidad de organización : </b>
                Además de llegar a tus metas de una manera más rápida, lo harás con menos esfuerzo y con mayor precisión.
              </td>
              <td>
                <input type="range" class="form-control-range" value="0" min="0" max="50" id="formControlRange" onchange="Organizacion(this.value)" name="O">
                <script type="text/javascript">
                  function Organizacion(value) {
                    document.getElementById('Organizacion').innerHTML = value;
                  }
                </script>
              </td>
              <td>
                <span for="formControlRange" class="label bg-red" id="Organizacion">0</span>
              </td>
            </tr>
            <tr>
              <td>
                <b> Trabajo en equipo : </b>
                Muestra Principios de compañerismo, responsabilidad, liderazgo, confianza, empatía….
              </td>
              <td>
                <input type="range" class="form-control-range" value="0" min="0" max="50" id="formControlRange" onchange="Equipo(this.value)" name="E">
                <script type="text/javascript">
                  function Equipo(value) {
                    document.getElementById('Equipo').innerHTML = value;
                  }
                </script>
              </td>
              <td>
                <span for="formControlRange" class="label bg-red" id="Equipo">0</span>
              </td>
            </tr>
            <tr>
              <td>
                <b> Proactividad : </b>
                una de las cualidades que más valoran las empresas a la hora de contratar a alguien o mejorar a nivel laboral.
              </td>
              <td>
                <input type="range" name="P" class="form-control-range btn-success" value="0" min="0" max="50" id="formControlRange" onchange="Proactividad(this.value)">
                <script type="text/javascript">
                  function Proactividad(value) {
                    document.getElementById('Proactividad').innerHTML = value;
                  }
                </script>
              </td>
              <td>
                <span for="formControlRange" class="label bg-red" id="Proactividad">0</span>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="form-group">
          <label class=" control-label" for="Comments">Comentarios Adicionales </label>
          <div class="">
            <textarea class="form-control" id="Comments" name="Comments">Agregar Comentarios</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger pull-left">Limpiar <i class="fa fa-trash"></i> </button>
        <button type="submit" class="btn btn-success">Evaluar <i class="fa fa-save"> </i> </button>
      </div>
      <?php
      $Evaluar = new AspiranteController();
      $Evaluar->Evaluar();
      ?>
      </form>
    </div>
  </div>
</div>

<script src="views/assets/js/templete.js"></script>
<script>




  /*=============================================
  EDITAR EMPLEADO
  =============================================*/
  $(".tablas").on("click", ".btnNuevoAspirante", function() {

    var documento = $(this).attr("idAspirante");


    var datos = new FormData();
    datos.append("documento", documento);

    $.ajax({

      url: "ajax/aspirante.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {

        $('#fullname').val(respuesta["Name"]);
        $('#lastname').val(respuesta["LastName"]);
        $('#tipo').val(respuesta["TypeDocument"]);
        $('#document').val(respuesta["NumDocument"]);
        $('#fecha').val(respuesta["Birthdate"]);
        $('#tipoEst').val(respuesta["Maritalstatus"]);
        $('#direccion').val(respuesta["Address"]);
        $('#tel').val(respuesta["Phone"]);


        if (respuesta["Gender"] == "M") {

          $('#Genero1').html("Masculino");
          $('#Genero1').val(respuesta["Gender"]);

        } else if (respuesta["Gender"] == "F") {

          $('#Genero1').html("Femenino");
          $('#Genero1').val(respuesta["Gender"]);

        } else {

          $('#Genero1').html("Prefiero no decir");
          $('#Genero1').val(respuesta["Gender"]);
        }

        $('#email').val(respuesta["Mail"]);

        if (respuesta["Maritalstatus"] == "V") {

          $('#estadoc').html("Viudo");
          $('#estadoc').val(respuesta["Maritalstatus"]);

        } else if (respuesta["Maritalstatus"] == "D") {

          $('#estadoc').html("Divorciado");
          $('#estadoc').val(respuesta["Maritalstatus"]);

        } else if (respuesta["Maritalstatus"] == "C") {

          $('#estadoc').html("Casado");
          $('#estadoc').val(respuesta["Maritalstatus"]);

        } else if (respuesta["Maritalstatus"] == "U") {

          $('#estadoc').html("Unión libre");
          $('#estadoc').val(respuesta["Maritalstatus"]);

        }

        $('#cel').val(respuesta["Cellphone"]);

        if (respuesta["Id_Vacant"] == 1) {

          $('#cargoA').html("Administrador");
          $('#cargoA').val(respuesta["Id_Vacant"]);

        } else if (respuesta["Id_Vacant"] == 2) {

          $('#cargoA').html("Auxiliar");
          $('#cargoA').val(respuesta["Id_Vacant"]);

        } else if (respuesta["Id_Vacant"] == 3) {

          $('#cargoA').html("Cajero");
          $('#cargoA').val(respuesta["Id_Vacant"]);

        } else if (respuesta["Id_Vacant"] == 4) {

          $('#cargoA').html("Bodeguista");
          $('#cargoA').val(respuesta["Id_Vacant"]);

        } else if (respuesta["Id_Vacant"] == 5) {

          $('#cargoA').html("Domiciliario");
          $('#cargoA').val(respuesta["Id_Vacant"]);

        }

        $('#Photo').val(respuesta["Photo"]);



      }

    });

  })
</script>



<script>




  /*=============================================
  EDITAR EMPLEADO
  =============================================*/
  $(".tablas").on("click", ".btnEliminarAspirante", function() {

    var documento = $(this).attr("eliminarAsp");



    var datos = new FormData();
    datos.append("documento", documento);

    $.ajax({

      url: "ajax/aspirante.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {

        $("#documentEliminar").val(respuesta["NumDocument"]);

      }

    });

  })

</script>