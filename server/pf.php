<?
class SQLite extends SQLi
{
	function obtenerFallaId($strId)
	{
	
		$consulta = "SELECT * FROM fallas where id='".$strId."' order by nombre_falla limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarFallaId($strId)
	{
	
		$mensaje_error="";
	
		$consulta = "delete from fallas where id=?;";
	

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

	function obtenerFallaFiltro($strNombre, $strDetalles)
	{
	
		$consulta = "SELECT * FROM fallas where nombre_falla like '%".$strNombre."%' and detalles like '%".$strDetalles."%'  order by nombre_falla;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarFalla($nombre_falla, $detalles)
	{
		$mensaje_error="";
	
		$consulta = "insert into fallas (nombre_falla, detalles) values (?,?);";
	

		if(trim($nombre_falla)=="")
			$mensaje_error=array("U", 1,"Falta Nombre");

		if(trim($detalles)=="")
			$mensaje_error=array("U", 1,"Falta Detalles");

		


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre_falla, $detalles))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function editarFalla($id, $nombre_falla, $detalles)
	{
		$mensaje_error="";
	
		$consulta = "update fallas set nombre_falla=?, detalles=? where id=?;";
	

		if(trim($nombre_falla)=="")
			$mensaje_error=array("U", 1,"Falta Nombre");

		if(trim($detalles)=="")
			$mensaje_error=array("U", 1,"Falta Detalles");

		


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre_falla, $detalles, $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarfallas()
	{
	
		$consulta = "SELECT * FROM fallas order by nombre_falla;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="pfo"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerFallaId($_GET["id"])));
	}
	if($_GET['f']=="pfx"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarFallaId($_GET["id"])));
	}
	if($_GET['f']=="pfl"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarFallas()));
	}
	if($_GET['f']=="pfa"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarFalla($_GET["nombre_falla"], $_GET["detalles"])));
	}
	if($_GET['f']=="pfe"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarFalla($_GET["id"],$_GET["nombre_falla"], $_GET["detalles"])));
	}
	if($_GET['f']=="pfb"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerFallaFiltro($_GET["nombre_falla"], $_GET["detalles"])));
	}

?>
