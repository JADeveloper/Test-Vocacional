<?php

class ControladorPreguntas{

	/**
	 * [ctrCrearPregunta Método para crear una pregunta nueva]
	 * @return [object] [Resultado de la creación de la pregunta]
	 */
	
	static public function ctrCrearPregunta(){

		$datos = array(
			"pregunta" 		=> $_POST["pregunta"],
			"alternativa1"  => $_POST["alternativa1"],
			"alternativa2"  => $_POST["alternativa2"],
			"alternativa3"  => $_POST["alternativa3"],
			"alternativa4"  => $_POST["alternativa4"],
			"carrera_id"	=> $_POST["carrera_id"],
			"aptitud"	    => $_POST["aptitud"]
		);

		$respuesta = ModeloPreguntas::mdlCrearPregunta("preguntas", $datos);

		return $respuesta;

    }


    /**
     * [ctrActualizarPregunta Método para actualizar una pregunta]
     * @return [object] [Resultado de la actualización de la pregunta]
     */
    static public function ctrActualizarPregunta(){
    	
    	$datos = array(
    		"pregunta" 		=> $_POST["pregunta"],
			"alternativa1"  => $_POST["alternativa1"],
			"alternativa2"  => $_POST["alternativa2"],
			"alternativa3"  => $_POST["alternativa3"],
			"alternativa4"  => $_POST["alternativa4"],
			"carrera_id"	=> $_POST["carrera_id"],
			"aptitud"	    => $_POST["aptitud"],
			"id"			=> $_POST["id"],	
    	);

    	$respuesta = ModeloPreguntas::mdlActualizarPregunta("preguntas", $datos);

    	return $respuesta;
    }

    /**
     * [ctrBuscarPregunta Método para buscar una pregunta]
     * @return [object] [Resultado con la pregunta encontrada]
     */
    static public function ctrBuscarPregunta(){
    	
    	$datos = array(
    		"id" => $_POST["id"]
    	);

    	$respuesta = ModeloPreguntas::mdlBuscarPregunta("preguntas", $datos);

    	return $respuesta;

    }

    /**
	 * [ctrMostrarTodos Método para mostrar todas las preguntas]
	 * @return [object] [Resultado con todas las preguntas]
	 */
    static public function ctrListarPreguntas(){

		$respuesta = ModeloPreguntas::mdlListarPreguntas("preguntas");

		return $respuesta;
	}
        
    /**
     * [ctrEliminarPregunta Método para eliminar una pregunta]
     * @return [object] [Resultado de eliminar una pregunta]
     */
	static public function ctrEliminarPregunta(){

		$datos = array(
			"id" => $_POST["id"],
		);

		$respuesta = ModeloPreguntas::mdlEliminarPregunta("preguntas", $datos);

		return $respuesta;

	}

	static public function ctrTotalPreguntas(){
		$respuesta = ModeloPreguntas::mdlTotalPreguntas("preguntas");
		return $respuesta;
	}

}