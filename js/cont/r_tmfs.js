function graficar_tmfs()
  {
     
    rt_equipo_id = $('#rt_equipo').val();
    if(rt_equipo_id==0)
    {
	alert('Seleccione un equipo');
    }
    else
    {
      
      
    $.getJSON( "server.php?k=8", { "id": rt_equipo_id, "f": "rt" },function( data ) {
	
	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  
		  
		  
		  
		  
		    $('#container').highcharts({
        title: {
            text: $('#rt_equipo :selected').text(),
            x: -20 //center
        },
        subtitle: {
            text: 'Tiempo Medio Fuera de Servicio TMFS (Hrs)',
            x: -20
        },
        xAxis: {
            categories: data[0]
        },
        yAxis: {
            title: {
                text: 'Hrs'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' ps'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'TMFS',
            data: data[1]
        }]
    });
		  
		  
		  
		  
		  
		  
		  
		 
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });
      
      
    }
  

  }



$.getJSON('server.php?k=101&f=le',function(data){
	    $.each(data, function(id,value){
		$("#rt_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		
	    });
	});