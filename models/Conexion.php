<?php
  
  class Conexion {

  	static public function conectar() {
  		
  		          $link = new PDO("mysql:host=localhost;dbname=sgrh_surtimax", "root", "");


  		          $link->exec("set names utf8");

  		          return $link;

  		  	}

  }



