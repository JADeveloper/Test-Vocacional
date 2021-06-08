<?php


class ControladorCarreras{

	/**
	 * [ctrListarCarreras Método para listas las carreras]
	 * @return [object] [Respuesta de las carreras]
	 */
	static public function ctrListarCarreras(){

		$respuesta = ModeloCarreras::mdlListarCarreras("carreras");

		return $respuesta;

	}

	/**
     * [ctrBuscarCarrera Método para buscar carrera]
     * @param  [integer] $carrera_id [Identificador de la carrera]
     * @return [string]              [Nombre de la carrera]
     */
    static public function ctrBuscarCarrera($carrera_id){
    	$datos = array(
    		"id" => $carrera_id
    	);

    	$respuesta = ModeloCarreras::mdlBuscarCarrera("carreras", $datos);

    	return $respuesta;
    }

    /**
     * [ctrBuscarCarrera2 Método para buscar carrera]
     * @param  [integer] $carrera_id [Identificador de la carrera]
     * @return [string]              [Nombre de la carrera]
     */
    static public function ctrBuscarCarrera2(){
    	$datos = array(
    		"id" => $_POST["id"]
    	);

    	$respuesta = ModeloCarreras::mdlBuscarCarrera2("carreras", $datos);

    	return $respuesta;
    }

    /**
     * [ctrTotalCarreras Método para saber el total de carreras disponibles]
     * @return [object] [Resultado con las carreras disponibles]
     */
    static public function ctrTotalCarreras(){
        $respuesta = ModeloCarreras::mdlTotalCarreras("carreras");

        return $respuesta;
    }

    /**
     * [ctrPorcentajeCarreras Método para buscar los porcentajes por carrera]
     * @return [object] [Resultado de los porcentajes por carrera]
     */
    static public function ctrPorcentajeCarreras(){
        
        $respuesta = ModeloCarreras::mdlPorcentajeCarreras("carreras", "recocarreras");
        return $respuesta;

    }


    static public function ctrPorcentajeAptitudes(){
        $respuesta = ModeloCarreras::mdlPorcentajeAptitudes("recoaptitudes");
        return $respuesta;
    }

    static public function ctrTraerTodas(){
        
        $respuesta = ModeloCarreras::mdlTraerTodas("carreras");
        
        return $respuesta;
    }


    static public function ctrActivarCarrera(){


        $datos = array(
            "activoCarrera"  => $_POST["activoCarrera"],
            "idCarrera"      => $_POST["idCarrera"]
        );

        $respuesta = ModeloCarreras::mdlActivarCarrera("carreras", $datos);
        
        return $respuesta;
    }

    static public function ctrCrearCarrera(){

        if(isset($_POST["nuevaCarrera"])){
            
            $datos = array(
                "carrera"   => $_POST["nuevaCarrera"],
                "link"      => $_POST["nuevoLink"]
            );
    
            $respuesta = ModeloCarreras::mdlCrearCarrera("carreras", $datos);
    
            if($respuesta === "ok"){
    
                    echo '<script>
    
                    swal({
                        type: "success",
                        title: "La carrera ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
    
                    }).then(function(result){
    
                        if(result.value){
                            window.location = "carreras";
                        }
    
                    });
                
    
                    </script>';
    
    
            }else{
    
                echo '<script>
    
                    swal({
                        type: "error",
                        title: "Problemas al guardar la carrera",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "carreras";
                        }
                    });
                
                </script>';
    
            }
        }
    }

    static public function ctrEditarCarrera(){

        if(isset($_POST["editarCarrera"])){
            
            $datos = array(
                "carrera"   => $_POST["editarCarrera"],
                "link"      => $_POST["editarLink"],
                "id"        => $_POST["editarId"],
            );

            //var_dump($datos); exit(0);
    
            $respuesta = ModeloCarreras::mdlEditarCarrera("carreras", $datos);

            //var_dump($respuesta); exit(0);
    
            if($respuesta === "ok"){
    
                echo '<script>
    
                    swal({
                        type: "success",
                        title: "La carrera ha sido modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
    
                    }).then(function(result){
    
                        if(result.value){
                            window.location = "carreras";
                        }
    
                    });
                
                </script>';
    
    
            }else{
    
                echo '<script>
    
                    swal({
                        type: "error",
                        title: "Problemas al modificar la carrera",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "carreras";
                        }
                    });
                
                </script>';
    
            }
        
        }
        
    }
    

    static public function ctrEliminarCarrera(){
        
        $datos = array(
            "id"  => $_POST["id"],

            );

        $respuesta = ModeloCarreras::mdlEliminarCarrera("carreras", $datos);
        
        return $respuesta;
    }

}