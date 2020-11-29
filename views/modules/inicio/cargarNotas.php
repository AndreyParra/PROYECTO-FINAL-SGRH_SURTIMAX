<?php 

    require_once "../../../controllers/UsuarioController.php";
    require_once "../../../models/Usuario.php";

     $verNotas = UsuarioController::ctrVerNotas();

     $colores = array("green", "red", "orange", "black", "blue", "pink");

     foreach ($verNotas as $key => $value) {

      echo '  

             <li>
             
               <span class="text" style="color:'.$colores[array_rand($colores)].'">
                     <i class="fa fa-ellipsis-v"></i>
                     <i class="fa fa-ellipsis-v"></i>
               </span>
             
              
              
               <span class="text">'.$value["NOTA"].'</span>
      
               <small class="label label-danger"><i class="fa fa-clock-o"></i> '.$value["FECHA"].'</small> 
               <small class="label label-primary">'.$value["NOMBRE"].' '.$value["APELLIDO"].'</small> 
               <div class="tools">
                 <i class="fa fa-trash-o"></i>
               </div>
             </li>
            

      ';
       
     }



 ?>    