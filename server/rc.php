<?

class SQLite extends SQLi
{

	

	function obtener_causa($id_equipo)
	{
	      $filtro="";
	      if($id_equipo!=0)
		  $filtro= "and equipo = ".$id_equipo; 
	      $salida=array();
		$consulta = "select  a.nombre_corto, f.nombre_falla, count(e.id) from  (fallas as f left outer join equipos as a on a.id=e.equipo) left outer join eventos as e  on f.id=e.tipo  where 1=1 ".$filtro." group by a.nombre_corto, f.nombre_falla order by a.nombre_corto, f.nombre_falla desc;"; 

		$result = $this->db->query($consulta);
	   	
		$arreglo_datos = $result->fetchAll();
		$anterior="";
		$anterior2="";
		$equipo_a="";
		$indice_r=-1;
		
		$nro_fallas=0;
		$indice_falla=-1;
		$total_pfalla="";
		
		foreach($arreglo_datos as $fila)
		{
		  
		  
		  if(strcmp($fila[0],$anterior2)!=0)
		  {
		  
			 $indice_r++;
		         if($indice_r>0)
		         {
			      $indice_falla=-1;
			       
			  if(array_sum($salida[1][$indice_r-1]['data'])==0)
			  {
				
				unset($salida[1][$indice_r-1]);
				$indice_r--;
		          }
			 }
		  }
		       
		  if(strcmp($fila[1],$anterior)!=0 && $indice_r==0)
		  {
		    $salida[0][] = $fila[1];
		    
		     $nro_fallas++;  
		  }
		  
		  if(strcmp($fila[1],$anterior)!=0)
		  {
		    $indice_falla++; 
		  }
		  
		  if(strcmp($fila[1],$anterior)!=0 )
		  {
		   $total_pfalla[$indice_falla]+=(integer)$fila[2];
		       
		  }
		  
		  
		      
		     
		  
		          
		   $salida[1][$indice_r]['name'] = $fila[0];
		      $salida[1][$indice_r]['data'][] = (integer)$fila[2];
		      
		  $anterior=$fila[1];
		  $anterior2=$fila[0];
		}
		
		if(array_sum($salida[1][$indice_r]['data'])==0)
			  {
				
				unset($salida[1][$indice_r]);
				$indice_r--;
		          }
		
		$indice_r++;
		$salida[1][$indice_r]['name'] = "TOTAL";
		$salida[1][$indice_r]['data'] = $total_pfalla;
		
		return  $salida;
		
	}
}


$Sqlit = new SQLite();

if($_GET['f']=="rc"){
			error_log('entro en rt: ',0);
			//echo json_encode(array(0 => 'prueba'));
			
			echo json_encode($Sqlit->utf8_converter($Sqlit->obtener_causa($_GET["id"])));
	}


?>