<?php

require_once "../controladores/carreras.controlador.php";
require_once "../modelos/carreras.modelo.php";


class AjaxCarreras{
	/**
	 * [ajaxPorcentajesCarreras Método de peticion ajax para sacar máximo de porcentajes por carrera]
	 * @return [json] [Máximos de porcentajes por carreras]
	 */
	public function ajaxPorcentajesCarreras(){
		$respuesta = ControladorCarreras::ctrPorcentajeCarreras();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxPorcentajeAptitudes Método de peticion ajax para el máximo de porcentaje por aptitud]
	 * @return [type] [description]
	 */
	public function ajaxPorcentajeAptitudes(){
		$respuesta = ControladorCarreras::ctrPorcentajeAptitudes();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxActivarCarrera Método de peticion ajax para activar la carrera]
	 * @return [type] [description]
	 */
	public function ajaxActivarCarrera(){
		$respuesta = ControladorCarreras::ctrActivarCarrera();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxCrearCarrera Método de peticion ajax para la creación de una nueva carrera]
	 * @return [type] [description]
	 */
	public function ajaxCrearCarrera(){
		$respuesta = ControladorCarreras::ctrCrearCarrera();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxEditarCarrera Método de peticion ajax para editar una carrera]
	 * @return [type] [description]
	 */
	public function ajaxEditarCarrera(){
		$respuesta = ControladorCarreras::ctrEditarCarrera();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxEliminarCarrera Método de peticion ajax para eliminar una carrera]
	 * @return [type] [description]
	 */
	public function ajaxEliminarCarrera(){
		$respuesta = ControladorCarreras::ctrEliminarCarrera();
		echo json_encode($respuesta);
	}

	/**
	 * [ajaxBuscarCarrera Método de peticion ajax para buscar una carrera]
	 * @return [type] [description]
	 */
	public function ajaxBuscarCarrera(){
		$respuesta = ControladorCarreras::ctrBuscarCarrera2();
		echo json_encode($respuesta);
	}
}

if(isset($_POST["accion"])){
	
	if($_POST["accion"] === "activar-carrera"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxActivarCarrera();
	}

	if($_POST["accion"] === "crear-carrera"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxCrearCarrera();
	}

	if($_POST["accion"] === "editar-carrera"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxEditarCarrera();
	}

	if($_POST["accion"] === "eliminar-carrera"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxEliminarCarrera();
	}
	
	if($_POST["accion"] === "porcentaje-por-carreras"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxPorcentajesCarreras();
	}

	if($_POST["accion"] === "porcentaje-por-aptitud"){
		$pxa = new AjaxCarreras;
		$pxa->ajaxPorcentajeAptitudes();
	}

	if($_POST["accion"] === "buscar-carrera"){
		$pxc = new AjaxCarreras;
		$pxc->ajaxBuscarCarrera();
	}
}