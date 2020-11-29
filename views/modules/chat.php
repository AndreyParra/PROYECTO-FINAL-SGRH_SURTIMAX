  <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<div class="content-wrapper">

  <section class="content">

               <div class="row">
                 <div class="col-md-5" style="margin-left: 25%; margin-top: 5%;">
                   <!-- DIRECT CHAT -->
                   <div class="box box-warning direct-chat direct-chat-warning">
                     <div class="box-header with-border">
                       <h3 class="box-title">Chat grupal <i class="fa fa-circle text-success" style="font-size: 8px;"></i></h3>

                       <div class="box-tools pull-right">

                            <form action="" method ="post">

                            <input type="hidden" value="eliminar" name="eliminarTodo">
                               <button type="submit" class="btn btn-box-tool bg-white" ><i class="far fa-trash-alt text-danger"></i></button>

                                <?php
                                    $delete = new UsuarioController();
                                    
                                    $delete->ctrEliminarChat();
                                ?>

                            </form>

                       </div>
                     </div>
           
                     <div class="box-body">       
                       <div class="direct-chat-messages" id="seccionRecargar">

                       </div>                  
                     </div>

                     <div class="box-footer">    
                          <form action="" method="post" id="hola">
                            <div class="input-group">
                              <input type="text" name="msg" id="msg" placeholder="Escribe un mensaje ..." class="form-control" >
                              
                              <span class="input-group-btn">
                                    <button type="submit" class="btn btn-warning btn-flat boton"><i class="fas fa-paper-plane"></i></button>
                               </span>

                            </div>

                          <?php 
                              
                              $nuevoMensaje = new UsuarioController();

                              $nuevoMensaje -> ctrNuevoMensaje();

                           ?>

                          </form>

                     </div>
                   </div>
                 </div>
               </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    setInterval(
        function(){
          $('#seccionRecargar').load('views/modules/mensajes.php');
        },0
      );
  });
</script>



