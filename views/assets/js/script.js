/*menu---------------------------------------------------------*/
$(function(){
	var header = document.getElementById('header');
	var headroom = new Headroom(header);
	headroom.init();

    /*menu responsive 
    calculamos el ancho de la pagina*/
	var ancho=$(window).width(),/*ocultar enlaces y mostrar el icono de lineas*/
		enlaces = $('#enlaces'),
		btnMenu = $('#btn-menu'),
		icono = $('#btn-menu .icono')
		if (ancho <= 1076) { /*activar responsive*/ 
			enlaces.hide();
			icono.addClass('fa-bars');
		}
		btnMenu.on('click',function(e){
			enlaces.slideToggle(); 
			icono.toggleClass('fa-bars');
			icono.toggleClass('fa-times');

		});
		$(window).on('resize',function(){
			if ($(this).width() > 1076){ /* a mayor resolucion se deben mostrar los enlaces*/
				enlaces.show();
				icono.addClass('fa-times');
				icono.removeClass('fa-bars');
			}else{
				enlaces.hide();
				icono.addClass('fa-bars');
				icono.removeClass('fa-times');
			}	
		});
});


/*dark-------------------------------------------------------*/
const btnSwitch = document.querySelector('#switch'); /*estas lineas de codigo hacen que al presionar el div se agregue la clase dark al body*/

btnSwitch.addEventListener('click', () => { 
	document.body.classList.toggle('dark');
	btnSwitch.classList.toggle('active'); /* al presionar el boton se activa esta animacion*/ 



	//guardar modo en localStorage para que el efecto se mantenga cuando el usuario actualice la pagina

	if(document.body.classList.contains('dark')) { //este metodo permite comprobar si la lista de clases de body contiene la clase de dark
	  localStorage.setItem('dark-mode', 'true' );            //si la tiene se accede a la clase localStorage con el metodo y se almacenan los dos valores, solo se pueden almacenar cadenas de texto
	  
	}else {
      localStorage.setItem('dark-mode', 'false' ); //de no ser asi el valor almacenado sera false   
	}
});

// comprobacion para saber que valor se almacena en localStorage

if(localStorage.getItem('dark-mode') === 'true') {
   document.body.classList.add('dark');           // si es verdadero se agrega la clase de dark
   btnSwitch.classList.add('active'); //hace que al actualizar el boton mantenga la lista de clases
}else {
	document.body.classList.remove('dark');     // si es falso se remueve la clase de dark
	btnSwitch.classList.remove('active'); //hace que al actualizar se remuevan las clases del boton
}
/*visualizar contraseña------------------------------------*/

var iconEye = document.querySelector("#IconEye");
var inputPassword = document.querySelector("#passwordEye");

iconEye.addEventListener("click", function(){
  this.classList.toggle("active");
  
  if(inputPassword.type == "password"){
    inputPassword.type = "text";
  }
  else{
    inputPassword.type = "password";
  }
  
});

$(document).ready(function(){
	$(".hamburger").click(function(){
	   $(".wrapper").toggleClass("collapse");
	});
});

// calendar

