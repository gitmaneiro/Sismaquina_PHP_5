<?
class SQLite extends SQLi
{
	function obtenerPiezaId($strId)
	{
	
		$consulta = "SELECT * FROM piezas where id='".$strId."' order by nombre limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarPiezaId($strId)
	{
	
		$mensaje_error="";
	
		$consulta = "delete from piezas where id=?;";
	

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

	function obtenerPiezaFiltro($strNombre, $strDetalles)
	{
	
		$consulta = "SELECT * FROM piezas where nombre like '%".$strNombre."%' and descripcion like '%".$strDetalles."%'  order by nombre;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarPieza($nombre, $detalles, $cantidad)
	{
		$mensaje_error="";
	
		$consulta = "insert into piezas (nombre, descripcion, cantidad) values (?,?,?);";
	

		if(trim($nombre)=="")
			$mensaje_error=array("U", 1,"Falta Nombre");

		if(trim($detalles)=="")
			$mensaje_error=array("U", 1,"Falta Detalles");

		if(trim($cantidad)=="")
			$mensaje_error=array("U", 1,"Falta Cantidad");
		if(!is_numeric($cantidad))
			$mensaje_error=array("U", 1,"La Cantidad debe ser un número");

		


		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre, $detalles, $cantidad))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function editarPieza($id, $nombre, $detalles,$cantidad)
	{
		$mensaje_error="";
	
		$consulta = "update piezas set nombre=?, descripcion=?, cantidad=? where id=?;";
	

		if(trim($nombre)=="")
			$mensaje_error=array("U", 1,"Falta Nombre");

		if(trim($detalles)=="")
			$mensaje_error=array("U", 1,"Falta Detalles");

		if(trim($cantidad)=="")
			$mensaje_error=array("U", 1,"Falta Cantidad");
		if(!is_numeric($cantidad))
			$mensaje_error=array("U", 1,"La Cantidad debe ser un número");

		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array($nombre, $detalles, $cantidad, $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarPiezas()
	{
	
		$consulta = "SELECT * FROM piezas order by nombre;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="ppo"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerPiezaId($_GET["id"])));
	}
	if($_GET['f']=="ppx"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarPiezaId($_GET["id"])));
	}
	if($_GET['f']=="ppl"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarPiezas()));
	}
	if($_GET['f']=="ppa"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarPieza($_GET["nombre"], $_GET["detalles"], $_GET["cantidad"])));
	}
	if($_GET['f']=="ppe"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarPieza($_GET["id"],$_GET["nombre"], $_GET["detalles"],$_GET["cantidad"])));
	}
	if($_GET['f']=="ppb"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerPiezaFiltro($_GET["nombre"], $_GET["detalles"])));
	}

?>
