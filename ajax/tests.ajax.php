<?php

require_once "../controladores/tests.controlador.php";
require_once "../modelos/tests.modelo.php";

class AjaxTest {

    public function ajaxGuardarPrueba(){
        /*$tabla = "prueba";
        $datos = array(
            "pregunta1" => $_POST["pregunta1"] !== "" ? $_POST["pregunta1"] : null,  
            "pregunta2" => $_POST["pregunta2"] !== "" ? $_POST["pregunta2"] : null,
            "pregunta3" => $_POST["pregunta3"] !== "" ? $_POST["pregunta3"] : null,
            "pregunta4" => $_POST["pregunta4"] !== "" ? $_POST["pregunta4"] : null,
            "pregunta5" => $_POST["pregunta5"] !== "" ? $_POST["pregunta5"] : null,
            "pregunta6" => $_POST["pregunta6"] !== "" ? $_POST["pregunta6"] : null,
            "pregunta7" => $_POST["pregunta7"] !== "" ? $_POST["pregunta7"] : null,
            "pregunta8" => $_POST["pregunta8"] !== "" ? $_POST["pregunta8"] : null,
            "pregunta9" => $_POST["pregunta9"] !== "" ? $_POST["pregunta9"] : null,
            "pregunta10" => $_POST["pregunta10"] !== "" ? $_POST["pregunta10"] : null,
            "pregunta11" => $_POST["pregunta11"] !== "" ? $_POST["pregunta11"] : null,
            "pregunta12" => $_POST["pregunta12"] !== "" ? $_POST["pregunta12"] : null,
            "pregunta13" => $_POST["pregunta13"] !== "" ? $_POST["pregunta13"] : null,
            "pregunta14" => $_POST["pregunta14"] !== "" ? $_POST["pregunta14"] : null,
            "pregunta15" => $_POST["pregunta15"] !== "" ? $_POST["pregunta15"] : null,
            
            "pregunta16" => $_POST["pregunta16"] !== "" ? $_POST["pregunta16"] : null,  
            "pregunta17" => $_POST["pregunta17"] !== "" ? $_POST["pregunta17"] : null,
            "pregunta18" => $_POST["pregunta18"] !== "" ? $_POST["pregunta18"] : null,
            "pregunta19" => $_POST["pregunta19"] !== "" ? $_POST["pregunta19"] : null,
            "pregunta20" => $_POST["pregunta20"] !== "" ? $_POST["pregunta20"] : null,
            "pregunta21" => $_POST["pregunta21"] !== "" ? $_POST["pregunta21"] : null,
            "pregunta22" => $_POST["pregunta22"] !== "" ? $_POST["pregunta22"] : null,
            "pregunta23" => $_POST["pregunta23"] !== "" ? $_POST["pregunta23"] : null,
            "pregunta24" => $_POST["pregunta24"] !== "" ? $_POST["pregunta24"] : null,
            "pregunta25" => $_POST["pregunta25"] !== "" ? $_POST["pregunta25"] : null,
            "pregunta26" => $_POST["pregunta26"] !== "" ? $_POST["pregunta26"] : null,
            "pregunta27" => $_POST["pregunta27"] !== "" ? $_POST["pregunta27"] : null,
            "pregunta28" => $_POST["pregunta28"] !== "" ? $_POST["pregunta28"] : null,
            "pregunta29" => $_POST["pregunta29"] !== "" ? $_POST["pregunta29"] : null,
            "pregunta30" => $_POST["pregunta30"] !== "" ? $_POST["pregunta30"] : null,
            
            "pregunta31" => $_POST["pregunta31"] !== "" ? $_POST["pregunta31"] : null,  
            "pregunta32" => $_POST["pregunta32"] !== "" ? $_POST["pregunta32"] : null,
            "pregunta33" => $_POST["pregunta33"] !== "" ? $_POST["pregunta33"] : null,
            "pregunta34" => $_POST["pregunta34"] !== "" ? $_POST["pregunta34"] : null,
            "pregunta35" => $_POST["pregunta35"] !== "" ? $_POST["pregunta35"] : null,
            "pregunta36" => $_POST["pregunta36"] !== "" ? $_POST["pregunta36"] : null,
            "pregunta37" => $_POST["pregunta37"] !== "" ? $_POST["pregunta37"] : null,
            "pregunta38" => $_POST["pregunta38"] !== "" ? $_POST["pregunta38"] : null,
            "pregunta39" => $_POST["pregunta39"] !== "" ? $_POST["pregunta39"] : null,
            "pregunta40" => $_POST["pregunta40"] !== "" ? $_POST["pregunta40"] : null,
            "pregunta41" => $_POST["pregunta41"] !== "" ? $_POST["pregunta41"] : null,
            "pregunta42" => $_POST["pregunta42"] !== "" ? $_POST["pregunta42"] : null,
            "pregunta43" => $_POST["pregunta43"] !== "" ? $_POST["pregunta43"] : null,
            "pregunta44" => $_POST["pregunta44"] !== "" ? $_POST["pregunta44"] : null,
            "pregunta45" => $_POST["pregunta45"] !== "" ? $_POST["pregunta45"] : null,
            
            "pregunta46" => $_POST["pregunta46"] !== "" ? $_POST["pregunta46"] : null,  
            "pregunta47" => $_POST["pregunta47"] !== "" ? $_POST["pregunta47"] : null,
            "pregunta48" => $_POST["pregunta48"] !== "" ? $_POST["pregunta48"] : null,
            "pregunta49" => $_POST["pregunta49"] !== "" ? $_POST["pregunta49"] : null,
            "pregunta50" => $_POST["pregunta50"] !== "" ? $_POST["pregunta50"] : null,
            "pregunta51" => $_POST["pregunta51"] !== "" ? $_POST["pregunta51"] : null,
            "pregunta52" => $_POST["pregunta52"] !== "" ? $_POST["pregunta52"] : null,
            "pregunta53" => $_POST["pregunta53"] !== "" ? $_POST["pregunta53"] : null,
            "pregunta54" => $_POST["pregunta54"] !== "" ? $_POST["pregunta54"] : null,
            "pregunta55" => $_POST["pregunta55"] !== "" ? $_POST["pregunta55"] : null,
            "pregunta56" => $_POST["pregunta56"] !== "" ? $_POST["pregunta56"] : null,
            "pregunta57" => $_POST["pregunta57"] !== "" ? $_POST["pregunta57"] : null,
            "pregunta58" => $_POST["pregunta58"] !== "" ? $_POST["pregunta58"] : null,
            "pregunta59" => $_POST["pregunta59"] !== "" ? $_POST["pregunta59"] : null,
            "pregunta60" => $_POST["pregunta60"] !== "" ? $_POST["pregunta60"] : null,
            
            "usuario" => $_POST["usuario"]
            
        );*/

        $numAlternativas = count($_POST["alternativas"]);

        for($i=0;$i<$numAlternativas;$i++){
            $datos[] = array("pregunta".$_POST["ids"][$i] => $_POST["alternativas"][$i]);
        }



        //var_dump($datos);
        //exit(0);

        $datos[] = array("usuario" => $_POST["usuario"]);

        
        
        $respuesta = ControladorTests::ctrGuardarPrueba("prueba", $_POST["ids"], $_POST["alternativas"], $_POST["carreras"], $_POST["aptitudes"], $_POST["usuario"]);
        
        echo json_encode($respuesta);
    }
    /*public function ajaxVerificarPrueba(){
        $item = "usuario";
        $valor = $_SESSION["id"];
                
    }*/
}

if(isset($_POST["accion"])){
    if($_POST["accion"] === "guardarprueba"){
        $guadarPrueba = new AjaxTest();
        $guadarPrueba->ajaxGuardarPrueba();
    }
}
