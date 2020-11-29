<?php 

require_once "../../controllers/UsuarioController.php";
require_once "../../models/Usuario.php";


 

 $chat = UsuarioController::ctrChatUsuario();

   foreach ($chat as $key => $value) {

     
           echo '<div class="direct-chat-msg">
               <div class="direct-chat-info clearfix">
                 <span class="direct-chat-name pull-left">'.$value["USUARIO"].'</span>
                 <span class="direct-chat-timestamp pull-right">'.$value["FECHA"].'</span>
               </div>
                           
           <img class="direct-chat-img" src='.$value["FOTO"].' alt="message user image">
                           
           <div class="direct-chat-text">'.$value["MENSAJE"].'</div>
                         
           </div>';

  
   }


?>


