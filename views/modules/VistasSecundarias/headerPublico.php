<head>
    <link rel="stylesheet" href="views/assets/css/generales.css">
    <script src="views/assets/js/headroom.min.js"></script>
    <script src="views/assets/js/script.js"></script>
</head>
<header id="header">
    <nav class="menu">
        <div class="logo">
            <a href="#"><img src="views/assets/img/logo.png" alt=""></a>
            <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars" aria-hidden="true"></i></a>
        </div>
      
        <div class="enlaces" id="enlaces">
            <a href="inicio"><i class="icon-home2" aria-hidden="true"></i>Inicio</a>
            <a href="convocatorias" ><i class="icon-briefcase" aria-hidden="true"></i> Convocatoria</a>
            <a href="#" data-toggle="modal" data-target="#modalNuevoUsuario"><i class="icon-login" aria-hidden="true"></i> Iniciar Sesión</a>
        </div>
    </nav>
</header>







<div id="modalNuevoUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

   <div class="login-box" style="background:white">

    <button type="button" class="close" data-dismiss="modal" style="margin-right: 2%;">&times;</button>
     
     <ul class="nav nav-tabs" role="tablist">
       <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Iniciar Sesión</a></li>
       <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Recordar Clave</a></li>
     </ul>

     <div class="tab-content">
        

         <div class="login-box tab-pane active" id="home" role="tabpanel">

           <div class="login-box-body">
             <div class="login-logo">
               <img src="views/assets/img/maxx.png" width="150px" >
               <h3>Iniciar Sesión</h3>
             </div>

             <form action="" method="post" id="login">
               
               <div class="form-group has-feedback validar">
                   <input type="text" class="color medida form-control" placeholder="Correo electrónico" name="email">
               </div>
               
               <div class="form-group has-feedback validar">
                     <div class="input-group ">
                         <input type="password" class="color medida form-control" id="passwordEye" placeholder="Contraseña" name="password" onpaste="return false;">
                        <span class="color input-group-addon" id="IconEye" style="background: #DCDEE3;"><i class="fas fa-eye"></i></span>
                     </div>
               </div>

                
               <button type="submit" class="medida btn btn-danger btn-block btn-flat">Ingresar <i class="fas fa-arrow-right"></i></button>


                 <?php 

                    $login = new LoginController();
                    $login -> ctrLogin();
                  
                  ?>
                  <script type="text/javascript" src="views/assets/js/validar.js"></script>
             </form>

           </div>
         </div>

       
       <div role="tabpanel" class="tab-pane" id="profile">
         

         <div class="login-box" >

           <div class="login-box-body">
             <div class="login-logo">
               <img src="views/assets/img/logo-aliado.png" width="150px" >
               <h3>Solicitud de nueva contraseña</h3>
             </div>

             <form action="" method="post" id="login">
               
               <div class="form-group has-feedback validar">
                   <input type="email" class="color medida form-control" placeholder="Digíte su correo electrónico" name="emailRecuperar">
               </div>
                
               <button type="submit" class="medida btn btn-danger btn-block btn-flat">Aceptar <i class="fas fa-arrow-right"></i></button>


                 <?php 

                    $login = new UsuarioController();
                    $login -> ctrRecuperarClave();
                  
                  ?>

             </form>

           </div>
         </div>


       </div>
     </div>

   </div>

  </div>
</div>



<script src="views/assets/js/visualizar.js"></script>


