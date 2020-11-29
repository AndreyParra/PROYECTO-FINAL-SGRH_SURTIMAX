<?php 

  require_once "Conexion.php";

   class Usuario extends Conexion {

   	static public function contarUsuarios($valor) {

   	      $stmt = Conexion::conectar()->prepare("CALL SPCOUNT_USERS(:valor)");

   	      $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

   	      $stmt->execute();

   	      return $stmt -> fetch();

   	      $stmt->close();

   	      $stmt = null;



   	}

      public static function verMensajes() {
      
            $stmt = Conexion::conectar()->prepare("CALL SPSEE_MESSAGES()");

            $stmt ->execute();

            return $stmt ->fetchAll();

            $stmt-> close();

            $stmt = null;

      }


      public static function listarRoles($valor) {

         $stmt = Conexion::conectar()->prepare("CALL SPLIST_ROLES(:valor)");

         $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetchAll();

         $stmt-> close();

         $stmt = null;
      }

      static public function nuevoMensaje($mensaje) {

         $stmt = Conexion::conectar()->prepare("CALL SPNEW_MSG(:mensaje, :usuario, :foto)");

         $stmt->bindParam(":mensaje", $mensaje, PDO::PARAM_STR);
         $stmt->bindParam(":usuario", $_SESSION["nombre"], PDO::PARAM_STR);
         $stmt->bindParam(":foto", $_SESSION["foto"], PDO::PARAM_STR);

         $stmt-> execute();

         return $stmt;

         $stmt->close();

         $stmt = null;


      }

      static public function graficarRoles() {

         $stmt = Conexion::conectar()-> prepare("CALL SPGRAPH_ROLES()");

         $stmt ->execute();

         return $stmt-> fetchAll();

         $stmt ->close();

         $stmt = null;
      }


     static public function buscarUsuario() {


         $stmt =  Conexion::conectar()-> prepare("CALL SPSEARCH_USER()");

         $stmt-> execute();

         return $stmt->fetchAll();

         $stmt->close();

         $stmt = null;


   	
     }   

     public static function nuevoUsuario($encriptar, $idUsuario) {

      $stmt = Conexion::conectar()-> prepare("CALL SPNEW_USER(:password, :idUsuario)");

      $stmt-> bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
      $stmt-> bindParam(":password", $encriptar, PDO::PARAM_STR);




      if ($stmt->execute()) {
         
         return "ok";
      
      }else {

         return "false";

      }

      $stmt->close();

      $stmt = null;


     }  

     public static function agregarNota($nombre, $apellido, $valor) {

      $stmt = Conexion::conectar()->prepare("CALL SPNEW_NOTA(:valor, :nombre, :apellido)");

      $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

      $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);

      $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);

      
      if ($stmt->execute()) {
         
         return "ok";

      }else {
          
          return "false";
      }

      $stmt->close();

      $stmt = null;


     }


     public static function verNotas() {

      $stmt = Conexion::conectar()->prepare("CALL SPSEE_NOTES()");

      $stmt ->execute();

      return $stmt->fetchAll();

      $stmt->close();

      $stmt = null;


     }




     public static function editarNota($nombre, $apellido, $editarItem, $listarItem) {

      $stmt = Conexion::conectar()->prepare("CALL SPEDIT_NOTE(:editarItem, :nombre, :apellido, :listarItem)");

      $stmt->bindParam(":editarItem", $editarItem, PDO::PARAM_STR);
      $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
      $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
      $stmt->bindParam(":listarItem", $listarItem, PDO::PARAM_STR);

      if ($stmt->execute()) {

          return "ok";
      
      }else {
         
         return "false";
      }

      $stmt->close();

      $stmt = null;

     }

     public static function eliminarNotas($valor) {

      $stmt = Conexion::conectar()->prepare("CALL SPDELETE_NOTE(:valor)");

      $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

      $stmt-> execute();

      if ($stmt->execute()) {

          return "ok";
      
      }else {
         
         return "false";
      }


      $stmt = null;
     }

     public static function editarClave($conActual, $conNueva, $codigo) {

      $stmt = Conexion::conectar()->prepare("CALL SPEDIT_PASS(:conNueva, :conActual, :codigo)");

      $stmt-> bindParam(":conNueva", $conNueva, PDO::PARAM_STR);
      $stmt-> bindParam(":conActual", $conActual, PDO::PARAM_STR);
      $stmt-> bindParam(":codigo", $codigo, PDO::PARAM_STR);

      if($stmt->execute()) {

        return "ok";
      
      }else {

        return "false";

      }

      $stmt-> close();

      $stmt = null;

     }

     public static function preguntarClave($valor, $codigo){


        $stmt = Conexion::conectar()->prepare("CALL SPASK_PASS(:valor, :valor1)");

        $stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);

        $stmt -> bindParam(":valor1", $codigo, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;

    }

    public static function editarUsuario($valor1, $valor2, $valor3) {


      $stmt = Conexion::conectar()->prepare(" CALL SPEDIT_USER(:valor1, :valor3, :valor2)");

      $stmt-> bindParam(":valor1", $valor1, PDO::PARAM_STR);

      $stmt-> bindParam(":valor2", $valor2, PDO::PARAM_STR);

      $stmt-> bindParam(":valor3", $valor3, PDO::PARAM_STR);

      $stmt-> execute();

      $stmt-> close();

      $stmt = null;


    } 


   public static function totalLogin($valor) {

    $stmt = Conexion::conectar()->prepare("CALL SPFULL_LOGIN(:valor)");

    $stmt-> bindParam(":valor", $valor, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();

    $stmt = null;

   } 


   public static function recuperarClave($email) {

    $stmt = Conexion::conectar()->prepare("SELECT users.Id_Employee FROM users inner join employee on Users.Id_Employee = employee.ID WHERE employee.Mail = :email");

    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt-> fetch();

    $stmt-> close();

    $stmt = null;

   }

   public static function actualizarClave($codigo, $password) {

      $stmt = Conexion::conectar()->prepare("UPDATE users SET Password = :password WHERE ID_Employee = :codigo");
  
      $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

      $stmt->bindParam(":password", $password, PDO::PARAM_STR);
  
      if( $stmt->execute()) {

         return true;

      }else {
         print_r(Conexion::conectar()->errorInfo());
      }
  
  
      $stmt-> close();
  
      $stmt = null;
  
     }

     public static function eliminarChat(){

      $stmt = Conexion::conectar()->prepare("DELETE FROM chat");

      if($stmt->execute()){

         return true;

      }else {

         print_r(Conexion::conectar()->errorInfo());
      }

     }



}
