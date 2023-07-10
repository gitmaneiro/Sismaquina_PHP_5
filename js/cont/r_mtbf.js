function graficar_mtbf()
  {
     
    rm_equipo_id = $('#rm_equipo').val();
    if(rm_equipo_id==0)
    {
	alert('Seleccione un equipo');
    }
    else
    {
      
      
    $.getJSON( "server.php?k=8", { "id": rm_equipo_id, "f": "rm" },function( data ) {
	
	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  
		  
		  
		  
		  
		    $('#container').highcharts({
        title: {
            text: $('#rm_equipo :selected').text(),
            x: -20 //center
        },
        subtitle: {
            text: 'Tiempo Medio Entre Fallas MTBF (Hrs)',
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
            name: 'MTBF',
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
		$("#rm_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		
	    });
	});