<?
class SQLite extends SQLi
{
	function listarFallas()
	{
	
		$consulta = "SELECT * FROM fallas order by nombre_falla asc;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarEquipos()
	{
	
		$consulta = "SELECT * FROM equipos order by nombre_corto asc;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}
	function listarPiezas()
	{
	
		$consulta = "SELECT id, nombre FROM piezas order by nombre asc;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('nombre_corto' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}
	

}


	$Sqlit = new SQLite();

	if($_GET['f']=="lf"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarFallas()));
	}
	if($_GET['f']=="le"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarEquipos()));
	}
	if($_GET['f']=="lp"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarPiezas()));
	}

?>
