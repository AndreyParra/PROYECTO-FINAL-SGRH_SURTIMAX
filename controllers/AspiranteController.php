<?php


class AspiranteController
{
	public static function ListarAspirantesAgendados()
	{

		$respuesta = Aspirante::AspirantesAgendados();

		return $respuesta;
	}
	public static function ctrNuevoEmpleado(){
		
		if(isset($_POST["fullname"])) {

			$fullname =  strtoupper($_POST["fullname"]);
            $lastname =  strtoupper($_POST["lastname"]);
            $tipo = $_POST["tipo"];
            $document = $_POST["document"];
            $direccion = strtoupper($_POST["direccion"]);
            $fecha = $_POST["fecha"]; 
            $tel = $_POST["tel"];
            $cel = $_POST["cel"]; 
            $email = $_POST["email"];
            $tipoGen = $_POST["tipoGen"];
            $tipoEst = $_POST["tipoEst"];
            $eps =  strtoupper($_POST["eps"]); 
            $arl =  strtoupper($_POST["arl"]);
            $codigoOcupacion = $_POST["codigoOcupacion"];
			$codigoEmpleado = $_SESSION["codigo"];
			$ruta = $_POST["Photo"];

  			$respuesta = Empleado::nuevoEmpleado($fullname, $lastname, $tipo, $document, $direccion, 
			$fecha, $tel, $cel, $email, $tipoGen, $tipoEst, $eps, $arl, $ruta, $codigoOcupacion, $codigoEmpleado);
			
			$respuesta1 = Aspirante::contratar($document);


            if($respuesta == "ok") {

				echo "<script>

  			    	   Swal.fire({
  			    	     icon: 'success',
  			    	     title: '¡Operación completada!',
  			    	     title: 'Aspirante contratado',
  			    	   })


  			    	</script>";

			}else {

				echo "<script>

  				   Swal.fire({
  				     icon: 'error',
  				     title: 'Oops...',
  				     title: '¡Revisa el formato de los campos e intenta de nuevo!',
  				   })


				  </script>";
				  
			}
		}

    }
	
	public static function nuevaFoto() {

		if(isset($_POST["NumDocument"])) {

			$ruta="";
            if(isset($_FILES["Photo"]["tmp_name"])){

              list($ancho, $alto) = getimagesize($_FILES["Photo"]["tmp_name"]);

              $nuevoAncho = 500;
              $nuevoAlto = 500;

              /*=============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
              =============================================*/

              $directorio = "views/assets/img/usuarios/".$_POST["NumDocument"];

              mkdir($directorio, 0755);

              /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

              if($_FILES["Photo"]["type"] == "image/jpeg"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["NumDocument"]."/".$aleatorio.".jpg";

                $origen = imagecreatefromjpeg($_FILES["Photo"]["tmp_name"]);            

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);

              }

              if($_FILES["Photo"]["type"] == "image/png"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["NumDocument"]."/".$aleatorio.".png";

                $origen = imagecreatefrompng($_FILES["Photo"]["tmp_name"]);           

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);

              }

            }

		}
			
	}

	public static function ctrContarAspirantes()
	{

		$tabla = "candidate";

		$respuesta = Aspirante::contarAspirantes($tabla);

		return $respuesta;
	}
	static public  function ListarAspirantes()
	{
		$tabla = "candidate";
		$respuesta = Aspirante::SelectAspirantes($tabla);
		return $respuesta;
	}

	static public  function ListarAspirantesContratados()
	{
		$tabla = "candidate";
		$respuesta = Aspirante::SelectAspirantesContratados($tabla);
		return $respuesta;
	}

	static public  function NuevoAspirante()
	{
		if (isset($_POST["NumDocument"])) {

			$Document = $_POST["NumDocument"];
			
			$ruta="";
            if(isset($_FILES["Photo"]["tmp_name"])){

              list($ancho, $alto) = getimagesize($_FILES["Photo"]["tmp_name"]);

              $nuevoAncho = 500;
              $nuevoAlto = 500;

              /*=============================================
              CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
              =============================================*/

              $directorio = "views/assets/img/usuarios/".$_POST["NumDocument"];

              mkdir($directorio, 0755);

              /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

              if($_FILES["Photo"]["type"] == "image/jpeg"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["NumDocument"]."/".$aleatorio.".jpg";

                $origen = imagecreatefromjpeg($_FILES["Photo"]["tmp_name"]);            

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);

              }

              if($_FILES["Photo"]["type"] == "image/png"){

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100,999);

                $ruta = "views/assets/img/usuarios/".$_POST["NumDocument"]."/".$aleatorio.".png";

                $origen = imagecreatefrompng($_FILES["Photo"]["tmp_name"]);           

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);

              }

            }


			


			/*================================
		 =            Personal            =
		 ================================*/
			
		 $Name =  strtoupper($_POST["Name"]);
		 $LastName =  strtoupper($_POST["LastName"]);
		 $Type = $_POST["TDocument"];
		
		 $Phone = $_POST["CPhone"];
		 $Cellphone = $_POST["CCellphone"]; 
		 $CBirthDate = $_POST["CBirthDate"];
		 $Address = $_POST["CAddress"];
		 $Mail = $_POST["CMail"];
		 $Gender = $_POST["CGender"];
		 $MaritalStatus = $_POST["CMaritalStatus"]; 
		 $CDescription = $_POST["CDescription"];
		 $Status = "A";
  
		 $respuesta = Aspirante::InsertarCandidato($Name,$LastName,$Type,$Document,$Phone,$Cellphone,$CBirthDate,$Address,$Mail,$Gender,$MaritalStatus,$ruta,$CDescription,$Status);


			/*===================================
		 =            Referencias            =
		 ===================================*/
			
		 $DocRefe1 = $_POST["DocRefe1"]; 
		 $NombreRefe1 = strtoupper($_POST["NombreRefe1"]);
		 $OcupacionRefe1 = strtoupper($_POST["OcupacionRefe1"]); 
		 $ParentescoRefe1 = $_POST["ParentescoRefe1"];
		 $TelefonoRefe1 = $_POST["TelefonoRefe1"]; 
		 $DocRefe2 = $_POST["DocRefe2"]; 
		 $NombreRefe2 = strtoupper($_POST["NombreRefe2"]);
		 $OcupacionRefe2 = strtoupper($_POST["OcupacionRefe2"]); 
		 $ParentescoRefe2 = $_POST["ParentescoRefe2"];
		 $TelefonoRefe2 = $_POST["TelefonoRefe2"]; 
		 $DocRefe3 = $_POST["DocRefe3"]; 
		 $NombreRefe3 = strtoupper($_POST["NombreRefe3"]);
		 $OcupacionRefe3 = strtoupper($_POST["OcupacionRefe3"]); 
		 $ParentescoRefe3 = $_POST["ParentescoRefe3"];
		 $TelefonoRefe3 = $_POST["TelefonoRefe3"]; 

  
		$respuestaReferencias = Aspirante::InsertarReferenciaCandidato($DocRefe1,$NombreRefe1,$OcupacionRefe1,$ParentescoRefe1,$TelefonoRefe1,$DocRefe2,$NombreRefe2,$OcupacionRefe2,$ParentescoRefe2,$TelefonoRefe2,$DocRefe3,$NombreRefe3,$OcupacionRefe3,$ParentescoRefe3,$TelefonoRefe3,$Document);

			/*==============================
		 =            Idioma            =
		 ==============================/****/
			
		 $Idioma1 = $_POST["Idioma1"];
		 $Institucion1 = $_POST["Institucion1"];
		 $Idioma2 = $_POST["Idioma2"];
		 $Institucion2 = $_POST["Institucion2"];
		 $Idioma3 = $_POST["Idioma3"];
		 $Institucion3 = $_POST["Institucion3"];
		 $respuestaIdioma = Aspirante::InsertarIdiomaCandidato($Idioma1,$Institucion1,$Idioma2,$Institucion2,$Idioma3,$Institucion3,$Document);
		 

			/*===================================
		 =            Experiencia            =
		 ===================================*/

			$Compania1 = strtoupper($_POST["Compania1"]);
			$Jefe1 = strtoupper($_POST["Jefe1"]);
			$DocJefe1 = $_POST["DocJefe1"];
			$TelefonoJefe1 = $_POST["TelefonoJefe1"];
			$CargoAntes1 = strtoupper($_POST["CargoAntes1"]);

			$Compania2 = strtoupper($_POST["Compania2"]);
			$Jefe2 = strtoupper($_POST["Jefe2"]);
			$DocJefe2 = $_POST["DocJefe2"];
			$TelefonoJefe2 = $_POST["TelefonoJefe2"];
			$CargoAntes2 = strtoupper($_POST["CargoAntes2"]);

			$Compania3 = strtoupper($_POST["Compania3"]);
			$Jefe3 = strtoupper($_POST["Jefe3"]);
			$DocJefe3 = $_POST["DocJefe3"];
			$TelefonoJefe3 = $_POST["TelefonoJefe3"];
			$CargoAntes3 = strtoupper($_POST["CargoAntes3"]);

			$respuestaExperiencia = Aspirante::InsertarExperienciaCandidato($Document, $Compania1, $Jefe1, $DocJefe1, $TelefonoJefe1, $CargoAntes1, $Compania2, $Jefe2, $DocJefe2, $TelefonoJefe2, $CargoAntes2, $Compania3, $Jefe3, $DocJefe3, $TelefonoJefe3, $CargoAntes3 );
	

			/*=================================
		=            Academica            =
		=================================*/

		    $Titulo1 = $_POST["Titulo1"];
			$Carrera1 = $_POST["Carrera1"];
			$TiempoEstudio1 = $_POST["TiempoEstudio1"];
			$InstitucionAcademica1 = $_POST["Instituion1"];

			$Titulo2 = $_POST["Titulo2"];
			$Carrera2 = $_POST["Carrera2"];
			$TiempoEstudio2 = $_POST["TiempoEstudio2"];
			$InstitucionAcademica2 = $_POST["Instituion2"];

			$Titulo3 = $_POST["Titulo3"];
			$Carrera3 = $_POST["Carrera3"];
			$TiempoEstudio3 = $_POST["TiempoEstudio3"];			
			$InstitucionAcademica3 = $_POST["Instituion3"];

			 $respuestaEstudios = Aspirante::InsertarEstudiosCandidato($Document, $Titulo1, $Carrera1, $TiempoEstudio1, $InstitucionAcademica1, $Titulo2, $Carrera2, $TiempoEstudio2, $InstitucionAcademica2, $Titulo3, $Carrera3, $TiempoEstudio3, $InstitucionAcademica3);
		
							
			 if ($respuesta == "ok") {
                
                echo "<script>

                   Swal.fire({
                     icon: 'success',
                     title: '¡Operación completada!',
                     title: 'Datos actualizados correctamente',
                   })


                </script>";
              } 
          else {

            echo "<script>

               Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 title: '¡Revisa el formato de los campos e intenta de nuevo!',
               })


            </script>";
          }
		   
		}
	}

	static public function MostrarLevel()
	{
		$tabla = "level";
		$respuesta = Aspirante::Datos($tabla);
		return $respuesta;
	}

	static public function MostrarLanguage()
	{
		$tabla = "typelanguage";
		$respuesta = Aspirante::Datos($tabla);
		return $respuesta;
	}

	static public function Reporte()
	{
		$tabla = "candidate";
		$respuesta = Aspirante::Datos($tabla);
		return $respuesta;
	}

	static public function AspirantePorID()
	{
		if (isset($_GET["Document"])) {
			$DocumentoAspirante = $_GET["Document"];
			$Academia = Reporte::Academico($DocumentoAspirante);
			$Experiencia = Reporte::Experiencia($DocumentoAspirante);
			$Idiomas = Reporte::Idiomas($DocumentoAspirante);
			$Referencias = Reporte::Referencias($DocumentoAspirante);
			$Informacion = Reporte::Informacion($DocumentoAspirante);

			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

			$Plantilla = '
			<body>';
			foreach ($Informacion as $key => $value) {
				$Plantilla .= '
			<div class="header">
				<header class="clearfix">
					<div class="container">
						<figure>
							<img src="../../views/assets/img/logo-aliado.png"alt="Logo" class="img" width="150">
						</figure>
					</div>
				</header>
			</div>
			<img src="../../'.$value["Photo"].'" class="Img1" alt="Foto">
			<br><br>
			<h1>' . $value["Name"] . ' ' . $value["LastName"] . '</h1>
			
			<fieldset>
				<legend><h3>Información Personal</h3></legend>
				<table>
					<tr>
						<td> Nombre Completo </td>
						<td> ' . $value["Name"] . ' ' . $value["LastName"] . ' </td>
					</tr>
					<tr>
						<td> Tipo y Documento</td>
						<td> ' . $value["TypeDocument"] . ' ' . $value["NumDocument"] . '</td>
					</tr>
					<tr>
						<td> Dirección </td>
						<td> ' . $value["Address"] . ' </td>
					</tr>
					<tr>
						<td> Fecha Nacimiento </td>
						<td> ' . $value["Birthdate"] . ' </td>
					</tr>
					<tr>
						<td> Teléfono Fijo  </td>
						<td> ' . $value["Phone"] . ' </td>
					</tr>
					<tr>
						<td> Teléfono Celular</td>
						<td> ' . $value["Cellphone"] . ' </td>
					</tr>
					<tr>
						<td> E-Mail </td>
						<td> ' . $value["Mail"] . ' </td>
					</tr>
					<tr>
						<td> Género </td>
						<td> ' . $value["Gender"] . ' </td>
					</tr>
					<tr>
						<td> Estado Civil </td>
						<td> ' . $value["Maritalstatus"] . ' </td>
					</tr>
					<tr>
						<td> Descripción </td>
						<td> ' . $value["DescriptionC"] . ' </td>
					</tr>
				</table>
			</fieldset>
			<br>';
			}
			$Plantilla .= '<fieldset>
			<legend><h3>Referencias</h3></legend>
				<table>
					<tr>
						<th># Documento</th>
						<th>Nombre </th>
						<th>Ocupación</th>
						<th>Asociación</th>
						<th>Teléfono</th>
					</tr>';

			foreach ($Referencias as $key => $value) {
				$Plantilla .= '<tr>
						<td>' . $value["NumDocument"] . '</td>
						<td>' . $value["Name"] . '</td>
						<td>' . $value["Occupation"] . '</td>
						<td>' . $value["Association"] . '</td>
						<td>' . $value["Phone"] . '</td>
					</tr>
					';
			}
			$Plantilla .= '</table>
				</fieldset>
			<br>
			<fieldset>
				<legend><h3>Idiomas</h3></legend>
				<table>
					<tr>
						<th>Institución</th>
						<th>Idioma</th>
					</tr>';

			foreach ($Idiomas as $key => $value) {
				$Plantilla .= '
					<tr>
						<td>' . $value["Institution"] . '</td>
						<td>' . $value["Name"] . '</td>
					</tr>';
			}
			$Plantilla .= '</table>
				</fieldset>
			<br>
			<fieldset>
				<legend><h3>Estudios</h3></legend>
				<table>
					<tr>
						<th>Nivel</th>
						<th>Nombre</th>
						<th>Tiempo</th>
						<th>Institución</th>
					</tr>';
			foreach ($Academia as $key => $value) {
				$Plantilla .= '
					<tr>
						<td>' . $value["Type"] . '</td>
						<td>' . $value["Name"] . '</td>
						<td>' . $value["Time"] . '</td>
						<td>' . $value["Institution"] . '</td>
					</tr>';
			}



			$Plantilla .= '		</table>
			</fieldset>
			<br>
			<fieldset>
				<legend><h3>Experiencia</h3></legend>
				<table>
					<tr>
						<th>Compañia</th>
						<th>Documento</th>
						<th>Jefe</th>
						<th>Teléfono</th>
						<th>Cargo Anterior</th>
						<th>Tiempo</th>
					</tr>';
			foreach ($Experiencia as $key => $value) {
				$Plantilla .= '<tr>
					
						<td>' . $value["Company"] . '</td>
						<td>' . $value["Document"] . '</td>
						<td>' . $value["Boss"] . '</td>
						<td>' . $value["Phone"] . '</td>
						<td>' . $value["Role"] . '</td>
						<td>' . $value["Time"] . '</td>
					</tr>';
			}
			$Plantilla .= '
				</table>
			</fieldset>
		
		</body>';


			$css = '*{
				font-family: arial,sans-serif;
			}
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}
	
			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}
			.Img1{
				float: right;
				width: 150px;
				position: absolute;
				right: 15px;
			}
	
			tr:nth-child(even) {
				background-color: #dddddd;
			}';

			$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
			$mpdf->writeHtml($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

			$mpdf->Output("Reporte.pdf", "I");
		}
	}


	static public function AspGeneral()
	{
		$C = "candidate";
		$Vacante = "";


		if (isset($_GET["General"])) {

			$respuesta = Reporte::Resultado($C);
			$titulo = "General";
		} elseif (isset($_GET["Auxiliar"])) {

			$Vacante = 4;
			$respuesta = Reporte::ResultadoEspecifico($C, $Vacante);
			$titulo = "Auxiliar";
		} elseif (isset($_GET["Cajero"])) {

			$Vacante = 1;
			$respuesta = Reporte::ResultadoEspecifico($C, $Vacante);
			$titulo = "Cajero";
		} elseif (isset($_GET["Bodeguista"])) {

			$Vacante = 2;
			$respuesta = Reporte::ResultadoEspecifico($C, $Vacante);
			$titulo = "Bodeguista";
		} elseif (isset($_GET["Domiciliario"])) {

			$Vacante = 3;
			$respuesta = Reporte::ResultadoEspecifico($C, $Vacante);
			$titulo = "Domiciliario" ;
		} 
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
		$Plantilla = '
		  <body><header class="clearfix"><div class="container"><figure><img src="../../views/assets/img/logo-aliado.png"alt="Logo" class="img" width="150"></figure></div></header><section><div class="container"><div class="details clearfix"><div class="client left"><p class="name"> Reporte De Aspirantes ' . $titulo . '</p></div></div><table border="0" cellspacing="0" cellpadding="0"><thead><tr><th class="total">Documento</th><th class="unit">Nombre</th><th class="total">E-Mail</th><th class="total">Movil</th><th class="unit">Dirección</th><th class="qty">Vacante</th></tr></thead><tbody>';
		foreach ($respuesta as $key => $value) {
			$Plantilla .= '<tr><td class="total">' . $value["NumDocument"] . '</td><td class="unit">' . $value["Name"] . '</td><td class="total">' . $value["Mail"] . '</td><td class="total">' . $value["Cellphone"] . '</td><td class="unit">' . $value["Address"] . '</td><td class="qty"> '.$value["Type"].'</td></tr>';
		}
		$Plantilla .= '</tbody></table></div><br><br></section></body>';

		$css = 'html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed,figure, figcaption, footer, header, hgroup,menu, nav, output, ruby, section, summary,time, mark, audio, video {margin: 0;padding: 0;border: 0;font: inherit;font-size: 100%;vertical-align: baseline;}html {line-height: 1;}ol, ul {list-style: none;}table {border-collapse: collapse;border-spacing: 0;}caption, th, td {text-align: left;font-weight: normal;vertical-align: middle;}q, blockquote {quotes: none;}q:before, q:after, blockquote:before, blockquote:after {content: "";content: none;}a img {border: none;}article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {display: block;}body {font-family: "Source Sans Pro", sans-serif;font-weight: 300;font-size: 12px;margin: 0;padding: 0}body a {text-decoration: none;color: inherit;}body a:hover {color: inherit;opacity: 0.7;}body .container {min-width: 460px;margin: 0 auto;padding: 0 20px;}body .clearfix:after {content: "";display: table;clear: both;}body .left {float: left;}.margen{margin-left:20px;}body .right {float: right;}body .helper {display: inline-block;height: 100%;vertical-align: middle;}body .no-break {page-break-inside: avoid;}header {margin-top: 15px;margin-bottom: 45px;}header figure {float: left;margin-right: 10px;}header figure .img {margin-top: 10px;width: 16px;height: 60px;}header .company-info {float: right;margin-right:50px;margin-top: 10px;line-height: 14px;}header .company-info .address, header .company-info .phone, header .company-info .email {position: relative;}header .company-info .address img, header .company-info .phone img {margin-top: 2px;}header .company-info .email img {margin-top: 3px;}section .details {min-width: 440px;margin-bottom: 40px;padding: 5px 10px;background-color: #7D7E7C;color: #ffffff;line-height: 20px;}section .details .client {text-align:right; width: 100%;}section .details .client .name {padding: 15px;text-align: center;font-size: 2em;font-weight: 600;}section .details .data {width: 50%;font-weight: 600;text-align: right;}section .details .title {margin-bottom: 5px;font-size: 1.33333333333333em;text-transform: uppercase;}section table {width: 100%;margin-bottom: 20px;table-layout: fixed;border-collapse: collapse;border-spacing: 0;}section table .qty, section table .unit, section table .total {width: 15%;}section table .desc {width: 55%;}section table thead {display: table-header-group;vertical-align: middle;border-color:#7D7E7C;color: #ffffff;}section table thead th {padding: 7px 10px;background: #7D7E7C;border-right: 5px solid #FFFFFF;text-align: center;font-weight: 400;text-transform: uppercase;color: #ffffff;}section table thead th:last-child {border-right: none;}section table tbody tr:first-child td {border-top: 10px solid #ffffff;}section table tbody td {padding: 10px 10px;text-align: center;font-weight: 600;border-right: 3px solid #7D7E7C;}section table tbody td:last-child {border-right: none;}section table tbody td.desc {text-align: left;}section table tbody td.total {font-weight: 600;text-align: center;}section table tbody h3 {margin-bottom: 5px;color: #66BDA9;font-weight: 600;}section table.grand-total {margin-bottom: 50px;}section table.grand-total tbody tr td {padding: 0px 10px 12px;border: none;background-color: #B2DDD4;color: #555555;font-weight: 600;text-align: right;}section table.grand-total tbody tr:first-child td {padding-top: 12px;}section table.grand-total tbody tr:last-child td {background-color: transparent;}section table.grand-total tbody .grand-total {padding: 0;}section table.grand-total tbody .grand-total div {float: right;padding: 11px 10px;background-color: #66BDA9;color: #ffffff;font-weight: 600;}section table.grand-total tbody .grand-total div span {display: inline-block;margin-right: 20px;width: 80px;}footer {margin-bottom: 15px;padding: 0 5px;}footer .thanks {margin-bottom: 40px;color: #66BDA9;font-size: 1.16666666666667em;font-weight: 600;}footer .notice {margin-bottom: 15px;}footer .end {padding-top: 5px;border-top: 2px solid #7D7E7Ctext-align: center;}';

		$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
		$mpdf->writeHtml($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

		$mpdf->Output("Reporte.pdf", "I");
	}

	static public  function Evaluar()
	{
		if (isset($_POST["Comments"])) {

            $F = $_POST["F"];
            $C = $_POST["C"];
            $O = $_POST["O"];
            $E = $_POST["E"];
            $P = $_POST["P"]; 

            $Resultado = ($F+$C+$O+$E+$P)/5;

            $IdCandidate = $_POST["UsrEvaluar"];

            $Comentarios = $_POST["Comments"];
            
            var_dump($IdCandidate,$Resultado,$Comentarios);

            $respuesta = Aspirante::InsertarEvaluacion($Resultado,$Comentarios,$IdCandidate);

            if ($respuesta == true) {
  			    	
                echo "<script>

                   Swal.fire({
                     icon: 'success',
                     title: '¡Operación completada!',
                     title: 'Datos almacenados correctamente',
                     title: 'Su Resultado Fue ".$Resultado." Sobre 5',
                   }).then((result)=>{

					if(result.value) {
		 
					  window.location = 'aspirantes'; 

					 }
		 
				 }) 


				</script>" ;
            }	
  else {

		echo 
			"<script>

               Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 title: '¡Revisa el formato de los campos e intenta de nuevo!',
               })


			</script>";
        }
            

        }
    }

    public static function ctrAsignarAspirante($valor) {

    	$respuesta = Aspirante::asignarAspirante($valor);

    	return $respuesta;
	}
	
	
	public static function ctrEliminarAspirante() {

		if(isset($_POST["documentEliminar"])) {

			$documento = $_POST["documentEliminar"];

			$respuesta = Aspirante::eliminarAspirante($documento);

			if ($respuesta == "ok") {
                
                echo "<script>

                   Swal.fire({
                     icon: 'success',
                     title: '¡Operación completada!',
					 title: 'Datos actualizados correctamente',
					 
                   }).then((result)=>{

					if(result.value) {
		 
					  window.location = 'aspirantes'; 

					 }
		 
				 }) 


                </script>";
              } 
          else {

            echo "<script>

               Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 title: '¡Revisa el formato de los campos e intenta de nuevo!',
               })


            </script>";
          }
		}
	}

	public static function ctrListarAspirantesDestacados() {

		$respuesta = Aspirante::SelectAspirantesDestacados();
		return $respuesta;

	}

	public static function ctrListarAspirantesEvaluados() {

		$respuesta = Aspirante::SelectAspirantesEvaluados();
		return $respuesta;

	}

	public static function ctrContarAspirantesContratados() {

		$respuesta = Aspirante::contarAspirantesContratados();

		return $respuesta;
	}


	public static function ctrContarAspirantesInactivos() {

		$respuesta = Aspirante::contarAspirantesInactivos();

		return $respuesta;
	}

	public static function ctrAspirantesCargo() {

		$respuesta = Aspirante::aspirantesCargo();

		return $respuesta;
	}


	public static function ctrAspirantesItem() {

		$respuesta = Aspirante::aspirantesItem();

		return $respuesta;
	}

}
