

<?php 

 function PlantillaEmpleado ($respuesta){
  $Plantilla='

     <body>
     
     <header class="clearfix">
           <div id="logo">
             <img src="ReportePDF/Plantilla/logo-aliado.png" class="img" width="150">
           </div>
           <div id="company">
             <h2 class="name">MERKA MAX PG | ALIADO SURTIMAX</h2>
             <div>Cl. 166 Bis #54-93, Bogotá</div>
             <div>6892789</div>
             <div>merkamaxpg12@gmail.com</div>
           </div>
           </div>
      </header>';




              
               foreach ($respuesta as $value) {

                if(strlen($value["NumDocument"]) == 10) {

                   $imagen = '..'.substr($value["Photo"], -39);

                 }else if(strlen($value["NumDocument"]) == 7) {

                   $imagen = '..'.substr($value["Photo"], -36);

                 }else if(strlen($value["NumDocument"]) == 8) {

                   $imagen = '..'.substr($value["Photo"], -37);

                 }else if(strlen($value["NumDocument"]) == 9) {

                   $imagen = '..'.substr($value["Photo"], -38);

                 }

                if ($value["Status"] == "A") {

                   $Plantilla .='<h1> Reporte de Empleado Activo</h1> <br><br>';
                  
                 }else {
                   
                   $Plantilla .='<h1> Reporte de Empleado Inactivo</h1> <br><br>';

                  }



           if($value["Photo"] != ""){
              
           $Plantilla .='

           <div style="margin-left:8%;">
              <img src="'.$imagen.'" class="img" width="90" height="90">  
           </div>';
           
           }else {

             $Plantilla .='

             <div style="margin-left:8%;">
               <img src="../assets/img/avatar.png" class="img" width="90" height="90">  
            </div>';
            
           } 

             $Plantilla .=' <table style="margin-top:7%;">

              

               <tbody>


                 <tr>
                   <td class="service"><b>Nombre(s):</b> '.$value["Name"].'</td>
                   <td class="service"><b>Apellidos:</b> '.$value["LastName"].'</td>
                 </tr>

                 <tr>
                   <td class="service"><b>Documento:</b> '.$value["TypeDocument"].' '.$value["NumDocument"].'</td>
                   <td class="service"><b>Fecha de nacimiento:</b> '.$value["Birthdate"].'</td>
                 </tr>

                 <tr>
                   <td class="service"><b>Género:</b> ';

                   if ($value["Gender"] == "M") {

                     $Plantilla .='Masculino</td>';
                    
                   }else {


                  $Plantilla .='Femenino</td>';

                  }


                   
                $Plantilla .='

                   <td class="service"><b>Estado civil:</b> ';

                   if ($value["Maritalstatus"] == "S") {

                     $Plantilla .='Soltero</td>';
                    
                   }else if ($value["Maritalstatus"] == "V") {


                  $Plantilla .='Viudo</td>';

                  }else if ($value["Maritalstatus"] == "C") {


                  $Plantilla .='Casado</td>';

                  }


                   
                $Plantilla .='</tr>


                <tr>
                  <td class="service"><b>Dirección:</b> '.$value["Address"].'</td>
                  <td class="service"><b>Correo electrónico:</b> '.$value["Mail"].'</td>
                </tr>

                <tr>
                  <td class="service"><b>Teléfono:</b> '.$value["Phone"].'</td>
                  <td class="service"><b>Celular:</b> '.$value["cellphone"].'</td>
                </tr>

                <tr>
                  <td class="service"><b>ARL:</b> '.$value["Arl"].'</td>
                  <td class="service"><b>EPS:</b> '.$value["Eps"].'</td>
                </tr>

                
               </tbody>
             </table><br><br>';


              }

           $Plantilla .='
       </div>
       <br>
       <br>
     </section>
     
   </body>
   
 ';

  return $Plantilla;
}



