<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt ->fetchAll();

		}else{

			// Mostrar todos los usuarios
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt->closeCursor();

		$stmt = null;

	}
        
        /*=============================================
	MOSTRAR TECNICOS
	=============================================*/

	static public function mdlMostrarTecnicos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt ->fetchAll();

		}		

		$stmt->closeCursor();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE USUARIO BACKEND
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, correo, celular, instituto, fecnac, metas, estado) 
												VALUES (:nombre, :usuario, :password, :perfil, :foto, :correo, :celular, :instituto, :fecnac, :metas, :estado)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":instituto", $datos["instituto"], PDO::PARAM_STR);
		$stmt->bindParam(":fecnac", $datos["fecnac"], PDO::PARAM_STR);
		$stmt->bindParam(":metas", $datos["metas"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
                
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		
		$stmt = null;

	}
        
    /*=============================================
	REGISTRO DE USUARIO FRONTEND
	=============================================*/

	static public function mdlIngresarUsuario2($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, estado) VALUES (:nombre, :usuario, :password, :perfil, :estado)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
		
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		
		$stmt = null;

	}
        
    /*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto, correo = :correo, celular = :celular, instituto = :instituto, fecnac = :fecnac, metas = :metas WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt -> bindParam(":instituto", $datos["instituto"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecnac", $datos["fecnac"], PDO::PARAM_STR);
		$stmt -> bindParam(":metas", $datos["metas"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt->closeCursor();

		$stmt = null;

	}
        
    /*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function mdlEditarPerfil($tabla, $datos){
            	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, foto = :foto, correo = :correo, celular = :celular, instituto = :instituto, fecnac = :fecnac, metas = :metas WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt -> bindParam(":instituto", $datos["instituto"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecnac", $datos["fecnac"], PDO::PARAM_STR);
        $stmt -> bindParam(":metas", $datos["metas"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){
                    	return "ok";
		
		}else{

			return "error";	

		}

		$stmt->closeCursor();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt->closeCursor();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt->closeCursor();

		$stmt = null;


	}
        
    /*=============================================
	BUSCAR TECNICOS
	=============================================*/

	static public function mdlBuscarTecnicos($tabla, $datos){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil = :perfil");
            $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();    
            
    }


    static public function mdlTotalAlumnos($tabla){

    	$cnx = Conexion::conectar();

		$sql = "SELECT COUNT(id) AS total FROM $tabla WHERE perfil = 'Usuario'";

		$stmt = $cnx->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll();

    }

	static public function mdlTestUsuarios($tabla1, $tabla2){
		$cnx = Conexion::conectar();

		$sql = "SELECT 
					u.id, u.nombre, u.correo, u.celular, u.foto, u.fecnac, u.instituto 
				FROM 
					$tabla1 p, 
					$tabla2 u 
				WHERE 
					p.usuario = u.id AND 
					u.perfil = 'Usuario'
				GROUP BY
					u.usuario";
		
		$stmt = $cnx->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}


}