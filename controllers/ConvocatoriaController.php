<?php

  class ConvocatoriaController {

  	static  public  function MostrarConvocatoria(){
      $Conv = "announcement";
     	$respuesta = Convocatoria::Mostrar($Conv);
     	return $respuesta ;

    }

      static  public  function MostrarConvocatoriaID($valor){

        $respuesta = Convocatoria::MostrarConvocatoria($valor);

        return $respuesta;


      }


    static public function Cantidad(){
      $Conv = "announcement";
      $respuesta = Convocatoria::Contar($Conv);
      return $respuesta;
    }

  }