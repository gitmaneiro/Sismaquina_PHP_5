<?
class SQLite extends SQLi
{
	function obtenerUsuarioId($strId)
	{
	
		$consulta = "SELECT * FROM usuarios where id='".$strId."' order by indicador limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarUsuarioId($strId)
	{
	
		$mensaje_error="";
	
		$consulta = "delete from usuarios where id=?;";
	

		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($strId))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function obtenerUsuarioFiltro($strNombre)
	{
	
		$consulta = "SELECT * FROM usuarios where indicador like '%".$strNombre."%'  order by indicador;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarUsuario($indicador, $clave, $admin)
	{
		$mensaje_error="";
	
		$consulta = "insert into usuarios (indicador, clave, admin) values (?,?,?);";
	

		if(trim($indicador)=="")
			$mensaje_error=array("U", 1,"Falta Indicador");

		if(trim($clave)=="")
			$mensaje_error=array("U", 1,"Falta Clave");

		


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($indicador, $clave, $admin))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function editarUsuario($id, $indicador, $clave, $admin)
	{
		$mensaje_error="";
	
		$consulta = "update usuarios set indicador=?, clave=?, admin=? where id=?;";
	

		if(trim($indicador)=="")
			$mensaje_error=array("U", 1,"Falta Indicador");

		if(trim($clave)=="")
			$mensaje_error=array("U", 1,"Falta Clave");

		


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($indicador, $clave,$admin, $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarUsuarios()
	{
	
		$consulta = "SELECT id, indicador, replace(replace(admin, 1, 'ADMINISTRADOR'), 0, '') as tipo  FROM usuarios order by indicador;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="puo"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerUsuarioId($_GET["id"])));
	}
	if($_GET['f']=="pux"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarUsuarioId($_GET["id"])));
	}
	if($_GET['f']=="pul"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarUsuarios()));
	}
	if($_GET['f']=="pua"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarUsuario($_GET["indicador"], $_GET["clave"], $_GET["admin"])));
	}
	if($_GET['f']=="pue"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarUsuario($_GET["id"],$_GET["indicador"], $_GET["clave"], $_GET["admin"])));
	}
	if($_GET['f']=="pub"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerUsuarioFiltro($_GET["indicador"])));
	}

?>
