<?php

require_once "Conexion.php";

class Aspirante extends Conexion
{ 

	public static function InsertarEvaluacion($Resultado, $Commen, $IdCandidate)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO review(Id_Candidate,Result,Comments) VALUES (:IdCandidate,:Resultado,:Commen)");

      $stmt-> bindParam(":IdCandidate", $IdCandidate, PDO::PARAM_STR);
      $stmt-> bindParam(":Resultado",$Resultado, PDO::PARAM_STR);
      $stmt-> bindParam(":Commen", $Commen, PDO::PARAM_STR);

      if($stmt->execute()){
        
        return true;
      
      } else{
        
        return false;
	  }
	  
      
      $stmt->close();

      $stmt = null;
    }

	public static function contarAspirantes($tabla)
	{

		
		$stmt = Conexion::conectar()->prepare("SELECT count(NumDocument) as totalAspirantes FROM $tabla where status <> 'I'");
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	public static function AspirantesAgendados()
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `candidate` INNER join interview ON interview.Id_Asp = candidate.NumDocument INNER join vacant on candidate.Id_Vacant = vacant.ID INNER join occupation on occupation.ID = vacant.NameVacant WHERE candidate.Status = 'A'");

		$stmt->execute();
		
		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	public static function SelectAspirantes($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join vacant on $tabla.Id_Vacant = Vacant.ID inner join Occupation on vacant.NameVacant = Occupation.ID where candidate.status <> 'C' AND candidate.status <> 'I' ORDER BY DateAplication DESC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	public static function SelectAspirantesDestacados()
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM candidate inner join vacant on candidate.Id_Vacant = Vacant.ID inner join Occupation on vacant.NameVacant = Occupation.ID inner join review on candidate.NumDocument = review.Id_Candidate where review.Result >= 45 AND candidate.status = 'E'");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	public static function SelectAspirantesEvaluados()
	{

		$stmt = Conexion::conectar()->prepare("SELECT candidate.Name, candidate.LastName, review.Result, candidate.DateAplication, candidate.NumDocument, candidate.Photo, candidate.Mail, candidate.Phone, candidate.Cellphone, occupation.Type, candidate.TypeDocument FROM candidate inner join vacant on candidate.Id_Vacant = Vacant.ID inner join Occupation on vacant.NameVacant = Occupation.ID inner join review on candidate.NumDocument = review.Id_Candidate where candidate.status = 'E' ORDER BY candidate.DateAplication DESC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	public static function SelectAspirantesContratados($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join vacant on $tabla.Id_Vacant = Vacant.ID inner join Occupation on vacant.NameVacant = Occupation.ID where candidate.status = 'C'");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}


	static public function InsertarCandidato($Name, $LastName, $Type, $Document, $Phone, $Cellphone, $CBirthDate, $Address, $Mail, $Gender, $MaritalStatus, $Photo, $CDescription, $Status)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO candidate (Name,LastName,TypeDocument,NumDocument,Phone,Cellphone,Birthdate,Address,Mail,Gender,MaritalStatus,Photo,Description,Status) 
        VALUES( :Name, :LastName, :Type, :Document,:Phone, :Cellphone,:CBirthDate,:Address,:Mail, :Gender, :MaritalStatus, :Photo,:CDescription,:Status)");

		$stmt->bindParam(":Name", $Name, PDO::PARAM_STR);
		$stmt->bindParam(":LastName", $LastName, PDO::PARAM_STR);
		$stmt->bindParam(":Type", $Type, PDO::PARAM_STR);
		$stmt->bindParam(":Document", $Document, PDO::PARAM_STR);
		$stmt->bindParam(":Phone", $Phone, PDO::PARAM_STR);
		$stmt->bindParam(":Cellphone", $Cellphone, PDO::PARAM_STR);
		$stmt->bindParam(":CBirthDate", $CBirthDate, PDO::PARAM_STR);
		$stmt->bindParam(":Address", $Address, PDO::PARAM_STR);
		$stmt->bindParam(":Mail", $Mail, PDO::PARAM_STR);
		$stmt->bindParam(":Gender", $Gender, PDO::PARAM_STR);
		$stmt->bindParam(":MaritalStatus", $MaritalStatus, PDO::PARAM_STR);
		$stmt->bindParam(":CDescription", $CDescription, PDO::PARAM_STR);
		$stmt->bindParam(":Photo", $Photo, PDO::PARAM_STR);
		$stmt->bindParam(":Status", $Status, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "false";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function InsertarReferenciaCandidato($DocRefe1, $NombreRefe1, $OcupacionRefe1, $ParentescoRefe1, $TelefonoRefe1, $DocRefe2, $NombreRefe2, $OcupacionRefe2, $ParentescoRefe2, $TelefonoRefe2, $DocRefe3, $NombreRefe3, $OcupacionRefe3, $ParentescoRefe3, $TelefonoRefe3, $Document)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO personal_references(NumDocument,Name,Occupation,Association,Phone,Id_Candidate) 
        VALUES( :DocRefe1,:NombreRefe1,:OcupacionRefe1,:ParentescoRefe1,:TelefonoRefe1,:Document),(:DocRefe2,:NombreRefe2,:OcupacionRefe2,:ParentescoRefe2,:TelefonoRefe2,:Document),(:DocRefe3,:NombreRefe3,:OcupacionRefe3,:ParentescoRefe3,:TelefonoRefe3,:Document)");

		$stmt->bindParam(":Document", $Document, PDO::PARAM_STR);
		$stmt->bindParam(":DocRefe1", $DocRefe1, PDO::PARAM_STR);
		$stmt->bindParam(":NombreRefe1", $NombreRefe1, PDO::PARAM_STR);
		$stmt->bindParam(":OcupacionRefe1", $OcupacionRefe1, PDO::PARAM_STR);
		$stmt->bindParam(":ParentescoRefe1", $ParentescoRefe1, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoRefe1", $TelefonoRefe1, PDO::PARAM_STR);
		$stmt->bindParam(":DocRefe2", $DocRefe2, PDO::PARAM_STR);
		$stmt->bindParam(":NombreRefe2", $NombreRefe2, PDO::PARAM_STR);
		$stmt->bindParam(":OcupacionRefe2", $OcupacionRefe2, PDO::PARAM_STR);
		$stmt->bindParam(":ParentescoRefe2", $ParentescoRefe2, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoRefe2", $TelefonoRefe2, PDO::PARAM_STR);
		$stmt->bindParam(":DocRefe3", $DocRefe3, PDO::PARAM_STR);
		$stmt->bindParam(":NombreRefe3", $NombreRefe3, PDO::PARAM_STR);
		$stmt->bindParam(":OcupacionRefe3", $OcupacionRefe3, PDO::PARAM_STR);
		$stmt->bindParam(":ParentescoRefe3", $ParentescoRefe3, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoRefe3", $TelefonoRefe3, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "false";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function InsertarIdiomaCandidato($Idioma1, $Institucion1, $Idioma2, $Institucion2, $Idioma3, $Institucion3, $Document)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO language(Institution,ID_Type,ID_Candidate)
          VALUES (:Institucion1,:Idioma1,:Candidate),(:Institucion2,:Idioma2,:Candidate),(:Institucion3,:Idioma3,:Candidate)
         ");
 
		$stmt->bindParam(":Candidate", $Document, PDO::PARAM_STR);
		$stmt->bindParam(":Idioma1", $Idioma1, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion1", $Institucion1, PDO::PARAM_STR);
		$stmt->bindParam(":Idioma2", $Idioma2, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion2", $Institucion2, PDO::PARAM_STR);
		$stmt->bindParam(":Idioma3", $Idioma3, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion3", $Institucion3, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "false";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function InsertarExperienciaCandidato($Document, $Compania1, $Jefe1, $DocJefe1, $TelefonoJefe1, $CargoAntes1, $Compania2, $Jefe2, $DocJefe2, $TelefonoJefe2, $CargoAntes2, $Compania3, $Jefe3, $DocJefe3, $TelefonoJefe3, $CargoAntes3  ) {

		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO work_experience(Company, Role,Boss, Document, Phone, Time, ID_Candidate) 
				VALUES  (:Compania1,:CargoAntes1,:Jefe1,:DocJefe1,:TelefonoJefe1, 'hoy', :Candidate),
				        (:Compania2,:CargoAntes2,:Jefe2,:DocJefe2,:TelefonoJefe2, 'hoy', :Candidate),
				        (:Compania3,:CargoAntes3,:Jefe3,:DocJefe3,:TelefonoJefe3, 'hoy', :Candidate)"
		);

		$stmt->bindParam(":Candidate", $Document, PDO::PARAM_STR);

		$stmt->bindParam(":Compania1", $Compania1, PDO::PARAM_STR);
		$stmt->bindParam(":CargoAntes1", $CargoAntes1, PDO::PARAM_STR);
		$stmt->bindParam(":Jefe1", $Jefe1, PDO::PARAM_STR);
		$stmt->bindParam(":DocJefe1", $DocJefe1, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoJefe1", $TelefonoJefe1, PDO::PARAM_STR);

		// $stmt->bindParam(":Tiempo1", $Tiempo1, PDO::PARAM_STR);

		$stmt->bindParam(":Compania2", $Compania2, PDO::PARAM_STR);
		$stmt->bindParam(":CargoAntes2", $CargoAntes2, PDO::PARAM_STR);
		$stmt->bindParam(":Jefe2", $Jefe2, PDO::PARAM_STR);
		$stmt->bindParam(":DocJefe2", $DocJefe2, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoJefe2", $TelefonoJefe2, PDO::PARAM_STR);

		// $stmt->bindParam(":Tiempo2", $Tiempo2, PDO::PARAM_STR);

		$stmt->bindParam(":Compania3", $Compania3, PDO::PARAM_STR);
		$stmt->bindParam(":CargoAntes3", $CargoAntes3, PDO::PARAM_STR);
		$stmt->bindParam(":Jefe3", $Jefe3, PDO::PARAM_STR);
		$stmt->bindParam(":DocJefe3", $DocJefe3, PDO::PARAM_STR);
		$stmt->bindParam(":TelefonoJefe3", $TelefonoJefe3, PDO::PARAM_STR);

		// $stmt->bindParam(":Tiempo3", $Tiempo3, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "false";
		}

		$stmt->close();

		$stmt = null;
	}

	static public function InsertarEstudiosCandidato($Document, $Titulo1, $Carrera1, $TiempoEstudio1, $InstitucionAcademica1, $Titulo2, $Carrera2, $TiempoEstudio2, $InstitucionAcademica2, $Titulo3, $Carrera3, $TiempoEstudio3, $InstitucionAcademica3) {
		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO academic_training(Name,Time, Certification, Institution,ID_Candidate,ID_Level) 
			VALUES	(:Carrera1,:TiempoEstudio1, 'URL CERT', :Institucion1,:Document,:Titulo1),
			        (:Carrera2,:TiempoEstudio2, 'URL CERT', :Institucion2,:Document,:Titulo2),
			        (:Carrera3,:TiempoEstudio3, 'URL CERT', :Institucion3,:Document,:Titulo3)"
		);

		$stmt->bindParam(":Document", $Document, PDO::PARAM_STR);

		$stmt->bindParam(":Carrera1", $Carrera1, PDO::PARAM_STR);
		$stmt->bindParam(":TiempoEstudio1", $TiempoEstudio1, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion1", $InstitucionAcademica1, PDO::PARAM_STR);
		$stmt->bindParam(":Titulo1", $Titulo1, PDO::PARAM_STR);

		$stmt->bindParam(":Carrera2", $Carrera2, PDO::PARAM_STR);
		$stmt->bindParam(":TiempoEstudio2", $TiempoEstudio2, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion2", $InstitucionAcademica2, PDO::PARAM_STR);
		$stmt->bindParam(":Titulo2", $Titulo2, PDO::PARAM_STR);

		$stmt->bindParam(":Carrera3", $Carrera3, PDO::PARAM_STR);
		$stmt->bindParam(":TiempoEstudio3", $TiempoEstudio3, PDO::PARAM_STR);
		$stmt->bindParam(":Institucion3", $InstitucionAcademica3, PDO::PARAM_STR);
		$stmt->bindParam(":Titulo3", $Titulo3, PDO::PARAM_STR);
		
		if ($stmt->execute()) {

			return "ok";

		} else {

			return "false";

		}

		$stmt->close();
		$stmt = null;
	}


	public static function Datos($tabla)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY ID");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}

	public static function asignarAspirante($valor) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM candidate inner join vacant on candidate.Id_Vacant = Vacant.ID inner join Occupation on vacant.NameVacant = Occupation.ID WHERE NumDocument = :document");

		$stmt->bindParam(":document", $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	public static function contratar($document) {

		$stmt  = Conexion::conectar()->prepare("UPDATE candidate SET status = 'C' where NumDocument = :document");
		
		$stmt-> bindParam(":document", $document, PDO::PARAM_STR);

		if($stmt->execute()) {
			return "ok";
		}else{
			return "false";
		}

		$stmt->close();

		$stmt = null;

	}


	public static function eliminarAspirante($document) {

		$stmt  = Conexion::conectar()->prepare("UPDATE candidate SET status = 'I' where NumDocument = :document");
		
		$stmt-> bindParam(":document", $document, PDO::PARAM_STR);

		if($stmt->execute()) {
			return "ok";
		}else{
			return "false";
		}

		$stmt->close();

		$stmt = null;

	}
}
