<?
class SQLite extends SQLi
{
	function obtenerRegistroId($strId)
	{
	
		$consulta = "SELECT * FROM eventos where id='".$strId."' order by fecha_falla limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarRegistroId($strId)
	{
	
		$mensaje_error="";
	
		$consulta = "delete from eventos where id=?;";
	

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
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function obtenerRegistroFiltro($equipo, $fecha, $falla)
	{
	
		$consulta = "SELECT a.id, b.nombre_corto, a.fecha_falla, c.nombre_falla, a.observaciones FROM eventos as a, equipos as b, fallas as c where a.equipo=b.id and a.tipo=c.id and (fecha_falla like '%".$fecha."%' or equipo = '".$equipo."'  or tipo = '".$falla."' )  order by fecha_falla;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarRegistro($equipo, $fecha, $falla, $observaciones)
	{
		$mensaje_error="";
	
		$consulta = "insert into eventos (equipo, fecha_falla, tipo, observaciones) values (?,?,?,?);";
	

		if(trim($equipo)=="0")
			$mensaje_error=array("U", 1,"Seleccione un equipo");

		if(trim($fecha)=="")
			$mensaje_error=array("U", 1,"Falta Fecha");

		if(trim($falla)=="0")
			$mensaje_error=array("U", 1, "Seleccione una falla");


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($equipo, $fecha, $falla, $observaciones))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function editarRegistro($id, $equipo, $fecha, $falla, $observaciones)
	{
		$mensaje_error="";
	
		$consulta = "update eventos set equipo=?, fecha_falla=?, tipo=?, observaciones=? where id=?;";
	

		if(trim($equipo)=="0")
			$mensaje_error=array("U", 1,"Seleccione un equipo");

		if(trim($fecha)=="")
			$mensaje_error=array("U", 1,"Falta Fecha");

		if(trim($falla)=="0")
			$mensaje_error=array("U", 1, "Seleccione una falla");


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($equipo, $fecha, $falla, $observaciones, $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarRegistros()
	{
	
		$consulta = "SELECT a.id, b.nombre_corto, a.fecha_falla, c.nombre_falla, a.observaciones FROM eventos as a, equipos as b, fallas as c where a.equipo=b.id and a.tipo=c.id  order by fecha_falla asc;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="pro"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerRegistroId($_GET["id"])));
	}
	if($_GET['f']=="prx"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarRegistroId($_GET["id"])));
	}
	if($_GET['f']=="prl"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarRegistros()));
	}
	if($_GET['f']=="pra"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarRegistro($_GET["equipo"], $_GET["fecha"], $_GET["falla"], $_GET["observaciones"])));
	}
	if($_GET['f']=="pre"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarRegistro($_GET["id"],$_GET["equipo"], $_GET["fecha"], $_GET["falla"], $_GET["observaciones"])));
	}
	if($_GET['f']=="prb"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerRegistroFiltro($_GET["equipo"], $_GET["fecha"], $_GET["falla"])));
	}

?>
