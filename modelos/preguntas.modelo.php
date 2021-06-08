<?php

require_once "conexion.php";

class ModeloPreguntas{
	
    /**
     * [mdlCrearrPregunta Método para guardar las preguntas ingresadas por el administrador del sistema]
     * @param [string] $table [Nombre de la tabla: preguntas]
     * @param [array] $datos [Datos que se guardaran en la tabla]
     */
    static public function mdlCrearPregunta($tabla, $datos){
    	try {
    		$cnx = Conexion::conectar();

    		$cnx->beginTransaction();

    		$sql = "INSERT INTO $tabla(carrera_id, aptitud, pregunta, alternativa1, alternativa2, alternativa3, alternativa4) VALUES(:carrera_id, :aptitud, :pregunta, :alternativa1, :alternativa2, :alternativa3, :alternativa4)";

    		$stmt = $cnx->prepare($sql);

            $stmt->bindParam(":carrera_id", $datos["carrera_id"], PDO::PARAM_INT);
            $stmt->bindParam(":aptitud", $datos["aptitud"], PDO::PARAM_STR);
    		$stmt->bindParam(":pregunta", $datos["pregunta"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa1", $datos["alternativa1"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa2", $datos["alternativa2"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa3", $datos["alternativa3"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa4", $datos["alternativa4"], PDO::PARAM_STR);

    		if($stmt->execute()){
    			$cnx->commit();
    			return array("guardado" => "si");
    		}
    		else{
    			$cnx->rollback();
    			return array("guardado" => "no");	
    		}

    		$stmt->closeCursor();
    		$stmt = NULL;
    	} catch (Exception $e) {
    		$cnx->rollback();
    	}
    }


    /**
     * [mdlActualizarPregunta Método para actualizar las preguntas]
     * @param [string] $tabla [Nombre de la tabla: preguntas]
     * @param [array] $datos [Datos que se actualizaran en la tabla]
     * @return [object] [Resultado de la actualización de la pregunta]
     */
    
    static public function mdlActualizarPregunta($tabla, $datos){
    	try {

    		$cnx = Conexion::conectar();

    		$cnx->beginTransaction();

    		$sql = "UPDATE $tabla SET carrera_id = :carrera_id, aptitud = :aptitud, pregunta = :pregunta, alternativa1 = :alternativa1, alternativa2 = :alternativa2, alternativa3 = :alternativa3, alternativa4 = :alternativa4 WHERE id = :id";

    		$stmt = $cnx->prepare($sql);

            $stmt->bindParam(":carrera_id", $datos["carrera_id"], PDO::PARAM_INT);
            $stmt->bindParam(":aptitud", $datos["aptitud"], PDO::PARAM_STR);
    		$stmt->bindParam(":pregunta", $datos["pregunta"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa1", $datos["alternativa1"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa2", $datos["alternativa2"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa3", $datos["alternativa3"], PDO::PARAM_STR);
    		$stmt->bindParam(":alternativa4", $datos["alternativa4"], PDO::PARAM_STR);
    		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    		if($stmt->execute()){
    			$cnx->commit();
    			return array("actualizado" => "si");
    		}
    		else{
    			$cnx->rollback();
    			return array("actualizado" => "no");	
    		}

    		$stmt->closeCursor();
    		$stmt = NULL;
    	} catch (Exception $e) {
    		$cnx->rollback();	
    	}
    }


    /**
     * [mdlBuscarPregunta Método para buscar una pregunta]
     * @param  [string] $tabla 	[Nombre de la tabla: preguntas]
     * @param  [array] 	$datos 	[Dato para buscar la pregunta]
     * @return [object]        	[Resultado de la busquedad de la pregunta]
     */
    static public function mdlBuscarPregunta($tabla, $datos){
    	$cnx = Conexion::conectar();

    	$sql = "SELECT * FROM $tabla WHERE id = :id";

    	$stmt = $cnx->prepare($sql);

    	$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    	if($stmt->execute()){
    		$pregunta = $stmt->fetchAll();
    		if($pregunta){
    			return array("encontrado"=>"si", "pregunta"=>$pregunta);
    		}
    		else{
    			return array("encontrado"=>"no");	
    		}
    	}
    	else{
    		return array("encontrado"=>"no");
    	}

        $stmt->closeCursor();
        $stmt = NULL;
    }

    /**
     * [mdlListarPreguntas Método para listar todas las preguntas]
     * @param [string] $tabla [Nombre de la tabla: preguntas]
     * @return [object] [Resultado de todas las preguntas]
     */
    static public function mdlListarPreguntas($tabla){
    	$cnx = Conexion::conectar();

    	$sql = "SELECT 
					p.id, p.carrera_id, p.pregunta, p.alternativa1, p.alternativa2, p.alternativa3, p.alternativa4, p.aptitud 
				FROM 
					$tabla p, carreras c 
				WHERE 
					p.carrera_id = c.id AND 
					p.eliminada = 0 AND 
					c.activo = 1";
		
		$stmt = $cnx->prepare($sql);

    	if($stmt->execute()){
    		$preguntas = $stmt->fetchAll();
    		if($preguntas){
    			return array("preguntas"=>$preguntas);	
    		}
    		else{
    			return array("preguntas"=>NULL);	
    		}
    		
    	}
    	else{
    		return array("preguntas"=>NULL);
    	}
    }

    /**
     * [mdlEliminarPregunta Método para eliminar una pregunta]
     * @param  [string] 	$tabla 	[Nombre de la tabla: preguntas]
     * @param  [array] 		$datos 	[Dato del id de la pregunta]
     * @return [object]        		[Respuesta de eliminación de una pregunta]
     */
    static public function mdlEliminarPregunta($tabla, $datos){
    	
    	try{
    		
    		$cnx = Conexion::conectar();

    		$cnx->beginTransaction();

    		//$sql = "DELETE FROM $tabla WHERE id = :id";
			$sql = "UPDATE $tabla SET eliminada = 1 WHERE id = :id";

    		$stmt = $cnx->prepare($sql);

    		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    		if($stmt->execute()){
    			$cnx->commit();
    			return array("eliminado"=>"si");
    		}
    		else{
    			$cnx->rollback();
    			return array("eliminado"=>"no");	
    		}

    		$stmt->closeCursor();
    		$stmt = NULL;

    	} catch (Exception $e) {
    		$cnx->rollback();
    	}
    	
    }


    static public function mdlTotalPreguntas($tabla){
        $cnx = Conexion::conectar();

        $sql = "SELECT 
					COUNT(p.id) AS total 
				FROM 
					$tabla p, carreras c 
				WHERE 
					p.carrera_id = c.id AND 
					c.activo = 1 AND 
					p.eliminada = 0";

        $stmt = $cnx->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->closeCursor();
        
        $stmt = NULL;
    }
}