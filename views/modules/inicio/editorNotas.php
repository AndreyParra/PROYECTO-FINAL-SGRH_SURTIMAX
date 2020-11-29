<div id="modalNuevoItem" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
         
             <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" style="color:red">&times;</button>
                  <div class="box-body">
         

                    <div class="form-group col-md-12">


                      <form method="post"  enctype="multipart/form-data" id="formulario">

                           <div class="input-group">
                             <input type="text" name="item" id="msg" placeholder="Escribe un nuevo item..." class="color medida form-control" >
        
                               <span class="input-group-btn">
                                     <button type="submit" class="medida btn btn-success btn-flat boton"><i class="fas fa-plus"></i></button>
                                </span>

                           </div>


                             <?php 

                                  $notas = new UsuarioController();

                                  $notas-> ctrAgregarNota();

                              ?>

                      
                      </form>


     
                    </div>


                  </div>
      
              </div>

    
    </div>
  </div>
</div>






<div id="modalEditarItem" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
         
             <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" style="color:red">&times;</button>
                  <div class="box-body">
         

                    <div class="form-group col-md-12">


                      <form method="post"  enctype="multipart/form-data" id="formulario">

                           <div class="form-group">
                             
                             <select name="listarItem" id="" class="color medida form-control">
                               <option value="">Seleccione el item a editar</option>

                               <?php 

                               $item = UsuarioController::ctrVerNotas();

                                   foreach ($item as $key => $value) {
                                     
                                     echo '<option value="'.$value["ID"].'">'.$value["NOTA"].'</option>';
                                   }


                                ?>
                               
                             </select>
      

                           </div>


                           <div class="input-group">
                             <input type="text" name="editarItem" placeholder="Escribe un nuevo valor aquí..." class="color medida form-control" >
                           
                               <span class="input-group-btn">
                                     <button type="submit" class="medida btn btn-warning btn-flat boton"><i class="fas fa-sync-alt"></i></button>
                                </span>

                           </div>

                           <?php 
                               
                               $nota = new UsuarioController();

                               $nota-> ctrEditarNota();


                            ?>

                      </form>


     
                    </div>


                  </div>
      
              </div>

    
    </div>
  </div>
</div>





<div id="modalEliminarItem" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
         
             <div class="modal-body">
               <button type="button" class="close" data-dismiss="modal" style="color:red">&times;</button>
                  <div class="box-body">
         

                    <div class="form-group col-md-12">


                      <form method="post"  enctype="multipart/form-data" id="formulario">

                           <div class="input-group">
                             
                             <select name="eliminarItem" id="" class="color medida form-control">
                               <option value="">Seleccione el item a editar</option>

                               <?php 

                               $item = UsuarioController::ctrVerNotas();

                                   foreach ($item as $key => $value) {
                                     
                                     echo '<option value="'.$value["ID"].'">'.$value["NOTA"].'</option>';
                                   }


                                ?>
                               
                             </select>

                             <span class="input-group-btn">
                                   <button type="submit" class="medida btn btn-danger btn-flat boton"><i class="fa fa-trash-o"></i></button>
                              </span>
      

                           </div>




                           <?php 
                               
                               $nota = new UsuarioController();

                               $nota-> ctrEliminarNotas();


                            ?>

                      </form>


     
                    </div>


                  </div>
      
              </div>

    
    </div>
  </div>
</div>






<di class="col-xs-12 col-md-6">
    <div class="box box-warning">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>

        <h3 class="box-title">Lista de tareas pendientes</h3>

        <div class="box-tools pull-right">
            
             <ul class="pagination pagination-sm inline">
                
                <li> <button class="btn" data-toggle="modal" data-target="#modalEliminarItem"><i class="fa fa-trash-o text-danger"></i></button></li>
               
              </ul>

          </div>

      
      </div>


   
      <div class="box-body">
  
        <ul class="todo-list" id="seccionCargar">

           <?php 


                $verNotas = UsuarioController::ctrVerNotas();

                $colores = array("green", "red", "orange", "black", "blue", "pink");

                foreach ($verNotas as $key => $value) {

                 echo '  

                        <li>
                        
                          <span class="text" style="color:'.$colores[array_rand($colores)].'">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                          </span>
                        
                         
                         
                          <span class="text-sm" >'.$value["NOTA"].'</span>
                 
                          <small class="label label-danger"><i class="fa fa-clock-o"></i> '.$value["FECHA"].'</small> 
                          <small class="label label-primary">'.$value["NOMBRE"].' '.$value["APELLIDO"].'</small> 

                        </li>
                       

                 ';
                  
                }



            ?>    

    
        </ul>

      </div>
      
      <div class="box-footer clearfix no-border">

        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalNuevoItem">  <i class="fa fa-plus"></i></button> 
        <button type="button" class="btn btn-primary pull-left " data-toggle="modal" data-target="#modalEditarItem"> <i class="fa fa-sync-alt"></i></button>
      </div>
    </div>
</di>
















