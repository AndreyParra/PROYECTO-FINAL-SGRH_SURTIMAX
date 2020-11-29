
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
	<link rel="stylesheet" href="views/assets/css/generales.css">

<body class="errorPagina">
	
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404"></div>
			<h1>404</h1>
			<h2>Oops! Página no encontrada.</h2>
			<p>Lo sentimos, esta página no se encuentra disponible</p>
			<a href="inicio" class="btn btn-danger">Inicio <i class="fas fa-home"></i></a>
		</div>
	</div>













	<div class="content-wrapper">

	  <section class="content">


	             <!-- Left col -->
	               <!-- MAP & BOX PANE -->
	              
	               <!-- /.box -->
	               <div class="row">
	                 <div class="col-md-5" style="margin-left: 25%; margin-top: 5%;">
	                   <!-- DIRECT CHAT -->
	                   <div class="box box-warning direct-chat direct-chat-warning">
	                     <div class="box-header with-border">
	                       <h3 class="box-title">Chat grupal <i class="fa fa-circle text-success" style="font-size: 8px;"></i></h3>

	                       <div class="box-tools pull-right">

	          
	                         <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
	                                 data-widget="chat-pane-toggle">
	                           <i class="fa fa-comments"></i></button>

	                           <a class="btn btn-box-tool" ><i class="far fa-trash-alt text-danger"></i></a>
	                       </div>
	                     </div>
	                     <!-- /.box-header -->
	                     <div class="box-body">
	                       <!-- Conversations are loaded here -->
	                       <div class="direct-chat-messages" id="datos-chat">

	                        <?php 
	                        
	                        $item = null;

	                        $chat = UsuarioController::ctrChatUsuario($item);

	                          foreach ($chat as $key => $value) {

	                            if($_SESSION["nombre"] == $value["USUARIO"]) {

	                               echo '<div class="direct-chat-msg right">
	                                    <div class="direct-chat-info clearfix">
	                                      <span class="direct-chat-name pull-right">'.$value["USUARIO"].'</span>
	                                      <span class="direct-chat-timestamp pull-left">'.$value["FECHA"].'</span>
	                                     </div>
	                                    
	                                    <img class="direct-chat-img" src='.$value["FOTO"].' alt="message user image">
	                                    
	                                    <div class="direct-chat-text">'.$value["MENSAJE"].'</div>

	                                 </div>';


	                            }else {
	                            
	                                  echo '<div class="direct-chat-msg">
	                                      <div class="direct-chat-info clearfix">
	                                        <span class="direct-chat-name pull-left">'.$value["USUARIO"].'</span>
	                                        <span class="direct-chat-timestamp pull-right">'.$value["FECHA"].'</span>
	                                      </div>
	                                                  
	                                  <img class="direct-chat-img" src='.$value["FOTO"].' alt="message user image">
	                                                  
	                                  <div class="direct-chat-text">'.$value["MENSAJE"].'</div>
	                                                
	                                  </div>';

	                         
	                          }
	                       
	                         }

	                       ?>

	                       </div>
	                       
	                       <div class="direct-chat-contacts">
	                         <ul class="contacts-list">
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       Count Dracula
	                                       <small class="contacts-list-date pull-right">2/28/2015</small>
	                                     </span>
	                                 <span class="contacts-list-msg">How have you been? I was...</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       Sarah Doe
	                                       <small class="contacts-list-date pull-right">2/23/2015</small>
	                                     </span>
	                                 <span class="btn-small btn-success"> Activo</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       Nadia Jolie
	                                       <small class="contacts-list-date pull-right">2/20/2015</small>
	                                     </span>
	                                 <span class="contacts-list-msg">I'll call you back at...</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       Nora S. Vans
	                                       <small class="contacts-list-date pull-right">2/10/2015</small>
	                                     </span>
	                                 <span class="contacts-list-msg">Where is your new...</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       John K.
	                                       <small class="contacts-list-date pull-right">1/27/2015</small>
	                                     </span>
	                                 <span class="contacts-list-msg">Can I take a look at...</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                           <li>
	                             <a href="#">
	                               <img class="contacts-list-img" src="views/assets/img/avatar.png" alt="User Image">

	                               <div class="contacts-list-info">
	                                     <span class="contacts-list-name">
	                                       Kenneth M.
	                                       <small class="contacts-list-date pull-right">1/4/2015</small>
	                                     </span>
	                                 <span class="contacts-list-msg">Never mind I found...</span>
	                               </div>
	                               <!-- /.contacts-list-info -->
	                             </a>
	                           </li>
	                           <!-- End Contact Item -->
	                         </ul>
	                         <!-- /.contatcts-list -->
	                       </div>
	                       <!-- /.direct-chat-pane -->
	                     </div>
	                     <!-- /.box-body -->
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
	                     <!-- /.box-footer-->
	                   </div>
	                   <!--/.direct-chat -->
	                 </div>
	                 <!-- /.col -->
	               </div>
	               <!-- /.row -->

	           
	          
	             <!-- /.col -->

	           
	             <!-- /.col -->

	     
	 

	    <!-- /.box -->

	  </section>
	  <!-- /.content -->
	</div>


