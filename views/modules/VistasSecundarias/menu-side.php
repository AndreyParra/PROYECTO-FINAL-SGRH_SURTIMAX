
<aside class="main-sidebar">
	<section class="sidebar">

		<div class="user-panel">
		  <div class="pull-left image">

		  	<?php if ($_SESSION["foto"] == "") {  ?>

		  		<img src="views/assets/img/avatar.png" class="img-circle" alt="User Image">

		  	<?php }else {?>
		    
		         <img src="<?php  echo $_SESSION["foto"]?>" class="img-circle" alt="User Image">

		    <?php } ?>
		  
		  </div>
		  <div class="pull-left info">
		    <p><?php echo $_SESSION["rol"] ?></p>
		    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  </div>
		</div><br><br>
		
		<ul class="sidebar-menu">
		    
		    <?php 
		       include "views/modules/VistasSecundarias/diseño.php"; 
		     ?>	 
		
		    	
		    <li class="<?php echo $active ?>">	    
		    	<a href="menu">
		    		<i class="icon-home2"></i>
		    		<span> Inicio</span>
		    	</a>
		    </li>	


            <?php

             if($_SESSION["rol"] == "Administrador") {

             	echo '<li class="<?php echo $active1 ?>">
		    	    <a href="usuarios">
		    		   <i class="icon-person_outline"></i>
		    		   <span> Usuarios</span>
		    	    </a>
		          </li>';
             }


            ?>
		    	

		    <li class="<?php echo $active2 ?>">
		    	<a href="empleados">
		    		<i class="icon-briefcase"></i>
		    		<span>  Empleados</span>
		    	</a>
		    </li>	

		    <li class="<?php echo $active3 ?>">
		    	<a href="aspirantes">
		    		<i class="icon-users"></i>
		    		<span> Aspirantes</span>
		    	</a>
		    </li>	

<!-- 		    <li class="<?php echo $active4 ?>">
		    	<a href="convocatorias">
		    		<i class="icon-list"></i>
		    		<span> Convocatoria</span>
		    	</a>
		    </li>	
 -->
		    <li class="<?php echo $active6 ?>">
		    	<a href="citas">
		    		<i class="icon-event_note"></i>
		    		<span> Citas</span>
		    	</a>
		    </li>	

	
		    <li class="<?php echo $active5 ?>">
		    	<a href="vacantes">
		    		<i class="icon-documents"></i>
		    		<span> Vacantes</span>
		    	</a>
		    </li>
		    <br>
		    <li class="">
		    	<a href="chat">
		    		<i class="icon-message-circle"></i>
		    		<span> chat</span>
		    	</a>
		    </li>	

		</ul>



	</section>
</aside>