<?php

class ControladorTests {
    /*=============================================
    GUARDAR PRUEBA
    =============================================*/
    static public function ctrGuardarPrueba($tabla,$ids,$alternativas,$carreras,$aptitudes,$usuario){

        

        $respuesta = ModeloTests::mdlGuardarPrueba($tabla, $ids, $alternativas, $carreras, $aptitudes, $usuario);
        return $respuesta;
    }
    
    /*=============================================
    VERIFICAR PRUEBA
    =============================================*/
    static public function ctrVerificarPrueba($item,$valor){
        $tabla = "prueba";
        $respuesta = ModeloTests::mdlVerificarPrueba($tabla, $item, $valor);
        return $respuesta;                
    }
    
    /*=============================================
    MOSTRAR CARRERAS RECOMENDADAS
    =============================================*/
    static public function ctrMostrarCarrerasRecomendadas($item, $valor){
        $respuesta = ModeloTests::mdlMostrarCarrerasRecomendadas($item, $valor);
        return $respuesta;
    }
    
    /*=============================================
    MOSTRAR APTITUDES
    =============================================*/
    static public function ctrMostrarAptitudesRecomendadas($item, $valor){
        $respuesta = ModeloTests::mdlMostrarAptitudesRecomendadas($item, $valor);
        return $respuesta;
    }
    
    /*=============================================
    CARGAR PREGUNTAS
    =============================================*/
    static public function ctrCargarPreguntas(){
        $respuesta = ModeloTests::mdlCargarPreguntas("preguntas");
        return $respuesta;
    }

    static public function ctrListarCarreras(){
        $respuesta = ModeloTests::mdlListarCarreras("carreras");
        return $respuesta;
    }

    static public function ctrTotalTest(){
        $respuesta = ModeloTests::mdlTotalTest("prueba");
        $datos = array("total" => count($respuesta));
        return $datos;
    }

    static public function ctrTraerRespuestas($valor){
        $respuesta = ModeloTests::mdlTraerRespuestas($valor);
        return $respuesta;
    }
}
