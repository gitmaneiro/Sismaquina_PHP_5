<?

class SQLite extends SQLi
{

	

	function obtener_tmfs($id_equipo)
	{
	      $salida=array();
		$consulta = "SELECT mes || ' - ' ||  ano, avg(tfs) FROM eventos where fecha_ejecucion is not null and equipo = ".$id_equipo." group by ano, mes order by ano, mes;";

		$result = $this->db->query($consulta);
	   	
		$arreglo_datos = $result->fetchAll();
		
		foreach($arreglo_datos as $fila)
		{
		  $salida[0][] = $fila[0];
		  $salida[1][] = (float)$fila[1];
		}
		
		return  $salida;
		
	}
}


$Sqlit = new SQLite();

if($_GET['f']=="rt"){
			error_log('entro en rt: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtener_tmfs($_GET["id"])));
	}


?>