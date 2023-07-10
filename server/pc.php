<?
class SQLite extends SQLi
{
	function obtenerCierreId($strId)
	{
	
		$consulta = "SELECT * FROM eventos where id='".$strId."' order by fecha_falla limit 1;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll(PDO::FETCH_ASSOC);
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function eliminarCierreId($strId)
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

	function obtenerCierreFiltro($equipo, $fecha, $falla)
	{
	
		$consulta = "SELECT a.id, b.nombre_corto, a.fecha_falla,a.fecha_ejecucion, c.nombre_falla, a.observaciones FROM eventos as a, equipos as b, fallas as c where a.equipo=b.id and a.tipo=c.id and (fecha_falla = '".$fecha."' or equipo = '".$equipo."'  or tipo = '".$falla."' )  order by fecha_falla;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function agregarCierre($equipo, $fecha, $falla, $observaciones)
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

	function editarCierre($id, $equipo, $fecha, $falla, $observaciones)
	{
		$mensaje_error="";
		
		$TPF=0;
		$TFS=0;
		$ano_num=2016;
		$mes_num=1;
		$dia_num=1;
		
		$fecha_cierre_a=$this->a_fecha($fecha);
		
		$ano_num=$fecha_cierre_a->format('Y');
		$mes_num=$fecha_cierre_a->format('m');
		$dia_num=$fecha_cierre_a->format('d');
		
		$consulta = "SELECT fecha_falla  FROM eventos where id='".$id."' ;";

		$resulta = $this->db->prepare($consulta);
	   	
		$resulta-> execute();
		$fecha_falla_a='';
		  $fecha_tmp_a =$resulta->fetch();
		  if($fecha_tmp_a!=null)
		  {
		    
		      
		      $fecha_falla_a=$this->a_fecha($fecha_tmp_a['fecha_falla']);
		      $TFS=$fecha_cierre_a->diff($fecha_falla_a)->h;
		  }
		  
		  
		  $consulta = "SELECT fecha_ejecucion  FROM eventos where equipo='".$equipo."' and fecha_ejecucion is not null order by fecha_ejecucion desc limit 1 ;";

		$resulta = $this->db->prepare($consulta);
	   	
		$resulta-> execute();
		$fecha_cierre='';
		  $fecha_tmp =$resulta->fetch();
		  if($fecha_tmp!=null)
		  {
		    
		      
		      $fecha_cierre=$this->a_fecha($fecha_tmp['fecha_ejecucion']);
		      $TPF=$fecha_falla_a->diff($fecha_cierre)->h;
		      
		  }
		  
		 
	
		$consulta = "update eventos set equipo=?, fecha_ejecucion=?, tipo=?, observaciones=?, tpf=?, tfs=?, ano=?, mes=?, dia=? where id=?;";
	

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

				if (!$result->execute(array($equipo, $fecha, $falla, $observaciones,$TPF, $TFS, $ano_num, $mes_num, $dia_num,  $id))) 
					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);	
			}
		}
	   	
		return $mensaje_error;
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

	function listarCierres()
	{
	
		$consulta = "SELECT a.id, b.nombre_corto, a.fecha_falla,a.fecha_ejecucion, c.nombre_falla, a.observaciones FROM eventos as a, equipos as b, fallas as c where a.equipo=b.id and a.tipo=c.id and a.fecha_ejecucion is null  order by fecha_falla asc;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}
	function listarPiezas($id_piezas)
	{
	
		$consulta = "SELECT a.id, b.nombre, a.cantidad  FROM piezas_eventos as a, piezas as b  where a.pieza=b.id and a.registro='".$id_piezas."'  order by b.nombre;";

		$result = $this->db->query($consulta);
	   	
		return $result->fetchAll();
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}
	
	function agregarPieza($id_registro, $id_pieza, $cantidad_pieza)
	{
		$mensaje_error="";
		
		if(!ctype_digit($cantidad_pieza))
		{
			$mensaje_error=array("U", 1, "La cantidad debe ser un número");
		}
		else {
				
		$consulta = "SELECT cantidad  FROM piezas where id='".$id_pieza."' and cantidad > ".$cantidad_pieza.";";

		$resulta = $this->db->query($consulta);
	   	
		
		
		  if($resulta->fetchColumn()<1)
		  {
		    $mensaje_error=array("U", 1,"La cantidad excede el disponible de la pieza");
		  }
		
		
		
		$resultado = $this->db->query("SELECT id FROM piezas_eventos WHERE registro=".$id_registro." and pieza=".$id_pieza.";");
	   	
		
		
		  if($resultado->fetchColumn()>0)
		  {
		    $consulta = "UPDATE piezas_eventos set cantidad=cantidad+? where pieza=? and registro=?;";
		  }
		  else {
			  $consulta = "insert into piezas_eventos ( cantidad,pieza,registro) values (?,?,?);";
		  }
		  
		
	

		if(trim($cantidad_pieza)=="")
			$mensaje_error=array("U", 1,"Escriba una cantidad");

		if(trim($id_registro)=="")
			$mensaje_error=array("U", 1,"Falso registro");

		if(trim($id_pieza)=="0")
			$mensaje_error=array("U", 1, "Seleccione una Pieza");

		}

		if($mensaje_error=="")
		{
			$result = $this->db->prepare($consulta);


			if(!$result)
				$mensaje_error=$this->db->errorInfo();
			else
			{

				if (!$result->execute(array( $cantidad_pieza, $id_pieza, $id_registro))) 
				

					$mensaje_error=$this->db->errorInfo();
				error_log('error PDO : '.implode(",", $this->db->errorInfo()),0);
				
				$actual_cantidad = $this->db->prepare("UPDATE piezas set cantidad = cantidad - ".$cantidad_pieza." where id=".$id_pieza."; ");
				$actual_cantidad->execute(); 
			}
		}
	   	
		return $mensaje_error;
		//return array('fecha_falla' => 'prueba', 'descripcion' => 'desc', 'produccion' => '0', 'observaciones' => 'aqui');
	
	}

}


	$Sqlit = new SQLite();

	if($_GET['f']=="pco"){
			error_log('entro en f: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerCierreId($_GET["id"])));
	}
	if($_GET['f']=="pcx"){
			error_log('entro en x: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->eliminarCierreId($_GET["id"])));
	}
	if($_GET['f']=="pcl"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarCierres()));
	}
	if($_GET['f']=="pca"){
			error_log('entro en a: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarCierre($_GET["equipo"], $_GET["fecha"], $_GET["falla"], $_GET["observaciones"])));
	}
	if($_GET['f']=="pce"){
			error_log('entro en e: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->editarCierre($_GET["id"],$_GET["equipo"], $_GET["fecha"], $_GET["falla"], $_GET["observaciones"])));
	}
	if($_GET['f']=="pcb"){
			error_log('entro en b: '.implode(",", $_GET),0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtenerCierreFiltro($_GET["equipo"], $_GET["fecha"], $_GET["falla"])));
	}
	if($_GET['f']=="pcp"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->listarPiezas($_GET["id"])));
	}
	if($_GET['f']=="pcpa"){
			error_log('entro en l: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->agregarPieza($_GET["id"], $_GET["id_pieza"], $_GET["cantidad"])));
	}
?>
