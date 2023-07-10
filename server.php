<?



class SQLi
{
	var $db;
	
	function SQLi()
	{
		try {
        $this->db = new PDO("sqlite:bd_sismaquina.sqlite");

	
        
	    } catch(PDOException $e) {
		error_log('SISMAQUINA: Error al conectar con la Base de datos',0);		
		echo "  <p>Error: No puede conectarse con la base de datos.</p>\n";
		echo "  <p>Error: " . $e->getMessage() . "</p>\n";
		}

	}



	function esAdmin($strIndicador)
	{
		$resultado=false;
		$consulta = "SELECT id FROM usuarios where indicador='".$strIndicador."' and admin = 1;";

		$result = $this->db->query($consulta);

		foreach ($result as $valor) {
		 $resultado=true;	
	    	}

		return $resultado;
	
	}

	function esUsuario($strIndicador, $strClave)
	{
		$resultado=false;
		$consulta = "SELECT id FROM usuarios where indicador='".$strIndicador."' and clave = '".$strClave."';";

		$result = $this->db->query($consulta);

		foreach ($result as $valor) {
		 $resultado=true;	
	    	}

		return $resultado;
	
	}

	function a_fecha($str_fecha)
	{
	    $valor_f='';
	    if(!empty($str_fecha))
	    {
		$valor_str = substr($str_fecha, 6, 4).substr($str_fecha, 3, 2).substr($str_fecha, 0, 2)."T".substr($str_fecha, 11, 2).substr($str_fecha, 14, 2);
		$valor_f = new DateTime($valor_str);
	    }
	    
	    return $valor_f;
	}

	function utf8_converter($array)
	{
	    array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item, 'utf-8', true)){
		        $item = utf8_encode($item);
		}
	    });
	 
	    return $array;
	}

}

if($_GET['k']=="8")
{



	include("server/".substr($_GET['f'], 0, 2).".php");


error_log('entro en k',0);

	
}

if($_GET['k']=="101")
{



	include("server/varios.php");


error_log('entro en k',0);

	
}	


?>
