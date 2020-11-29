

<header class="main-header" style="background-color: #302020;">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo  -->
    <span class="logo-mini">
      <img src="views/assets/img/logo-mini.png" class="img-responsive">
    </span>
    <!-- logo normal -->
    <span class="logo-lg">
      <img src="views/assets/img/logo-aliado.png" class="img-responsive" style="width: 48%; margin-top:1%; margin-left:5%;">
    </span>
  </a>
  
 <nav class="navbar navbar-static-top">

       <!-- Sidebar toggle button-->
       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
       </a>

       <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">

           <!-- User Account: style can be found in dropdown.less -->
           <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">


                <?php if ($_SESSION["foto"] == "") {  ?>

                  <img src="views/assets/img/avatar.png" class="user-image" alt="User Image">

                <?php }else {?>
                 
                      <img src="<?php  echo $_SESSION["foto"]?>" class="user-image" alt="User Image">

                 <?php } ?>

               <span class="hidden-xs"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"] ?></span>
             </a>
             <ul class="dropdown-menu">
               <!-- User image -->
               <li class="user-header">
                  
                  <?php if ($_SESSION["foto"] == "") {  ?>

                    <img src="views/assets/img/avatar.png" class="img-circle" alt="User Image">

                  <?php }else {?>
                   
                        <img src="<?php  echo $_SESSION["foto"]?>" class="img-circle" alt="User Image">

                   <?php } ?>

                 <p style="color:#606469 ">
                  <?php  echo $_SESSION["email"]?>
                 <br><?php echo $_SESSION["tipoDoc"]." ".$_SESSION["cedula"] ?>
                 </p>
               </li>

               <!-- Menu Footer-->
               <li class="user-footer">
                 
                 <div class="btn-group">
                   <a href="#" class="btn-sm btn-success " data-toggle="modal" data-target="#modalNuevaContrasena">Configuracion <i class="icon-settings1"></i></a>
                   <a href="salir" class="btn-sm btn-danger ">Cerrar sesión <i class="icon-log-out1"></i></a>
                 </div>
               </li>
             </ul>
           </li>

         </ul>
       </div>
     </nav>
     

</header>









<!-- MODAL NUEVO USUARIO  -->
<!-- Trigger the modal with a button -->

<div id="modalNuevaContrasena" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <div class="modal-content" style="border-radius: 15px;">



           
               <div class="modal-body box box-warning">
                 <button type="button" class="close" data-dismiss="modal" style="color:red">&times;</button>
                  <h3 class="text-center">Editar mi contraseña <i class="fas fa-unlock-alt"></i></h3>
                    <div class="box-body">


           

                      <div class="form-group col-md-12">


                        <form method="post"  enctype="multipart/form-data" class="formulariio">

                             <div class="form-group validar">
                               
                               <label for="password" style="color:black;"><i class="fas fa-key"></i> Contraseña actual:</label>
                               <input type="password" class="color medida form-control" placeholder="Digíte su contraseña actual" name="conActual" id="conActual" codigo="<?php echo $_SESSION["codigo"]?>" onpaste="return false;">

                             </div>

                             <div class="form-group validar">
                               
                               <label for=""><i class="fas fa-lock"></i> Nueva contraseña:</label>
                               <input type="password" class="color medida form-control" placeholder="Digíte su nueva contraseña" name="conNueva" id="password" onpaste="return false;">

                             </div>


                             
                             <div class="form-group validar">
                              <label for=""><i class="fas fa-lock"></i> Confirmar contraseña: </label>
                               <input type="password" name="conConfirmar" placeholder="Digíte su nueva contraseña nuevamente" class="color medida form-control"  onpaste="return false;">
                             
                             </div>

                             <div class="modal-footer">
                                  <div class="btn-group pull-right">
                                    <button type="reset" class="medida btn btn-default">Limpiar <i class="icon-delete1"></i></button>

                                    <button type="submit" class="medida btn btn-success">Guardar <i class="icon-save2"></i></button>
                                  </div>
                             </div>


                             <?php 
                                 
                                 $clave  = new UsuarioController();

                                 $clave -> ctrEditarClave();


                              ?>

                        </form>


       
                      </div>


                    </div>
        
                </div>

      
      </div>
  </div>
</div>



<script src="views/assets/js/password.js"></script>
