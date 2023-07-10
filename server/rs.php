<?

class SQLite extends SQLi
{

	function ct($var_e, $var_t)
	{
	    $temp_a =-1*$var_e*$var_t;
	    return exp($temp_a);
	}

	function obtener_tppf($id_equipo)
	{
	$tppf=1;
		$consulta = "SELECT avg(tpf) FROM eventos where  equipo = ".$id_equipo.";";

		$result = $this->db->query($consulta);
	   	
	   	$tppf_tmp =$result->fetch();
		  if($tppf_tmp!=null)
		  {
		      $tppf=$tppf_tmp[0];
		  }
	   	
	   	$horas = array(20,40,120,200,280,360,440,520,600,680,760,820);
	   	
	   	$valores = array();
	   	foreach($horas as $hora)
	   	{
		    $inversa=1/$tppf;
		    $valores[0][]= $hora;
		    $valores[1][]= $this->ct($inversa, $hora);
		    $valores[2][]= $this->ct(0.0014, $hora);
		    $valores[3][]= $this->ct(0.00069, $hora);
	   	}
	   	
	   	
		return $valores;
		
	}
}


$Sqlit = new SQLite();

if($_GET['f']=="rs"){
			error_log('entro en rs: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtener_tppf($_GET["id"])));
	}


?>