<?php
session_start();

require_once "../controladores/usuarios.controlador.php";
require_once "../controladores/tests.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../modelos/tests.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;

	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public function ajaxActivarUsuario(){
		$respuesta = ModeloUsuarios::mdlActualizarUsuario("usuarios", "estado", $_POST["activarUsuario"], "id", $_POST["activarId"]);
	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public function ajaxValidarUsuario(){
		$respuesta = ControladorUsuarios::ctrMostrarUsuarios("usuario", $_POST["validarUsuario"]);
                
        if($respuesta){
        	echo json_encode(array("existe" => "si"));
        }
        else{
        	echo json_encode(array("existe" => "no"));
        }
	}

	/*=============================================
	BUSCAR USUARIO
	=============================================*/	
        
    public function ajaxBuscarUsuario(){
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios("usuario", $_SESSION["usuario"]);
        echo json_encode($respuesta);
    }

	public function ajaxBuscarResultado(){
		$respuesta = ControladorUsuarios::ctrBuscarResultado();
		echo json_encode($respuesta);
	}    
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	//$valUsuario -> validarUsuario = ;
	$valUsuario -> ajaxValidarUsuario();

}

if(isset($_POST["usuario"])){
    $buscarUsuario = new AjaxUsuarios();
    $buscarUsuario->buscarUsuario = $_POST["usuario"];
    $buscarUsuario->ajaxBuscarUsuario();
}

if(isset($_POST["accion"])){
    if($_POST["accion"] === "cargarusuario"){
        $buscarUsuario = new AjaxUsuarios();
        //$buscarUsuario->buscarUsuario = $_SESSION["usuario"];
        $buscarUsuario->ajaxBuscarUsuario();
    }
	if($_POST["accion"] === "buscar-resultado"){
		$buscarResultado = new AjaxUsuarios();
		$buscarResultado->ajaxBuscarResultado();
	}
}
