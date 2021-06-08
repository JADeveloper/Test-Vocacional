<?php

require_once "../controladores/preguntas.controlador.php";
require_once "../modelos/preguntas.modelo.php";

class AjaxPreguntas{
	
	/**
	 * [ajaxCrearPregunta Método de petición ajax para crear una pregunta]
	 * @return [json] [Respuesta en formato json]
	 */
	public function ajaxCrearPregunta(){
		$respuesta = ControladorPreguntas::ctrCrearPregunta();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxActualizarPregunta Método de petición ajax para actualizar una pregunta]
	 * @return [json] [Respuesta en formato json]
	 */
	public function ajaxActualizarPregunta(){
		$respuesta = ControladorPreguntas::ctrActualizarPregunta();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxBuscarPregunta Método de petición ajax para buscar una pregunta]
	 * @return [json] [Respuesta en formato json con la pregunta buscada]
	 */
	public function ajaxBuscarPregunta(){
		$respuesta = ControladorPreguntas::ctrBuscarPregunta();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxListarPreguntas Método de petición ajax para listar todas las preguntas]
	 * @return [json] [Listado de las preguntas en formato json]
	 */
	public function ajaxListarPreguntas(){
		$respuesta = ControladorPreguntas::ctrListarPreguntas();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxEliminarPregunta Método de petición ajax para eliminar una pregunta]
	 * @return [json] [Respuesta en formato json]
	 */
	public function ajaxEliminarPregunta(){
		$respuesta = ControladorPreguntas::ctrEliminarPregunta();
		echo json_encode($respuesta);
	}
	
}


if(isset($_POST["accion"])){

	if($_POST["accion"] === "crear"){
		$pregunta = new AjaxPreguntas;
		$pregunta->ajaxCrearPregunta();
	}

	if($_POST["accion"] === "actualizar"){
		$pregunta = new AjaxPreguntas;
		$pregunta->ajaxActualizarPregunta();
	}

	if($_POST["accion"] === "buscar"){
		$pregunta = new AjaxPreguntas;
		$pregunta->ajaxBuscarPregunta();
	}

	if($_POST["accion"] === "listar"){
		$pregunta = new AjaxPreguntas;
		$pregunta->ajaxListarPreguntas();	
	}

	if($_POST["accion"] === "eliminar"){
		$pregunta = new AjaxPreguntas;
		$pregunta->ajaxEliminarPregunta();
	}

}