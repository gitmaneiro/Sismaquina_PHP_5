<?
class SQLite extends SQLi
{
	function obtenerEquipoId($strId)
	{
	
		$consulta = "SELECT * FROM equipos where id='".$strId."' order by nombre_corto limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarEquipoId($strId)
	{
	
		$mensaje_error="";
	
		$consulta = "delete from equipos where id=?;";
	

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

	function obtenerEquipoFiltro($strNombre, $strDescripcion)
	{
	
		$consulta = "SELECT * FROM equipos where nombre_corto like '%".$strNombre."%' and descripcion like '%".$strDescripcion."%'  order by nombre_corto;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarEquipo($nombre_corto, $descripcion, $produccion, $observaciones)
	{
		$mensaje_error="";
	
		$consulta = "insert into equipos (nombre_corto, descripcion, produccion, observaciones) values (?,?,?,?);";
	

		if(trim($nombre_corto)=="")
			$mensaje_error=array("U", 1,"Falta Nombre Corto");

		if(trim($descripcion)=="")
			$mensaje_error=array("U", 1,"Falta Descripción");

		if(trim($produccion)=="")
			$mensaje_error=array("U", 1, "Falta Producción");


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre_corto, $descripcion, $produccion, $observaciones))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function editarEquipo($id, $nombre_corto, $descripcion, $produccion, $observaciones)
	{
		$mensaje_error="";
	
		$consulta = "update equipos set nombre_corto=?, descripcion=?, produccion=?, observaciones=? where id=?;";
	

		if(trim($nombre_corto)=="")
			$mensaje_error=array("U", 1,"Falta Nombre Corto");

		if(trim($descripcion)=="")
			$mensaje_error=array("U", 1,"Falta Descripción");

		if(trim($produccion)=="")
			$mensaje_error=array("U", 1, "Falta Producción");


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre_corto, $descripcion, $produccion, $observaciones, $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarEquipos()
	{
	
		$consulta = "SELECT * FROM equipos order by nombre_corto;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="peo"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerEquipoId($_GET["id"])));
	}
	if($_GET['f']=="pex"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarEquipoId($_GET["id"])));
	}
	if($_GET['f']=="pel"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarEquipos()));
	}
	if($_GET['f']=="pea"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarEquipo($_GET["nombre_corto"], $_GET["descripcion"], $_GET["produccion"], $_GET["observaciones"])));
	}
	if($_GET['f']=="pee"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarEquipo($_GET["id"],$_GET["nombre_corto"], $_GET["descripcion"], $_GET["produccion"], $_GET["observaciones"])));
	}
	if($_GET['f']=="peb"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerEquipoFiltro($_GET["nombre_corto"], $_GET["descripcion"])));
	}

?>
