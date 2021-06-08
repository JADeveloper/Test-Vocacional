<?php

require_once "conexion.php";

class ModeloCarreras{


	/**
	 * [mdlListarCarreras Método para listar carreras]
	 * @param  [string] $tabla [Nombre de la tabla: carreras]
	 * @return [object]        [Listado de carreras]
	 */
	static public function mdlListarCarreras($tabla){

		$cnx = Conexion::conectar();

		$sql = "SELECT id, carrera FROM $tabla WHERE activo = 1";

		$stmt = $cnx->prepare($sql);

		if($stmt->execute()){
			$carreras = $stmt->fetchAll();
			if($carreras){
				return array("carreras"=>$carreras);	
			}
			else{
				return array("carreras"=>NULL);
			}
			
		}
		else{
			return array("carreras"=>NULL);
		}

	}

	/**
     * [mdlBuscarCarrera Método para buscar una carrera]
     * @param  [string] $tabla  [Nombre de la tabla: carrera]
     * @param  [array] $datos   [Identificacion de la carrera]
     * @return [array]          [El nombre de la carrera]
     */
    static public function mdlBuscarCarrera($tabla, $datos){
        $cnx = Conexion::conectar();

        $sql = "SELECT carrera FROM $tabla WHERE id = :id";

        $stmt = $cnx->prepare($sql);

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if($stmt->execute()){
            $carrera = $stmt->fetchAll();
            if($carrera){
                return array("carrera" => $carrera);
            }
            else{
                return array("carrera" => NULL);
            }
        }
        else{
            return array("carrera" => NULL);
        }

        $stmt->closeCursor();
        $stmt = NULL;
    }

    /**
     * [mdlBuscarCarrera2 Método para buscar una carrera]
     * @param  [string] $tabla  [Nombre de la tabla: carrera]
     * @param  [array] $datos   [Identificacion de la carrera]
     * @return [array]          [El nombre de la carrera]
     */
    static public function mdlBuscarCarrera2($tabla, $datos){
        $cnx = Conexion::conectar();

        $sql = "SELECT id, carrera, link FROM $tabla WHERE id = :id";

        $stmt = $cnx->prepare($sql);

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if($stmt->execute()){
            $carrera = $stmt->fetchAll();
            if($carrera){
                return array("carrera" => $carrera);
            }
            else{
                return array("carrera" => NULL);
            }
        }
        else{
            return array("carrera" => NULL);
        }

        $stmt->closeCursor();
        $stmt = NULL;
    }


    /**
     * [mdlTotalCarreras Método para saber el total de carreras disponibles]
     * @param  [string] $tabla [Nombre de la tabla: recocarreras]
     * @return [object]        [Resultado del total de carreras disponibles]
     */
    static public function mdlTotalCarreras($tabla){
        $cnx = Conexion::conectar();

        $sql = "SELECT COUNT(id) AS total FROM $tabla WHERE activo = 1";

        $stmt = $cnx->prepare($sql);

        $stmt->execute();
        
        return $stmt->fetchAll();
        
        $stmt->closeCursor();
        $stmt = NULL;   
    }

    /**
     * [mdlPorcentajeCarreras Método para sacar los porcentajes máximos de las carreras]
     * @param  [string] $tabla [Nombre de la tabla: recocarreras]
     * @return [object]        [Resultado de los porcentajes máximos de las carreras]
     */
    static public function mdlPorcentajeCarreras($tabla1, $tabla2){

        // $tabla1 = carreras
        // $tabla2 = recocarreras

        $cnx = Conexion::conectar();

        $sql1 = "SELECT carrera FROM $tabla1 WHERE activo = 1";

        $sql2 = "SELECT 
                    MAX(rc.porcentaje) AS porcentaje 
                 FROM 
                    $tabla2 rc, $tabla1 ca 
                 WHERE 
                    rc.carrera = ca.id AND 
                    ca.activo = 1
                 GROUP BY 
                    rc.carrera 
                 ORDER BY 
                    rc.porcentaje DESC";

        
        $busquedad1 = true;

        $stmt1 = $cnx->prepare($sql1);

        if(!$stmt1->execute()){ $busquedad1 = false; }    

        $carreras = $stmt1->fetchAll();

        $busquedad2 = true;

        $stmt2 = $cnx->prepare($sql2);

        if(!$stmt2->execute()){ $busquedad2 = false; }
        
        $porcentajes = $stmt2->fetchAll();

        if($busquedad1 && $busquedad2){
            return array("carreras"=>$carreras, "porcentajes" => $porcentajes);
        }
        else{
            return array("carreras" => NULL, "porcentajes" => NULL);
        }

        $stmt1->closeCursor();
        $stmt2->closeCursor();

        $stmt1 = NULL;
        $stmt2 = NULL;
    }


    static public function mdlPorcentajeAptitudes($tabla){
        $cnx = Conexion::conectar();

        $sql = "SELECT MAX(porcentaje) AS porcentaje, aptitud FROM $tabla GROUP BY aptitud ORDER BY porcentaje DESC";

        $stmt = $cnx->prepare($sql);

        $stmt->execute();

        $aptitudes = $stmt->fetchAll();

        return array("aptitudes" => $aptitudes);

        $stmt->closeCursor();

        $stmt = NULL;
    }

    static public function mdlTraerTodas($tabla){
        
        $cnx = Conexion::conectar();

        $sql = "SELECT * FROM $tabla";

        $stmt = $cnx->prepare($sql);
        
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->closeCursor();

        $stmt = NULL;

    }

    static public function mdlActivarCarrera($tabla, $datos){

        $cnx = Conexion::conectar();

        try {
            $cnx->beginTransaction();

            $sql = "UPDATE $tabla SET activo = :activo WHERE id = :id";

            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(":activo", $datos["activoCarrera"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $datos["idCarrera"], PDO::PARAM_INT);

            if($stmt->execute()){
                $cnx->commit();
                return "ok";
            }
            else{
                $cnx->rollback();
                return "error";
            }

            $stmt->closeCursor();
            $stmt = NULL;    

        } catch (PDOException $pe) {
            $cnx->rollback();
        }

    }

    static public function mdlCrearCarrera($tabla, $datos){
        $cnx = Conexion::conectar();

        try {
            
            $cnx->beginTransaction();

            $sql = "SELECT MAX(id) AS max_id FROM $tabla";

            $stmt = $cnx->prepare($sql);

            $stmt->execute();

            $r = $stmt->fetchAll();

            $maxId = $r[0]["max_id"];

            if($maxId === NULL){
                $identificador = 1;
            }
            else{
                $identificador = $maxId + 1;
            }

            $sql = "INSERT INTO $tabla(id, carrera, link) VALUES(:id, :carrera, :link)";

            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(":id", $identificador, PDO::PARAM_INT);
            $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
            $stmt->bindParam(":link", $datos["link"], PDO::PARAM_STR);

            if($stmt->execute()){
                $cnx->commit();
                return "ok";
            }
            else{
                $cnx->rollback();
                return "error";
            }

            $stmt->closeCursor();
            $stmt = NULL;    

        } catch (PDOException $pe) {
            $cnx->rollback();
        }

    }

    static public function mdlEditarCarrera($tabla, $datos){

        //var_dump($datos); exit(0);

        $cnx = Conexion::conectar();

        try {
            $cnx->beginTransaction();

            $sql = "UPDATE $tabla SET carrera = :carrera, link = :link WHERE id = :id";

            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
            $stmt->bindParam(":link", $datos["link"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if($stmt->execute()){
                $cnx->commit();
                return "ok";
            }
            else{
                $cnx->rollback();
                return "error";
            }

            $stmt->closeCursor();
            $stmt = NULL;
        } catch (PDOException $pe) {
            $cnx->rollback();
        }

    }

}